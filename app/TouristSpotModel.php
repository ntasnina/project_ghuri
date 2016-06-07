<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class TouristSpotModel extends Model
{
        protected $primaryKey = 'SPOT_ID';
        protected $table = 'tourist_spot';
        public $timestamps = false;
        public static function findTouristSpot($division,$district,$upazilla)
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
       foreach($uId as $upazillaId)
            
            {
            
                array_push($query,DB::select(
                'select SPOT_NAME, DESCRIPTION, RATING, PHOTO_FILE,USER, P.USER_ID
                from tourist_spot T left outer join photo P
                on(T.spot_id = P.spot_id)
                left outer join review R
                on(T.spot_id=R.spot_id)
                where upazilla_id =?
                order by SPOT_NAME',[$upazillaId]));
                
            }   
           
            return $query;
        }
        public static function insert_tourist_spot($spotName,$upazilla)
        {
            DB::insert('Insert into tourist_spot(SPOT_ID,SPOT_NAME,UPAZILLA_ID) values(?,?,?)',[NULL,$spotName,$upazilla]);
        }
        
        public static function insert_review($description,$rating,$spot_id,$user_id)
        {
            DB::insert('Insert into review(REVIEW_ID,DESCRIPTION,RATING,SPOT_ID,USER) values(?,?,?,?,?)',
                       [NULL,$description,$rating,$spot_id,$user_id]);
        }
        
        public static function find_upazilla_id($upazilla, $district, $division)
        {
                
                
                $uId=PlaceModel::where('UPAZILLA_NAME',$upazilla)->first();
                return $uId->UPAZILLA_ID;
                
        }
        public static function find_spot_id($spotName,$upazillaID)
        {
          
            $query =DB::select('select SPOT_ID
            from tourist_spot
            where SPOT_NAME =?
            and UPAZILLA_ID=?',[$spotName,$upazillaID]);
            
            
           foreach($query as $q)
           {
           
            $id=$q->SPOT_ID;
            return $id;
            
           }
           return 0;
        }
        
        
    
        
    
}