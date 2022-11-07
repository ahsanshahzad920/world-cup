<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\ParticipantMatch;
use App\Team;
use App\Tournament;
use App\User;
use Illuminate\Http\Request;

class ParticipantMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $match = ParticipantMatch::all();
        return view('admin/participant_match.index',compact('match'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Team::get();
        $participant = User::where('permission',1)->get();
        $tournament = Tournament::get();
        return view('admin/participant_match.create',compact('team','participant','tournament'));
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
                'team1_id' => 'required',
                'team2_id' => 'required',
                'participant_id' => 'required',
                'type' => 'required',
                'tournament_id' => 'required',
            ]
        );
        $match_sr = ParticipantMatch::where('participant_id',$request->participant_id)->where('type',$request->type)->max('sr');
        $match = new ParticipantMatch;
        $match->tournament_id = $request->tournament_id;
        $match->team1_id = $request->team1_id;
        $match->team2_id = $request->team2_id;
        $match->type = $request->type;
        $match->participant_id = $request->participant_id;
        $match->sr = $match_sr+1;
        $match->save();
        return redirect('admin/participant-match')->with('success','Participant Match created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParticipantMatch  $participantMatch
     * @return \Illuminate\Http\Response
     */
    public function show(ParticipantMatch $participantMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParticipantMatch  $participantMatch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::get();
        $participant = User::where('permission',1)->get();
        $tournament = Tournament::get();
        $match = ParticipantMatch::find($id);
        return view('admin/participant_match.edit',compact('team','participant','tournament','match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParticipantMatch  $participantMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'team1_id' => 'required',
                'team2_id' => 'required',
                'participant_id' => 'required',
                'type' => 'required',
                'tournament_id' => 'required',
            ]
        );
        $match = ParticipantMatch::find($id);
        $match->tournament_id = $request->tournament_id;
        $match->team1_id = $request->team1_id;
        $match->team2_id = $request->team2_id;
        $match->type = $request->type;
        $match->participant_id = $request->participant_id;
        $match->update();
        return redirect('admin/participant-match')->with('success','Participant Match updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParticipantMatch  $participantMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = ParticipantMatch::find($id);
        $match->delete();

        return back()->with('success', 'Participant Match has deleted!');
    }
}
