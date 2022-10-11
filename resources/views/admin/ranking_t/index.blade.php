@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.ranking-tournament.create") }}">
                Add New 
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Ranking Tournament
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
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ranking_t as $index => $item)
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->name ?? '' }}
                            </td>
                            <td>

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ranking-tournament.edit', $item->id) }}">
                                        Edit
                                    </a>
                               

                                
                                    <form action="{{ route('admin.ranking-tournament.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
