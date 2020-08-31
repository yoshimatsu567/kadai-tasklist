@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <h2 class="card-title">{{ Auth::user()->name }} さんのタスク一覧</h2>
            <div class="col-sm-8">
                {{-- タスク一覧 --}}
                @include('tasks.tasks')
            </div>
        </div>   

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Tasklist へようこそ</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'アカウント作成', [], ['class' => 'btn btn-lg btn-primary ']) !!}
            </div>
        </div>
    @endif    
@endsection