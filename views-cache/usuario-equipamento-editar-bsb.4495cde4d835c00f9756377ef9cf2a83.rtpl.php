<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

  <div class="content-inside">

    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Alterar equipamento <?php echo $value["descricao"]; ?>  - Brasília </b></a>
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



      <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
          <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">

          </div>
        </div>
        <form class="form-group" action="/usuario/estoque/editar-bsb/<?php echo $value["id_equipamento"]; ?>" method="post">

           <input class="form-control py-1" value="<?php echo $value["id_equipamento"]; ?>"
                value="id_equipamento" type="hidden">


           <b> Dados dos Equipamentos / Acessórios</b><br><br>


            <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead class="table table-dark">



               <th>
                  <center>Descrição<b>
                </th>
                <th>
                  <center>Fabricante<b>
                </th>
                <th>
                  <center>Modelo<b>
                </th>
                <th>
                  <center>Nº Série<b>
                </th>

                <th>
                  <center>Patrimônio<b>
                </th>
                 


                </tr>
              </thead>
              <tbody>

                <tr>


                
                  <td style="width: 30%"> <input value="<?php echo $value["descricao"]; ?>" name="descricao" type="text" class="form-control py-1" required ></td>
                  <td> <input value="<?php echo $value["fabricante"]; ?>" name="fabricante" type="text" class="form-control py-1"></td>
                  <td> <input value="<?php echo $value["modelo"]; ?>" name="modelo" type="text" class="form-control py-1"></td>
                  <td> <input value="<?php echo $value["serie"]; ?>" name="serie" type="text" class="form-control py-1"></td>
                  <td> <input value="<?php echo $value["patrimonio"]; ?>" name="patrimonio" type="text" class="form-control py-1"></td>

                </tr>



              </tbody>

            </table>
          </div>

            <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead class="table table-dark">


                  <th>
                  <center>Categoria<b>
                </th>
                  <th>
                  <center>hostname<b>
                </th>
                 <th>
                  <center>imagem<b>
                </th>
                  <th>
                  <center>Tamanho Tela<b>
                </th>
                <th>
                  <center>Devolução<b>
                </th>
                  <th>
                  <center>Condição<b>
                </th>
                  <th>
                  <center>Validação<b>
                </th>
                 <th>
                  <center>Local<b>
                </th>
                  <th>
                  <center>Quantidade<b>
                </th>
               </tr>
              </thead>
              <tbody>

                <tr>


                  <td> <select  class="form-select py-1" name="categoria" required>
                      <option value="<?php echo $value["categoria"]; ?>"><?php echo $value["categoria"]; ?></option>
                      <option value="Estação">Estação</option>
                      <option value="Telecom">Telecom</option>
                      <option value="Consumo">Consumo</option>
                      <option value="Acessórios">Acessórios</option>

                    </select></td>
                   <td> <input value="<?php echo $value["hostname"]; ?>" name="hostname" type="text" class="form-control py-1"></td>
                    <td> <input value="<?php echo $value["imagem"]; ?>" name="imagem" type="text" class="form-control py-1"></td>
                    <td> <input value="<?php echo $value["tela"]; ?>" name="tela"type="text" class="form-control py-1"></td>
                      <td> <select  class="form-select py-1" name="devolucao" >
                         <option value="<?php echo $value["devolucao"]; ?>"><?php echo $value["devolucao"]; ?></option>
                      <option value="Não">Não</option>
                      <option value="Sim">Sim</option>

                    </select></td>
                  <td> <select  class="form-select py-1" name="condicao" required>
                      <option value="<?php echo $value["condicao"]; ?>"><?php echo $value["condicao"]; ?></option>
                      <option value="Bom">Novo</option>
                       <option value="Bom">Usado Bom</option>
                      <option value="Ruim">Ruim</option>

                    </select></td>
                    <td > <input value="<?php echo $value["validacao"]; ?>" name="validacao" type="date" class="form-control py-1" required></td>
                      <td > <input value="<?php echo $value["lugar"]; ?>" name="lugar" type="text" class="form-control py-1" required></td>
                  <td style="width: 5%"> <input value="<?php echo $value["quantidade"]; ?>" name="quantidade" type="number" class="form-control py-1" required></td>




                </tr>



              </tbody>

            </table>
          </div>


          <hr>


          <center><input style="width: 100%;" class="btn btn-success btn" type="submit" value="Alterar"></center><br><br>
      </div>
      <a href="javascript:history.back()" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
          Voltar</b></a>
      <hr>
    </div>

  </div>


</div>
</div>

</div>
<hr class="my-4" />

</form>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

  $(document).ready(function () {
    $('#eqp1').select2();
  });
</script>

<script>
  $(document).ready(function () {
    $('#eqp2').select2();
  });
</script>


