<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    public function articleCount()
    {
        return $this->hasMany('App\Models\Article','category_id','id')->where('status',1)->count();
    }                                 // Baglanacagımız model // baglanacagımız sutun// baglanacak id
}
