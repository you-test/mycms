@extends('layouts.app')

@section('content')

<h2 class="text-center mt-5 fw-bold">予約確認</h2>
<div class="container confirm-contents shadow bg-body rounded p-5">
    <div class="confirm-block mb-3">
      <p class="confirm-title d-inline-block">予約日</p>
      <p class="d-inline-block"><?= $date ?></p>
    </div>
    <div class="confirm-block mb-3">
      <p class="confirm-title d-inline-block">ご利用人数</p>
      <p class="d-inline-block"><?= $num ?></p>
    </div>
    <div class="confirm-block mb-5">
      <p class="confirm-title d-inline-block">お部屋タイプ</p>
      <p class="d-inline-block"><?= $room ?></p>
    </div>
    <div class="confirm-block mb-3">
      <p class="confirm-title d-inline-block">お名前</p>
      <p class="d-inline-block"><?= $name ?></p>
    </div>
    <div class="confirm-block mb-3">
      <p class="confirm-title d-inline-block">ご住所</p>
      <p class="d-inline-block"><?= $address ?></p>
    </div>
    <div class="confirm-block mb-3">
      <p class="confirm-title d-inline-block">メールアドレス</p>
      <p class="d-inline-block"><?= $mail ?></p>
    </div>
    <div class="confirm-block mb-5">
      <p class="confirm-title d-inline-block">クレジットカード</p>
      <p class="d-inline-block"><?= $pay ?></p>
    </div>
    <a href="{{ route('site.complete') }}" class="btn">予約確定</a>
</div>
@endsection
