<?php

require 'connect.php';
require 'head.php';


$search = $_GET['search'];


$id = $_GET['id'];

$sql = "SELECT * FROM Filmdirected";

if($id){
  $sql .= " WHERE filmID='".$id."'";
}

if($search){
  $sql .= " WHERE filmID='".$search."'";
}
echo $sql;
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);


?>



<h1>Zeige Regiseure</h1>


<?php
echo "<table class='table table-stripedtable-dark'><thead><tr>";
echo"<th>personID</th>";
echo"<th>filmID</th>";
echo"</tr></thead><tbody>";
while ($row = oci_fetch_assoc($stmt)) {
    echo "<tr>";
    echo "<td>" . $row['PERSONID'] . "</td>";
    echo "<td>" . $row['FILMID'] . "</td>";
    echo "</tr>";


}
echo "</tbody></table>";
echo "Insgesamt".oci_num_rows($stmt)." ".$tabelle." gefunden";


?>








<?php

require 'footer.php';

?>
