<?php


namespace App\Services;

use App\Models\Service;
use App\Models\TripDetail;

class PriceCalculator
{
    public static function calculatePrice($tripId, $numPeople, $services)
    {
        $price = 0;
        if ($tripId) {
            $trip = TripDetail::find($tripId);
            $basePrice = $trip ? $trip->getPriceBasedOnPeople($numPeople) : 0;
            $price += $basePrice * $numPeople;
            foreach ($services as $serviceId) {
//                dd($serviceId);
                $service = Service::find($serviceId);
                $price += $service->getPriceBasedOnPeople($numPeople) * $numPeople;
            }
        }
        return $price;
    }
}
