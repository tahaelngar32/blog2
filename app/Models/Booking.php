<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * Booking *
 */
class Booking extends Model
{
    //
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable  = ['trip_details_id','number_parson','name_cust','total_price',];





    protected $casts = [
        'trip_details_id' => 'string',

        'number_parson' => 'string',

        'name_cust' => 'string',

        'total_price' => 'string',

    ];




    public function tripDetails()
    {
        return $this->belongsTo(\App\Models\TripDetail::class, "trip_details_id", "id");
    }

    public function services()
    {
        return $this->hasMany(Serviecbooking::class, 'booking_id','id');
    }


}
