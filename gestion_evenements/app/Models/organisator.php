<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class organisator extends Model
{
    use HasFactory,HasRoles;

    // protected $fillable = [
    //     'accept_mode',];
    //     public function user(){
    //         return $this->belongsTo(User::class);
    //     }
    //     public function events(){
    //         return $this->hasMany(event::class);
    //     }
}
