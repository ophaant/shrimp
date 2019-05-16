<!DOCTYPE html>
<html>
<head>
    <title>Dependent country state city dropdown using ajax in PHP Laravel Framework</title>
    <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css">    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Dependent country state city dropdown using ajax in PHP Laravel Framework</div>
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Select Country:</label>
                <select class="form-control" name="country" id="country">
                                <option value="" selected="selected">--- Pilih Provinsi ---</option>
                            @foreach ($response->data as $proid => $name) {
<option value="{{$name->province_name}}">{{ $name->province_name }}</option>

@endforeach   
                          </select>
               
            </div>
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" id="state" class="form-control" style="width:350px">
                </select>
            </div>
         
            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" id="city" class="form-control" style="width:350px">
                </select>
            </div>
      </div>
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
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res.data,function(key,value){
                    $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>
</body>
</html>