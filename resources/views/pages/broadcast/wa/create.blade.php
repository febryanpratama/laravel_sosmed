@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title align-middle">
                            <h3 class="box-title">List Konten</h3>
                        </div>
                        <div>
                            {{-- <a href="{{ url('broadcast/email/create') }}" class=" btn btn-info btn-sm">
                                Tambah Email
                            </a> --}}
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-default">
                                Tambah Email
                            </button>       --}}
                              
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                                
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Pesan <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" id="message" name="message"  placeholder="Masukkan Pesan" rows="4"></textarea>
                                </div>
            
                                <div class="form-group">
                                    <label for="import-csv">Import Excel (No WhatsApp) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="import-csv" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required></input>
                                </div>
            
                                 <div class="form-group">
                                    <label for="">File Tambahan</label>
                                    <select name="file_type" id="file_type" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Gambar</option>
                                        <option value="2">Dokumen</option>
                                    </select>
                                </div>
            
                                <div class="" id="documents" style="display: none;">
                                    <div class="form-group" id="document-selected">
                                        <label for="document" id="text-document"></label>
                                        <input type="file" class="form-control" id="document" name="document"></input>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </form>
            
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </div>
</div>

@endsection