@extends('template')
@section('content')
  <h1>Insertion</h1>
    <form class="form-container" action="/book/new" method="post">
      @csrf
      @foreach ($bookForm as $key => $value)
        <label for="{{$key}}">{{ $key }} : </label>
        <input type="{{ $value }}" name="book[0][{{ $key }}]" id="{{ $key }}" value="">
      @endforeach
      @foreach ($bookForm as $key => $value)
        <label for="{{$key}}">{{ $key }} : </label>
        <input type="{{ $value }}" name="book[1][{{ $key }}]" id="{{ $key }}" value="">
      @endforeach
      <input type="submit" name="" value="Inserer">
    </form>
@endsection
