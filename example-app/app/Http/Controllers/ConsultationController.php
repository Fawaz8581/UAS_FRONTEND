<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;

class ConsultationController extends Controller
{
    protected $collection;

    public function __construct()
    {
        $client = new Mongo(env('MONGO_URI'));
        $this->collection = $client->mydatabase->consultations;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'address' => 'required|string',
            'symptoms' => 'required|string',
            'schedule' => 'required|date',
            'doctor' => 'required|string',
        ]);

        $this->collection->insertOne($data);

        return response()->json(['message' => 'Consultation scheduled successfully'], 201);
    }
}