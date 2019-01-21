<?php

require 'connect.php';
require 'head.php';


$search = $_GET['search'];

$sql = "SELECT * FROM Film";

if($search){
  $sql .= " WHERE filmID='".$search."'";
}

$stmt = oci_parse($conn, $sql);
oci_execute($stmt);


?>



<form action="filme.php" method="get">

    Durchsuche Film:
    <input id='search' name='search' type='text' size='30' value='<?php echo $_GET['search']; ?>' />
    nach
	<select id='Tabelle' name='tab' onchange='attr()'>
					<option value="" disabled selected>Tabelle auswählen...</option>
					<option value="Filmdirected">Regisseure</option>
					<option value="Filmstarring">Schauspieler</option>
					<option value="Filmsave">Pfad</option>
	</select>
	<input id='submit' type='submit' value='search!' />
</form>



<?php
echo "<table style='border: 1px solid #DDDDDD'><thead><tr>";
echo"<th>filmID</th>";
echo"<th>laenge</th>";
echo"<th>release</th>";//in swl erscheinungsdatum
echo"<th>name</th>";
echo"</tr></thead><tbody>";
while ($row = oci_fetch_assoc($stmt)) {
    echo "<tr>";
    echo "<td>" . $row['FILMID'] . "</td>";
    echo "<td>" . $row['LAENGE'] . "</td>";
    echo "<td>" . $row['ERSCHEINUNGSDATUM'] . "</td>";
    echo "<td>" . $row['HERKUNFT'] . "</td>";
    echo "<td>" . $row['SALARY'] . "</td>";
    echo "</tr>";


}
echo "</tbody></table>";
echo "Insgesamt".oci_num_rows($stmt)." ".$tabelle." gefunden";


?>








<?php

require 'footer.php';

?>
