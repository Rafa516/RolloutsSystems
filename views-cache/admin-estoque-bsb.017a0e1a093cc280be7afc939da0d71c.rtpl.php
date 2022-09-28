<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Estoque - Brasília - <?php echo totalItens(); ?> itens
               </b></a>

        </li>

      </ul>

            

        <a style="width: 30%;" href="/admin/registrar-equipamentos-bsb"class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i><b> Registrar Equipamento/Acessório</b></a>
  
      
         <a style="width: 15%;" href="/admin/retirada-equipamentos-bsb"class="btn btn-info btn-sm"><b> Verificar Retiradas</b></a>
         <a style="width: 15%;" href="/admin/entrada-equipamentos-bsb"class="btn btn-success btn-sm"><b> Verificar Entradas</b></a>

         
      <div class="search" style="float: right">
        <form action="/admin/estoque-bsb" method="get">
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
                <center>Categoria<b>
              </th>
               <th>
                <center>Descrição<b>
              </th>
              <th>
                <center>Quantidade<b>
              </th>

              <th>
                <center>Último Hostname<b>
              </th>
              <th>
                <center>Fabricante<b>
              </th>

              <th>
                <center>Modelo
              </th>

              <th>
                <center>Nº Série
              </th>
              <th>
                <center>Patrimônio
              </th>
                <th>
                <center>Tamanho da Tela
              </th>
              <th>
                <center>Condição
            
               <th>
                <center>Validação
              </th>

              <th>
                <center>Local
              </th>
                <th>
                <center>Imagem
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
            <?php $counter1=-1;  if( isset($estoque) && ( is_array($estoque) || $estoque instanceof Traversable ) && sizeof($estoque) ) foreach( $estoque as $key1 => $value1 ){ $counter1++; ?>
            <tr style="font-size: 15px;font-weight: normal;">

              <td>
                <center><?php echo $value1["categoria"]; ?>
              </td>
              <td>
                <center><?php echo $value1["descricao"]; ?>
              </td>

              <td>
                <center><?php if( $value1["quantidade"] <= 0 ){ ?> <b style="color: red"><?php echo $value1["quantidade"]; ?></b>
                  <?php }else{ ?><?php echo $value1["quantidade"]; ?><?php } ?>
              </td>
              <td>
                <center><?php echo $value1["hostname"]; ?>
              </td>
              <td>
                <center><?php echo $value1["fabricante"]; ?>
              </td>

              <td>
                <center><?php echo $value1["modelo"]; ?>
              </td>
              <td>
                <center><?php echo $value1["serie"]; ?>
              </td>

              <td>
                <center> <?php echo $value1["patrimonio"]; ?>

              </td>
                  <td>
                <center> <?php echo $value1["tela"]; ?>

              <td>
                <center><?php echo $value1["condicao"]; ?>
                 
              </td>
              
               <td>
                <center><?php echo formatDate($value1["validacao"]); ?>
                 
              </td>
                <td>
                <center><?php echo $value1["lugar"]; ?>
                 
              </td>
               <td>
                <center><?php echo $value1["imagem"]; ?>
                 
              </td>

               <td>
                <center>
                 
                  <a style="width: 100%;" href="/admin/equipamento/editar-bsb/<?php echo $value1["id_equipamento"]; ?>"class="btn btn-success btn-sm"><b>Alterar</b></a>
                               
              </td>

                <td>
                <center><a style="width: 100%;" href="/admin/equipamentos/delete/<?php echo $value1["id_equipamento"]; ?>"
                    onclick="return confirm('Deseja realmente excluir o equipamento <?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?> <?php echo $value1["patrimonio"]; ?>?')"
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

  
      <br><br><a href="javascript:history.back()" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
          Voltar</b></a>


      <hr class="my-4" />

    </div>


  </div>

</div>