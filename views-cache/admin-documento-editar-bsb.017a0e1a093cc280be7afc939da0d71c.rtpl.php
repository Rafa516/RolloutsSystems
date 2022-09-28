<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

  <div class="content-inside">

    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Alterar  Documento  <b><?php echo $value["nome_documento"]; ?></b> </b></a>
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

        <h4><b>Documento</b></h4>
      </center><br>
      <hr>


      <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
          <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">

            <form class="form-group" action="/admin/Documento/editar-bsb/<?php echo $value["id_documento"]; ?>" method="post"
              enctype="multipart/form-data">       

          </div>
        </div>

        <b>Identificação do Documento</b><br><br>

          <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th>
                <center>Nome do Documento<b>
              </th>
              <th>
                <center>Data do Documento<b>
              </th>
                   
              </tr>
            </thead>
            <tbody>

              <tr>

                <td> <input name="nome_documento" type="text" value="<?php echo $value["nome_documento"]; ?>" class="form-control py-1"></td>
                <td> <input name="dt_documento" type="date" value="<?php echo $value["dt_documento"]; ?>" class="form-control py-1" required></td>
              

              </tr>



            </tbody>

          </table>
        </div>
        <hr>




      </div>
    </div>


    <center><input style="width: 100%;" class="btn btn-success btn " type="submit" value="Alterar"></center><br><br>


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