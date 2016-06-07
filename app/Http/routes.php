<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\PlaceModel;
Route::get('/',function(){
    return view('pages.home');
});

//Route::get('index', array("uses" => "HomeController@showHome"));
    
Route::get('home',function(){
    
    return view ('pages.home');
});

/*Route::get('add_tourist_spot',function(){
    
    return view ('forms/add_tourist_spot');
});*/

Route::get('ajax_district',function(){
    $division_name=Input::get('division_name');
    $districts=PlaceModel::findDistricts($division_name);
    /*foreach($districts as $d)
    {
        echo $d->DISTRICT_NAME;
    }*/
    return Response::json($districts);
});
Route::get('ajax_upazilla',function(){
    $district_name=Input::get('district_name');
    $upazillas=PlaceModel::findUpazillas($district_name);
    return Response::json($upazillas);
    
});
Route::get('ajax_tourist_spot',function(){
    $upazilla_name=Input::get('upazilla_name');
    $upazilla=PlaceModel::where('UPAZILLA_NAME',$upazilla_name)->first();
    $upazilla_id=$upazilla->UPAZILLA_ID;
   
    $spots=PlaceModel::findSpots($upazilla_id);
    

    return Response::json($spots);
    
});

Route::get('ajax_guide_spot',function(){
    $district_name=Input::get('district_name');
    $spots=PlaceModel::findDistrictSpots($district_name);
    

    return Response::json($spots);
    
});
Route::post('/search_accommodation', ['uses'=>'AccommodationController@searchAccommodation'])->middleware(['web']);
Route::post('/search_transport', ['uses'=>'TransportController@searchTransport'])->middleware(['web']);
Route::post('/search_festival', ['uses'=>'FestivalController@searchFestival'])->middleware(['web']);
Route::post('/search_tourist_spot', ['uses'=>'TouristSpotController@searchTouristSpot'])->middleware(['web']);
Route::post('/search_restaurant', ['uses'=>'RestaurantController@searchRestaurant'])->middleware(['web']);

Route::post('/process_add_tourist_spot', ['uses'=>'AddTouristSpotController@addTouristSpot'])->middleware(['web']);
//Route::post('/process_add_tourist_spot', ['uses'=>'imageController@store'])->middleware(['web']);
Route::post('/process_add_accommodation', ['uses'=>'AddAccommodationController@addAccommodation'])->middleware(['web']);
Route::post('/process_add_transport', ['uses'=>'AddTransportController@addTransport'])->middleware(['web']);
Route::post('/process_add_restaurant', ['uses'=>'AddRestaurantController@addRestaurant'])->middleware(['web']);
Route::post('/process_add_guide', ['uses'=>'AddGuideController@addGuide'])->middleware(['web']);

/*
/ Contribution
*/

Route::get('contribute',function(){
    return view ('contribution.contribute');
});
Route::get('/blog',function(){
    return view ('blog.blog_comment');
});
Route::get('/blog1',function(){
    return view ('blog.pannel');
});
/*Route::get('image',function(){
    return view ('image');
});
Route::post('image',['uses'=>'imageController@store'])->middleware(['web']);*/
  

//Route::post('accommodation_search', array('before'=>'csrf',"uses"=>"AccommodationController@searchAccommodation"));
/*Route::get('home', function () {
    return view('home');
});*/

//Route::get('home', array("uses" => "HomeController@showHome"));

/*Route::get('insert',function(){
    
    PlaceModel::addUpazilla('Atrai','Naogaon','Rajshahi');
});*/
