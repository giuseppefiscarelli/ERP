<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
$idVeicolo = getVeicolo();
//var_dump($idVeicolo);
?>
<div class="row card-body">
			<div>
				<a  data-toggle="modal" data-target="#formemodal" class="btn btn-success  text-white"><i class="fa fa-star mr-1"></i> Inserisci Nuovo  Veicolo</a>
				</div>
				<div class="bt-switch" style="margin-left:auto;">
                      <input onchange="view(this);"style="float:right;"type="checkbox" <?=$view=='grid'?'checked':''?> data-on-color="success"  data-off-color="info" data-on-text="<i class='fa fa-th'></i>  Griglia" data-off-text="<i class='fa fa-list'></i>  Lista">
				  </div>
                
                 
                  
                  
             </div>





<div class="row card-body" >


				<div class="modal fade" id="formemodal" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Inserimento nuovo Veicolo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <img style="max-width: 460px;" id="old_foto"src="images/gallery/car.png" class="img-fluid rounded shadow" alt="Card image cap">
                         
                        <form style="margin-top:30px;"enctype="multipart/form-data" id="addformvei" action="controller/updateAutoparco.php" method="post">
                            <input type="hidden" name="action" value="insertVeicolo">
                            
                            <div class="form-group row">
                               <label for="input-1" class="col-sm-4 col-form-label">Inserisci Foto</label>
                               <div class="col-sm-8">
                               <input type="file"  accept="image/png" capture id="foto" name="foto" class="" > 
                               </div>
                             </div>
                                  
							 <div class="form-group row">
								<label for="basic-select" class="col-sm-4 col-form-label">ID Veicolo</label>
								<div class="col-sm-6">
								<select class="form-control form-control-sm" id="id_veicolo" name="id_veicolo" required>
								<option value="">Seleziona Numero veicolo</option>
								<?php
									$limite = 50;
									for ($i = 10; $i <= $limite; $i++) {
										$check=getVeicolopage($i);
										if(!$check){
										echo '<option value="'.$i.'">'.$i.' Disponibile</option>';
										}else{
											echo '<option disabled value="'.$i.'">'.$i.' Non Disponibile</option>';
										}
									}
								?>
									
									
									</select>
								</div>
							</div>
                             <div class="form-group row">
                               <label for="input-2" class="col-sm-4 col-form-label">Nome Modello</label>
                               <div class="col-sm-5">
                               <input required type="text"  max-length="20" onkeyup="this.value = this.value.substr(0, 1).toUpperCase()+this.value.substr(1).toLowerCase();"class="form-control" name="modello" placeholder="Es. Bipper"value="">
                               </div>
                             </div>
                             <div class="form-group row">
                               <label for="input-3" class="col-sm-4 col-form-label">Targa</label>
                               <div class="col-sm-4">
                               <input required type="text" max-length="7"onkeyup="this.value = this.value.toUpperCase();" maxlength="7" class="form-control" placeholder="Es. AA123AA"name="targa" value="">
                               </div>
                             </div>
                             <div class="form-group row">
                               <label for="input-3" class="col-sm-4 col-form-label">KM</label>
                               <div class="col-sm-3">
                               <input required type="number"onKeyDown="if(this.value.length==6) return false;"  max="999999" min="1" class="form-control"  name="km"placeholder="Es. 123456" value="">
                               </div>
                             </div>


							 
                             
                            
                             <div class="form-group">
							 <button type="button" class="btn btn-danger px-5" data-dismiss="modal"><i class="fa fa-times"></i> annulla</button>
                              <button type="submit" style="float:right;" class="btn btn-success px-5"><i class="fa fa-refresh"></i> Inserisci</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
</div>
<div class="row" >
	<?php
   
        
        foreach ($idVeicolo as $val){
         

         
?>
	   <div class="col-12 col-lg-4" >
	    <div class="card">
		<div style="min-height:350px;">
		  <img src="images/gallery/<?=$val['id_veicolo']?>.png" class="card-img-top" alt="Card image cap"style="max-width: 500px;">
		  </div>
			<div class="card-body">
				<h4 class="card-title"><?=$val['modello']?> <?=$val['id_veicolo']?></h4>

													<ul class="list-group">
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Targa</h6>
															</div>
															<div class="date" style="text-align: right;">
															<b><?=$val['targa']?></b>
															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">KM</h6>
															</div>
															<div class="date">
															<b><?=$val['km']?></b>
															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Abilitazione</h6>
															</div>
															<div class="date">
															<input onchange="abilitazione(this,<?=$val['id']?>);"type="checkbox" <?=$val['stato'] =="N"?'':'checked' ?> data-size="small" class="js-switch" data-color="#04b962"  data-secondary-color="#f43643"/>

															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Disponibilità</h6>
															</div>
															<div class="date">
															

															<?php
																if($val['stato']=='D'){?>
															<span class="badge badge-pill badge-success m-1">Disponibile</span>

															<?	}elseif($val['stato']=='W'){?>

																<span class="badge badge-pill badge-warning m-1">At Work</span>
															<?}elseif($val['stato']=='N'){?>
																<span class="badge badge-pill badge-danger m-1">Non Disponibile</span>
															<?}?>
															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Service</h6>
															</div>
															<div class="date">
															<b>Ultimo<br>Data</b>
															</div>
															</div>
														</li>
                                                        <li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Multicard</h6>
															</div>
															<div class="date">
															<b>Numero <?=$val['multicard']?><br>Pin <?=$val['pin']?></b>
															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
														
																	<a type="button" style="width:33%"href="scheda_veicolo.php?id=<?=$val['id_veicolo']?>" class="btn btn-success btn-sm m-1"><i class="fa fa-list"></i> Scheda Veicolo</a>

															
															<a type="button" style="width:33%"href="scheda_veicolo.php?id=<?=$val['id_veicolo']?>" class="btn btn-primary btn-sm m-1"><i class="fa fa-calendar"></i><br> Prenota</a>
															<?php
																if($val['stato']=='D'){?>
															<a type="button" style="width:33%"href="scheda_veicolo.php?id=<?=$val['id_veicolo']?>" class="btn btn-info btn-sm m-1"> <i class="fa fa-user-o"></i> <br>Assegna</a>
																<?}?>	
															<a onclick="return confirm('Vuoi Eliminare il Veicolo?')"
                                                    href="<?=$deleteUrl?>?id=<?=$val['id']?>&action=delVeicolo" type="button" style="width:33%"href="scheda_veicolo.php?id=<?=$val['id_veicolo']?>" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash-o"></i><br> Elimina</a>		
															</div>
														</li>
														
													</ul>
			</div>
		</div>
	   </div>
	   
	 



<?php }
    

    ?>

</div>    