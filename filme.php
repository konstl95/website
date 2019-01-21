<?php

require 'connect.php';
require 'head.php';


$search = $_GET['search'];

$sql = "SELECT * FROM Film";

if($search){
  $sql .= " WHERE name LIKE '%".$search."%'";
}

$stmt = oci_parse($conn, $sql);
oci_execute($stmt);


?>



<form action="filme.php" method="get">

    Durchsuche Film:
    <input id='search' name='search' type='text' size='30' value='<?php echo $_GET['search']; ?>' />


	<input id='submit' type='submit' value='search!' />
</form>
<a href="add_film.php" class="btn btn-lg">Film hinzufügen</a>


<?php
echo "<table class='table table-striped table-dark'><thead><tr>";
echo"<th>filmID</th>";
echo"<th>laenge</th>";
echo"<th>release</th>";//in swl erscheinungsdatum
echo"<th>name</th>";
echo"<th>Regiseure</th>";
echo"<th>Pfad</th>";
echo"<th>Starring</th>";
echo"<th>Person Hinzufügen</th>";
echo"</tr></thead><tbody>";
while ($row = oci_fetch_assoc($stmt)) {
    echo "<tr>";
    echo "<td>" . $row['FILMID'] . "</td>";
    echo "<td>" . $row['LAENGE'] . "</td>";
    echo "<td>" . $row['ERSCHEINUNGSDATUM'] . "</td>";
    echo "<td>" . $row['NAME'] . "</td>";
    echo "<td><a href='regiseur.php?id=" . $row['FILMID'] . "'> Zeige Regiseure</a</td>";
    echo "<td><a href='pfad.php?id=" . $row['FILMID'] . "'> Zeige Pfad</a</td>";
    echo "<td><a href='starring.php?id=" . $row['FILMID'] . "'> Zeige Starring</a</td>";
    echo "<td><a href='add_entry.php?id=" . $row['FILMID'] . "'> + </a</td>";
    echo "</tr>";


}
echo "</tbody></table>";
echo "Insgesamt".oci_num_rows($stmt)." ".$tabelle." gefunden";


?>








<?php

require 'footer.php';

?>
