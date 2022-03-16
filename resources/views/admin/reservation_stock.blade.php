@extends('layouts.admin')

@section('content')
  <div class="reservation-stock">
    <h2>予約在庫管理</h2>
    <form action="{{ route('reservationStock.get') }}" method="POST">
      @csrf
      <label for="month">月選択</label>
      <input type="month" name="month" id="month" class="select-month">
      <button>表示</button>
    </form>
    <form action="{{ route('reservation.register') }}" method="POST">
      @csrf
      <table>
        <tr>
          <th></th>
          @for ($d = 0; $d <  $days ; $d++)
            <th>@php echo $d + 1; @endphp</th>
          @endfor
        </tr>

        <!-- roomのModelでforeachまわす -->
        @if (isset($rooms))
          @foreach ($rooms as $room)

            <tr>
              <td class="room-type">{{ $room->room }}</td>
              @if (isset($stocks[$room->id]) && !(empty($stocks[$room->id])))
                @foreach ($stocks[$room->id] as $key => $stock)
                  <td><input type="number" name="data[@php echo 'room'. $room->id . '_' . $key @endphp][amount]" value="{{ $stock->amount }}"></td>
                  <input type="hidden" name="data[@php echo 'room'. $room->id . '_' . $key @endphp][room]' @endphp" value="{{ $room->id}}">
                  <input type="hidden" name="data[@php echo 'room'. $room->id . '_' . $key @endphp][date]' @endphp" value="{{ $stock->date }}">
                @endforeach
              @else
                @for ($d = 0; $d < $days; $d ++)
                  <td><input type="number" name="data[@php echo 'room1_' . $d @endphp][amount]"></td>
                  <input type="hidden" name="data[@php echo 'room1_' . $d @endphp][room]' @endphp" value="{{ $room->id }}">
                  <input type="hidden" name="data[@php echo 'room1_' . $d @endphp][date]' @endphp" value="{{ $month }}-@php echo $d + 1 @endphp">
                @endfor
              @endif
            </tr>

          @endforeach
        @endif

      </table>
      <button type="submit">在庫を確定する</button>
    </form>
  </div>
@endsection
