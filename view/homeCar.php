<?php
    require_once 'model/autoparco.php';
    $disp = getDisp('D');
    $work = getDisp('W');
    $idVeicolo = getVeicoloAb();
    $dip = getRider('S');
    $mywork = getWorkDip($_SESSION['userData']['username']);
    //$mywork = getWorkDip($caruser);
    $ass = getPrenDip();
    $today = date("Y-m-d H:i:s");
    $tod =date("Y-m-d");
    $prenotazoini=getPren();

    //var_dump($dip);
    //var_dump($work);die;
    //var_dump(getEvent());
    
    //$veiWork = $work['id_veicolo'];
    //$veiWork=(getWork($work['id_veicolo']));

    //var_dump($veiWork);die;

?>

<link href="plugins/select2/css/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css">
<style>
            .swal-modal {
            width: 478px;
            opacity: 0;
            pointer-events: none;
            background-color: #fff;
            text-align: center;
            border-radius: 5px;
            position: static;
            margin: 20px auto;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            z-index: 10001;
            transition: opacity .2s,-webkit-transform .3s;
            transition: transform .3s,opacity .2s;
            transition: transform .3s,opacity .2s,-webkit-transform .3s;
        }
            .map {
                height: 600px;
                width: 100%;
            }
            
        .popper,
        .tooltip {
        position: absolute;
        z-index: 9999;
        background: #FFC107;
        color: black;
        width: 150px;
        border-radius: 3px;
        box-shadow: 0 0 2px rgba(0,0,0,0.5);
        padding: 10px;
        text-align: center;
        }
        .style5 .tooltip {
        background: #1E252B;
        color: #FFFFFF;
        max-width: 200px;
        width: auto;
        font-size: .8rem;
        padding: .5em 1em;
        }
        .popper .popper__arrow,
        .tooltip .tooltip-arrow {
        width: 0;
        height: 0;
        border-style: solid;
        position: absolute;
        margin: 5px;
        }

        .tooltip .tooltip-arrow,
        .popper .popper__arrow {
        border-color: #FFC107;
        }
        .style5 .tooltip .tooltip-arrow {
        border-color: #1E252B;
        }
        .popper[x-placement^="top"],
        .tooltip[x-placement^="top"] {
        margin-bottom: 5px;
        }
        .popper[x-placement^="top"] .popper__arrow,
        .tooltip[x-placement^="top"] .tooltip-arrow {
        border-width: 5px 5px 0 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        bottom: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
        }
        .popper[x-placement^="bottom"],
        .tooltip[x-placement^="bottom"] {
        margin-top: 5px;
        }
        .tooltip[x-placement^="bottom"] .tooltip-arrow,
        .popper[x-placement^="bottom"] .popper__arrow {
        border-width: 0 5px 5px 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-top-color: transparent;
        top: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
        }
        .tooltip[x-placement^="right"],
        .popper[x-placement^="right"] {
        margin-left: 5px;
        }
        .popper[x-placement^="right"] .popper__arrow,
        .tooltip[x-placement^="right"] .tooltip-arrow {
        border-width: 5px 5px 5px 0;
        border-left-color: transparent;
        border-top-color: transparent;
        border-bottom-color: transparent;
        left: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
        }
        .popper[x-placement^="left"],
        .tooltip[x-placement^="left"] {
        margin-right: 5px;
        }
        .popper[x-placement^="left"] .popper__arrow,
        .tooltip[x-placement^="left"] .tooltip-arrow {
        border-width: 5px 0 5px 5px;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        right: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
        }
