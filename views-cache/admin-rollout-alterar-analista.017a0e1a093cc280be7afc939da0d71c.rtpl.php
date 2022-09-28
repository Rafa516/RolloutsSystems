<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
    <div class="content-inside">
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="background-color:#2E9AFE;color: white" class="nav-link active" id="home-tab"
                        data-toggle="tab" role="tab" aria-controls="home" aria-selected="false"><b>Alterar Analista do Rollout </b></a>
                </li>
            </ul>



            <form class="form-group" action="/admin/rollout/alterar-analista/<?php echo $values["id_rollout"]; ?>" method="post">

               
                <div class="form-group">
                    <select class="form-control " name="id_usuario">
                     
                        <?php $counter1=-1;  if( isset($analistas) && ( is_array($analistas) || $analistas instanceof Traversable ) && sizeof($analistas) ) foreach( $analistas as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo $value1["id_usuario"]; ?>"><?php echo $value1["nome_user"]; ?></option>
                         <?php } ?>


                    </select>
                </div>
               

               

                <input class="btn btn-success btn btn-block" type="submit" value="Alterar">
            </form>


            <hr class="my-4" />

            <a href="javascript:history.back()" class="btn btn-info btn-xs"><i
                    class="fas fa-chevron-circle-left"></i><b> Voltar</b></a>

        </div>
    </div>
</div>