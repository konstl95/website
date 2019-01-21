<?php

require 'connect.php';
require 'head.php';





$filmid = $_GET['filmid'];
$tabelle = $_GET['tabelle'];
$eintragsid = $_GET['eintragsid'];


$sql = "INSERT INTO ".$tabelle." VALUES ('".$eintragsid."','".$filmid."')";


echo $sql;
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);


?>

<h1>Eintrag wurde erfolgreich in<?php echo $tabelle;?> hinzugefügt zu Film <?php echo $filmid;?></h1>
<a href="filme.php">Zurück</a>






<?php

require 'footer.php';

?>
