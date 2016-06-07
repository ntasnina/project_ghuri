
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
{!!  Form::open(['url'=>'process_add_tourist_spot', 'files'=>true,'class' => 'form-horizontal']) !!}


<div class="form-group">
  <label class="control-label col-sm-1" for="add_spot_division">Division:</label>
  <div class="col-sm-4 selectContainer">
     <select id="add_spot_division" name="add_spot_division" class="form-control" required>
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
  <label class="control-label col-sm-1" for="add_spot_district">District:</label>
   <div class="col-sm-4 selectContainer">
    <select id="add_spot_district" name="add_spot_district" class="form-control" required>
	<option value =''  selected disabled>Choose District</option>
    </select>
  </div>
</div>
    
<div class="form-group">
  <label class="control-label col-sm-1" for="add_spot_upazilla">Upazilla:</label>
   <div class="col-sm-4 selectContainer">
    <select id="add_spot_upazilla" name="add_spot_upazilla" class="form-control"required>
	<option value ='' selected disabled>Choose Upazilla</option>  
    </select>
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-1" for="add_spot">Spot:</label>
  <div class = "row">
   <div class="col-sm-4 selectContainer">
    <select id="add_spot" name="add_spot" class="form-control">
	<option value ='' selected disabled>Choose a Spot Name</option>  
    </select>
   
  </div>
   <div class="col-sm-5">
    <input type="text" class="form-control" value ='' id="add_spot_name" name="add_spot_name" placeholder="Enter Spot Name"required>
  </div>
   </div>
 </div>
       

<div class="form-group">
    <label class="control-label col-sm-1" for="spot_description">Description:</label>
    <div class="col-sm-10">
	<textarea class="form-control" rows="5" value= "spot_description" id="spot_description" name="spot_description"></textarea>
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
<!--div id="validation-errors"></div-->
<div class="form-group">
    <div class="col-sm-10">
	<label class="control-label col-sm-1" for="add_image">Upload</label>
	<input type="file" name="image" id="image" required>
<!--div class="span5">
	<div id="output" style="display:none"></div>
</div-->
    </div>
</div>

<div class="form-group">        
  <div class="col-sm-offset-1 col-sm-10">
    <button type="submit" name='addTouristSpotButton' class="btn btn-primary">Add</button>
    <!--button type="submit" name='CancelButton' class="btn btn-primary">Cancel</button-->
  </div>
</div>

                    
{{ Form::close() }}            

<script>
    $('#add_spot_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#add_spot_district').empty();
    $('#add_spot_upazilla').empty();
    
    $('#add_spot_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#add_spot_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#add_spot_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#add_spot_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#add_spot_upazilla').empty();
	$('#add_spot_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#add_spot_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#add_spot_upazilla').on('change',function(e){
    console.log(e);
   
    var upazilla_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_tourist_spot?upazilla_name='+upazilla_name,function(data){
	 //console.log(data);
	$('#add_spot').empty();
	$('#add_spot').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,spot_object){
	   
	   $('#add_spot').append('<option value="'+spot_object.SPOT_NAME+'">'+spot_object.SPOT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#add_spot').on('change',function(e){
    console.log(e);
   
    var spot=e.target.value;
    //$('#accommodation_district').empty();
    document.getElementById('add_spot_name').value=spot;
    
});
</script>
<!--script>
$(document).ready(function() {
	var options = { 
                beforeSubmit:  showRequest,
		success:       showResponse,
		dataType: 'json' 
        }; 
 	$('body').delegate('#image','change', function(){
 		$('#upload').ajaxForm(options).submit();  		
 	}); 
});		
function showRequest(formData, jqForm, options) { 
	$("#validation-errors").hide().empty();
	$("#output").css('display','none');
    return true; 
} 
function showResponse(response, statusText, xhr, $form)  { 
	if(response.success == false)
	{
		var arr = response.errors;
		$.each(arr, function(index, value)
		{
			if (value.length != 0)
			{
				$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
			}
		});
		$("#validation-errors").show();
	} else {
		 $("#output").html("<img src='"+response.file+"' />");
		 $("#output").css('display','block');
	}
}
   
</script-->