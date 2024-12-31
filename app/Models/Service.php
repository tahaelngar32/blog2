<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * خدمات *
 */
class Service extends Model
{
    //
    use HasFactory;
    protected $table = 'services';

    protected $fillable  = ['name','description','price_singer','price_group','is_active',];





    protected $casts = [
        'name' => 'string',

        'description' => 'string',

        'price_singer' => 'string',

        'price_group' => 'string',

        'is_active' => 'boolean',

    ];



    public function getPriceBasedOnPeople($numPeople)
    {
        return $numPeople > 3 ? $this->price_group : $this->price_singer;
    }

    public function scopeNotIsActive($query)
    {

        // نشط Scope
        return $query->where("is_active", false);
    }


    public function scopeIsIsActive($query)
    {

        // نشط Scope
        return $query->where("is_active", true);
    }




}
