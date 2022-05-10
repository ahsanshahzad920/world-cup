<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ParticipantPoint;
use App\Tournament;
use Illuminate\Http\Request;

class ParticipantPointController extends Controller
{
    public function index(){
        $tournament = Tournament::orderBy('created_at','DESC')->get();
        $participant_point = ParticipantPoint::orderBy('created_at','DESC')->get();
        return view('admin/participant_point.index',compact('tournament','participant_point'));
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParticipantPoint  $participantPoint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tournament = Tournament::find($id);
        $point = ParticipantPoint::where('tournament_id',$id)->orderBy('points','DESC')->get();
        return view('admin/participant_point.show',compact('point','tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParticipantPoint  $participantPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(ParticipantPoint $participantPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParticipantPoint  $participantPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParticipantPoint $participantPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParticipantPoint  $participantPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParticipantPoint $participantPoint)
    {
        //
    }
}
