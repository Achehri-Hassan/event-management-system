<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    //

    protected $table = "organisateurs";
    protected $primaryKey = 'id_organisateur';

    public $timestamps = false;

    protected $fillable = [
         "nom",
         "email",
         "mot_de_passe",
         "role",
    ];

    public function evenements()
    {
         return $this->hasMany(
             Evenement::class,
              'id_organisateur',
              'id_organisateur'
         );
    }


}
