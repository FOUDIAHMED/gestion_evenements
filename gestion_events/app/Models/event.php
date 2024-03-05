<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class event extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'titre',
        'description',
        'event_date',
        'lieu',
        'category_id',
        'nombre_places',
        'validation',
    ];

    public function category(){
        return $this->belongsTo(categorie::class);
    }

    public function organisator(){
        $this->belongsTo(organisator::class);
    }

    
}
