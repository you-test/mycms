@extends('layouts.app')

@section('content')
<header class="px-5 py-5 shadow bg-body rounded">
  <a href="{{ route('site.index') }}" class="site-title">
  <h1>ホテルサッポロ</h1>
</a>
</header>

<h2 class="text-center mt-5 fw-bold">お客様情報入力</h2>
<div class="container info-contents shadow bg-body rounded p-5">
  <form action="" method="POST">
    <div class="info-block mb-3">
      <label for="name">お名前</label>
      <input type="text" name="name" id="name" value="2022年1月6日">
    </div>
    <div class="info-block mb-3">
      <label for="address">ご住所</label>
      <input type="text" name="address" value="北海道札幌市大通4丁目">
    </div>
    <div class="info-block mb-3">
      <label for="mail">メールアドレス</label>
      <input type="text" name="mail" id="mail">
    </div>
    <div class="info-block mb-3 d-flex">
      <p>お支払方法</p>
      <div>
        <input type="radio" name="pay" id="cash">
        <label for="cash" class="me-4">現金</label>
        <input type="radio" name="pay" id="credit-card">
        <label for="credit-card">クレジットカード</label>
      </div>
    </div>
    <button type="submit" class="btn">予約確認へ</button>
  </form>
</div>
@endsection
