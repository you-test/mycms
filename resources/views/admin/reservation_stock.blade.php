@extends('layouts.admin')

@section('content')
  <div class="reservation-stock">
    <h2>予約在庫管理</h2>
    @php echo $days @endphp
    <form action="{{ route('reservationStock.get') }}" method="POST">
      @csrf
      <label for="month">月選択</label>
      <input type="month" name="month" id="month" class="select-month">
      <button>表示</button>
    </form>
    <form action="" method="POST">
      @csrf
      <table>
        <tr>
          <th></th>
          @for ($d = 0; $d < $days; $d++)
            <th>@php echo $d + 1; @endphp</th>
          @endfor
        </tr>
        <tr>
          <td class="room-type">シングル</td>
          @for ($d = 0; $d < $days; $d++)
            <td><input type="number" name=""></td>
          @endfor
        </tr>
        <tr>
          <td class="room-type">ダブル</td>
          @for ($d = 0; $d < $days; $d++)
            <td><input type="number" name=""></td>
          @endfor
        </tr>
      </table>

    </form>
  </div>
@endsection
