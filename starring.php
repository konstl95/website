<?php

require 'connect.php';
require 'head.php';


$search = $_GET['search'];


$id = $_GET['id'];

$sql = "SELECT * FROM Filmstarring";

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



<form action="Schauspieler.php" method="get">

    Durchsuche Schauspieler:
    <input id='search' name='search' type='text' size='30' value='<?php echo $_GET['search']; ?>' />


	<input id='submit' type='submit' value='search!' />
</form>



<?php
echo "<table style='border: 1px solid #DDDDDD'><thead><tr>";
echo"<th>personID</th>";
echo"<th>filmID</th>";
echo"</tr></thead><tbody>";
while ($row = oci_fetch_assoc($stmt)) {
    echo "<tr>";
    echo "<td>" . $row['personID'] . "</td>";
    echo "<td>" . $row['filmID'] . "</td>";
    echo "</tr>";


}
echo "</tbody></table>";
echo "Insgesamt".oci_num_rows($stmt)." ".$tabelle." gefunden";


?>








<?php

require 'footer.php';

?>
