<?php

namespace App\Http\Controllers;

use App\Models\Snoep;
use Illuminate\Http\Request;

class SnoepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $snoep = Snoep::all();
 
    return view('snoep.index', compact('snoep')); // -> resources/views/snoep/index.blade.php 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('snoep.create'); // -> resources/views/snoep/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Log the data to see what's being received
    \Log::info('Received data: ', $request->all());

    // Validate input data
    $request->validate([
        'naam' => 'required',
        'value' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
    ]);

    // Create and save the new snoep
    $snoep = new Snoep([
        'naam' => $request->get('naam'),
        'value' => $request->get('value')
    ]);

    $snoep->save();

    return redirect('/snoep')->with('success', 'Snoep saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $snoep = Snoep::find($id);
        return view('snoep.edit',['snoep'=>$snoep]);  // -> resources/views/snoep/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
    $request->validate([
        'naam'=>'required',
        'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
    ]); 
    $snoep = Snoep::find($id);
    // Getting values from the blade template form
    $snoep->naam =  $request->get('naam');
    $snoep->value = $request->get('value');
    $snoep->save();

    return redirect('/snoep'); // -> resources/views/snoep/index.blade.php
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $snoep = Snoep::find($id);
        $snoep->delete(); // Easy right?
    
        return redirect('/snoep');  // -> resources/views/snoep/index.blade.php
    }
}
