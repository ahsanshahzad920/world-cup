@php
    $data = content();
@endphp
@extends('layouts.app')
@section('content')
<div class="terms-and-conditions mt-5">
    <div class="container">
        <h1 class="main-heading">{{$data['#policy']['heading']??''}}</h1>
        {!!$data['#policy']['description']??''!!}
        @foreach ($policy as $item)
        <h3>{{$item->heading??''}}</h3>
        {!!$item->description??''!!}
        @endforeach
        
    </div>
</div>

@endsection    