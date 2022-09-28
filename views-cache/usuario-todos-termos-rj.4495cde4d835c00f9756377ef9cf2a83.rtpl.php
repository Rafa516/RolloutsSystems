<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Termos - Rio de Janeiro -
              <?php if( totalTermosRj() == 0 ){ ?>
              Nenhum Registrado
              <?php }elseif( totalTermosRj() == 1 ){ ?>
              <?php echo totalTermosRj(); ?> Registrado
              <?php }else{ ?>
              <?php echo totalTermosRj(); ?> Registrados
              <?php } ?> </b></a>

        </li>

      </ul>
       <?php if( $usuario["localidade"] =='Rio de Janeiro' ){ ?>  
        <a style="width: 15%;" href="/usuario/registrar-termos-rj"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Termo</b></a>
         
         <a style="width: 15%;" href="/usuario/meus-termos-rj"class="btn btn-success btn-sm"><i class="fa fa-server" aria-hidden="true"></i></i><b> Meus Termos</b></a>
    <?php } ?>

      
  <?php if( totalTermosRj() != 0 ){ ?>
      <div class="search" style="float: right">
        <form action="/usuario/todos-termos-rj" method="get">
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
        <table class=" table table-hover table-sm  table-bordered">
          <thead class="table table-dark">
            <tr style="font-size: 16px; font-weight: bold; ">




              <th>
                <center>Analista<b>
              </th>

              <th>
                <center>N° Chamado<b>
              </th>
              <th>
                <center>Termo<b>
              </th>
              <th>
                <center>Colaborador<b>
              </th>

              <th>
                <center>Entrega/Devolução
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
            <?php $counter1=-1;  if( isset($termos) && ( is_array($termos) || $termos instanceof Traversable ) && sizeof($termos) ) foreach( $termos as $key1 => $value1 ){ $counter1++; ?>
            <tr style="font-size: 15px;font-weight: normal;">

              <td><br>
                <center><?php echo $value1["nome_user"]; ?>
              </td>

              <td><br>
                <center><?php echo $value1["n_chamadoT"]; ?>
              </td>
              <td><br>
                <center><?php echo $value1["termo"]; ?>
              </td>
              <td><br>
                <center><?php echo $value1["nome_t"]; ?>
              </td>

              <td><br>
                <center><?php echo formatDate($value1["dt_data"]); ?>
              </td>

              <td><br>
                <center> <a style="width: 100%;" href="/usuario/meus-termos-rj/arquivos/<?php echo $value1["id_termos"]; ?>"
                    class="btn btn-warning btn-sm">
                    <i class="far fa-file-alt"></i>
                    <?php if( numArquivosTermos($value1["id_termos"]) == 1 ){ ?>
                    <b><?php echo numArquivosTermos($value1["id_termos"]); ?> Arquivo</b></a>
                  <?php }else{ ?>
                  <b><?php echo numArquivosTermos($value1["id_termos"]); ?> Arquivos</b></a>
                  <?php } ?>

                  <?php if( $value1["situacao_t"] == '' OR $value1["situacao_t"] == 'Pendente'  ){ ?>

              <td><br>
                <center>
                  <i style="color:red;" class="fas fa-exclamation-triangle"></i><b style="color:red"> Pendente</b>
              </td>

              <?php }else{ ?>
              <td><br>
                <center><i style="color:green;" class="fas fa-check-square"></i> <b style="color:green"> Finalizado</b>
              </td>

              </td>
              <?php } ?>
              <td><br>
                <center> <a style="width: 100%;" href="/usuario/termo-visualizar-rj/<?php echo $value1["id_termos"]; ?>"
                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i><b> Verificar</b></a>


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