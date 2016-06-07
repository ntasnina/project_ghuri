<?php include("functions/insert_photo_function.php")?>
<?php
$target_dir = "uploads/";
$photo_file=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_SESSION["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
       // echo "File is not an image.";
        $uploadOk = 0;
    }
    echo $check;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //echo $target_file;
        session_start();
        $spot_id=$_SESSION['spotID'];
        insert_photo($photo_file, $spot_id);
    } else {
        echo "Sorry, there was an error uploading your file. May be your file size is too big. Try again.";
    }
}
?>
<!--?php include("success_page.php");?-->



<html>
    <?php include("includes/link_style.php"); ?>
    
    <head>
        
        <title>Success Page</title>
        
        <link rel="stylesheet" href="css/animate.min.css">
        
    </head>
     <body>
        <?php include("includes/navigation_bar.php");?>
        <div class="container">

        <div style="max-width: 800px; margin: auto;">
            <!--h1 class="page-header" data-animation="animated bounceInDown">Thank You For Your Contribution. </h1=-->
            <img src="images/thank_you1.jpg" alt="Chania" width="700" height="500" class="animated bounceInDown"> 
        </div>
        
        <form class="form-horizontal" action = "home_page.php" role="form">
        <div class="form-group">        
		      <div class="col-sm-offset-4 col-sm-10">
		      <button type="submit" name="Back_home_button" action="home_page.php" class="button">Home</button>
                      </div>
	</div>
        </form>
      </div> 
     </body>
</html>
