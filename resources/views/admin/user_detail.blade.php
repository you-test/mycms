@extends('layouts.admin')

@section('content')

    <div class="user-register">
        <h2>ユーザー情報更新</h2>
        <form action="{{ route('users.update') }}" method="POST">
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
                <input type="text" name="name" id="name" value="{{ $name }}">
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="text" name="email" id="email" value="{{ $email }}">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="text" name="password" id="password">
            </div>
            <input type="hidden" name="id" value="{{ $id }}">
            <button class="btn">更新</button>
        </form>
    </div>

@endsection
