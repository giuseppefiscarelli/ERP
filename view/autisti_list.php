  <?php

  $filiali = getFiliali();
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
                  <label for="search2" class="col-sm-8 col-form-label">Sede/Filiale</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="search2" 
                  id="search2" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona Sede/Filiale</option>
                        <?php foreach ($filiali as $f){ ?>
                        
                        <option value="<?=$f['filiale']?>" <?=$search2 == $f['filiale']?'selected':''?>><?=$f['filiale']==1?"Setec":''?><?=$f['filiale']==2?"Alitalia":''?></option>
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
            <h5 class="card-title">Autisti</h5>
            <!--<a  class="btn btn-primary" style="margin-bottom: 10px;"
            href="<?=$updateUrl?>?action=insert">
            <i class="fa fa-user-plus"></i> Aggiungi </a>-->
            <small style="float: right;">Totale Utenti <b><?=$totalUsers?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>  
            <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nominativo</th>
                                <th>Email</th>
                                <th>Sede/filiale</th>
                               
                                <th>Abilitazione Guida</th>    
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($autisti){
                                    foreach ($autisti as $a){?>
                            <tr>
                                <td><?= $a['id'] ?></td>
                                <td><?= $a['cognome']." ".$a['nome'] ?><br><small><?=$a['roletype']?></small></td>
                                <td><?= $a['email'] ?></td>
                                <td><?php if($a['filiale']==1){?>    
                                    <img src="images/logo_setec_250.png" style="padding: 5px;height: 40px;max-width: -webkit-fill-available;">
                                <?}elseif($a['filiale']==2){?>
                                    <img src="images/Alitalia-Logo.png" style="padding: 5px;height: 40px;max-width: -webkit-fill-available;">
                                    <?}?>
                                </td>
                                
                                <td>
                                <input onchange="ab_guida(this,<?=$a['id']?>);"type="checkbox" <?= $a['ab_guida'] =="S"?'checked':'' ?> class="js-switch" data-color="#04b962"  data-secondary-color="#f43643"/>
                                
                               
                                
                               
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

<?php
                            require_once 'view/navigation.php';
                                ?>