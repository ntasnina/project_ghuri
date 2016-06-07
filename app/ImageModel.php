<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model {
    protected $table = 'photo';
    protected $fillable = [
        'PHOTO_ID',
        'PHOTO_FILE',
        'SPOT_ID',
        'USER_ID'
    ];
     public $timestamps = false;
}