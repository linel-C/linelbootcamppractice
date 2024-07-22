<?php

namespace App\Http\Controllers;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
//use Illuminate\Http\Request;



class TodoController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todo = Todo::all();
        return response()->json($todo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request) 
    {
        
         $todo = Todo::create([ 
        
           'name'=> $request->name, 
           'description'=>$request->description, 
           'user_id'=> auth()->user()->id, 
       
        ]);
            return response()->json($todo); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, string $id) 
    {
        $todo = Todo::find($id);              
        $todo->name = $request->name; 
        $todo->description = $request->description; 
        $todo->user_id=1; 
        $todo->save(); 

        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $todo= Todo::find($id);
       $todo->delete();

       return response()->json('deleted successfully');

    }
}
