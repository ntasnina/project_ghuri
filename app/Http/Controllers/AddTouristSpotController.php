<?php

namespace App\Http\Controllers;
use App\TouristSpotModel;
use App\ImageModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class addTouristSpotController extends Controller
{
    
    
    public function addTouristSpot(Request $request)
    {
   
    $division=$request->get('add_spot_division');
    $district=$request->get('add_spot_district');
    $upazilla=$request->get('add_spot_upazilla');
    $spot_name=$request->get('add_spot_name');
    $description=$request->get('spot_description');
    $rating=$request->get('star');
    
    
    $upazilla_id = TouristSpotModel::find_upazilla_id($upazilla,$district,$division);
    echo $upazilla_id;
    echo $spot_name;
    $spot_id = TouristSpotModel::find_spot_id($spot_name,$upazilla_id);
    if(!$spot_id)
    {
                TouristSpotModel::insert_tourist_spot($spot_name,$upazilla_id);
                $spot_id =TouristSpotModel::find_spot_id($spot_name,$upazilla_id);
    }
    
    TouristSpotModel::insert_review($description,$rating,$spot_id,123);   //123 for user_id         
                
     
    
    
    
    
    
    //Image
    $image = new ImageModel();
        
    $image->PHOTO_ID =NULL;
   
    if($request->hasFile('image'))
    {
    $file = Input::file('image');
    //getting timestamp
    //$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
    
    $name = $file->getClientOriginalName();
    echo 'Path Name:'.$name;
    
    $image->PHOTO_FILE = $name;
    $image->SPOT_ID=$spot_id;
    $image->USER_ID=123;

    $file->move('E:/images', $name);
    $image->save();
    //echo 'Image Uploaded Successfully';
    return view('successPage');
    }
    else echo 'Image Upload Failed';
    
    //*************//
    
    }
}