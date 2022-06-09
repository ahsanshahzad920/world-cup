<?php

namespace App\Http\Controllers;

use App\Prediction;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'team_id' => 'required',
                'team1_goal' => 'required',
                'team2_goal' => 'required'
            ]
        );
        $prediction = new Prediction;
        $prediction->tournament_id = $request->tournament_id;
        $prediction->participant_id = Auth()->user()->id;
        $prediction->match_id = $request->match_id;
        $prediction->team_id = $request->team_id;
        $prediction->team1_goal = $request->team1_goal;
        $prediction->team2_goal = $request->team2_goal;
        $prediction->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function show(Prediction $prediction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function edit(Prediction $prediction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prediction $prediction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prediction $prediction)
    {
        //
    }
}
