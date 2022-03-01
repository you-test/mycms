@extends('layouts.login')

@section('content')

    <div class="login">
        <h1>予約管理</h1>
        <h2>ログイン</h2>
        <form action="{{ url('admin/login') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="mail">メールアドレス</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" autocomplete="off">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="text" name="password" id="password" autocomplete="off">
            </div>
            <button class="btn">ログイン</button>
        </form>
    </div>

@endsection
