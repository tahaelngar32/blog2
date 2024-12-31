<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * Trip_details *
 */
class TripDetail extends Model
{
    //
    use HasFactory;
    protected $table = 'trip_details';

    protected $fillable  = ['trip_id','date_from','date_to','price_singel','price_group','details',];





    protected $casts = [
        'trip_id' => 'integer',

        'date_from' => 'string',

        'date_to' => 'string',

        'price_singel' => 'string',

        'price_group' => 'string',

        'details' => 'string',

    ];


    public function getPriceBasedOnPeople($numPeople)
    {
        return $numPeople > 3 ? $this->price_group : $this->price_singel;
    }

    public function trip()
    {
        return $this->belongsTo("App\Models\Trip", "trip_id");
    }




}