</style>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Veicoli Prelevati</h5>
                    <small>Alla consegna verrà utilizzata la posizione del VS dispositivo per la gestione del veicolo parcheggiato</small>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>Veicolo</th>
                                    <th>Commessa</th>
                                    
                                    <th>Destinazione</th>
                                    <th>KM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($mywork){
                                        foreach($mywork as $mw){
                                            $mvW=getVeicolopage($mw['id_veicolo']);
                                            //var_dump($vW);
                                            
                                            ?>
                                            
                                    <tr>
                                        <td ><?=$mvW['modello']?> <?=$mw['id_veicolo']?><br>
                                        <a type="button" class="btn btn-success btn-sm"  onclick="upcKm(<?=$mw['id_veicolo']?>,<?=$mw['id']?>)" style="color:white;width: -webkit-fill-available;" >Consegna</a><br>
                                        <a type="button" class="btn btn-info btn-sm"  onclick="info(<?=$mw['id_veicolo']?>)" style="color:white;margin-top:5px;width: -webkit-fill-available;" >Info Veicolo</a><br>
                                        <a type="button" class="btn btn-danger btn-sm" style="color:white;margin-top:5px;width: -webkit-fill-available;" href="http://www.google.com/maps/place/<?=$mw['destinazione']?>" target="_blank">Apri in Maps</a>
                                        </td>
                                       
                                        <td><?=$mw['commessa']?></td>
                                        <td><a href="http://www.google.com/maps/place/<?=$mw['destinazione']?>" target="_blank"><?=$mw['destinazione']?></a><br><small>Apri in Maps</small></td>
                                        <td><?=$mw['km']?></td>
                                    </tr>

                                    <?    }

                                    }else{?>
                                        <tr>
                                        <td colspan="4">Non hai prelevato alcun veicolo </td>
                                        </tr>
                                   <? }

                                ?>
                                    
                                    
                                </tbody>
                            </table>
                         </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Veicoli Assegnati</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    
                                    <th >Veicolo</th>
                                    <th>Data</th>
                                    <th>Commessa</th>
                                    <th >Ubicazione</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    if($ass){
                                        foreach($ass as $a){
                                            $id_veicolo = $a['id_veicolo'];
                                             $vei= getVeicolopage($id_veicolo);
                                            //var_dump($vei);
                                            //var_dump($vei['id']);?>
                                    <tr>
                                        
                                        <td><?=$vei['modello']." ".$vei['id_veicolo']?><br><?php
                                                
                                               
                                                $par=date("Y-m-d H:i:s",strtotime($a['data_inizio']));
                                                $fin=date("Y-m-d H:i:s",strtotime($a['data_fine']));

                                                if($par<=$today&&$today<=$fin){?>
                                                    <a type="button" class="btn btn-success btn-sm"  onclick="upKm(<?=$a['id_veicolo']?>,<?=$a['id']?>);" style="color:white;" >Preleva</a>
                                                   
                                                    <?}?></td>
                                        <td><?=date("Y-m-d",strtotime($a['data_inizio']))==$tod?'dalle '.date("H:i",strtotime($a['data_inizio'])):'dal '.date("Y-m-d H:i",strtotime($a['data_inizio']))?>
                                        <br><?=date("Y-m-d",strtotime($a['data_fine']))==$tod?'alle '.date("H:i",strtotime($a['data_fine'])):'al '.date("Y-m-d H:i",strtotime($a['data_fine']))?></td>
                                        <td><?=$a['commessa']?><br><?=$a['destinazione']?></td>
                                        <td><?php
                                        if($vei['last_lat']&&$vei['last_lon']){
                                            if($vei['last_lat']<41.941617&&$vei['last_lat']>41.940122&&$vei['last_lon']>12.656839&&$vei['last_lon']<12.659221){?>
                                             
                                             <a href="http://www.google.com/maps/place/<?=$vei['last_lat']?>,<?=$vei['last_lon']?>" target="_blank"> <img src="images/Parking.png" style="width:25px;">
                                             <img src="images/logo_setec_250.png" style="width:52px;"></a>

                                        <?    }
                                        else{?>
                                            <a href="http://www.google.com/maps/place/<?=$vei['last_lat']?>,<?=$vei['last_lon']?>" target="_blank">Apri in Maps </a>
                                        <?}
                                        }else{?>
                                            Posizione<br>
                                            Non Disponibile
                                            
                                       <? }
                                        ?>
                                             </td>
                                       
                                    </tr>
                                    

                                <?      }
                                 }else{?>
                                    <tr>
                                        <td colspan="5">Non hai alcun veicolo assegnato </td>
                                        </tr>
                                <?}
                                ?>
                                
                                </tbody>
                            </table>
                         </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="display:none;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Veicoli Disponibili</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    
                                    <th >Veicolo</th>
                                    <th >km</th>
                                    <th >Ubicazione</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    if($disp){
                                        foreach($disp as $d){?>
                                    <tr>
                                        
                                        <td><?=$d['modello']." ".$d['id_veicolo']." - ".$d['targa']?></td>
                                        <td><?=$d['km']?></td>
                                        <td></td>
                                        <td>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a href="javaScript:void();" class="dropdown-item">Richiedi</a>
                                                    <a href="javaScript:void();" class="dropdown-item">Preleva</a>
                                                    
                                                </div>
                                            </td>
                                    </tr>

                                <?      }
                                    }
                                ?>
                                
                                </tbody>
                            </table>
                         </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-6">
          
          <div class="card">
             <div class="card-header text-uppercase">Mappa Veicoli</div>
              <div class="card-body">
              <div id="map" class="map" tabindex="0">
              
              </div>
              </div>
          </div>
          
        </div>
        <div class="col-lg-6">
          
          <div class="card">
             <div class="card-header text-uppercase">Calendario Prenotazioni</div>
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Large Size Modal -->
                            <button class="btn btn-primary btn-block m-1" id="addPren" data-toggle="modal" data-target="#prenmodal">Nuova Prenotazione</button>
                            
                        
                    </div>
                    <div class="col-lg-4">
                        <!-- Large Size Modal -->
                            
                            
                        <button class="btn btn-success btn-block m-1" onclick="window.location.href='prenotazioni.php'" >Vedi tutte le Prenotazioni</button>
                    </div>
                </div>
              <div class="card-body">
              <div id="calendar"></div>
              </div>
          </div>
          
        </div>
    </div><!--End Row-->
    

    <div class="row" >
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Veicoli at Work</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>Veicolo</th>
                                    <th>Dipendente</th>
                                    <th>Commessa</th>
                                    <th>Destinazione</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($work){
                                        foreach($work as $w){
                                            $vW=getWork($w['id_veicolo']);
                                            //var_dump($vW);?>
                                    <tr>
                                        <th ><?=$w['modello']." ".$w['id_veicolo']?></th>
                                        <td><?=$vW['user']?></td>
                                        <td><?=$vW['commessa']?></td>
                                        <td><?=$vW['destinazione']?></td>
                                    </tr>

                                    <?    }
                                    }

                                ?>
                                    
                                    
                                </tbody>
                            </table>
                         </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Veicoli Disponibili <?php $today= date("Y-m-d");
                                                                setlocale(LC_TIME, "it_IT.utf8");
                                                               // echo $today;
                                                                echo ucwords(strftime("%A %e %B ", strtotime($today)))?></h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    
                                    <th >Veicolo</th>
                                    <th >km</th>
                                    <th >Ubicazione</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    if($disp){
                                        foreach($disp as $d){
                                            $id_veicolo = $d['id_veicolo'];
                                            
                                            
                                            $check=checkPren($id_veicolo);
                                            //var_dump($check);
                                            if(!$check){
                                            ?>
                                    <tr id="mod_<?=$d['id_veicolo']?>">
                                        
                                        <td><?=$d['modello']." ".$d['id_veicolo']." - ".$d['targa']?></td>
                                        <td><?=$d['km']?></td>
                                        <td><?php
                                        if($d['last_lat']&$d['last_lon']){
                                            if($d['last_lat']<41.941617&&$d['last_lat']>41.940122&&$d['last_lon']>12.656839&&$d['last_lon']<12.659221){?>
                                               
                                             <a href="https://www.google.com/maps/place/<?=$d['last_lat']?>,<?=$d['last_lon']?>" target="_blank"><img src="images/Parking.png" style="width:25px;">
                                             <img src="images/logo_setec_250.png" style="width:52px;"></a>

                                        <?    
                                        } else{?>

                                            <a href="https://www.google.com/maps/place/<?=$d['last_lat']?>,<?=$d['last_lon']?>" target="_blank">Apri in Maps </a>
                                       <? }
                                        }else{?>
                                        non disponibile    
                                       <? }
                                        ?>
                                             </td>
                                        <td>
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a onclick="prenota(<?=$d['id_veicolo']?>);" class="dropdown-item">Prenota</a>
                                                    <a onclick="preleva(<?=$d['id_veicolo']?>);" class="dropdown-item">Preleva (oggi, 8-17)</a>
                                                    <a onclick="assegna(<?=$d['id_veicolo']?>);" class="dropdown-item">Assegna (oggi, 8-17)</a>
                                                    
                                                </div>
                                            </td>
                                    </tr>

                                <?     }
                                 }
                                    }
                                ?>
                                
                                </tbody>
                            </table>
                         </div>
                </div>
            </div>
        </div>
    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="prenmodal" aria-hidden="true" style="display: none;">
                        <div id="modal-lg"class="modal-dialog modal-lg modal-dialog-centered" style="min-width:70%;padding:30px;">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Nuova Prenotazione Veicolo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form id="addform" action="controller/updateAutoparco.php" method="post">
                            <input type="hidden" name="action" value="savePren"> 
                                    
                            <div class="modal-body">
                                <div class="row">
                                    <div id="form-input" class="col-lg-6 ">  
                                            
                                        <div class="form-group row">
                                            <label for="data_da"class="col-sm-1 col-form-label"style="text-align: right;">Da</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="data_da"  name="data_da" min="<?=date("Y-m-d")?>" value="<?=date("Y-m-d")?>">
                                            </div>
                                            <label for="ora_da"class="col-sm-1 col-form-label"style="text-align: right;"> ora</label>
                                            <div class="col-sm-4">
                                                <input type="time" class="form-control" id="ora_da" name="ora_da" step="300"min="08:00" value="08:00">
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
                                                <input type="number" style="text-align: right;"  required class="form-control "max="99999" value="0" id="commessa" name="commessa">
                                            </div>            
                                        </div>

                                        <div class="form-group row">
                                            <label for="destinazione" class="col-sm-3 col-form-label">Destinazione</label>
                                            <div class="col-sm-9">
                                                <input type="text" maxlength="50"class="form-control " id="destinazione" name="destinazione" placeholder="indirizzo - località es.via tenuta del cavaliere,1 - Guidonia">
                                                </div>  
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-sm-3 col-form-label">Note</label>
                                                <div class="col-sm-9">
                                                    <input type="text" maxlength="50"class="form-control " id="note" name="note">
                                                    </div>      
                                        </div>



                                    </div>  
                                    <div class="col-lg-6 ">
                                        <h5 id="tablepren-title"style="text-align:center;">Elenco Prenotazioni</h5>
                                        <table class="table table-sm"id="tablepren">
                                            <thead>
                                                        <tr>
                                                            <th>Veicolo</th>
                                                            <th>Da</th>
                                                            <th>A</th>
                                                            <th>Commessa</th>
                                                            <th>Dipendente</th>
                                                        </tr>
                                            </thead>  
                                            <tbody>

                                            </tbody>             
                                        </table>
                                    
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
                    <div class="modal fade" id="kmmodal" style="display: none;" aria-hidden="true">
                        
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Inserimento KM</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  id="addform2" action="controller/updateKm.php" method="post">
                                    <input type="hidden" name="action" value ="insert">
                                    <input type="hidden" name="tipo" id="tipo" value="P">
                                    <input type="hidden" id="id_veicolokm" name="id_veicolo" value="">
                                    <input type="hidden" id="id_reg" name="id_reg" value="">
                                    <input type="hidden" id="lat" name="lat" value="">
                                    <input type="hidden" id="lon" name="lon" value="">
                                    <input type="hidden" name="km_partenza" id="km_partenza"value="">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Veicolo</label>
                                            <div class="col-lg-3 col-12">
                                                <input type="text" style="text-align: right;"  class="form-control " id="modellokm" value="" readonly >  
                                            </div>
                                                
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-sm-3 col-form-label">KM</label>
                                                <div class="col-lg-3" col-6>
                                                    <input type="number" style="text-align: right;" class="form-control " min="100" id="km" name="km" value="" readonly>
                                                </div>
                                                <div class="col-md-3" id="checkkm">
                                                    <div class="icheck-material-success">
                                                        <input type="radio" id="success1" value="0" name="checkkm" checked="">
                                                        <label for="success1">KM Esatti</label>
                                                    </div>
                                                    <div class="icheck-material-success">
                                                        <input type="radio" id="success2" value="1" name="checkkm">
                                                        <label for="success2">Modifica KM</label>
                                                    </div>
                                                </div>        
                                        </div>
                                        <div class="form-group row">
                                            <label for="commessa" class="col-sm-3 col-form-label">Commessa</label>
                                            <div class="col-lg-3 col-12" >
                                                <input type="number" style="text-align: right;"  class="form-control "max="99999" id="commessakm" readonly name="commessa" value="">
                                            </div>            
                                        </div>
                                        <div class="form-group row">
                                            <label for="destinazione" class="col-sm-3 col-form-label">Destinazione</label>
                                            <div class="col-sm-9">
                                                <input type="text" maxlength="50"class="form-control " id="destinazionekm" name="destinazione" value="">
                                                </div>  
                                        </div>
                                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                <button type="button" onclick="subform2();" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva</button>
                            </div>
                            </form> 
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="infomodal" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-info">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-white">Info Veicolo</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr><td>Multicard</td><td> <b id="multicard"></b></td></tr>
                                    <tr><td>Pin </td><td> <b id="pin"></td></tr>
                                </table>
                               
                                <p><b>Dotazioni</b></p>
                                <table>
                                    <tr><td>Tipo Pneumatici </td><td> <b id="pneumatici"></b></td></tr>
                                    <tr><td>Catene </td><td> <b id="catene"></b></td></tr>
                                    <tr><td>Gilet </td><td> <b id="gilet"></b></td></tr>
                                    <tr><td>Kit Soccorso </td><td> <b id="soccorso"></b></td></tr>

                                    

                                </table>
                                
                                 <br>
                                 <br>
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                
                            </div>
                            </div>
                        </div>
                    </div>








