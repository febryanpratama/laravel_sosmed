<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountKontens;
use App\FieldsInstagram;
use App\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KontenController extends Controller
{
    public function index()
    {
        // Initialize
        $data = Konten::with('accountKontens')->latest()->paginate(20);

        return view('pages.konten.index', [
            'data'      => $data
        ]);
    }

    public function create()
    {
        // Initialize
        $accounts = Account::get();

        return view('pages.konten.create', ['accounts' => $accounts]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'caption'   => 'required',
            'files'     => 'required',
            'list'      => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first())->withInput();
        }

        try {
            // Memulai transaksi
            DB::beginTransaction();

            // Get Account
            $user = Account::where('id', $request->list)->first();

            if (!$user) {
                return back()->withErrors('Pengguna yang dipilih tidak ditemukan.')->withInput();
            }

            // Initialize
            $fileData = request()->file('files');
            $paths    = [];

            foreach ($fileData as $file) {
                // Upload
                $extension  = $file->getClientOriginalExtension();
                $path       = env('APP_URL') . '/storage/' . $file->store('uploads/content', 'public');

                array_push($paths, [
                    'path'      => $path,
                    'extension' => $extension
                ]);
            }

            // Create Content
            $content = Konten::create([
                'caption'           => $request->caption,
                'app'               => $user->app,
                'status_posting'    => 'Menunggu',
                'status_post'       => $request->schedule,
                'date_jadwal'       => ($request->schedule == 'Terjadwal') ?  $request->tanggal . " " . $request->waktu : null,
                'post_type'         => ($request->post_type) ? $request->post_type : 1
            ]);

            // Create Content Media
            AccountKontens::create([
                'account_id'    => $user->id,
                'konten_id'     => $content->id,
                'path'          => $paths
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage()], 500);
        }

        // if ($implode == 'instagram') {
        //     // $this->postToInstagram($user->token, url('images/' . $image_name), $request->caption);
        // } else if ($implode == 'twitter') {
        //     // $this->postToTwitter($request->access_token, $request->caption);
        // }

        return redirect()->route('konten.index')->withSuccess('Berhasil menambahkan data.');
    }

    // public function postToInstagram($accessToken, $imageUrl, $caption)
    // {
    //     $fb = new Facebook([
    //         'app_id' => env('FACEBOOK_APP_ID'),
    //         'app_secret' => env('FACEBOOK_APP_SECRET'),
    //         'default_graph_version' => 'v12.0',
    //     ]);

    //     try {
    //         $response = $fb->post('/me/media', [
    //             'image_url' => $imageUrl,
    //             'caption' => $caption,
    //         ], $accessToken);

    //         $mediaId = $response->getGraphNode()['id'];

    //         // Publish the media
    //         $fb->post('/me/media_publish', [
    //             'creation_id' => $mediaId,
    //         ], $accessToken);
    //     } catch (FacebookResponseException $e) {
    //         // Handle error

    //         dd($e);
    //     } catch (FacebookSDKException $e) {
    //         // Handle error
    //         dd($e);
    //     }
    // }

    public function postContent(Request $request)
    {
        // Check Data
        $content = Konten::with('accountKontens', 'accountKontens.account')->where('id', $request->id)->first();

        if (!$content) {
            return response()->json([
                'status'    => false,
                'message'   => 'Data konten tidak ditemukan.'
            ], 404);
        }

        if ($content->app == 'Instagram') {
            /*
                Docs : https://developers.facebook.com/docs/instagram-platform/instagram-api-with-instagram-login/content-publishing
            */

            // Check Type
            if ($content->post_type == 1) { // Single
                foreach ($content->accountKontens as $account) {
                    // Initialize
                    $instagramId = $account->account->fieldsInstagram->instagram_id;
                    $token       = $account->account->token;
                    $path        = $account->path[0]['path'];
                    $body        = [
                        'image_url'     => $path,
                        'access_token'  => $token,
                        'caption'       => $content->caption
                    ];

                    $container = $this->createContainer($instagramId, $body);

                    if ($container['status']) {
                        // Initialize
                        $body = [
                            'creation_id'   => $container['data']['id'],
                            'access_token'  => $token
                        ];

                        $data = $this->postInstagram($instagramId, $body);

                        if ($data['status']) {
                            return response()->json([
                                'status'    => true,
                                'message'   => 'Koten berhasil dipublish.'
                            ], 200);
                        } else {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Gagal melakukan Publish.'
                            ], 200);
                        }
                    } else {
                        if (!$container['status']) {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Gagal membuat Kontainer.'
                            ], 200);
                        }
                    }
                }
            } elseif ($content->post_type == 2) { // Carousel
                // Initialize
                $accounts    = $content->accountKontens;
                $containerId = [];

                foreach ($accounts as $account) {
                    // Token
                    $token       = $account->account->token;
                    $instagramId = $account->account->fieldsInstagram->instagram_id;

                    foreach ($account->path as $path) {
                        if ($path['extension'] == 'jpeg' || $path['extension'] == 'jpg') {
                            // Create Container
                            $body = [
                                'image_url'         => $path['path'],
                                'is_carousel_item'  => true,
                                'access_token'      => $token
                            ];
                        } else {
                            // Create Container
                            $body = [
                                'media_type'        => 'VIDEO',
                                'video_url'         => $path['path'],
                                'is_carousel_item'  => true,
                                'access_token'      => $token
                            ];
                        }

                        $container = $this->createContainer($instagramId, $body);

                        if ($container['status']) {
                            array_push($containerId, $container['data']['id']);
                        } else {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Gagal membuat kontainer.'
                            ], 400);
                        }
                    }

                    // Create Container Carousel
                    $body = [
                        'caption'       => $content->caption,
                        'media_type'    => 'CAROUSEL',
                        'children'      => implode(',', $containerId),
                        'access_token'  => $token
                    ];

                    $containerCarousel = $this->createContainer($instagramId, $body);

                    if ($containerCarousel['status']) {
                        // Initialize
                        $body = [
                            'creation_id'   => $containerCarousel['data']['id'],
                            'access_token'  => $token
                        ];

                        $data = $this->postInstagram($instagramId, $body);

                        if ($data['status']) {
                            return response()->json([
                                'status'    => true,
                                'message'   => 'Koten berhasil dipublish.'
                            ], 200);
                        } else {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Gagal melakukan Publish.'
                            ], 200);
                        }
                    }
                }
            } else { // Reels
                foreach ($content->accountKontens as $account) {
                    // Initialize
                    $instagramId = $account->account->fieldsInstagram->instagram_id;
                    $token       = $account->account->token;
                    $path        = $account->path[0]['path'];

                    $body        = [
                        'media_type'    => 'REELS',
                        'video_url'     => $path,
                        'cover_url'     => $account->path[0]['thumbnail'],
                        'access_token'  => $token,
                        'caption'       => $content->caption
                    ];

                    $container = $this->createContainer($instagramId, $body);

                    if ($container['status']) {
                        // Initialize
                        $body = [
                            'creation_id'   => $container['data']['id'],
                            'access_token'  => $token
                        ];

                        dd($container, $body);

                        $data = $this->postInstagram($instagramId, $body);

                        if ($data['status']) {
                            return response()->json([
                                'status'    => true,
                                'message'   => 'Koten berhasil dipublish.'
                            ], 200);
                        } else {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Gagal melakukan Publish.'
                            ], 200);
                        }
                    } else {
                        if (!$container['status']) {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Gagal membuat Kontainer.'
                            ], 200);
                        }
                    }
                }
            }

            return response()->json([
                'status'    => false,
                'message'   => 'Konten gagal dipublish.'
            ], 400);
        }

        return response()->json([
            'status'    => false,
            'message'   => 'Dalam Pengembangan.'
        ], 200);
    }

    private function createContainer($instagramId, $body)
    {
        // Initialize
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://graph.instagram.com/v20.0/' . $instagramId . '/media', $body);

        // Response dari Instagram API
        $results = $response->json();

        if ($response->successful()) {
            return [
                'status'    => true,
                'message'   => 'Berhasil membuat data kontainer.',
                'data'      => $results
            ];
        } else {
            return [
                'status'    => false,
                'message'   => 'Gagal membuat data kontainer.'
            ];
        }
    }

    private function postInstagram($instagramId, $body)
    {
        // Initialize
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://graph.instagram.com/v20.0/' . $instagramId . '/media_publish', $body);

        // Response dari Instagram API
        $results = $response->json();

        if ($response->successful()) {
            return [
                'status'    => true,
                'message'   => 'Berhasil membuat data posting.',
                'data'      => $results
            ];
        } else {
            return [
                'status'    => false,
                'message'   => 'Gagal membuat data posting.'
            ];
        }
    }
}
