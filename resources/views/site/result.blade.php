@extends('layouts.app')

@section('content')
<header class="px-5 py-5 shadow bg-body rounded">
  <a href="" class="site-title">
  <h1>ホテルサッポロ</h1>
</a>
</header>

<h2 class="text-center mt-5 fw-bold">ご予約可能なお部屋一覧</h2>
<div class="room-block shadow bg-body rounded d-flex">
  <div class="room-image flex-shrink-0">
    <img src="{{ asset('images/room_single.jpg') }}" alt="">
  </div>
  <div class="room-content flex-grow-1">
    <p class="room-name">シングル</p>
    <p class="room-discritpion">快適なベッドのあるお部屋です。</p>
    <button type="submit" class="btn">予約する</button>
  </div>
</div>
@endsection
