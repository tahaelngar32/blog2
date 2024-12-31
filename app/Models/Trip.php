<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * Trip * 
 */
class Trip extends Model
{
    //
    use HasFactory;
    protected $table = 'trips';
 
    protected $fillable  = ['name',];




 
    protected $casts = [
        'name' => 'string',
    
    ];



 
 
 

}