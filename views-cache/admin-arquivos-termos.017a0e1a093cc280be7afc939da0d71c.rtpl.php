<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Arquivo(s) do(a) <b><?php echo $value["nome_t"]; ?></b>
            </b></a>

        </li>
      </ul>

      <?php if( $value["id_usuario"] == $usuario["id_usuario"] ){ ?>
      <button data-toggle="modal" data-target="#arquivoModal" class="btn btn-warning btn-sm"><i
          class="far fa-file-alt"></i><b> Anexar Arquivo</b></button>
      <br><br><?php } ?>
      <div class="table-responsive">
        <table class="table table-hover table-sm  table-bordered">
          <thead class="table table-dark">
            <tr style="font-size: 16px; font-weight: bold; ">


              <th>
                <center>Nome do Arquivo<b>
              </th>
              <th>
                <center>Baixar Arquivo
              </th>
              

            </tr>
          </thead>
          <tbody>
            <?php $counter1=-1;  if( isset($arquivo) && ( is_array($arquivo) || $arquivo instanceof Traversable ) && sizeof($arquivo) ) foreach( $arquivo as $key1 => $value1 ){ $counter1++; ?>
            <tr style="font-size: 15px;font-weight: normal;">

              <td>
                <center><?php echo $value1["arquivo_termo"]; ?>
              </td>
              <td>
                <center> <a class="btn btn-warning btn-sm " href="<?php echo $value1["arquivo"]; ?>" target="_blank"><i
                      class="far fa-file-alt"></i><b> Download</b></a>
              </td>
            




              <?php } ?>

          </tbody>

        </table><br>

      </div>



      <hr class="my-4" />

      <a href="javascript:history.back()" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
          Voltar</b></a>


    </div>
  </div>
</div>

<!-- Modal arquivo -->
<div class="modal fade" id="arquivoModal" tabindex="-1" role="dialog" aria-labelledby="arquivoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModal">Anexar Arquivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/admin/termo/anexar-arquivo-bsb/<?php echo $value["id_termos"]; ?>" method="post"
          enctype="multipart/form-data"><br>

          <input class="form-control py-1" value="<?php echo $usuario["id_usuario"]; ?>" name="id_usuario" type="hidden">
          <input class="form-control py-1" value="<?php echo $value["id_termos"]; ?>" name="id_termos" type="hidden">


          <div class="form-group"><label class="small mb-1"><b style="font-size:17px;color: #585858">Anexe o documento
                scaneado do rollout de preferência </b></label>
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