<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ConsultationController extends BaseController
{
    public function store(Request $request)
    {
        try {
            $user = session('user');
            if (!$user) {
                return back()->with('error', 'You must be logged in to schedule a consultation.');
            }

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'age' => 'required|integer',
                'address' => 'required|string|max:255',
                'schedule' => 'required|date',
                'doctor' => 'required|string',
                'symptoms' => 'required|string',
                'description' => 'nullable|string',
            ]);

            $validatedData['user_id'] = $user['_id'];
            $validatedData['username'] = $user['username']; 

            Consultation::createConsultation($validatedData);

            return redirect('/home')->with('success', 'Consultation scheduled successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to schedule consultation. Please try again.');
        }
    }
}