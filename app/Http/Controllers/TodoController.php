<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function index ()
    {
        $contacts = Todo::where('day_end', null)->get();
        return view('Todo.index',compact('contacts'));
    }

    public function history (Request $request)
    {
        $startTime = $request->input('from')." 00:00:00";
        $endTime = $request->input('from')." 23:59:59";

        $contacts = Todo::where('created_at', '>=', $startTime)->where('created_at', '<=', $endTime)
            ->orderByDesc('created_at')->get();
        return view('Todo.history',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->fill($request->all());
        $todo->save();
        return redirect(route('index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $contact)
    {
        //
        return view('Todo.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $contact)
    {
        //
        $contact->update($request->all());
        return redirect(route('index'));

    }

    public function status($id)
    {
        $todo = Todo::find($id);
        $todo->update(['status'=> 'completed']);
        return redirect(route('index'));
    }

    public function statusRemove($id)
    {
        $todo = Todo::find($id);
        $todo->update(['status'=> null]);
        return redirect(route('index'));
    }

    public function close()
    {
        $todo = Todo::where('day_end', null);
        $todo->update(['day_end'=> 1]);
        return redirect(route('index'));
    }
}
