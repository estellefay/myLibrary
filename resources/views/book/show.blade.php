@extends('template')
@section('content')
<h1>Liste de livres</h1>


    <table cellspacing="0" class="base-table">
        <tr>
            <td>Titre</td>
            <td>Auteur</td>
            <td>Genre</td>
            <td>Résumé</td>
            <td>Supression</td>
            <td>Update</td>
        </tr>

        @foreach ($books as $value) 
            <tr>
                <td>{{  $value['title'] }}</td>
                <td>{{  $value['author'] }}</td>
                <td>{{  $value['genre'] }}</td>
                <td>{{  $value['excerpt'] }}</td>
                <td>
                    <form action="/book/delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{  $value['id'] }}">
                        <input type="submit" value="X">
                    </form>
                </td>
                <td>
                    <form action="/book/update" method="get">
                        @csrf
                        <input type="hidden" name="id" value="{{  $value['id'] }}">
                        <input type="submit" value="U">
                    </form>
                </td>
            </tr>
        
        @endforeach
    </table>
@endsection