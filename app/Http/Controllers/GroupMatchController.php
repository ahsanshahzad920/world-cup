<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupMatch;
use Illuminate\Http\Request;

class GroupMatchController extends Controller
{
    public function index($group,$tournament)
    {
        $match = GroupMatch::where('tournament_id',$tournament)->where('group',$group)->get();
        
        
        return view('client/match.index',compact('group','tournament','match'));
    }
}
