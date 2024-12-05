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

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'age' => 'required|integer',
                'address' => 'required|string|max:255',
                'schedule' => 'required|date',
                'doctor' => 'required|string',
                'symptoms' => 'required|string',
                'description' => 'nullable|string',
            ]);

            Consultation::updateConsultation($id, $validatedData);
            return response()->json(['message' => 'Consultation updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $result = Consultation::deleteConsultation($id);
            
            if ($result->getDeletedCount() > 0) {
                return response()->json(['message' => 'Consultation deleted successfully']);
            } else {
                return response()->json(['error' => 'No consultation was deleted'], 404);
            }
        } catch (\Exception $e) {
            \Log::error('Delete consultation error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}