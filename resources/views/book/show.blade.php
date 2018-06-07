@extends('template')
@section('content')
  @if (Session::has('status'))
    <p>{{Session::get('status')}}</p>
  @endif
  <h1>Listes de livres</h1>
  <table cellspacing="0" class="base-table">
    <tr>
      <td>Titre</td>
      <td>Auteur</td>
      <td>Genre</td>
      <td>Résumé</td>
      <td>Suppression</td>
      <td>Update</td>
    </tr>
    @foreach ($books as $value)
      <tr>
        <td>{{ $value['title'] }}</td>
        <td>{{ $value['author'] }}</td>
        <td>{{ $value['genre'] }}</td>
        <td>{{ $value['excerpt'] }}</td>
        <td>
          <input type="checkbox" name="delete" data-value="{{ $value['id'] }}" value="">
        </td>
        <td>
          <form class="" action="/book/update" method="get">
            @csrf
            <input type="hidden" name="id" value="{{ $value['id'] }}">
            <input type="submit" name="" value="U">
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  <input id="deleteButton" type="button" name="delete" value="Supprimer">
  <script type="text/javascript">
    document.querySelector('#deleteButton').addEventListener('click', function() {
      let inputs = document.querySelectorAll('[type="checkbox"]');
      let checkedInput = [];
      for (let i = 0; i < inputs.length; i++) {
        if(inputs[i].checked) {
          checkedInput.push(inputs[i].dataset.value);
        }
      }
      let token = document.querySelector('[name="_token"]').value;
      httpRequest = new XMLHttpRequest();

      httpRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          location.reload();
        }
      };
      httpRequest.open('GET', '/books/delete?_token=' + token + '&ids=' + checkedInput, true);
      httpRequest.send();
    })
  </script>
@endsection
