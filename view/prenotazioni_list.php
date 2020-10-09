<?php
  $idVeicolo = getVeicoloAb();
  $dip = getRider('S');
?>
<div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <form id="searchForm" method="get" action="<?=$pageUrl?>">
              <input type="hidden" name="page" id="page" value="<?=$page?>" >
                <h4 class="form-header text-uppercase"  style="font-size: 12px;margin-bottom: 10px;">
                  <i class="fa fa-search"></i>
                   Ricerca
                </h4>
                <!--
                <div class="form-group row">
                  <label for="search1" class="col-sm-6 col-form-label">Utente</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search1" name="search1" value="<?=$search1?>" placeholder="Inserisci nome utente">
                  </div>
                </div>   
                --> 
                            <div class="form-group row">
                                <label for="search3" class="col-lg-2 col-12 col-form-label">Prenotazioni dal </label>
                                <div class="col-lg-4 col 12">
                                <input type="date" class="form-control" id="search3" name="search3" value="<?=$search3?$search3:''?>" onchange="document.forms.searchForm.submit()">
                                </div>
                                <label for="search4" class="col-lg-2 col-12  col-form-label">Al </label>
                                <div class="col-lg-4 col-12">
                                <input type="date" class="form-control" id="search4" name="search4" value="<?=$search4?$search4:''?>" onchange="document.forms.searchForm.submit()">
                                </div>
                            </div> 
                <div class="form-group row">
                  <label for="search2" class="col-sm-8 col-form-label">User Richiesta</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search2" 
                  id="search2" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona Utente</option>
                        <?php 
                             $t = getNomeD('user_richiesta'); 
                             foreach ($t as $userR){
                                $ric = getNome($userR['user_richiesta']);
                            ?>
                        
                        <option value="<?=$userR['user_richiesta']?>" <?=$search2 == $userR['user_richiesta']?'selected':''?>><?=$ric['nome']." ".$ric['cognome']?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="search5" class="col-sm-8 col-form-label">User Assegnazione</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search5" 
                  id="search5" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona Utente</option>
                        <?php 
                             $ut = getNomeD('user_assegnazione');
                             foreach ($ut as $userP){
                                $ass = getNome($userP['user_assegnazione']);
                            ?>
                        
                        <option value="<?=$userP['user_assegnazione']?>" <?=$search5 == $userP['user_assegnazione']?'selected':''?>><?=$ass['nome']." ".$ass['cognome']?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="search5" class="col-sm-8 col-form-label">Veicolo</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search6" 
                  id="search6" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona Veicolo</option>
                        <?php 
                             $vei = getNomeD('id_veicolo');
                             foreach ($vei as $veiP){
                                $veicolo = getVeicolopage($veiP['id_veicolo']);
                            ?>
                        
                        <option value="<?=$veiP['id_veicolo']?>" <?=$search6== $veiP['id_veicolo']?'selected':''?>><?=$veicolo['modello']." ".$veicolo['id_veicolo']?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="recordsPerPage" class="col-sm-8 col-form-label">Record per Pagina</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="recordsPerPage" 
                  id="recordsPerPage" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php foreach ($recordsPerPageOptions as $val){ ?>
                        
                        <option value="<?=$val?>" <?=$recordsPerPage ==$val?'selected':''?>><?=$val?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                
                <div class="form-footer" style="margin-top: 0px;">
                    <button type="button" onclick="location.href='<?=$pageUrl?>'" id="resetBtn" class="btn btn-danger"><i class="fa fa-trash"></i> Reset</button>
                    
                    <button type="submit" onclick="document.forms.searchForm.page.value=1" class="btn btn-success"><i class="fa fa-search"></i> Ricerca</button>
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
            <h5 class="card-title">Prenotazioni</h5>
            <!-- <a  class="btn btn-primary" style="margin-bottom: 10px;"
            href="<?=$updateUrl?>?action=insert">
           <i class="fa fa-user-plus"></i> Aggiungi </a>-->
            <small style="float: right;">Totale Prenotazioni <b><?=$totalUsers?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>  
            <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Richiesta</th>
                                <th>Dipendente / Veicolo</th>
                                <th>Commessa</th>
                                <th>Dal </th> 
                                <th>al</th> 
                                <th>action</th>  
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($prenotazioni){
                                    foreach ($prenotazioni as $p){
                                    $utente = getNome($p['user_assegnazione']);
                                    $veicolo = getVeicolopage($p['id_veicolo']);
                                    $rich =    getNome($p['user_richiesta']);  ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><?=date("H:i d/m/Y",strtotime($p['data_richiesta']))?><br><small><?= $rich['nome']." ".$rich['cognome'] ?></small></td>
                                <td><?= $utente['nome']." ".$utente['cognome'] ?><br><?=$veicolo['modello']." ".$veicolo['id_veicolo']?></td>
                                <td><?=$p['commessa']?> - <?=$p['destinazione']?></td>
                                
                                <td><?=date("H:i d/m/Y",strtotime($p['data_inizio']))?></td>
                                <td><?=date("H:i d/m/Y",strtotime($p['data_fine']))?></td>
                                <td><div class="row">
                                        <div class="card-body">

                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a  data-toggle="modal" onclick="modPren(<?=$p['id']?>);"data-target="#prenmodal" class="dropdown-item">
                                                        <i class="fa fa-pencil"></i> Modifica</a>
                                                    <a onclick="return confirm('Vuoi Eliminare il Record?')"
                                                    href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$p['id']?>&action=deletePren" class="dropdown-item">
                                                        <i class="fa fa-trash"></i> Elimina</a>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div> </td>
                                
                                
                               
                                
                               
                            </tr>
                            <?php

                                    }
                                }else{
                                    
                                    echo '<tr><td colspan=4>NO Records Found</td></tr>';
                                }?>


                        </tbody>
                        
                        
                    

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                    <div class="modal fade" id="prenmodal" aria-hidden="true" style="display: none;">
                        <div id="modal-lg"class="modal-dialog modal-lg modal-dialog-centered" >
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifica Prenotazione Veicolo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form id="addform" action="controller/updateAutoparco.php" method="post">
                            <input type="hidden" name="action" value="updatePren"> 
                            <input type="hidden" id="id" name="id" value="">
                                    
                            <div class="modal-body">
                                <div class="row">
                                    <div id="form-input" class="col-lg-12 ">  
                                            
                                        <div class="form-group row">
                                            <label for="data_da"class="col-sm-1 col-form-label"style="text-align: right;">Da</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="data_da"  name="data_da" min="<?=date("Y-m-d")?>" value="<?=date("Y-m-d")?>">
                                            </div>
                                            <label for="ora_da"class="col-sm-1 col-form-label"style="text-align: right;"> ora</label>
                                            <div class="col-sm-4">
                                                <input type="time" class="form-control" id="ora_da" name="ora_da" step="300"min="" value="08:00:00">
                                            </div>
                                        </div>
                                
                                
                                        <div class="form-group row">
                                            <label for="data_a"class="col-sm-1 col-form-label"style="text-align: right;">A</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="data_a"  name="data_a" min="<?=date("Y-m-d")?>" value="<?=date("Y-m-d")?>">
                                            </div>
                                            <label for="ora_a"class="col-sm-1 col-form-label"style="text-align: right;"> ora</label>
                                            <div class="col-sm-4">
                                                <input type="time" class="form-control" id="ora_a" name="ora_a" min="" value="17:00">
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <label for="id_veicolo" class="col-sm-3 col-form-label">Veicolo</label>
                                            <div class="col-sm-7"><select class="form-control"  name="id_veicolo" id="id_veicolo" >
                                                    <option value="">Seleziona Veicolo</option>
                                                    <?php foreach ($idVeicolo as $val){ ?>
                                                    
                                                    <option value="<?=$val['id_veicolo']?>"><?=$val['modello']." ".$val['id_veicolo']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_dipendente" class="col-sm-3 col-form-label">Dipendente</label>
                                            <div class="col-sm-7"><select class="form-control"  name="id_dipendente" id="id_dipendente" >
                                                    <option value="">Seleziona Dipendente</option>
                                                    <?php foreach ($dip as $d){ ?>
                                                    
                                                    <option value="<?=$d['username']?>"><?=$d['nome']." ".$d['cognome']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="commessa" class="col-sm-3 col-form-label">Commessa</label>
                                            <div class="col-sm-3">
                                                <input type="number" style="text-align: right;"  class="form-control "max="99999" id="commessa" name="commessa">
                                            </div>            
                                        </div>

                                        <div class="form-group row">
                                            <label for="destinazione" class="col-sm-3 col-form-label">Destinazione</label>
                                            <div class="col-sm-9">
                                                <input type="text" maxlength="50"class="form-control " id="destinazione" name="destinazione">
                                                </div>  
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-sm-3 col-form-label">Note</label>
                                                <div class="col-sm-9">
                                                    <input type="text" maxlength="50"class="form-control " id="note" name="note">
                                                    </div>      
                                        </div>



                                    </div>  
                                    
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                <button type="button" onclick="subform();" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva prenotazione</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>

<?php
                            require_once 'view/navigation.php';
                                ?>