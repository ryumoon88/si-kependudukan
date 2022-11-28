<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentBirthDataTable;
use App\Models\Resident;
use App\Models\ResidentBirth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Ulid;
use Illuminate\Support\Str;

class ResidentBirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResidentBirthDataTable $dataTable)
    {
        $data = ResidentBirth::all()->countBy('gender');
        $data['total'] = $data['Male'] + $data['Female'];
        return $dataTable->render('admins.resident.birth.index', ['sided' => false, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sided = false;
        return view('admins.resident.birth.create', compact('sided'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['ulid'] = Str::lower(Ulid::generate(now()));
        $data['birth_date'] = Carbon::parse($data['birth_date'])->format('Y-m-d');
        ResidentBirth::create($data);
        return redirect(route('admin.dashboard.resident.birth'))->with('alert', ['type' => 'success', 'message' => 'Data added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function show(ResidentBirth $residentBirth)
    {
        $residentBirth = $residentBirth->load('father', 'mother');
        return view('admins.resident.birth.show', ['residentBirth' => $residentBirth, 'sided' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function edit(ResidentBirth $residentBirth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResidentBirth $residentBirth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResidentBirth $residentBirth)
    {
        //
    }

    public function create_preview(Request $request)
    {
        $tmpBirth = $request->validate([
            'name' => 'required',
            'father_id' => 'required',
            'mother_id' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'gender' => 'required'
        ]);

        $father = Resident::find($request->get('father_id'));
        $mother = Resident::find($request->get('mother_id'));
        if (!$father || !$mother)
            return back()->with('alert', ['type' => 'danger', 'message' => 'Invalid data, please re-check the data again!']);
        $tmpBirth['birth_date'] = Carbon::parse($tmpBirth['birth_date'])->format('d M Y');
        $sided = false;
        return view('admins.resident.birth.create-preview', compact('father', 'mother', 'sided', 'tmpBirth'));
    }
}