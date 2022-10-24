<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\GroupMatch;
use App\Http\Controllers\Controller;
use App\ParticipantPoint;
use App\Prediction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group, $tournament)
    {
        $match = GroupMatch::where('tournament_id', $tournament)->where('group', $group)->get();

        $team = Group::where('tournament_id', $tournament)->where('group', $group)->get();
        return view('admin/match.index', compact('group', 'tournament', 'match', 'team'));
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
                'type' => 'required',
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
        $match->type = $request->type;
        $match->city = $request->city;
        $groupMatch1 = Group::where('tournament_id', $request->tournament_id)->where('team_id', $request->team1)->first();
        $groupMatch1->total_match = $groupMatch1->total_match + 1;
        $groupMatch1->update();
        $groupMatch2 = Group::where('tournament_id', $request->tournament_id)->where('team_id', $request->team2)->first();
        $groupMatch2->total_match = $groupMatch2->total_match + 1;
        $groupMatch2->update();
        $match->save();
        return redirect('admin/match/' . $request->group . '/' . $request->tournament_id)->with('success', 'Group ' . $request->group . ' Match has created!');
    }
    public function matchUpdate(Request $request,$id)
    {
        $validation = $request->validate(
            [
                'team1' => 'required',
                'team2' => 'required',
                'date' => 'required',
                'time' => 'required',
                'ground' => 'required',
                'type' => 'required',
                'city' => 'required',
            ]
        );
        $match = GroupMatch::find($id);
        $match->tournament_id = $request->tournament_id;
        $match->group = $request->group;
        $match->team1_id = $request->team1;
        $match->team2_id = $request->team2;
        $match->date = $request->date;
        $match->time = $request->time;
        $match->ground = $request->ground;
        $match->type = $request->type;
        $match->city = $request->city;
        $match->update();
        return redirect('admin/match/' . $request->group . '/' . $request->tournament_id)->with('success', 'Group ' . $request->group . ' Match has updated!');
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
        return view('admin/match.edit', compact('match'));
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
            ]
        );
        $match = GroupMatch::find($id);
        if ($request->goal1 > $request->goal2) {
            $group = Group::where('team_id',$match->team1_id)->where('tournament_id',$request->tournament_id)->first();
            $group->total_points = $group->total_points+2;
            $group->win = $group->win+1;
            $match->win = $match->team1_id;
            $predition = Prediction::where('match_id', $match->id)->where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->get();
            foreach ($predition as $item) {
                $participant_point = ParticipantPoint::where('participant_id', $item->participant_id)->where('tournament_id', $request->tournament_id)->first();
                if ($request->penalty == 'on') {
                    $participant_point->points = $participant_point->points + 1;
                    $item->point = 1;
                } else {
                    if ($request->goal1 == $item->team1_goal && $request->goal2 == $item->team2_goal) {
                        $participant_point->points = $participant_point->points + 4;
                        $item->point = 4;
                    } elseif ($request->goal1 - $request->goal2 == $item->team1_goal - $item->team2_goal) {
                        $participant_point->points = $participant_point->points + 2;
                        $item->point = 2;
                    } else {
                        $participant_point->points = $participant_point->points + 1;
                        $item->point = 1;
                    }
                }
                if($match->team1_id == $item->team_id && $match->type=="Final"){
                    $participant_point->points = $participant_point->points + 10;
                    $participant_point->update();
                }
                $item->update();
                $participant_point->update();
            }
        } else {
            $group = Group::where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->first();
            $group->total_points = $group->total_points + 2;
            $group->win = $group->win + 1;
            $match->win = $match->team2_id;
            $predition = Prediction::where('match_id', $match->id)->where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->get();
            foreach ($predition as $item) {
                $participant_point = ParticipantPoint::where('participant_id', $item->participant_id)->where('tournament_id', $request->tournament_id)->first();
                if ($request->penalty == 'on') {
                    $participant_point->points = $participant_point->points + 1;
                    $item->point = 1;
                } else {
                    if ($request->goal1 == $item->team1_goal && $request->goal2 == $item->team2_goal) {

                        $participant_point->points = $participant_point->points + 4;
                        $item->point = 4;
                    } elseif ($request->goal1 - $request->goal2 == $item->team1_goal - $item->team2_goal) {
                        $participant_point->points = $participant_point->points + 2;
                        $item->point = 2;
                    } else {
                        $participant_point->points = $participant_point->points+1;
                        $item->point = 1;
                    }
                }
                $item->update();
                $participant_point->update();
            }
        }
        if ($request->goal1 < $request->goal2) {
            $lose = Group::where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->first();
            $lose->lose = $group->lose + 1;
            $lose->update();
        } else {
            $lose = Group::where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->first();
            $lose->lose = $group->lose + 1;
            $lose->update();
        }
        $match->goal1 = $request->goal1;
        $match->goal2 = $request->goal2;
        $match->update();
        $group->update();

        // Auto match create
        $match_16 = GroupMatch::where('type','Round of 16')->where('win','!=',null)->where('type','!=','Quater Final')->where('type','!=','Semifinal')->where('type','!=','Final')->get();
        $match_check = GroupMatch::where('type','Quater Final')->get();
        if(count($match_16)==8 && count($match_check)==0){
            for($i=0; $i<=7; $i++){
                $team_8 = new Group;
                $team_8->tournament_id = $match_16[$i]->tournament_id;
                $team_8->team_id = $match_16[$i]->win;
                $team_8->group = 'Quater Final';
                $team_8->save();
            }
            $quater_1 = new GroupMatch;
            $quater_1->tournament_id = $match_16[0]->tournament_id;
            $quater_1->team1_id = $match_16[0]->win;
            $quater_1->team2_id = $match_16[1]->win;
            $quater_1->group = 'Quater Final';
            $quater_1->type = 'Quater Final';
            $quater_1->date = Carbon::now()->addDay(2);
            $quater_1->time = Carbon::now()->timestamp;
            $quater_1->ground = 'Al Bayt';
            $quater_1->save();
            // Match 2nd
            $quater_2 = new GroupMatch;
            $quater_2->tournament_id = $match_16[0]->tournament_id;
            $quater_2->team1_id = $match_16[2]->win;
            $quater_2->team2_id = $match_16[3]->win;
            $quater_2->group = 'Quater Final';
            $quater_2->type = 'Quater Final';
            $quater_2->date = $quater_1->date->addDay(2);
            $quater_2->time = Carbon::now()->timestamp;
            $quater_2->ground = 'Al Bayt';
            $quater_2->save();
            // Match 3rd
            $quater_3 = new GroupMatch;
            $quater_3->tournament_id = $match_16[0]->tournament_id;
            $quater_3->team1_id = $match_16[4]->win;
            $quater_3->team2_id = $match_16[5]->win;
            $quater_3->group = 'Quater Final';
            $quater_3->type = 'Quater Final';
            $quater_3->date = $quater_2->date->addDay(2);
            $quater_3->time = Carbon::now()->timestamp;
            $quater_3->ground = 'Al Bayt';
            $quater_3->save();
            // Match 4rth
            $quater_4 = new GroupMatch;
            $quater_4->tournament_id = $match_16[0]->tournament_id;
            $quater_4->team1_id = $match_16[6]->win;
            $quater_4->team2_id = $match_16[7]->win;
            $quater_4->group = 'Quater Final';
            $quater_4->type = 'Quater Final';
            $quater_4->date = $quater_3->date->addDay(2);
            $quater_4->time = Carbon::now()->timestamp;
            $quater_4->ground = 'Al Bayt';
            $quater_4->save();
            
        }

        $match_8 = GroupMatch::where('type','Quater Final')->where('win','!=',null)->where('type','!=','Semifinal')->get();
        $match_semi = GroupMatch::where('type','Semifinal')->get();
        if(count($match_8)==4 && count($match_semi)==0){
            for($i=0; $i<=3; $i++){
                $team_4 = new Group;
                $team_4->tournament_id = $match_8[$i]->tournament_id;
                $team_4->team_id = $match_8[$i]->win;
                $team_4->group = 'Semifinal';
                $team_4->save();
            }
            $semi_1 = new GroupMatch;
            $semi_1->tournament_id = $match_8[0]->tournament_id;
            $semi_1->team1_id = $match_8[0]->win;
            $semi_1->team2_id = $match_8[1]->win;
            $semi_1->group = 'Semifinal';
            $semi_1->type = 'Semifinal';
            $semi_1->date = Carbon::now()->addDay(2);
            $semi_1->time = Carbon::now()->timestamp;
            $semi_1->ground = 'Al Bayt';
            $semi_1->save();
            // Match 2nd
            $semi_2 = new GroupMatch;
            $semi_2->tournament_id = $match_8[0]->tournament_id;
            $semi_2->team1_id = $match_8[2]->win;
            $semi_2->team2_id = $match_8[3]->win;
            $semi_2->group = 'Semifinal';
            $semi_2->type = 'Semifinal';
            $semi_2->date = $semi_1->date->addDay(2);
            $semi_2->time = Carbon::now()->timestamp;
            $semi_2->ground = 'Al Bayt';
            $semi_2->save();
            
            
        }
        $match_4 = GroupMatch::where('type','Semifinal')->where('win','!=',null)->where('type','!=','Final')->get();
        $match_final = GroupMatch::where('type','Final')->get();
        if(count($match_4)==2 && count($match_final)==0){
            for($i=0; $i<=1; $i++){
                $team_2 = new Group;
                $team_2->tournament_id = $match_4[$i]->tournament_id;
                $team_2->team_id = $match_4[$i]->win;
                $team_2->group = 'Final';
                $team_2->save();
            }
            $final_1 = new GroupMatch;
            $final_1->tournament_id = $match_4[0]->tournament_id;
            $final_1->team1_id = $match_4[0]->win;
            $final_1->team2_id = $match_4[1]->win;
            $final_1->group = 'Final';
            $final_1->type = 'Final';
            $final_1->date = Carbon::now()->addDay(2);
            $final_1->time = Carbon::now()->timestamp;
            $final_1->ground = 'Al Bayt';
            $final_1->save();
            // Third Place
            for($i=0; $i<=1; $i++){
                $team_2 = new Group;
                $team_2->tournament_id = $match_4[$i]->tournament_id;
                $team_2->team_id = ($match_4[$i]->win==$match_4[$i]->team1_id)?$match_4[$i]->team2_id:$match_4[$i]->team1_id;
                $team_2->group = 'Third Place';
                $team_2->save();
            }
            $third_2 = new GroupMatch;
            $third_2->tournament_id = $match_4[0]->tournament_id;
            $third_2->team1_id = ($match_4[0]->win==$match_4[0]->team1_id)?$match_4[0]->team2_id:$match_4[0]->team1_id;
            $third_2->team2_id = ($match_4[1]->win==$match_4[1]->team1_id)?$match_4[1]->team2_id:$match_4[1]->team1_id;
            $third_2->group = 'Third Place';
            $third_2->type = 'Third Place';
            $third_2->date = Carbon::now()->addDay(1);
            $third_2->time = Carbon::now()->timestamp;
            $third_2->ground = 'Al Bayt';
            $third_2->save();
            
            
        }
        return redirect('admin/match/' . $request->group . '/' . $request->tournament_id)->with('success', 'Match Points has updated!');
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

        return back()->with('success', 'Group Match has deleted!');
    }
}
