@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'コンテント:') !!}
                    {!! Form::text('cotent', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('作成', ['class' => 'btn-info']) !!}
                
            {!! Form::close() !!}    
        </div>
    </div>

@endsection