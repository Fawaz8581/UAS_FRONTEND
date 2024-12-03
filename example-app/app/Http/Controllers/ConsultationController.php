<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ConsultationController extends BaseController
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
            'schedule' => 'required|date',
            'doctor' => 'required|string',
            'symptoms' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Consultation::createConsultation($validatedData);

        return redirect()->back()->with('success', 'Consultation appointment saved successfully!');
    }
}