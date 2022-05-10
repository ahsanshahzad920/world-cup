@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Tournaments
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Start
                        </th>
                        <th>
                            End
                        </th>
                        <th>
                            Country
                        </th>
                        <th>
                            City
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tournament as $key => $item)
                        <tr>
                            <td>
                                {{$item->id??''}}
                            </td>
                            <td>
                                <a href="{{url('point/'.$item->id)}}">{{ $item->name ?? '' }}</a>
                            </td>
                            <td>
                                {{ $item->start ?? '' }}
                            </td>
                            <td>
                                {{ $item->end ?? '' }}
                            </td>
                            <td>
                                {{ $item->country ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
