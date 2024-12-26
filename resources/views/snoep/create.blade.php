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

    <form method="post" action="/snoep/store">
          @csrf
          <div class="form-group">    
              <label for="naam">Snoep naam:*</label>
              <input type="text" class="form-control" name="naam"/>
          </div>
 
          <div class="form-group">
              <label for="value">Snoep waarde:*</label>
              <input type="text" class="form-control" name="value"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Snoep</button>
      </form>

  </div>

</body>
</html>