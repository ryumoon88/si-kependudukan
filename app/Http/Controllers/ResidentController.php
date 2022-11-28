<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentDataTable;
use App\Models\Resident;
use App\Models\ResidentBirth;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;
use Symfony\Component\Uid\Ulid;
use Illuminate\Support\Str;


class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResidentDataTable $dataTable)
    {
        return $dataTable->render('admins.resident.identity-card.index', ['sided' => false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('admins.resident.identity-card.create', ['sided' => false, 'provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'birth_id' => 'required',
            'id_number' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'blood_type' => 'required',
            'religion' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'address' => 'required',
            'profession' => 'required'
        ]);
        $data['ulid'] = Str::lower(Ulid::generate(now()));
        Resident::create($data);
        return redirect(route('admin.dashboard.resident.identity.show', ['resident' => $data['ulid']]))->with('alert', ['type' => 'success', 'message' => 'Data added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        return view('admins.resident.identity-card.show', ['sided' => false, 'resident' => $resident]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        //
    }

    public function create_preview(Request $request)
    {
        $validatedData = $request->validate([
            'birth_id' => 'required',
            'id_number' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'blood_type' => 'required',
            'religion' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'address' => 'required',
            'profession' => 'required'
            // 'father_id' => 'required',
            // 'mother_id' => 'required'
        ]);
        $tmpResident = $validatedData;
        $tmpResident['province_name'] = Province::find($tmpResident['province_id'])->name;
        $tmpResident['city_name'] = City::find($tmpResident['city_id'])->name;
        $tmpResident['district_name'] = District::find($tmpResident['district_id'])->name;
        $tmpResident['village_name'] = Village::find($tmpResident['village_id'])->name;
        $birthData = ResidentBirth::find($tmpResident['birth_id']);
        $father = $birthData->father;
        $mother = $birthData->mother;
        $sided = false;
        return view('admins.resident.identity-card.create-preview', compact('tmpResident', 'birthData', 'father', 'mother', 'sided'));
    }
}