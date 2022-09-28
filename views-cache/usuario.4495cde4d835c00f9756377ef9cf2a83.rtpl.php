<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
    <div class="content-inside">
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab"
                        data-toggle="tab" role="tab" aria-controls="home" aria-selected="false"><b>Home</b></a>
                </li>
            </ul>



            <center><img src="../res/user/img/logo.png" class="logo" alt=""></center>

            <center>
                <p>Bem vindo <b><?php echo getUsuarioNome(); ?></b> ao Sistema de registros, gerenciamento de Rollouts,
                    termos de devolução/entrega e o controle do estoque para a empresa ONS (Operador Nacional do Sistema Elétrico).</p><br>

            


              <?php if( $usuario["localidade"] =='Brasília' ){ ?>
             <a style="width: 15%;" href="/usuario/registrar-rollout-bsb"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Rollout</b></a>
            <button style="width: 15%;" data-toggle="modal" data-target="#imageModal" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Termo</b> </button>
            
            <?php }elseif( $usuario["localidade"] =='Florianópolis' ){ ?>      
             <a style="width: 15%;" href="/usuario/registrar-rollout-flr"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Rollout</b></a>

              <a style="width: 15%;" href="/usuario/registrar-termos-flr"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Termo</b></a>
         
            <?php }elseif( $usuario["localidade"] =='Recife' ){ ?>      
             <a style="width: 15%;" href="/usuario/registrar-rollout-rec"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Rollout</b></a>

              <a style="width: 15%;" href="/usuario/registrar-termos-rec"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Termo</b></a>
          

             <?php }else{ ?>      
             <a style="width: 15%;" href="/usuario/registrar-rollout-rj"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Rollout</b></a>

              <a style="width: 15%;" href="/usuario/registrar-termos-rj"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Termo</b></a>
            <?php } ?>


                <hr class="my-4" />


        </div>
    </div>
</div>

<!-- Modal Termo -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModal">Selecione o Termo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <?php if( $usuario["localidade"] =='Brasília' ){ ?>
         <center>
         <a style="width: 30%;" href="/usuario/registrar-termos-entrega-bsb"class="btn btn-info btn-sm"><b> Entrega</b></a>
         <a style="width: 30%;" href="/usuario/registrar-termos-devolucao-bsb"class="btn btn-primary btn-sm"></i><b> Devolução</b></a>
         </center>
         <?php } ?>
      
      </div>
    </div>
  </div>
  </div>

<script src="/res/user/js/functions.js"></script>