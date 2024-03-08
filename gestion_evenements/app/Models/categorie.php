<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function events(){
        return $this->hasMany(event::class  , 'category_id');
    }


}