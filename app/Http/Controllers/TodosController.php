<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todos.index', ['todos' => Todo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $todo = new Todo();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->completed = false;
        $todo->save();
        session()->flash('success', 'Todo created successfully');
        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();
        session()->flash('success', 'Todo updated successfully');
        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash('success', 'Todo deleted successfully');
        return redirect('/todos');
    }

    /**
     * Mark todo as finished
     * 
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function finish(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        session()->flash('sucess', 'Todo successfully marked as finished');
        return redirect('/todos');
    }
}
