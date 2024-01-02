<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        SensorData::create($data);

        return response()->json(['message' => 'Sensor data received successfully']);
    }
    public function receiveDht11Data(Request $request)
    {
        $data = $request->json()->all();
        $temperature = $data['temperature'];
        $humidity = $data['humidity'];

        SensorData::create($data);

        return response()->json(['message' => 'Sensor data disimpan.']);
    }
}
