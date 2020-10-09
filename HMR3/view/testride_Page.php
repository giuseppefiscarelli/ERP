<div class="row">
    <div class="col-12">

        <div class="card" style="
    background-color: #dee2e68c;"> <!-- main card-->
            <div class="card-header" style="background-image: url(images/fondo_2.jpg);box-shadow: inset 0px 0px 5px 0px #9d9d9d">
                <div class="row">
                    <div class="col-md-3"><h3 style="text-shadow: 4px 2px 2px #c6c6c6;">TestRide #<?=$tr['id']?></h3>
                    </div>
                    <div class="col-md-8"> 
                        <div>
                            <button style="float: right;margin-left:10px;" type="reset" class="btn btn-warning" onclick="document.location.href = 'hmrteride.PGM?smurfid=0020d00dacc93a33ede2c4aca5c9f495b72d8aeb5169457fa31e540362dff5b7'" value="Annulla">
                            <i class="fa fa-undo"></i> Indietro
                            </button>
                        </div>  
                        <div> 
                            <button style="float: right;margin-left:10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">
                            <i class="fa fa-print "></i> Report
                            </button>
                            <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <button type="button" tabindex="0" class="dropdown-item" onclick="prtPdf()">Stampa Modulo Consegna Veicolo</button>
                                <button type="button" tabindex="0" class="dropdown-item" onclick="prtPdf2()">Stampa Modulo Riconsegna</button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                    <button type="button" tabindex="0" class="dropdown-item" onclick="prtPdf3()">Stampa Report TestRide Integrale</button>
                                </div>
                            </div>
                            <div> 
                                <button style="float: right;margin-left:10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-success">
                                    <i class="fa fa-cog"></i> Gestione 
                                </button>
                                <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a href="<?=$updateUrl?>?action=update&id=<?=$tr['id']?>" class="dropdown-item">
                                                        <i class="fa fa-edit"></i> Modifica</a>
                                    <button type="button" tabindex="0" class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-4">Gestione Riconsegna</button>
                                </div>
                            </div>  
                            <div>   
                                <button style="float: right;margin-left:10px;" class="btn btn-danger" onclick="if(confirm('Cancellare questo record?')) document.location.href='HMRTERIDE.pgm?task=del&amp;page=00000&amp;smurfid=0020d00dacc93a33ede2c4aca5c9f495b72d8aeb5169457fa31e540362dff5b7&amp;rrn=000000178'">
                                <i class="fa fa-trash"></i> Elimina  

                                </button>
                            </div>
                    </div>
                </div>
            </div><!-- end card header-->
            <div class="card-body">
                <div class="row"> 
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-user"></i> Dati Cliente
                            </div> 
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">ID</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$cli['id']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Cliente</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$cli['cognome']?> <?=$cli['nome']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Codice Fiscale</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$cli['codfiscale']?></b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-id-card-o"></i> Dati Patente
                            </div> 
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Tipo</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$patente['tipo_patente']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Numero</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$patente['numero_patente']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Ente Rilascio</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$patente['ente_rilascio']?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                             <h6 class="mb-0">Validità</h6>
                                            </div>
                                            <div class="date">
                                                 dal <b><?=$patente['data_rilascio']?></b>
                                                 <br>al <b><?=$patente['data_scadenza']?></b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>								
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-motorcycle"></i> Dati TestRide
                            </div> 
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Motoveicolo</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$veicolo['marca']?> <?=$veicolo['modello']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Targa</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$veicolo['targa']?></b>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <div class="card-header" style="font-size:large;"><i class="fa fa-calendar-check-o"></i> Dati Prenotazione
                            </div>	
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Consulente</h6>
                                            </div>
                                            <div class="date">
                                                <b> <?=$tr['user_ins']?></b>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Data/Ora</h6>
                                            </div>
                                            <div class="date">
                                                <b><?=$tr['data_ins']?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <?php if($tr['data_pren']){ ?>    
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Consegna Moto</h6>
                                            </div>
                                            <div class="date">
                                                <i class="fa fa-calendar"></i> Data/Ora <b><?=$tr['data_pren']?></b><br>
                                                <i class="fa fa-user"></i> Consulente <b><?=$tr['user_pren']?></b><br>
                                                <i class="fa fa-sort-numeric-asc"></i> KM Consegna <b><?=$tr['km_cons']?></b>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>
                                    <?php if($tr['data_ricons']){ ?>         
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Riconsegna Moto</h6>
                                            </div>
                                            <div class="date">
                                                <i class="fa fa-calendar"></i> Data/Ora <b><?=$tr['data_ricons']?></b><br>
                                                <i class="fa fa-user"></i> Consulente <b><?=$tr['user_ricons']?></b><br>
                                                <i class="fa fa-sort-numeric-asc"></i> KM Consegna <b><?=$tr['km_ricons']?></b>
                                                <i class="fa fa-hourglass"></i> Durata <b><?=$tr['durata_test']?> minuti</b><br>
                                            </div>
                                        </div>
                                    </li>
                                    <? } ?>            
                                </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header" style="font-size:large;"><i class="fa fa-motorcycle"></i> Report
                            </div> 
                                <ul class="list-group list-group-flush shadow-none">
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Report Consegna</h6>
                                            </div>
                                            <div class="date">
                                            <?php
                                            if( file_exists("docs/testride/report/".$tr['id']."_cons.pdf")){

                                            
                                            ?>
                                            <button type="button"  id="btnPdf1" class="btn btn-danger m-1" onClick="btnPdf1();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                            
                                            <? } ?>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Report Riconsegna</h6>
                                            </div>
                                            <div class="date">
                                            <?php
                                            if( file_exists("docs/testride/report/".$tr['id']."_ricons.pdf")){

                                            
                                            ?>
                                            <button type="button"  id="btnPdf2" class="btn btn-danger m-1" onClick="btnPdf2();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                            
                                            <? } ?>
                                            </div>
                                        </div>
                                    </li>
                               
                            	
                                
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">Report Integrale</h6>
                                            </div>
                                            <div class="date">
                                            <?php
                                            if( file_exists("docs/testride/report/".$tr['id']."_full.pdf")){

                                            
                                            ?>
                                            <button type="button"  id="btnPdf3" class="btn btn-danger m-1" onClick="btnPdf3();"> <i aria-hidden="true" class="fa fa-file-pdf-o"></i> </button>
                                            
                                            <? } ?>  
                                            </div>
                                        </div>
                                    </li>
                                </ul>           
                                    
                                   
                    </div>
                </div> <!-- end row card body-->

            </div><!-- end card row-->
                <div class="modal fade" id="modal-animation-4" style="display: none;" aria-hidden="true">
                <form id="upform" action="controller/updateTestride.php" method="post"> 
                <input type="hidden" id="id" name="id" value="<?=$tr['id']?>">
                <input type="hidden" id="id_cliente" name="id_cliente" value="<?=$cli['id']?>">
                <input type="hidden" name="action" value ="storeTestride">
                <input type="hidden" name="signCode" id="signCode" value="">  
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content animated slideInUp">
                                <div class="modal-header">
                                    <h5 class="modal-title">Riconsegna moto TestRide</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="col-12  ">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">KM</label>
                                                <div class="col-sm-8">
                                                <input type="text" id="km" name="km_ricons" class="form-control" value="<?=$tr['km_ricons']?$tr['km_ricons']:0.0?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12  ">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Data </label>
                                                <div class="col-sm-8">
                                                <input type="date" id="data_ricons" name="data_ricons" class="form-control" required="" value="<?=$tr['data_pren']?date("Y-m-d", strtotime($tr['data_pren'])):''?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12  ">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Ora </label>
                                                <div class="col-sm-8">
                                                <input type="time" id="ora_ricons" name="ora_ricons" required="" class="form-control" value="<?=$tr['data_pren']?date("H:i", strtotime($tr['data_pren'])):''?>">
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                            if( file_exists("docs/testride/sign/".$cli['id']."_sig_ricons_tr_".$tr['id'].".png")){

                                            
                                            ?>
                                        <img src="docs/testride/sign/<?=$cli['id']?>_sig_ricons_tr_<?=$tr['id']?>.png" >
                                            <?php }else{ ?>
                                        
                                        <div class="col-12">
                                            <div class="form-group row"  style="height: 300px;">
                                            			
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
                                        </div> 
                                        <?php } ?>       

                                        <div class="col-12  ">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">FotoReport</label>
                                                <div class="col-sm-8">
                                                <input type="file" id="freport" name="freport"  class="" >
                                                <textarea rows="3" class="form-control" id="basic-textarea"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">FotoReport2</label>
                                                <div class="col-sm-8">
                                                <input type="file" id="freport2" name="freport2"  class=""> 
                                                <textarea rows="3" class="form-control" id="basic-textarea"></textarea>                                   </div>
                                            </div>
                                        </div>            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Chiudi</button>
                                    <button type="submit" class="btn btn-success"onclick="conferma();"><i class="fa fa-check-square-o"></i> Conferma Riconsegna</button>
                                </div>
                            </div>
                        </div>
                    <form>                        
                </div>
        </div> <!--end main card -->
    </div>
</div>