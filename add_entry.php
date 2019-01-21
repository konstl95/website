<?php

require 'connect.php';
require 'head.php';




$id = $_GET['id'];



?>


<form action="execute_add_entry.php" method="get">
  <h1>Füge Eintrag zu FilmID <?php echo $id;?></h1>
  <input type="hidden" name="filmid" value="<?php echo $id;?>">
  <input type="text" name="eintragsid" value="" placeholder="Mitwirkende ID">
  <select id='Tabelle' name='tabelle'>
          <option value="" disabled selected>Tabelle auswählen...</option>
          <option value="Filmdirected">Regisseure</option>
          <option value="Filmstarring">Schauspieler</option>
          <option value="Filmsave">Pfad</option>
  </select>
  <input id='submit' type='submit' value='Füge Eitrag Hinzu' />
</form>












<?php

require 'footer.php';

?>
