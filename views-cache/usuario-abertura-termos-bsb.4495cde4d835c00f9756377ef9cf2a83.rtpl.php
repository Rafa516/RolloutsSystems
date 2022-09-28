<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

  <div class="content-inside">

    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Registrar Termos - Brasília </b></a>
        </li>
      </ul>
      <?php if( $CallOpenMsg != '' ){ ?>
      <div class="alert alert-success">
        <b><?php echo $CallOpenMsg; ?></b>
      </div>
      <?php } ?>

      <?php if( $errorRegister != '' ){ ?>
      <div class="alert alert-danger">
        <b><?php echo $errorRegister; ?></b>
      </div>
      <?php } ?>



      <center><img
          src="https://i0.wp.com/sengepe.org.br/wp-content/uploads/2017/08/captura-de-tela-2017-08-20-acc80s-23-38-34.png"
          width="120" height="120">

        <h4><b>Termo de Entrega</b></h4>
      </center><br>
      <hr>


      <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
          <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">

            <form   id="add-aula"  class="form-group" action="/usuario/registrar-termos-bsb/enviar" method="post"
              enctype="multipart/form-data">

              <input class="form-control py-1" value="<?php echo $usuario["id_usuario"]; ?>" name="id_usuario" type="hidden">

              <input class="form-control py-1" value="Pendente" name="situacao_t" type="hidden">

              <input class="form-control py-1" value="Brasília" name="cidade" type="hidden">

               <input class="form-control py-1" value="Entrega" name="termo" type="hidden">



          </div>
        </div>

        <b>1. Identificação do Usuário</b><br><br>

        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


             
              <th>
                <center>N° Chamado<b>
              </th>
              <th>
                <center>Nome<b>
              </th>
              <th>
                <center>Diretoria <b>
              </th>
              <th>
                <center>Gerência<b>
              </th>
              <th>
                <center>Gerência Executiva<b>
              </th>


              </tr>
            </thead>
            <tbody>

              <tr>


                <td> <input name="n_chamadoT" type="text" class="form-control py-1"></td>
                <td> <input name="nome_t" type="text" class="form-control py-1" required></td>
                <td> <input name="diretoria_t" type="text" class="form-control py-1"></td>
                <td> <input name="gerencia_t" type="text" class="form-control py-1"></td>
                <td> <input name="gerencia_exeT" type="text" class="form-control py-1"></td>




              </tr>



            </tbody>

          </table>
        </div>
        <hr>



        <b>2. Dados do(s) Equipamento(s)</b><br><br>


        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th>
                <center>Quantidade, Tipo, Modelo, Fabricante, N° de Série, Patrimônio<b>
              </th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td>
                
                    <select class="form-select py-1" name="id_equipamento[]" required>
                    <option value=""></option>
                     <?php $counter1=-1;  if( isset($equipamentos) && ( is_array($equipamentos) || $equipamentos instanceof Traversable ) && sizeof($equipamentos) ) foreach( $equipamentos as $key1 => $value1 ){ $counter1++; ?>
                        
                        <option value="<?php echo $value1["id_equipamento"]; ?>"><?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?>
                        <?php echo $value1["patrimonio"]; ?></option>
                         <?php } ?>
                  </select>
                   <input name="qtd_retirada[]" type="number" class="form-control py-1">

                  <select class="form-select py-1" name="id_equipamento[]" required>
                    <option value=""></option>
                   <?php $counter1=-1;  if( isset($equipamentos) && ( is_array($equipamentos) || $equipamentos instanceof Traversable ) && sizeof($equipamentos) ) foreach( $equipamentos as $key1 => $value1 ){ $counter1++; ?>

                        <option value="<?php echo $value1["id_equipamento"]; ?>"><?php echo $value1["descricao"]; ?> <?php echo $value1["fabricante"]; ?> <?php echo $value1["modelo"]; ?> <?php echo $value1["serie"]; ?>
                            <?php echo $value1["patrimonio"]; ?></option>
                         <?php } ?>
                  </select>
                   <input name="qtd_retirada[]" type="number" class="form-control py-1">

                </td>
              </tr>

            </tbody>

          </table>
        </div>
        <hr>

        <b>3. Acessórios</b><br><br>


        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th>
                <center>Quantidade, Tipo, Modelo, Fabricante, N° de Série, Patrimônio<b>
              </th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td> <textarea style="height: 110px;" class="form-control py-1" value="" type="text"
                    name="acessorios_t"> </textarea> </td>
              </tr>



            </tbody>

          </table>
        </div>
        <hr>




        <b>4. Observações</b>



        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th>
                <center>Observações em geral<b>
              </th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td> <textarea style="height: 110px;" class="form-control py-1" value="" type="text"
                    name="observacao_t"> </textarea> </td>
              </tr>



            </tbody>

          </table>
        </div>
        <hr>

        <b>3. Finalidade e datas</b><br><br>


        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th>
                <center>Finalidade de uso<b>
              </th>
              <th>
                <center>Data de entrega<b>
              </th>



              </tr>
            </thead>
            <tbody>

              <tr>


                <td> <select style="width: 100%" class="form-select py-1" name="finalidade" required>

                    <option value="Empréstimo longa duração">Empréstimo longa duração</option>
                    <option value="Empréstimo curta duração">Empréstimo curta duração</option>
                    <option value="Home office">Home office</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Home Office e Presencial">Home Office e Presencial</option>
                    <option value="Substituição">Substituição</option>
                    <option value="Substituição">Movimentação de Material</option>
                    
                  </select></td>
                <td> <input name="dt_data" type="date" class="form-control py-1" required></td>


              </tr>

            </tbody>

          </table>
        </div>
        <hr>




      </div>
    </div>


    <center><input style="width: 100%;" class="btn btn-primary btn" name="CadAulas" id="CadAulas"    type="submit" value="Enviar"></center><br><br>


    <a href="javascript:history.back()" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
        Voltar</b></a>
    <hr>
  </div>

</div>
</div>

</div>
<hr class="my-4" />



</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

 var n = 0;
function addNovo(){
    var element = document.getElementById("group")
    var copy= document.cloneNode(element);
    n++;

    copy.getElementsByTagName('label')[0].htmlFor= 'nome'+n;
    copy.getElementsByTagName('input')[0].id= 'nome'+n;
    copy.getElementsByTagName('label')[1].htmlFor= 'email'+n;
    copy.getElementsByTagName('input')[1].id= 'email'+n;

    element.parentNode.appendChild(copy);   
}
</script>

