<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RankingTournament;
use Illuminate\Http\Request;

class RankingTournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranking_t = RankingTournament::orderBy('id', 'ASC')->get();
        return view('admin/ranking_t.index', compact('ranking_t'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/ranking_t.create');
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
            ]
        );
        $ranking_t = new RankingTournament;
        $ranking_t->name = $request->name;
        $ranking_t->save();
        return redirect('admin/ranking-tournament')->with('success', 'Ranking Tournament has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RankingTournament  $ranking_t
     * @return \Illuminate\Http\Response
     */
    public function show(RankingTournament $ranking_t)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RankingTournament  $ranking_t
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ranking_t = RankingTournament::find($id);
        return view('admin/ranking_t.edit', compact('ranking_t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RankingTournament  $ranking_t
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255'
            ]
        );
        $ranking_t = RankingTournament::find($id);
        $ranking_t->name = $request->name;
        $ranking_t->update();
        return redirect('admin/ranking-tournament')->with('success', 'Ranking Tournament has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RankingTournament  $ranking_t
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ranking_t = RankingTournament::find($request->id);
        $ranking_t->delete();

        return back()->with('success', 'Tanking Tournament has deleted!');
    }
}
