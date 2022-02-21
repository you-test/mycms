@extends('layouts.admin')

@section('content')
  <div class="reservation-list">
    <h2>予約一覧</h2>
    <table class="table table-bordered border-secondary">
      <tr>
        <th>予約番号</th>
        <th>予約日</th>
        <th>お名前</th>
        <th>人数</th>
        <th>部屋タイプ</th>
        <th>支払い方法</th>
        <th>メールアドレス</th>
        <th>住所</th>
      </tr>
      @foreach ($reservationList as $reservation)
        <tr>
          <td>{{ str_pad("$reservation->id", 6, "0", STR_PAD_LEFT) }}</td>
          <td>{{ $reservation->date }}</td>
          <td>{{ $reservation->name }}</td>
          <td>{{ $reservation->num }}</td>
          <td>{{ $reservation->room }}</td>
          <td>{{ $reservation->pay }}</td>
          <td>{{ $reservation->mail }}</td>
          <td>{{ $reservation->address }}</td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
