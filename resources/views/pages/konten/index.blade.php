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
                                <h4 class="box-title">Konten Sosial Media</h4>

                                <div class="pull-right">
                                    <a href="{{ route('konten.create') }}" class="btn btn-primary btn-sm">
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
                                                <th class="bb-2">App</th>
                                                <th class="bb-2">Kategori Posting</th>
                                                <th class="bb-2">Jadwal Upload</th>
                                                <th class="bb-2">Status Posting</th>
                                                <th class="bb-2">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->app }}</td>
                                                <td>{{ $item->status_post }}</td>
                                                <td>{{ ($item->date_jadwal) ? date('d F Y H:i', strtotime($item->date_jadwal)) : '-' }}</td>
                                                <td><span class="badge {{ ($item->status_posting == 'Berhasil') ? 'badge-success' : 'badge-info' }}">{{ $item->status_posting }}</span></td>
                                                <td>
                                                    <a href="#" id="now-post" data-id="{{ $item->id }}" class="btn btn-sm btn-primary">Posting Sekarang</a>
                                                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="" class="btn btn-sm btn-danger">Hapus</a>
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
        <form action="{{ route('konten.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Konten</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="" class="control-label">Caption</label>
                            <textarea name="caption" class="form-control mt-2" cols="30" rows="5" id="caption" value="{{ old('caption') }}"></textarea>
                        </div>

                        <div class="col-md-12 mt-2 d-flex justify-content-center">
                            <button type="button" class="btn btn-info btn-sm" id="generate">Generate Caption From AI</button>
                            {{-- <textarea name="caption" class="form-control mt-2" id="" cols="30" rows="5"></textarea> --}}
                        </div>

                        <div class="col-md-12 hide" id="hideresult">
                            <label for="" class="control-label">Caption From Generate AI</label>
                            <textarea name="caption" class="form-control mt-2" cols="30" rows="5" id="result"></textarea>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="" class="control-label">Gambar <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="foto" multiple required>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="" class="control-label">List Sosmed</label>
                            <select class="selectpicker form-control" multiple data-live-search="true" name="list[]" id="app">
                                <!-- <option value="Account Instagram RizkyAngrh">Account Instagram RizkyAngrh</option> -->
                                <!-- <option value="Account Twitter Usefullairdrop">Account Twitter Usefullairdrop</option> -->

                                @foreach ($accounts as $account)
                                <option value="Account {{ $account->nama_sosmed }}"
                                    {{ (is_array(old('list')) && in_array($account->nama_sosmed, old('list'))) ? 'selected' : '' }}>
                                    {{ $account->nama_sosmed }}
                                </option>
                                @endforeach
                            </select>

                            {{-- <select name="app" class="form-control" id="">
                            <option value="" selected disabled>== Pilih ==</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Twitter">Twitter</option>
                        </select> --}}
                        </div>

                        <div class="col-md-6 mt-2">
                            <label for="" class="control-label">Tanggal </label><small class="text-danger"><sup> * Isi jika konten terjadwal</sup></small>
                            <input type="date" class="form-control" name="tanggal" required value="{{ old('tanggal') }}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="" class="control-label">Waktu </label><small class="text-danger"><sup> * Isi jika konten terjadwal</sup></small>
                            <input type="time" class="form-control" name="waktu" required value="{{ old('waktu') }}">
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#generate').click(function() {
            console.log('clicked')
            let prompt = $('#caption').val();
            $.ajax({
                url: "http://localhost:8080/api/generate/text",
                type: "POST",
                data: {
                    prompt: 'Bertindaklah sebagai seorang expert digital marketing, buatkan caption yang mudah dibaca dan mudah dimengerti untuk sosial media instagram dan twitter dengan kata kunci : ' + prompt
                },
                success: function(response) {
                    // $('textarea[name="caption"]').val(data);
                    // console.log(data);
                    if (response.code == 200) {
                        $('#result').val(response.result)

                        $('#hideresult').removeClass('hide')
                    }
                }
            });
        });
    });

    $(document).keyup('#caption', function() {
        // Initialize
        let caption = $('#caption').val()

        $('#result').val(caption)
    })
</script>
@endsection