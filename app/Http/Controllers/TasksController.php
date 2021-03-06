<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    //getでtasks/にアクセスされたときの一覧表示処理
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }

        return view ('tasks.index',$data );
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        
        //タスク作成ビュー表示
        return view('tasks.create', [
            'task' =>$task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        //タスク作成
        
        
        
        //認証済みユーザのタスクとして作成
       
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->user_id = Auth::user()->id;
        $task->save();
        
        
        //トップページへ
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        if(\Auth::id() === $task->user_id) {
            //タスク詳細ビューで表示
            return view('tasks.show', [
            'task' => $task,
        ]);
        }else {
            return redirect('/');
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        if(\Auth::id() === $task->user_id) {
            //タスク編集ビューで表示
            return view('tasks.edit',[
            'task' => $task,
        ]);
        }else {
            return redirect('/');
        }
        
        
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
        //バリデーション
        $request->validate([
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        if (\Auth::id() === $task->user_id) {
            $task->update();
            //タスクを更新
            $task->status = $request->status;
            $task->content = $request->content;
            $task->save();
        }else {
            return view('/');
        }
        
        
        //トップページへ
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        //タスク削除
        if (\Auth::id() === $task->user_id) {
            $task->delete();
            //トップページへリダイレクトさせる
            return redirect('/');
        }else {
            return redirect('/');
        }    
        
        
    }
}
