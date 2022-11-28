@extends('admins.layouts.main')
@section('content')
    <div class="section">
        <div class="card">
            <form class="card-body" method="POST" action="{{ route('admin.dashboard.resident.identity.store') }}">
                @method('POST')
                @csrf
                @foreach ($tmpResident as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                @endforeach
                <div class="card-title mb-0 pb-2">New Resident <br>
                    <span>Birth Data #{{ $birthData->id }}</span>
                </div>
                <div class="row mb-2 border-2">
                    <div class="row row-cols-2">
                        <span class="fw-bold text-small">Name</span>
                        <label class="text-muted text-small">{{ $birthData->name }}</label>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Gender</span>
                        <span class="text-muted">{{ $birthData->gender }}</span>
                    </div>

                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Place</span>
                        <span class="text-muted">{{ $birthData->birth_place }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Date</span>
                        <span class="text-muted">{{ $birthData->birth_date }}</span>
                    </div>
                </div>
                <div class="card-title pb-0"><span>Resident Detail</span></div>
                <div class="row g-3">
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Email</span>
                        <span class="text-muted">{{ $tmpResident['email'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Phone Number</span>
                        <span class="text-muted">{{ $tmpResident['phone_number'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Blood Type</span>
                        <span class="text-muted">{{ $tmpResident['blood_type'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Religion</span>
                        <span class="text-muted">{{ $tmpResident['religion'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Profession</span>
                        <span class="text-muted">{{ $tmpResident['profession'] }}</span>
                    </div>
                </div>
                <div class="card-title pb-0"><span>Address</span></div>
                <div class="row g-3">
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Province</span>
                        <span class="text-muted">{{ $tmpResident['province_name'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">City</span>
                        <span class="text-muted">{{ $tmpResident['city_name'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">District</span>
                        <span class="text-muted">{{ $tmpResident['district_name'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Village</span>
                        <span class="text-muted">{{ $tmpResident['village_name'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Details</span>
                        <span class="text-muted">{{ $tmpResident['address'] }}</span>
                    </div>
                </div>
                <hr class="mt-4">
                <div class="card-title pb-2">Parent Details<br><span>Father #<span>{{ $father->id_number }}</span></span>
                </div>
                <div class="row g-3">
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Name</span>
                        <span class="text-muted">{{ $father->birth->name }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Place</span>
                        <span class="text-muted">{{ $father->birth->birth_place }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Date</span>
                        <span class="text-muted">{{ $father->birth->birth_date->format('d M Y') }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Profession</span>
                        <span class="text-muted">{{ $father->profession }}</span>
                    </div>
                </div>
                <div class="card-title pb-2"><br><span>Mother #<span>{{ $mother->id_number }}</span></span>
                </div>
                <div class="row g-3">
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Name</span>
                        <span class="text-muted">{{ $mother->birth->name }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Place</span>
                        <span class="text-muted">{{ $mother->birth->birth_place }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Date</span>
                        <span class="text-muted">{{ $mother->birth->birth_date->format('d M Y') }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Profession</span>
                        <span class="text-muted">{{ $mother->profession }}</span>
                    </div>
                </div>
                <div class="flex text-end mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
