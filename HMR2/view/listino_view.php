                                        <div class="modal fade" id="modal-<?=$modalView ?>" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content border-0">
                                                        <div class="modal-header"><h4 class="modal-title">Scheda Veicolo</h4></div>
                                                        <div class="modal-body">
                                                            <div class=row>
                                                                <div class="col-lg-7">
                                                                    <img class="d-block w-100 card-img-top" src="images/listino/<?=rtrim($list['lisdve']," ")?>.jpg" alt="Card image cap" >
                                                                </div>
                                                                <div class=" col-lg-5">
                                                                        <ul class="list-group list-group-flush list shadow-none"  style="padding:10px;" cal>
                                                                            <li class="list-group-item ">
                                                                                <div class="media align-items-center">
                                                                                    <div class="media-body ml-3"><h6 class="mb-0">Tipologia</h6></div>
                                                                                    <div class="date"><b><?= tabCodifica($tab,'listip',$list['listip'])?></b></div>
                                                                                        
                                                                                </div> 
                                                                            </li>
                                                                            <li class="list-group-item ">
                                                                                <div class="media align-items-center">
                                                                                    <div class="media-body ml-3"><h6 class="mb-0">Gamma</h6></div>
                                                                                    <div class="date"><b><?= tabCodifica($tab,'lisgam',$list['lisgam'])?></b></div>
                                                                                        
                                                                                </div> 
                                                                            </li>
                                                                            <li class="list-group-item ">
                                                                                <div class="media align-items-center">
                                                                                    <div class="media-body ml-3"><h6 class="mb-0">Potenza</h6></div>
                                                                                    <div class="date"><b><?= $list['liskw']?> KW</b></div>
                                                                                        
                                                                                </div> 
                                                                            </li>
                                                                            <li class="list-group-item "></li>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                                    <div class="card-body">
                                                                        <h5 class="card-title text-dark"><?=$list['lisdes']?></h5>
                                                                        <p class="card-text">Codice Listino <b><?=$list['lisdve']?></b></p>
                                                                    </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <ul class="list-group list-group-flush list shadow-none"  style="padding:10px;" cal>
                                                                                    <li class="list-group-item ">
                                                                                        <div class="media align-items-center">
                                                                                            <div class="media-body ml-3"><h6 class="mb-0">Listino</h6></div>
                                                                                            <div class="date" style="text-align:right;">n° <b><?=$list['lisnum']?></b><br>valido dal <b><?=$list['lisdat']?></b></div>
                                                                                                
                                                                                        </div> 
                                                                                    </li>
                                                                                    <li class="list-group-item ">
                                                                                        <div class="media align-items-center">
                                                                                            <div class="media-body ml-3"><h6 class="mb-0">Prezzo al Pubblico</h6></div>
                                                                                            <div class="date" style="text-align:right;">iva inc € <b><?=$lisppi?></b><br>iva esc € <b><?=$lisppe?></b></div>
                                                                                                
                                                                                        </div> 
                                                                                    </li>
                                                                                    <li class="list-group-item ">
                                                                                        <div class="media align-items-center">
                                                                                            <div class="media-body ml-3"><h6 class="mb-0">Prezzo Riservato</h6></div>
                                                                                            <div class="date" style="text-align:right;">iva inc € <b><?=$lispri?></b><br>iva esc € <b><?=$lispre?></b></div>
                                                                                                
                                                                                        </div> 
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                            </div>
                                                                        </div>
                                                        </div> 
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"> Indietro</i></button>
                                                        </div>       
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        

                                         