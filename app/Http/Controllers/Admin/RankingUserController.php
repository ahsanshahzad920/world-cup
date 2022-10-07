<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RankingTournament;
use App\RankingUser;
use App\User;
use Illuminate\Http\Request;

class RankingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RankingUser = RankingUser::orderBy('id', 'ASC')->get();
        return view('admin/ranking_p.index', compact('RankingUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournament = RankingTournament::orderBy('name','ASC')->get();
        return view('admin/ranking_p.create',compact('tournament'));
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
                'tournament' => 'required',
                'participant' => 'required',
                'point' => 'required'
            ]
        );
        $RankingUser = new RankingUser;
        $RankingUser->tournament_id = $request->tournament;
        $RankingUser->participant = $request->participant;
        $RankingUser->point = $request->point;
        $RankingUser->save();
        return redirect('admin/ranking-points')->with('success', 'Ranking Point has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RankingUser  $RankingUser
     * @return \Illuminate\Http\Response
     */
    public function show(RankingUser $RankingUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RankingUser  $RankingUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RankingUser = RankingUser::find($id);
        $tournament = RankingTournament::orderBy('name','ASC')->get();
        return view('admin/ranking_p.edit', compact('RankingUser','tournament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RankingUser  $RankingUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'tournament' => 'required',
                'participant' => 'required',
                'point' => 'required'
            ]
        );
        $RankingUser = RankingUser::find($id);
        $RankingUser->tournament_id = $request->tournament;
        $RankingUser->participant = $request->participant;
        $RankingUser->point = $request->point;
        $RankingUser->update();
        return redirect('admin/ranking-points')->with('success', 'Ranking Point has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RankingUser  $RankingUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $RankingUser = RankingUser::find($request->id);
        $RankingUser->delete();

        return back()->with('success', 'Tanking Point has deleted!');
    }
}
