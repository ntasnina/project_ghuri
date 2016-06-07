
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>
    <h1 class="well well-lg">Upload Image</h1>
    <div class="container">
    @if(isset($success))
        <div class="alert alert-success"> {{$success}} </div>
    @endif
    <div id="validation-errors"></div>
	{!!  Form::open(['url'=>'image', 'files'=>true]) !!}  

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>5] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Choose an image') !!}
            {!! Form::file('image') !!}
        </div>
	<div class="span5">
		<div id="output" style="display:none"></div>
	</div>

        <div class="form-group">
            {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
        </div>
		

        {{ Form::close() }}
        <div class="alert-warning">
            @foreach( $errors->all() as $error )
               <br> {{ $error }}
            @endforeach
        </div>
    </div>
</body>
</html>
<script>
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
   
</script>