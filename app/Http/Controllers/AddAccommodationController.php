<?php


namespace App\Http\Controllers;
use App\AccommodationModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class AddAccommodationController extends Controller
{
    
    
    public function addAccommodation(Request $request)
    {
    $division = $request->get('accommodation_division');
    $district = $request->get('accommodation_district');
    $upazilla = $request->get('accommodation_upazilla');
    $capacity = $request->get('capacity');
    $provider_name = $request->get('provider_name');
    $provider_type = $request->get('provider_type');
    $contact_info = $request->get('contact_info');
    $address = $request->get('address');
    $facebook = $request->get('facebook');
    $room_type = $request->get('room_type');
    $no_of_rooms = $request->get('no_of_rooms');
    $price = $request->get('price');
    $rating = $request->get('star');
    
    
    

    $upazilla_id = AccommodationModel::find_upazilla_id($upazilla, $district, $division);
    echo $upazilla_id.'  ' ;
    $specification_id = AccommodationModel::find_accommodation_specification_id($no_of_rooms, $room_type, $capacity);
    echo $specification_id.'  ';
    $provider_id = AccommodationModel::find_provider_id($provider_name, $provider_type,$address, $upazilla_id);
    echo $provider_id.'  ';
    $flag=0;
    if(!$provider_id)
    {
        AccommodationModel::insert_provider($provider_name, $provider_type, $address,
                                            $upazilla_id,$contact_info, $facebook);
        $provider_id = AccommodationModel::find_provider_id($provider_name, $provider_type,$address, $upazilla_id);
        $flag=1;
    }



    if(!$specification_id)
    {
        AccommodationModel::insert_accommodation_specification($no_of_rooms, $room_type, $capacity);
        $specification_id = AccommodationModel::find_accommodation_specification_id($no_of_rooms, $room_type, $capacity);
        $flag=1;
    }



    
    if($flag)
    AccommodationModel::insert_provider_specification_connection($provider_id, $specification_id, $price, $rating);

    }
}
?>
