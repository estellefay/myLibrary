@extends('template')
@section('content')
<h1>Creation</h1>

    <form action="/book/new" class="" method="post">
        @csrf <!-- methode de scurioté interne a laravel il faut le mettre pour tout les formulaire --> 
        @foreach ($bookForm as $key => $value) 
        <label for="{{$key}}">{{$key}}:</label>
        <input type="{{ $value }}" name="{{ $key }}" id="{{ $key }}" value="">  
        @endforeach
        <input type="submit" value="Inserer" name="">
    </form>

@endsection