<script src="js/codice.fiscale.var.js"></script>
<?php
//var_dump($action);

?>
<div class="row">
			<div class="col-12">
			
				<div class="card">
              <div class="card-header" style="background-image: url(images/fondo_2.jpg);box-shadow: inset 0px 0px 5px 0px #9d9d9d">
                <div class="row">
                  <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">Anagrafica Clienti </h3><?=$cli['id']?'Modifica Cliente':'Inserimento Nuovo Cliente'?></div>
                </div>
              </div>              
			

              

              
              <div class="card-body ">
              <form id="addform" action="controller/updateAnagr_cli.php" method="post">
              <input type="hidden" name="id" value ="<?=$cli['id']?>">
			  <?php if($action === 'upCliente'){?>
				<input type="hidden" name="action" value ="upCliente">
			  <? }else{?>
				<input type="hidden" name="action" value ="<?=$cli['id']?'storeCliente':'saveCliente'?>">
				<? } ?>
                <!--<input type="hidden" name="ambiente" value="<?=$user['ambiente']?>">
                <input type="hidden" name="menu" value="<?=$user['menu']?>">-->
                
                 <div class="col-12 col-lg-6 col-xl-6"> 
                  <div class="row form-group">
                    <div class="col col-md-12">
                      <h5><i class="fa fa-user"></i> Dati Anagrafici</h5><h5>
                    </h5></div>
                  </div>
                  </div>
                   
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Ragione sociale</label>
		                <div class="col-sm-8">
                      <input type="text" id="ragsociale" name="ragsociale" value="<?=$cli['ragsociale']?>" placeholder="Inserire Ragione Sociale" class="form-control">
                    </div>
                  </div>
 				</div>
 		
 				
               <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Cognome</label>
		                <div class="col-sm-8">
                      <input type="text" id="cognome" name="cognome" value="<?=$cli['cognome']?>" placeholder="Inserire Cognome" class="form-control">
                    </div>
                  </div>
 				</div>
 				
               <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Nome</label>
		                <div class="col-sm-8">
                      <input type="text" id="nome" name="nome" value="<?=$cli['nome']?>" placeholder="Inserire Nome" class="form-control">
                    </div>
                  </div>
 				</div>
 				
               <div class="col-12 col-lg-6 col-xl-6">
		            <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Prov di Nascita</label>
		                <div class="col-sm-8">
                            <select class="form-control" id="provnasc" name="provnasc" >
                                <optgroup>
                                   
                                </optgroup>
                            </select>
                        </div>
                    </div>
 				</div>
 				
				<div class="col-12 col-lg-6 col-xl-6">
					<div class="form-group row">
					<label class="col-sm-4 col-form-label">Luogo di Nascita</label>
						<div class="col-sm-8">
							<select class="form-control" name="luogonasc" id="luogonasc">
                               <optgroup></optgroup>
                            </select>
						</div>
					</div>
				</div>
 				
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Data di Nascita</label>
		                <div class="col-sm-8">
                             <input type="date" id="datanasc" name="datanasc" class="form-control" value="<?=$cli['datanasc']?>">
		                </div>
		              </div>
		          </div>
				<div class="col-12 col-lg-6 col-xl-6">
					<div class="form-group row">
					<label class="col-sm-4 col-form-label">Nazionalita</label>
						<div class="col-sm-8">
                      <input type="text" id="nazionalita" name="nazionalita" value="<?=$cli['nazionalita']?$cli['nazionalita']:'I'?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-xl-6">
					<div class="form-group row">
					<label class="col-sm-4 col-form-label">Sesso</label>
						<div class="col-sm-8">
                     
                        <select class="form-control" id="sesso" name="sesso" required>
                        <option value="">Seleziona</option>
                         <?php

                            if($cli['sesso']){?>
                             <option value="<?=$cli['sesso']?>" <?=$cli['sesso']?'selected':''?>> <?=$cli['sesso'] === 'M'?'Maschio':'Femmina'?> </option>


                         <?php   }else{ ?>

                                <option value="M">Maschio</option>
                                <option value="F">Femmina</option>

                         <?php       
                         }
                         
                         ?>



                        
                    </select>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-6 col-xl-6">
					<div class="form-group row">
					<label class="col-sm-4 col-form-label">Codice Fiscale</label>
						<div class="col-sm-4">
                      <input type="text" id="codfiscale" name="codfiscale" maxlength="16" class="form-control" value="<?=$cli['codfiscale']?>">
						</div>
						<div class="col-sm-4"><button class="btn btn-primary" id="cf"><i class="fa fa-id-card"></i> Calcolo codice</button>
						</div>
					</div>
				</div>
                <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Partita Iva</label>
		                <div class="col-sm-8">
                      <input type="text" id="partitaiva" name="partitaiva" value="<?=$cli['partitaiva']?$cli['partitaiva']:''?>" placeholder="Inserire Partita Iva" class="form-control">
                    </div>
                  </div>
 				</div>
                  <div class="col-12 col-lg-6 col-xl-6">
                  <div class="row form-group">
                    <div class="col col-md-12">
                      <h5><i class="fa fa-home"></i> Dati Residenza</h5><h5>
                    </h5></div>
                  </div>
		          </div>
		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Indirizzo</label>
		                <div class="col-sm-8">
                      <input type="text" id="indirizzores" name="indirizzores" value="<?=$cli['indirizzores']?>" placeholder="Inserire Indirizzo" class="form-control">
		                </div>
		              </div>
		          </div>
                  
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Provincia</label>
		                <div class="col-sm-8">
                      <select id="provres" name="provres" class="form-control">
                      
                      </select>
                      
                      </div>
		              </div>
		          </div>
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Comune</label>
		                <div class="col-sm-8">
                      <select id="luogores" name="luogores" class="form-control"></select>
                     
                      </div>
                      </div>
		          </div>
		          
                 
		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">CAP</label>
		                <div class="col-sm-8">
                      <input type="text" id="capres" name="capres" maxlength="5" value="<?=$cli['capres']?>" placeholder="Inserire CAP" class="form-control">
		                </div>
		              </div>
		          </div>
                   <div class="col-12 col-lg-6 col-xl-6">
                  <div class="row form-group">
                    <div class="col col-md-12">
                      <h5><i class="fa fa-tty"></i> Contatti</h5><h5>
                    </h5></div>
                  </div>
		          </div>
                              		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">eMail 1</label>
		                <div class="col-sm-8">
                      <input type="email" id="mail1" name="mail1" value="<?=$cli['mail1']?>"placeholder="Inserire eMail 1" class="form-control">
		                </div>
		              </div>
		          </div>
		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">eMail2</label>
		                <div class="col-sm-8">
                      <input type="email" id="mail2" name="mail2" value="<?=$cli['mail2']?>" placeholder="Inserire eMail 2" class="form-control">
		                </div>
		              </div>
		          </div>
		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Telefono 1</label>
		                <div class="col-sm-8">
                      <input type="text" id="tel1" name="tel1" maxlength="15" value="<?=$cli['tel1']?$cli['tel1']:''?>" placeholder="Inserire Telefono 1" class="form-control">
		                </div>
		              </div>
		          </div>
		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Telefono 2</label>
		                <div class="col-sm-8">
                      <input type="text" id="tel2" name="tel2" maxlength="15" value="<?=$cli['tel2']?$cli['tel2']:''?>" placeholder="Inserire Telefono 2" class="form-control">
		                </div>
		              </div>
		          </div>
		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Mobile 1</label>
		                <div class="col-sm-8">
                      <input type="text" id="mobile1" name="mobile1" maxlength="15" value="<?=$cli['mobile1']?$cli['mobile1']:''?>" placeholder="Inserire Mobile 1" class="form-control">
		                </div>
		              </div>
		          </div>
		          
                  <div class="col-12 col-lg-6 col-xl-6">
		              <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Mobile 2</label>
		                <div class="col-sm-8">
                      <input type="text" id="mobile2" name="mobile2" maxlength="15" value="<?=$cli['mobile2']?$cli['mobile2']:''?>" placeholder="Inserire Mobile 2" class="form-control">
		                </div>
		              </div>
		          </div>

              <div class="card-footer">
                <button type="submit" id="modbutton" style="display:none;" class="btn btn-primary " >
                <i class="fa fa-check-square-o"></i> <?=$cli['id']?'Aggiorna':'Inserisci'?></button>
                </button>
                <button  onclick="history.back();return false;" class="btn btn-danger">
                            <i class="fa fa-times"></i> Indietro</button>
                            
              </div>

             </form>
          </div>
       
      </div>
    </div>
</div>
