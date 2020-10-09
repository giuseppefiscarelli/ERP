<div class=" row "> 
    <div class="col-12 col-lg-4">
	    <div class="card">
        <img src="images/gallery/<?=$veicolo['id_veicolo']?>.png" class="card-img-top" alt="Card image cap"style="max-width: 500px;">
        <div class="card-body">
          <h4 class="card-title"><?=$veicolo['modello']?> <?=$veicolo['id_veicolo']?></h4>
          
        </div>
		  </div>
	  </div>
    <div class="col-12 col-lg-8">
	    <div class="card">
       
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">
              <div class="media align-items-center">
              <div class="media-body ml-3">
              <h6 class="mb-0">Targa</h6>
              </div>
              <div class="date" style="text-align: right;">
              <b><?=$veicolo['targa']?></b>
              </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media align-items-center">
              <div class="media-body ml-3">
              <h6 class="mb-0">KM</h6>
              </div>
              <div class="date">
              <b><?=$veicolo['km']?></b>
              </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media align-items-center">
              <div class="media-body ml-3">
              <h6 class="mb-0">Abilitazione</h6>
              </div>
              <div class="date">
              <input onchange="abilitazione(this,<?=$veicolo['id']?>);"type="checkbox" <?=$veicolo['stato'] =="N"?'':'checked' ?> data-size="small" class="js-switch" data-color="#04b962"  data-secondary-color="#f43643"/>

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
                if($veicolo['stato']=='D'){?>
              <span id="stato" class="badge badge-pill badge-success m-1">Disponibile</span>

              <?	}elseif($veicolo['stato']=='W'){?>

                <span id="stato" class="badge badge-pill badge-warning m-1">At Work</span>
              <?}elseif($veicolo['stato']=='N'){?>
                <span id="stato" class="badge badge-pill badge-danger m-1">Non Disponibile</span>
              <?}	?>
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
              <b>Numero <?=$veicolo['multicard']?><br>Pin <?=$veicolo['pin']?></b>
              </div>
              </div>
            </li>
            
            
          </ul>
          <hr>
                <a  data-toggle="modal" data-target="#formemodal" class="btn btn-success btn-sm text-white"><i class="fa fa-star mr-1"></i> Aggiorna dati Veicolo</a>
        </div>
				
			</div>
		</div>
