<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<form class="form-horizontal" method="POST" action="{{ url('/').'/process_add_transport'}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
<div class="form-group">
  <label class="control-label col-sm-2" for="transport_name">Company:</label>
  <div class="col-sm-4">
    <input type="text" class="form-control" id="transport_name" name = "transport_name" placeholder="Enter Tansport Company Name" required>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="transport_address">Address:</label>
  <div class="col-sm-4">
    <input type="text" class="form-control" id="transport_address" name = "transport_address" placeholder="Enter Address">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="select_transport_type">Tansport_Type:</label>
  <div class="col-sm-4 selectContainer">
     <select id="select_transport_type" name="select_transport_type" class="form-control">
	<option value ='' selected disabled>Choose a Transport type</option>
	<option value ='Highway Bus'>Highway Bus</option>
	<option value ='Train'>Train</option>
	<option value ='Plane'>Plane</option>
	<option value ='Local Bus'>Local Bus</option>
	<option value ='Chander Gari'>Chander Gari</option>
	<option value ='Auto Rickshaw'>Auto Rickshaw</option>
	
    </select>
</div>
   <div class="col-sm-4">
       <input type="text" class="form-control" id="transport_type" value ='' name="transport_type" placeholder="Enter Transport Type" required>
   </div>
  </div>


 <div class="form-group">
  <label class="control-label col-sm-2" for="transport_from_division">From Division:</label>
  <div class="col-sm-4 selectContainer">
     <select id="transport_from_division" name="transport_from_division" class="form-control"required>
	<option value ='' selected disabled>Choose Division</option>
	<option value ='Dhaka' >Dhaka</option>
	<option value ='Chittagong' >Chittagong</option>
	<option value ='Sylhet' >Sylhet</option>
	<option value ='Barisal' >Barisal</option>
	<option value ='Rajshahi' >Rajshahi</option>
	<option value ='Khulna' >Khulna</option>
	<option value ='Rangpur' >Rangpur</option>
	<option value ='Mymensingh' >Mymensingh</option>
      </select>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="transport_from_district">From District:</label>
   <div class="col-sm-4 selectContainer">
     <select id="transport_from_district" name="transport_from_district" class="form-control"required>
	<option value='' selected disabled>Choose District</option>
	
      </select>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="transport_from_upazilla">From Upazilla:</label>
   <div class="col-sm-4 selectContainer">
    <select id="transport_from_upazilla" name="transport_from_upazilla" class="form-control"required>
	<option value='' selected disabled>Choose Upazilla</option>  
    </select>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="transport_from_tourist_spot">From Spot:</label>
  <div class = "row">
   <div class="col-sm-4 selectContainer">
    <select id="transport_from_tourist_spot" name="transport_from_tourist_spot" class="form-control">
	<option value='' selected disabled>Choose a Spot Name</option>  
    </select>
   </div>
   <div class="col-sm-4">
       <input type="text" class="form-control"  id="transport_from_spot_name" value ='' name="transport_from_spot_name" placeholder="Enter Spot Name">
   </div>
  </div>
 </div>

 
<div class="form-group">
  <label class="control-label col-sm-2" for="transport_to_division">To Division:</label>
  <div class="col-sm-4 selectContainer">
     <select id="transport_to_division" name="transport_to_division" class="form-control"required>
	<option value ='' selected disabled>Choose Division</option>
	<option value ='Dhaka' >Dhaka</option>
	<option value ='Chittagong' >Chittagong</option>
	<option value ='Sylhet' >Sylhet</option>
	<option value ='Barisal' >Barisal</option>
	<option value ='Rajshahi' >Rajshahi</option>
	<option value ='Khulna' >Khulna</option>
	<option value ='Rangpur' >Rangpur</option>
	<option value ='Mymensingh' >Mymensingh</option>
      </select>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="transport_to_district">To District:</label>
   <div class="col-sm-4 selectContainer">
     <select id="transport_to_district" name="transport_to_district" class="form-control"required>
	<option value='' selected disabled>Choose District</option>
	
      </select>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="transport_to_upazilla">To Upazilla:</label>
   <div class="col-sm-4 selectContainer">
    <select id="transport_to_upazilla" name="transport_to_upazilla" class="form-control"required>
	<option value='' selected disabled>Choose Upazilla</option>  
    </select>
  </div>
