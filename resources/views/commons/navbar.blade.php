<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Tasklist</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- タスク作成ページリンク --}}
                    <li class="mt-2">{!! link_to_route('tasks.create', 'タスクの作成', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログアウトのリンク --}}
                    <li class="mt-2">{!! link_to_route('logout.get', 'ログアウト', [],  ['class' => 'nav-link']) !!}</li>
                    
                @else    
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="mt-2">{!! link_to_route('signup.get', 'アカウント作成', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="mt-2">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif    
            </ul>
        </div>
    </nav>
</header>