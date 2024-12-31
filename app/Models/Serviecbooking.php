<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * ServiecBooking *
 */
class Serviecbooking extends Model
{
    //
    use HasFactory;
    protected $table = 'serviecbookings';

    protected $fillable  = ['booking_id','serviec_id',];





    protected $casts = [
        'booking_id' => 'string',

        'serviec_id' => 'string',

    ];




    public function booking()
    {
        return $this->belongsTo(\App\Models\TripDetail::class, "booking_id", "id");
    }

    public function serviec()
    {
        return $this->belongsTo(\App\Models\Service::class, "serviec_id", "id");
    }




}
