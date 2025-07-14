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
    public function store()
    {
        dd('新規作成のルート実行！');
    }

    public function store(Request $request) // 追記
    {
        $inputs = $request->all(); // 変更
        dd($inputs); // 追記

        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo(); 
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->fill($inputs); // 変更
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        return redirect()->route('todo.index'); // 追記
    }


}
