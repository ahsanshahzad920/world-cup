@extends('layouts.app')
@section('style')
    <style>
        .tabset>input[type="radio"] {
            position: absolute;
            left: -200vw;
        }

        .tabset .tab-panel {
            display: none;
        }

        .tabset>input:first-child:checked~.tab-panels>.tab-panel:first-child,
        .tabset>input:nth-child(3):checked~.tab-panels>.tab-panel:nth-child(2),
        .tabset>input:nth-child(5):checked~.tab-panels>.tab-panel:nth-child(3),
        .tabset>input:nth-child(7):checked~.tab-panels>.tab-panel:nth-child(4),
        .tabset>input:nth-child(9):checked~.tab-panels>.tab-panel:nth-child(5),
        .tabset>input:nth-child(11):checked~.tab-panels>.tab-panel:nth-child(6) {
            display: block;
        }

        /*
     Styling
    */

        .tabset>label {
            position: relative;
            display: inline-block;
            padding: 15px 15px 25px;
            border: 1px solid transparent;
            border-bottom: 0;
            cursor: pointer;
            font-weight: 600;
        }

        .tabset>label::after {
            content: "";
            position: absolute;
            left: 15px;
            bottom: 10px;
            width: 22px;
            height: 4px;
            background: #8d8d8d;
        }

        .tabset>label:hover,
        .tabset>input:focus+label {
            color: #06c;
        }

        .tabset>label:hover::after,
        .tabset>input:focus+label::after,
        .tabset>input:checked+label::after {
            background: #06c;
        }

        .tabset>input:checked+label {
            border-color: #ccc;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
        }

        .tab-panel {
            padding: 30px 0;
            border-top: 1px solid #ccc;
        }

        /*
     Demo purposes only
    */
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }


        .tabset {
            max-width: 65em;
        }
    </style>
@endsection
@section('content')
    <div class="hall-of-fame mb-5">
        <div class="container">

            <h1 class="main-heading light-green-color py-4">Hall of Fame</h1>
            <div class="tabset">
                @foreach ($tournament as $loop => $item)
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab{{$item->id}}" aria-controls="tournament{{$item->id??''}}" {{($loop->first)?'checked':''}}>
                <label for="tab{{$item->id}}">{{$item->name??''}}</label>
                @endforeach
                <div class="tab-panels">
                    @foreach ($tournament as $item)
                    <section id="tournament{{$item->id??''}}" class="tab-panel">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Participant</th>
                                        <th scope="col">Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($point->where('tournament_id', $item->id) as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->participant_name->first_name ?? '' }}
                                                {{ $item->participant_name->last_name ?? '' }}</td>
                                            <td>{{ $item->points ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </section>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection
