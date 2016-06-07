<?php

namespace App\Http\Controllers;
use App\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class imageController extends Controller
{
    
    
    public function store(Request $request)
    {
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

        $file->move('E:/images', $name);
        $image->save();
        echo 'Image Uploaded Successfully';
        }
        else echo 'Failed';
        
    }
}