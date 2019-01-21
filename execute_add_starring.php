<?php

require 'connect.php';
require 'head.php';


$search = $_GET['search'];


$filmid = $_GET['filmid'];
$mitwirkenderid = $_GET['mitwirkenderid'];

$sql = "INSERT INTO Filmstarring VALUES ('".$mitwirkenderid."','".$filmid."')";


echo $sql;
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);


?>

<h1>Person wurde erfolgreich hinzugefügt zu Film <?php echo $filmid;?></h1>
<a href="main.php">Zurück</a>






<?php

require 'footer.php';

?>
