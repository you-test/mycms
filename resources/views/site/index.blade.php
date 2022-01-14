@extends('layouts.app')

@section('content')
<header class="px-5 py-5 shadow bg-body rounded">
  <a href="" class="site-title">
  <h1>ホテルサッポロ</h1>
</a>
</header>

<h2 class="text-center mt-5 fw-bold">宿泊予約</h2>
<div class="container site-top shadow bg-body rounded">
  <form action="">
    <div class="form-input text-center">
      <label for="check-in">予約日</label>
      <input type="date" id="check-in">
    </div>
    <div class="form-input text-center">
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
