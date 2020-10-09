<?php
//var_dump($cli);
?>


<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header" style="background-image: url(images/fondo_2.jpg);box-shadow: inset 0px 0px 18px 0px #4e4d4d;">
             			<div class="row">
             				<div class="col-12 col-md-6">
             					<h3 style="text-shadow: 4px 2px 2px #c6c6c6;padding-top: 7px;"> <?=$cli['cognome']?> <?=$cli['nome']?>  #<?=$cli['id']?></h3>
                			</div>
	             	 		<div class="table-responsive col-12 col-md-6">
				                <table class="table table-sm">
				                  <tbody><tr>
				                    <td style="padding-right: 10px;" class="text-right">Inserito il </td><td><b> <?=date("d/m/Y", strtotime($cli['data_ins']))?></b></td>
				                    <td style="padding-right: 10px;" class="text-right">Da </td><td><b> <?=$cli['user_ins']?></b></td>
				                    
				                  </tr>
				                  <tr>
				                    <td style="padding-right: 10px;" class="text-right">Ultima modifica </td><td><b> <?=date("d/m/Y", strtotime($cli['data_mod']))?></b></td>
				                    <td style="padding-right: 10px;" class="text-right">Da </td><td><b><?=$cli['user_mod']?> </b></td> 
				                    
				                  </tr>
				                </tbody></table>
	               			</div>
              			</div>
              			<div class="row">
              				<div class="card-body">
              				 
                        <a class="btn btn-warning" onclick="history.back();return false;" style="color:white;"><i class="fa fa-times"></i> Indietro</a>
                         <a  class="btn btn-primary" href="<?=$updateUrl?>?action=upCliente&id=<?=$cli['id']?>"><i class="fa fa-edit"></i> MOdifica Cliente</a>
    

              				</div>
              			</div>
					</div><!--end card header-->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6">
						     <div class="card">
							     <div class="card-header" style="font-size:large;">Dati Anagrafici
					              </div> 
								 <ul class="list-group list-group-flush shadow-none">
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
						
						<div class="row"> <!--row tab-->
							<div class="card-body"> <!--card-body-tab-->
								<ul class="nav nav-tabs nav-tabs-danger top-icon" id="myTab">
									<li class="nav-item"><a class="nav-link active" id="patente-tab" data-toggle="tab" href="#patente" aria-controls="patente" aria-selected="true"><i class="fa fa-address-card"></i> Patente di Guida</a></li>
									<li class="nav-item"><a class="nav-link" id="testride-tab" data-toggle="tab" href="#testride" aria-controls="testride" aria-selected="false"><i class="fa fa-motorcycle"></i> Test Ride</a></li>
									<li class="nav-item"><a class="nav-link" id="contract-tab" data-toggle="tab" href="#contract" aria-controls="contract" aria-selected="false"><i class="fa fa-edit"></i> Contratti</a></li>
									<li class="nav-item"><a class="nav-link" id="allegati-tab" data-toggle="tab" href="#allegati" aria-controls="allegati" aria-selected="false"><i class="fa fa-paperclip"></i> Allegati</a></li>
								</ul>
								<div class="tab-content " id="myTabContent">
								
									<div class="container tab-pane fade active show" id="patente" style="margin-left:0px;">
										<div class="row">
											
											<div class="col-lg-6">
												<div class="card">
													<div class="card-header text-uppercase">Dati Patente</div>
													<div class="card-body" style="background-image: url(images/fondo_22.jpg);">
														<div class="col-lg-4">
															<button class="btn btn-primary btn-block m-1" data-toggle="modal" data-target="#modalpatente">aggiorna Dati</button><br><br>
															<div class="modal fade" id="modalpatente" aria-hidden="true" style="display: none;">
																<div class="modal-dialog modal-dialog-centered">
																	<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title">Aggiornamento Dati Patente</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">×</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		
																			<div class="form-group row">
																			<label class="col-sm-4 col-form-label">Data Rilascio</label>
																				<div class="col-sm-6">
																					<input type="date" class="form-control" value="<?=$patente['data_rilascio']?>">
																				</div>
																			</div>
																			<div class="form-group row">
																			<label class="col-sm-4 col-form-label">Data scadenza</label>
																				<div class="col-sm-6">
																					<input type="date" class="form-control" value="<?=$patente['data_scadenza']?>">
																				</div>
																			</div>
																			<div class="form-group row">
																			<label class="col-sm-4 col-form-label">ente Rilascio</label>
																				<div class="col-sm-6">
																					<input type="text" class="form-control" value="<?=$patente['ente_rilascio']?>">
																				</div>
																			</div>
																			<div class="form-group row">
																			<label class="col-sm-4 col-form-label">Numero</label>
																				<div class="col-sm-6">
																					<input type="text" class="form-control" value="<?=$patente['numero_patente']?>">
																				</div>
																			</div>
																			<div class="form-group row">
																			<label class="col-sm-4 col-form-label">Tipo Patente</label>
																				<div class="col-sm-6">
																				<select class="form-control" id="default-select">
																				<?php if($patente['tipo_patente']){ ?>
																						<option value="<?=$patente['tipo_patente']?>" selected> <?=$patente['tipo_patente']?></option>
																				<?php } ?>
																						<option>Option 1</option>
																						<option>Option 2</option>
																						<option>Option 3</option>
																						<option>Option 4</option>
																						<option>Option 5</option>
																				</select>
																				</div>
																			</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
																		<button type="button" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Aggiorna</button>
																	</div>
																	</div>
																</div>
															</div>
														</div>
														<ul class="list-group">
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Validità</h6>
															</div>
															<div class="date" style="text-align: right;">
															<b>Rilascio <?=date("d/m/Y", strtotime($patente['data_rilascio']))?><br>Scadenza <?=date("d/m/Y", strtotime($patente['data_scadenza']))?></b>
															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Ente Rilascio</h6>
															</div>
															<div class="date">
															<b><?=$patente['ente_rilascio']?></b>
															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Numero Patente</h6>
															</div>
															<div class="date">
															<b><?=$patente['numero_patente']?></b>
															</div>
															</div>
														</li>
														<li class="list-group-item">
															<div class="media align-items-center">
															<div class="media-body ml-3">
															<h6 class="mb-0">Tipo Patente</h6>
															</div>
															<div class="date">
															<b><?=$patente['tipo_patente']?></b>
															</div>
															</div>
														</li>
														
														</ul>
													</div>
												</div>
											</div>

										</div>
									</div>
									
									<div class="container tab-pane fade" id="testride" style="margin-left:0px;">
										<div class="row">
											<div class="card-body">
												<a type="btn btn-secondary "  href = "test_rideUpdate.php?cliId=<?=$cli['id']?>">
													<i class="fa fa-upload"></i> Test Ride 
												</a>
											</div>
										</div>
										<div class="row">	
											<div class="card-body"> 
														<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
              <tbody><tr>   
				      <th>Id</th>
				      <th>data</th>
				      <th>cliente</th>
				      <th>modello</th>
    		</tr>
    
    
    
