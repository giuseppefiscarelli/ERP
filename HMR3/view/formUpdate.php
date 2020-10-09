
<div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <form id="personal-info" action="controller/updateUser.php" method="post">
                <input type="hidden" name="id" value ="<?=$user['id']?>">
                <input type="hidden" name="action" value ="<?=$user['id']?'store':'save'?>">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-user-circle-o"></i>
                  <?=$user['id']?'Modifica Utente':'Inserimento Nuovo Utente'?>
                </h4>

                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="username" value="<?=$user['username']?>" class="form-control" id="username" name="username" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-5">
                    <input type="password" placeholder="inserire nuova password" value="" class="form-control" id="password" name="password" >
                  </div>
                </div>

                <div class="form-group row">
                <label for="roletype" class="col-sm-3 col-form-label">Ruolo</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="roletype" name="roletype" required>
                        <option value="">Seleziona</option>
                        <?php foreach ($roletype as $role){ ?>
                        
                        <option value="<?=$role?>" <?=$user['roletype']  == $role?'selected':''?>><?=$role?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">email</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="email" value="<?=$user['email']?>" class="form-control" id="email" name="email" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="cognome" class="col-sm-3 col-form-label">cognome</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="cognome" value="<?=$user['cognome']?>" class="form-control" id="cognome" name="cognome" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nome" class="col-sm-3 col-form-label">nome</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="nome" value="<?=$user['nome']?>" class="form-control" id="nome" name="nome" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="ambiente" class="col-sm-3 col-form-label">ambiente</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="ambiente" value="<?=$user['ambiente']?>" class="form-control" id="ambiente" name="ambiente" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="azienda" class="col-sm-3 col-form-label">azienda</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="azienda" value="<?=$user['azienda']?>" class="form-control" id="azienda" name="azienda" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="filiale" class="col-sm-3 col-form-label">filiale</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="filiale" value="<?=$user['filiale']?>" class="form-control" id="filiale" name="filiale" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="logoazienda" class="col-sm-3 col-form-label">logo</label>
                  <div class="col-sm-5">
                    <input type="text" placeholder="nome file logo" value="<?=$user['logoazienda']?>" class="form-control" id="logoazienda" name="logoazienda" required>
                  </div>
                </div>


<!--
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="input-3" name="email" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-4" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-4" name="phone" required="">
                  </div>
                </div>
                <h4 class="form-header">
                <i class="fa fa-file-text-o"></i>
                  REQUIREMENTS
                </h4>
                <div class="form-group row">
                  <label for="input-5" class="col-sm-2 col-form-label">Company</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-5" name="company" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-6" class="col-sm-2 col-form-label">Interested In</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-6" name="intersted" required="">
                        <option value="">Seleziona</option>
                        <?php foreach ($roletype as $val){ ?>
                        
                        <option value="<?=$val?>" <?=$roletype ==$val?'selected':''?>><?=$val?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-7" class="col-sm-2 col-form-label">Budget</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="input-7" name="budget" required="">
                        <option>BUDGET</option>
                        <option>Less then 2000$</option>
                        <option>2000$ - 10000$</option>
                        <option>10000$ - 20000$</option>
                        <option>Above 20000$</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Select File</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="input-8" name="file" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">About Project</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-9" name="aboutuser" required=""></textarea>
                  </div>
                </div>

-->
                <div class="form-footer">
                    <?php
                    if($user['id']){?>
                    <a onclick="return confirm('Vuoi Eliminare il Record?')" class="btn btn-danger" 
                    href="<?=$deleteUrl?>?id=<?=$user['id']?>&action=delete">
                                                <i class="fa fa-trash"></i>
                                                Elimina
                                            </a>
                    <?php }?>            
                    <button  onclick="history.back();" class="btn btn-danger">
                            <i class="fa fa-times"></i> Indietro</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check-square-o"></i> <?=$user['id']?'Aggiorna':'Inserisci'?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>