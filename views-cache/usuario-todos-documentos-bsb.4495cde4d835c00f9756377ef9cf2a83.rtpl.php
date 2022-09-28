<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Documentos - Brasília -
              <?php if( totalDocumentosBsb() == 0 ){ ?>
              Nenhum Registrado
              <?php }elseif( totalDocumentosBsb() == 1 ){ ?>
              <?php echo totalDocumentosBsb(); ?> Registrado
              <?php }else{ ?>
              <?php echo totalDocumentosBsb(); ?> Registrados
              <?php } ?> </b></a>

        </li>

      </ul>

        <?php if( $usuario["localidade"] =='Brasília' ){ ?>      

        <a style="width: 20%;" href="/usuario/registrar-documentos-bsb"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar documento</b></a>
        <?php } ?>

         <?php if( totalDocumentosBsb() != 0 ){ ?>
      <div class="search" style="float: right">
        <form action="/usuario/todos-documentos-bsb" method="get">
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
                <center>Nome do Documento<b>
              </th>

              <th>
                <center>Data do documento
              </th>

              <th>
                <center>Anexo(s)
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
            <?php $counter1=-1;  if( isset($documentos) && ( is_array($documentos) || $documentos instanceof Traversable ) && sizeof($documentos) ) foreach( $documentos as $key1 => $value1 ){ $counter1++; ?>
            <tr style="font-size: 15px;font-weight: normal;">

              <td>
                <center><?php echo $value1["nome_documento"]; ?>
              </td>

              <td>
                <center><?php echo formatDate($value1["dt_documento"]); ?>
              <td>
               <center> <a style="width: 100%;" href="/usuario/todos-documentos-bsb/arquivos/<?php echo $value1["id_documento"]; ?>"
                    class="btn btn-warning btn-sm">
                    <i class="far fa-file-alt"></i>
                    <?php if( numArquivosDocumentos($value1["id_documento"]) == 1 ){ ?>
                    <b><?php echo numArquivosDocumentos($value1["id_documento"]); ?> Arquivo</b></a>
                  <?php }else{ ?>
                  <b><?php echo numArquivosDocumentos($value1["id_documento"]); ?> Arquivos</b></a>
                  <?php } ?>
              </td>
               <td>
                  <center> <a style="width: 100%;" href="/usuario/documento/editar-bsb/<?php echo $value1["id_documento"]; ?>"
                    class="btn btn-success btn-sm"><i class="fas fa-pen"></i><b> Alterar</b></a></center>
              </td>
               <td>
                  <center><a style="width: 100%;" href="/usuario/documentos-bsb/delete/<?php echo $value1["id_documento"]; ?>"
                    onclick="return confirm('Deseja realmente excluir o documento <?php echo $value1["nome_documento"]; ?>?')"
                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i><b> Excluir</b></a>
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