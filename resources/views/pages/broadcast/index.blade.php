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
                            <a href="{{ url('broadcast/email/create') }}" class=" btn btn-info btn-sm">
                                Tambah Email
                            </a>
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-default">
                                Tambah Email
                            </button>       --}}

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
                                        <th scope="col">Email</th>
                                        {{-- <th scope="col">logo</th> --}}
                                        <th scope="col">Subject</th>
                                        <th scope="col">Body Email</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Last Send</th>
                                        {{-- <th scope="col">Sender</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($response as $key=>$item)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $item['email'] }}</td>
                                        {{-- <td>{{ $item['logo'] }}</td> --}}
                                        <td>{{ $item['subject'] }}</td>
                                        <td>{!! $item['body'] !!}</td>
                                        <td>{{ $item['attachment'] }}</td>
                                        <td>{{ $item['last_send'] }}</td>
                                        {{-- <td>{{ $item['sender'] }}</td> --}}
                                        <td>
                                            <div class="">
                                                <a href="https://indonesiacore.com/email/preview/{{ $item['id'] }}" class="btn btn-info btn-sm" target="_blank">
                                                    Preview
                                                </a>
                                                {{-- <button class="btn btn-info btn-sm">Preview</button> --}}
                                                <a href="{{ url('broadcast/email/send/'.$item['id']) }}">
                                                    <button class="btn btn-secondary btn-sm">Kirim Email</button>
                                                </a>
                                                <a href="{{ url('broadcast/email/edit/'.$item['id']) }}">
                                                    <button class="btn btn-warning btn-sm">Edit</button>
                                                </a>
                                                <a href="{{ url('broadcast/email/hapus/'.$item['id']) }}">
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- @foreach ($data as $item)
                    <div class="col-xl-4 col-12">
                        <div class="box box-solid box-inverse box-info">
                            <div class="box-header with-border d-flex justify-content-between">
                                <h4 class="box-title"><strong>29-May-2024 </strong></h4>
                                <div class="d-flex">
                                    <div class="mx-2 badge badge-danger">{{ $item->status_post }}
            </div>
    </div>
</div>

<div class="box-body">
    <div class="d-flex justify-content-evenly">
        <img src="{{ asset('images/'.$item->image) }}" class="img-fluid" alt="">
    </div>
    <hr>
    <p class="badge badge-primary align-center">{{ $item->app }}</p><br>
    <p class="badge badge-danger align-center">{{ $item->url ?? "Url saat ini belum tersedia" }}</p>
    <p>{{ $item->caption }}</p>
    <hr>
    <div class="d-flex justify-content-evenly">
        <button class="btn btn-warning">Update</button>
        <button class="btn btn-danger">Delete</button>
    </div>
</div>
</div>
</div>
@endforeach --}}

</div>
</section>
</div>
</div>

@endsection