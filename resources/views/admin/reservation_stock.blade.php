@extends('layouts.admin')

@section('content')
  <div class="reservation">
    <h2>予約在庫管理</h2>
    <form action="" method="POST">
      <label for="month">月選択</label>
      <input type="month" name="month" id="month">
    </form>
  </div>
@endsection
