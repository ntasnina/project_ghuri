<?php
//fetch districts from database according to chosen division
$sd = $_POST['selectedDivision'];
echo $sd;

    $districts = array();
    foreach($list as $divisionName=>$val)
    {
        //echo $row["PROVIDER_ID"]." ".$row["ACCOMODATION_NAME"]. " " .$row["ACCOMODATION_TYPE"]. "<br>";
        foreach($val as $districtName=>$upazilla)
        {
            $districts[] = $districtName;
            
        }
    
    }


if(isset($_POST['selectedDivision']) && $_POST['selectedDivision'] != "")
{
    if(isset($districts))
        {
            echo "<option selected disabled>Choose a District</option>";
            foreach($districts as $val)
                {
                    echo "<option>$val</option>";
                }
        }
    else
        {
            echo "<option>--Select District--</option>";
        }
}
else
{
    echo "<option>--Select District--</option>";
}

?>