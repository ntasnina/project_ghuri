<?php
//fetch districts from database according to chosen division
    $sd = $_POST['selectedDistrict'];
    echo $sd;
   

    /*$result_array = mysqli_query( $connection,$query );
   
    if (!$result_array) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
    }
    $upazillas = array();
    while($row = mysqli_fetch_array($result_array, MYSQLI_BOTH))
    {
        //echo $row["PROVIDER_ID"]." ".$row["ACCOMODATION_NAME"]. " " .$row["ACCOMODATION_TYPE"]. "<br>";
        $upazillas[] = $row['UPAZILLA_NAME'];
        
    
    }*/
    $sdiv;
    foreach($list as $division=>$val)
    {
        foreach($val as $district=>$upazilla )
        {
            if($district==$sd)
            {
                $sdiv=$division;
                break;
            }
        }
    }
    foreach($list[$sdiv][$sd] as $upazillaName)
    {
        //echo $row["PROVIDER_ID"]." ".$row["ACCOMODATION_NAME"]. " " .$row["ACCOMODATION_TYPE"]. "<br>";
        $upazillas[] = $upazillaName;
        
    
    }


if(isset($_POST['selectedDistrict']) && $_POST['selectedDistrict'] != "")
{
    echo "<option disabled>Choose an Upazilla</option>";
    echo "<option selected>Any</option>";
    if(isset($upazillas))
        {
            foreach($upazillas as $val)
                {
                    echo "<option>$val</option>";
                }
        }
    else
        {
            echo "<option selected>Any</option>";
        }
}
else
{
    echo "<option selected>Any</option>";
}
?>
