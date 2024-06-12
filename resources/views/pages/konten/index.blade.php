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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-default">
                                Add Konten Sosmed
                            </button>      
                              
                            {{-- <a href="{{ url('pendaftaran/create') }}">
                                <button class="btn btn-primary">Add token Sosmed</button>
                            </a> --}}
                        </div>
                    </div>
                </div>
                {{-- @foreach ($data as $item)
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
                @endforeach --}}
                @foreach ($data as $item)
                    <div class="col-xl-4 col-12">
                        <div class="box box-solid box-inverse box-info">
                            <div class="box-header with-border d-flex justify-content-between">
                                <h4 class="box-title"><strong>29-May-2024 </strong></h4>
                                <div class="d-flex">
                                    {{-- <div class="mx-2 badge badge-success"></div> --}}
                                    <div class="mx-2 badge badge-danger">{{ $item->status_post }}</div>
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
                @endforeach
                
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog" role="document">
        <form action="{{ url('konten-sosmed') }}" method="POST" enctype="multipart/form-data">
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
                        <textarea name="caption" class="form-control mt-2" cols="30" rows="5" id="caption"></textarea>
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
                        <label for="" class="control-label">Gambar</label>
                        <input type="file" class="form-control" name="foto" multiple>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="control-label">List Sosmed</label>
                        <select class="selectpicker form-control" multiple data-live-search="true" name="list[]" id="app">
                            <option value="Account Instagram RizkyAngrh">Account Instagram RizkyAngrh</option>
                            <option value="Account Twitter Usefullairdrop">Account Twitter Usefullairdrop</option>
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
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="" class="control-label">Waktu </label><small class="text-danger"><sup> * Isi jika konten terjadwal</sup></small>
                        <input type="time" class="form-control" name="waktu">
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
    $(document).ready(function(){
        $('#generate').click(function(){
            console.log('clicked')
            let prompt = $('#caption').val();
            $.ajax({
                url: "http://localhost:8080/api/generate/text",
                type: "POST",
                data: {
                    prompt: 'Bertindaklah sebagai seorang expert digital marketing, buatkan caption yang mudah dibaca dan mudah dimengerti untuk sosial media instagram dan twitter dengan kata kunci : '+ prompt
                },
                success: function(response){
                    // $('textarea[name="caption"]').val(data);
                    // console.log(data);
                    if(response.code == 200){
                        $('#result').val(response.result)

                        $('#hideresult').removeClass('hide')
                    }
                }
            });
        });
    });
</script>
@endsection