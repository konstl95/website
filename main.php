<?php

require 'connect.php';
require 'head.php';

?>
    <h2>DBS WS2018</h2>
		<h1>Filmdatenbank</h1>
		<br>






		<a href='filme.php'>Start</a>

		<div>



	<form id='searchform' action='mitwirkende.php' method='get'>
    <a href='index.php?search=&tab=Mitwirkende&att=all'>Alle Mitwirkende</a> ---
    Suche nach Mitwirkende:
    <input id='search' name='search' type='text' size='30' value='<?php echo $_GET['search']; ?>' />
    <input id='submit' type='submit' value='search!' />

	<br/>
	<!--
	filmsearches-->

	<br/>
	<!--
	<a href='index.php?search=&tab=Schauspieler&att=all'>Alle Schauspieler</a> ---
    Suche nach Schauspieler:
    <input id='search' name='search' type='text' size='30' value='<?php echo $_GET['search']; ?>' />
    <input id='submit' type='submit' value='search!' />
	-->

	</form>
<a href='filme.php'>Alle Filme</a> <br/>---
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



		</div>

		<?php
			// check if search view of list view
			if (isset($_GET['tab'])) {
				$tabelle = $_GET['tab'];
				$attribut = $_GET['att'];
				$sql='';
				$tabelle_sec = $_GET['2ndtab'];
				$suchbegriff = $_GET['search'];
				switch($tabelle){
					case "Film":
						if($attribut=="all"){
							$sql = "SELECT * FROM " .$tabelle;
							echo $sql;
						}
						else{
							$sql = "SELECT * FROM " .$tabelle;
							echo $sql;
						}
						break;
					case "Mitwirkende":
						if($attribut=="all"){
							$sql = "SELECT * FROM " .$tabelle;
							echo $sql;
						}
						else{
							$sql = "SELECT * FROM " .$tabelle;
							echo $sql;
						}
						break;
				case "Schauspieler":
					if($attribut=="all"){
						$sql = "SELECT * FROM " .$tabelle;
						echo $sql;
					}
					else{
						$sql = "SELECT * FROM " .$tabelle;
						echo $sql;
					}
					break;
				case "Filmstarring":
					$sql="SELECT * FROM ".$tabelle. " WHERE filmID = '".$suchbegriff."'";
					echo $sql;
					echo $suchbegriff;
					break;





			}

		// execute sql statement
		$stmt = oci_parse($conn, $sql);
		oci_execute($stmt);

		//Ausgabe

		//tabelle anhand der auswahl erstellen
		echo "<table style='border: 1px solid #DDDDDD'><thead><tr>";
		switch($tabelle){

			case "Film":
				echo"<th>filmID</th>";
				echo"<th>laenge</th>";
				echo"<th>release</th>";//in swl erscheinungsdatum
				echo"<th>name</th>";
				break;
			case "Mitwirkende":
				echo"<th>personID</th>";
				echo"<th>vorname</th>";
				echo"<th>nachname</th>";
				echo"<th>herkunft</th>";
				echo"<th>salary</th>";
				break;
			case "Schauspieler":
				echo"<th>personID</th>";
				echo"<th>actorID</th>";
				break;
			case "Filmstarring":
				echo"<th>personID</th>";
				echo"<th>filmID</th>";
				break;
			case "Filmdirected":
				echo"<th>personID</th>";
				echo"<th>filmID</th>";
				break;
			case "Filmsave":
				echo"<th>pfad</th>";
				echo"<th>filmID</th>";
				break;


		}
		echo"</tr></thead><tbody>";//ende der tabelle

		while ($row = oci_fetch_assoc($stmt)) {
			echo "<tr>";
			switch($tabelle){
				case "Film":
					echo "<td>" . $row['FILMID'] . "</td>";
					echo "<td>" . $row['LAENGE'] . "</td>";
					echo "<td>" . $row['ERSCHEINUNGSDATUM'] . "</td>";
					echo "<td>" . $row['HERKUNFT'] . "</td>";
					echo "<td>" . $row['SALARY'] . "</td>";
					break;
				case "Mitwirkende":
					echo "<td>" . $row['PERSONID'] . "</td>";
					echo "<td>" . $row['VORNAME'] . "</td>";
					echo "<td>" . $row['NACHNAME'] . "</td>";
					echo "<td>" . $row['HERKUNFT'] . "</td>";
					echo "<td>" . $row['SALARY'] . "</td>";
					break;
				case "Schauspieler":
					echo "<td>" . $row['PERSONID'] . "</td>";
					echo "<td>" . $row['ACTORID'] . "</td>";
					break;
				case "Filmstarring":
					echo "<td>" . $row['PERSONID'] . "</td>";
					echo "<td>" . $row['FILMID'] . "</td>";
					break;
				case "Filmdirected":
					echo "<td>" . $row['PERSONID'] . "</td>";
					echo "<td>" . $row['FILMID'] . "</td>";
					break;
				case "Filmsave":
					echo "<td>" . $row['PFAD'] . "</td>";
					echo "<td>" . $row['FILMID'] . "</td>";
					break;
			}
			echo "</tr>";

		}//ende while
		echo "</tbody></table>";
		echo "Insgesamt".oci_num_rows($stmt)." ".$tabelle." gefunden";
		//if (oci_num_rows($stmt)) {echo "</tbody></table>";}

  } else {
	  echo "auswahl treffen";


  }

