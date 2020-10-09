<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
//$orderBy = 'lisdve';
//var_dump($pageShowUrl);

//var_dump($search1);


?>

<div class="row">

            <div class="col-lg-5 col-12">
              <div class="card ">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">smart_button</i>
                  </div>
                  <h4 class="card-title">Funzioni</h4>
                </div>
                <div class="card-body ">
                    <a  type="button" style="width:37%;" href="test_rideUpdate.php?action=fastinsert" class="btn btn-danger btn-lg btn-round  m-1">Nuovo Test</a>
				    <a  type="button" style="width:37%;float:right" href="test_rideUpdate.php?action=insert" class="btn btn-danger btn-lg btn-round  m-1">Nuova Prenotazione</a>

                </div>
                
              </div>
              <div class="card ">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">print</i>
                  </div>
                  <h4 class="card-title">Stampa Report</h4>
                </div>
                <div class="card-body ">
                    <div class="row form-group">
                        <div class="col-5">
                            <button type="button" class="btn btn-danger" style="width:100%;height:100%;" onclick="prtPdf();"><i class="fa fa-print"></i> Stampa <br>Prenotazioni</button>
                        </div>
                        <div class="col-7">
                            <div class="row ">
                                <label  class="col-lg-3 col-12 col-form-label">dal </label>
                                <div class="col-lg-9 col 12">
                                        <input type="text" onkeypress="allowNumbersOnly(event)"id="from1" class="form-control datepicker"  value="" >
                                </div>
                            </div>
                            <div class="row ">
                                <label  class="col-lg-3 col-12  col-form-label">Al </label>
                                <div class="col-lg-9 col-12">
                                        <input type="text" onkeypress="allowNumbersOnly(event)"id="to1" class="form-control datepicker"  value="<?=$to1?>">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row form-group">
                        <div class="col-5">
                            <button type="button" class="btn btn-danger" style="width:100%;height:100%;" onclick="prtPdf2();"><i class="fa fa-print"></i> Stampa <br>testride effettuati</button>
                        </div>
                        <div class="col-7">
                            <div class="row ">
                                <label  class="col-lg-3 col-12 col-form-label">dal </label>
                                <div class="col-lg-9 col 12">
                                        <input type="text" onkeypress="allowNumbersOnly(event)" id="from2"class="form-control datepicker"  value="" >
                                </div>
                            </div>
                            <div class="row">
                                <label  class="col-lg-3 col-12  col-form-label">Al </label>
                                <div class="col-lg-9 col-12">
                                    <input type="text" onkeypress="allowNumbersOnly(event)" id="to2" class="form-control datepicker"  value="<?=$to2?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
              </div>
            </div> 
           
        
    <div class=col-lg-7>
        <div id="accordion1">
            <div class="card mb-2">
                <div class="card-header">
                    <button class="btn btn-link shadow-none " data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                    <i class="fa fa-search"></i> Ricerca
                    </button>
                </div>

                <div id="collapse-1" class="collapse <?=$search1||$search2||$search3||$search4||$search5||$search6?'show':''?>" data-parent="#accordion1" style="">
                    <div class="card-body">
                  
                        <form id="searchForm" method="get" action="<?=$pageUrl?>">
                            <input type="hidden" name="page" id="page" value="<?=$page?>" >
                            <div class="col-md-12">
              
            </div>

                            
                            

                            <div class="form-group row">
                                
                                <div class="col-lg-6 col 12">
                                    <div class="row">
                                        <label for="search3" class="col-lg-4 col-12 col-form-label">Dal</label>
                            
                                        <input type="text"  style="text-align:right;"onkeypress="allowNumbersOnly(event)" class="form-control datepicker col-lg-4 col-8" id="search3" name="search3" value="<?=$search3?$search3:''?>" onchange="document.forms.searchForm.submit()">
                                    </div>
                                </div>
                                   
                               
                                <div class="col-lg-6 col-12">
                                    <div class="row">
                                        <label for="search4" class="col-lg-4 col-12 col-form-label">Al </label>
                                        <input type="text" style="text-align:right;"onkeypress="allowNumbersOnly(event)" class="form-control datepicker col-lg-4 col-8" id="search4" name="search4" value="<?=$search4?$search4:''?>" onchange="document.forms.searchForm.submit()">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                <label for="search5" class="col-lg-4 col-12 col-form-label">Veicolo </label>

                                    <select class="selectpicker"  data-style="select-with-transition"  id="search5" name="search5" value="<?=$search5?>"  onchange="document.forms.searchForm.submit()">
                                        <option value="">Tutti</option>
                                        
                                        <?php 
                                            if($motoList){
                                                foreach($motoList as $moto){?>
                                                    <option value="<?=$moto['targa']?>" <?=$search5 ==$moto['targa']?'selected':''?>><?=$moto['marca']?> <?=$moto['modello']?> <?=$moto['targa']?></option>
                                            <?  }
                                            }
                                        ?>
                                    </select>
                                </div>
                           
                                <div class="col-lg-6 col-12">
                                <label for="search6" class="col-lg-4 col-12 col-form-label">Consulente </label>

                                    <select class="selectpicker"  data-style="select-with-transition" id="search6" name="search6" value="<?=$search6?>" onchange="document.forms.searchForm.submit()">
                                        <option value="">Tutti</option>
                                        <?php if($userList){
                                            foreach($userList as $ul){
                                            ?>
                                                <option value="<?=$ul['username']?>" <?=$search6==$ul['username']?'selected':''?>><?=$ul['nome']?> <?=$ul['cognome']?></option>
                                        
                                        <?}
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                <label for="search6" class="col-lg-4 col-form-label">Stato Test </label>

                                    <select class="selectpicker"  data-style="select-with-transition" id="search2" name="search2" value="<?=$search2?>" onchange="document.forms.searchForm.submit()">
                                                
                                                <option value="">Tutti</option>
                                                <option value="P" <?=$search2 =='P'?'selected':''?>>Prenotato</option>
                                                <option value="C" <?=$search2 =='C'?'selected':''?>>Consegnato</option>
                                                <option value="E" <?=$search2 =='E'?'selected':''?>>Riconsegnato</option>


                                    </select>
                                </div>
                           
                                <div class="col-lg-6 col-12">
                                    <label for="recordsPerPage" class="col-lg-4 col-form-label">Record per Pagina</label>

                                    <select class="selectpicker"  data-style="select-with-transition"   
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
                                <button type="button" onclick="location.href='<?=$pageUrl?>'" id="resetBtn" class="btn btn-danger"><i class="fa fa-trash"></i> Reset Campi Ricerca</button>
                                
                                <button type="submit" onclick="document.forms.searchForm.page.value=1" class="btn btn-danger"><i class="fa fa-search"></i> Ricerca</button>
                                <button type="button" class="btn btn-danger"  onclick="prtPdf3();"><i class="fa fa-danger"></i> Stampa Risultati ricerca</button>

                            </div> 

                        </form>
                    </div>
                </div>
            </div>
        </div>
                   
    </div>  
             
</div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                  <i class="fa fa-motorcycle fa-2x" aria-hidden="true" style="width:auto;">Test Ride</i>
                  </div>
                  
                </div>
                <div class="card-body">
                
                <a  class="btn btn-danger" style="margin-bottom: 10px;"
                href="<?=$updateUrl?>?action=insert">
                <i class="fa fa-user-plus"></i> Aggiungi TestRide</a>
                <small style="float: right;">Totale TestRide <b><?=$totalList?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
                <br>
                <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Data</th>
                                    <th>Stato</th>
                                    <th>Cliente</th>
                                    <th>Motoveicolo</th>
                                    <th>Data test</th>
                                    <th>Riconsegna</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($testride){
                                        foreach($testride as $tr){
                                                if($tr['id_cliente']){
                                                    $cliente = getclientecf($tr['id_cliente']);
                                                }else{
                                                    $cliente =[
                                                        'cognome' =>'Prenotazione ',
                                                        'nome' => 'telefonica/email',
                                                        'codfiscale' => 'Dati cliente non presenti'
                                                        
                                                    ];
 
                                                }
                                            if($tr['id_veicolo']){
                                                $moto = getMotoinfo($tr['id_veicolo']);
                                            };
                                            //var_dump($comuneres);
                                            //$tr['data_ins'] = date("d/m/Y", strtotime($cli['data_ins']));
                                            ?>
                                    <tr class="altcol1">
                                            <td >ID <b><?=$tr['id']?></b></td>
                                            <td><?=date("d/m/Y", strtotime($tr['data_ins']))?><br><?=$tr['user_ins']?></td>
                                            <td><?php if($tr['stato_test']==='E'){?>
                                            <span class="badge badge-pill badge-success shadow-success m-1"> Riconsegnato</span>
                                            <? }if($tr['stato_test']==='C'){?>
                                            <span class="badge badge-pill badge-warning shadow-warning m-1"> In Test</span>
                                            <?}if($tr['stato_test']==='P'){?>
                                                <span class="badge badge-pill badge-danger shadow-danger m-1"> Prenotato</span>
                                            <?}
                                            ?>
                                            <br>
                                            <?php if(!$tr['id_cliente']){?>
                                                <br><span class="badge badge-pill badge-danger shadow-danger m-1"> Dati Clienti incompleti</span>         
                                            <?}
                                                ?>
                                            </td>
                                            <td><a title="Gestione Test Ride" href="<?=$pageShowUrl?>?id=<?=$tr['id']?>">
                                            <?=$cliente['cognome']?> <?=$cliente['nome']?><br><?=$cliente['codfiscale']?></a> </td>
                                           
                                            <td><a title="Gestione Test Ride" href="<?=$pageShowUrl?>?id=<?=$tr['id']?>">
                                            <?=$moto['marca']?> <?=$moto['modello']?><br> <?=$moto['targa']?></a></td>
                                            <td><?=date("d/m/Y H:i", strtotime($tr['data_pren']))?><br><?=$tr['user_pren']?></td>
                                            <td><?=$tr['data_ricons']?date("d/m/Y H:i", strtotime($tr['data_ricons'])):''?></td>
                                            <td>
                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                <a href="<?=$pageShowUrl?>?id=<?=$tr['id']?>" class="dropdown-item">
                                                        <i class="fa fa-book"></i>Gestione</a>
                                                    <a href="<?=$updateUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&action=update&id=<?=$tr['id']?>" class="dropdown-item">
                                                        <i class="fa fa-edit"></i> Modifica Prenotazione</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a onclick="return confirm('Vuoi Eliminare il Record?')"
                                                    href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$tr['id']?>&action=delete" class="dropdown-item">
                                                        <i class="fa fa-trash"></i> Elimina</a>
                                                </div> 
                                                </div>
                                            </td>

                                    </tr>
                                        <?php }
                                    }
                                ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  

        
    </div> 
    <?php
    require_once 'view/navigation.php';
?>