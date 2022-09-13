@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Predictions
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                Sr.
                            </th>
                            <th>
                                Tournament
                            </th>
                            <th>
                                Match No
                            </th>
                            <th>
                                Match Type
                            </th>
                            <th>
                                Win Team
                            </th>
                            <th>
                                Team 1 Goal
                            </th>
                            <th>
                                Team 2 Goal
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prediction as $index => $item)
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    <a
                                        href="{{ url('point-table/' . $item->id) }}">{{ $item->tournament_name->name ?? '' }}</a>
                                </td>
                                <td>
                                    {{ $item->match_id ?? '' }}
                                </td>
                                <td>
                                    {{ $item->match_name->type ?? '' }}
                                </td>
                                <td>
                                    {{ $item->win_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->match_name->team1_name->name ?? '' }} <br>
                                    Goal: {{$item->team1_goal??''}}
                                </td>
                                <td>
                                    {{ $item->match_name->team2_name->name ?? '' }} <br>
                                    Goal: {{$item->team2_goal??''}}
                                </td>
                                <td>
                                    @if ($item->allow == 0)
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#model{{$item->id??''}}">
                                            Update
                                        </button>
                                    @else
                                        Not Allow
                                    @endif
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="model{{$item->id??''}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Prediction
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('client.Predition.update',$item->id)}}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <b>Select Your Win Team</b>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="radio" name="team_id" value="{{$item->match_name->team1_name->id??''}}" @if($item->match_name->team1_name->id==$item->team_id) checked @endif id="" required>
                                                        <label for="">{{$item->match_name->team1_name->name??''}}</label>
                                                        <img src="{{asset($item->match_name->team1_name->flag??'')}}" style="height:50px; width:70px;" alt="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Goals</label>
                                                        <input type="number" required name="team1_goal" value="{{$item->team1_goal??'0'}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="radio" name="team_id" value="{{$item->match_name->team2_name->id??''}}" @if($item->match_name->team2_name->id==$item->team_id) checked @endif id="" required>
                                                        <label for="">{{$item->match_name->team2_name->name??''}}</label>
                                                        <img src="{{asset($item->match_name->team2_name->flag??'')}}" style="height:50px; width:70px;" alt="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Goals</label>
                                                        <input type="number" required name="team2_goal" value="{{$item->team2_goal??'0'}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
