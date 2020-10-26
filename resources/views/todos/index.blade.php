@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h1>Todos <small>[{{$todos->count()}}]</small></h1>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($todos as $todo)
                    <li class="list-group-item border border-light">
                        {{$todo->name}}
                        @if ($todo->completed)
                        <span class="badge badge-success">Completed</span>
                        @else
                        <span class="badge badge-danger">Unfinished</span>
                        @endif
                        <p class="font-italic py-3">{{$todo->description}}</p>
                        @if (!$todo->completed)
                        <a href="/todos/{{$todo->id}}/finish" class="btn btn-success float-left">Finished!</a>
                        @endif
                        <a href="/todos/{{$todo->id}}" class="btn btn-primary float-left mx-2">Details</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection