@extends('layouts.admin')

@section('content')

    <div class="room-register">
        <h2>客室タイプ新規登録</h2>
        <form action="{{ route('room.exec.register') }}" method="POST">
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
                <label for="name">客室タイプ名</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <button class="btn">登録</button>
        </form>
    </div>

@endsection
