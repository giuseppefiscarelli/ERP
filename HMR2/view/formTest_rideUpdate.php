<?php

$cliente = getParam('cliId');
$cli = getCliente($cliente);
?>

<div class="row">

    <div class="col-12">
        <div class="card">
              <div class="card-header" style="background-image: url(images/fondo_2.jpg);box-shadow: inset 0px 0px 5px 0px #9d9d9d">
                <div class="row">
                  <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">TestRide </h3> Inserimento Prenotazione </div>
                </div>
              </div>              
			<div class="card-body ">
                <!--
				<div class="row">
					<div class="col-12 col-md-2">
	                        <button type="button" class="btn btn-primary btn-block waves-effect waves-light m-1" id="btnEdit" onclick="document.location.href = 'HMRANAGR.pgm?task=beginaddteride&amp;rrn=0&amp;rnd=86743&amp;smurfid=0020b3767b86cc5503118c2ee995cd4acf73311329cf2ecb83e78d463edd906e' ">
	                          <i class="fa fa-user-plus"></i> <span>Nuovo Cliente</span>
	                        </button>
	                  </div>
	              </div>

	              <div class="row">     
	                  <div class="col-12 col-md-5">
	                    <div class="input-group mb-3" style="margin-left:4px;margin-top:16px;">
	                    	<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-barcode"></i></span>
 			                      <input type="text" id="CERCACLI" name="CERCACLI" value="" placeholder="Inserisci / Scansione Codice Fiscale" class="form-control ui-autocomplete-input" autocomplete="off">
							</div>
	                    </div>
	                  </div>
	                </div>  

                  	<div class="row" id="mdbtn" style="display:none">
	                  <div class="col-12 col-md-2">
	                        <button type="button" class="btn btn-info btn-block waves-effect waves-light m-1" id="btnChg">
	                          <i class="fa fa-cog"></i> <span>Modifica Dati Cliente</span>
	                        </button>
	                  </div>
					</div>
			
				<div class="row" style="padding-bottom:10px;"></div>
			-->
			
			
            <form id="addform" action="controller/updateTestride.php" method="post">
                            <input type="hidden" name="codfiscale" value ="<?=$cli['codfiscale']?>">  
                            <input type="hidden" name="targa" id="targa" value ="">  
                            <input type="hidden" name="action" value ="saveTestride">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header" style="font-size:large;">Dati Anagrafici
                            </div> 
                            <ul class="list-group list-group-flush shadow-none">
                            <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Codice Cliente</h6>
                                        </div>
                                        <div class="date">
                                             <b id="id" value ="<?=$cli['id']?>"><?=$cli['id']?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Cognome</h6>
                                        </div>
                                        <div class="date">
                                             <b id="cognome" value ="<?=$cli['cognome']?>"><?=$cli['cognome']?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Nome</h6>
                                        </div>
                                        <div class="date">
                                                <b><?=$cli['nome']?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Data di Nascita</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=date("d/m/Y", strtotime($cli['datanasc']))?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Luogo di Nascita</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=getComune($cli['luogonasc'])?> (<?=$cli['provnasc']?>)</b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Nazionalità</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['nazionalita']?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Sesso</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['sesso']?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Codice Fiscale</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['codfiscale']?></b>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header" style="font-size:large;">Contatti
					        </div> 
                            <ul class="list-group list-group-flush shadow-none">
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0"><i class="fa fa-address-card"></i> Indirizzo</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['indirizzores']?><br><?=$cli['capres']?> - <?=getComune($cli['luogores'])?> (<?=$cli['provres']?>)</b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0"><i class="fa fa-envelope"></i> Pec</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['mail1']?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0"><i class="fa fa-envelope-o"></i> eMail</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['mail2']?><br></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0"><i class="fa fa-phone"></i> Telefono</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['tel1']?><br><?=$cli['tel2']?></b>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0"><i class="fa fa-mobile"></i> Cellulare</h6>
                                        </div>
                                        <div class="date">
                                            <b><?=$cli['mobile1']?><br><?=$cli['mobile2']?></b>
                                        </div>
                                    </div>
                                </li>
                            </ul>
					    </div>
					</div>
				</div> <!--end row card body-->



                <?php $moto = getMoto();
                 //var_dump($moto);
                ?>
                <div class="row">     
                    <div class="col-12 col-md-6">

                        <div class="col-12  "> 
                            <div class="row form-group">
                                <div class="col-12 col-md-6">
                                <h5><i class="fa fa-motorcycle"></i> Prenotazione TestRide</h5><h5>
                                </h5></div>

                            </div>
                        </div>
                        <div class="col-12  ">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Motoveicolo</label>
                                <div class="col-sm-8">
                                    <select id="TRMOPR" name="TRMOPR" class="form-control" required="">
                                    <option value="">Seleziona un modello</option>
                                    <?php
                                        if($moto){
                                          foreach ($moto as $m){                              
                                        
                                    ?>
                                   
                                    <option value="<?=$m['targa']?>"><?=$m['marca']?> <?=$m['modello']?> <?=$m['targa']?> </option>
                                    <?php }
                                    } ?>
                                    </select>  
                                </div>
                            </div>
                        </div>
                        <div class="col-12  ">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">KM</label>
                                <div class="col-sm-8">
                                <input type="text" id="km" name="km" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12  ">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Data Test</label>
                                <div class="col-sm-8">
                                <input type="date" id="data_pren" name="data_pren" class="form-control" required="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12  ">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Ora Test</label>
                                <div class="col-sm-8">
                                <input type="time" id="ora_test" name="ora_test" required="" class="form-control" value="08:00">
                                </div>
                            </div>
                        </div>
                        <div class="col-12  ">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Durata</label>
                                <div class="col-sm-8">
                                <input type="number" step="5" id="durata_test" name="durata_test" class="form-control" value="0"> minuti
                                </div>
                            </div>
                        </div>
                        <div class="col-12  ">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">test</label>
                                <div class="col-sm-8">
                                <input type="text"  id="test" name="test" class="form-control" > test
                                </div>
                            </div>
                        </div>
                    </div>			
	                
                        <div class="col-sm-6">
                            <div id="calendar"></div>
                        </div>
                </div>
            </div>		
