<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    function index()
    {
        return view('patient.index', [
            'patients' => Patient::latest()->get()
        ]);
    }

    function create()
    {
        return view('patient.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255|string',
            'lastname' => 'required|max:255|string',
            'email' => 'required|email|unique:patients',
            'address' => 'required|max:255|string',
        ]);

        Patient::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect('patients/create')->with('status', 'Patient created successfully!');
    }

    function edit(Request $request)
    {
        return view('patient.edit', [
            'patient' => Patient::findOrFail($request->id)
        ]);
    }

    function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255|string',
            'lastname' => 'required|max:255|string',
            'email' => 'required|email|sometimes',
            'address' => 'required|max:255|string',
        ]);

        Patient::findOrFail($request->id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect()->back()->with('status', 'Patient updated successfully!');
    }

    function destroy(Request $request)
    {
        Patient::findOrFail($request->id)->delete();

        return redirect('patients')->with('status', 'Patient deleted.');
    }
}
