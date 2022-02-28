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
      {{-- @foreach ($users as $user) --}}
        <form action="" method="POST">
          <tr>
            <td>000001</td>
            <td>佐藤　佑介</td>
            <td>xxx@gmail.com</td>
            <td><button>x</button></td>
          </tr>
        </form>
      {{-- @endforeach --}}
    </table>
  </div>
@endsection
