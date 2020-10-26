@extends('layouts.app')
@section('content')
<h1 class="text-center">Add todo!</h1>
<div class="row justify-content-center">
    <div class="col-8">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Warning!</h4>
                <p class="mb-0"><strong>{{ $error }}</strong></p>
            </div>
        @endforeach
            
        @endif
        <form action="store-todo" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-info px-5" type="submit" value="Add!">
            </div>
        </form>
    </div>
</div>    
@endsection