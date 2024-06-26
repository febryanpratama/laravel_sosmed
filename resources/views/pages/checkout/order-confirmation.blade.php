@extends('layouts.main')

@section('content')
<div class="content-wrapper" style="min-height: 618px;">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Invoice</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Invoice</li>
                                <li class="breadcrumb-item active" aria-current="page">Invoice Sample</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="invoice printableArea">
            <div class="row">
                {{-- <div class="col-12">
                    <div class="bb-1 clearFix">
                        <div class="text-end pb-15">
                            <button class="btn btn-success" type="button">
                                <span><i class="fa fa-print"></i> Save</span>
                            </button>
                            <button id="print2" class="btn btn-warning" type="button">
                                <span><i class="fa fa-print"></i> Print</span>
                            </button>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="page-header">
                        <h2 class="d-inline"><span class="fs-30">Order Confirmation</span></h2>
                        <div class="pull-right text-end">
                            <h3>{{ Carbon\Carbon::now()->format('d M Y') }}</h3>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="row invoice-info">
                {{-- <div class="col-md-6 invoice-col">
                    <strong>From</strong>
                    <address>
                        <strong class="text-blue fs-24">Rhythm Admin</strong><br />
                        <strong class="d-inline">124 Lorem Ipsum, Suite 478, Dummuy, USA 123456</strong><br />
                        <strong>Phone: (00) 123-456-7890 &nbsp;&nbsp;&nbsp;&nbsp; Email: info@example.com</strong>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-md-6 invoice-col text-end">
                    <strong>To</strong>
                    <address>
                        <strong class="text-blue fs-24">Doe Shina</strong><br />
                        124 Lorem Ipsum, Suite 478, Dummuy, USA 123456<br />
                        <strong>Phone: (00) 789-456-1230 &nbsp;&nbsp;&nbsp;&nbsp; Email: conatct@example.com</strong>
                    </address>
                </div> --}}
                <!-- /.col -->
                <div class="col-sm-12 invoice-col mb-15">
                    <div class="invoice-details row no-margin">
                        <div class="col-md-6 col-lg-3"><b>BCA VIRTUAL ACCOUNT </b></div>
                        <div class="col-md-6 col-lg-3"><b>Order ID:</b> INV12548</div>
                        <div class="col-md-6 col-lg-3"><b>Payment Due:</b> {{ Carbon\Carbon::now()->format('d M Y') }}</div>
                        <div class="col-md-6 col-lg-3"><b>Account:</b> 1872879128882</div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                {{-- <th>Serial #</th> --}}
                                <th class="text-end">Quantity</th>
                                <th class="text-end">Unit Cost</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{ $obat['nama_obat'] }}</td>
                                {{-- <td>12345678912514</td> --}}
                                <td class="text-end">1</td>
                                <td class="text-end">{{ number_format($obat['harga']) }}</td>
                                <td class="text-end">{{ number_format($obat['harga']) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 text-end">
                    <p class="lead"><b>Payment Due</b><span class="text-danger"> {{ Carbon\Carbon::now()->addDays(1)->format('d M Y') }} </span></p>

                    <div>
                        <p>Sub - Total amount : {{ number_format($obat['harga']) }}</p>
                        {{-- <p>Tax (18%) : $646.56</p> --}}
                        <p>Shipping : Rp. 21.000</p>
                    </div>
                    <div class="total-payment">
                        <h3><b>Total :</b> {{ number_format($obat['harga']+21000) }}</h3>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            {{-- <div class="row no-print">
                <div class="col-12">
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                </div>
            </div> --}}
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection