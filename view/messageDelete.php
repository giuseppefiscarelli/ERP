

        <div id="message" class="col-md-6 alert alert-icon-<?= $alertType?> alert-dismissible" role="alert" style="justify-content: center;">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<div class="alert-icon icon-part-<?= $alertType?>">
			 <i class="fa fa-<?=$iconType?>"></i>
			</div>
			<div class="alert-message">
			  <span><?=$message?></span>
			</div>
		  </div>