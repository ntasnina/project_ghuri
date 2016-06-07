<?php

namespace App\Http\Controllers;
use App\TouristSpotModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class TouristSpotController extends Controller
{
    
    
    public function searchTouristSpot(Request $request)
    {
    
    $division=$request->get('spot_division');
    $district=$request->get('spot_district');
    $upazilla=$request->get('spot_upazilla');
    
    $queryResult = TouristSpotModel::findTouristSpot($division,$district,$upazilla);
    
    $result=array();
    foreach($queryResult as $q1)
            
            {
                foreach($q1 as $q)
                {
                    //echo gettype($q);
                    $result[]=array( 'SPOT_NAME'=>$q->SPOT_NAME,
                            'DESCRIPTION'=> $q->DESCRIPTION, 'RATING'=>$q->RATING, 'USER'=>$q->USER,
                            'USER_ID'=>$q->USER_ID,'PHOTO_FILE'=>$q->PHOTO_FILE);
                    //echo $q->PROVIDER_ID, $q->ACCOMODATION_NAME, $q->ACCOMODATION_TYPE, $q->FACEBOOK_LINK, $q->CONTACT_INFO, $q->ADDRESS,
                    //$q->NO_OF_ROOMS, $q->CAPACITY,$q->ROOM_TYPE,$q->CAPACITY,$q->PRICE, $q->RATING .' </br> ' ;
                    //$count++;
                }
                
                
            }
    return view('showTouristSpot',array('result' => $result));
    }
}
