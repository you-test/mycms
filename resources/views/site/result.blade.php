@extends('layouts.app')

@section('content')

<h2 class="text-center mt-5 fw-bold">ご予約可能なお部屋一覧</h2>
<p class="text-center mt-5 fw-bold">{{ $date }}</p>

@foreach ($rooms as $room)
  <div class="room-block container shadow bg-body rounded  p-5">
    <form action="{{ route('site.info') }}" method="post" class="d-flex">
      @csrf
      <div class="room-image flex-shrink-0">
        <img src="{{ asset('images/room_' . $room->id . '.jpg') }}" alt="">
      </div>
      <div class="room-content flex-grow-1 ps-5">
        <p class="room-name">{{ $room->room }}</p>
        <input type="hidden" name="room" value="{{ $room->id }}">
        <button type="submit" class="btn">予約する</button>
      </div>
    </form>
  </div>
  @endforeach

@endsection
