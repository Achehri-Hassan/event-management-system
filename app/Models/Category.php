<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

   protected $table = "categories";
   protected $primaryKey = 'id_category';

   public $timestamps = false;

   protected $fillable = [
       "nom_category",
       "description"
   ];

   public function evenements(){
      return $this->hasMany(
        Evenement::class,
        'id_category',
        'id_category'
      );
   }
}
