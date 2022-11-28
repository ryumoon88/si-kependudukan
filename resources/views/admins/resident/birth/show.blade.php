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

        .card-title span a {
            color: #899bbd;
            text-decoration: underline;
        }
    </style>
@endpush
@section('content')
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Action</h6>
                            </li>
                            <li><a href="" class="dropdown-item text-small">Print Document</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0">Birth Detail<br /><span>#{{ $residentBirth->id }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            {{-- <img src="{{ Vite::image('profile-picture-placeholder.png') }}" class="rounded-circle shadow"
                                style="max-width: 130px;" alt="" srcset=""> --}}
                            {{-- <hr class="border border-1 opacity-75 w-100"> --}}
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $residentBirth->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Gender</span>
                                <span class="text-muted ">{{ $residentBirth->gender }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Birth Date</span>
                                <span class="text-muted ">{{ $residentBirth->birth_date->format('d M Y') }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Birth Place</span>
                                <span class="text-muted ">{{ $residentBirth->birth_place }}</span>
                            </div>
                            <hr class="border border-1 opacity-75 w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title mb-0 pb-2">Parent Details<br>
                                    <span>Father #<a href="">{{ $residentBirth->father->id_number }}</a></span>
                                </div>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $residentBirth->father->birth->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Religion</span>
                                <span class="text-muted ">{{ $residentBirth->father->religion }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Profession</span>
                                <span class="text-muted ">{{ $residentBirth->father->profession }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title mb-0 pb-2">
                                    <span>Mother #<a href="">{{ $residentBirth->mother->id_number }}</a></span>
                                </div>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $residentBirth->mother->birth->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Religion</span>
                                <span class="text-muted ">{{ $residentBirth->mother->religion }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Profession</span>
                                <span class="text-muted ">{{ $residentBirth->mother->profession }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
