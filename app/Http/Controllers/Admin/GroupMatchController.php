<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\GroupMatch;
use App\Http\Controllers\Controller;
use App\ParticipantMatch;
use App\ParticipantPoint;
use App\Prediction;
use Carbon\Carbon;
use Exception;
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
        // if($request->group=='Round of 16'){
        //     $validation = $request->validate(
        //         [
        //             'quater_group' => 'required',
        //         ]
        //     );
        //     $match->quater_group = $request->quater_group;
        // }
        $match->tournament_id = $request->tournament_id;
        $match->group = $request->group;
        $match->team1_id = $request->team1;
        $match->team2_id = $request->team2;
        $match->date = $request->date;
        $match->time = $request->time;
        $match->ground = $request->ground;
        $match->type = $request->type;
        if ($request->type == 'Quater Final') {
            $check = GroupMatch::where('type', 'Quater Final')->max('sr');
            $match->sr = $check + 1;
        } elseif ($request->type == 'Semifinal') {
            $check = GroupMatch::where('type', 'Semifinal')->max('sr');
            $match->sr = $check + 1;
        } elseif ($request->type == 'Final') {
            $match->sr = 1;
        } elseif ($request->type == 'Third Place') {
            $match->sr = 1;
        }
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
    public function matchUpdate(Request $request, $id)
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
    public function reset($id)
    {
        $match = GroupMatch::find($id);
        $match->goal1 = 0;
        $match->goal2 = 0;
        $match->win = null;
        $match->update();
        return back()->with('success', 'Match reset!');
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
        // dd($request->all());
        try {
            $validation = $request->validate(
                [
                    'goal1' => 'required',
                    'goal2' => 'required',
                ]
            );
            $match = GroupMatch::find($id);
            if ($request->goal1 > $request->goal2) {
                if ($match->type == 'Quater Final' || $match->type == 'Semifinal' || $match->type == 'Third Place' || $match->type == 'Final') {

                    $group = Group::where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->first();
                    $group->total_points = $group->total_points + 2;
                    $group->win = $group->win + 1;
                    $match->win = $match->team1_id;
                    $predition = Prediction::where('sr', $match->sr)->where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->where('type', $match->type)->get();
                    foreach ($predition as $item) {
                        $participant_point = ParticipantPoint::where('participant_id', $item->participant_id)->where('tournament_id', $request->tournament_id)->first();
                        if ($request->penalty == 'on' && isset($participant_point)) {
                            $participant_point->points = $participant_point->points + 1;
                            $item->point = 1;
                        } elseif (isset($participant_point)) {
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
                        } else {
                            $item->point = 0;
                        }
                        if ($match->team1_id == $item->team_id && $match->type == "Final") {
                            $participant_point->points = $participant_point->points + 10;
                            $participant_point->update();
                        }
                        $item->update();
                        $participant_point->update();
                    }
                } else {
                    $group = Group::where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->first();
                    $group->total_points = $group->total_points + 2;
                    $group->win = $group->win + 1;
                    $match->win = $match->team1_id;
                    $predition = Prediction::where('match_id', $match->id)->where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->get();
                    foreach ($predition as $item) {
                        $participant_point = ParticipantPoint::where('participant_id', $item->participant_id)->where('tournament_id', $request->tournament_id)->first();
                        if ($request->penalty == 'on' && isset($participant_point)) {
                            $participant_point->points = $participant_point->points + 1;
                            $item->point = 1;
                        } elseif (isset($participant_point)) {
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
                        } else {
                            $item->point = 0;
                        }
                        if ($match->team1_id == $item->team_id && $match->type == "Final" && isset($participant_point)) {
                            $participant_point->points = $participant_point->points + 10;
                            $participant_point->update();
                        }
                        $item->update();
                        $participant_point->update();
                    }
                }
            } elseif ($request->goal1 == $request->goal2) {
                if ($match->type == 'Quater Final' || $match->type == 'Semifinal' || $match->type == 'Third Place' || $match->type == 'Final') {
                    $group = Group::where('team_id', $request->team_id)->where('tournament_id', $request->tournament_id)->first();
                    $group->total_points = $group->total_points + 2;
                    $group->update();
                    $match->win = $request->team_id;
                    $predition = Prediction::where('sr', $match->sr)->where('team_id', $request->team_id)->where('tournament_id', $request->tournament_id)->where('type', $match->type)->where('penalty', 0)->get();
                    foreach ($predition as $item) {
                        $participant_point = ParticipantPoint::where('participant_id', $item->participant_id)->where('tournament_id', $request->tournament_id)->first();
                        if ($request->penalty == 'on' && isset($participant_point)) {
                            if ($item->team1_goal == $request->goal1 && $request->team_id == $item->team_id) {
                                $participant_point->points = $participant_point->points + 5;
                                $item->point = 5;
                            } else {
                                $participant_point->points = $participant_point->points + 4;
                                $item->point = 4;
                            }
                        } elseif ($request->penalty == 'on' && isset($participant_point)) {
                            if ($item->team1_goal != $request->goal1 && $request->team_id == $item->team_id) {
                                $participant_point->points = $participant_point->points + 3;
                                $item->point = 3;
                            } else {
                                $participant_point->points = $participant_point->points + 2;
                                $item->point = 2;
                            }
                        } else {
                            $item->point = 0;
                        }
                        if ($match->team1_id == $item->team_id && $match->type == "Final") {
                            $participant_point->points = $participant_point->points + 10;
                            $participant_point->update();
                            $item->point = 10;
                        }
                        $item->update();
                        $participant_point->update();
                    }
                } else {
                    $group = Group::where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->first();
                    $group = Group::where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->first();
                    $group->total_points = $group->total_points + 1;
                    $group->update();
                    $group1 = Group::where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->first();
                    $group1->total_points = $group1->total_points + 1;
                    $group1->update();
                    $match->win = $request->team_id;
                }
            } else {
                if ($match->type == 'Quater Final' || $match->type == 'Semifinal' || $match->type == 'Third Place' || $match->type == 'Final') {
                    $group = Group::where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->first();
                    $group->total_points = $group->total_points + 2;
                    $group->win = $group->win + 1;
                    $match->win = $match->team2_id;
                    $predition = Prediction::where('sr', $match->sr)->where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->where('type', $match->type)->get();
                    foreach ($predition as $item) {
                        $participant_point = ParticipantPoint::where('participant_id', $item->participant_id)->where('tournament_id', $request->tournament_id)->first();
                        if ($request->penalty == 'on' && isset($participant_point)) {
                            $participant_point->points = $participant_point->points + 1;
                            $item->point = 1;
                        } elseif (isset($participant_point)) {
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
                        } else {
                            $item->point = 0;
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
                        if ($request->penalty == 'on' && isset($participant_point)) {
                            $participant_point->points = $participant_point->points + 1;
                            $item->point = 1;
                        } elseif (isset($participant_point)) {
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
                        } else {
                            $item->point = 0;
                        }
                        $item->update();
                        $participant_point->update();
                    }
                }
            }
            if ($request->goal1 < $request->goal2) {
                $lose = Group::where('team_id', $match->team1_id)->where('tournament_id', $request->tournament_id)->first();
                $lose->lose = $group->lose + 1;
                $lose->update();
            } elseif ($request->goal1 > $request->goal2) {
                $lose = Group::where('team_id', $match->team2_id)->where('tournament_id', $request->tournament_id)->first();
                $lose->lose = $group->lose + 1;
                $lose->update();
            }
            $match->goal1 = $request->goal1;
            $match->goal2 = $request->goal2;
            $match->update();
            $group->update();

            return redirect('admin/match/' . $request->group . '/' . $request->tournament_id)->with('success', 'Match Points has updated!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