<tr>
	<td>78</td>
	<td><strong>18.03.2020</strong></td>
	<td>10 Fiscarelli Giuseppe</td>
	<td>SH BJ62073</td>
</tr><tr>
	<td>79</td>
	<td><strong>20.03.2020</strong></td>
	<td>10 Fiscarelli Giuseppe</td>
	<td>PAN EUROPEAN AC99952</td>
</tr><tr>
	<td>80</td>
	<td><strong>24.03.2020</strong></td>
	<td>15 Fiscarelli Giuseppe</td>
	<td>SH BJ62073</td>
</tr></tbody></table></div>
											</div> 
										</div> 
									</div>
									
									<div class="container tab-pane fade" id="contract" style="margin-left:0px;">
										<div class="row">
											<div class="card-body">
												<button type="button" class="btn btn-secondary " onclick="document.location.href = 'hmrcontr.pgm?TASK=beginaddcli&amp;rrncli=000002476&amp;rnd=90594&amp;smurfid=0020e2c3fe713333f57774d36e427f724d80829808c5e57c591200d046e7377e'">
													<i class="fa fa-upload"></i> Nuovo Contratto / Preventivo 
												</button>
											</div>
										</div>
										<div class="row">	
											<div class="card-body"> 
														<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
              <tbody><tr>   
				      <th>Dati contratto</th>
				      <th>Modello</th>
				      <th>Tipo Pagamento</th>
				      <th>Importo</th>
    		</tr>
    <tr>
<td>id 14<br><i class="fa fa-calendar"></i> Data20.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>AFRICA TWIN abs - Adventure Sports ym20 - Travel Edition<br>Colore PEARL GLARE WHITE  -  TRICOLOUR </td>
<td>BONIFICO</td>
<td>21.000,00</td>
</tr><tr>
<td>id 15<br><i class="fa fa-calendar"></i> Data21.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>AFRICA TWIN abs - Adventure Sports ym20 - Desert Track<br>Colore PEARL GLARE WHITE  -  TRICOLOUR </td>
<td>FINANZIAMENTO</td>
<td>22.167,00</td>
</tr><tr>
<td>id 18<br><i class="fa fa-calendar"></i> Data23.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>AFRICA TWIN abs DCT ym20<br>Colore GRAND PRIX RED  -  ROSSO TRICOLOR </td>
<td>BONIFICO</td>
<td>16.000,00</td>
</tr><tr>
<td>id 19<br><i class="fa fa-calendar"></i> Data23.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>SH 125 abs ym19 - con bauletto e parabrezza<br>Colore PEARL SIENA RED  -  ROSSO/NERO </td>
<td>FINANZIAMENTO</td>
<td>3.700,00</td>
</tr><tr>
<td>id 20<br><i class="fa fa-calendar"></i> Data23.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>AFRICA TWIN abs ym20 - Desert Track<br>Colore GRAND PRIX RED  -  ROSSO TRICOLOR </td>
<td>BONIFICO</td>
<td>18.000,00</td>
</tr><tr>
<td>id 21<br><i class="fa fa-calendar"></i> Data23.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>CB1000R abs<br>Colore GRAPHITE BLACK  -  NERO </td>
<td>BONIFICO</td>
<td>14.000,00</td>
</tr><tr>
<td>id 22<br><i class="fa fa-calendar"></i> Data23.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>SH 125 abs ym19 - con bauletto e parabrezza<br>Colore PEARL NIGHTSTAR BLACK  -  NERO </td>
<td>BONIFICO</td>
<td>3.700,00</td>
</tr><tr>
<td>id 23<br><i class="fa fa-calendar"></i> Data23.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>VISION 110 cbs<br>Colore PEARL COOL WHITE  -  BIANCO </td>
<td>FINANZIAMENTO</td>
<td>2.600,00</td>
</tr><tr>
<td>id 25<br><i class="fa fa-calendar"></i> Data23.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>VISION 110 cbs<br>Colore PEARL NIGHTSTAR BLACK  -  NERO </td>
<td>ASSEGNO</td>
<td>2.500,00</td>
</tr><tr>
<td>id 26<br><i class="fa fa-calendar"></i> Data24.03.2020
<br><i class="fa fa-user"></i> Consulente HMRTEST</td>
<td>AFRICA TWIN abs - Adventure Sports ym20 - Desert Track<br>Colore PEARL GLARE WHITE  -  TRICOLOUR </td>
<td>ASSEGNO</td>
<td>22.000,00</td>
</tr><tr>
<td>id 27<br><i class="fa fa-calendar"></i> Data24.03.2020
<br><i class="fa fa-user"></i> Consulente SETECTEST</td>
<td>VISION 110 cbs<br>Colore MOONDUST SILVER MET - GRIGIO </td>
<td>BONIFICO</td>
<td>2.707,20</td>
</tr></tbody></table></div>
											</div> 
										</div> 

									
									</div>
									<div class="container tab-pane fade" id="allegati" style="margin-left:0px;">
									
											<div class="row">
												<div class="card-body">
													<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#div_allegato">
														<i class="fa fa-upload"></i> Carica Allegato 
													</button>
												</div>	
											</div>
											<div class="row">
												<div class="card-body">
													                      <div class="modal fade" id="div_allegato" tabindex="-1" role="dialog" aria-labelledby="div_allegatoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                          
                            <div class="modal-header">
                              <h5 class="modal-title" id="div_allegatoLabel">Inserimento allegato</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            
                            <div class="card-body">
                              <form name="form1" action="HMRANAGR.pgm" method="post" enctype="Multipart/form-data">
                                <input id="task" type="hidden" name="task" value="add_alleg2">
                                <input id="rrn_c" type="hidden" name="rrn_c" value="000002476">
                                <input id="smurfid" type="hidden" name="smurfid" value="0020e2c3fe713333f57774d36e427f724d80829808c5e57c591200d046e7377e">

                                <fieldset>
                                <div class="row form-group">
                                  <div class="col col-md-3">
                                    <label for="TCTIPO" class=" form-control-label">Tipo Allegato</label>
                                  </div>
                                  <div class="col-12 col-md-9">
                                   <select id="TCTIPO" name="TCTIPO" class="form-control" required="">
										<option value="">Prego selezionare il tipo di Documento</option>
										<option value="1">Documento di Riconoscimento</option>
										<option value="2">Patente di Guida</option>
										<option value="3">Codice Fiscale</option>
										<option value="5">Ricevuta Bonifico Saldo</option>
										<option value="6">Ricevuta Caparra</option>
										<option value="7">Assegno</option>
										<option value="8">Documento di Reddito</option>										
									</select> 
                                  </div>
                                </div>
                                
			                  <div class="row form-group">
			                    <div class="col col-md-3">
			                      <label for="UPFILE" class=" form-control-label">Documento</label>
			                    </div>
			                    <div class="col-12 col-md-9">
			                      <input type="file" name="upfile" class="btn btn-secondary">
			                    </div>
			                  </div>
                              <div class="row form-group">
			                    <div class="col col-md-3">
			                      <label for="TCTEXT" class=" form-control-label">Descrizione</label>
			                    </div>
			                    <div class="col-12 col-md-9">
			                      <input type="text" id="TCTEXT" name="TCTEXT" placeholder="Scrivi Descrizione" class="form-control" required="">
			                    </div>
			                  </div>
 
                                
                                <input type="submit" class="btn btn-xs btn-success" value="Aggiungi Allegato">
                                </fieldset>
                              </form>
                            </div> 
                            
                          </div>
                        </div>
                      </div>
													<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<tbody><tr>

	<th>Dati Upload</th>
	<th>Tipo Documento</th>
	<th>Descrizione</th>
	<th>Nome File</th>
	<th></th>
</tr><tr>
	<td>Data 24.03.2020<br>Consulente <strong>SETECTEST</strong></td>
	<td><strong>
				
				
				
				Ricevuta Caparra<br>rif Contratto # 27 del 24.03.2020
				
				
	
	

	</strong></td>
	<td>ricevuta caparra</td>
	<td>assegno.jpg</td>
		<td>
	<button class="btn btn-info btn-sm " onclick="javascript:window.open('alle001.pgm?task=default&amp;rrn=14&amp;smurfid=0020e2c3fe713333f57774d36e427f724d80829808c5e57c591200d046e7377e', '_blank', 'width=800, toolbar=1, height=600, resizable, scrollbars');"><i class="fa fa-download"></i></button>
	<button class="btn btn-danger btn-sm " onclick="if(confirm('Cancellare questo allegato?')) dltAlleg('000000014');"><i class="fa fa-trash"></i></button>
	 
	</td>

</tr><tr>
	<td>Data 24.03.2020<br>Consulente <strong>SETECTEST</strong></td>
	<td><strong>
				
				
				Ricevuta Bonifico Saldo<br>rif Contratto # 27 del 24.03.2020
				
				
				
	
	

	</strong></td>
	<td>ricevuta bon saldo</td>
	<td>assegno.jpg</td>
		<td>
	<button class="btn btn-info btn-sm " onclick="javascript:window.open('alle001.pgm?task=default&amp;rrn=15&amp;smurfid=0020e2c3fe713333f57774d36e427f724d80829808c5e57c591200d046e7377e', '_blank', 'width=800, toolbar=1, height=600, resizable, scrollbars');"><i class="fa fa-download"></i></button>
	<button class="btn btn-danger btn-sm " onclick="if(confirm('Cancellare questo allegato?')) dltAlleg('000000015');"><i class="fa fa-trash"></i></button>
	 
	</td>

</tr></tbody></table>  
												</div>	
											</div>	         
										
									</div>
									
							</div>	<!--end card-body-tab-->					
						</div><!--end row tab-->
						
						
						
					</div><!--end card-body-->
					
					
				</div>	<!--end card-->	       			
			</div> 
        </div>

      <!--End Dashboard Content-->
      
      <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    
    </div>