<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Http\Resources\ToDoListResource;
use App\toDoList;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class toDoController extends Controller
{

    private $databaseManager;


    public function __construct(DatabaseManager $databaseManager)
    {

        $this->toDoModel = new toDoList();
        $this->databaseManager = $databaseManager;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $allToDOItems = toDoList::all();

        return (new ToDoListResource($allToDOItems))
            ->response()
            ->setStatusCode(200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(ToDoRequest $request)
    {

        try{
            $this->databaseManager->beginTransaction();
            $createdResource = toDoList::create($request->json()->all());
            $this->databaseManager->commit();
        }
        catch (ModelNotFoundException $ex) { // User not found
            $this->databaseManager->rollback();
            abort(422, 'Invalid model information');
        }
        catch (QueryException $ex) { // Anything that went wrong
            $this->databaseManager->rollback();
            abort(422, 'Could not allocate the to do resource');
        }
        catch (\Exception $ex) { // Anything that went wrong
            $this->databaseManager->rollback();
            abort(500, 'Could not allocate the to do resource');
        }

        return (new ToDoListResource($createdResource))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function show($id)
    {
        $individualToDoItem = toDoList::findOrFail($id);
        return (new ToDoListResource($individualToDoItem))
                    ->response()
                    ->setStatusCode(200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return
     * @throws \Exception
     */
    public function update(ToDoRequest $request, $id)
    {

        try{
            $this->databaseManager->beginTransaction();
            toDoList::where('id', $id)->update($request->json()->all());

            $this->databaseManager->commit();
        }
        catch (ModelNotFoundException $ex) { // User not found
            $this->databaseManager->rollback();
           return response()->json( 'Invalid model information', 404 );
        } catch (\Exception $ex) { // Anything that went wrong
            $this->databaseManager->rollback();
           return response()->json( 'Could not allocate the to do resource', 500);
        }

        return  response()->json('Updated Successfully', 201);
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
        return response()->json('Deleted Successfully', 200);
    }
}
