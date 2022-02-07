@extends('layouts.app')

@section('content')
<header class="px-5 py-5 shadow bg-body rounded">
  <a href="{{ route('site.index') }}" class="site-title">
  <h1>ホテルサッポロ</h1>
  </a>
</header>

<h2 class="text-center mt-5 fw-bold">宿泊予約</h2>
<div class="container site-top shadow bg-body rounded">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('site.result') }}" method="POST">
    @csrf
    <div class="form-input text-center">
      <label for="check-in">予約日</label>
      <input type="date" name="date" id="check-in" value="{{ old('date') }}">
    </div>
    <div class="form-input text-center">
      <label for="num">人数</label>
      <select name="num" id="num" value="2">
        <option value="1" @if (old('num') === '1') selected @endif>1</option>
        <option value="2" @if (old('num') === '2') selected @endif>2</option>
        <option value="3" @if (old('num') === '3') selected @endif>3</option>
        <option value="4" @if (old('num') === '4') selected @endif>4</option>
        <option value="5" @if (old('num') === '5') selected @endif>5</option>
        <option value="6" @if (old('num') === '6') selected @endif>6</option>
        <option value="7" @if (old('num') === '7') selected @endif>7</option>
        <option value="8" @if (old('num') === '8') selected @endif>8</option>
        <option value="9" @if (old('num') === '9') selected @endif>9</option>
        <option value="10" @if (old('num') === '10') selected @endif>10</option>
      </select>
    </div>
    <button type="submit" class="btn">検索</button>
  </form>
</div>
@endsection
