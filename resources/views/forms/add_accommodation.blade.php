<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<form class="form-horizontal" method="POST" action="{{ url('/').'/process_add_accommodation'}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
  <div class="form-group">
    <label class="control-label col-sm-1" for="accommodation_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="accommodation_division" name = "accommodation_division" class="form-control" required>
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
    <label class="control-label col-sm-1" for="accommodation_district">District:</label>
     <div class="col-sm-4 selectContainer">
       <select id="accommodation_district" name="accommodation_district" class="form-control" required>
	  <option  value ='' selected disabled>Choose District</option>
	  
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="accommodation_upazilla">Upazilla:</label>
     <div class="col-sm-4 selectContainer">
      <select id="accommodation_upazilla" name = "accommodation_upazilla" class="form-control"required>
	  <option  value =''selected disabled>Choose Upazilla</option>  
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="provider_name">Provider:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="provider_name" name = "provider_name" placeholder="Enter Provider Name" required>
    </div>
  </div>
  <div class="form-group">
      <!--div class="row"-->
      <label class="control-label col-sm-1" for="provider_type">Type:</label>
	  <div class="col-sm-9">
	      <div>
		  <label >
		      <input type="radio" id="provider_type" name="provider_type" value="private" required /> Private
		  </label> 
		  <label >
		      <input type="radio" id="provider_type" name="provider_type" value="business" required/> Business
		  </label> 
		  
	      </div>
	  </div>
      <!--/div-->
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="contact_info">Contact:</label>
    <div class="col-sm-10">          
      <input type="number" class="form-control" id="contact_info" name ="contact_info" placeholder="Enter Contact Info">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="address">Address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name = "address"placeholder="Enter Address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="facebook">Facebook:</label>
    <div class="col-sm-10">          
      <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook Address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="room_type">Room_Type:</label>
    <div class="col-sm-4 selectContainer">
       <select id="room_type" name="room_type" class="form-control" required>
	  <option selected disabled>Choose a Room type</option>
	  <option>Standard</option>
	  <option>Family</option>
	  <option>Suite</option>
	  <option>Resort</option>
	  <option>Cottage</option>
	  
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="no_of_rooms">Total_Room:</label>
    <div class="col-sm-10">          
      <input type="number" class="form-control" id="no_of_rooms" name="no_of_rooms" placeholder="Enter No of Rooms" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="capacity">Capacity:</label>
    <div class="col-sm-10">          
      <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter Capacity of Rooms" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="price">Price:</label>
    <div class="col-sm-10">          
      <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price Per Day">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="rating">Rating:</label>
    <div class="col-sm-10">
       <div class="stars">

	  <input class="star star-5" id="star-5" type="radio" name="star" value=5/ required>
	  <label class="star star-5" for="star-5"></label>

	  <input class="star star-4" id="star-4" type="radio" name="star" value=4/ required>
	  <label class="star star-4" for="star-4"></label>

	  <input class="star star-3" id="star-3" type="radio" name="star" value=3/ required>
	  <label class="star star-3" for="star-3"></label>

	  <input class="star star-2" id="star-2" type="radio" name="star" value=2/ required>
	  <label class="star star-2" for="star-2"></label>

	  <input class="star star-1" id="star-1" type="radio" name="star" value=1/ required>
	  <label class="star star-1" for="star-1"></label>

      </div>
    </div>
  </div>
 
  
  
  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" name='addButton'  class="btn btn-primary">Add</button>
      <!--button type="submit" name='CancelButton' class="btn btn-primary">Cancel</button-->
    </div>
  </div>
</form>
	
<script>
    $('#accommodation_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#accommodation_district').empty();
    $('#accommodation_upazilla').empty();
    
    $('#accommodation_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#accommodation_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#accommodation_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#accommodation_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#accommodation_upazilla').empty();
	$('#accommodation_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#accommodation_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>