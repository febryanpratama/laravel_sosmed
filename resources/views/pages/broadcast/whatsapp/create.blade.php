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
                                    <a href="{{ route('wa_blast.template') }}" target="_blank" class=" btn btn-info btn-sm">
                                        Download Template
                                    </a>

                                    <a href="{{ route('wa_blast') }}" class="btn btn-warning btn-sm">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                            <form action="{{ route('wa_blast.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="">Pesan <span class="text-danger">*</span></label>
                                        <textarea name="message" class="form-control mt-2" rows="8" id="caption" value="{{ old('message') }}" placeholder="Masukkan Pesan" required=""></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="control-label">No WhatsApp (Excel) <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="document" required="" accept=".xlsx">
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="control-label">File Tambahan</label>
                                        <select name="file_type" id="add-file" class="form-control">
                                            <option value="">--- Pilih ---</option>
                                            <option value="0">Gambar</option>
                                            <!--- <option value="1">Dokumen</option>-->
                                        </select>
                                    </div>

                                    <div class="form-group" id="more-file">
                                        <label for="" class="control-label">Gambar (JPG, PNG, JPEG) <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="file" id="more-file-value" accept=".jpg, jpeg, png">
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
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#more-file').hide()
    })

    $(document).on('change', '#add-file', function (e) {
        if (this.value) {
            $('#more-file').show()
        } else {
            $('#more-file').hide()
        }
    })
</script>
@endsection
