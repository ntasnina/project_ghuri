<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<form class="form-horizontal" method="POST" action="{{ url('/').'/process_add_restaurant'}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
  <div class="form-group">
    <label class="control-label col-sm-1" for="food_name">Food:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="food_name" name = "food_name" placeholder="Enter Food Name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="food_type">Food_Type:</label>
    <div class="col-sm-4 selectContainer">
       <select id="food_type" name="food_type" class="form-control" required >
	  <option selected disabled>Choose a Food type</option>
	  <option>Bangla</option>
	  <option>Thai</option>
	  <option>Chinese</option>
	  <option>Indian</option>
	  <option>Moghlai</option>
	  <option>Others</option>
	  
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_name">Restaurant:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="Enter Restaurant Name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_specialization">Speciality:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="restaurant_specialization" name="restaurant_specialization" placeholder="Enter Restaurant Speciality">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="restaurant_division" name = "restaurant_division"class="form-control" required>
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
    <label class="control-label col-sm-1" for="restaurant_district">District:</label>
     <div class="col-sm-4 selectContainer">
       <select id="restaurant_district" name="restaurant_district" class="form-control" required>
	  <option value ='' selected disabled>Choose District</option>
	  
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_upazilla">Upazilla:</label>
     <div class="col-sm-4 selectContainer">
      <select id="restaurant_upazilla" name="restaurant_upazilla" class="form-control" required>
	  <option value='' selected disabled>Choose Upazilla</option>  
      </select>
    </div>
  </div>
  
  

  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_contact_info">Contact:</label>
    <div class="col-sm-10">          
      <input type="number" class="form-control" id="restaurant_contact_info" name="restaurant_contact_info" placeholder="Enter Contact Info">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_address">Address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="restaurant_address" name ="restaurant_address" placeholder="Enter Address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_facebook">Facebook:</label>
    <div class="col-sm-10">          
      <input type="text" class="form-control" id="restaurant_facebook" name="restaurant_facebook" placeholder="Enter Facebook Address">
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_price">Price:</label>
    <div class="col-sm-10">          
      <input type="number" class="form-control" id="restaurant_price" name="restaurant_price" placeholder="Enter Price Per Day">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="proportion">Proportion:</label>
    <div class="col-sm-10">          
      <input type="number" class="form-control" id="proportion" name="proportion" placeholder="Enter proportion Per Serve">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="rating">Rating:</label>
    <div class="col-sm-10">
       <div class="stars">

	  <input class="star star-5" id="star-5" type="radio" name="restaurant_star" value=5/ required>
	  <label class="star star-5" for="star-5"></label>

	  <input class="star star-4" id="star-4" type="radio" name="restaurant_star" value=4/ required>
	  <label class="star star-4" for="star-4"></label>

	  <input class="star star-3" id="star-3" type="radio" name="restaurant_star" value=3/ required>
	  <label class="star star-3" for="star-3"></label>

	  <input class="star star-2" id="star-2" type="radio" name="restaurant_star" value=2/ required>
	  <label class="star star-2" for="star-2"></label>

	  <input class="star star-1" id="star-1" type="radio" name="restaurant_star" value=1/ required>
	  <label class="star star-1" for="star-1"></label>

      </div>
    </div>
  </div>
 
  
  
  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" action ="add_restaurant_process.php" name='addButton' class="btn btn-primary" >Add</button>
      <!--button type="submit" name='CancelButton' class="btn btn-primary">Cancel</button-->
    </div>
  </div>
</form>
<script>
$('#restaurant_division').on('change',function(e){
    console.log(e);
    
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    /*$('#restaurant_district').empty();
    $('#restaurant_upazilla').empty();
    
    $('#restaurant_district').append($('<option>', {
    value: "Any",
    text: 'Any'
    }));
    $('#restaurant_upazilla').append($('<option>', {
    value: "Any",
    text: 'Any'
    }));*/

//$('#accommodation_upazilla').empty();
$.getJSON('ajax_district?division_name='+division_name,function(data){
     //console.log(data);
    
    $.each(data ,function(index,district_object){
       
       $('#restaurant_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
       
    });
    
});
});
</script>
<script>
$('#restaurant_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	/*$('#restaurant_upazilla').empty();
	$('#restaurant_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');*/
	$.each(data ,function(index,upazilla_object){
	   
	   $('#restaurant_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>