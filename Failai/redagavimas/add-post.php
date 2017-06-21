<?php 
//Įtraukiami failiukai .php
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
	
	<h2>Pridėkite darbuotoją</h2>

	<?php

	
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		
		extract($_POST);

		//Laukelių užpildymo tikrinimas.
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

				//Duomenų įvedimas į DB.
				$stmt = $db->prepare('INSERT INTO vartotojai (Vardas,Pavarde,Lytis,Pareigos,Data) VALUES (:postVardas, :postPavarde, :postLytis, :postPareigos, :postData)') ;
				$stmt->execute(array(
					':postVardas' => $postVardas,
					':postPavarde' => $postPavarde,
					':postLytis' => $postLytis,
					':postPareigos' => $postPareigos,
					':postData' => date('Y-m-d H:i:s'),
				));

				header('Location: index.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//Klaidų tikrinimas.
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>
		<p><label>Vardas</label><br />
		<textarea name='postVardas' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postVardas'];}?></textarea></p>
		<p><label>Pavardė</label><br />
		<textarea name='postPavarde' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postPavarde'];}?></textarea></p>
		<p><label>Lytis</label><br />
		<textarea name='postLytis' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postLytis'];}?></textarea></p>
		<p><label>Pareigos</label><br />
		<textarea name='postPareigos' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postPareigos'];}?></textarea></p>
		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>

<?php
include_once "footer.php";
?>
