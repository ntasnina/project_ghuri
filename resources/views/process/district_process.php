<?php
$sd = $_POST['selectedDivision'];
$connection = mysqli_connect("localhost","root","1234");
    if(!$connection){
        die("Database connection failed:".mysql_error());
    }
    mysqli_select_db($connection,"ghuri");
    
    
    $query = "select distinct DISTRICT_NAME,DIVISION_NAME
              from upazilla
              where division_name = '$sd'
              order by DISTRICT_NAME
              " ;
    
    $result_array = mysqli_query( $connection,$query );
   
    if (!$result_array) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
    }
    //$districts = array();
    while($row = mysqli_fetch_array($result_array, MYSQLI_BOTH))
    {
        //echo $row["PROVIDER_ID"]." ".$row["ACCOMODATION_NAME"]. " " .$row["ACCOMODATION_TYPE"]. "<br>";
        $districts[] = $row['DISTRICT_NAME'];
        
    
    }


if(isset($_POST['selectedDivision']) && $_POST['selectedDivision'] != "")
{
    if(isset($districts))
        {
            echo "<option disabled>Choose a District</option>";
            echo "<option selected>Any</option>";
            foreach($districts as $val)
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
close($connection);
?>
