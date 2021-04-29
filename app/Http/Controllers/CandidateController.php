<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Candidate::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'regex:/^[A-Z][a-z]+$/'],
            'order_no' => ['required', 'regex:/^.[1-9]$/'],
            'vision' => ['required', 'regex:/^[A-Za-z0-9]+$/'],
            'election_id' => ['required', 'regex:/^.[1]$/']
        ]);

        // create a new candidate
        return Candidate::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Candidate::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $candidate = Candidate::find($id);

        $request->validate([
            'name' => ['required', 'regex:^[A-Z][a-z]'],
            'order_no' => ['required', 'regex:[1-9]', 'max:1'],
            'vision' => ['required', 'regex:[A-Za-z0-9]'],
        ]);

        $candidate->update($request->all());
        return $candidate;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
