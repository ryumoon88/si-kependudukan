@extends('admins.layouts.main')
@push('styles')
    <style>
        .data-field {
            display: flex;
            width: 100%;
            justify-content: space-between;
            font-size: 14px;
        }

        .data-field:not(:last-child) {
            margin-bottom: 15px;
        }

        .data-field span {
            text-align: end;
        }
    </style>
@endpush
@section('content')
    <div class="section">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title"><span><span class="text-black">#</span> {{ $citizen->id_number }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <img src="{{ Vite::image('profile-picture-placeholder.png') }}" class="rounded-circle shadow"
                                style="max-width: 130px;" alt="" srcset="">

                            <h5 class="mt-4 fw-bold text-muted">{{ $citizen->first_name . ' ' . $citizen->last_name }}</h5>
                            <hr class="border border-1 opacity-75 w-100">
                            <div class="data-field mt-3">
                                <span class="fw-bold text-small">ID Number</span>
                                <span class="text-muted">{{ $citizen->id_number }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Address</span>
                                <span class="text-muted">{{ $citizen->address }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Gender</span>
                                <span class="text-muted">{{ $citizen->gender }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Marital Status</span>
                                <span class="text-muted">{{ $citizen->marital_status }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Religion</span>
                                <span class="text-muted">{{ $citizen->religion }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Birth</span>
                                <span
                                    class="text-muted">{{ $citizen->place_of_birth . ',' . $citizen->date_of_birth->format('d F o') }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Age</span>
                                <span class="text-muted">{{ $citizen->date_of_birth->diffInYears(now()) }} y/o</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Blood Type</span>
                                <span class="text-muted">{{ $citizen->blood_type }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-small">Profession</span>
                                <span
                                    class="text-muted">{{ isset($citizen->profession) ? $citizen->profession : '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title">Last Submissions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
