<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index(){
        $tournament = Tournament::orderBy('created_at','DESC')->get();
        return view('client/tournament.index',compact('tournament'));
    }
}
