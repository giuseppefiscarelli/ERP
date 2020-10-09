<div class="row">
      <div class="col-12 col-lg-6 col-xl-6">
         
    <div class="card">
          <div class="card-header">Horizontal Form</div>
           <div class="card-body">
            <form>
           <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-3">
            <input type="text" class="form-control" name="username" id="username" readonly="readonly" value="<?=$user['username']?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="cognome" class="col-sm-2 col-form-label">Cognome</label>
            <div class="col-sm-3">
            <input type="text" class="form-control" readonly="readonly" name="cognome"id="cognome" value="<?=$user['cognome']?>">
            </div>
          </div>
            <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-3">
            <input type="text" class="form-control" readonly="readonly" name=""id="input-23" value="<?=$user['nome']?>">
            </div>
            </div>
          <div class="form-group row">
            <label for="filiale" class="col-sm-2 col-form-label">Sede/Filiale</label>
            <div class="col-sm-3">
            <input type="text" class="form-control"  readonly="readonly" name="filiale"id="filiale"value="<?=$user['filiale']==1?"Setec":''?><?=$user['filiale']==2?"Alitalia":''?>" >
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                <input type="text" class="form-control"  name="email"id="email" value="<?=$user['email']?>">
                </div>
          </div>
          <div class="form-group row">
            <label for="input-25" class="col-sm-2 col-form-label">Password</label>
            <div class="col-md-3" id="checkpass">
                                                    
                                                    <div class="icheck-material-success">
                                                        <input type="checkbox" id="success2" value="1" name="checkpass">
                                                        <label for="success2">Cambia Password</label>
                                                    </div>
                                                </div>   
                <div class="col-sm-3">
                <input type="password" class="form-control" name="password"id="password" min-length="8" placeholder="inserisci nuova password - min 8 caratteri" disabled>
                </div>
          </div>
          
           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="button" onclick="window.history.back();"class="btn btn-danger px-5"><i class="fa fa-times"></i> Indietro</button>

            <button type="submit" class="btn btn-success px-5"><i class="icon-lock"></i> Salva Modifiche</button>
            </div>
          </div>
          </form>
         </div>
       </div>


     
      </div>