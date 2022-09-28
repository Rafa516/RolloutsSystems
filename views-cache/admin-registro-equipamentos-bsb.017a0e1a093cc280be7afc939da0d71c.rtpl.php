<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

  <div class="content-inside">

    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Registrar equipamentos - Brasília </b></a>
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
        <form class="form-group" action="/admin/registrar-equipamentos-bsb/enviar" method="post">

       <input class="form-control py-1" value="Brasília" name="cidade" type="hidden">



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


                
                  <td style="width: 30%"> <input name="descricao" type="text" class="form-control py-1" required ></td>
                  <td> <input name="fabricante" type="text" class="form-control py-1"></td>
                  <td> <input name="modelo" type="text" class="form-control py-1"></td>
                  <td> <input name="serie" type="text" class="form-control py-1"></td>
                  <td> <input name="patrimonio" type="text" class="form-control py-1"></td>

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
                  <center>local<b>
                </th>
                  <th>
                  <center>Quantidade<b>
                </th>
               </tr>
              </thead>
              <tbody>

                <tr>


                  <td> <select  class="form-select py-1" name="categoria" required>

                      <option value="Estação">Estação</option>
                      <option value="Telecom">Telecom</option>
                      <option value="Consumo">Consumo</option>
                      <option value="Acessórios">Acessórios</option>

                    </select></td>
                   <td> <input name="hostname" type="text" class="form-control py-1"></td>
                    <td> <input name="imagem" type="text" class="form-control py-1"></td>
                    <td> <input name="tela" type="text" class="form-control py-1"></td>
                    <td> <select  class="form-select py-1" name="devolucao" >

                      <option value="Não">Não</option>
                      <option value="Sim">Sim</option>

                    </select></td>
                  <td> <select  class="form-select py-1" name="condicao" required>

                      <option value="Novo">Novo</option>
                       <option value="Usado Bom">Usado Bom</option>
                      <option value="Ruim">Ruim</option>

                    </select></td>
                    <td > <input name="validacao" type="date" class="form-control py-1" required></td>
                    <td> <input name="lugar" type="text" class="form-control py-1"></td>
                  
                  <td style="width: 5%"> <input name="quantidade" type="number" class="form-control py-1" required></td>




                </tr>



              </tbody>

            </table>
          </div>


          <hr>

      

          <center><input style="width: 100%;" class="btn btn-primary btn" type="submit" value="Enviar"></center><br><br>
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


