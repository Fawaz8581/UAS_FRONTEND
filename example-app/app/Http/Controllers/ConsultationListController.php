<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationListController extends Controller
{
    public function index()
    {
        try {
            $consultations = Consultation::getAllConsultations();
            return view('consultation-list', compact('consultations'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to load consultations: ' . $e->getMessage());
        }
    }

    public function getConsultations()
    {
        try {
            $consultations = Consultation::getAllConsultations();
            return response()->json($consultations);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}