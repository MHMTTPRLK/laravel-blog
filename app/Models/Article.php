<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
   protected $table='articles';
    use SoftDeletes;

   public function get_Category()
   {
      return $this->hasOne('App\Models\Category','id','category_id');
   }                                // Baglanacagımız model // baglanacagımız sutun// baglanacak id

}
