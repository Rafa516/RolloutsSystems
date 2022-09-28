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
            <center><img src="res/user/img/logo.png" class="logo" alt="">

                <center>
                     <!--Widget Start-->
                   
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
                                <h3>
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
                   
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
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
                    
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
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
                   
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
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
                   
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos de Entregas</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-share" aria-hidden="true"></i>
                                  <?php if( totalTermosEntrega() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum  de Entrega</p>
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
                   
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos de Devolução</b></span></center>
                                    </h3>
                                    <br>
                                     <i class="fa fa-reply" aria-hidden="true"></i>

                                       <?php if( totalTermosDevolucao() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum  de Entrega</p>
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
                   
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Pendentes</b></span></center>
                                    </h3>
                                    <br>
                                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>

                                     <?php if( totalTermosPendente() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum  de Entrega</p>
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
                   
                        <div class="card-body color" style="background-color:#2E2E2E">
                           
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Termos Finalizados</b></span></center>
                                    </h3>
                                    <br>
                                       <i class="fa fa-check" aria-hidden="true"></i>
                                       <?php if( totalTermosFinalizado() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum  de Entrega</p>
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


                          


                    <!--Widget Start-->
                    <a href="admin/usuarios">
                        <div class="card-body color" style="background-color:#0431B4">
                           
                                <h3>
                                    <h3>
                                        <center><span class="count"><b>Usuários Cadastrados</b></span></center>
                                    </h3>
                                    <br>
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                  
                                    <?php if( totalUsuarios() == 0 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;">Nenhum usuário</p>
                                    </center>

                                    <?php }elseif( totalUsuarios() == 1 ){ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalUsuarios(); ?> Usuário</p>
                                    </center>

                                    <?php }else{ ?>
                                    <center>
                                        <p style="font-size: 20px;"><?php echo totalUsuarios(); ?> Usuários</p>
                                    </center>

                                    <?php } ?>

                         

                        </div>
                  
                    <!--Widget End-->
                </center>

                <hr class="my-4" />


        </div>
    </div>
</div>