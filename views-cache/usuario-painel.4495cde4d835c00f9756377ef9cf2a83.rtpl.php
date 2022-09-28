<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
    <div class="content-inside">
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="background-color:#2E9AFE;color: white" class="nav-link active" id="home-tab"
                        data-toggle="tab" role="tab" aria-controls="home" aria-selected="false"><b>Painel de
                        Dados</b></a>
                </li>
            </ul>
            <center><img src="../res/user/img/logo.png" class="logo" alt=""></center>

 <p style="font-size: 20px;color: #585858;" class="small mb-1"><b>TODOS LOCAIS</b></p><hr>
                <center>
                    <!--Widget Start-->
                  
                        <div class="card-body color" style="background-color:#22242A">
                          
                                    <h3>
                                        <center><span class="count"><b>Rollouts Cadastrados</b></span></center>
                                    </h3>
                                    <br>
                                 <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <?php if( totalrollouts() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalRollouts() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalRollouts(); ?> Rollout</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalRollouts(); ?> Rollouts</p>
                                    </center>

                                    <?php } ?>

                            </div>

                      
                  
                    <!--Widget End-->

                      <!--Widget Start-->
                  
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Rollouts Finalizados</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                        <?php if( totalrolloutsFinalizado() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalrolloutsFinalizado() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalrolloutsFinalizado(); ?> Rollout</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalrolloutsFinalizado(); ?> Rollouts</p>
                                    </center>

                                    <?php } ?>
                                  
                    

                        </div>
                   
                    <!--Widget End-->

                       <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Rollouts Pendentes</b></span></center>
                                    </h3>
                                    <br>
                                 
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                           <?php if( totalrolloutsPendente() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalrolloutsPendente() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalrolloutsPendente(); ?> Rollout</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalrolloutsPendente(); ?> Rollouts</p>
                                    </center>

                                    <?php } ?>
                                  
                        

                        </div>
                   
                    <!--Widget End-->

                    <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Cadastrados</b></span></center>
                                    </h3>
                                    <br>

                                 <i class="fa fa-list-alt" aria-hidden="true"></i>
                                
                                    <?php if( totalTermos() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalTermos() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermos(); ?> Termo</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermos(); ?> Termos</p>
                                    </center>

                                    <?php } ?>


                        </div>
                   
                    <!--Widget End-->


                    <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos de Entregas</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-share" aria-hidden="true"></i>
                                  <?php if( totalTermosEntrega() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosEntrega() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosEntrega(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosEntrega(); ?> Termos </p>
                                    </center>

                                    <?php } ?>

                                   

                       

                        </div>
                   
                    <!--Widget End-->

                       <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos de Devolução</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                       <?php if( totalTermosDevolucao() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosDevolucao() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosDevolucao(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosDevolucao(); ?> Termos </p>
                                    </center>

                                    <?php } ?>
                                
                                   


                        </div>
                   
                    <!--Widget End-->

                      <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Pendentes</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                     <?php if( totalTermosPendente() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosPendente() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosPendente(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosPendente(); ?> Termos </p>
                                    </center>

                                    <?php } ?>
                                
                                   

                         

                        </div>
                   
                    <!--Widget End-->

                       <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Finalizados</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                       <?php if( totalTermosFinalizado() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosFinalizado() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosFinalizado(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosFinalizado(); ?> Termos </p>
                                    </center>

                                    <?php } ?>
                                
                                   

                          

                        </div>
                   
                    <!--Widget End-->


         <!---------------------------------------------------------------BRASÍLIA--------------------------------------------------------------------->         
            <?php if( $usuario["localidade"] == 'Brasília' ){ ?>
                <hr class="my-4" />

                </center><p style="font-size: 20px;color: #585858;" class="small mb-1"><b>BRASÍLIA</b></p><hr>
                <center>
                    <!--Widget Start-->
                  
                        <div class="card-body color" style="background-color:#22242A">
                          
                                    <h3>
                                        <center><span class="count"><b>Rollouts Cadastrados</b></span></center>
                                    </h3>
                                    <br>
                                 <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <?php if( totalrolloutsBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalRolloutsBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalRolloutsBsb(); ?> Rollout</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalRolloutsBsb(); ?> Rollouts</p>
                                    </center>

                                    <?php } ?>

                            </div>

                      
                  
                    <!--Widget End-->

                      <!--Widget Start-->
                  
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Rollouts Finalizados</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                        <?php if( totalRolloutsFinalizadoBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalRolloutsFinalizadoBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalRolloutsFinalizadoBsb(); ?> Rollout</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalRolloutsFinalizadoBsb(); ?> Rollouts</p>
                                    </center>

                                    <?php } ?>
                                  
                    

                        </div>
                   
                    <!--Widget End-->

                       <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Rollouts Pendentes</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                   
                                           <?php if( totalrolloutsPendenteBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalrolloutsPendenteBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalrolloutsPendenteBsb(); ?> Rollout</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalrolloutsPendenteBsb(); ?> Rollouts</p>
                                    </center>

                                    <?php } ?>
                                  
                        

                        </div>
                   
                    <!--Widget End-->

                    <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Cadastrados</b></span></center>
                                    </h3>
                                    <br>

                                 <i class="fa fa-list-alt" aria-hidden="true"></i>
                                
                                    <?php if( totalTermosBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum </p>
                                    </center>

                                    <?php }elseif( totalTermosBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosBsb(); ?> Termo</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosBsb(); ?> Termos</p>
                                    </center>

                                    <?php } ?>


                        </div>
                   
                    <!--Widget End-->


                    <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos de Entregas</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-share" aria-hidden="true"></i>
                                  <?php if( totalTermosEntregaBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosEntregaBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosEntregaBsb(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosEntregaBsb(); ?> Termos </p>
                                    </center>

                                    <?php } ?>

                                   

                       

                        </div>
                   
                    <!--Widget End-->

                       <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos de Devolução</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                       <?php if( totalTermosDevolucaoBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosDevolucaoBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosDevolucaoBsb(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosDevolucaoBsb(); ?> Termos </p>
                                    </center>

                                    <?php } ?>
                                
                                   


                        </div>
                   
                    <!--Widget End-->

                      <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Pendentes</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                     <?php if( totalTermosPendenteBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosPendenteBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosPendenteBsb(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosPendenteBsb(); ?> Termos </p>
                                    </center>

                                    <?php } ?>
                                
                                   

                         

                        </div>
                   
                    <!--Widget End-->

                       <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#22242A">
                          
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Finalizados</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                       <?php if( totalTermosFinalizadoBsb() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum Registrado</p>
                                    </center>

                                    <?php }elseif( totalTermosFinalizadoBsb() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosFinalizadoBsb(); ?> Termo </p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalTermosFinalizadoBsb(); ?> Termos </p>
                                    </center>

                                    <?php } ?>
                                
                                   

                          

                        </div>
                   
                    <!--Widget End-->

                    <?php } ?>


                 

                <hr class="my-4" />


        </div>
    </div>
</div>