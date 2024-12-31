<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'num_people' => 'required|integer|min:1',
            'trip_id' => 'required|exists:trip_details,id',
            'services' => 'array',
            'services.*' => 'exists:services,id'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'الرجاء إدخال اسم طالب الحجز',
            'num_people.required' => 'الرجاء إدخال عدد الأفراد',
            'trip_id.required' => 'الرجاء اختيار رحلة',
            'trip_id.exists' => 'الرحلة المختارة غير موجودة'
        ];
    }
}