</div>

 <div class="form-group">
  <label class="control-label col-sm-2" for="transport_to_tourist_spot">To Spot:</label>
  <div class= "row">
   <div class="col-sm-4 selectContainer">
    <select id="transport_to_tourist_spot" name="transport_to_tourist_spot" class="form-control">
	<option value='' selected disabled>Choose a Spot Name</option>
    </select>
   </div>
   <div class="col-sm-4">
    <input type="text" class="form-control" id="transport_to_spot_name" value ='' name="transport_to_spot_name" placeholder="Enter Spot Name">
   </div>
   </div>
 </div>






<div class="form-group">
  <label class="control-label col-sm-2" for="transport_contact_info">Contact:</label>
  <div class="col-sm-4">          
    <input type="number" class="form-control" id="transport_contact_info" name="transport_contact_info" placeholder="Enter Contact Info">
  </div>
</div>




<div class="form-group">
  <label class="control-label col-sm-2" for="price_per_ticket">Price/Ticket:</label>
  <div class="col-sm-4">          
    <input type="number" class="form-control" id="price_per_ticket" name="price_per_ticket" placeholder="Enter Price Per Ticket">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="price_per_trip">Price/Trip:</label>
  <div class="col-sm-4">          
    <input type="number" class="form-control" id="price_per_trip" name="price_per_trip" placeholder="Enter Price Per Trip">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="transport_rating">Rating:</label>
  <div class="col-sm-4">
     <div class="stars">

	<input class="star star-5" id="t_star-5" type="radio" name="transport_star" value=5/ required>
	<label class="star star-5" for="t_star-5"></label>

	<input class="star star-4" id="t_star-4" type="radio" name="transport_star" value=4/ required>
	<label class="star star-4" for="t_star-4"></label>

	<input class="star star-3" id="t_star-3" type="radio" name="transport_star" value=3/ required>
	<label class="star star-3" for="t_star-3"></label>

	<input class="star star-2" id="t_star-2" type="radio" name="transport_star" value=2/ required>
	<label class="star star-2" for="t_star-2"></label>

	<input class="star star-1" id="t_star-1" type="radio" name="transport_star" value=1/ required>
	<label class="star star-1" for="t_star-1"></label>

    </div>
  </div>
</div>



<div class="form-group">        
  <div class="col-sm-offset-1 col-sm-10">
    <button type="submit" name='addTransportButton' class="btn btn-primary">Add</button>
    <!--button type="submit" name='CancelButton' class="btn btn-primary">Cancel</button-->
  </div>
</div>
</form>

<script>
$('#select_transport_type').on('change',function(e){
    console.log(e);
   
    var t_type=e.target.value;
    document.getElementById('transport_type').value=t_type;
    
});
</script>

<script>
$('#transport_from_tourist_spot').on('change',function(e){
    console.log(e);
   
    var spot_name=e.target.value;
    document.getElementById('transport_from_spot_name').value=spot_name;
    
});
</script>
    
<script>
$('#transport_to_tourist_spot').on('change',function(e){
    console.log(e);
   
    var to_spot=e.target.value;
    document.getElementById('transport_to_spot_name').value=to_spot;
    
});
</script>

</script>
    
<script>
$('#transport_from_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#transport_from_district').empty();
    $('#transport_from_upazilla').empty();
    
    $('#transport_from_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#transport_from_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#transport_from_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_from_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#transport_from_upazilla').empty();
	$('#transport_from_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#transport_from_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_from_upazilla').on('change',function(e){
    console.log(e);
   
    var upazilla_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_tourist_spot?upazilla_name='+upazilla_name,function(data){
	 //console.log(data);
	$('#transport_from_tourist_spot').empty();
	$('#transport_from_tourist_spot').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,spot_object){
	   
	  $('#transport_from_tourist_spot').append('<option value="'+spot_object.SPOT_NAME+'">'+spot_object.SPOT_NAME+'</option>');
	  
	});
	
    });
});
</script>
<script>
$('#transport_to_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#transport_to_district').empty();
    $('#transport_to_upazilla').empty();
    
    $('#transport_to_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#transport_to_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
     
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#transport_to_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_to_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#transport_to_upazilla').empty();
	$('#transport_to_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#transport_to_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_to_upazilla').on('change',function(e){
    console.log(e);
   
    var upazilla_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_tourist_spot?upazilla_name='+upazilla_name,function(data){
	 //console.log(data);
	$('#transport_to_tourist_spot').empty();
	$('#transport_to_tourist_spot').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,spot_object){
	   
	   $('#transport_to_tourist_spot').append('<option value="'+spot_object.SPOT_NAME+'">'+spot_object.SPOT_NAME+'</option>');
	   
	});
	
    });
});
</script>
