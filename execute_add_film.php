<?php

require 'connect.php';
require 'head.php';





$filmid = $_GET['id'];
$name = $_GET['name'];
$laenge = $_GET['laenge'];
$datum = $_GET['datum'];

$sql = "INSERT INTO Film	VALUES('".$filmid"','".$laenge."',TO_DATE('".$datum."','YYYY-MM-DD'),'".$name."')";


echo $sql;
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);


?>

<h1>Film <?php echo $name;?> wurde zu Filme hinzugefügt.</h1>
<a href="filme.php">Zurück</a>






<?php

require 'footer.php';

?>
