<?php

namespace App\Http\Controllers;

use App\Models\Cupcake;
use App\Http\Resources\CupcakeResource;
use Illuminate\Http\Request;

class CupcakeController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            "is_available" => 'required|bool',
            "is_advertised" =>'required|bool',
        ]);

        $cupcake = Cupcake::create($validatedData);
        return (new CupcakeResource($cupcake))->response()->setStatusCode(201);
    }

    public function update(Request $request,Cupcake $cupcake)

    {
        $validated= $request->validate([
            'name' => 'sometimes|string|max:255',
            'image' => 'sometimes|string',
            'quantity' => 'sometimes|integer|min:0',
            'price' => 'sometimes|numeric|min:0',
            "is_available" => 'sometimes|bool',
            "is_advertised" =>'sometimes|bool',
        ]);

        $cupcake->update($validated);
        return (new CupcakeResource($cupcake))->response()->setStatusCode(201);
    }

    public function destroy(Cupcake $cupcake)
    {   
        $cupcake->delete();
        return CupcakeResource::make($cupcake);
    }
    
    
}
