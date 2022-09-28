<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Retiradas - Brasília  - 
              <?php if( totalRetiradas()  == 0 ){ ?>
              Nenhuma Registrada
              <?php }elseif( totalRetiradas()  == 1 ){ ?>
              <?php echo totalRetiradas(); ?>   Registrada
              <?php }else{ ?>
              <?php echo totalRetiradas(); ?>  Registradas
              <?php } ?> </b></a>

        </li>

      </ul>

            

     

         
       <?php if( totalRetiradas() != 0 ){ ?>   
      <div class="search" style="float: right">
        <form action="/usuario/retirada-equipamentos-bsb" method="get">
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
                <center>Analista
              </th>
               <th>
                <center>Chamado
              </th>
              <th>
                <center>Categoria
              </th>
              <th>
                <center>Equipamento / Acessório
              </th>
               <th>
                <center>Destino
              </th>

              <th>
                <center>Quantidade Retirada<b>
              </th>
              
               <th>
                <center>Data da Retirada<b>
              </th>
              


            </tr>
          </thead>
          <tbody>
            <?php $counter1=-1;  if( isset($retiradas) && ( is_array($retiradas) || $retiradas instanceof Traversable ) && sizeof($retiradas) ) foreach( $retiradas as $key1 => $value1 ){ $counter1++; ?>
            <tr style="font-size: 15px;font-weight: normal;">

              <td>
                <center><?php echo $value1["nome_user"]; ?>
              </td>
              <td>
                <center><a  href="/usuario/termo-visualizar-bsb/<?php echo $value1["id_termos"]; ?>"><?php echo $value1["n_chamadoT"]; ?></a>
              </td>

              <td>
                <center><?php echo $value1["categoria"]; ?>
              </td>
              <td>
                <center><?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?> <?php echo $value1["patrimonio"]; ?>
              </td>
                <td>
                <center><?php echo $value1["destino_t"]; ?>
              </td>
              <td>
                <center><?php echo $value1["qtd_retirada"]; ?>
              </td>

              

              <td>
                <center><?php echo formatDate($value1["dt_data"]); ?>
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