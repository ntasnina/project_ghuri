<?php

namespace App\Http\Controllers;

use App\PlaceModel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Database\Eloquent\Model;
use View;

class HomeController extends Controller
{
    public function showHome()
    {
        
       $List=PlaceModel::all(array('UPAZILLA_NAME','DISTRICT_NAME','DIVISION_NAME'));
       foreach($List as $place)
       {
        $placeList[$place->DIVISION_NAME][$place->DISTRICT_NAME]=$place->UPAZILLA_NAME;
        }                   //get the list of divisions, districts and upazillas
       
        return view('index',array('data'=>$placeList));
        
    }

}

?>