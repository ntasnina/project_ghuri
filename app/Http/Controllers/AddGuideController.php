<?php


namespace App\Http\Controllers;
use App\GuideModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class AddGuideController extends Controller
{
    
    
    public function addGuide(Request $request)
    {
    $division = $request->get('guide_division');
    $district = $request->get('guide_district');
    $from = $request->get('guide_from_spot_name');
    $to = $request->get('guide_to_spot_name');
    $name=$request->get('guide_name');
    $address = $request->get('guide_address');
    $contact_info = $request->get('guide_contact_info');
    $fee=$request->get('fee');
    $rating=$request->get('guide_star');
    
   
    $guide_id = GuideModel::find_guide_id($name,$address,$contact_info);
    $tour_id = GuideModel::find_tour_id($from, $to);
    $flag=0;
    if(!$guide_id)
    {
       GuideModel::insert_guide($name,$address, $contact_info,$rating);
       $guide_id=GuideModel::find_guide_id($name,$address,$contact_info);
       $flag=1;
    }
    if(!$tour_id)
    {
        GuideModel::insert_tour($from, $to);
        $tour_id=GuideModel::find_tour_id($from, $to);
        $flag=1;
    }
    
    if($flag)
    {
      GuideModel::insert_guide_tour_connection($guide_id, $tour_id,$fee);
    }
    }
}
?>