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
                                <label for="search1" class="col-sm-6 col-form-label">NOME </label>
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
                <h5 class="card-title">Anagrafica Clienti</h5>
                <a  class="btn btn-primary" style="margin-bottom: 10px;"
                href="<?=$updateUrl?>?action=insert">
                <i class="fa fa-user-plus"></i> Aggiungi Cliente</a>
                <small style="float: right;">Totale Clienti <b><?=$totalList?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
                <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NDG</th>
                                    <th>Cliente</th>
                                    <th>Dati residenza</th>
                                    <th>Dati Anagrafici</th>
                                    <th>contatti</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($cliente){
                                        foreach($cliente as $cli){
                                            $comuneres = getComune($cli['luogores']);
                                            //var_dump($comuneres);
                                            $cli['data_ins'] = date("d/m/Y", strtotime($cli['data_ins']));
                                            ?>
                                    <tr class="altcol1" >
                                            <td style="text-align:right;">ID <b><?=$cli['id']?></b><br>Ins. il <?=$cli['data_ins']?><br>Consulente <b><?=$cli['user_ins']?></b></td>
                                            <td ><a title="Visualizza Scheda Cliente" href="<?=$pageShowUrl?>?id=<?=$cli['id']?>">
                                                        <strong style="font-size:18px;"><?=$cli['cognome']?> <?=$cli['nome']?></strong><br>CF <?=$cli['codfiscale']?> </a></td>
                                            <td><?=$cli['indirizzores']?><br><?=$cli['capres']?> - <?=getComune($cli['luogores'])?> - (<?=$cli['provres']?>)</td>
                                            <td>Nato/a a <?=getComune($cli['luogonasc'])?> (<?=$cli['provnasc']?>)<br>il <?=date("d/m/Y", strtotime($cli['datanasc']))?></td>
                                            <td><?=$cli['mail1']?'<i class="fa fa-envelope"></i> '.$cli['mail1']:''  ?>
                                                <?=$cli['mail2']?'<br><i class="fa fa-envelope-o"></i> '.$cli['mail2']:''  ?>
                                                <?=$cli['tel1'] ?'<br><i class="fa fa-phone"></i> '.$cli['tel1'] :''  ?>
                                                <?=$cli['tel2'] ?' - '.$cli['tel2']:''  ?>
                                                <?=$cli['mobile1'] ?'<br><i class="fa fa-mobile"></i> '.$cli['mobile1'] :''  ?>
                                                <?=$cli['mobile2'] ?' - '.$cli['mobile2']:''  ?>

                                            </td>
                                            <td>
                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                <a href="<?=$pageShowUrl?>?id=<?=$cli['id']?>" class="dropdown-item">
                                                        <i class="fa fa-book"></i>Visualizza</a>
                                                    <a href="<?=$updateUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&action=update&id=<?=$cli['id']?>" class="dropdown-item">
                                                        <i class="fa fa-edit"></i> Modifica</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a onclick="return confirm('Vuoi Eliminare il Record?')"
                                                    href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$cli['id']?>&action=delete" class="dropdown-item">
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