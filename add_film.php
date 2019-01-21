<?php

require 'connect.php';
require 'head.php';







?>


<form action="execute_add_film.php" method="get">
  <h1>Film hinufügen:</h1>
    <div class="form-group col-md-6">
      <label for="id">ID</label>
      <input type="text" name="id" class="form-control" id="id" placeholder="Film ID">
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
      </div>
      <div class="form-group col-md-4">
        <label for="laenge">Länge</label>
        <input type="text" name="laenge" class="form-control" id="laenge" placeholder="Länge">
      </div>
    </div>
    <div class="form-group">
      <label for="datum">Release</label>
      <input type="text" name="datum" class="form-control" id="datum" placeholder="TT-MMM-YY">
    </div>

    <button type="submit" class="btn btn-primary">Hinzufügen</button>
  </form>
</form>












<?php

require 'footer.php';

?>
