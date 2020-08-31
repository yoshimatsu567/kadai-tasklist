@if (count($tasks) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>ステータス</th>
                <th>タスク</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                {{-- タスク詳細ページのリンク --}}
                <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->content }}</td>
            </tr>
        <div>
            <!--@if (Auth::id() == $task->user_id)-->
            <!--    {{-- 投稿削除ボタンのフォーム --}}-->
            <!--    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}-->
            <!--        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}-->
            <!--    {!! Form::close() !!}-->
            <!--@endif-->
        </div>   
            @endforeach
        </tbody>
    </table>
@endif


{{-- タスク作成ページへのリンク --}}
{!! link_to_route('tasks.create', '新規タスクの作成', [], ['class' => 'btn btn-info']) !!}
    