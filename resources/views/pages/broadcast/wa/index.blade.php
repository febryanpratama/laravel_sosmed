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
                            <a href="{{ url('broadcast/whatsapp-blast/create') }}" class=" btn btn-info btn-sm">
                                Tambah Whatsapp Blast
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0" id="myTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nomor WhatsApp</th>
                                        <th scope="col">Kode Negara</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tanggal Dikirim</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($response as $key=>$item)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $item['whatsapp_number'] }}</td>
                                        <td>{{ $item['country_code'] }}</td>
                                        <td>{{ $item['message'] }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ ($item['send_date']) ? $item['send_date'] : '-' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-warning btn-sm" style="margin-right: 10px;">Edit</a>
                                                <a class="btn btn-danger btn-sm">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection