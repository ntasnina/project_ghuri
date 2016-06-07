<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\PlaceModel;
class AccommodationModel extends Model
{
    protected $primaryKey = 'PROVIDER_ID';
    protected $table = 'accommodation_provider';
    public $timestamps = false;
    public static function findAccommodation($division,$district, $upazilla,$type,$capacity)
     {
        //echo $upazilla, $type, $capacity;
        if($upazilla!='Any')
        {
            $uId=PlaceModel::where('UPAZILLA_NAME',$upazilla)->lists('UPAZILLA_ID');
            //$upazillaId=$uId->UPAZILLA_ID;
        }
        elseif ($district != "Any")
       {
           $uId=PlaceModel::where('DISTRICT_NAME',$district)->lists('UPAZILLA_ID');
           //$upazillaId=$uId->UPAZILLA_ID;
       
           
       }
       else
       {
           $uId=PlaceModel::where('DIVISION_NAME',$division)->lists('UPAZILLA_ID');
          // $upazillaId=$uId->UPAZILLA_ID;
           
       }
       $query=array();
        if($type == "Any" && $capacity !="More")
        {
            foreach($uId as $upazillaId)
            
            {
             //$upazillaId= $ud.'UPAZILLA_ID';
             //echo gettype($upazillaId);
             //echo $upazillaId;
            
             array_push($query,(DB::select ('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,
                                      S.ROOM_TYPE,S.CAPACITY,
                                       C.PRICE, C.RATING
                                       from accommodation_provider P
                                       inner join provider_specification_connection C
                                       on P.provider_id = C.provider_id
                                       inner join accommodation_specification S
                                       on S.specification_id = C.specification_id
                                       where S.CAPACITY=? and P.upazilla_id=? order by C.PRICE,
                                       C.RATING desc,P.accomodation_type',[$capacity,$upazillaId])));
           }
        }
        elseif($type != "Any" && $capacity =="More")
        {
             foreach($uId as $upazillaId)
            {
                
                array_push($query,( DB::select('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,
                                     S.ROOM_TYPE,
                                      C.PRICE, C.RATING
                                      from accommodation_provider P
                                      inner join provider_specification_connection C
                                      on P.provider_id = C.provider_id
                                      inner join accommodation_specification S
                                      on S.specification_id = C.specification_id
                                      where S.room_type = ? AND S.capacity > ? and P.upazilla_id =? 
                                      order by C.PRICE, C.RATING desc, P.accomodation_type',[$type,10,$upazillaId])));
            }                             
        }
        elseif($type != "Any" && $capacity !="More")
        {
          foreach($uId as $upazillaId)
            {
                                    array_push($query,(DB::select('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,
                                     S.ROOM_TYPE,
                                      C.PRICE, C.RATING
                                      from accommodation_provider P
                                      inner join provider_specification_connection C
                                      on P.provider_id = C.provider_id
                                      inner join accommodation_specification S
                                      on S.specification_id = C.specification_id
                                      where S.room_type = ? AND S.capacity = ? AND P.upazilla_id =? 
                                      order by C.PRICE, C.RATING desc, P.accomodation_type',[$type,$capacity,$upazillaId])));
            }                         
        }
       
        elseif($type == "Any" && $capacity =="More")
        {
            
            foreach($uId as $upazillaId)
            {
           
            array_push($query,( DB::select('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,S.ROOM_TYPE,
                                      C.PRICE, C.RATING
                                      from accommodation_provider P
                                      inner join provider_specification_connection C
                                      on P.provider_id = C.provider_id
                                      inner join accommodation_specification S
                                      on S.specification_id = C.specification_id
                                      where S.capacity >? and P.upazilla_id =?
                                      order by C.PRICE, C.RATING desc, P.accomodation_type',[10,$upazillaId])));
            }                         
        }

        return $query;
     }
public static function insert_provider($providerName, $providerType, $address, $upazillaID,$contactInfo, $facebookLink)
{
        
        DB::insert('INSERT INTO accommodation_provider
                   (`PROVIDER_ID`, `ACCOMODATION_NAME`, `ACCOMODATION_TYPE`, `ADDRESS`,`UPAZILLA_ID`,`CONTACT_INFO`, `FACEBOOK_LINK`) 
                    VALUES (?,?,?,?,?,?,?)',[NULL, 
                    $providerName, $providerType,
                    $address, $upazillaID,
                    $contactInfo, $facebookLink]); 
                  	
}
        
public static function insert_accommodation_specification($roomCount, $roomType, $capacity)
{
        
        
       DB::insert('INSERT INTO accommodation_specification (`SPECIFICATION_ID`, `NO_OF_ROOMS`, `ROOM_TYPE`, `CAPACITY`) 
        VALUES (?,?,?,?)',[NULL, 
            $roomCount, 
            $roomType, 
            $capacity]);
        	
}
        
public static function insert_provider_specification_connection($provider_id, $specification_id, $price, $rating)
{
        
        
        $query = DB::insert('INSERT INTO provider_specification_connection (`PROVIDER_ID`, `SPECIFICATION_ID`, `PRICE`, `RATING`) 
               VALUES (?,?,?,?)',[$provider_id, $specification_id, $price, $rating]);
        	
}
        
public static function find_upazilla_id($upazilla, $district, $division)
{
        
        
        $uId=PlaceModel::where('UPAZILLA_NAME',$upazilla)->first();
        return $uId->UPAZILLA_ID;
        
}
        
public static function find_provider_id($providerName, $providerType,$address, $upazilla)
{
       
        
        $query = DB::select('Select PROVIDER_ID 
        From ACCOMMODATION_PROVIDER ap Join UPAZILLA u on (ap.UPAZILLA_ID = u.UPAZILLA_ID)
        Where ap.ACCOMODATION_NAME =? 
        and ap.ACCOMODATION_TYPE =?
        and ap.ADDRESS = ?
        and u.UPAZILLA_ID = ?',[$providerName,$providerType,$address,$upazilla]);
        
        foreach($query as $q)
        {
        $id = $q->PROVIDER_ID;	
        
        return $id;
        }
        return 0;
}
        
public static function find_accommodation_specification_id($roomCount, $roomType, $capacity)
{
        
        $query = DB::select('Select SPECIFICATION_ID 
        From ACCOMMODATION_SPECIFICATION
        Where NO_OF_ROOMS = ?
        and ROOM_TYPE = ?
        and CAPACITY =?',[$roomCount,$roomType,$capacity]);
        
       foreach($query as $q)
        {
        $id = $q->SPECIFICATION_ID;	
        
        return $id;
        }
        return 0;
}


}