<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupMatch;
use App\ParticipantMatch;
use App\Prediction;
use App\Team;
use Illuminate\Http\Request;

class GroupMatchController extends Controller
{
    public function index($group,$tournament)
    {
        $match = GroupMatch::where('tournament_id',$tournament)->where('group',$group)->get();
        $predition = Prediction::where('tournament_id',$tournament)->get();
        return view('client/match.index',compact('group','tournament','match','predition'));
    }
    public function first_entry()
    {
        $match = GroupMatch::where('type','Group Match')->get();
        $predition = Prediction::where('participant_id',Auth()->user()->id)->get();
        $team = Team::orderBy('name','ASC')->get();
        return view('client/first_entry.index',compact('match','predition','team'));
    }
    public function second_entry()
    {
        $match = GroupMatch::where('type','Round of 16')->get();
        $quarter = ParticipantMatch::where('type','Quater Final')->where('participant_id',Auth()->user()->id)->where('team2_id','!=',null)->get();
        $semi = ParticipantMatch::where('type','Semifinal')->where('participant_id',Auth()->user()->id)->where('team2_id','!=',null)->get();
        $third = ParticipantMatch::where('type','Third Place')->where('participant_id',Auth()->user()->id)->where('team2_id','!=',null)->get();
        $final = ParticipantMatch::where('type','Final')->where('participant_id',Auth()->user()->id)->where('team2_id','!=',null)->get();
        $predition = Prediction::where('participant_id',Auth()->user()->id)->get();
        return view('client/second_entry.index',compact('match','predition','quarter','semi','third','final'));
    }
    public function world_cup(Request $request)
    {
        $winner = new Prediction;
        $winner->participant_id = Auth()->user()->id;
        $winner->team_id = $request->team;
        $winner->type = 'winner';
        $winner->save();
        return back();
    }
}
