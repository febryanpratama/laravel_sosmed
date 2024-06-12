@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title align-middle">
                            <h3 class="box-title">List Tiket</h3>
                        </div>
                        {{-- <div>
                            <a href="{{ url('pendaftaran/create') }}">
                                <button class="btn btn-primary">Reservasi</button>
                            </a>
                        </div> --}}
                    </div>
                </div>
                @foreach ($tiket as $item)
                {{-- {{ dd($item) }} --}}
                    <div class="col-xl-4 col-12">
                        <div class="box box-solid box-inverse box-info">
                        <div class="box-header with-border d-flex justify-content-between">
                            <h4 class="box-title"><strong>{{ $item['no_tiket'] }}</strong></h4>
                            @switch($item['pendaftaran']['tipe_pasien'])
                                @case('tunai')
                                    <div class="badge badge-success">Tunai</div>
                                    @break
                                @case('mitra')
                                    <div class="badge badge-danger">Mitra</div>
                                    
                                    @break
                                @case('bpjs')
                                    <div class="badge badge-danger">Bpjs</div>
                                    
                                    @break
                                @default
                                    
                            @endswitch
                        </div>
                    
                        <div class="box-body">
                            <div class="d-flex justify-content-evenly">
                                <label><b>{{ $item['pendaftaran']['dokter']['nama_dokter'] ?? "DR Archiloka MSI" }}</b></label>
                                @if ($item['pendaftaran']['tipe_konsultasi'])
                                    <div class="badge badge-danger">{{ $item['pendaftaran']['tipe_konsultasi'] }}</div>
                                    
                                @endif
                                {{-- <div class="badge badge-danger">{{ $item['tipe_konsultasi'] }}</div> --}}
                                @switch($item['pendaftaran']['tipe_pemeriksaan'])
                                    @case('penunjang')
                                        <div class="badge badge-secondary">Penunjang</div>
                                        @break
                                    @case('nonpenunjang')
                                        <div class="badge badge-secondary">Non Penunjang</div>
                                        @break
                                    @default
                                        
                                @endswitch
                            </div>
                            <hr>
                            
                            <p>Ut vestibulum enim vitae elit luctus, id tincidunt metus suscipit. Pellentesque scelerisque, massa ut fringilla mollis, sem tortor pharetra mi, non consequat velit dui sed lorem.</p>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection