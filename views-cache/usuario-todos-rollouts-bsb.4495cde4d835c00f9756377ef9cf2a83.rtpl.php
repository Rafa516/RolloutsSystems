<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Rollouts - Brasília - 
              <?php if( totalRolloutsBsb() == 0 ){ ?>
              Nenhum Registrado
              <?php }elseif( totalRolloutsBsb() == 1 ){ ?>
              <?php echo totalRolloutsBsb(); ?> Registrado
              <?php }else{ ?>
              <?php echo totalRolloutsBsb(); ?> Registrados
              <?php } ?> </b></a>

        </li>

      </ul>

       <?php if( $usuario["localidade"] =='Brasília' ){ ?>      

       <a style="width: 15%;" href="/usuario/registrar-rollout-bsb"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Rollout</b></a>

         <?php } ?>

     
   <?php if( totalRolloutsBsb() != 0 ){ ?>
      <div class="search" style="float: right">
        <form action="/usuario/todos-rollouts-bsb" method="get">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Digite sua pesquisa...">
            <span class="input-group-btn">
              <button class="btn btn" style="background-color: #2E9AFE;color: white" type="submit" id="search-btn"><i
                  class="fa fa-search" style="font-size:13px;"> PESQUISAR</i>
              </button>
            </span>
          </div>
        </form>
      </div><br><br>

       <?php if( $profileMsg != '' ){ ?>
      <div class="alert alert-success">
        <b><?php echo $profileMsg; ?></b>
      </div>
      <?php } ?>

      <div class="table-responsive">
        <table class="table table-hover table-sm  table-bordered">
          <thead class="table table-dark">
            <tr style="font-size: 16px; font-weight: bold; ">





              <th>
                <center>Analista<b>
              </th>

              <th>
                <center>N° Chamado<b>
              </th>
              <th>
                <center>Colaborador(a)<b>
              </th>
              <th>
                <center>Entrega
              </th>
              <th>
                <center>Anexo(s)
              </th>
              <th>
                <center>Situação
              </th>
              <th>
                <center>Visualizar
              </th>



            </tr>
          </thead>
          <tbody>
            <?php $counter1=-1;  if( isset($rollouts) && ( is_array($rollouts) || $rollouts instanceof Traversable ) && sizeof($rollouts) ) foreach( $rollouts as $key1 => $value1 ){ $counter1++; ?>
            <tr style="font-size: 15px;font-weight: normal;">


              <td>
                <center><?php echo $value1["nome_user"]; ?>
              </td>

              <td>
                <center><?php echo $value1["n_chamado"]; ?>
              </td>
              <td>
                <center><?php echo $value1["nome"]; ?>
              </td>



              <td>
                <center><?php echo formatDate($value1["dt_data_rollout"]); ?>
              </td>

              <td>
                <center> <a style="width: 100%;" href="/usuario/meus-rollouts/arquivos-bsb/<?php echo $value1["id_rollout"]; ?>"
                    class="btn btn-warning btn-sm">
                
                    <?php if( numArquivos($value1["id_rollout"]) == 1 ){ ?>
                    <b><?php echo numArquivos($value1["id_rollout"]); ?> Arquivo</b></a>
                  <?php }else{ ?>
                  <b><?php echo numArquivos($value1["id_rollout"]); ?> Arquivos</b></a>
                  <?php } ?>
              </td>

              <?php if( $value1["situacao"] == '' OR $value1["situacao"] == 'Pendente'  ){ ?>

              <td>
                <center>
              <b style="color:red"> Pendente</b>
              </td>

              <?php }else{ ?>
              <td>
                <center>
                  <center>
                 <b style="color:green"> Finalizado</b>
              </td>

              <?php } ?>
              <td>
                <center> <a style="width: 100%;" href="/usuario/rollout-visualizar-bsb/<?php echo $value1["id_rollout"]; ?>"
                    class="btn btn-primary btn-sm"><b> Verificar</b></a>
              </td>


            </tr>

            <?php } ?>

          </tbody>

        </table><br>

      </div>



      <center>
        <div class="box-footer clearfix">
          <ul class="pagination">
            <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
            <?php if( $pages == $value1["link"] ){ ?>
            <li> <a class="active" href="<?php echo $value1["link"]; ?>"><?php echo $value1["page"]; ?></a></li>
            <?php }else{ ?>
            <li><a href="<?php echo $value1["link"]; ?>"><?php echo $value1["page"]; ?></a></li>
            <?php } ?>
            <?php } ?>
        </div>
      </center>

      <?php } ?>
      <br><br><a href="javascript:history.back()" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
          Voltar</b></a>


      <hr class="my-4" />

    </div>


  </div>

</div>