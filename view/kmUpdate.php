<?php

//var_dump(getVeicolo());
$vei = getVeicolo();

?>
<div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Inserimento KM</div>
                <div class="card-body">
                    <form  id="addform" action="controller/updateKm.php" method="post">
                        <input type="hidden" name="action" value ="insert">
                        <input type="hidden" name="tipo" value="P">
                        <div class="form-group">
                            <label for="input-6">Veicolo</label>
                            <select type="text" style="width: auto;text-align: right;"class="form-control form-control-rounded" id="id_veicolo" name="id_veicolo">
                                <option value="">Seleziona un Veicolo</option>

                                <?php
                                    if($vei){
                                        foreach($vei as $v){?>
                                      <option value="<?=$v['id_veicolo']?>"><?=$v['modello']." ".$v['id_veicolo']." - ".$v['targa']?></option>

                                <?        }
                                    }
                                ?>
                            
                            
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="input-7">Commessa</label>
                            <input type="number" style="width: auto;text-align: right;" onKeyPress="if(this.value.length==5) return false;" class="form-control form-control-rounded" id="commessa" name="commessa">
                        </div>

                        <div class="form-group">
                            <label for="input-8">Destinazione</label>
                            <input type="text" class="form-control form-control-rounded" id="destinazione" name="destinazione">
                        </div>

                        <div class="form-group">
                            <label for="input-9">km</label>
                            <input type="number" style="width: auto;text-align: right;" onKeyPress="if(this.value.length==6) return false;"class="form-control form-control-rounded" id="km" name="km">
                        </div>


                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-round px-5"><i class="fa fa-mail-forward"></i> Salva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</div>
