<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
//var_dump($totalFin);
?>

<div class="row">
        <div class="col-md-8"> 
          <div class="card">
            <div class="card-body">
              <form id="searchForm" method="get" action="<?=$pageUrl?>">
              <input type="hidden" name="page" id="page" value="<?=$page?>" >
                <h4 class="form-header text-uppercase"  style="font-size: 12px;margin-bottom: 10px;">
                  <i class="fa fa-search"></i>
                   Ricerca
                </h4>
                <div class="form-group row">
                  <label for="search1" class="col-sm-6 col-form-label">Globale</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search1" name="search1" value="<?=$search1?>" placeholder="Ricerca nome Commerciale">
                  </div>
                </div>    


                
                <div class="form-group row">
                  <label for="search2" class="col-sm-8 col-form-label">Tabella Finanziamento</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search2" 
                  id="search2" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php 
                            $tipo = getRicerca('codtab');
                            //var_dump($tipo);
                            //$tab = 'listino';
                                foreach ( $tipo as $s2) { ?>
                        
                           <option value="<?=$s2['codtab']?>" <?=$search2 == $s2['codtab']?'selected':''?>><?=$s2['codtab']?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="search3" class="col-sm-8 col-form-label">Importo</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search3" 
                  id="search3" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php 
                            $tipo = getRicerca('finimp');
                            //var_dump($tipo);
                            $tab = 'listino';
                                foreach ( $tipo as $s3) {
                                    
                                    ?>
                      
                           <option value="<?= $s3['finimp']?>" <?=$search3 ==$s3['finimp']?'selected':''?>><?=$s3['finimp']?></option>
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
                  onchange="document.forms.searchForm.page.value=1;document.forms.searchForm.submit()">
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
                <h5 class="card-title">Tabelle Finanziamento</h5>
                <!--<a  class="btn btn-primary" style="margin-bottom: 10px;"
                href="<?=$updateUrl?>?action=insert">
                <i class="fa fa-user-plus"></i> Aggiungi Utente</a>-->
                <small style="float: right;">Totale Record <b><?=$totalFin?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
                <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                           
                            <tr>
                                <th  style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=listip&orderDir=<?=$orderDir?>&page=1"> ID Tabella</a></th>
                                
                                <th class="<?=$orderBy === 'lisdve'?$orderDirClass: '' ?> ">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisdve&orderDir=<?=$orderDir?>&page=1">Importo<br>finanziato</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=liskw&orderDir=<?=$orderDir?>&page=1">Contributo Cli</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisdat&orderDir=<?=$orderDir?>&page=1">Totale<br>finanziamento</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisppi&orderDir=<?=$orderDir?>&page=1">n rate</a></th>
                                    <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lisppi&orderDir=<?=$orderDir?>&page=1">importo rata</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lispri&orderDir=<?=$orderDir?>&page=1">contr</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lispri&orderDir=<?=$orderDir?>&page=1">tan</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lispri&orderDir=<?=$orderDir?>&page=1">taeg</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lispri&orderDir=<?=$orderDir?>&page=1">imp<br>credito</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lispri&orderDir=<?=$orderDir?>&page=1">smpg</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lispri&orderDir=<?=$orderDir?>&page=1">totale<br>dovuto</a></th>
                                <th style="vertical-align: middle;text-align: center;">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=lispri&orderDir=<?=$orderDir?>&page=1">maxirata<br>finale</a></th>

                                
                                
                            </tr> 
                        </thead>
                        <tbody>
                        <?php
                            if($fintab){
                                
                                foreach ($fintab as $fin){ 
                                    
                                    
                                    $tab = 'listino';
                                    $finimp = number_format($fin['finimp'],2,",",".");
                                    $fincon = number_format($fin['fincon'],2,",",".");
                                    $fintot = number_format($fin['fintot'],2,",",".");
                                    $finira = number_format($fin['finira'],2,",",".");
                                    $finctr = number_format($fin['finctr'],2,",",".");
                                    $fintan = number_format($fin['fintan'],2,",",".");
                                    $fintae = number_format($fin['fintae'],2,",",".");
                                    $finimc = number_format($fin['finimc'],2,",",".");
                                    $finsmp = number_format($fin['finsmp'],2,",",".");
                                    $findvt = number_format($fin['findvt'],2,",",".");
                                    $finmx1 = number_format($fin['finmx1'],2,",",".");
                                    ?>
                                <tr>
                                    <td><?=$fin['codtab']?></td>
                                    <td><?=$finimp?></td>
                                    <td><?=$fincon?></td>
                                    <td><?=$fintot?></td>
                                    <td><?=$fin['finnra']?></td>
                                    <td><?=$finira?></td>
                                    <td><?=$finctr?></td>
                                    <td><?=$fintan?></td>
                                    <td><?=$fintae?></td>
                                    <td><?=$finimc?></td>
                                    <td><?=$finsmp?></td>
                                    <td><?=$findvt?></td>
                                    <td><?=$finmx1?></td>
                                    
                                    
                                    <!--    <span class="badge badge-pill badge-success m-1" style="cursor:pointer;" data-toggle="modal" data-target="#modal-<?=$modalView ?>"> Scheda Veicolo </span>
                                        </td>-->
                                    
                                </tr>
                                
                                <?php
                                    
                                    }
                                }else{
                                    
                                    echo '<tr><td colspan=7 style="text-align:center;">No Records Found</td></tr>';
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