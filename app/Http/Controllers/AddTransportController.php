<?php

namespace App\Http\Controllers;
use App\TransportModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class AddTransportController extends Controller
{
    
    
    public function addTransport(Request $request)
    {
    $fdivision = $request->get('transport_from_division');
    $fdistrict = $request->get('transport_from_district');
    $fupazilla = $request->get('transport_from_upazilla');
    $transport_from_spot_name=$request->get('transport_from_spot_name');
    
    $tdivision = $request->get('transport_to_division');
    $tdistrict = $request->get('transport_to_district');
    $tupazilla = $request->get('transport_to_upazilla');
    $transport_to_spot_name=$request->get('transport_to_spot_name');
    
    $transport_name = $request->get('transport_name');
    $transport_type = $request->get('transport_type');
    $transport_address = $request->get('transport_address');
    $transport_contact_info = $request->get('transport_contact_info');
    
    $price_per_ticket=$request->get('price_per_ticket');
    $price_per_trip=$request->get('price_per_trip');
    $rating=$request->get('transport_star');
    
    $facebook = $request->get('facebook');
    
    if ($transport_from_spot_name != "")
        $from = $transport_from_spot_name;
    else if ($fupazilla!="Any")
        $from =$fupazilla;
    else if($fdistrict!="Any")
        $from=$fdistrict;
    else
        $from= $fdivision;
    
    if ($transport_to_spot_name != "")
        $to = $transport_to_spot_name;
    else if ($tupazilla!="Any")
        $to =$tupazilla;
    else if($tdistrict!="Any")
        $to=$tdistrict;
    else
        $to= $tdivision;
        
        
    
    $transport_id = TransportModel::find_transport_id($transport_name, $transport_type, $transport_address);
    $trip_id = TransportModel::find_trip_id($from, $to);
    $flag=0;
    if(!$transport_id)
    {
       TransportModel::insert_transport($transport_name, $transport_type, $transport_address,$transport_contact_info);
       $transport_id = TransportModel::find_transport_id($transport_name, $transport_type, $transport_address);
       $flag=1;
    }

    if(!$trip_id)
    {
      TransportModel::insert_trip($from, $to);
      $trip_id = TransportModel::find_trip_id($from, $to);
      $flag=1;
    }
     
    if($flag)
    {
    TransportModel::insert_transport_trip_connection($transport_id, $trip_id, $price_per_ticket, $price_per_trip, $rating);
    }
   
    }
}
?>