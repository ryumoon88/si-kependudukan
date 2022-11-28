@extends('admins.layouts.main')

@section('content')
    <div class="section">
        <div class="card">
            <form class="card-body" method="POST" action="{{ route('admin.dashboard.resident.birth.create-preview') }}">
                @csrf
                <div class="card-title">New Birth</div>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text"
                            class="form-control @error('name')
                            is-invalid
                        @enderror"
                            name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="gender" class="form-label">Gender</label>
                        <select
                            class="form-select @error('gender')
                        is-invalid
                    @enderror"
                            name="gender" aria-label="Default select example">
                            <option></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="birth_place" class="form-label">Birth Place</label>
                        <input type="text"
                            class="form-control @error('birth_place')
                        is-invalid
                    @enderror"
                            name="birth_place" id="birth_place">
                        @error('birth_place')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="datetime-local"
                            class="form-control @error('birth_date')
                        is-invalid
                    @enderror"
                            name="birth_date" id="birth_date">
                        @error('birth_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-title">Parent Details</div>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="father_id" class="form-label">Father ID</label>
                        <input type="text"
                            class="form-control @error('father_id')
                                is-invalid
                            @enderror"
                            name="father_id" id="father_id">
                        @error('father_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="mother_id" class="form-label">Mother ID</label>
                        <input type="text"
                            class="form-control @error('mother_id')
                        is-invalid
                    @enderror"
                            name="mother_id" id="mother_id">
                        @error('mother_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="flex text-end mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
