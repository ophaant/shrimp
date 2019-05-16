@extends('layout.master')
@section('content')
{{ csrf_field() }}
<div class="row">
                            <!-- ============================================================== -->
                            <!-- total revenue  -->
                            <!-- ============================================================== -->
  
                            
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- category revenue  -->
                            <!-- ============================================================== -->
                            
                            <div class="col-xl-8 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h4 class="card-header-title">Detail Harga Udang</h4>
                                        <div class="toolbar ml-auto">
                                            <a href="#" class="btn btn-info btn-sm ">Semua Harga</a>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                                                                       
                                            <h3 class="text-dark mb-1">{{$data['spesies']}}</h3>
                                         
                                            <div>{{$harga->date}}</div>
                                            <div>Dibuat oleh petambak</div>
                                            <div>{{$harga->creator->name}}</div>
                                            
                                        </div>
                                        <div class="col-sm-6" style="text-align: right;">
                                            
                                            <h3 class="text-dark mb-1">{{$data['provinsi']}}</h3>             
                                            <h4>Kab. {{$data['kab']}}</h4>
                                            <span>Hubungi Penjual:</span>
                                            <div><a href="#"  class="badge badge-pill badge-warning">Salin</a> <b>{{$harga->creator->phone}}</b></div>
                                            
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            
                                            <tbody>
                                                <tr>
                                                    <td class="left">Harga Ukuran 120</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_120, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 110</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_110, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 100</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_100, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 90</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_90, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 80</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_80, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 70</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_70, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 60</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_60, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 50</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_50, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 40</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_40, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Harga Ukuran 30</td>
                                                    <td class="right"><i>Rp </i>{{ number_format($harga->size_30, 2,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left">Catatan</td>
                                                    <td class="right">{{$harga->remark}}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                            
                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->

                            <div class="col-xl-4 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="alert alert-light" role="alert" style="text-align: center;">
                                                Rekomendasi
                                            </div>
                                <div class="card">
                                    <div class="card-body">
                                        <span>2-11-2018 / dibuat oleh petambak / Syauqi</span>
                                        <h3 class="card-title">Vanamei</h3>
                                        <h6 class="card-subtitle mb-2 text-muted">Harga ukuran udang 100</h6>
                                        <h2 class="text-dark mb-1">Rp. 50.000</h2>
                                        <h3 class="text-dark mb-1">Jawa Tengah</h3>
                                         
                                            <h4>Kab. Purworejo</h4>
                                            <span>Hubungi Penjual:</span>
                                            <div>089387682383     <a href="#"  class="badge badge-pill badge-warning">Salin</a></div><br>
                                        <a href="#" class="btn btn-primary btn-block">Lihat Detail Harga</a>
                                            <a href="#" class="btn btn-success btn-block">Bagikan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection