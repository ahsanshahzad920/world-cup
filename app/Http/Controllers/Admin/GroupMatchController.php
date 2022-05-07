<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\GroupMatch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group,$tournament)
    {
        $match = GroupMatch::where('tournament_id',$tournament)->where('group',$group)->get();
        
        $team = Group::where('tournament_id',$tournament)->where('group',$group)->get();
        return view('admin/match.index',compact('group','tournament','match','team'));
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
                'team1' => 'required',
                'team2' => 'required',
                'date' => 'required',
                'time' => 'required',
                'ground' => 'required',
                'city' => 'required',
            ]
        );
        $match = new GroupMatch;
        $match->tournament_id = $request->tournament_id;
        $match->group = $request->group;
        $match->team1_id = $request->team1;
        $match->team2_id = $request->team2;
        $match->date = $request->date;
        $match->time = $request->time;
        $match->ground = $request->ground;
        $match->city = $request->city;
        $match->save();
        return redirect('admin/match/'.$request->group.'/'.$request->tournament_id)->with('success','Group '.$request->group.' Match has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupMatch  $groupMatch
     * @return \Illuminate\Http\Response
     */
    public function show(GroupMatch $groupMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupMatch  $groupMatch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = GroupMatch::find($id);
        return view('admin/match.edit',compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupMatch  $groupMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'goal1' => 'required',
                'goal2' => 'required',
                'point1' => 'required',
                'point2' => 'required',
            ]
        );
        $match = GroupMatch::find($id);
        $match->goal1 = $request->goal1;
        $match->goal2 = $request->goal2;
        $match->point1 = $request->point1;
        $match->point2 = $request->point2;
        $match->update();
        return redirect('admin/match/'.$request->group.'/'.$request->tournament_id)->with('success','Match Points has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupMatch  $groupMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = GroupMatch::find($id);
        $match->delete();

        return back()->with('success','Group Match has deleted!');
    }
}
