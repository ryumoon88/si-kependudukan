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
                            <div class="card-title pb-2 m-0">Resident<br /><span>#{{ $resident->id_number }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <img src="{{ Vite::image('profile-picture-placeholder.png') }}"
                                class="rounded-circle shadow align-self-center" style="max-width: 130px;" alt=""
                                srcset="">
                            <hr class="border border-1 opacity-75 w-100">
                            <div class="data-field">
                                <span class="fw-bold text-start">Name</span>
                                <span class="text-muted ">{{ $resident->birth->name }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Gender</span>
                                <span class="text-muted ">{{ $resident->birth->gender }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Religion</span>
                                <span class="text-muted ">{{ $resident->religion }}</span>
                            </div>
                            <div class="data-field">
                                <span class="fw-bold text-start">Blood Type</span>
                                <span class="text-muted ">{{ $resident->religion }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0"><span>Contact</span>
                            </div>
                        </div>
                        <div class="data-field">
                            <span class="fw-bold text-start">Email</span>
                            <span class="text-muted ">{{ $resident->email }}</span>
                        </div>
                        <div class="data-field">
                            <span class="fw-bold text-start">Phone Number</span>
                            <span class="text-muted ">{{ $resident->phone_number }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title pb-2 m-0"><span>Address</span>
                            </div>
                        </div>
                        <div class="data-field">
                            <span class="fw-bold text-start">Province</span>
                            <span class="text-muted ">{{ $resident->province->name }}</span>
                        </div>
                        <div class="data-field">
                            <span class="fw-bold text-start">City</span>
                            <span class="text-muted ">{{ $resident->city->name }}</span>
                        </div>
                        <div class="data-field">
                            <span class="fw-bold text-start">District</span>
                            <span class="text-muted ">{{ $resident->district->name }}</span>
                        </div>
                        <div class="data-field">
                            <span class="fw-bold text-start">Village</span>
                            <span class="text-muted ">{{ $resident->village->name }}</span>
                        </div>
                        <div class="data-field">
                            <span class="fw-bold text-start">Detail</span>
                            <span class="text-muted ">{{ $resident->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
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
                            <div class="card-title pb-2 m-0">Submissions</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
