<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
//$orderBy = 'lisdve';
//var_dump($pageShowUrl);




?>

<div class="row">
    <div class=col-lg-6>
        <div id="accordion1">
            <div class="card mb-2">
                <div class="card-header">
                    <button class="btn btn-link shadow-none collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                    <i class="fa fa-search"></i> Ricerca
                    </button>
                </div>

                <div id="collapse-1" class="collapse" data-parent="#accordion1" style="">
                    <div class="card-body">
                  
                        <form id="searchForm" method="get" action="<?=$pageUrl?>">
                            <input type="hidden" name="page" id="page" value="<?=$page?>" >
                            <h4 class="form-header text-uppercase"  style="font-size: 12px;margin-bottom: 10px;">
                            <i class="fa fa-search"></i>
                            Ricerca
                            </h4>

                            <div class="form-group row">
                                <label for="search1" class="col-sm-6 col-form-label">Campo 1 </label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="search1" name="search1" value="<?=$search1?>" placeholder="Ricerca nome ">
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
    </div>             
</div>



<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Test Ride</h5>
                <a  class="btn btn-primary" style="margin-bottom: 10px;"
                href="<?=$updateUrl?>?action=insert">
                <i class="fa fa-user-plus"></i> Aggiungi TestRide</a>
                <small style="float: right;">Totale TestRide <b><?=$totalList?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
                <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Prenotazione</th>
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
                                            $cliente = getclientecf($tr['id_cliente']);
                                            if($tr['id_veicolo']){
                                                $moto = getMotoinfo($tr['id_veicolo']);
                                            };
                                            //var_dump($comuneres);
                                            //$tr['data_ins'] = date("d/m/Y", strtotime($cli['data_ins']));
                                            ?>
                                    <tr class="altcol1">
                                            <td >ID <b><?=$tr['id']?></b></td>
                                            <td><?=date("d/m/Y", strtotime($tr['data_ins']))?><br><?=$tr['user_ins']?></td>
                                            <td><?=$cliente['cognome']?> <?=$cliente['nome']?><br><?=$cliente['codfiscale']?> </td>
                                            <td><?=$moto['marca']?> <?=$moto['modello']?><br> <?=$moto['targa']?></td>
                                            <td><?=date("d/m/Y h:i", strtotime($tr['data_pren']))?><br><?=$tr['user_pren']?></td>
                                            <td><?=$tr['data_ricons']?date("d/m/Y h:i", strtotime($tr['data_ricons'])):''?></td>
                                            <td>
                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                <a href="<?=$pageShowUrl?>?id=<?=$tr['id']?>" class="dropdown-item">
                                                        <i class="fa fa-book"></i>Visualizza</a>
                                                    <a href="<?=$updateUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&action=update&id=<?=$tr['id']?>" class="dropdown-item">
                                                        <i class="fa fa-edit"></i> Modifica</a>
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