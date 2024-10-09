<?php

namespace App\Core;

use Illuminate\Support\Facades\Http;

class WhatsAppApi
{
    public function post($endpoint, $postData, $fileContent = null, $fileManager = null)
    {
        try {
            if ($fileContent) {
                $response = Http::withBasicAuth('', '') // Otorisasi Basic Auth
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                    ->attach('file', $fileContent, basename($fileManager)) // Mengirim file sebagai multipart
                    ->asMultipart() // Set agar format multipart
                    ->post($endpoint, $postData);
            } else {
                $response = Http::withBasicAuth('', '') // Otorisasi Basic Auth
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                    ->post($endpoint, $postData);
            }

            // Cek apakah response dari API sukses
            if ($response->successful()) {
                return [
                    'status' => true,
                    'data' => $response->json(),
                ];
            } else {
                return [
                    'status' => false,
                    'message' => $response->json()['message'] ?? $response->body()
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ];
        }
    }
}
