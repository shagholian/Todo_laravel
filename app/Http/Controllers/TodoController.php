<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;


use App\Models\todo;
use App\Models\Todo_Tag;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $a =  Verta::instance(Verta::now())->format('H:i:s');

        $todos = todo::orderBy('id', 'DESC')->get();
        return view("index", ['todos' => $todos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = [
            'title.required' => 'فیلد عنوان اجباری است'
        ];
        $validated = $request->validate([
            'title' => 'required|max:10',
            'description' => 'required'
        ], $msg);

        try {
            $todo = new todo([
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'complated' => $request->get('complated'),
                'user_id' => Auth::user()->id
            ]);
            $todo->save();

        }catch (Exception $ex) {
            return redirect(route('index'))->with('warning', "Error Code:‌" . $ex->getcode());
        }


        return redirect(route('index'))->with('success', 'todo add successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        $title = 'Show Todo';
        return view('show', compact('todo', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        $title = 'Edit Todo';
        return view('edit', compact('todo', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todo $todo)
    {
        //
        $msg = [
            'title.required' => 'فیلد عنوان اجباری است'
        ];
        $validated = $request->validate([
            'title' => 'required|max:25|unique:todos,id,'.$todo->id,
            'description' => 'required'
        ], $msg);

        try {

            // $todo->title = $request->title;
            // $todo->description = $request->description;
            // $todo->comlpated = $request->comlpated;
            // $todo->save();

            $todo->update($request->all());

            return redirect(route('index'))->with('success', "todo uodate successful");

        }catch (Exception $ex) {
            return redirect(route('index'))->with('warning', "Error Code:‌" . $ex->getcode());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        // example of restore
        // $todo = todo::withTrashed()->find(4);
        // if($todo) {
        //     $todo->restore();
        // }

        return redirect(route('index'))->with('success', "todo Delete Successful");
    }
}
