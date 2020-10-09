<?php
require_once 'model/autoparco.php';
  $ass = getPrenDip();
 // var_dump($ass);
  $disp = getDisp('D');
  $work = getWorkDip($_SESSION['userData']['username']);
  //var_dump($work);//die;
  $today = date("Y-m-d H:i:s");
  $tod =date("Y-m-d");
  //$veiWork = $work['id_veicolo'];
  //$veiWork=(getWork($work['id_veicolo']));

 //var_dump($veiWork);die;

?>
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
                                    if($work){
                                        foreach($work as $w){
                                            $vW=getVeicolopage($w['id_veicolo']);
                                            //var_dump($vW);
                                            
                                            ?>
                                            
                                    <tr>
                                        <td ><?=$vW['modello']?> <?=$w['id_veicolo']?><br>
                                        <a type="button" class="btn btn-success btn-sm"  onclick="upcKm(<?=$w['id_veicolo']?>,<?=$w['id']?>)" style="color:white;width: -webkit-fill-available;" >Consegna</a><br>
                                        <a type="button" class="btn btn-info btn-sm"  onclick="info(<?=$w['id_veicolo']?>)" style="color:white;margin-top:5px;width: -webkit-fill-available;" >Info Veicolo</a><br>
                                        <a type="button" class="btn btn-danger btn-sm" style="color:white;margin-top:5px;width: -webkit-fill-available;" href="http://www.google.com/maps/place/<?=$w['destinazione']?>" target="_blank">Apri in Maps</a>
                                        </td>
                                       
                                        <td><?=$w['commessa']?></td>
                                        <td><a href="http://www.google.com/maps/place/<?=$w['destinazione']?>" target="_blank"><?=$w['destinazione']?></a><br><small>Apri in Maps</small></td>
                                        <td><?=$w['km']?></td>
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
                                            if($a['data_fine']>$today){
                                            $id_veicolo = $a['id_veicolo'];
                                             $vei= getVeicolopage($id_veicolo);
                                            //var_dump($vei);
                                            //var_dump($vei['id']);?>
                                    <tr>
                                        
                                        <td><?=$vei['modello']." ".$vei['id_veicolo']?><br><?php
                                                

                                                if(date("Y-m-d H:i:s",strtotime($a['data_inizio']))<=$today){?>
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
                                        }
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


    <div class="col-lg-4">
		     <!-- Large Size Modal -->
             
               
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
                                            <form  id="addform" action="controller/updateKm.php" method="post">
                                                <input type="hidden" name="action" value ="insert">
                                                <input type="hidden" name="tipo" id="tipo" value="P">
                                                <input type="hidden" id="id_veicolo" name="id_veicolo" value="">
                                                <input type="hidden" id="id_reg" name="id_reg" value="">
                                                <input type="hidden" id="lat" name="lat" value="">
                                                <input type="hidden" id="lon" name="lon" value="">
                                                <input type="hidden" name="km_partenza" id="km_partenza"value="">

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Veicolo</label>
                                                        <div class="col-lg-3 col-12">
                                                            <input type="text" style="text-align: right;"  class="form-control " id="modello" value="" readonly >  
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
                                                            <input type="number" style="text-align: right;"  class="form-control "max="99999" id="commessa" readonly name="commessa" value="">
                                                        </div>            
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="destinazione" class="col-sm-3 col-form-label">Destinazione</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" maxlength="50"class="form-control " id="destinazione" name="destinazione" value="">
                                                            </div>  
                                                    </div>
                                                          
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Annulla</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Salva</button>
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
                        if(pneumatici=="E"){
                            pneumatici = "<span class=\"badge badge-pill badge-warning m-1\"><i class=\"fa fa-sun-o\"></i> Estivi </span>";
                        }
                        if(pneumatici=="I"){
                            pneumatici = "<span class=\"badge badge-pill badge-info m-1\"><i class=\"fa fa-sun-o\"></i> invernali </span>";
                        }
                        if(pneumatici=="Q"){
                            pneumatici = "<span class=\"badge badge-pill badge-success m-1\"><i class=\"fa fa-sun-o\"></i> <i class=\"fa fa-snowflake-o\"></i> 4 stagioni</span>";
                        }
                        if(catene=="P"){
                            catene = "<span class=\"badge badge-pill badge-success m-1\"> Provvisto </span>";
                        }else{
                            catene = "<span class=\"badge badge-pill badge-warning m-1\"> Non Provvisto </span>";
                        }
                        if(gilet=="P"){
                            gilet = "<span class=\"badge badge-pill badge-success m-1\"> Provvisto </span>";
                        }else{
                            gilet = "<span class=\"badge badge-pill badge-warning m-1\"> Non Provvisto </span>";
                        }
                        if(kit_soccorso=="P"){
                            kit_soccorso = "<span class=\"badge badge-pill badge-success m-1\"> Provvisto </span>";
                        }else{
                            kit_soccorso = "<span class=\"badge badge-pill badge-warning m-1\"> Non Provvisto </span>";
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
                    console.log(data[0].modello); 
                        id_veicolo = data[0].id_veicolo;
                        modello =data[0].modello;
                        km =data[0].km;
                    $('#id_veicolo').val(id_veicolo);
                    $('#modello').val(""+modello+" "+id_veicolo+"");
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
                    $('#commessa').val(commessa);
                    $('#destinazione').val(destinazione);
                   
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
                    $('#id_veicolo').val(id_veicolo);
                    $('#modello').val(""+modello+" "+id_veicolo+"");
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
                      
                   
                    $('#commessa').val(commessa);
                    $('#destinazione').val(""+destinazione+"");
                   
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
  

    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert("Geolocation is not supported by this browser.");
    }
    }

    function showPosition(position) {
    
    $('#lat').val(position.coords.latitude);
    $('#lon').val(position.coords.longitude);
    

    }
</script>
</body>
</html>  