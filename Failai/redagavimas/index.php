<?php
//Įtraukiami .php failai.
require_once('header.php');
require_once('config.php');


if(isset($_GET['deldarbuotojas'])){ 

	$stmt = $db->prepare('DELETE FROM vartotojai WHERE id = :id') ;
	$stmt->execute(array(':id' => $_GET['deldarbuotojas']));

	header('Location: index.php?action=deleted');
	exit;
} 

?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Redagavimas</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
  function deldarbuotojas(id, Vardas)
  {
	  if (confirm("Ar jūs norite ištrinti darbuotoją : '" + Vardas + "'"))
	  {
	  	window.location.href = 'index.php?deldarbuotojas=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php 
	//Rodomas pranešimas.
	if(isset($_GET['action'])){ 
		echo '<h3>Darbuotojas '.$_GET['action'].'.</h3>'; 
	} 
	?>

	<table>
	<tr>
		<th>Vardas</th>
		<th>Pavardė</th>
		<th>Lytis</th>
		<th>Pareigos</th>
		<th>Data</th>
		<td>Funkcijos</td>
	</tr>
	
	<?php
		try {

			$stmt = $db->query('SELECT id, Vardas, Data, Pavarde, Lytis, Pareigos FROM vartotojai ORDER BY id DESC');
			while($row = $stmt->fetch()){
				
				echo '<tr>';
				echo '<td>'.$row['Vardas'].'</td>';
				echo '<td>'.$row['Pavarde'].'</td>';
				echo '<td>'.$row['Lytis'].'</td>';
				echo '<td>'.$row['Pareigos'].'</td>';
				echo '<td>'.date('jS M Y', strtotime($row['Data'])).'</td>';
				
				?>

				<td>
					<a href="edit-post.php?id=<?php echo $row['id'];?>">Edit</a> | 
					<a href="javascript:deldarbuotojas('<?php echo $row['id'];?>','<?php echo $row['Vardas'];?>')">Delete</a>
				</td>
				
				<?php 
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href='add-post.php'>Pridėti darbuotoją</a></p>

</div>

</body>
</html>
<?php
include_once "footer.php";
?>