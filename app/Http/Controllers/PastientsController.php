<?php

namespace App\Http\Controllers;
//import model patients
use App\Models\Patients;
use Illuminate\Http\Request;

class PastientsController extends Controller
{
    //function menampilkan data patients
    public function loadAllpatients()
    {
        $all_patients = Patients::all();
        return view('patients', compact('all_patients'));
    }

    //menampilkan halam form tambah
    public function loadAddPatientsForm(){
        return view('add-patients');
    }
}
