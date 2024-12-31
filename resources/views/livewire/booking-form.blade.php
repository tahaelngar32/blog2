
<div>
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow p-4 text-center" style="width: 100%; border-radius: 15px; direction: rtl;">
        <h2 class="text-center mb-4 text-primary fw-bold">حجز رحلة سياحية</h2>
        @if (session()->has('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        <form wire:poll.1s wire:submit.prevent="submit">

            <div class="row mb-3">
                <div class="col-4">
                    <label for="name" class=" form-label fw-bold">اسم طالب الحجز</label>
                </div>
                <div class="col-6">
                    <input type="text" id="name" wire:model.lazy="name" class=" form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="أدخل اسمك" >
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="num_people" class="mb-4 form-label fw-bold">عدد الأفراد</label>
                </div>
                <div class="col-6">
                    <input type="number" id="num_people" wire:model="num_people" class="form-control {{ $errors->has('num_people') ? 'is-invalid' : '' }}"
                           placeholder="أدخل عدد الأفراد" required>
                    <div class="invalid-feedback">{{ $errors->first('num_people') }}</div>

                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="trip_id" class="mb-4 form-label fw-bold">الرحلة المراد الحجز لها</label>

                </div>
                <div class="col-6">
                    <select id="trip_id" wire:model="trip_id" class=" form-control form-select {{ $errors->has('trip_id') ? 'is-invalid' : '' }}" >
                        <option value="">-- اختر رحلة --</option>
                        @foreach ($trips as $trip)
                            <option value="{{ $trip->id }}">{{ $trip->trip->name }}: {{ $trip->date_from }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('trip_id') }}</div>

                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label class="mb-4 form-label fw-bold">الخدمات المقدمة</label>

                </div>
                <div class="col-6">
                    @foreach ($serves as $serve)
                        <div class="mb-4 form-control form-check ">
                            <div class="row">
                                <div class="col-2">
                                    <input type="checkbox"
                                           id="service_{{ $serve->id }}"
                                           value="{{ $serve->id }}"
                                           wire:model="services"
                                           class="form-check-input ">
                                </div>
                                <div class="col-10">
                                    <label for="service_{{ $serve->id }}" class="form-check-label ms-2">
                                        {{ $serve->name }} ({{ $serve->getPriceBasedOnPeople($this->num_people) }}$)
                                    </label>
                                </div>
                            </div>


                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mb-6">
                <div class="col-4">
                    <label class="form-label fw-bold">السعر الإجمالي</label>

                </div>
                <div class="col-6">
                    <div class="form-control bg-light text-center fw-bold">{{ $price }}$</div>

                </div>
            </div>

            <div class="row ">
                <div style="margin-right: 33%" class=" col-6 ">
                    <button type="submit" class=" btn btn-primary w-100 py-2">تأكيد الحجز</button>

                </div>
            </div>

        </form>
    </div>
</div>
    <div class="container" dir="rtl">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الرحلة</th>
                <th>العدد</th>
                <th>السعر الاجمالي</th>
                <th>الخدمات المقدمة</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Bookings as $key=>$booking)
            <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $booking->name_cust }}</td>
                    <td>{{ $booking->tripDetails->trip->name }}:{{ $booking->tripDetails->date_from }}</td>
                    <td>{{ $booking->number_parson }}</td>
                    <td>{{ $booking->total_price }}</td>

                    <td>
                        @if($booking->services->isNotEmpty())
                            <ul class="list-unstyled">
                                @foreach($booking->services as $key=>$service)
                                    <li>{{ $key+1 }}-{{ $service->serviec->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">لا توجد خدمات مضافة</span>
                        @endif
                    </td>

            </tr>
                 @endforeach

            </tbody>
        </table>

    </div>
</div>