</div>
                <div class="modal fade" id="formemodal" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><?=$veicolo['modello']?> <?=$veicolo['id_veicolo']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <img style="max-width: 460px;" id="old_foto"src="images/gallery/<?=$veicolo['id_veicolo']?>.png" class="img-fluid rounded shadow" alt="Card image cap">
                         
                        <form style="margin-top:30px;"enctype="multipart/form-data" id="addformcli" action="controller/updateAutoparco.php" method="post">
                            <input type="hidden" name="action" value="upVeicolo">
                            <input type="hidden" name="id" value="<?=$veicolo['id']?>">
                            <div class="form-group row">
                               <label for="input-1" class="col-sm-4 col-form-label">Aggiorna Foto</label>
                               <div class="col-sm-8">
                               <input type="file"  accept="image/png" capture id="foto" name="foto" class="" > 
                               </div>
                             </div>
                                  
                              <div class="form-group row">
                               <label for="input-1" class="col-sm-4 col-form-label">Numero Veicolo</label>
                               <div class="col-sm-3">
                               <input type="number" class="form-control"id="n_vei" name="id_veicolo"  value="<?=$veicolo['id_veicolo']?>" >
                               </div>
                             </div>
                             <div class="form-group row">
                               <label for="input-2" class="col-sm-4 col-form-label">Nome Modello</label>
                               <div class="col-sm-5">
                               <input type="text" onkeyup="this.value = this.value.substr(0, 1).toUpperCase()+this.value.substr(1).toLowerCase();"class="form-control" name="modello" value="<?=$veicolo['modello']?>">
                               </div>
                             </div>
                             <div class="form-group row">
                               <label for="input-3" class="col-sm-4 col-form-label">Targa</label>
                               <div class="col-sm-3">
                               <input type="text" onkeyup="this.value = this.value.toUpperCase();" maxlength="7" class="form-control" name="targa" value="<?=$veicolo['targa']?>">
                               </div>
                             </div>
                             <div class="form-group row">
                               <label for="input-3" class="col-sm-4 col-form-label">KM</label>
                               <div class="col-sm-3">
                               <input type="text" class="form-control" name="km" value="<?=$veicolo['km']?>">
                               </div>
                             </div>
                             
                            
                             <div class="form-group">
                              <button type="submit" class="btn btn-success px-5"><i class="fa fa-refresh"></i> Aggiorna</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="card-body"> 
          <ul class="nav nav-tabs nav-tabs-primary">
            <li class="nav-item ">
              <a class="nav-link " data-toggle="tab" href="#tabe-7"><i class="fa fa-list-ol"></i> <span class="hidden-xs">Equipaggiamento</span></a>
                
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#tabe-1"><i class="fa fa-bar-chart"></i> <span class="hidden-xs">Registro KM</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#tabe-6"><i class="fa fa-calendar"></i> <span class="hidden-xs">Prenotazioni</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabe-2"><i class="fa fa-car"></i> <span class="hidden-xs">Service</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabe-4"><i class="fa fa-clone"></i> <span class="hidden-xs">Documenti</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabe-5"><i class="fa fa-cogs"></i> <span class="hidden-xs">Gestione Alert / Scadenze</span></a>
            </li>
            
            
            
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="tabe-1" class="container tab-pane " style="max-width: -webkit-fill-available;">
              <div class="row">
                  <div class="col-lg-4 col-12">                                     
                      <div class="form-group row">
                          <label for="km_1" class="col-sm-4 col-form-label">Intervallo ricerca</label>
                          <div class="col-sm-8">
                          <select class="form-control" id="km_1">
                          <option>Seleziona intervallo</option>
                              <option value="A">Mese corrente</option>
                              <option value="B">Mese Precedente</option>
                              <option value="C">Anno corrente</option>
                              <option value="D">Anno precedente</option>
                              <option value="E">Ricerca personalizzata</option>
                              </select>
                          </div>
                      </div>   
                  </div>  
                  <div class="col-12 col-lg-4 col-xl-4">
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label"style="text-align: right;">Da</label>
                          <div class="col-sm-8">
                              <input type="date" disabled="disabled"class="form-control"  max="<?=date("Y-m-d")?>" value="">
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-lg-4 col-xl-4">
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label"style="text-align: right;">A</label>
                          <div class="col-sm-8">
                              <input type="date" disabled="disabled"class="form-control" max="<?=date("Y-m-d")?>" value="<?=date("Y-m-d")?>">
                          </div>
                      </div>
                  </div>     

                  <div class="col-lg-4 col-12">                                     
                      <div class="form-group row">
                          <label for="km_2" class="col-sm-4 col-form-label">Commessa</label>
                          <div class="col-sm-8">
                          <select class="form-control" id="km_2">
                          <option>Seleziona Commessa</option>
                              <option>1</option>
                              <option>2</option>
                              
                              </select>
                          </div>
                      </div>   
                  </div>    
                  <div class="col-lg-4 col-12">                                     
                      <div class="form-group row">
                          <label for="km_3" class="col-sm-4 col-form-label">Dipendente</label>
                          <div class="col-sm-8">
                          <select class="form-control" id="km_3">
                          <option>Seleziona Dipendente</option>
                              <option>1</option>
                              <option>2</option>
                              
                              </select>
                          </div>
                      </div>   
                  </div> 

                  
              </div>
              <div class="row">
                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Data</th>
                                  <th>KM</th>
                                  <th>Commessa</th>
                                  <th>Dipendente</th>    
                                  
                              </tr>
                          </thead>
                          <tbody>

                          <?php
                              if($registro){

                                  foreach($registro as $km){
                                      $uservei= getDip($km['user']);
                                      
                                      ?>
                          <tr>
                              <td>Partenza <b><?=$km['data_partenza']?></b><br><?=$km['data_arrivo']?'Arrivo <b>'.$km['data_arrivo'].'</b>':'<span class="badge badge-pill badge-warning m-1">At Work</span>'?></td>                               
                              <td><?=$km['km']?><br><?=$km['data_arrivo']?$km['km_arrivo']:'<span class="badge badge-pill badge-warning m-1">At Work</span>'?></td>
                              <td><?=$km['commessa']?></td>                               
                              <td><?=$uservei['nome']." ".$uservei['cognome']?></td>
                              

                          </tr>

                          <?        }
                              }
                              
                              ?>
                          
                          </tbody>
                      </table>
                  </div>        
              </div>
            </div>
            <div id="tabe-2" class="container tab-pane " style="max-width: -webkit-fill-available;">
              <img src="images/under.png" style="padding: 5px;height: inherit;max-width: -webkit-fill-available;">
            </div>
            
            <div id="tabe-4" class="container tab-pane" style="max-width: -webkit-fill-available;">
                                  <div class="row"> <!--row tab-->
                                      <div class="card-body"> <!--card-body-tab-->
                                          
                                          
                                          
                                              <!--Info Modal -->
                                              <button class="btn btn-outline-info  m-1" id="addAll" data-toggle="modal" data-target="#allemodal" ><i class="fa fa-plus"></i> Aggiungi Allegato</button>
                                                  <div class="modal fade" id="allemodal" style="display: none;" aria-hidden="true">
                                                      <div class="modal-dialog modal-lg modal-dialog-centered">
                                                          <div class="modal-content border-info">
                                                              <div class="modal-header bg-info">
                                                                  <h5 class="modal-title text-white">Nuovo Allegato Veicolo - <?=$veicolo['modello']." ".$veicolo['id_veicolo']?></h5>
                                                                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                                  </button>
                                                              </div>
                                                              <form style="margin-top:30px;"enctype="multipart/form-data" id="addalle" action="controller/updateAutoparco.php" method="post">
                                                                <input type="hidden" name="action" value="addAllegato">
                                                                <input type="hidden" name="id" value="<?=$veicolo['id_veicolo']?>">
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-group row">
                                                                        <label for="tipo_alle" class="col-sm-4 col-form-label">Tipologia Allegato</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control form-control-sm" name="tipo"id="tipo_alle" required>
                                                                                <option value="">Seleziona tipo Documento</option>
                                                                                <?php
                                                                                 $decod= decodSelect('allegati_veicolo','Tipologia Allegato');
                                                                                 $check = checkAllegati($veicolo['id_veicolo']);
                                                                                 $CC = false;
                                                                                 $CP = false;
                                                                                 foreach($check as $ck){
                                                                                  if($ck['tipo']=='CC'){
                                                                                    $CC = true;
                                                                                  }
                                                                                  if($ck['tipo']=='CP'){
                                                                                    $CP = true;
                                                                                  }

                                                                                 }
                                                                                 //var_dump($CC);
                                                                                 //var_dump($CP);

                                                                                 foreach($decod as $dec){?>
                                                                                  <option value="<?=$dec['valore']?>" <?=$dec['valore']=='CC'&&$CC?'disabled':''?><?=$dec['valore']=='CP'&&$CP?'disabled':''?>><?=$dec['descrizione']?> <?=$dec['valore']=='CC'&&$CC?'- già presente':''?><?=$dec['valore']=='CP'&&$CP?'- già presente':''?>
                                                                                                                     </option>
                                                                                <?}?>
                                                                               
                                                                                

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row" id="scad" style="display:none;" >
                                                                        <label for="up_file_alle2" class="col-sm-4 col-form-label">Scadenza Revisione</label>
                                                                        <div class="col-sm-4">
                                                                        <input type="date" class="form-control" name="scadrev" id="scadrev" min="<?=date("Y-m-d")?>">
                                                                        </div>   
                                                                    </div>
                                                                    <div class="form-group row" id="t_file" style="display:none;">
                                                                        <label for="tipo_file" class="col-sm-4 col-form-label">Tipologia File</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control form-control-sm" name="tipo_file"id="tipo_file" required>
                                                                                <option value="" >Seleziona tipo File</option>
                                                                                <option value="IMG">Immagine Singola</option>
                                                                                <option value="IMM">Immagine Fronte/Retro</option>
                                                                                <option value="PDS">PDF Singolo Fronte/Retro</option>
                                                                                <option value="PDM">PDF Multiple (Fronte/retro separate)</option>
                                                                                
                                                                                

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row" id="f_alle1" style="display:none;">
                                                                        <label for="file_alle1" class="col-sm-4 col-form-label">Fronte</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="file" class="form-control-file" name="file_alle1"id="file_alle1">
                                                                        </div>   
                                                                    
                                                                    </div>
                                                                    <div class="form-group row" id="f_alle2" style="display:none;">
                                                                        <label for="file_alle2" class="col-sm-4 col-form-label">Retro</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="file" class="form-control-file" name="file_alle2"id="file_alle2" >
                                                                        </div>   
                                                                    </div>

                                                                     <div class="form-group row" id="row_service" style="display:none;">
                                                                        <label for="tipo_file" class="col-sm-4 col-form-label">Tipologia Service</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-control form-control-sm" name="tipo_service"id="tipo_service" required>
                                                                                <option value="" >Seleziona tipo Sevice</option>
                                                                                <option value="MO">Manutenzione Ordinaria(Tagliando/Tipo Pneumatici)</option>
                                                                                <option value="MS">Manutenzione Straordinaria</option>
                                                                                
                                                                                
                                                                                

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                        
                                                                    <div class="form-group row" id="row_alert" style="display:none;" >
                                                                      <label for="small-input" class="col-sm-4 col-form-label">Alert data/km</label>
                                                                      <div class="col-md-3">
                                                                        <div class="icheck-material-success">
                                                                         <input type="checkbox" id="ds_al_en" name="alert_ab" value="S" >
                                                                         <label for="ds_al_en">Inserisci</label>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                   
                                                                        <div class="form-group row"  id="row_km_ins_alle" style="display:none;">
                                                                                <label for="km_ins" class="col-sm-4 col-form-label">KM inserimento </label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="number" class="form-control" name="km_ins" id="km_ins_alle"value="<?=$veicolo['km']?>" min="<?=$veicolo['km']?>" required>
                                                                                </div>   
                                                                          
                                                                        </div>
                                                                        <div class="form-group row" id="row_intervallo_alle" style="display:none;">
                                                                                <label for="intervallo" class="col-sm-4 col-form-label">Intervallo KM </label>
                                                                                <div class="col-sm-4">
                                                                                  <select class="form-control" name="intervallo" id="intervallo_alle" required>
                                                                                  <option>Seleziona intervallo</option>
                                                                                  <option value="5000">5.000</option>
                                                                                  <option value="10000">10.000</option>
                                                                                  <option value="15000">15.000</option>
                                                                                  <option value="20000">20.000</option>
                                                                                  <option value="25000">25.000</option>
                                                                                  <option value="30000">30.000</option>

                                                                                  </select>
                                                                                </div>   
                                                                          
                                                                        </div>
                                                                        <div class="form-group row"id="row_km_scad_alle"  style="display:none;">
                                                                                <label for="km_scad" class="col-sm-4 col-form-label">KM scadenza </label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="number" class="form-control" name="km_scad"  id="km_scad_alle"value="" min="<?=$veicolo['km']?>" readonly>
                                                                                </div>   
                                                                          
                                                                        </div> 

                                                                        <div class="form-group row"id="row_km_alert_alle" style="display:none;">
                                                                                <label for="data_scad" class="col-sm-4 col-form-label">KM Alert <br><small>default -1000</small> </label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="number" class="form-control" name="km_alert"  id="km_alert_alle"value="" min="<?=$veicolo['km']?>" >
                                                                                </div>   
                                                                          
                                                                        </div> 

                                                                        <div class="form-group row"  id="row_data_scad_alle"style="display:none;">
                                                                                <label for="data_scad" class="col-sm-4 col-form-label">Data Scadenza </label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="date" class="form-control" name="data_scad" id="add_data_scad_alle" value="<?=date("Y-m-d")?>" min="<?=date("Y-m-d")?>" >
                                                                                </div>   
                                                                          
                                                                        </div>

                                                                        <div class="form-group row" id="row_data_alert_alle" style="display:none;">
                                                                                <label for="data_alert" class="col-sm-4 col-form-label">Data Alert</label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="date" class="form-control" name="data_alert" id="add_data_alert_alle" value="" min="<?=date("Y-m-d")?>" >
                                                                                </div>   
                                                                            
                                                                        </div>
                                                                    
                                                                  

                                                                    
                                                                    <div class="form-group row" id="des_alle" >
                                                                        <label for="data_alle" class="col-sm-4 col-form-label">Descrizione</label>
                                                                        <div class="col-sm-8">
                                                                            <input  type="text" name="descrizione"id="descrizione_alle" class="form-control ">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                                    <button type="submit"  class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva</button>
                                                                </div>
                                                              </form>  
                                                          </div>
                                                      </div>
                                                  </div><!--End Modal -->
                                          
                                      </div>  
                                  </div> 
                                  <div class="row">
                                      <div class="card-body">
                                          <div class="table-responsive col-8">
                                              <table class="table table-sm" id="alle_table" >
                                                      <thead>
                                                          <tr>								              
                                                                                            
                                                              <th>Data Caricamento</th>
                                                              <th>Tipo</th>
                                                              <th>Descrizione</th>
                                                              <th>Azioni</th>	
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      <?php
                                                          if($allegati){

                                                            foreach($allegati as $alle){
                                                        
                                                              $decod= decodView('allegati_veicolo',$alle['tipo']);
                                                              $user =getNome($alle['user_ins']);
                                                              //var_dump($decod);
                                                              
                                                                
                                                              
                                                              ?>
                                                          <tr>
                                                              <td><?=date("d/m/Y H:i",strtotime($alle['data_ins']))?><br><?= $user['nome']." ",$user['cognome']?></td>
                                                              <td><?=$decod?></td>
                                                              <td><?=$alle['descrizione']?></td>
                                                              <td><?php
                                                                if($alle['tipo_file']=='IMG'||$alle['tipo_file']=='IMM'){?>
                                                                  <button class="btn btn-success m-1" title="Visualizza documento" data-toggle="modal" data-target="#allemodal_<?=$alle['id']?>"><i class="fa fa-file"></i></button>
                                                                  <button title="Download PDF"onclick="prtAll(<?=$alle['id']?>);"type="button" class="btn btn-primary m-1"> <i class="fa fa-file-pdf-o"></i> </button>
                                                                  <a  onclick="return confirm('Vuoi Eliminare L\'allegato?')" href="<?=$deleteUrl?>?idAll=<?=$alle['id']?>&action=delAllegato&id=<?=$veicolo['id_veicolo']?>&tab=4" title="Elimina Documento"type="button" class="btn btn-danger m-1"> <i class="fa fa-trash-o"></i> </a>

                                                                  <div class="modal fade" id="allemodal_<?=$alle['id']?>" aria-hidden="true" style="display: none;">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                      <div class="modal-content">
                                                                        <div class="modal-header">
                                                                          <h5 class="modal-title"><?=$decod?> - <?=$veicolo['modello']?> <?=$veicolo['id_veicolo']?></h5>
                                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                          </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                          <img src="docs/veicoli/allegati/<?=$alle['nome_file1']?>" class="img-fluid rounded shadow" alt="Card image cap">
                                                                          <?php
                                                                           if($alle['nome_file2']){?>
                                                                           <br>
                                                                          <img src="docs/veicoli/allegati/<?=$alle['nome_file2']?>" class="img-fluid rounded shadow" alt="Card image cap">
                                                                           <?}?>    
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                                                          <button type="button" onclick="prtAll(<?=$alle['id']?>);"class="btn btn-success" ><i class="fa fa-check-square-o"></i> Download pdf</button>
                                                                          <button type="button" onclick="window.open('docs/veicoli/allegati/<?=$alle['nome_file1']?>');" class="btn btn-info"><i class="fa fa-check-square-o"></i>Open New window</button>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                               <? }else{
                                                                 $file_name = explode(".",$alle['nome_file1'],2);
                                                                 if($alle['tipo']!=='CC'&&$alle['tipo']!=='CP'){
                                                                   $dat = date("d_m_Y",strtotime($alle['data_ins']));
                                                                   $down_name = $alle['id_veicolo']."_".$decod."_".$dat."_all.".$file_name[1];
                                                                 }else{
                                                                    $down_name = $alle['id_veicolo']."_".$decod."_all.".$file_name[1];
                                                                 }
                                                                 //var_dump($down_name);?>
                                                                 <button class="btn btn-success m-1" onclick="showmodal();" title="Visualizza documento" data-toggle="modal" data-target="#allemodal_<?=$alle['id']?>"><i class="fa fa-file"></i></button>
                                                                 <a href="docs/veicoli/allegati/<?=$alle['nome_file1']?>" title="Download PDF" download="<?=$down_name?>" filename="<?=$down_name?>"type="button" class="btn btn-primary m-1"> <i class="fa fa-file-pdf-o"></i> </a>
                                                                 <a  onclick="return confirm('Vuoi Eliminare L\'allegato?')" href="<?=$deleteUrl?>?idAll=<?=$alle['id']?>&action=delAllegato&id=<?=$veicolo['id_veicolo']?>&tab=4" title="elimina Documento"type="button" class="btn btn-danger m-1"> <i class="fa fa-trash-o"></i> </a>
                                                                 <div class="modal fade" id="allemodal_<?=$alle['id']?>" aria-hidden="true" style="display: none;">
                                                                   <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                     <div class="modal-content" style="height:800px;">
                                                                       <div class="modal-header">
                                                                         <h5 class="modal-title"><?=$decod?> - <?=$veicolo['modello']?> <?=$veicolo['id_veicolo']?></h5>
                                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                           <span aria-hidden="true">×</span>
                                                                         </button>
                                                                       </div>
                                                                       <div class="modal-body">
                                                                         <object type="application/pdf" data="docs/veicoli/allegati/<?=$alle['nome_file1']?>#toolbar=0" style="width:100%;height:100%"  download="<?=$down_name?>">alt : <a href="test.pdf">test.pdf</a></object>
                                                                       </div>
                                                                       <div class="modal-footer">
                                                                         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                                                         <a href="docs/veicoli/allegati/<?=$alle['nome_file1']?>" title="Download PDF" download="<?=$down_name?>" type="button" class="btn btn-primary m-1"> <i class="fa fa-file-pdf-o"></i> Download pdf</a>

                                                                         <button type="button" onclick="window.open('docs/veicoli/allegati/<?=$alle['nome_file1']?>');" class="btn btn-info"><i class="fa fa-check-square-o"></i>Open New window</button>
                                                                       </div>
                                                                     </div>
                                                                   </div>
                                                                 </div>



                                                               <?}
                                                                  if($alle['tipo']=='CC'||$alle['tipo']=='CP'){?>
                                                                  <button class="btn btn-warning m-1" title="Aggiorna documento" data-toggle="modal" data-target="#upmodal_<?=$alle['id']?>"><i class="fa fa-refresh"></i></button>
                                                                  <div class="modal fade" id="upmodal_<?=$alle['id']?>" style="display: none;" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                        <div class="modal-content border-warning">
                                                                            <div class="modal-header bg-warning">
                                                                                <h5 class="modal-title text-white">Aggiornamento Allegato Veicolo - <?=$veicolo['modello']." ".$veicolo['id_veicolo']?></h5>
                                                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <form style="margin-top:30px;"enctype="multipart/form-data" id="upalle" action="controller/updateAutoparco.php" method="post">
                                                                              <input type="hidden" name="action" value="upAllegato">
                                                                              <input type="hidden" name="id" value="<?=$veicolo['id_veicolo']?>">
                                                                              <input type="hidden" name="idAlle" value="<?=$alle['id']?>">
                                                                              

                                                                              <div class="modal-body">
                                                                                  
                                                                                  <div class="form-group row">
                                                                                      <label for="up_tipo_alle" class="col-sm-4 col-form-label">Tipologia Allegato</label>
                                                                                      <div class="col-sm-8">
                                                                                          <select class="form-control form-control-sm" name="up_tipo"id="up_tipo_alle" required>
                                                                                              <option value="">Seleziona tipo Documento</option>
                                                                                              <?php
                                                                                              $decod= decodSelect('allegati_veicolo','Tipologia Allegato');
                                                                                              

                                                                                              foreach($decod as $dec){?>
                                                                                                <option value="<?=$dec['valore']?>" <?=$dec['valore']==$alle['tipo']?'selected':''?>><?=$dec['descrizione']?>
                                                                                                                                  </option>
                                                                                              <?}?>
                                                                                            
                                                                                              

                                                                                          </select>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="form-group row" id="up_f_scadrev" style="display:<?=$alle['tipo']=='CC'?'':'none'?>" >
                                                                                      <label for="up_file_alle2" class="col-sm-4 col-form-label">Scadenza Revisione</label>
                                                                                      <div class="col-sm-4">
                                                                                      <?php $selscad = getScadenza($veicolo['id_veicolo'],'REV');
                                                                                    
                                                                                      ?>
                                                                                      <input type="hidden" name="idScad" value="<?=$selscad['id']?>">
                                                                                      <input type="date" class="form-control" name="up_scadrev" value="<?=$selscad['data_scad']?$selscad['data_scad']:''?>" min="<?=date("Y-m-d")?>" <?=$alle['tipo']=='CC'?'required':''?>>
                                                                                      </div>   
                                                                                  </div>
                                                                                  <div class="form-group row" id="up_t_file_<?=$alle['id']?>" >
                                                                                      <label for="up_tipo_file" class="col-sm-4 col-form-label">Tipologia File</label>
                                                                                      <div class="col-sm-8">
                                                                                          <select class="form-control form-control-sm" name="up_tipo_file"id="up_tipo_file_<?=$alle['id']?>" required>
                                                                                              <option value="" >Seleziona tipo File</option>
                                                                                              <option value="IMG">Immagine Singola</option>
                                                                                              <option value="IMM">Immagine Fronte/Retro</option>
                                                                                              <option value="PDS">PDF Singolo Fronte/Retro</option>
                                                                                              <option value="PDM">PDF Multiple (Fronte/retro separate)</option>
                                                                                              
                                                                                              

                                                                                          </select>
                                                                                      </div>
                                                                                  </div>
                                                                                  
                                                                                  <div class="form-group row" id="up_f_alle1_<?=$alle['id']?>" style="display:none;">
                                                                                      <label for="up_file_alle1" class="col-sm-4 col-form-label">Fronte</label>
                                                                                      <div class="col-sm-8">
                                                                                          <input type="file" class="form-control-file" name="up_file_alle1"id="up_file_alle1_<?=$alle['id']?>">
                                                                                      </div>   
                                                                                  
                                                                                  </div>
                                                                                  <div class="form-group row" id="up_f_alle2_<?=$alle['id']?>" style="display:none;">
                                                                                      <label for="up_file_alle2" class="col-sm-4 col-form-label">Retro</label>
                                                                                      <div class="col-sm-8">
                                                                                          <input type="file" class="form-control-file" name="up_file_alle2"id="up_file_alle2_<?=$alle['id']?>" >
                                                                                      </div>   
                                                                                  </div> 
                                                                                  <div class="form-group row" id="up_f_alle2_<?=$alle['id']?>" style="display:none;">
                                                                                      <label for="up_file_alle2" class="col-sm-4 col-form-label">Retro</label>
                                                                                      <div class="col-sm-8">
                                                                                          <input type="file" class="form-control-file" name="up_file_alle2"id="up_file_alle2_<?=$alle['id']?>" >
                                                                                      </div>   
                                                                                  </div>    
                                                                                  
                                                                                
                                                                                

                                                                                  
                                                                                  <div class="form-group row" id="up_des_alle" >
                                                                                      <label for="up_des_alle" class="col-sm-4 col-form-label">Descrizione</label>
                                                                                      <div class="col-sm-8">
                                                                                          <input  type="text" name="up_descrizione"id="up_descrizione_alle" class="form-control ">
                                                                                      </div>
                                                                                  </div>

                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                                                  <button type="submit"  class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva</button>
                                                                              </div>
                                                                            </form>  
                                                                        </div>
                                                                    </div>
                                                                  </div><!--End Modal -->
                                                                  <?}
                                                              ?></td>
                                                          </tr>  

                                                          <?  }
                                                          }
                                                      ?>
                                                          
                                                  </tbody>
                                                  
                                              </table>
                                          </div>      
                                      </div>
                                  
                                  </div>  
            </div>    
            <div id="tabe-5" class="container tab-pane " style="max-width: -webkit-fill-available;">
                     
              <?php
                $scadenze = getScadenze($veicolo['id_veicolo']);
                //var_dump($scadenze);
              ?>
               <div class="row"> <!--row tab-->
                                      <div class="card-body"> <!--card-body-tab-->
                                          
                                          
                                          
                                              <!--Info Modal -->
                                              <button class="btn btn-outline-info  m-1" id="addAll" data-toggle="modal" data-target="#scadmodal" ><i class="fa fa-plus"></i> Aggiungi Scadenza</button>
                                                <div class="modal fade" id="scadmodal" aria-hidden="true" style="display: none;">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-info">
                                                      <div class="modal-header bg-info">
                                                        <h5 class="modal-title text-white">Nuova Scadenza - <?=$veicolo['modello']." ".$veicolo['id_veicolo']?></h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">×</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form style="margin-top:30px;" enctype="multipart/form-data" id="addscad" action="controller/updateAutoparco.php" method="post">
                                                          <input type="hidden" name="action" value="addScadenza">
                                                          <input type="hidden" name="id" value="<?=$veicolo['id_veicolo']?>">
                                                          

                                                          <div class="modal-body">

                                                                      <div class="form-group row">
                                                                        <label for="basic-select" class="col-sm-4 col-form-label">Tipo Scadenza</label>
                                                                        <div class="col-sm-8">
                                                                        <select class="form-control " id="t_scad" name="t_scad">
                                                                            <option>Seleziona Tipo Scadenza</option>
                                                                            <?php
                                                                                $decod= decodSelect('scadenze_veicolo','Tipologia Scadenza');
                                                                                foreach($decod as $dec){?>
                                                                                <option value="<?=$dec['valore']?>"><?=$dec['descrizione']?></option>

                                                                                <?}
                                                                            ?>
                                                                          </select>
                                                                        </div>
                                                                      </div>
                                                                      <div class="form-group row"  id="row_km_ins" style="display:none;">
                                                                                <label for="km_ins" class="col-sm-4 col-form-label">KM inserimento </label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="number" class="form-control" name="km_ins" id="km_ins"value="<?=$veicolo['km']?>" min="<?=$veicolo['km']?>" required>
                                                                                </div>   
                                                                          
                                                                        </div>
                                                                        <div class="form-group row" id="row_intervallo" style="display:none;">
                                                                                <label for="intervallo" class="col-sm-4 col-form-label">Intervallo KM </label>
                                                                                <div class="col-sm-6">
                                                                                  <select class="form-control" name="intervallo" id="intervallo" required>
                                                                                  <option>Seleziona intervallo</option>
                                                                                  <option value="5000">5.000</option>
                                                                                  <option value="10000">10.000</option>
                                                                                  <option value="15000">15.000</option>
                                                                                  <option value="20000">20.000</option>
                                                                                  <option value="25000">25.000</option>
                                                                                  <option value="30000">30.000</option>

                                                                                  </select>
                                                                                </div>   
                                                                          
                                                                        </div>
                                                                        <div class="form-group row"id="row_km_scad"  style="display:none;">
                                                                                <label for="km_scad" class="col-sm-4 col-form-label">KM scadenza </label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="number" class="form-control" name="km_scad"  id="km_scad"value="" min="<?=$veicolo['km']?>" required>
                                                                                </div>   
                                                                          
                                                                        </div> 

                                                                        <div class="form-group row"id="row_km_alert" style="display:none;">
                                                                                <label for="data_scad" class="col-sm-4 col-form-label">KM Alert <br><small>default -1000</small> </label>
                                                                                <div class="col-sm-4">
                                                                                  <input type="number" class="form-control" name="km_alert"  id="km_alert"value="" min="<?=$veicolo['km']?>" required>
                                                                                </div>   
                                                                          
                                                                        </div> 

                                                                        <div class="form-group row"  id="row_data_scad"style="display:none;">
                                                                                <label for="data_scad" class="col-sm-4 col-form-label">Data Scadenza </label>
                                                                                <div class="col-sm-6">
                                                                                  <input type="date" class="form-control" name="data_scad" id="add_data_scad" value="<?=date("Y-m-d")?>" min="<?=date("Y-m-d")?>" required>
                                                                                </div>   
                                                                          
                                                                        </div>

                                                                        <div class="form-group row" id="row_data_alert" style="display:none;">
                                                                                <label for="data_alert" class="col-sm-4 col-form-label">Data Alert</label>
                                                                                <div class="col-sm-6">
                                                                                  <input type="date" class="form-control" name="data_alert" id="add_data_alert" value="" min="<?=date("Y-m-d")?>" required>
                                                                                </div>   
                                                                            
                                                                        </div>
                                                          </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva Scadenza</button>
                                                      </div>
                                                        </form>  
                                                    </div>
                                                  </div>
                                                </div>
                                          
                                      </div>  
                                  </div> 
                  <div class="row">
                                      <div class="card-body">
                                          <div class="table-responsive col-8">
                                              <table class="table table-sm" >
                                                      <thead>
                                                          <tr>								              
                                                                                            
                                                              <th>Data Caricamento</th>
                                                              <th>Tipo</th>
                                                              <th>Scadenza</th>
                                                              <th>Alert</th>
                                                              <th>Azioni</th>	
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                            if($scadenze){
                                                              foreach ($scadenze as $s) {
                                                                $nome = getNome($s['user_ins']);
                                                                $tipo_scad = decodView('scadenze_veicolo',$s['tipo']);
                                                                  $data1 = date_create($s['data_scad']);
                                                                  $data2 = date_create(date("Y-m-d"));
                                                                  $interval = date_diff($data2,$data1);
                                                                 
                                                                  $dayscad= $interval->format('%a');
                                                                

                                                                ?>
                                                               <tr>
                                                                  <td><?=date("d/m/Y H:i",strtotime($s['data_ins']))?><br><?=$nome['nome']." ".$nome['cognome']?></td>
                                                                  <td><?=$tipo_scad?></td>
                                                                  <td><?=date("d/m/Y",strtotime($s['data_scad']))?><br>tra <?=$dayscad?> giorni</td>
                                                                  <td><?=date("d/m/Y",strtotime($s['data_alert']))?></td>
                                                                  <td> <a  onclick="return confirm('Vuoi Eliminare L\'allegato?')" href="<?=$deleteUrl?>?idScad=<?=$s['id']?>&action=delScadenza&id=<?=$veicolo['id_veicolo']?>" title="Elimina Scadenza"type="button" class="btn btn-danger m-1"> <i class="fa fa-trash-o"></i> </a>
                                                                       <button class="btn btn-warning m-1" title="Aggiorna Scadenza" data-toggle="modal" data-target="#upscmodal_<?=$s['id']?>"><i class="fa fa-refresh"></i></button>
                                                                        <div class="modal fade" id="upscmodal_<?=$s['id']?>" aria-hidden="true" style="display: none;">
                                                                          <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content border-warning">
                                                                              <div class="modal-header bg-warning">
                                                                                <h5 class="modal-title text-white">Aggiornamento <?=$tipo_scad?></h5>
                                                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                                  <span aria-hidden="true">×</span>
                                                                                </button>
                                                                              </div>
                                                                              <form style="margin-top:30px;" enctype="multipart/form-data" id="upalle" action="controller/updateAutoparco.php" method="post">
                                                                                <input type="hidden" name="action" value="upScadenza">
                                                                                <input type="hidden" name="id" value="<?=$veicolo['id_veicolo']?>">
                                                                                <input type="hidden" name="idScad" value="<?=$s['id']?>">
                                                                                <input type="hidden" name="tiposcad" value="<?=$s['tipo']?>">

                                                                                <div class="modal-body">
                                                                                              <div class="form-group row"  >
                                                                                                      <label for="data_scad" class="col-sm-4 col-form-label">Data Scadenza </label>
                                                                                                      <div class="col-sm-6">
                                                                                                        <input type="date" class="form-control" name="data_scad" value="<?=$s['data_scad']?>" min="<?=date("Y-m-d")?>" required>
                                                                                                      </div>   
                                                                                                
                                                                                              </div>
                                                                                              <div class="form-group row"  >
                                                                                                      <label for="data_alert" class="col-sm-4 col-form-label">Data Alert</label>
                                                                                                      <div class="col-sm-6">
                                                                                                        <input type="date" class="form-control" name="data_alert" value="<?=$s['data_alert']?>" min="<?=date("Y-m-d")?>" required>
                                                                                                      </div>   
                                                                                                  
                                                                                              </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                                                                  <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva Modifiche</button>
                                                                                </div>
                                                                              </form>  
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                  </td>
                                                               </tr>
                                                             <? }

                                                            }else{?>
                                                              <tr><td colspan="5">Non sono Presenti Scadenze</td></tr>
                                                            <?}
                                                          
                                                          
                                                          ?>
                                                      </tbody>
                                              </table>
                                          </div>
                                      </div>
                  </div> 
            </div>         
            <div id="tabe-6" class="container tab-pane " style="max-width: -webkit-fill-available;">
              <img src="images/under.png" style="padding: 5px;height: inherit;max-width: -webkit-fill-available;">                  </div>
            <div id="tabe-7" class="container tab-pane " style="max-width: -webkit-fill-available;">
              <div class="row">   
                <div class="col-12 col-lg-4">
                    
                        
                      <div class="card-body">
                        <h4 class="card-title">Dotazioni</h4>
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                            Tipo Pneumatici <?php
                                if($veicolo['tipo_pneumatici']){
                                  if($veicolo['tipo_pneumatici']=='E'){?>
                            <span name="tipo_pneumatici"class="badge badge-primary badge-pill ">Estivi</span>
                                  <?}elseif($veicolo['tipo_pneumatici']=='I'){?>
                            <span name="tipo_pneumatici"class="badge badge-secondary badge-pill">Invernali</span>
                                  <? }elseif($veicolo['tipo_pneumatici']=='Q'){?>
                            <span name="tipo_pneumatici"class="badge badge-secondary badge-pill">4 Stagioni</span>


                                <?}
                              }else{?>
                            <span name="tipo_pneumatici"class="badge badge-danger badge-pill">Info non disponibile</span>

                                <?}
                                
                            ?>
                            
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Portapacchi
                            <?php
                            if($veicolo['portapacchi']){
                                  if($veicolo['portapacchi']=='P'){?>
                            <span name="portapacchi" class="badge badge-success badge-pill">Presente</span>
                                  <?}elseif($veicolo['portapacchi']=='N'){?>
                            <span name="portapacchi" class="badge badge-warning badge-pill">Non Presente</span>
                              <?}
                              }else{?>
                            <span name="portapacchi" class="badge badge-danger badge-pill">Info non disponibile</span>

                            <?}?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Catene
                            <?php
                            if($veicolo['catene']){
                                  if($veicolo['catene']=='P'){?>
                            <span name="catene" class="badge badge-success badge-pill">Presente</span>
                                  <?}elseif($veicolo['catene']=='N'){?>
                            <span name="catene"class="badge badge-warning badge-pill">Non Presente</span>
                              <?}
                              }else{?>
                            <span name="catene" class="badge badge-danger badge-pill">Info non disponibile</span>

                            <?}?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Gilet alta Visibilità
                            <?php
                            if($veicolo['gilet']){
                                  if($veicolo['gilet']=='P'){?>
                            <span name="gilet" class="badge badge-success badge-pill">Presente</span>
                                  <?}elseif($veicolo['gilet']=='N'){?>
                            <span name="gilet" class="badge badge-warning badge-pill">Non Presente</span>
                              <?}
                              }else{?>
                            <span name="gilet" class="badge badge-danger badge-pill">Info non disponibile</span>

                            <?}?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kit Pronto Soccorso
                            <?php
                            if($veicolo['kit_soccorso']){
                                  if($veicolo['kit_soccorso']=='P'){?>
                            <span name="kit_soccorso" class="badge badge-success badge-pill">Presente</span>
                                  <?}elseif($veicolo['kit_soccorso']=='N'){?>
                            <span name="kit_soccorso" class="badge badge-warning badge-pill">Non Presente</span>
                              <?}
                              }else{?>
                            <span name="kit_soccorso" class="badge badge-danger badge-pill">Info non disponibile</span>

                            <?}?>
                            </li>
                            
                          </ul>
                          <hr>
                          <button class="btn btn-outline-success btn-block m-1" data-toggle="modal" data-target="#dotmodal">Aggiorna Dotazioni</button>
                      </div>
                      <div class="modal fade" id="dotmodal" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content border-success">
                            <div class="modal-header bg-success">
                              <h5 class="modal-title text-white">Dotazioni <?=$veicolo['modello']?> <?=$veicolo['id_veicolo']?></h5>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <form  id="addform" action="controller/updateAutoparco.php" method="post">
                              <input type="hidden" name="id" value ="<?=$veicolo['id']?>">
                              <input type="hidden" name="id_veicolo" value="<?=$veicolo['id_veicolo']?>">
                              <input type="hidden" name="action" value="updateDot">
                              <input type="hidden" name="tab" value="7"> 

                              <div class="modal-body">
                                <div class="form-group row">
                                  <label for="basic-select" class="col-sm-6 col-form-label">Tipo Pneumatici</label>
                                  <div class="col-sm-6">
                                  <select class="form-control form-control-sm" name="tipo_pneumatici">
                                      <option value="E" <?=$veicolo['tipo_pneumatici']=='E'?'selected':''?>>Estivi</option>
                                      <option value="I" <?=$veicolo['tipo_pneumatici']=='I'?'selected':''?>>Invernali</option>
                                      <option value="Q" <?=$veicolo['tipo_pneumatici']=='Q'?'selected':''?>>4 Stagioni</option>
                                      <?=!$veicolo['tipo_pneumatici']?'<option value="" selected disabled>Dati non disponibili</option>':''?>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="basic-select" class="col-sm-6 col-form-label">Portapacchi</label>
                                  <div class="col-sm-6">
                                  <select class="form-control form-control-sm" name="portapacchi">
                                      <option value="P" <?=$veicolo['portapacchi']=='P'?'selected':''?>>Presente</option>
                                      <option value="N" <?=$veicolo['portapacchi']=='N'?'selected':''?>>Non Presente</option>
                                      <?=!$veicolo['portapacchi']?'<option value="" selected disabled>Dati non disponibili</option>':''?>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="basic-select" class="col-sm-6 col-form-label">Catene</label>
                                  <div class="col-sm-6">
                                  <select class="form-control form-control-sm" name="catene">
                                      <option value="P" <?=$veicolo['catene']=='P'?'selected':''?>>Presente</option>
                                      <option value="N" <?=$veicolo['catene']=='N'?'selected':''?>>Non Presente</option>
                                      <?=!$veicolo['catene']?'<option value="" selected disabled>Dati non disponibili</option>':''?>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="basic-select" class="col-sm-6 col-form-label">Gilet alta Visibilità</label>
                                  <div class="col-sm-6">
                                  <select class="form-control form-control-sm" name="gilet">
                                      <option value="P" <?=$veicolo['gilet']=='P'?'selected':''?>>Presente</option>
                                      <option value="N" <?=$veicolo['gilet']=='N'?'selected':''?>>Non Presente</option>
                                      <?=!$veicolo['gilet']?'<option value="" selected disabled>Dati non disponibili</option>':''?>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="basic-select" class="col-sm-6 col-form-label">Kit Pronto Soccorso</label>
                                  <div class="col-sm-6">
                                  <select class="form-control form-control-sm" name="kit_soccorso">
                                      <option value="P" <?=$veicolo['kit_soccorso']=='P'?'selected':''?>>Presente</option>
                                      <option value="N" <?=$veicolo['kit_soccorso']=='N'?'selected':''?>>Non Presente</option>
                                      <?=!$veicolo['kit_soccorso']?'<option value="" selected disabled>Dati non disponibili</option>':''?>
                                  </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                <button type="submit" value="addform" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva Modifiche</button>
                              </div>
                            </form>  
                          </div>
                        </div>
                      </div>
                    
                    
                </div>              
                <div class="col-12 col-lg-4">
                    
                        
                        <div class="card-body">
                          <h4 class="card-title">Multicard</h4>
                            <ul class="list-group">
                              <li class="list-group-item">
                              <div class="media align-items-center">
                              <div class="media-body ml-3">
                              <h6 class="mb-0">Numero</h6>
                              </div>
                              <div class="date">
                              <b><?=$veicolo['multicard']?></b>
                              </div>
                              </div>
                            </li>
                            <li class="list-group-item">
                              <div class="media align-items-center">
                              <div class="media-body ml-3">
                              <h6 class="mb-0">Pin</h6>
                              </div>
                              <div class="date">
                              <b><?=$veicolo['pin']?></b>
                              </div>
                              </div>
                            </li>
                            </ul>
                            <hr>
                          <button class="btn btn-outline-success btn-block m-1" data-toggle="modal" data-target="#multimodal">Aggiorna Multicard</button>
                        </div>
                            <div class="modal fade" id="multimodal" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-success">
                                  <div class="modal-header bg-success">
                                    <h5 class="modal-title text-white">Dotazioni <?=$veicolo['modello']?> <?=$veicolo['id_veicolo']?></h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <form  id="addform2" action="controller/updateAutoparco.php" method="post">
                                    <input type="hidden" name="id" value ="<?=$veicolo['id']?>">
                                    <input type="hidden" name="id_veicolo" value="<?=$veicolo['id_veicolo']?>">
                                    <input type="hidden" name="action" value="updateMulti">
                                    <input type="hidden" name="tab" value="7"> 

                                    <div class="modal-body">
                                      <div class="form-group row">
                                        <label for="multicard" class="col-sm-6 col-form-label">Numero</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="multicard" value="<?=$veicolo['multicard']?>">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="pin" class="col-sm-6 col-form-label">Pin</label>
                                        <div class="col-sm-3">
                                        <input type="text" class="form-control" name="pin" value="<?=$veicolo['pin']?>">
                                        </div>
                                      </div>

                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                      <button type="submit" value="addform2" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva Modifiche</button>
                                    </div>
                                </form>  
                                </div>
                              </div>
                            </div>
                        
                    
                </div>
                <div class="col-12 col-lg-4">
                    
                        
                        <div class="card-body">
                          <h4 class="card-title">Telepass/Viacard</h4>
                          <h6>Praesent commodo cursus magna.</h6>
                          <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <hr>
                          <a href="javascript:void();" class="btn btn-success btn-sm text-white"><i class="fa fa-star mr-1"></i> Aggiorna dati</a>
                        </div>
                   
                </div>
                
              </div>                 




            </div>
          </div>
          
        </div>
    </div>

  </div>


</div>