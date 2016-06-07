<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PlaceModel extends Model
{
    protected $primaryKey = 'UPAZILLA_ID';
    protected $table = 'upazilla';
    public $timestamps = false;
   
    
    public static function findUpazillas($districtName)
    {
        return DB::select('select distinct UPAZILLA_NAME from upazilla where DISTRICT_NAME=?',[$districtName]);
    }
    public static function findDistricts($divisionName)
    {
        return DB::select('select distinct DISTRICT_NAME from upazilla where DIVISION_NAME=?',[$divisionName]);
        
        
    
    }
    public static function findSpots($upazillaID)
    {
    
        //echo $upazillaID;
        return DB::select('select distinct SPOT_NAME from tourist_spot where UPAZILLA_ID=?',[$upazillaID]);
       
        
        
    
    }
    
    public static function findDistrictSpots($district_name)
    {
        $uId=PlaceModel::where('DISTRICT_NAME',$district_name)->lists('UPAZILLA_ID');
        $query=array();
        foreach($uId as $upazillaID)
        
        array_push($query,DB::select('select distinct SPOT_NAME from tourist_spot where UPAZILLA_ID=?',[$upazillaID]));
        return $query;
    
    }
    
}
?>