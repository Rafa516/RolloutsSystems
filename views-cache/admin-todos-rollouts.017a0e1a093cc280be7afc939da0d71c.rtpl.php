<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Todos Rollouts -
              <?php if( totalRollouts() == 0 ){ ?>
              Nenhum Registrado
              <?php }elseif( totalRollouts() == 1 ){ ?>
              <?php echo totalRollouts(); ?> Registrado
              <?php }else{ ?>
              <?php echo totalRollouts(); ?> Registrados
              <?php } ?> </b></a>

        </li>

      </ul>




      <?php if( $profileMsg != '' ){ ?>
      <div class="alert alert-success">
        <b><?php echo $profileMsg; ?></b>
      </div>
      <?php } ?>

      <?php if( totalRollouts() != 0 ){ ?>

      <div class="search" style="float: right">
        <form action="/admin/todos-rollouts" method="get">
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

      <div class="table-responsive">
        <table class="table table-hover  table-bordered">
          <thead class="table table-dark">
            <tr style="font-size: 16px; font-weight: bold; ">



              <th>
                <center>Analista<b>
              </th>
              <th>
                <center>Localidade<b>
              </th>
              <th>
                <center>N° Chamado<b>
              </th>
              <th>
                <center>Colaborador<b>
              </th>
              <th>
                <center>Modificação
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
              <th>
                <center>Alterar
              </th>
              <th>
                <center>Excluir
              </th>


            </tr>
          </thead>
          <tbody>
            <?php $counter1=-1;  if( isset($rollouts) && ( is_array($rollouts) || $rollouts instanceof Traversable ) && sizeof($rollouts) ) foreach( $rollouts as $key1 => $value1 ){ $counter1++; ?>
            <tr style="font-size: 15px;font-weight: normal;">

            
               <td><br>
                <center> <a href="/admin/rollout/alteracao-analista/<?php echo $value1["id_rollout"]; ?>"   onclick="return confirm('Deseja alterar o Analista?')" style="width: 100%;" class="btn btn-link btn-sm"><?php echo $value1["nome_user"]; ?>
              </td>
              <td><br>
                <center><?php echo $value1["cidade"]; ?>
              </td>
              <td><br>
                <center><?php echo $value1["n_chamado"]; ?>
              </td>
              <td><br>
                <center><?php echo $value1["nome"]; ?>
              </td>

              <td><br>
                <center><?php echo formatDate($value1["data_registro"]); ?>
              </td>

              <td><br>
                <center> <a href="/admin/todos-rollouts/arquivos/<?php echo $value1["id_rollout"]; ?>" style="width: 100px;"
                    class="btn btn-warning btn-sm">

                    <?php if( numArquivos($value1["id_rollout"]) == 1 ){ ?>
                    <b><?php echo numArquivos($value1["id_rollout"]); ?> Arquivo</b></a>
                  <?php }else{ ?>
                  <b><?php echo numArquivos($value1["id_rollout"]); ?> Arquivos</b></a>
                  <?php } ?>
              </td>

              <?php if( $value1["situacao"] == '' OR $value1["situacao"] == 'Pendente'  ){ ?>

              <td><br>
                <center>
                  <a style="width: 80px;" href="/admin/rollout-situacao/<?php echo $value1["id_rollout"]; ?>"
                    onclick="return confirm('Deseja alterar a situação do rollout do(a) <?php echo $value1["nome"]; ?>?')" type="button"
                    class="btn btn-outline-danger btn-sm ">Pendente</a>
              </td>

              <?php }else{ ?>
              <td><br>
                <center><a style="width: 80px;" href="/admin/rollout-situacao/<?php echo $value1["id_rollout"]; ?>"
                    onclick="return confirm('Deseja alterar a situação do rollout do(a) <?php echo $value1["nome"]; ?>?')" type="button"
                    class="btn btn-outline-success btn-sm ">Finalizado</a>
              </td>

              </td>
              <?php } ?>

              <td><br>
                <center> <a href="/admin/rollout-visualizar/<?php echo $value1["id_rollout"]; ?>" class="btn btn-primary btn-sm"><b>
                      Verificar</b></a>
              </td>


              <td><br>
                <center> <a href="/admin/rollout/editar/<?php echo $value1["id_rollout"]; ?>" class="btn btn-success btn-sm"><b>
                      Alterar</b></a>
              </td>

              <td><br>
                <center><a href="/admin/rollouts/delete/<?php echo $value1["id_rollout"]; ?>"
                    onclick="return confirm('Deseja realmente excluir o Rollout do(a) <?php echo $value1["nome"]; ?>?')"
                    class="btn btn-danger btn-sm"><b> Excluir</b></a>
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
      <a href="javascript:history.back()" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
          Voltar</b></a>


      <hr class="my-4" />

    </div>


  </div>

</div>