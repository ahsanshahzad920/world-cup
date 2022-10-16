<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ParticipantPoint;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournament = Tournament::orderBy('id','ASC')->get();
        return view('admin/tournament.index',compact('tournament'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tournament.create');
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
                'name' => 'required|max:255',
                'start' => 'required|max:255',
                'end' => 'required|max:255',
                'country' => 'required|max:255',
            ]
        );
        $tournament = new Tournament;
        $tournament->name = $request->name;
        $tournament->start = $request->start;
        $tournament->end = $request->end;
        $tournament->country = $request->country;
        $tournament->save();
        return redirect('admin/tournament')->with('success','Tournament has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tournament = Tournament::find($id);
        return view('admin/tournament.edit',compact('tournament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'start' => 'required|max:255',
                'end' => 'required|max:255',
                'country' => 'required|max:255',
            ]
        );
        
        $tournament = Tournament::find($id);
        $tournament->name = $request->name;
        $tournament->start = $request->start;
        $tournament->end = $request->end;
        $tournament->country = $request->country;
        $tournament->update();
        return redirect('admin/tournament')->with('success','Tournament has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        $participant = ParticipantPoint::where('tournament_id',$tournament->id)->delete();
        $tournament->delete();
        return back()->with('success','Tournament has deleted!');
    }
}
