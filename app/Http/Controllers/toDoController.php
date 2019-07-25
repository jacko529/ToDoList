<?php

namespace App\Http\Controllers;

use App\toDoList;
use Illuminate\Http\Request;

class toDoController extends Controller
{

    private $toDoOdel;
    private $databaseManager;

    public function __construct()
    {
        $this->toDoModel = new toDoList();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allToDOItems = toDoList::all();
        return response()->json($allToDOItems);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $toDoModel = new toDoList();
        $toDoModel->name
        return toDoList::create($request->json()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $individualToDoItem = toDoList::findOrFail($id);
        return response()->json($individualToDoItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return toDoList::where('id', $id)->update($request->json()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        toDoList::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
