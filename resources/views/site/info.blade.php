@extends('layouts.app')

@section('content')

<h2 class="text-center mt-5 fw-bold">お客様情報入力</h2>
<div class="container info-contents shadow bg-body rounded p-5">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('site.confirm') }}" method="POST">
    @csrf
    <div class="info-block mb-3">
      <label for="name">お名前</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>
    <div class="info-block mb-3">
      <label for="address">ご住所</label>
      <input type="text" name="address" value="{{ old('address') }}">
    </div>
    <div class="info-block mb-3">
      <label for="mail">メールアドレス</label>
      <input type="text" name="mail" id="mail" value="{{ old('mail') }}">
    </div>
    <div class="info-block mb-3 d-flex">
      <p>お支払方法</p>
      <div>
        <input type="radio" name="pay" id="cash" value="現金" @if (old('pay') === '現金') checked @endif>
        <label for="cash" class="me-4">現金</label>
        <input type="radio" name="pay" id="credit-card" value="クレジットカード" @if (old('pay') === 'クレジットカード') checked @endif>
        <label for="credit-card">クレジットカード</label>
      </div>
    </div>
    <button type="submit" class="btn">予約確認へ</button>
  </form>
</div>
@endsection
