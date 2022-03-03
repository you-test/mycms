@extends('layouts.admin')

@section('content')
  <div class="users">
    <h2>ユーザー管理</h2>
    <a href="{{ route('user.register') }}" class="btn">新規登録</a>
    <table class="table table-bordered border-secondary">
      <tr>
        <th>ユーザーID</th>
        <th>ユーザーネーム</th>
        <th>メールアドレス</th>
        <th></th>
      </tr>
      @foreach ($users as $user)
        <form action="{{ route('users.delete') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $user->id }}">
          <tr>
            <td><a href="{{ route('users.detail') . '?id=' . $user->id }}">{{ str_pad("$user->id", 6, "0", STR_PAD_LEFT) }}</a></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><button>x</button></td>
          </tr>
        </form>
      @endforeach
    </table>
  </div>
@endsection
