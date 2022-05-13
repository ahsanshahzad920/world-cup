<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index($id)
    {
        $group = Group::where('tournament_id',$id)->get();
        return view('client/point.point',compact('group','id'));
    }
}
