<?php


namespace App\Http\Controllers;
use App\RestaurantModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class AddRestaurantController extends Controller
{
    
    
    public function addRestaurant(Request $request)
    {
    $division = $request->get('restaurant_division');
    $district = $request->get('restaurant_district');
    $upazilla = $request->get('restaurant_upazilla');
    $capacity = $request->get('capacity');
    $food_name = $request->get('food_name');
    $food_type = $request->get('food_type');
    $restaurant_name=$request->get('restaurant_name');
    $contact_info = $request->get('restaurant_contact_info');
    $address = $request->get('restaurant_address');
    $facebook = $request->get('restaurant_facebook');
    $specialization=$request->get('restaurant_specialization');
    $proportion=$request->get('proportion');
    $price = $request->get('restaurant_price');
    $rating = $request->get('restaurant_star');
    
   
    $upazilla_id = RestaurantModel::find_upazilla_id($upazilla, $district, $division);
    echo $upazilla_id.'   ' ;
    $food_id = RestaurantModel::find_food_id($food_name, $food_type);
    echo $food_id.'   ';
    $restaurant_id = RestaurantModel::find_restaurant_id($restaurant_name,$address,$upazilla_id);
    echo $restaurant_id.'   ';
    $flag=0;
    if(!$restaurant_id)
    {
       RestaurantModel::insert_restaurant($restaurant_name, $specialization, $address, $upazilla_id,$contact_info, $facebook);
       $restaurant_id = RestaurantModel::find_restaurant_id($restaurant_name,$address,$upazilla_id);
       $flag=1;
       echo $restaurant_id.'   ';
    }
     if(!$food_id)
     {
      RestaurantModel::insert_food($food_name, $food_type);
      $food_id = RestaurantModel::find_food_id($food_name, $food_type);
      $flag=1;
      echo $food_id;
     }

    if($flag)
    RestaurantModel::insert_restaurant_food_connection($restaurant_id, $food_id, $price, $proportion, $rating);
            
            
    
    }
}
?>