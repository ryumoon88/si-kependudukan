@extends('admins.layouts.main')

@push('styles')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <div class="section">
        <div class="card">
            <form class="card-body" method="POST" action="{{ route('admin.dashboard.resident.identity.create-preview') }}">
                @method('POST')
                @csrf
                <div class="card-title pb-0">New Resident</div>
                <div class="card-title pt-0 pb-0"><span class="pt-0">Resident Details</span></div>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="birth_id" class="form-label">Birth ID</label>
                        <input type="text"
                            class="form-control @error('birth_id')
                            is-invalid
                        @enderror"
                            value="{{ old('birth_id') }}" name="birth_id" id="birth_id">
                        @error('birth_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="id_number" class="form-label">ID Number</label>
                        <input type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number"
                            value="{{ old('id_number') }}" id="id_number">
                        @error('id_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text"
                            class="form-control @error('email')
                            is-invalid
                        @enderror"
                            value="{{ old('email') }}" name="email" id="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="number" maxlength="13"
                            class="form-control @error('phone_number')
                            is-invalid
                        @enderror"
                            value="{{ old('phone_number') }}" name="phone_number" id="phone_number">
                        @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="blood_type" class="form-label">Blood Type</label>
                        <select name="blood_type" id="blood_type"
                            class="form-select @error('blood_type')
                            is-invalid
                        @enderror">
                            <option></option>
                            @foreach (['A', 'B', 'AB', 'O'] as $item)
                                <option value="{{ $item }}" {{ $item == old('blood_type') ? 'selected' : '' }}>
                                    {{ $item }}</option>
                            @endforeach
                        </select>
                        @error('blood_type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="religion" class="form-label">Religion</label>
                        <select name="religion" id="religion"
                            class="form-select @error('religion')
                            is-invalid
                        @enderror">
                            <option></option>
                            @foreach (['Islam', 'Protestan', 'Khatolik', 'Hindu', 'Buddha'] as $item)
                                <option value="{{ $item }}" {{ $item == old('religion') ? 'selected' : '' }}>
                                    {{ $item }}</option>
                            @endforeach
                        </select>
                        @error('religion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="profession" class="form-label">Profession</label>
                        <input type="text"
                            class="form-control @error('profession')
                            is-invalid
                        @enderror"
                            value="{{ old('profession') }}" name="profession" id="profession">
                        @error('profession')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-title pb-0 mb-0"><span>Address</span></div>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="province_id" class="form-label">Province</label>
                        <select name="province_id" id="province_id" title="Select province..."
                            class="form-control select-picker border @error('province_id')
                                is-invalid
                            @enderror"
                            data-live-search="true" data-style="btn-white">
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('province_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="city_id" class="form-label">City</label>
                        <select name="city_id" id="city_id" title="Select City..."
                            class="form-control select-picker border @error('city_id')
                                is-invalid
                            @enderror"
                            data-live-search="true" data-style="btn-white">

                        </select>
                        @error('city_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="district_id" class="form-label">District</label>
                        <select name="district_id" id="district_id" title="Select District..."
                            class="form-control select-picker border @error('district_id')
                                is-invalid
                            @enderror"
                            data-live-search="true" data-style="btn-white">

                        </select>
                        @error('district_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="village_id" class="form-label">Village</label>
                        <select name="village_id" id="village_id" title="Select Village..."
                            class="form-control select-picker border @error('village_id')
                                is-invalid
                            @enderror"
                            data-live-search="true" data-style="btn-white">
                        </select>
                        @error('village_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text"
                            class="form-control @error('address')
                            is-invalid
                        @enderror"
                            value="{{ old('address') }}" name="address" id="address">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- <div class="card-title">Parent Details</div>
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
                </div> --}}
                <div class="flex text-end mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(function(){
            $('.select-picker').selectpicker()
            let city_select = $('.select-picker#city_id');
            let district_select = $('.select-picker#district_id')
            let village_select = $('.select-picker#village_id')

            $('.select-picker#province_id').on('changed.bs.select', function(e){
                let currentVal = $(this).val();
                city_select.html('')
                city_select.selectpicker('destroy')
                if(currentVal != ''){
                    $.ajax({
                        url: window.location.origin+"/indonesia/city/"+currentVal,
                        dataType: 'json',
                        method: 'get',
                        success: function(data){
                            data.forEach(city => {
                                city_select.append(`<option value="${city.id}">${city.name}</option>`)
                            });
                            city_select.selectpicker()
                            city_select.on('changed.bs.select', onCitySelectChanged)
                        }
                    })
                }
            })

            function onCitySelectChanged(e) {
                let currentVal = $(this).val();
                district_select.html('')
                district_select.selectpicker('destroy')
                if(currentVal != ''){
                    $.ajax({
                        url: window.location.origin+"/indonesia/district/"+currentVal,
                        dataType: 'json',
                        method: 'get',
                        success: function(data){
                            data.forEach(city => {
                                district_select.append(`<option value="${city.id}">${city.name}</option>`)
                            });
                            district_select.selectpicker()
                            district_select.on('changed.bs.select', onDistrictSelectChanged)
                        }
                    })
                }
            }

            function onDistrictSelectChanged(e){
                let currentVal = $(this).val();
                village_select.html('')
                village_select.selectpicker('destroy')
                if(currentVal != ''){
                    $.ajax({
                        url: window.location.origin+"/indonesia/village/"+currentVal,
                        dataType: 'json',
                        method: 'get',
                        success: function(data){
                            data.forEach(city => {
                                village_select.append(`<option value="${city.id}">${city.name}</option>`)
                            });
                            village_select.selectpicker()
                        }
                    })
                }
            }
        })
    </script>
@endpush
