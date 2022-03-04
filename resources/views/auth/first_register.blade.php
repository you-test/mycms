@extends('layouts.login')

@section('content')

    <div class="user-register">
        <h2>初回ユーザー登録</h2>
        <form action="{{ route('first.register') }}" method="POST">
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
                <label for="name">お名前</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="text" name="password" id="password">
            </div>
            <button class="btn">登録</button>
        </form>
    </div>

@endsection
