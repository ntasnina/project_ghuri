<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\PlaceModel;
class GuideModel extends Model
{
    protected $primaryKey = 'GUIDE_ID';
    protected $table = 'guide';
    public $timestamps = false;
    
    public static function insert_guide($guideName,$address, $contactInfo, $rating)
	{
	
		DB::insert('Insert into guide(`GUIDE_ID`,`GUIDE_NAME`,`ADDRESS`,`CONTACT_INFO`,`RATING`) values(?,?,?,?,?)',
                           [NULL,$guideName,$address,$contactInfo,$rating]);
                 
	}

    public static function insert_tour($from, $to)
	{
		DB::insert('INSERT INTO TOUR(`TOUR_ID`, `FROM_PLACE`, `TO_PLACE`) 
					VALUES (?,?,?)',[NULL, 
						$from, 
						$to]);
	}

    public static function insert_guide_tour_connection($guide_id, $tour_id, $fee)
	{
		DB::insert('INSERT INTO  guide_tour_connection (`GUIDE_ID`,`TOUR_ID`,`FEE`) 
					VALUES (?,?,?)',[$guide_id, $tour_id, $fee]);
			
	}

	

     public static  function find_guide_id($guideName,$address, $contactInfo)
	{
		
		$query = DB::select('Select GUIDE_ID 
				From GUIDE 
				Where GUIDE_NAME = ?
                                and CONTACT_INFO = ?
				and ADDRESS =?',[$guideName,$contactInfo,$address]);
                foreach($query as $q)
                {
                $id = $q->GUIDE_ID;	
                
                return $id;
                }
                return 0;
				
		
		
		
        }
    public static function find_tour_id($from, $to)
	{
		
		$query =DB::select('Select TOUR_ID 
				From TOUR
				Where FROM_PLACE =?
				and TO_PLACE = ?',[$from,$to]);
                foreach($query as $q)
                {
                $id = $q->TOUR_ID;	
                
                return $id;
                }
                return 0;
				
		
		
	}
}

