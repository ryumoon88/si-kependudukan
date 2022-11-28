@extends('admins.layouts.main')
@section('content')
    <div class="section">
        <div class="card">
            <form class="card-body" method="POST" action="{{ route('admin.dashboard.resident.birth.store') }}">
            @csrf
                @foreach ($tmpBirth as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                @endforeach
                <div class="card-title">New Birth</div>
                <div class="row mb-2 border-bottom pb-3 border-2">
                    <div class="row row-cols-2">
                        <span class="fw-bold text-small">Name</span>
                        <label name="name" class="text-muted text-small">{{ $tmpBirth['name'] }}</label>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Gender</span>
                        <span name="gender" class="text-muted">{{ $tmpBirth['gender'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Place</span>
                        <span name="birth_place" class="text-muted">{{ $tmpBirth['birth_place'] }}</span>
                    </div>
                    <div class="row row-cols-2 mt-3">
                        <span class="fw-bold">Birth Date</span>
                        <span name="birth_date" class="text-muted">{{ $tmpBirth['birth_date'] }}</span>
                    </div>
                </div>
                <div class="card-title">Parent Details<br><span>Father #<span
                            name="father_id">{{ $father->id_number }}</span></span></div>
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
                <div class="card-title"><br><span>Mother #<span name="mother_id">{{ $mother->id_number }}</span></span>
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
