<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = 'evenements';

    protected $primaryKey = 'id_evenement';

    public $timestamps = false;

    protected $fillable = [
        'titre',
        'content',
        'image',
        'date_evenement',
        'date_publication',
        'lieu',
        'prix',
        'status',
        'id_organisateur',
        'id_category',
        'heure_evenement',
        'nombre_places',
        'date_fin',
    ];

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'id_category',
            'id_category'
        );
    }

    public function organisateur()
    {
        return $this->belongsTo(
            Organisateur::class,
            'id_organisateur',
            'id_organisateur'
        );
    }
} 