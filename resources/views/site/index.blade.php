@extends('layouts.app')

@section('content')
<a href="" class="site-title">
  <h1>ホテルサッポロ</h1>
</a>
<h2>宿泊予約</h2>
<div class="container">
  <form action="">
    <div>
      <label for="check-in">予約日</label>
      <input type="text" id="check-in">
    </div>
    <div>
      <label for="num">人数</label>
      <select name="num" id="num">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
    <button type="submit" class="btn">検索</button>
  </form>
</div>
@endsection
