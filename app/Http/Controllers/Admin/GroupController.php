<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $group = Group::where('tournament_id',$id)->get();
        return view('admin/group.index',compact('group','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $team = Team::orderBy('name','ASC')->get();
        return view('admin/group.create',compact('team','id'));
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
                'group' => 'required',
                'team1' => 'required',
                'team2' => 'required',
                'date' => 'required',
                'time' => 'required',
                'ground' => 'required',
                'city' => 'required',
            ]
        );
        $group = new Group;
        $group->tournament_id = $request->id;
        $group->group = $request->group;
        $group->team1_id = $request->team1;
        $group->team2_id = $request->team2;
        $group->date = $request->date;
        $group->time = $request->time;
        $group->ground = $request->ground;
        $group->city = $request->city;
        $group->save();
        return redirect('admin/group/'.$request->id)->with('success','Group Match has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        $team = Team::orderBy('name','ASC')->get();
        return view('admin/group.edit',compact('group','team'));
    }

    public function match_edit($id)
    {
        $group = Group::find($id);
        return view('admin/group.match',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'group' => 'required',
                'team1' => 'required',
                'team2' => 'required',
                'date' => 'required',
                'time' => 'required',
                'ground' => 'required',
                'city' => 'required',
            ]
        );
        $group = Group::find($id);
        $group->tournament_id = $request->id;
        $group->group = $request->group;
        $group->team1_id = $request->team1;
        $group->team2_id = $request->team2;
        $group->date = $request->date;
        $group->time = $request->time;
        $group->ground = $request->ground;
        $group->city = $request->city;
        $group->update();
        return redirect('admin/group/'.$request->id)->with('success','Group Match has updated!');
    }

    public function match_update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'goal1' => 'required',
                'goal2' => 'required',
                'point1' => 'required',
                'point2' => 'required',
            ]
        );
        $group = Group::find($id);
        $group->goal1 = $request->goal1;
        $group->goal2 = $request->goal2;
        $group->point1 = $request->point1;
        $group->point2 = $request->point2;
        $group->update();
        return redirect('admin/group/'.$request->id)->with('success','Match has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return back()->with('success','Group has deleted!');
    }
}
