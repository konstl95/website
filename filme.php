<?php

require 'connect.php';
require 'head.php';


$sql = "SELECT * FROM Film";


$stmt = oci_parse($conn, $sql);
oci_execute($stmt);
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
