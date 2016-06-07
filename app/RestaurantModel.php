<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class RestaurantModel extends Model
{
    protected $primaryKey = 'RESTAURANT_ID';
    protected $table = 'restaurant';
    public $timestamps = false;
    public static function findRestaurant($upazilla,$district,$division,$food_type) //At least division has to be chosen 
    {

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
       
       if($food_type!="Any")
       {
            foreach($uId as $upazillaId)
            
            {
            
            array_push($query,DB::select('select R.RESTAURANT_NAME, F.NAME, R.SPECIALIZATION, R.ADDRESS, R.CONTACT_INFO, R.FACEBOOK_LINK, C.PRICE, C.PROPORTION, C.RATING
            from FOOD F
            inner join restaurant_food_connection C
            on (F.FOOD_ID  = C.FOOD_ID)
            inner join restaurant R
            on(R.RESTAURANT_ID = C.RESTAURANT_ID )
            where F.FOOD_TYPE =? and R.UPAZILLA_ID =?
            order by R.RESTAURANT_NAME',[$food_type,$upazillaId]));
            }
       }
       else
       {
           foreach($uId as $upazillaId)
            
            {
            
           array_push(
           $query,DB::select('select R.RESTAURANT_NAME, F.NAME, R.SPECIALIZATION, R.ADDRESS, R.CONTACT_INFO, R.FACEBOOK_LINK, C.PRICE, C.PROPORTION, C.RATING
           from food F
           inner join restaurant_food_connection C
           on (F.FOOD_ID  = C.FOOD_ID)
           inner join restaurant R
           on(R.RESTAURANT_ID = C.RESTAURANT_ID )
           where R.UPAZILLA_ID =?
           order by R.RESTAURANT_NAME',[$upazillaId]));
            }
       }
       return $query;
    }
    
    public static function insert_restaurant($restaurantName, $specialization, $address, $upazillaID, $contactInfo, $facebookLink)
	{
		
		$query = DB::insert('INSERT INTO RESTAURANT (`RESTAURANT_ID`, `RESTAURANT_NAME`, `SPECIALIZATION`, `ADDRESS`,`UPAZILLA_ID`,
                                        `CONTACT_INFO`, `FACEBOOK_LINK`) 
					VALUES (?,?,?,?,?,?,?)',[NULL, 
						$restaurantName, $specialization,
						$address, $upazillaID,
						$contactInfo, $facebookLink 
						]);
			
	}

    public static function insert_food($foodName, $foodType)
	{
		
		
		$query = DB::select('INSERT INTO FOOD(`FOOD_ID`, `NAME`, `FOOD_TYPE`) 
					VALUES (?,?,?)',[NULL, 
						$foodName, 
						$foodType]);
			
	}

    public static function insert_restaurant_food_connection($restaurant_id, $food_id, $price, $proportion, $rating)
    {
            
            
            $query = DB::insert('INSERT INTO  restaurant_food_connection (`RESTAURANT_ID`,`FOOD_ID`,`PRICE` ,`PROPORTION`,`RATING`) 
                                    VALUES(?,?,?,?,?)',[$restaurant_id, $food_id, $price, $proportion, $rating]);
            
    }

    public static function find_upazilla_id($upazilla, $district, $division)
    {
            
            
            $uId=PlaceModel::where('UPAZILLA_NAME',$upazilla)->first();
            return $uId->UPAZILLA_ID;
            
    }
    

    public static  function find_restaurant_id($restaurantName, $address, $upazillaID)
	{
            $query = DB::select('Select RESTAURANT_ID 
                            From RESTAURANT R Join UPAZILLA u on (R.UPAZILLA_ID = u.UPAZILLA_ID)
                            Where R.RESTAURANT_NAME = ?
                            and R.ADDRESS = ?
                            and u.UPAZILLA_ID = ?',[$restaurantName,$address,$upazillaID]);
            
                
            foreach($query as $q)
            {
            $id = $q->RESTAURANT_ID;
            return $id;
            }
            return 0;
        }
    public static function find_food_id($foodName, $foodType)
	{
		
		
		$query = DB::select('Select FOOD_ID 
				From FOOD
				Where NAME = ?
				and FOOD_TYPE =?',[$foodName,$foodType]);
				
		foreach($query as $q)
                {
		$id = $q->FOOD_ID;
                return $id;
                }	
		
		return 0;
	}
}
