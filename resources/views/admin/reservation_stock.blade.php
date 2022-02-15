@extends('layouts.admin')

@section('content')
  <div class="reservation-stock">
    <h2>予約在庫管理</h2>
    <form action="" method="POST">
      <label for="month">月選択</label>
      <input type="month" name="month" id="month" class="select-month">
    </form>
    <form action="" method="POST"></form>
      <table>
        <tr>
          <th></th>
          @for ($d = 0; $d < 30; $d++)
            <th>@php echo $d + 1; @endphp</th>
          @endfor
        </tr>
        <tr>
          <td class="room-type">シングル</td>
          @for ($d = 0; $d < 30; $d++)
            <td><input type="number"></td>
          @endfor
        </tr>
        <tr>
          <td class="room-type">ダブル</td>
          @for ($d = 0; $d < 30; $d++)
            <td><input type="number"></td>
          @endfor
        </tr>
      </table>
    </form>
  </div>
@endsection