?>
<!--personID VARCHAR(20) NOT NULL,     /*should be imdb */
	vorname VARCHAR(30) DEFAULT 'Max',
	nachname VARCHAR(30) DEFAULT 'Mustermann',
	herkunft-->

<div>Insgesamt <?php echo oci_num_rows($stmt); ?> Mitwirkende gefunden!</div>

<?php  oci_free_statement($stmt); ?>
<div>
	<br/>
	Einfuegen:<br/>
	<form id='insertform2' action='index.php' method='get'>
		<select id='insertTabelle' name='inserttab' onchange='attr()'>
						<option value="" disabled selected>Tabelle auswählen...</option>
						<option value="Filmdirected">Regisseure</option>
						<option value="Filmstarring">Schauspieler</option>
						<option value="Filmsave">Pfad</option>
		</select>
		<input id='submit' type='submit' value='Tabelle waehlen' />
	<form/>
	<?php
  //Handle insert
  if (isset($_GET['inserttab']))
  {
    $auswahl = $_GET['inserttab'];

	//echo "<form id='insertform' action='index.php' method='get'><table style='border: 1px solid #DDDDDD'><thead><tr>";
	switch($auswahl){
		case "Filmsave":
			echo "
				<br/>
				<form id='insertform' action='index.php' method='get'>
					Neuen Pfad für Film einfuegen:
					<table style='border: 1px solid #DDDDDD'>
					<thead>
						<tr>
							<th>Pfad</th>
							<th>filmID</th>
						</tr>
					</thead>
					<tbody>
						<td>
							<input id='pfad' name='pfad' type='text' size='10' value='". $_GET['pfad']. "' />
						</td>
					<tbody/>

					</table>
						<input id='submit' type='submit' value='Einfuegen!' />
				</form>
				";
		break;


	}
  }
?>

<div/>

<div>
  <form id='insertform' action='index.php' method='get'>
    Neue Mitwirkende einfuegen:
	<table style='border: 1px solid #DDDDDD'>
	  <thead>
	    <tr>
		<th>Tabelle</th>
	    <th>personID</th>
		<th>vorname</th>
		<th>nachname</th>
		<th>herkunft</th>
		<th>salary</th>
	    </tr>
	  </thead>
	  <tbody>
	     <tr>
			<td>

			<td/>
	        <td>
	           <input id='personID' name='personID' type='text' size='10' value='<?php echo $_GET['personID']; ?>' />
            </td>
			<td>
				<input id='vorname' name='vorname' type='text' size='20' value='<?php echo $_GET['vorname']; ?>' />
			</td>
			<td>
				<input id='nachname' name='nachname' type='text' size='20' value='<?php echo $_GET['nachname']; ?>' />
			</td>
			<td>
				<input id='herkunft' name='herkunft' type='text' size='20' value='<?php echo $_GET['herkunft']; ?>' />
			</td>
			<td>
				<input id='salary' name='salary' type='number' size='20' value='<?php echo $_GET['salary']; ?>' />
			</td>

	      </tr>
           </tbody>
        </table>
        <input id='submit' type='submit' value='Einfuegen!' />
  </form>
</div>
<?php
  //Handle insert
  if (isset($_GET['personID']))
  {
    //Prepare insert statementd
    $sql = "INSERT INTO Mitwirkende VALUES('" . $_GET['personID'] . "','"  . $_GET['vorname'] . "','" . $_GET['nachname'] . "','" . $_GET['herkunft'] . "'," . $_GET['salary'] . ")";
    echo $sql;
	//Parse and execute statement
    $insert = oci_parse($conn, $sql);
    oci_execute($insert);
    $conn_err=oci_error($conn);
    $insert_err=oci_error($insert);
    if(!$conn_err & !$insert_err){
	print("Successfully inserted");
 	print("<br>");
    }
    //Print potential errors and warnings
    else{
       print($conn_err);
       print_r($insert_err);
       print("<br>");
    }
    oci_free_statement($insert);
  }
?>









<?php

require 'footer.php';

?>