<?php
    require_once 'view/footer.php';

?>
<script src="plugins/select2/js/select2.min.js"></script>
<script src="plugins/jquery-multi-select/jquery.multi-select.js"></script>
<script type="text/javascript">
    const setec = new ol.Feature({
    //geometry: new ol.geom.Point(ol.proj.fromLonLat([12.657789, 41.941525])),
    //geometry: new ol.geom.MultiPoint([[12.667445, 419424.82],[12.657789, 41.941525]]),
    geometry: new ol.geom.Point(ol.proj.fromLonLat([12.658068, 41.940910])),
    name: '22',
    });

    setec.setStyle(
    new ol.style.Style({
        image: new ol.style.Icon({
        anchor: [80,80],
            anchorXUnits: 'pixels',
            anchorYUnits: 'pixels',
        crossOrigin: 'anonymous',
        src: 'images/logo_setec_250.png',
        scale: 0.6,
        }),
    })
    );
    setec.on("click", () => {
        alert()
        })

    const iconFeature = new ol.Feature({
    geometry: new ol.geom.Point(ol.proj.fromLonLat([12.657789, 41.941525])),
    //geometry: new ol.geom.MultiPoint([[12.667445, 419424.82],[12.657789, 41.941525]]),
    //geometry: new ol.geom.MultiPoint([[12.667445, 41.942482],[12.657789, 41.941525]]).transform('EPSG:4326','EPSG:3857'),
    name: 'Setec',
    });
    
    <?php
        $geo= getVeicolo();

        foreach($geo as $g){

            if($g['last_lat']&&$g['last_lon']&&$g['stato']=="D"){?>
    const <?=$g['targa']?> = new ol.Feature({
        
        geometry: new ol.geom.Point(ol.proj.fromLonLat([<?=$g['last_lon']?>, <?=$g['last_lat']?>])),
        name: '<?=$g['id_veicolo']?>',
    });

    <?=$g['targa']?>.setStyle(
    new ol.style.Style({
        image: new ol.style.Icon({
        anchor: [0.4, 1],
            anchorXUnits: 'fraction',
            anchorYUnits: 'fraction',
        crossOrigin: 'anonymous',
        src: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=<?=$g['id_veicolo']?>|<?=$g['stato']=='D'?'00FF3A':'FF0000'?>|000000',
        scale: 1.5,
        }),
    })
    );




    <?        }
        }

    ?>


    const map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
        source: new ol.source.OSM(),
        }),
        new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [setec<?php
            foreach($geo as $g){
                if($g['last_lat']&&$g['last_lon']&&$g['stato']=="D"){?>,<?=$g['targa']?>
            <?}
        }?>]
        })

        })
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([12.658167, 41.940699]),
        zoom:18
    })
    });

      
