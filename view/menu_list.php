<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
//var_dump(getMenuAmbiente());
$manageMenu = getMenuAmbiente();
$mainMenus = getMenuAmbienteMain();
$ambienti =getAmbienti();
?>

<button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-new"><i class="fa fa-plus"></i> Nuovo Ambiente</button>
                        <div class="modal fade" id="modal-animation-new" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content animated fadeInUp">
                                <form id="personal-info" action="controller/updateMenu.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Nuovo Ambiente </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <input type="hidden" name="id" value ="">
                                        <input type="hidden" name="action" value ="saveAmb">    
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nome</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control"  value="" id="nomeambiente" name="nomeambiente">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Homepage</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="" id="homepage" name="homepage">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Logo</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control"  value="" id="logo" name="logo">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Favicon</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="" id="favicon" name="favicon">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                    
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Inserisci</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <br><br>
<div class = "row">
    <div class="col-lg-12">
        <div id="accordion1">
<?php
     if($ambienti){
        foreach ($ambienti as $amb ) {?>

            <div class="card mb-2">
                <div class="card-header">
                    <button class="btn btn-link shadow-none collapsed" data-toggle="collapse" data-target="#collapse-<?=$amb['id']?>" aria-expanded="false" aria-controls="collapse-<?=$amb['id']?>">
                    Ambiente <?=$amb['nomeambiente']?>
                    </button>
                    
                </div>

                <div id="collapse-<?=$amb['id']?>" class="collapse" data-parent="#accordion1" style="">
                <div class="card-body">
                    
                        <h5 class="card-title">Ambiente <?=$amb['nomeambiente']?></h5>
                                <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-<?=$amb['id']?>">Gestione Ambiente</button>
                                <a href="<?=$updateUrl?>?action=update&ambiente=<?=$amb['id']?>&menu=main" class="btn btn-info waves-effect waves-light">
                                                        <i class="fa fa-plus"></i> Nuovo menu</a>



                        <div class="modal fade" id="modal-animation-<?=$amb['id']?>" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content animated fadeInUp">
                                <form id="personal-info" action="controller/updateMenu.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ambiente <?=$amb['nomeambiente']?> #<?=$amb['id']?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <input type="hidden" name="id" value ="<?=$amb['id']?>">
                                        <input type="hidden" name="action" value ="<?=$amb['id']?'storeAmb':'save'?>">    
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nome</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control"  value="<?=$amb['nomeambiente']?>" id="nomeambiente" name="nomeambiente">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Homepage</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?=$amb['homepage']?>" id="homepage" name="homepage">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Logo</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control"  value="<?=$amb['logo']?>" id="logo" name="logo">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Favicon</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?=$amb['favicon']?>" id="favicon" name="favicon">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <a onclick="return confirm('Vuoi Eliminare il Record?')" class="btn btn-danger" 
                                        href="<?=$deleteUrl?>?id=<?=$amb['id']?>&action=deleteAmb">
                                                <i class="fa fa-trash"></i>
                                                Elimina
                                            </a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> <?=$amb['id']?'Aggiorna':'Inserisci'?></button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                    <br><br>
                        
                            <div class="table-responsive">
                                <table class="table table-hover table-expandable ">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">Menu</th>
                                            <th scope="col">Posizione</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Funzione</th>
                                            <th scope="col"></th>
                                            <th scope="col">icona</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if ($mainMenus){
                                            
                                            foreach ($mainMenus as $mainM){
                                                if ($mainM['menu']==='main' and $mainM['ambiente'] === $amb['id']){  
                                                            ?>
                                        <tr    data-toggle="collapse" data-target=".<?=$a=str_replace(' ','',$mainM['nome']) ?>">
                                            <input type="hidden" name="id" value = "<?=$mainM['id']?>" >       
                                            <td><?=$mainM['menu']?></td>
                                            <td><?=$mainM['posizione']?></td>
                                            <td><?=$mainM['nome']?></td>
                                            <td><?=$mainM['funzione']?></td>
                                            <td><?php if($mainM['funzione'] ==='menu'){?>
                                                <a href="<?=$updateUrl?>?action=update&ambiente=<?=$mainM['ambiente']?>&menu=<?=$mainM['nome']?>&sub1=<?=$mainM['nome']?>" class="btn btn-info waves-effect waves-light">
                                                        <i class="fa fa-plus"></i> Nuovo menu/funzione</a>
                                                <button type="button" class="btn btn-info btn-round m-1">Espandi</button>
                                             <?php }?></td>
                                            <td><i class="fa <?=$mainM['icona']?>"></i></td>
                                            <td> <div class="row">
                                            <div class="card-body" style="padding:0px;">

                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a href="<?=$updateUrl?>?action=update&id=<?=$mainM['id']?>" class="dropdown-item">
                                                        <i class="fa fa-pencil"></i> Modifica</a>
                                                    <a onclick="return confirm('Vuoi Eliminare il Record?')"
                                                    href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$mainM['id']?>&action=delete" class="dropdown-item">
                                                        <i class="fa fa-trash"></i> Elimina</a>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div></td>
                                        </tr>
                                        <?php if($mainM['funzione'] ==='menu'){
                                            $subParMenu = $mainM['nome'];

        
                                            $submenuL1 = getSubMenu1($subParMenu);
                                            if ($submenuL1){
                                                foreach($submenuL1 as $subL1){?>
                                            
                                            
                                            
                                            <tr  class="collapse <?=$a=str_replace(' ','',$mainM['nome']) ?>">
                                                       
                                                <td><?=$subL1['menu']?></td>
                                                <td><?=$subL1['posizione']?></td>
                                                <td><?=$subL1['nome']?></td>
                                                <td><?=$subL1['funzione']?></td>
                                                <td></td> 
                                                <td><i class="fa <?=$subL1['icona']?>"></i></td>
                                                <td> <div class="row">
                                        <div class="card-body" style="padding:0px;">

                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a href="<?=$updateUrl?>?action=update&id=<?=$subL1['id']?>" class="dropdown-item">
                                                        <i class="fa fa-pencil"></i> Modifica</a>
                                                    <a onclick="return confirm('Vuoi Eliminare il Record?')"
                                                    href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$subL1['id']?>&action=delete" class="dropdown-item">
                                                        <i class="fa fa-trash"></i> Elimina</a>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div></td>
                                            </tr>    
                                        <?php }
                                    }
                                    } ?>   
                                        
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>           
        
<?            
        }
    }
?>
</div>
    </div>
</div>
<style>
tr.collapse.in {
  display:table-row;
}
</style>

