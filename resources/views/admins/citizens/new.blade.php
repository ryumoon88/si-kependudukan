@extends('admins.layouts.main')

@section('content')
    <div class="section">
        <div class="card">
            <div class="card-body">
                <div class="card-title">New Citizen</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name">
                    </div>
                    <div class="col-12">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example">
                            <option></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
