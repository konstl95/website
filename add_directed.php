<?php

require 'connect.php';
require 'head.php';


$search = $_GET['search'];


$id = $_GET['id'];

$sql = "SELECT * FROM Mitwirkende";


echo $sql;
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);


?>


<form action="execute_add_starring.php" method="get">
  <h1>Füge Person zu FilmID <?php echo $id;?></h1>
  <input type="hidden" name="filmid" value="<?php echo $id;?>">
  <input type="text" name="mitwirkenderid" value="" placeholder="Mitwirkende ID">
  <select class="" name="">
    <?php
    while ($row = oci_fetch_assoc($stmt)) {
        echo '<option value="'.$row['PERSONID'] . '">'.$row['PERSONID'] .'</option>';



    }
    ?>

  </select>
  <input id='submit' type='submit' value='Füge Person Hinzu' />
</form>












<?php

require 'footer.php';

?>
