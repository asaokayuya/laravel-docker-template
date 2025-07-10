<?php

namespace App\Http\Controllers;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['helloWorld' => 'hello World!']);
    }

    public function create()
    {
        // TODO: 第1引数を指定
        return view('todo.create'); // 追記
    }
}