<div class="row">
	<div class="col-lg-4">
	<!-- Default Size Modal -->
		<button type="button " onclick="return false;" class="btn btn-info  btn-block m-1" data-toggle="modal" data-target="#defaultsizemodal"><i class="fa fa-pencil-square-o"></i> Acquisizione Firma Digitale</button>
	<!-- Modal -->
		<div class="modal fade" id="defaultsizemodal" style="display: none;" data-backdrop="static" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="height:425px;">
					<div class="modal-header">
					<h5 class="modal-title">Aquisizione Firma</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					</div>
					<div class="modal-body">
					           
<div class="row" style="margin-left:9px;">			
  <div id="signature-pad" class="m-signature-pad" style="width: 450px;height: 200px;">
	<div class="m-signature-pad--body">
      <canvas width="450" height="200"></canvas>
    </div>
    
    <div class="m-signature-pad--footer">
      <div class="description" style="padding-top: 20px;">
      </div>
	      <button type="button" class="button btn btn-primary clear" data-action="clear">Pulisci Campo Firma</button>
    </div>
  </div> 
</div>

<br>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal" onclick="conferma()"><i class="fa fa-times"></i> Acquisisci</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>                 
                            


			            <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" id="submitbutton" name="mode" value="Add">
                          <i class="fa fa-dot-circle-o"></i> Inserisci Prenotazione
                        </button>
                        <button type="reset" class="btn btn-sm btn-danger" onclick="javascript:location.href='?page=1&amp;smurfid=0020b3767b86cc5503118c2ee995cd4acf73311329cf2ecb83e78d463edd906e';return false;" value="Annulla">
                          <i class="fa fa-ban"></i> Annulla
                        </button>
                      </div>							
                      </form>                
				
			</div> <!-- end card body -->

</div><!-- end card -->  
</div>
</div>