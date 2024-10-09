@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="col-xl-12 col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">WhatsApp Blast</h4>

                                <div class="pull-right">
                                    <a href="{{ route('wa_blast.create') }}" class="btn btn-primary btn-sm">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="bb-2">No.</th>
                                            <th class="bb-2">Nomor WhatsApp</th>
                                            <th class="bb-2">Dengan Media</th>
                                            <th class="bb-2">Status</th>
                                            <th class="bb-2">Tanggal Dikirim</th>
                                            <th class="bb-2">Opsi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->whatsapp_number }}</td>
                                            <td>{{ ($item->path) ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                <span class="badge badge-primary">{{ waStatus($item->status) }}</span>
                                                @elseif($item->status == 2)
                                                <span class="badge badge-danger">{{ waStatus($item->status) }}</span>
                                                @else
                                                <span class="badge badge-info">{{ waStatus($item->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ ($item->send_date) ? date('d F Y H:i', strtotime($item->send_date)) :
                                                '-' }}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info" onclick="previewMessage({{ $item->id }})">Preview</button>
                                                <textarea id="message-{{ $item->id }}" style="display: none;">{{ $item->message }}</textarea>

                                                @if($item->status == 0)
                                                <button onclick="postMessage({{ $item->id }})"
                                                        id="now-post-{{ $item->id }}" class="btn btn-sm btn-primary">
                                                    Kirim Sekarang
                                                </button>
                                                @elseif($item->status == 2)
                                                <button onclick="postMessage({{ $item->id }})"
                                                        id="now-post-{{ $item->id }}" class="btn btn-sm btn-warning">
                                                    Kirim Ulang
                                                </button>
                                                @endif

                                                @if($item->status != 1)
                                                <button class="btn btn-sm btn-danger" onclick="destroyMessage(1)"
                                                        origin-id="{{ $item->id }}" id="delete-{{ $item->id }}">Hapus
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="preview-modal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="preview-message"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary pull-right" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function postMessage(id) {
        // Disabled Btn
        $(`#now-post-${id}`).attr('disabled', true)

        fetch(`${endpoint}/api/post-wa-message/${id}`, {
            method: "GET",
        })
            .then(response => response.json())  // Convert the response to JSON
            .then(response => {
                if (response.status) {
                    $(`#now-post-${id}`).attr('disabled', false)

                    $.toast({
                        heading: 'Sukses!',
                        text: `${response.message}`,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        stack: 6
                    });

                    setTimeout(() => {
                        window.location.reload(true);
                    }, 1000);
                } else {
                    $(`#now-post-${id}`).attr('disabled', false)

                    $.toast({
                        heading: 'Error!',
                        text: `${response.message}`,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 6
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);

                $.toast({
                    heading: 'Error!',
                    text: 'Terjadi kesalahan. Silakan coba lagi.',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3500,
                    stack: 6
                });
            });
    }

    function destroyMessage(id) {
        Swal.fire({
            title: `Hapus data dengan ID ${id}?`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`${endpoint}/api/delete-message/${id}`, {
                    method: "GET",
                })
                    .then(response => response.json())  // Convert the response to JSON
                    .then(response => {
                        if (response.status) {
                            $(`#delete-${id}`).attr('disabled', false)

                            $.toast({
                                heading: 'Sukses!',
                                text: `${response.message}`,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                stack: 6
                            });

                            setTimeout(() => {
                                window.location.reload(true);
                            }, 1000);
                        } else {
                            $(`#delete-${id}`).attr('disabled', false)

                            $.toast({
                                heading: 'Error!',
                                text: `${response.message}`,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 3500,
                                stack: 6
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);

                        $.toast({
                            heading: 'Error!',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 3500,
                            stack: 6
                        });
                    });
            }
        });
    }

    function previewMessage(id) {
        const message = $(`#message-${id}`).val()

        $('#preview-message').html(message)
        $('#preview-modal').modal('show')
    }
</script>
@endsection
