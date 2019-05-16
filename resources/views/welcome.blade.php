@extends('layout.master')
@section('content')
@section('content2')


<div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                
                                <div class="card">
                                    
                                    
                                    <div class="card-body border-top">
                                    
                                        <form>
                                            <div class="form-group row">
                                                
                <label for="title">Filter Lokasi:</label>
                <div class="col-md-2">
                <select class="form-control" name="country" id="country" >
                                <option value="" selected="selected">--- Pilih Provinsi ---</option>
                            @foreach ($response->data as $proid => $name) {
<option value="{{$name->province_name}}">{{ $name->province_name }}</option>

@endforeach   
                          </select>
               </div>
            
                <div class="col-md-2">
                <select name="state" id="state" class="form-control" disabled="disabled">
                    <option value="" selected="selected">--- Pilih Provinsi ---</option>
                </select>
            </div>
        
                      <label class="control-label col-md-1.5" for="first-name">Urutkan Berdasarkan:</label>
                    <div class="col-md-2">
                          <select class="form-control" name="nama_kategori">
                            <option>Terbaru</option>
                          </select>
                      </div>
                      <label class="control-label col-md-1.5" for="first-name">Urutkan Harga:</label>
                    <div class="col-md-2">
                          <select class="form-control" name="nama_kategori">
                            <option>Acak</option>
                          </select>
                      </div>
                      </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                            <!-- end product category  -->
                                   <!-- product sales  -->
                            <!-- ============================================================== -->
                            
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
                                        {{ csrf_field() }}
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
                                <!-- ============================================================== -->
                                <!-- end top perfomimg  -->
                                <!-- ============================================================== -->
                            </div>
                        </div>
                        <script type="text/javascript">


    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('regency')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").prop('disabled', false);
                $("#state").empty();
                // $("#state").append('<option value="">--- Pilih Kota/Kabupaten ---</option>');
       
                $.each(res.data,function(key,value){
                    $("#state").append('<option value="'+value.province_name+'">'+value.name+'</option>');
                });
           
            }else{

               $("#state").empty();
            }
           }
        });
    }else{
         $("#state").prop('disabled', true);
        $("#state").empty();
        $("#state").append('<option value="">--- Pilih Kota/Kabupaten ---</option>');
    }      
   });

  

   $('#state').change(function(){
    var countryID = $(this).val();    
    
        $.ajax({
           type:"GET",
           url:"{{url('show')}}?country_id="+countryID,
           
           success:function(res){               
            
                 
                 
                // $("#state").append('<option value="">--- Pilih Kota/Kabupaten ---</option>');
       // $.each(res.data,function(key,value){
       //   // the HTML content that controller has produced
       //   $("#provinsi").append('<h3>'+value.region.province_name+'</h3>');
            
            $("#table-responsive").html(res);
                    
                
       //      });        
        
    
                    
                
           
            
           }
        
          
   });
   });
   
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>

                        @endsection
                        
@endsection