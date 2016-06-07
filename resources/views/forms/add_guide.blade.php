<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<form class="form-horizontal" method="POST" action="{{ url('/').'/process_add_guide'}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
<div class="form-group">
   <label class="control-label col-sm-2" for="guide_name">Guide Name</label>
   <div class="col-sm-4">
     <input type="text" class="form-control" id="guide_name" name="guide_name" placeholder="Enter Guide Name" required>
  
   </div>
   <div class="col-sm-4">
     
      <span class="help-block"><p style="opacity: 0.5; font-size: 12px">Please avoid special characters like '.</p></span>
   </div>
 </div>
 
  <div class="form-group">
    <label class="control-label col-sm-2" for="guide_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="guide_division" name="guide_division" class="form-control"required>
	  
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
    <label class="control-label col-sm-2" for="guide_district">District:</label>
     <div class="col-sm-4 selectContainer">
       <select id="guide_district" name="guide_district" class="form-control"required>
	  <option value =''selected disabled>Choose District</option>
	  
	</select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="guide_from_spot">From Spot:</label>
    <div class = "row">
     <div class="col-sm-4 selectContainer">
      <select id="guide_from_spot" name="guide_from_spot" class="form-control">
	  <option value ='' selected disabled>Choose a Spot Name</option>  
      </select>
     </div>
     <div class="col-sm-4">
	 <input type="text" class="form-control" value ='' id="guide_from_spot_name" name="guide_from_spot_name" placeholder="Enter Spot Name"required>
     </div>
    </div>
   </div>
  
   
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="guide_to_spot">To Spot:</label>
    <div class= "row">
     <div class="col-sm-4 selectContainer">
      <select id="guide_to_spot" name="guide_to_spot" class="form-control">
	  <option value =''selected disabled>Choose a Spot Name</option>
      </select>
     </div>
     <div class="col-sm-4">
      <input type="text" class="form-control" value ='' id="guide_to_spot_name" name="guide_to_spot_name" placeholder="Enter Spot Name"required>
     </div>
     </div>
   </div>
  
   
  <div class="form-group">
    <label class="control-label col-sm-2" for="guide_address">Address:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="guide_address" name = "guide_address" placeholder="Enter Address">
    </div>
  </div>
 
  <div class="form-group">
    <label class="control-label col-sm-2" for="guide_contact_info">Contact:</label>
    <div class="col-sm-4">          
      <input type="number" class="form-control" id="guide_contact_info" name="guide_contact_info" placeholder="Enter Contact Info">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="fee">Fee:</label>
    <div class="col-sm-4">          
      <input type="number" class="form-control" id="fee" name="fee" placeholder="Enter Fee Per Trip" required>
    </div>
  </div>
  
  

 
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="rating">Rating:</label>
    <div class="col-sm-10">
       <div class="stars">

	  <input class="star star-5" id="star-5" type="radio" name="guide_star" value=5/ required>
	  <label class="star star-5" for="star-5"></label>

	  <input class="star star-4" id="star-4" type="radio" name="guide_star" value=4/ required>
	  <label class="star star-4" for="star-4"></label>

	  <input class="star star-3" id="star-3" type="radio" name="guide_star" value=3/ required>
	  <label class="star star-3" for="star-3"></label>

	  <input class="star star-2" id="star-2" type="radio" name="guide_star" value=2/ required>
	  <label class="star star-2" for="star-2"></label>

	  <input class="star star-1" id="star-1" type="radio" name="guide_star" value=1/ required>
	  <label class="star star-1" for="star-1"></label>

      </div>
    </div>
  </div>
 
  
  
  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" name='addButton' class="btn btn-primary">Add</button>
      <!--button type="submit" name='CancelButton' class="btn btn-primary">Cancel</button-->
    </div>
  </div>
</form>
    
<script>
    $('#guide_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#guide_district').empty();
    
    
    $('#guide_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#guide_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
    
<script>
$('#guide_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_guide_spot?district_name='+district_name,function(data){
	 //console.log(data);
	$('#guide_from_spot').empty();
	$('#guide_to_spot').empty();
	$.each(data ,function(index,upazilla_object){
	   $.each(upazilla_object ,function(key,spot_object)
	   {
		$('#guide_from_spot').append('<option value="'+spot_object.SPOT_NAME+'">'+spot_object.SPOT_NAME+'</option>');
		$('#guide_to_spot').append('<option value="'+spot_object.SPOT_NAME+'">'+spot_object.SPOT_NAME+'</option>');
	   });
	});
	
    });
});
</script>

<script>
$('#guide_from_spot').on('change',function(e){
    console.log(e);
   
    var spot=e.target.value;
    //$('#accommodation_district').empty();
    document.getElementById('guide_from_spot_name').value=spot;
    
});
</script>
<script>
$('#guide_to_spot').on('change',function(e){
    console.log(e);
   
    var spot=e.target.value;
    //$('#accommodation_district').empty();
    document.getElementById('guide_to_spot_name').value=spot;
    
});
</script>

