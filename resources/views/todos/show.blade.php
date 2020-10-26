@extends('layouts.app')
@section('content')
<div class="text-center my-5 font-weight-bold"><h2>{{$todo->name}}</h2></div>
<div class="card my-3">
    <div class="card-header">Description<a href="/todos" class="btn btn-danger btn-sm float-right">Go back</a></div>
    <div class="card-body">{{$todo->description}}</div>
</div>    
@endsection
