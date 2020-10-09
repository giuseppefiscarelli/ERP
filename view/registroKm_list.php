<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
$idVeicolo = getVeicoli();
//var_dump($idVeicolo);
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
                <div class="form-group row">
                  <label for="search1" class="col-sm-6 col-form-label">Utente</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search1" name="search1" value="<?=$search1?>" placeholder="Inserisci nome utente">
                  </div>
                </div>    
                <div class="form-group row">
                  <label for="search2" class="col-sm-8 col-form-label">ID Veicolo</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search2" 
                  id="search2" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php foreach ($idVeicolo as $val){ ?>
                        
                        <option value="<?=$val['id_veicolo']?>" <?=$search2 == $val['id_veicolo']?'selected':''?>><?=$val['id_veicolo']?></option>
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
            <h5 class="card-title">Registro KM</h5>
            <!--<a  class="btn btn-primary" style="margin-bottom: 10px;"
            href="<?=$updateUrl?>?action=insert">
            <i class="fa fa-user-plus"></i> Aggiungi </a>-->
            <small style="float: right;">Totale Record <b><?=$totalRecords?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>  
            <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="<?=$orderBy === 'id_veicolo'?$orderDirClass: '' ?> ">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=id_veicolo&orderDir=<?=$orderDir?>">Veicolo</a></th>
                                <th class="<?=$orderBy === 'user'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=user&orderDir=<?=$orderDir?>">user</a></th>
                                <th class="<?=$orderBy === 'data_partenza'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=data_partenza&orderDir=<?=$orderDir?>">data</a></th>
                               
                                <th class="<?=$orderBy === 'commessa'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=commessa&orderDir=<?=$orderDir?>">commessa</a></th>    
                                <th class="<?=$orderBy === 'km'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=km&orderDir=<?=$orderDir?>">km</a></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($registro){
                                    foreach ($registro as $km){?>
                            <tr>
                                <td><?= $km['id_veicolo'] ?></td>
                                <td><?= $km['user'] ?></td>
                                <td>Partenza <?=date("d/m/Y H:i:s", strtotime($km['data_partenza']))?><br>
                                    Arrivo <?=$km['data_arrivo']?date("d/m/Y H:i:s", strtotime($km['data_arrivo'])):'At work'?></td>
                                
                                <td><?= $km['commessa'] ?> </td>
                                <td>Partenza <?= $km['km'] ?><br>
                                    Arrivo <?=$km['data_arrivo']?$km['km_arrivo']:''?><br>
                                    km Percorsi <?=$km['data_arrivo']?($km['km_arrivo']) - ($km['km']):''?></td>
                                
                                <td style="padding-top: 0px;padding-bottom: 0px;">
                                    <div class="row">
                                        <div class="card-body">

                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a href="<?=$updateUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&action=update&id=<?=$km['id']?>" class="dropdown-item">
                                                        <i class="fa fa-pencil"></i> Modifica</a>
                                                    <a onclick="return confirm('Vuoi Eliminare il Record?')"
                                                    href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$km['id']?>&action=deleteKm" class="dropdown-item">
                                                        <i class="fa fa-trash"></i> Elimina</a>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php

                                    }
                                }else{
                                    
                                    echo '<tr><td colspan=2>NO Records Found</td></tr>';
                                }?>


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