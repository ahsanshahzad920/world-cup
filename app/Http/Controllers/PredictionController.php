<?php

namespace App\Http\Controllers;

use App\GroupMatch;
use App\ParticipantMatch;
use App\Prediction;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prediction = Prediction::orderBy('created_at', 'DESC')->where('participant_id', Auth()->user()->id)->get();
        return view('client/my_prediction', compact('prediction'));
    }
    public function first_entry($tournament)
    {
        $prediction = Prediction::where('participant_id', Auth()->user()->id)->get();
        return view('client/first_entry.index', compact('prediction'));
    }
    public function second_entry($tournament)
    {
        $prediction = Prediction::all();
        return view('client/second_entry.index', compact('prediction'));
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
                'team_id' => 'required',
                'team1_goal' => 'required',
                'team2_goal' => 'required'
            ]
        );
        $prediction = new Prediction;
        $prediction->tournament_id = $request->tournament_id;
        $prediction->participant_id = Auth()->user()->id;
        $prediction->match_id = $request->match_id;
        $prediction->team_id = $request->team_id;
        $prediction->team1_goal = $request->team1_goal;
        $prediction->team2_goal = $request->team2_goal;
        $match = GroupMatch::find($request->match_id);
        $prediction->type = $match->type;
        $prediction->save();
        return back();
    }

    public function second(Request $request)
    {
        // dd($request->all());
        $penalty = 1;
        if($request->penalty=='on'){
            if($request->goal1 != $request->goal2){
                return back()->with('error','Penalty not select if match not tie!');
            }
            $penalty = 0;
        }
        $prediction = new Prediction;
        if ($request->type == "Round of 16") {
            $prediction->match_id = $request->match_id;
        } else {
            $prediction->sr = $request->sr;
            $match = ParticipantMatch::find($request->id);
            $match->win_id = $request->team_id;
            $match->update();
        }
        $prediction->tournament_id = $request->tournament_id;
        $prediction->participant_id = Auth()->user()->id;

        $prediction->team_id = $request->team_id;
        $prediction->team1_goal = $request->goal1;
        $prediction->team2_goal = $request->goal2;
        $prediction->type = $request->type;
        $prediction->penalty = $penalty;
        $prediction->team_id = $request->team_id;
        $prediction->save();
        // if ($request->type == 'Round of 16') {
        //     $type = 'Quater Final';
        // } elseif ($request->type == 'Quater Final') {
        //     $type = 'Semifinal';
        // } elseif ($request->type == 'Semifinal') {
        //     $type = 'Final';
        // }
        // //Match create
        // if ($request->type != 'Final' && $request->type != 'Third Place') {
        //     $check = ParticipantMatch::where('participant_id', Auth()->user()->id)->where('type', $type)->orderBy('created_at', 'DESC')->first();
        //     if ($check != null && $check->team2_id == null) {
        //         $match_check = ParticipantMatch::where('participant_id', Auth()->user()->id)->where('type', $type)->where('team2_id', Null)->where('team1_id', '!=', Null)->first();
        //         if ($match_check != null) {
        //             $match_check->team2_id = $request->team_id;
        //             $match_check->update();
        //         }
        //     } else {
        //         $match = new ParticipantMatch;
        //         $match->tournament_id = $request->tournament_id;
        //         if(isset($request->sr)){
        //             $sr_no = $request->sr;
        //         }else{
        //             if(isset($check->sr)){
        //                 $sr_no = $check->sr + 1;
        //             }else{
        //                 $sr_no = 1;
        //             }
                   
        //         }
        //         $match->sr = $sr_no;
        //         $match->type = $type;
        //         $match->team1_id = $request->team_id;
        //         $match->participant_id = Auth()->user()->id;
        //         $match->save();
        //     }
        //     if ($type == 'Final') {
        //         $check_third = ParticipantMatch::where('participant_id', Auth()->user()->id)->where('type', 'Third Place')->orderBy('created_at', 'DESC')->first();
        //         $team1 = ParticipantMatch::where('participant_id', Auth()->user()->id)->where('type', 'Semifinal')->where('team1_id', $request->team_id)->first();

        //         $team2 = ParticipantMatch::where('participant_id', Auth()->user()->id)->where('type', 'Semifinal')->where('team2_id', $request->team_id)->first();
        //         if ($check_third != null && $check->team2_id == null) {
        //             $match_check_third = ParticipantMatch::where('participant_id', Auth()->user()->id)->where('type', 'Third Place')->where('team2_id', Null)->where('team1_id', '!=', Null)->first();
        //             if ($match_check_third != null) {
        //                 $match_check_third->team2_id = ($request->team_id = $team1->team1_id) ? $team1->team2_id : $team2->team1_id;
        //                 $match_check_third->update();
        //             }
        //         } else {
        //             $match_third = new ParticipantMatch;
        //             $match_third->tournament_id = $request->tournament_id;
        //             $match_third->sr = 1;
        //             $match_third->type = 'Third Place';
        //             $match_third->team1_id = ($request->team_id = isset($team1->team1_id) ?? $team2->team1_id) ? $team1->team2_id : $team2->team1_id;
        //             $match_third->participant_id = Auth()->user()->id;
        //             $match_third->save();
        //         }
        //     }
        // }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function show(Prediction $prediction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function edit(Prediction $prediction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'team_id' => 'required',
                'team1_goal' => 'required',
                'team2_goal' => 'required'
            ]
        );
        $prediction = Prediction::find($id);
        $prediction->team_id = $request->team_id;
        $prediction->team1_goal = $request->team1_goal;
        $prediction->team2_goal = $request->team2_goal;
        $prediction->allow = 1;
        $prediction->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prediction $prediction)
    {
        //
    }
}
