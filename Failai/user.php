<?php
include_once "header.php";
include_once "user_inc.php";
?>
	<div class="row">
		<div class="col-md-12">
			<?php display_message(); // Klaidos pranešimo atvaizdavimas?>
		</div>
	</div>
	<!--Prasideda forma visa -->
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" name="form">
				<h2>Įvedimas <small>Nurodykite darbuotojo duomenis.</small></h2>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Vardas" tabindex="1" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Pavardė" tabindex="2" required>
						</div>
					</div>
				</div>
						<div>
							<div class="form-group">
							<select class="form-control input-lg" name="lytis" id="lytis" tabindex="3">
							<option value="" disabled selected>Pasirinkite darbuotojo lytį</option>
							<option>Vyras</option>
							<option>Moteris</option>
						</select> 
							</div>
							</div>	
						<div>
					
					<div class="form-group">
							<select class="form-control input-lg" name="pareigos" id="pareigos" tabindex="4">
							<option value="" disabled selected>Pasirinkite darbuotojo pareigas</option>
							<option>Administratorius</option>
							<option>Buhalteris</option>
							<option>Apskaitininkas</option>
							<option>Vadybininkas</option>
							<option>Mechanikas</option>
							<option>Vairuotojas</option>
							<option>Direktorius</option>
							<option>Personalo vadovas</option>
							</select> 
							</div>
							</div>
				
<!--Simple Captcha -->
<img id="captcha" src="securimage/securimage/securimage_show.php"/>
<input type="text" name="captcha_code" size="10" maxlength="6" /> <!-- dydis ir elementų skaičius -->
<a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-success"> Sekantis kodas</a>
			<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-6"><input type="submit" name="submit" value="Įvesti duomenis" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
					<div class="col-xs-12 col-md-6"><a href="user.php" class="btn btn-success btn-block btn-lg">Reset</a></div>
				</div>	
			</form>
		</div>
	</div>
	
<?php
include_once "footer.php";
?>