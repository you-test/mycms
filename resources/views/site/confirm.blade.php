@extends('layouts.app')

@section('content')
<header class="px-5 py-5 shadow bg-body rounded">
  <a href="{{ route('site.index') }}" class="site-title">
  <h1>ホテルサッポロ</h1>
</a>
</header>

<h2 class="text-center mt-5 fw-bold">予約確認</h2>
<div class="container confirm-contents shadow bg-body rounded p-5">
  <form action="{{ route('site.complete') }}" method="POST">
    <div class="confirm-block mb-3">
      <label for="date">予約日</label>
      <input type="text" value="2022年1月6日" id="date">
    </div>
    <div class="confirm-block mb-3">
      <label for="num">ご利用人数</label>
      <input type="text" value="2名様" id="num">
    </div>
    <div class="confirm-block mb-5">
      <label for="room">お部屋タイプ</label>
      <input type="text" value="シングルルーム" id="room">
    </div>
    <div class="confirm-block mb-3">
      <label for="name">お名前</label>
      <input type="text" value="佐藤 佑介" id="name">
    </div>
    <div class="confirm-block mb-3">
      <label for="address">ご住所</label>
      <input type="text" value="札幌市中央区北00条西00丁目" id="address">
    </div>
    <div class="confirm-block mb-3">
      <label for="mail">メールアドレス</label>
      <input type="text" value="sato.jp@gmail.com" id="mail">
    </div>
    <div class="confirm-block mb-5">
      <label for="card">クレジットカード</label>
      <input type="text" value="クレジットカード" id="card">
    </div>
    <button type="submit" class="btn">予約確定</button>
  </form>
</div>
@endsection
