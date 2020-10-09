<div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <form id="personal-info" action="controller/updateMenu.php" method="post">
                <input type="hidden" name="id" value ="<?=$mMenu['id']?>">
                <input type="hidden" name="action" value ="<?=$mMenu['id']?'storeMenu':'saveMenu'?>">
                <input type="hidden" name="ambiente" value="<?=$mMenu['ambiente']?>">
                <input type="hidden" name="menu" value="<?=$mMenu['menu']?>">

                <h4 class="form-header text-uppercase">
                  <i class="fa fa-list-ul"></i>
                  <?=$mMenu['id']?'Modifica Menu':'Inserimento Nuova Voce menu '?><?=$mMenu['menu']?>
                </h4>
                
                
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">posizione</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="posizione" value="<?=$mMenu['posizione']?>" class="form-control" id="posizione" name="posizione" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">nome</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="nome" value="<?=$mMenu['nome']?>" class="form-control" id="nome" name="nome" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">funzione</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="funzione" value="<?=$mMenu['funzione']?>" class="form-control" id="funzione" name="funzione" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">icona</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="icona" value="<?=$mMenu['icona']?>" class="form-control" id="icona" name="icona" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">sub1</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="sub1" value="<?=$mMenu['sub1']?>" class="form-control" id="sub1" name="sub1" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">sub2</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="sub2" value="<?=$mMenu['sub2']?>" class="form-control" id="sub2" name="sub2" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">sub3</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="sub3" value="<?=$mMenu['sub3']?>" class="form-control" id="sub3" name="sub3" >
                  </div>
                </div>



                <div class="form-footer">
                    <?php
                    if($mMenu['id']){?>
                    <a onclick="return confirm('Vuoi Eliminare il Record?')" class="btn btn-danger" 
                    href="<?=$deleteUrl?>?id=<?=$mMenu['id']?>&action=delete">
                                                <i class="fa fa-trash"></i>
                                                Elimina
                                            </a>
                    <?php }?>            
                    <button  onclick="history.back();" class="btn btn-danger">
                            <i class="fa fa-times"></i> Indietro</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check-square-o"></i> <?=$mMenu['id']?'Aggiorna':'Inserisci'?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>