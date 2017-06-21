<?php
require_once('header.php');
require_once('config.php');
?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Darbuotojo įrašų redagavimas</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script> <!--Redaktorius įvedimo-->
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">
	<p><a href="./">Redagavimo pagrindinis langas</a></p>

	<h2>Redaguoti įrašą</h2>


	<?php

	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		extract($_POST);

		//Laukelių tikrinimas
		if($postID ==''){
			$error[] = 'Nerandama id!.';
		}

		if($postVardas ==''){
			$error[] = 'Įveskite vardą.';
		}

		if($postPavarde ==''){
			$error[] = 'Įveskite pavardę.';
		}

		if($postLytis ==''){
			$error[] = 'Įveskite lytį.';
		}
	
		if($postPareigos ==''){
			$error[] = 'Įveskite pareigas.';
		}


		if(!isset($error)){

			try {
				//Duomenys atnaujinami DB.
				$stmt = $db->prepare('UPDATE vartotojai SET  Vardas = :postVardas, Pavarde = :postPavarde, Lytis = :postLytis, Pareigos = :postPareigos WHERE id = :postID') ;
				$stmt->execute(array(
				
					':postVardas' => $postVardas,
					':postPavarde' => $postPavarde,
					':postLytis' => $postLytis,
					':postPareigos' => $postPareigos,
					':postID' => $postID
				));

				
				header('Location: index.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {
			$stmt = $db->prepare('SELECT id, Vardas, Pavarde, Lytis, Pareigos FROM vartotojai WHERE id = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='postID' value='<?php echo $row['id'];?>'>
		
		<p><label>Vardas</label><br />
		<textarea name='postVardas' cols='60' rows='10'><?php echo $row['Vardas'];?></textarea></p>
		
		<p><label>Pavardė</label><br />
		<textarea name='postPavarde' cols='60' rows='10'><?php echo $row['Pavarde'];?></textarea></p>

		<p><label>Lytis</label><br />
		<textarea name='postLytis' cols='60' rows='10'><?php  echo $row['Lytis'];?></textarea></p>

		<p><label>Pareigos</label><br />
		<textarea name='postPareigos' cols='60' rows='10'><?php  echo $row['Pareigos'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>
</body>
</html>	

<?php
include_once "footer.php";
?>