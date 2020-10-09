<?php
$totalErpUsers= countErpUsers();
$totalAmbienti = countAmbienti();
?>
<div class="row mt-3">
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card gradient-deepblue">
			<div class="card-body">
				<h5 class="text-white mb-0">Utenti Portale ERP<span class="float-right"><i class="fa fa-users"></i></span></h5>
				<div class="progress my-3" style="height:3px;">
					<div class="progress-bar" style="width:55%">
					</div>
				</div>
				<p class="mb-0 text-white small-font">Utenti Totali <span class="float-right"><?=$totalErpUsers?> </i></span></p>
			</div>
		</div> 
	</div>
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card gradient-orange">
			<div class="card-body">
				<h5 class="text-white mb-0">Ambienti ERP <span class="float-right"><i class="fa fa-usd"></i></span></h5>
				<div class="progress my-3" style="height:3px;">
					<div class="progress-bar" style="width:55%"></div>
				</div>
				<p class="mb-0 text-white small-font">Attivi <span class="float-right"><?=$totalAmbienti?> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card gradient-ohhappiness">
			<div class="card-body">
				<h5 class="text-white mb-0">6200 <span class="float-right"><i class="fa fa-eye"></i></span></h5>
				<div class="progress my-3" style="height:3px;">
					<div class="progress-bar" style="width:55%"></div>
				</div>
				<p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-6 col-xl-3">
		<div class="card gradient-ibiza">
			<div class="card-body">
				<h5 class="text-white mb-0">5630 <span class="float-right"><i class="fa fa-envira"></i></span></h5>
				<div class="progress my-3" style="height:3px;">
					<div class="progress-bar" style="width:55%"></div>
				</div>
				<p class="mb-0 text-white small-font">Messages <span class="float-right">+2.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
			</div>
		</div>
	</div>
</div>