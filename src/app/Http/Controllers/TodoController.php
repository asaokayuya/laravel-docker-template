<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request; // 追記

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        // TODO: 第1引数を指定
        return view('todo.create'); // 追記
    }

    public function store(Request $request) // 追記
    {
        $inputs = $request->all(); // 変更

        $todo = new Todo();
        $todo->fill($inputs); // 変更
        $todo->save();

        return redirect()->route('todo.index'); // 追記
    }


}
