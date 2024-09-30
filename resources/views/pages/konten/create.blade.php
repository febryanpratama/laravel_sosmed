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
                                <h4 class="box-title">Tambah Data</h4>

                                <div class="pull-right">
                                    <a href="#" class="btn btn-info btn-sm" id="generate-btn">Generate Caption From AI</a>

                                    <a href="{{ route('konten.index') }}" class="btn btn-warning btn-sm">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                            <form action="{{ route('konten.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="">Caption <span class="text-danger">*</span></label>
                                        <textarea name="caption" class="form-control mt-2" rows="10" id="caption" value="{{ old('caption') }}"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="control-label">Sosial Media <span class="text-danger">*</span></label>
                                        <select name="" id="sosmed-type" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Instagram</option>
                                            <option value="2">Twitter</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="row-list-sosmed">
                                        <label for="" class="control-label">Akun <span class="text-danger">*</span></label>
                                        <select name="list" class="form-control" id="accounts">
                                            <option value="">-- Pilih --</option>
                                        </select>

                                        <!-- <select class="selectpicker form-control" multiple data-live-search="true" name="list[]" id="app">
                                            @foreach ($accounts as $account)
                                            <option value="{{ $account->app }} - {{ $account->nama_sosmed }}"
                                                {{ (is_array(old('list')) && in_array($account->nama_sosmed, old('list'))) ? 'selected' : '' }}>
                                                {{ $account->app }} - {{ $account->nama_sosmed }}
                                            </option>
                                            @endforeach
                                        </select> -->
                                    </div>

                                    <div class="form-group" id="row-ig-list-post-type">
                                        <label for="" class="control-label">Tipe Postingan <span class="text-danger">*</span></label>
                                        <select name="post_type" id="instagram-post-type" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Posting Tunggal</option>
                                            <option value="2">Carousel (Foto & Video) - Maksimal 10 Media</option>
                                            <option value="3">Reels</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="row-file">
                                        <label for="" class="control-label">Media (Foto/Video) <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="files[]" multiple required accept=".mp4, .jpg">
                                    </div>

                                    <div class="form-group" id="row-list-post-type">
                                        <label for="" class="control-label">Tanggal Posting <span class="text-danger">*</span></label>
                                        <select name="schedule" id="list-post-type" class="form-control">
                                            <option value="Instan">Posting Sekarang</option>
                                            <option value="Terjadwal">Posting Nanti</option>
                                        </select>
                                    </div>

                                    <div class="row" id="row-schedule">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Tanggal </label>
                                                <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                                            </div>

                                            <small class="text-info"><sup>Isi jika konten terjadwal</sup></small>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Waktu </label>
                                                <input type="time" class="form-control" name="waktu" value="{{ old('waktu') }}">
                                            </div>

                                            <small class="text-info"><sup>Isi jika konten terjadwal</sup></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Generate Caption -->
<div class="modal fade" id="generate-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Generate Caption</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info" id="alert-info">Proses generate caption sedang berjalan, mohon tunggu sebentar...</div>
                        <div class="alert alert-danger" id="alert-danger">Proses generate caption gagal, silahkan generate ulang.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">Kata Kunci <span class="text-danger">*</span></div>
                        <input type="text" class="form-control" id="keywords" placeholder="Masukkan Kata Kunci">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btn-sm" id="submit-generate">Generate</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('scripts')
<script>
    $(document).on('click', '#generate-btn', function() {
        $('#generate-modal').modal('show')
    })

    $(document).on('click', '#submit-generate', function() {
        // Initialize
        const keywords = $('#keywords').val()

        if (!keywords) {
            $.toast({
                heading: 'Error!',
                text: "Keyword harus diisi!",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3500,
                stack: 6
            })

            return 0
        }

        $('#submit-generate').attr('disabled', true)
        $('#alert-info').show()

        // Call Function
        callGpt()
    })

    function callGpt() {
        $.ajax({
            url: "https://ai.indonesiacore.com/api/generate/text",
            type: "POST",
            data: {
                prompt: 'Bertindaklah sebagai seorang expert digital marketing, buatkan caption yang mudah dibaca dan mudah dimengerti untuk sosial media instagram dan twitter dengan kata kunci : ' + $('#keywords').val()
            },
            success: function(response) {
                $('#submit-generate').attr('disabled', false)

                if (response.code == 200) {
                    $('#generate-modal').modal('hide')
                    $('#alert-info').hide()
                    $('#alert-danger').hide()
                    $('#keywords').val('')

                    // Initialize
                    const results = response.result.response

                    $('#caption').text(results)
                } else {
                    $('#alert-info').hide()
                    $('#alert-danger').show()
                }
            }
        });
    }

    // DOM Manipulation
    $(document).ready(function() {
        $('#row-list-sosmed').hide()
        $('#row-ig-list-post-type').hide()
        $('#row-file').hide()
        $('#row-schedule').hide()
        $('#alert-info').hide()
        $('#alert-danger').hide()
    })

    $(document).on('change', '#sosmed-type', function() {
        if (this.value == 1) { // Instagram
            $('#row-ig-list-post-type').show()
            $('#row-file').show()

            // Get Account
            callAccount(this.value)
        } else { // Twitter
            $('#row-ig-list-post-type').hide()
            $('#row-file').hide()
        }
    })

    $(document).on('change', '#list-post-type', function() {
        if (this.value == 'Instant') {
            $('#row-schedule').hide()
        } else {
            $('#row-schedule').show()
        }
    })

    function callAccount(id) {
        $.ajax({
            url: `${endpoint}/api/accounts?app=${id}`,
            type: "GET",
            success: function(response) {
                $('#row-list-sosmed').show()

                // Initialize
                $.each(response.data, function(index, item) {
                    $('#accounts').append('<option value="' + item.id + '">' + item.nama_sosmed + '</option>');
                });
            }
        })
    }
</script>
@endsection