@extends('layouts.app')

@section('content')
<header class="px-5 py-5 shadow bg-body rounded">
  <a href="{{ route('site.index') }}" class="site-title">
  <h1>ホテルサッポロ</h1>
</a>
</header>

<h2 class="text-center mt-5 fw-bold">予約確認</h2>
<div class="container complete-contents shadow bg-body rounded p-5">
  <p class="text-center">
    ご予約ありがとうございます。<br>
    下記内容でご予約いたしました。
  </p>
  <div class="complete-block mb-3">
    <p class="complete-block-title">予約日</p>
    <p><?= $date ?></p>
  </div>
  <div class="complete-block mb-3">
    <p class="complete-block-title">ご利用人数</p>
    <p><?= $num ?>名様</p>
  </div>
  <div class="complete-block mb-3">
    <p class="complete-block-title">お部屋タイプ</p>
    <p><?= $room ?></p>
  </div>
  <div class="complete-block mb-3">
    <p class="complete-block-title">お名前</p>
    <p><?= $name ?></p>
  </div>
  <div class="complete-block mb-3">
    <p class="complete-block-title">ご住所</p>
    <p><?= $address ?></p>
  </div>
  <div class="complete-block mb-3">
    <p class="complete-block-title">メールアドレス</p>
    <p><?= $mail ?></p>
  </div>
  <div class="complete-block mb-3">
    <p class="complete-block-title">お支払方法</p>
    <p><?= $pay ?></p>
  </div>
  <a href="{{ route('site.index') }}" class="link-btn">トップへ戻る</a>
</div>
@endsection
