<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Snoep</title>
</head>
<body>
  <div class="container" style="margin:40px;">
  <h1 class="display-3">Snoep</h1>
  @guest
      <a href="{{ route('login') }}" class="btn btn-primary">Inloggen</a>
  @endguest

  <!-- Toon Uitlogknop als de gebruiker wel ingelogd is -->
  @auth
      <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-danger">Uitloggen</button>
      </form>
  @endauth
  <div>
      <!-- Maak de knop voor het aanmaken van snoep zichtbaar voor alle ingelogde gebruikers -->
      @auth
          <a href="/snoep/create" class="btn btn-primary mb-3">Add Snoep</a>
      @endauth
  </div> 

  <table class="table">
      <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>Snoep naam</th>
            <th>Prijs snoep</th>
            <th>Updated at</th>
            @role('admin')
                <th>Update</th>
                <th>Delete</th>
            @endrole
          </tr>
      </thead>
      <tbody>
          @foreach($snoep as $snoep)
          <tr>
              <td>{{$snoep->id}}</td>
              <td>{{$snoep->naam}} </td>
              <td>{{$snoep->value}}</td>
              <td>{{$snoep->updated_at}}</td>
              @role('admin')
                  <td><a href="/snoep/edit/{{$snoep->id}}" class="btn btn-primary">Edit</a></td>
                  <td>
                      <form action="/snoep/destroy/{{$snoep->id}}" method="post">
                          @csrf
                          <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
                      </form>
                  </td>
              @endrole
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>
</body>
</html>