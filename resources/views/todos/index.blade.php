@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h1>Todos</h1>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($todos as $todo)
                        <li class="list-group-item">
                            {{$todo->name}}
                            <p class="font-italic py-3">{{$todo->description}}</p>
                            <a href="/todos/{{$todo->id}}" class="btn btn-primary float-left">Check!</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