</script>
<script>

    $('#commessa').keypress(function (e) {

    var inputLength = jQuery(this).val().length;

    if(inputLength >= 5) {
        e.preventDefault();
        return false;
    }
    });
    $('#data_a,#ora_a,#id_veicolo').change(function() {
            
        
        getPren();
    });
    $('#ora_da,#data_da').change(function() {
        data_inizio = $('#data_da').val();
        $("#data_a").prop({min: data_inizio});
        $('#data_a').val(data_inizio);

        
        
        getPren();

            
    });



    $('#prenmodal').on('shown.bs.modal', function () {
    // $("#calendar2").fullCalendar('render');
    // $('#calendar2').fullCalendar('changeView', 'agendaWeek');
    });
    $('#addPren').click(function(){
        
        $('.modal-title').text('Nuova prenotazione veicolo');
        $('#id_veicolo,#id_dipendente,#commessa,#destinazione,#note').val("");
        $('#id_veicolo,#id_dipendente').removeAttr('disabled');
        $('#data_da,#ora_da,#data_a,#ora_a,#calendar2').show();
        $('label[for="data_da"],label[for="data_a"],label[for="ora_da"],label[for="ora_a"]').show();
        $('#form-input').removeClass('col-12').addClass('col-lg-6');
        $('#modal-lg').css({"min-width":"70%","padding":"30px"});
        
        
        
        getPren();
     
    });
    function prenota(id){
        
        $('#prenmodal').modal('show'); 
        $('.modal-title').text('Prenota veicolo '+id);
        $('#id_veicolo').val(id);
        $('#id_veicolo').attr('disabled', 'disabled');
        $('#id_dipendente,#commessa,#destinazione,#note').val("");
        $('#id_dipendente').removeAttr('disabled');
        $('#data_da,#ora_da,#data_a,#ora_a,#calendar2').show();
        $('label[for="data_da"],label[for="data_a"],label[for="ora_da"],label[for="ora_a"]').show();
        $('#form-input').removeClass('col-12').addClass('col-lg-6');
        $('#modal-lg').css({"min-width":"70%","padding":"30px"});
    
        
        

    };
    function getPren(){
        data_inizio = $('#data_da').val();
        ora_inizio = $('#ora_da').val();
        data_fine = $('#data_a').val();
        ora_fine = $('#ora_a').val();
        id_veicolo = $('#id_veicolo').children("option:selected").val();
        data= {data_inizio:data_inizio,ora_inizio:ora_inizio,data_fine:data_fine,ora_fine:ora_fine,id_veicolo:id_veicolo};
        $("#tablepren > tbody").html("");
        $.ajax({
                url: "controller/updateAutoparco.php?action=checkPren",
                type:"POST",
                data: data,
                dataType: 'json',
                success:function(results){
                    //console.log(results);
                    if(results){
                        $.each(results, function(k, v) {
                        $('#tablepren').find('tbody').append('<tr><td>'+v.veicolo+'</td><td>'+v.start+'</td><td>'+v.end+'</td><td>'+v.commessa+'</td><td>'+v.dipendente+'</td></tr>');
                        });
                    }else{
                        $('#tablepren').find('tbody').append('<tr><td>Non ci sono prenotazioni</td></tr>');
                    }
                
                }
            })

    };
    function preleva(id){
        
        $('#prenmodal').modal('show'); 
        $('#id_veicolo').val(id);
    
        $('#id_dipendente').val('<?=$_SESSION['userData']['username']?>');
        $('#commessa,#destinazione,#note').val("");
        $('#id_veicolo,#id_dipendente').attr('disabled', 'disabled');
        $('.modal-title').text('Preleva veicolo '+id);
        $('#data_da,#ora_da,#data_a,#ora_a,#calendar2').hide();
        $('label[for="data_da"],label[for="data_a"],label[for="ora_da"],label[for="ora_a"]').hide();
        $('#form-input').removeClass('col-lg-6').addClass('col-12');
        $('#modal-lg').removeAttr('style');
    };
    function assegna(id){
        
        $('#prenmodal').modal('show'); 
        $('.modal-title').text('Assegna veicolo '+id);
        //$('#id_veicolo option:selected').val(id);
        $("#id_veicolo option[value="+id+"]").attr("selected","selected");
        $('#id_veicolo').attr('disabled', 'disabled');
        $('#id_dipendente,#commessa,#destinazione,#note').val("");
        $('#id_dipendente').removeAttr('disabled');
        $('#data_da,#ora_da,#data_a,#ora_a,#calendar2').hide();
        $('label[for="data_da"],label[for="data_a"],label[for="ora_da"],label[for="ora_a"]').hide();
        $('#form-input').removeClass('col-lg-6').addClass('col-12');
        $('#modal-lg').removeAttr('style');
    };

    function subform(){
        $('#addform').find(':disabled').removeAttr('disabled');
        $('#addform').submit();
    }
    function subform2(){
        $('#addform2').find(':disabled').removeAttr('disabled');
        $('#addform2').submit();
    }

    $(document).ready(function() {
           

      
            $('.multiple-select').select2();
            navigator.geolocation.getCurrentPosition(showPosition);
            $('#calendar').fullCalendar({
                //defaultView: 'listWeek',
                monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
                monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago','Set','Ott','Nov','Dic'],
                dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
                dayNamesShort: ['Dom','Lun','Mar','Mer','gio','Ven','Sab'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
               
                eventDidMount: function(info) {
                    var tooltip = new Tooltip(info.el, {
                        title: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                    },
      
               // defaultDate: '2020-03-12',
                
                navLinks: true, // can click day/week names to navigate views
                selectable: false,
                selectHelper: true,
                events: 'controller/updateAutoparco.php?action=getEvent',
                select: function(start, end) {
                    var title = prompt('Event Title:');
                    var eventData;
                    if (title) {
                    eventData = {
                        title: title,
                        start: start,
                        end: end,
                        alert: alert,
                        id :id
                    };
                   // $('#calendar2').fullCalendar('renderEvent', eventData, true); // stick? = true
                    }
                    //$('#calendar').fullCalendar('unselect');
                },
      
                businessHours: false,
                businessHours: [{
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    
                            dom: [ 1, 2, 3, 4, 5], // Monday - Thursday
                    start: '7:00', // a start time (10am in this example)
                            end: '18:00' // an end time (6pm in this example)
                }
                
                ],
                
                minTime: '07:00:00', 
                maxTime: '19:00:00',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                displayEventTime:false,
                displayEventEnd:false,
                timeFormat: 'HH:mm', // uppercase H for 24-hour clock
                eventClick: function(info) {
                    $.ajax({
                        url: "controller/updateAutoparco.php?action=upPren",
                        type:"POST",
                        data: {id:info.id},
                        dataType: 'json',
                        success:function(results){
                            
                           const data_da_format = results[0].data_inizio.split(" ");
                           const data_da = data_da_format[0];
                           const ora_da = data_da_format[1];
                           const data_a_format = results[0].data_fine.split(" ");
                           const data_a = data_a_format[0];
                           const ora_a = data_a_format[1];
                           console.log(info);
                    //console.log(info.title);
                    veicolo = info.title.split(" ");
                    //console.log(veicolo); 
                    vei = veicolo[0]+" "+veicolo[1];
                    dip= veicolo[3];
                    //console.log(dip);
                    dip= dip.split(":");
                    dip = dip[1];
                      
                const el = document.createElement('div');
                el.innerHTML = 'Veicolo: '+vei+'<br>dal '+ora_da+' '+data_da+'<br>al '+ora_a+' '+data_a+'<br>Dipendente :'+dip+'<br><a type="button" class="btn btn-success btn-block btn-round m-1" href="prenotazioni.php?id='+info.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Gestione Prenotazione</a>'
                swal({
                        title:"Info Evento",
                        text: info.alert,
                        content: el,
                        icon:"info"
                    });
                
                
                $(".swal-modal").css('background-color', '#4b7516ba');//Optional changes the color of the sweetalert 
                $(".swal-content").css('color', 'white'); 
                           
                        }
                    })
                    //console.log(results); 
               
                }
                    
            });  
            $('#calendar2').fullCalendar({
                monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
                monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago','Set','Ott','Nov','Dic'],
                dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
                dayNamesShort: ['Dom','Lun','Mar','Mer','gio','Ven','Sab'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
      
                //defaultDate: '2020-03-12',
                
                navLinks: true, // can click day/week names to navigate views
                selectable: false,
                selectHelper: true,
      
                select: function(start, end) {
                    var title = prompt('Event Title:');
                    var eventData;
                    if (title) {
                    eventData = {
                        title: title,
                        start: start,
                        end: end,
                        alert: alert,
                        id :id
                    };
                   // $('#calendar2').fullCalendar('renderEvent', eventData, true); // stick? = true
                    }
                    //$('#calendar').fullCalendar('unselect');
                },
      
                businessHours: false,
                businessHours: [{
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    
                            dom: [ 1, 2, 3, 4, 5], // Monday - Thursday
                    start: '7:00', // a start time (10am in this example)
                            end: '19:00' // an end time (6pm in this example)
                }
                
                ],
                
                minTime: '07:00:00', 
                maxTime: '19:00:00',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
     
      
                events: [        
                            
                
                ],
               
                timeFormat: 'H(:mm)', // uppercase H for 24-hour clock
                eventClick: function(info) {
                    
                const el = document.createElement('div');
                el.innerHTML = '<a type="button" class="btn btn-success btn-block btn-round m-1" href="prenotazioni.php?id='+info.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Gestione Test</a>'
                swal({
                        title:"Info Evento",
                        text: info.alert,
                        content: el,
                        icon:"info"
                    });
                
                
                $(".swal-modal").css('background-color', '#88040bd1');//Optional changes the color of the sweetalert 
                
                }
                    
            });  
    });

</script>
<script>
    function info(id){

            $('#infomodal').modal('show'); 
            $('.modal-title').text('Info veicolo '+id);
        
                    $.ajax({
                            url: "controller/updateAutoparco.php?action=getVeinfo",
                            type:"POST",
                            data: {id:id},
                            dataType: 'json',
                            success:function(data){
                            // console.log(data[0].modello); 
                                    multicard = data[0].multicard;
                                    pin =data[0].pin;
                                    pneumatici=data[0].tipo_pneumatici;
                                    catene=data[0].catene;
                                    gilet=data[0].gilet;
                                    kit_soccorso=data[0].kit_soccorso;
                                    console.log(data);
                                    nd = "<span class=\"badge badge-pill badge-danger m-1\"> Non Definito </span>";
                                    if(pneumatici=="E"){
                                        pneumatici = "<span class=\"badge badge-pill badge-warning m-1\"><i class=\"fa fa-sun-o\"></i> Estivi </span>";
                                    }else if(pneumatici=="I"){
                                        pneumatici = "<span class=\"badge badge-pill badge-info m-1\"><i class=\"fa fa-sun-o\"></i> invernali </span>";
                                    }else if(pneumatici=="Q"){
                                        pneumatici = "<span class=\"badge badge-pill badge-success m-1\"><i class=\"fa fa-sun-o\"></i> <i class=\"fa fa-snowflake-o\"></i> 4 stagioni</span>";
                                    }else{
                                        pneumatici = nd;
                                    }
                                    if(catene=="P"){
                                        catene = "<span class=\"badge badge-pill badge-success m-1\"> Provvisto </span>";
                                    }else if(catene=="N"){
                                        catene = "<span class=\"badge badge-pill badge-warning m-1\"> Non Provvisto </span>";
                                    }else{
                                        catene = nd;
                                    }
                                    if(gilet=="P"){
                                        gilet = "<span class=\"badge badge-pill badge-success m-1\"> Provvisto </span>";
                                    }else if(gilet=="N"){
                                        gilet = "<span class=\"badge badge-pill badge-warning m-1\"> Non Provvisto </span>";
                                    }else{
                                        gilet = nd;

                                    }
                                    if(kit_soccorso=="P"){
                                        kit_soccorso = "<span class=\"badge badge-pill badge-success m-1\"> Provvisto </span>";
                                    }else if(kit_soccorso=="N"){
                                        kit_soccorso = "<span class=\"badge badge-pill badge-warning m-1\"> Non Provvisto </span>";
                                    }else{
                                        kit_soccorso = nd;
                                    }
                                    
                                $('#multicard').text(multicard);
                                $('#pin').text(pin);
                                $('#pneumatici').html(pneumatici);
                                $('#catene').html(catene);
                                $('#gilet').html(gilet);
                                $('#soccorso').html(kit_soccorso);
                              
                            
                        }

                    })
    }
    function upKm(id,idpren){

        $('#kmmodal').modal('show'); 
        $('#km').attr("readonly", "readonly");
        $('#checkkm').show();
        $('#tipo').val("P");

        $.ajax({
                url: "controller/updateAutoparco.php?action=getVeinfo",
                type:"POST",
                data: {id:id},
                dataType: 'json',
                success:function(data){
                    console.log(data); 
                        id_veicolo = data[0].id_veicolo;
                        modello =data[0].modello;
                        km =data[0].km;
                        console.log(id_veicolo); 
                    $('#id_veicolokm').val(id_veicolo);
                    $('#modellokm').val(""+modello+" "+id_veicolo+"");
                    $("#km_partenza").val(km);
                    $('#km').val(km);
                }
            });
        $.ajax({
            url: "controller/updateAutoparco.php?action=getPreninfo",
            type:"POST",
            data: {id:idpren},
            dataType: 'json',
            success:function(data){
                console.log(data[0].modello); 
                    commessa = data[0].commessa;
                    destinazione =data[0].destinazione;
                    $('#commessakm').val(commessa);
                    $('#destinazionekm').val(destinazione);
                   
            }
        });
    }

    function upcKm(idvei,id){
        getLocation();

        $('#kmmodal').modal('show'); 
        $('#km').removeAttr("readonly");
        $('#checkkm').hide();
        $('#tipo').val("A");
        $('#id_reg').val(id);
        $.ajax({
                url: "controller/updateAutoparco.php?action=getVeinfo",
                type:"POST",
                data: {id:idvei},
                dataType: 'json',
                success:function(data){
                    console.log(data[0].modello)
                        id_veicolo = data[0].id_veicolo;
                        modello =data[0].modello;
                        km =data[0].km;
                    $('#id_veicolokm').val(id_veicolo);
                    $('#modellokm').val(""+modello+" "+id_veicolo+"");
                    $("#km_partenza").val(km);
                    $("#km").val(km).prop('min',km);
                    
                }
            });
        $.ajax({
                url: "controller/updateAutoparco.php?action=getReginfo",
                type:"POST",
                data: {id:id},
                dataType: 'json',
                success:function(data){
                   console.log(data[0].commessa); 
                   commessa = data[0].commessa;
                   destinazione =data[0].destinazione;
                      
                   
                    $('#commessakm').val(commessa);
                    $('#destinazionekm').val(""+destinazione+"");
                   
                }
            });

    }
    
  $(document).ready(function(){
        $('input[name=checkkm]').change(function(){
            check = $("input[name='checkkm']:checked").val();
            if (check ==1){
                $('#km').removeAttr("readonly");
            }else{
                $('#km').attr("readonly", "readonly");
            }
        });
       
        
    });

  
</script>
<script>
        
   // var x = document.getElementById("demo");

    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
    }

    function showPosition(position) {
  //  x.innerHTML = "Latitude: " + position.coords.latitude +"<br>Longitude: " + position.coords.longitude;
    $('#coordinate1').val(position.coords.latitude);
    $('#coordinate2').val(position.coords.longitude);
    

    }
</script>

</body>
</html>  