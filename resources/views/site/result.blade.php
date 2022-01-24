@extends('layouts.app')

@section('content')
<header class="px-5 py-5 shadow bg-body rounded">
  <a href="{{ route('site.index') }}" class="site-title">
  <h1>ホテルサッポロ</h1>
</a>
</header>

<h2 class="text-center mt-5 fw-bold">ご予約可能なお部屋一覧</h2>
<p class="text-center mt-5 fw-bold"><?= $date ?></p>
<div class="room-block container shadow bg-body rounded  p-5">
  <form action="{{ route('site.info') }}" method="post" class="d-flex">
    @csrf
    <div class="room-image flex-shrink-0">
      <img src="{{ asset('images/room_single.jpg') }}" alt="">
    </div>
    <div class="room-content flex-grow-1 ps-5">
      <p class="room-name">シングル</p>
      <p class="room-discritpion">快適なベッドのあるお部屋です。</p>
      <input type="hidden" name="room" value="シングル">
      <button type="submit" class="btn">予約する</button>
    </div>
  </form>
</div>
@endsection
