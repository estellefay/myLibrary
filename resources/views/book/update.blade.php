@extends('template')
@section('content')
<h1>Update</h1>


<form method="post" action="/book/update/new">
    @csrf
    <input type="hidden" name="id" value="{{ $book->id }}">
    <input type="text" name="title" id="" value="{{ $book->title }}">
    <input type="text" name="author" id="" value="{{ $book->author }}">
    <input type="text" name="genre" id="" value="{{ $book->genre }}">
    <input type="text" name="excerpt" id="" value="{{ $book->excerpt }}">
    <input type="submit" value="Insérer">
</form>

@endsection
