<?php

namespace App\Livewire;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Serviecbooking;
use App\Models\TripDetail;
use App\Services\PriceCalculator;
use Livewire\Component;

class BookingForm extends Component
{
    public $name;
    public $num_people = 1;
    public $services = [];
    public $trip_id;
    public $price = 0;


    public function updated($propertyName)
    {
//
        if (in_array($propertyName, ['trip_id', 'num_people', 'services'])) {
            $this->calculatePrice();
        }
    }

    public function calculatePrice()
    {
        $this->price = PriceCalculator::calculatePrice($this->trip_id, $this->num_people, $this->services);
    }

    public function submit(BookingRequest $request)
    {
        $booking = Booking::create([
            'trip_details_id' => $this->trip_id,
            'name_cust' => $this->name,
            'number_parson' => $this->num_people,
            'total_price' => $this->price,
        ]);
        foreach ($this->services as $serviceId) {
            Serviecbooking::create([
                'booking_id' => $booking->id,
                'serviec_id' => $serviceId,
            ]);
        }
        session()->flash('success', 'تم حجز الرحلة بنجاح!');
        $this->reset(['name', 'num_people', 'services', 'price']);
    }

    public function render()
    {
        return view('livewire.booking-form', [
            'trips' => TripDetail::all(),
            'serves' => Service::all(),
            'Bookings' => Booking::all(),
        ]);
    }
}
