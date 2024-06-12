@extends('layouts.main')

@section('content')
<div class="content-wrapper" style="min-height: 618px;">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Checkout</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">e-Commerce</li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Product Summary</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th class="w-200">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="{{ $obat['foto'] }}" alt="" width="40" /></td>
                                            <td>{{ $obat['nama_obat'] }}</td>
                                            <td>1</td>
                                            <td>{{ number_format($obat['harga']) }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-end">Total</th>
                                            <th>{{ number_format($obat['harga']) }}</th>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">Biaya Pengiriman</td>
                                            <td>Rp. 21.000</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-end fs-24 fw-700">Payable Amount</th>
                                            <th class="fs-24 fw-700">Rp. 31.000</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr />
                            <h4 class="box-title mb-15">Metode Pengiriman</h4>
                            <div class="row">
                                <!-- col -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="box bg-primary box-inverse">
                                        <div class="box-body">
                                            {{-- <h1 class="mt-0"><i class="fa fa-cc-visa"></i></h1> --}}
                                            <h3>GO-SEND</h3>
                                            <span class="pull-right">Rp. 21.000</span>
                                            <span class="font-500">Daniel Doe</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="box bg-info box-inverse">
                                        <div class="box-body">
                                            {{-- <h1 class="mt-0"><i class="fa fa-cc-mastercard"></i></h1> --}}
                                            <h3>BUJANG KURIR</h3>
                                            <span class="pull-right">Rp. 21.000</span>
                                            <span class="font-500">Ethan Doe</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="box bg-warning box-inverse">
                                        <div class="box-body">
                                            {{-- <h1 class="mt-0"><i class="fa fa-cc-discover"></i></h1> --}}
                                            <h3>GRAB SEND</h3>
                                            <span class="pull-right">Rp. 21.000</span>
                                            <span class="font-500">Jayden Doe</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="box bg-danger box-inverse">
                                        <div class="box-body">
                                            {{-- <h1 class="mt-0"><i class="fa fa-cc-amex"></i></h1> --}}
                                            <h3>POS INDONESIA</h3>
                                            <span class="pull-right">Rp. 35.000</span>
                                            <span class="font-500">William Doe</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <hr />
                            <h4 class="box-title mb-15">Metode Pembayaran</h4>
                            <div class="row d-flex justify-content-center">
                                <!-- col -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="box bg-primary box-inverse">
                                        <div class="box-body">
                                            {{-- <h1 class="mt-0"><i class="fa fa-cc-visa"></i></h1> --}}
                                            <h3>BCA Virtual Account</h3>
                                            <span class="pull-right">Rp. 21.000</span>
                                            <span class="font-500">Daniel Doe</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="box bg-info box-inverse">
                                        <div class="box-body">
                                            {{-- <h1 class="mt-0"><i class="fa fa-cc-mastercard"></i></h1> --}}
                                            <h3>Mandiri Virtual Account</h3>
                                            <span class="pull-right">Rp. 21.000</span>
                                            <span class="font-500">Ethan Doe</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="box bg-warning box-inverse">
                                        <div class="box-body">
                                            {{-- <h1 class="mt-0"><i class="fa fa-cc-discover"></i></h1> --}}
                                            <h3>Transfer</h3>
                                            <span class="pull-right">Rp. 21.000</span>
                                            <span class="font-500">Jayden Doe</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                
                                <!-- /col -->
                            </div>

                            <div class="row d-flex justify-content-center">
                                <a href="{{ url('checkout/order-confirmation/'.$obat['id']) }}" class="btn btn-success">
                                    Bayar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection