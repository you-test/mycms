@extends('layouts.admin')

@section('content')
  <div class="room">
    <h2>客室設定</h2>
    <a href="{{ route('room.register') }}" class="btn mb-3">新規登録</a>
    <table class="table table-bordered border-secondary">
      <tr>
        <th>客室ID</th>
        <th>客室タイプ名</th>
      </tr>
      @foreach ($rooms as $room)
        <tr>
          <td>{{ str_pad("$room->id", 6, "0", STR_PAD_LEFT) }}</td>
          <td>{{ $room->room }}</td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
