<?php
include $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$first_name				= mysqli_real_escape_string($conn,$_POST['first_name']);
	$last_name				= mysqli_real_escape_string($conn,$_POST['last_name']);
	/* Įvedimas duomenų */
	$first_name				= htmlspecialchars($first_name);
	$last_name				= htmlspecialchars($last_name);
	
	$errors = [];
	$success = "Duomenys įvesti.";
	// Laukelių užpildymo tikrinimas
	if (strlen($first_name) >= 50){
		
		$errors[] = " Vardas per ilgas.";
	}
	if (strlen($last_name) >= 50){
		
		$errors[] = " Pavardė per ilga.";
	}
	if ( !isset($_POST['lytis'])){
		$errors[] = " Įveskite lytį";
	} else {
		$lytis	= $_POST['lytis'];
	}
	
	if ( !isset($_POST['pareigos'])){
		$errors[] = " Įveskite pareigas";
	} else {
		$pareigos	= $_POST['pareigos'];
	}
	
	/* Prasideda Simple Captcha */ 
		$securimage = new Securimage();	
		
	if ($securimage->check($_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue

  // or you can use the following code if there is no validation or you do not know how
  echo "Apsaugos kodas neteisingas.<br /><br />";
  echo "Grižkite <a href='javascript:history.go(-1)'>atgal</a> ir bandykite vėl.";
  exit;
}	
	
	if (!empty($errors)) {
		foreach ($errors as $error) {
			validation_errors($error);	
		}
	}else{
		$sql = "INSERT INTO vartotojai (Vardas, Pavarde, Lytis, Pareigos, Data)
		VALUES ('$first_name', '$last_name', '$lytis', '$pareigos', now())";
		
		if ($conn->query($sql) === TRUE) {
			header('location:user.php');
			validation($success);
			exit;
		} else {
			set_message("<p>Error: " . $sql . "<br>" . $conn->error . "</p>");
		}
			
		$conn->close();
	} 
}
?>