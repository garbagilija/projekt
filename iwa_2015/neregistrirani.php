
<?php
if(isset($_POST['submit']))
{
$conn = mysqli_connect("localhost", "iwa_2015", "foi2015", "iwa_2015_vz_projekt");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$search = $conn->real_escape_string($_POST['search']);
$result = $conn->query("SELECT u.naziv, u.opis, a.naziv FROM aktivnost a, udruga u
WHERE udruga.naziv = '$search' AND udruga.udruga_id == aktivnost.udruga_id;");

while ($rows = $result->fetch_assoc())
 {
 	$nudruga=$rows['naziv'];
 	$opisu=$rows['opis'];
 	$naziva=$rows['naziv'];
 	echo "<p> Naziv udruge: $nudruga<br />Opis udruge:$opisu<br />Naziv aktivnosti:$naziva</p>";
 	print $result;
 } 
}
?>
<form method ="POST">
<input type ="TEXT" name="search"/>
<input type ="submit" name="submit" value="SEARCH"/>
<?php
include "footer.php"
?>
</html>