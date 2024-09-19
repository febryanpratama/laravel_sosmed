@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title align-middle">
                            <h3 class="box-title">List Account Sosmed</h3>
                        </div>
                        <div>
                            <a href="{{ url('auth/twitter') }}" class="btn btn-primary" target="_blank">
                                Add Twitter Account
                            </a>
                            <a href="{{ url('auth/instagram') }}" class="btn btn-danger" target="_blank">
                                Add Instagram Account
                            </a>

                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-default">
                                Add Twitter Account
                            </button>       --}}

                            {{-- <a href="{{ url('pendaftaran/create') }}">
                            <button class="btn btn-primary">Add token Sosmed</button>
                            </a> --}}
                        </div>
                    </div>
                </div>
                @foreach ($data as $item)
                {{-- {{ dd($item) }} --}}
                <div class="col-xl-4 col-12">
                    <div class="box box-solid box-inverse box-info">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h4 class="box-title"><strong>{{ Carbon\Carbon::parse($item['waktu_reservasi'])->format('d-M-Y') }} {{ $item['jam'] }}</strong></h4>
                            <div class="badge badge-success">{{ $item->status }}</div>
                        </div>

                        <div class="box-body">
                            <div class="d-flex justify-content-evenly">
                                <label><b>{{ $item['nama_sosmed'] ?? "DR Archiloka MSI" }}</b></label>

                            </div>
                            <hr>
                            <p>{{ $item->token }}</p>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog" role="document">
        <form action="{{ url('account') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="control-label">Nama Sosmed</label>
                            <input type="text" class="form-control" name="nama_sosmed">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Nama Sosmed</label>
                            <select name="app" class="form-control" id="">
                                <option value="" selected disabled>== Pilih ==</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Twitter">Twitter</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="control-label">Token</label>
                            <input type="text" class="form-control" name="token">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-end">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection