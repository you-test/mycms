@extends('layouts.admin')

@section('content')
  <div class="info-page">
    <h2>施設情報管理</h2>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('facilities.update') }}" method="POST">
      @csrf
      <label for="name">施設名</label>
      <input type="text" name="facilitiesName" id="name" value="{{ $name }}">
      <button type="submit" class="btn d-inline-block ms-5">更新</button>
    </form>
  </div>
@endsection
