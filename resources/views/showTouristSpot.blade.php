<!DOCTYPE html>
<html>
    <head>
       
    </head>
    <body>
    <!--user id for the reviewer and user for the photo uploader-->
        <?php
            $queryResult=$result;
            foreach($queryResult as $q)
            {
                
                echo $q['SPOT_NAME'], $q['DESCRIPTION'], $q['RATING'], $q['PHOTO_FILE'], $q['USER'], $q['USER_ID'];
                
                
            }
            ?>
        
        <div class="container">
            <div class="content">
                <div class="title">Hello</div>
            </div>
        </div>
    </body>
</html>
