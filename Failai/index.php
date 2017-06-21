<?php
include_once "header.php";
?>

<div class="jumbotron">
	<div class="alert alert-success" role="alert">
		<?php echo "Sukurtas vartotojų įvedimas ir įrašų redagavimas. Pagal pateiktą <a href='#' data-toggle='modal' data-target='#t_and_c_m'> užduotį.</a> "; ?>
	</div>
	<h1 class="text-center"> Darbuotojų informacijos valdymo internetinis puslapis</h1>
</div>
				
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Užduotis</h4>
				</div>
				<div class="modal-body">
					<p>Sukurti minimalų darbuotojų informacijos valdymo internetinį puslapį.</p>
					<p>Duomenys saugomi MySQL duomenų bazėje.</p>
					<p>Reikalinga galimybė įterpti, redaguoti, peržiūrėti ir ištrinti darbuotojo įrašą.</p>
					<p>Saugoma darbuotojo informacija: Vardas, Pavardė, Lytis, Pareigos.</p>
					<p>Įvedimo ir redagavimo HTML laukelių tipai:</p>
					<p>Vardas -> text</p>
					<p>Pavardė -> text</p>
					<p>Lytis -> radio button arba select</p>
					<p>Pareigos -> select</p>
					<p>Puslapį galima patalpinti kur pačiam patogiau.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"> Uždaryti</button>
				</div>
			</div>
		</div>
	</div>

<?php
include_once "footer.php";
?>