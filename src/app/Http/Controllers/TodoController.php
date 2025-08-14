<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

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

    public function store(Request $request) // 追記
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

    public function update(Request $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
        // TODO: リクエストされた値を取得
        $inputs = $request->all();
        // TODO: 更新対象のデータを取得
        $todo = $this->todo->find($id);
        // TODO: 更新したい値の代入とUPDATE文の実行
        $todo->fill($inputs)->save();

        return redirect()->route('todo.show', $todo->id);
    }

}
