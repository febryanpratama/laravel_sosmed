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
                                <h4 class="box-title">Akun Sosial Media</h4>

                                <div class="pull-right">
                                    <a href="{{ url('auth/twitter') }}" class="btn btn-primary btn-sm" target="_blank">
                                        Tambahkan Akun Twitter
                                    </a>

                                    <a href="#" id="instagram-auth-link" class="btn btn-danger btn-sm" target="_blank">
                                        Tambahkan Akun Instagram
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="bb-2">No.</th>
                                                <th class="bb-2">Nama Akun</th>
                                                <th class="bb-2">Apps</th>
                                                <th class="bb-2">Status</th>
                                                <th class="bb-2">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_sosmed }}</td>
                                                <td>{{ $item->app }}</td>
                                                <td><span class="badge {{ ($item->status == 'Active') ? 'badge-success' : 'badge-info' }}">{{ $item->status }}</span></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                                    @if ($item->status == 'Inactive')
                                                    <a href="{{ route('activation', $item->id) }}" class="btn btn-sm btn-primary">Aktivasi</a>
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

@section('footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch(`{{ route('instagram.auth.url') }}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('instagram-auth-link').setAttribute('href', data.authUrl);
            });
    });
</script>
@endsection