<?php
    $divisionSelected = $_POST['division']; 
    $districtSelected = $_POST['district'];
    $upazillaText = $_POST['upazilla'];
    $spotName = ucwords($_POST['spot_name']);
    $description = $_POST['description'];
    $starValue = $_POST['star'];
    
    //echo $divisionSelected, $districtSelected, $upazillaText,$spotName, $description,$starValue;
?>
<?php require_once("includes/db_connect_select.php"); ?>
<?php require("functions/insert_tourist_spot_function.php"); ?>

 <?php
            
            $upazilla_id = find_upazilla_id($upazillaText, $districtSelected, $divisionSelected);
            
            if(!find_spot_id($spotName,$upazilla_id,$description,$starValue))
                insert_tourist_spot($spotName,$upazilla_id,$description,$starValue);
                
                
            $spot_id =find_spot_id($spotName,$upazilla_id,$description,$starValue);
            
            
?>

    
    
    
                 
                  
        <div class="form-group">
                    <input type="file" class ="hidden" name="fileToUpload" id="fileToUpload" required>
                    
                    <div id="imagePreview" class="image_class"></div>
                    <span class="help-block">Max size: 2MB.</span>
                    
                    <div>
                    <button class="button" id="upload_button" type="submit" >Save</button>
                    </div>
                    </div>
                  
                    
       
        <form id="skip-form" action="home_page.php" method="post" class="form-horizontal">
               <div class="col-sm-8">
                </div>
              <button class="btn-link btn-lg"  action="home_page.php" id="skip-button" type="submit" >Skip</button>
             
            
            
        </form>
     
     <script type="text/javascript">
     $(function() {
        $("#fileToUpload").on("change", function()
        {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
    
            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
    
                reader.onloadend = function(){ // set image data as background of div
                    $("#imagePreview").css("background-image", "url("+this.result+")");
                }
            }
        });
    });
    </script>
     <script type="text/javascript">
     $("#imagePreview").click(function(){
     $("#fileToUpload").click();
     });
     </script>
   
