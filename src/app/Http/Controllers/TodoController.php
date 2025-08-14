<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;

use App\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        // TODO: 第1引数を指定
        return view('todo.create'); // 追記
    }

    public function store(TodoRequest $request) // 修正
    {
        $inputs = $request->all(); // 変更
        $this->todo->fill($inputs); // 変更
        $this->todo->save(); // 変更

        return redirect()->route('todo.index'); // 追記
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id) // 修正
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.show', $todo->id);
    }

    public function delete()
    {
        // TODO: 削除対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = $this->todo->find($id);
        $todo->delete();

        return redirect()->route('todo.index');
    }

}
