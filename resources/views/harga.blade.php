@extends('layout.master')
@extends('welcome')
@section('content2')
{{ csrf_field() }}

                            <!-- ============================================================== -->
                            <!-- end product category  -->
                                   <!-- product sales  -->
                            <!-- ============================================================== -->
                            <div class="row">
                            <!-- ============================================================== -->
                                              <!-- product category  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"> Persebaran Harga Udang</h5>
                                    <div class="card-body">
                                        <div id="map" class="gmaps"></div>
     
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end product sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-7 col-lg-12 col-md-9 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- top perfomimg  -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <h5 class="card-header">List Harga Udang</h5>
                                    <div class="card-body" id="card-body">
                                        @foreach($response2->data as $key => $value)
                                        <div class="table-responsive" id="table-responsive">
                                            <div class="alert alert-secondary" role="alert">
                                                <div class="card-body border-top">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h6 class="mb-3">{{ $value->date}} / dibuat oleh petambak / {{ $value->creator->name}}</h6>                                            
                                            <h3 id="provinsi" name="provinsi" class="text-dark mb-1">{{ $value->region->province_name}}</h3>
                                         
                                            <h4>Kab. {{ $value->region->regency_name}}</h4>
                                            <span>Hubungi Penjual:</span>
                                            <div><b>{{ $value->creator->phone}} </b>  <a href="#"  class="badge badge-pill badge-warning">Salin</a></div>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="mb-3" style="text-align: right;">{{ $value->species->name}}</h4>
                                                                                        
                                            <div style="text-align: right;"><span align="right">Harga ukuran udang 50:</span></div>
                                            <h2 class="text-dark mb-1" style="text-align: right;"><i>Rp </i>{{ number_format($value->size_50, 2,',','.') }}</h2><br>
                                            <div></div>
                                            @php
        $parameter =[
            'id' =>$value->id,
            'provinsi'=>$value->region->province_name,
            'kab'=>$value->region->regency_name,
            'spesies' =>$value->species->name,
        ];
    $parameter= Crypt::encrypt($parameter);
@endphp
                                            <div style="text-align: right;"><a href="/details/{{$parameter}}" class="badge badge-pill badge-primary">Lihat Semua Ukuran</a>
                                            <a href="#" class="badge badge-pill badge-success">Bagikan</a></div>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection