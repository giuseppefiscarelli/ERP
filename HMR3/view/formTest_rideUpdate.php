<div class="row">
    <div class="col-12">
        <div class="card">
              <div class="card-header" style="background-image: url(images/fondo_2.jpg);box-shadow: inset 0px 0px 5px 0px #9d9d9d">
                <div class="row">
                  <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">TestRide </h3> Inserimento Prenotazione </div>
                  
                </div>
              </div> 
            <form id="addform" action="controller/updateTestride.php" method="post"> 
               
                <input type="hidden" name="targa" id="targa" value ="">  
                <input type="hidden" name="action" value ="<?=$tr['id']?'storeTestride':'saveTestride'?>">
                <input type="hidden" name="signCode" id="signCode" value="">               
			    <div class="card-body ">
                    <div class="input-group-prepend col-lg-6 col-md-12">
								<span class="input-group-text"><i class="fa fa-barcode"></i></span>
 			                      <input type="text" id="autocomplete" name="autocomplete"  value="" maxlength="16" placeholder="Inserisci / Scansione Codice Fiscale" class="form-control ui-autocomplete-input"  autocomplete="off">
                               
                    </div>
                    <br>
                    <div class="input-group-prepend ">
                        <a  class="btn btn-primary" id="addCli" style="margin-bottom: 10px;display:<?=$cliente?'none':'initial'?>;"
                        href="<?=$updateCliUrl?>?action=insertTest">
                        <i class="fa fa-user-plus"></i> Aggiungi Cliente</a>
                        
                        <a  class="btn btn-secondary" id="modCli" style="margin-bottom: 10px;display:<?=$cliente?'initial':'none'?>;"
                          href="<?=$updateCliUrl?>?action=insertTest&id=<?=$cli['id']?>">
                        <i class="fa fa-user-plus"></i> Modifica Dati Cliente</a>
                    </div>    
                        
                    <div class="row" id="dati_anagrafici" style="display:<?=$cliente?'flex':'none'?>;">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" style="font-size:large;">Dati Anagrafici
                                </div> 
                                <div class="card-body">

                                    <div class="form-group row">
				                        <label for="id" class="col-sm-4 col-form-label">Codice Cliente</label>
				                         <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="<?=$cli['id']?>" readonly>
				                        </div>
				                    </div> 
                                    <div class="form-group row">
				                        <label for="codfiscale" class="col-sm-4 col-form-label">Codice Fiscale</label>
				                         <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="codfiscale" name="codfiscale"value="<?=$cli['codfiscale']?>" readonly>
				                        </div>
				                    </div>

                                    <div class="form-group row">
				                        <label for="cognome" class="col-sm-4 col-form-label">Cognome</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="cognome" value="<?=$cli['cognome']?>" readonly>
				                        </div>
				                    </div>

                                    <div class="form-group row">
				                        <label for="nome" class="col-sm-4 col-form-label">Nome</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="nome" value="<?=$cli['nome']?>" readonly>
				                        </div>
				                    </div>

                                    <div class="form-group row">
				                        <label for="data" class="col-sm-4 col-form-label">Data di Nascita</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="date" class="form-control" id="datanasc" value="<?=$cli['datanasc']?>" readonly>
				                        </div>
				                    </div> 

                                    <div class="form-group row">
				                        <label for="nome" class="col-sm-4 col-form-label">Luogo di Nascita</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="luogonasc" value="<?=getComune($cli['luogonasc'])?>" readonly>
				                        </div>
				                    </div> 
                                    
                                    <div class="form-group row">
				                        <label for="nome" class="col-sm-4 col-form-label">Prov di Nascita</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="provnasc" value="<?=$cli['provnasc']?>" readonly>
				                        </div>
				                    </div> 

                                    <div class="form-group row">
				                        <label for="nazionalita" class="col-sm-4 col-form-label">nazionalita</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="nazionalita" value="<?=$cli['nazionalita']?>" readonly>
				                        </div>
				                    </div> 

                                    <div class="form-group row">
				                        <label for="sesso" class="col-sm-4 col-form-label">sesso</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="sesso" value="<?=$cli['sesso']?>" readonly>
				                        </div>
				                    </div> 

                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" style="font-size:large;">Dati residenza
                                </div> 
                                <div class="card-body">

                                    <div class="form-group row">
				                        <label for="indirizzores" class="col-sm-4 col-form-label">Indirizzo</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="indirizzores" value="<?=$cli['indirizzores']?>" readonly>
				                        </div>
				                    </div>
                                    <div class="form-group row">
				                        <label for="provres" class="col-sm-4 col-form-label">provincia</label>
                                        <div class="col-sm-4 col-lg-8">
                                         <select id="provres" name="provres" class="form-control"readonly>
                      
                                        </select>
				                        </div>
				                    </div> 

                                    <div class="form-group row">
				                        <label for="luogores" class="col-sm-4 col-form-label">Comune</label>
                                        <div class="col-sm-4 col-lg-8">
                                         <input id="luogores"  class="form-control" value="<?=getComune($cli['luogores'])?>"readonly>
				                        </div>
				                    </div>

                                    
                                    <div class="form-group row">
				                        <label for="capres" class="col-sm-4 col-form-label">cap</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="capres" value="<?=$cli['capres']?>" readonly>
				                        </div>
				                    </div> 
                                </div>
                                <div class="card-header" style="font-size:large;">Contatti
                                </div> 
                                <div class="card-body">
                                    <div class="form-group row">
				                        <label for="mail1" class="col-sm-4 col-form-label">mail1</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="mail1" value="<?=$cli['mail1']?>" readonly>
				                        </div>
				                    </div> 

                                    <div class="form-group row">
				                        <label for="mail2" class="col-sm-4 col-form-label">mail2</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="mail2" value="<?=$cli['mail2']?>" readonly>
				                        </div>
				                    </div>    

                                    <div class="form-group row">
				                        <label for="tel1" class="col-sm-4 col-form-label">Telefono 1</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="tel1" value="<?=$cli['tel1']?>" readonly>
				                        </div>
				                    </div> 

                                    <div class="form-group row">
				                        <label for="tel2" class="col-sm-4 col-form-label">Telefono 2</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="tel2" value="<?=$cli['tel2']?>" readonly>
				                        </div>
				                    </div>

                                    <div class="form-group row">
				                        <label for="mobile1" class="col-sm-4 col-form-label">Mobile1</label>
				                         <div class="col-sm-4">
					                        <input type="text" class="form-control" id="mobile1" value="<?=$cli['mobile1']?>" readonly>
				                        </div>
				                    </div> 

                                    <div class="form-group row">
				                        <label for="mobile2" class="col-sm-4 col-form-label">Mobile2</label>
                                        <div class="col-sm-4 col-lg-8">
					                        <input type="text" class="form-control" id="mobile2" value="<?=$cli['mobile2']?>" readonly>
				                        </div>
				                    </div>  
                                </div>
                                
                            </div>
                        </div>
                    </div> <!--end row card body-->
                    <div class="row" id="dati_patente" style="display:<?=$cliente?'flex':'none'?>;">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" style="font-size:large;">Dati Patente
                                </div> 
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="numero_patente" class="col-sm-4 col-form-label">Numero Patente</label>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="text" class="form-control" id="numero_patente" value="<?=$patente['numero_patente']?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="data_rilascio" class="col-sm-4 col-form-label">Data Rilascio</label>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="date" class="form-control" id="data_rilascio" value="<?=$patente['data_rilascio']?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="data_scadenza" class="col-sm-4 col-form-label">Data scadenza</label>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="date" class="form-control" id="data_scadenza" value="<?=$patente['data_scadenza']?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ente_rilascio" class="col-sm-4 col-form-label">Ente Rilascio</label>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="text" class="form-control" id="ente_rilascio" value="<?=$patente['ente_rilascio']?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="tipo_patente" class="col-sm-4 col-form-label">Tipo Patente</label>
                                            <div class="col-sm-4 col-lg-8">
                                                <input type="text" class="form-control" id="tipo_patente" value="<?=$patente['tipo_patente']?>" >
                                            </div>
                                        </div>

                                        

                                    </div>    
                               
                            </div>
                        </div>
                    </div>
                   
                    
                    
                    
                    
                    <div class="row">     
                        <div class="col-lg-6 col-md-12">

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
                                        <?php
                                        if($tr['id_veicolo']){
                                            $motoSel = getMotoinfo($tr['id_veicolo']);
                                        ?>
                                        <option value="<?=$tr['id_veicolo']?> "><?=$motoSel['marca']?> <?=$motoSel['modello']?> <?=$motoSel['targa']?></option>
                                        <? } ?>
                                        <option value="">Seleziona un modello</option>
                                        <?php
                                            if($moto){
                                            foreach ($moto as $m){                              
                                                if($m['targa']!==$tr['id_veicolo'] ){
                                        ?>
                                    
                                        <option value="<?=$m['targa']?>"><?=$m['marca']?> <?=$m['modello']?> <?=$m['targa']?> </option>
                                        <?php }
                                            }
                                        } ?>
                                        </select>  
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-12  ">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">KM</label>
                                    <div class="col-sm-8">
                                    <input type="text" id="km_cons" name="km_cons" class="form-control" value="<?=$tr['km_cons']?$tr['km_cons']:0.0?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  ">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Data Test</label>
                                    <div class="col-sm-8">
                                    <input type="date" id="data_pren" name="data_pren" class="form-control" required="" value="<?=$tr['data_pren']?date("Y-m-d", strtotime($tr['data_pren'])):''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  ">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Ora Test</label>
                                    <div class="col-sm-8">
                                    <input type="time" id="ora_test" name="ora_test" required="" class="form-control" value="<?=$tr['data_pren']?date("H:i", strtotime($tr['data_pren'])):''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  ">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Durata</label>
                                    <div class="col-sm-8">
                                    <input type="number" step="5" id="durata_test" name="durata_test" class="form-control" value="<?=$tr['durata_test']?$tr['durata_test']:'20'?>"> Minuti
                                    </div>
                                </div>
                            </div>
                            
                        </div>			
                        
                            <div class="col-lg-6 col-md-12">
                                <div id="calendar"></div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        
                            <button type="button " onclick="return false;" class="btn btn-info  btn-block m-1" data-toggle="modal" data-target="#defaultsizemodal"><i class="fa fa-pencil-square-o"></i> Acquisizione Firma Digitale</button>
                    
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
                                                
                                        <div class="form-group row">
                                            			
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
                </div>
                <div class="card-footer text-center" >
                    <button type="submit" class="btn btn-primary " id="submitbutton" name="mode" value="Add">
                    <i class="fa fa-dot-circle-o"></i> <?=$tr['id']?'Aggiorna':'Inserisci'?> Prenotazione
                    </button>
                    <a class="btn btn-warning" onclick="history.back();return false;" style="color:white;"><i class="fa fa-ban"></i> Annulla</a>
                </div>	            
            </form>   
        </div>
    </div>
</div>    