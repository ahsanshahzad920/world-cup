@extends('layouts.admin')
@section('content')
    
    <div class="card">
        <div class="card-header">
            Contact Mail
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                    <thead>
                        <tr>    
                            <th>
                                Sr.
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Message Type
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $index=> $item)
                            <tr @if($item->seen=='0') style="background:#FAEBD7;" @endif>
                                <td>
                                    {{ $index+1 }}
                                </td>
                                <td>
                                    {{ $item->name??'' }}
                                </td>
                                <td>
                                    {{ $item->email??'' }}
                                </td>
                                <td>
                                    {{ $item->options??'' }}
                                </td>
                                <td>
                                    {{ $item->message??'' }}
                                </td>
                                <td>
                                    @can('contact_reply')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.contact.edit', $item->id) }}">
                                            Reply
                                        </a>
                                    @endcan

                                    @can('contact_delete')
                                    <form action="{{ route('admin.contact.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
