<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Todo as TodoResource;
use App\Http\Resources\TodoCollection as TodoCollectionResource;
use App\Todo;
use App\Http\Requests\TodoStoreRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::where('users_id', Auth::id())->get();
        return $todos;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoStoreRequest $request)
    {
        $todo = Todo::create(array_merge($request->validated(), ['users_id' => Auth::id()]));
        return new TodoResource($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return $todo;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoStoreRequest $request, Todo $todo)
    {
        $id = $todo->id;
        $todo->update($request->validated());
        return Todo::where('users_id', Auth::id())->where('id',$id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo = Todo::where('users_id', Auth::id())->where('id',$todo->id)->delete();
        if(!$todo)
            return response('',400);
        return Todo::where('users_id', Auth::id())->get();
    }
}
