<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
    <div class="content-inside">
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="background-color:#2E9AFE;color: white" class="nav-link active" id="home-tab"
                        data-toggle="tab" role="tab" aria-controls="home" aria-selected="false"><b>Situação do rollout
                            do(a) <?php echo $value["nome"]; ?> </b></a>
                </li>
            </ul>



            <form class="form-group" action="/admin/rollout/atualizar-situacao/<?php echo $value["id_rollout"]; ?>" method="post">
                <?php if( $value["situacao"] == 'Pendente' OR $value["situacao"] == '' ){ ?>
                <div class="form-group">
                    <select class="form-control " name="situacao">
                        <option value="Pendente">Pendente</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                </div>
                <?php }else{ ?>

                <div class="form-group">
                    <select class="form-control " name="situacao">
                        <option value="Finalizado">Finalizado</option>
                        <option value="Pendente">Pendente</option>

                    </select>
                </div>
                <?php } ?>


                <input class="btn btn-primary btn btn-block" type="submit" value="Alterar">
            </form>


            <hr class="my-4" />

            <a href="javascript:history.back()" class="btn btn-info btn-xs"><i
                    class="fas fa-chevron-circle-left"></i><b> Voltar</b></a>

        </div>
    </div>
</div>