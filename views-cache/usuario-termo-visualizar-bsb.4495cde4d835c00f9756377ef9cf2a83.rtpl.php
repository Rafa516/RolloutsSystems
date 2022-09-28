<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link
            active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home"
            aria-selected="false"><b><?php echo $value["nome_t"]; ?> </b></a>
        </li>
      </ul>

      <div id="DivIdToPrint">



        <div class="table-responsive">
          <table class="table  table-bordered">


            <tbody>

              <tr>
                <td>
                  <center>
                    <center><img
                        src="https://i0.wp.com/sengepe.org.br/wp-content/uploads/2017/08/captura-de-tela-2017-08-20-acc80s-23-38-34.png"
                        width="130" height="80">
                </td>

                <td><br>
                  <center>
                    <h2>Termo de <?php echo $value["termo"]; ?><h2>
                </td>

              </tr>


              <table class="table table-hover table-bordered">
                <thead class="table table-dark">


                  <th>
                    <center>N° do Chamado<b>
                  </th>
                  <th>
                    <center>Colaborador <b>
                  </th>
                  <th>
                    <center>Diretoria<b>
                  </th>
                  <th>
                    <center>Gerência<b>
                  </th>
                  <th>
                    <center>Gerência Executiva<b>
                  </th>




                </thead>

                <td>
                  <center><?php echo $value["n_chamadoT"]; ?>
                </td>
                <td>
                  <center><?php echo $value["nome_t"]; ?>
                </td>
                <td>
                  <center><?php echo $value["diretoria_t"]; ?>
                </td>
                <td>
                  <center><?php echo $value["gerencia_t"]; ?>
                </td>
                <td>
                  <center><?php echo $value["gerencia_exeT"]; ?>
                </td>

                <b>1. Identificação do Usuário</b><br><br>
                <table class="table table-hover table-bordered">
                  <thead class="table table-dark">

                    <b>2. Dados do(s) Equipamento(s)</b><br><br>
                    <th>
                      <center>Quantidade, Tipo, Modelo, Fabricante, N° de Série, Patrimônio<b>
                    </th>

                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td> <?php if( $value["termo"] == 'Entrega' ){ ?>
                        <textarea disabled style="height: 110px; color: black" class="form-control py-1"><?php echo $value["equipamentos_t"]; ?><?php $counter1=-1;  if( isset($equipamentos_retirada) && ( is_array($equipamentos_retirada) || $equipamentos_retirada instanceof Traversable ) && sizeof($equipamentos_retirada) ) foreach( $equipamentos_retirada as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["qtd_retirada"]; ?>-<?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?> <?php echo $value1["patrimonio"]; ?> /  <?php } ?>
                        </textarea> </td>
                        <?php }else{ ?>
                        <textarea disabled style="height: 110px; color: black" class="form-control py-1"><?php echo $value["equipamentos_t"]; ?><?php $counter1=-1;  if( isset($equipamentos_entrada) && ( is_array($equipamentos_entrada) || $equipamentos_entrada instanceof Traversable ) && sizeof($equipamentos_entrada) ) foreach( $equipamentos_entrada as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["qtd_entrada"]; ?>-<?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?> <?php echo $value1["patrimonio"]; ?> /  <?php } ?>
                          <?php } ?>
                        </textarea> </td>
                    </tr>


                    <table class="table table-hover table-bordered">
                      <thead class="table table-dark">

                        <b>3. Acessórios</b><br>
                        <th>
                          <center>Quantidade, Tipo, Modelo, Fabricante, N° de Série, Patrimônio<b>
                        </th>

                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                         <td> <?php if( $value["termo"] == 'Entrega' ){ ?>
                        <textarea disabled style="height: 110px; color: black" class="form-control py-1"><?php echo $value["acessorios_t"]; ?><?php $counter1=-1;  if( isset($acessorios_retirada) && ( is_array($acessorios_retirada) || $acessorios_retirada instanceof Traversable ) && sizeof($acessorios_retirada) ) foreach( $acessorios_retirada as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["qtd_retirada"]; ?>-<?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?> <?php echo $value1["patrimonio"]; ?> /  <?php } ?>
                        </textarea> </td>
                        <?php }else{ ?>
                        <textarea disabled style="height: 110px; color: black" class="form-control py-1"><?php echo $value["acessorios_t"]; ?><?php $counter1=-1;  if( isset($acessorios_entrada) && ( is_array($acessorios_entrada) || $acessorios_entrada instanceof Traversable ) && sizeof($acessorios_entrada) ) foreach( $acessorios_entrada as $key1 => $value1 ){ $counter1++; ?><?php echo $value1["qtd_entrada"]; ?>-<?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?> <?php echo $value1["patrimonio"]; ?> /  <?php } ?>
                          <?php } ?>
                        </textarea> </td>
                        </tr>


                        <table class="table table-hover table-bordered">
                          <thead class="table table-dark">

                            <b>4. Observações</b><br>
                            <th>
                              <center>Observações em geral<b>
                            </th>

                            </tr>
                          </thead>
                          <tbody>

                            <tr>
                              <td> <textarea disabled style="height: 110px; color: black"
                                  class="form-control py-1"> <?php echo $value["observacao_t"]; ?></textarea> </td>
                            </tr>




                            <div class="table-responsive">
                              <table class="table table-hover table-bordered">
                                <thead class="table table-dark">

                                  <b>5. Finalidade </b><br><br>
                                  <th>
                                    <center>Finalidade de uso<b>
                                  </th>
                                     <th>
                                    <center>Destino<b>
                                  </th>
                                  <?php if( $value["termo"] == 'Entrega' ){ ?>
                                  <th>
                                    <center>Data de entrega<b>
                                  </th>
                                  <?php }else{ ?>
                                  <th>
                                    <center>Data de devolução<b>
                                  </th>
                                  <?php } ?>




                                  </tr>
                                </thead>
                                <tbody>

                                  <tr>


                                    <td>
                                      <center> <?php echo $value["finalidade"]; ?>
                                    </td>
                                      <td>
                                      <center> <?php echo $value["destino_t"]; ?>
                                    </td>
                                    <?php if( $value["termo"] == 'Entrega' ){ ?>
                                    <td>
                                      <center><?php echo formatDate($value["dt_data"]); ?>
                                    </td>
                                    <?php }else{ ?>
                                   
                                    <td>
                                      <center><?php echo formatDate($value["dt_data"]); ?>
                                    </td>
                                    <?php } ?>








                                    <div class="table-responsive">
                                      <table class="table table-hover table-bordered">
                                        <thead class="table table-dark">


                                  </tr>



                                  <b>6. Recebimento</b><br><br>
                                  Pelo presente termo, eu <b><?php echo $value["nome_t"]; ?></b>, da <b><?php echo $value["gerencia_t"]; ?></b> declaro
                                  estar <?php if( $value["termo"] == 'Entrega' ){ ?> <b>recebendo</b> <?php }else{ ?> <b>devolvendo</b> <?php } ?>
                                  o(s) equipamento(s) e/ou acessório(s) relacionados acima em perfeitas condições de
                                  uso.<br><br>
                                  <th>
                                    <center>Responsável <?php if( $value["termo"] == 'Entrega' ){ ?> pelo recebimento <?php }else{ ?> pela
                                      devolução <?php } ?>
                                  </th>
                                  <th>
                                    <center>Assinatura<b>
                                  </th>
                                  <th>
                                    <center>Data<b>
                                  </th>


                                  </tr>
                                  </thead>
                                <tbody>

                                  <tr>
                                    <td>
                                      <center><?php echo $value["nome_t"]; ?>
                                    </td>
                                    <td>
                                      <center>
                                    </td>
                                    <td>
                                      <center>
                                    </td>


                                  </tr>

                                  <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                      <thead class="table table-dark">

                                        <th>
                                          <center>Analista da OTC – Microinformática<b>
                                        </th>
                                        <th>
                                          <center>Assinatura<b>
                                        </th>
                                        <th>
                                          <center>Data<b>
                                        </th>


                                        </tr>
                                      </thead>
                                      <tbody>

                                        <tr>
                                          <td>
                                            <center><?php if( $value["id_usuario"] == $usuario["id_usuario"] ){ ?>
                                              <?php echo getUsuarioNome(); ?>
                                          </td>
                                          <?php }else{ ?>
                                          <td></td>
                                          <?php } ?>
                                          <td>
                                            <center>
                                          </td>
                                           <td>
                                            <center>
                                          </td>







                                        </tr>

                                      </tbody>

                                    </table>
                                  </div>


                            </div>


                            <?php if( $value["id_usuario"] == $usuario["id_usuario"] ){ ?>
                              <?php if( $value["termo"] == 'Entrega' ){ ?>
                              <a href="/usuario/termo-entrega/editar-bsb/<?php echo $value["id_termos"]; ?>" class="btn btn-success btn-sm"><i
                                  class="fas fa-pen"></i><b> Alterar dados</b></a>
                               <?php }else{ ?>
                               <a href="/usuario/termo-devolucao/editar-bsb/<?php echo $value["id_termos"]; ?>" class="btn btn-success btn-sm"><i
                                  class="fas fa-pen"></i><b> Alterar dados</b></a>
                               <?php } ?>
                            <?php } ?>

                            <?php if( $value["id_usuario"] == $usuario["id_usuario"] ){ ?>
                            <button data-toggle="modal" data-target="#arquivoModal" class="btn btn-warning btn-sm"><i
                                class="far fa-file-alt"></i><b> Anexar Arquivo</b></button>
                            <?php } ?>

                            <button data-toggle="modal" data-target="#checkModal" class="btn btn-info btn-sm"><i
                                class="far fa-check-circle"></i><b> CheckList Notebook</b></button>

                            <button id='btn' value='Print' onclick='printtag("DivIdToPrint");'
                              class="btn btn-primary btn-sm" style="margin-right: 5px;">
                              <i class="fa fa-print"></i><b> Imprimir</b>
                            </button>




                            <hr class="my-4" />

                            <a href="javascript:history.back()" class="btn btn-info btn-xs"><i
                                class="fas fa-chevron-circle-left"></i><b> Voltar</b></a>
        </div>
      </div>
    </div>




    <script type="text/javascript">
      function printtag(tagid) {
        var hashid = "#" + tagid;
        var tagname = $(hashid).prop("tagName").toLowerCase();
        var attributes = "";
        var attrs = document.getElementById(tagid).attributes;
        $.each(attrs, function (i, elem) {
          attributes += " " + elem.name + " ='" + elem.value + "' ";
        })
        var divToPrint = $(hashid).html();
        var head = "<html><head>" + $("head").html() + "</head>";
        var allcontent = head + "<body  onload='window.print()'   >" + "<" + tagname + attributes + ">" + divToPrint + "</" + tagname + ">" + "</body></html> ";
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write(allcontent);
        newWin.document.close();
        // setTimeout(function(){newWin.close();},10);
      }
    </script>

    <!-- Modal arquivo -->
    <div class="modal fade" id="arquivoModal" tabindex="-1" role="dialog" aria-labelledby="arquivoModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModal">Anexar Arquivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-group" action="/usuario/termo/anexar-arquivo-bsb/<?php echo $value["id_termos"]; ?>" method="post"
              enctype="multipart/form-data"><br>

              <input class="form-control py-1" value="<?php echo $usuario["id_usuario"]; ?>" name="id_usuario" type="hidden">
              <input class="form-control py-1" value="<?php echo $value["id_termos"]; ?>" name="id_termos" type="hidden">


              <div class="form-group"><label class="small mb-1"><b style="font-size:17px;color: #585858">Anexe o
                    documento scaneado do rollout de preferência </b></label>
                <input id="addArquivoProfile" class="form-control py-1" type="file" id="arquivo_termo"
                  name="arquivo_termo[]" required="" />
              </div>

              <input class="btn btn-warning btn btn-block" type="submit" value="Anexar">

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Modal check list-->
  <div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="checkModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModal">CheckList Notebook</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div id="Print">

            <div class="table-responsive">
              <table class="table  table-bordered">




                <tr>
                  <td>
                    <center>
                      <center><img
                          src="https://i0.wp.com/sengepe.org.br/wp-content/uploads/2017/08/captura-de-tela-2017-08-20-acc80s-23-38-34.png"
                          width="80" height="60">
                  </td>

                  <td><br>
                    <center><b>CheckList para Notebook</b><br>
                      <center>(&ensp; )Entrega (&ensp; )Devolução
                  </td>

                </tr>


                </tbody>

              </table>

              <center><img src="/res/user/img/checklist1.png" width="900" height="1150"></center><br>


              <table class="table table-hover table-bordered">
                <thead class="table table-dark">


                  <th>
                    <center>Data e Assinatura do Responsável Técnico<b>
                  </th>
                  <th>
                    <center>Data e Assinatura do(a) Colaborador(a) <b>
                  </th>


                </thead>

                <td>
                  <center><br>
                </td>
                <td>
                  <center><br>
                </td>




                </tbody>

              </table>

            </div>

          </div>
        </div>

        <center><button id='btn' value='Print' onclick='printtag("Print");' class="btn btn-info btn-sm"
            style="width: 95%">
            <i class="fa fa-print"></i><b> Imprimir</b>
          </button></center><br>

        <script type="text/javascript">
          function printtag(tagid) {
            var hashid = "#" + tagid;
            var tagname = $(hashid).prop("tagName").toLowerCase();
            var attributes = "";
            var attrs = document.getElementById(tagid).attributes;
            $.each(attrs, function (i, elem) {
              attributes += " " + elem.name + " ='" + elem.value + "' ";
            })
            var divToPrint = $(hashid).html();
            var head = "<html><head>" + $("head").html() + "</head>";
            var allcontent = head + "<body  onload='window.print()'   >" + "<" + tagname + attributes + ">" + divToPrint + "</" + tagname + ">" + "</body></html>";
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write(allcontent);
            newWin.document.close();
            // setTimeout(function(){newWin.close();},10);
          }
        </script>
      </div>
    </div>
  </div>
</div>

</div>