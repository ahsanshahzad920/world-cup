@extends('layouts.app')
@section('content')
<div class="how-to-play my-5">
    <div class="container">
        <h1 class="main-heading light-green-color">How to Play & guidelines</h1>
        <br>
        @foreach ($guideline as $item)
        <h3>{{$item->heading??''}}</h3>
        {!!$item->description??''!!}
        @endforeach
        
    </div>
</div>
@endsection