<?php

use \Projeto\Page;
use \Projeto\Model\Usuario;
use \Projeto\Model\Rollout;


//---------ROTA PARA DELETAR UM Rollout ----------------------//

    $app->get("/usuario/rollouts-rec/delete/:id_rollout",function($id_rollout){

        $rollout = new Rollout();

        $rollout->get((int)$id_rollout);

        $rollout->delete();

        Usuario::setSuccess("Rollout removido com sucesso.");

        header("Location: /usuario/meus-rollouts-rec");
        exit;
    });


//---------ROTA PARA A ABERTURA DE RolloutS----------------------//


    $app->get('/usuario/registrar-rollout-rec', function() {  


        usuario::verificaLogin();



        $page = new Page();

        $page->setTpl("usuario-abertura-rollout-rec",[
            'CallOpenMsg'=>usuario::getSuccess(),
            'errorRegister'=>usuario::getErrorRegister(),
            


        ]);

    });

//---------ROTA PARA O FORMULÁRIO DO Rollout----------------------//


    $app->post("/usuario/registrar-rollout-rec/enviar", function(){

        usuario::verificaLogin();

        $rollout = new Rollout();


        $rollout->setData($_POST);



        $rollout->registrarRollouts();


        usuario::setSuccess("Rollout registrado com sucesso!!");

        header("Location: /usuario/todos-rollouts-rec");
        exit;


    });



//---------ROTA PARA A PÁGINA DOS RolloutS DO USUÁRIO----------------------//
    $app->get('/usuario/meus-rollouts-rec', function() {  


        Usuario::verificaLogin();

        $usuario = Usuario::getFromSession();


        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if ($search != '') {

            $pagination = $usuario->getPageSearchRec($search, $page);

        } else {

            $pagination = $usuario->getPageRolloutRec($page);

        }

        $pages = [];

        for ($i=1; $i <= $pagination['pages']; $i++) { 
            array_push($pages, [
                'link'=>'/usuario/meus-rollouts-rec?page='.$i,
                'page'=>$i,
                'search'=>$search,
            ]);
        }

        $page = new Page();

        $page->setTpl("usuario-meus-rollouts-rec",[
            
            "rollouts"=>$pagination['data'],
            "search"=>$search,
            'profileMsg'=>usuario::getSuccess(),
            "pages"=>$pages
        ]);

    });

//---------ROTA PARA A PÁGINA de todos OS ROLLOUTS----------------------//
    $app->get('/usuario/todos-rollouts-rec', function() {  


        Usuario::verificaLogin();

        $usuario = Usuario::getFromSession();
        $rollout = new Rollout();


        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if ($search != '') {

            $pagination = $rollout->getPageSearchRec($search, $page);

        } else {

            $pagination = $rollout->getPageAllRec($page);

        }

        $pages = [];

        for ($i=1; $i <= $pagination['pages']; $i++) { 
            array_push($pages, [
                'link'=>'/usuario/todos-rollouts-rec?page='.$i,
                'page'=>$i,
                'search'=>$search,
            ]);
        }

        $page = new Page();

        $page->setTpl("usuario-todos-rollouts-rec",[
            
            "rollouts"=>$pagination['data'],
            "search"=>$search,
            'profileMsg'=>usuario::getSuccess(),
            "pages"=>$pages
        ]);

    });

//---------ROTA PARA A PÁGINA DE visualização  DOS RolloutS ---------------------//

    $app->get('/usuario/rollout-visualizar-rec/:id_rollout', function($id_rollout) {  


        Usuario::verificaLogin();

        $rollout = new Rollout();

        $rollout->get((int)$id_rollout);

        $page = new Page();

        $page->setTpl("usuario-rollout-visualizar-rec",[
            "value"=>$rollout->getValues()

        ]);
    });



//---------ROTA PARA EDITAR ALTERAÇÃO DOS ROLLOUTS----------------------//

    $app->get('/usuario/rollout/editar-rec/:id_rollout', function($id_rollout){
    
        Usuario::verificaLogin();
    
        $rollout = new Rollout();
    
        $rollout->get((int)$id_rollout);
    
        $page = new Page();
    
        $page ->setTpl("usuario-rollout-editar-rec", array(
            "value"=>$rollout->getValues(),
            'CallOpenMsg'=>usuario::getSuccess(),
            'errorRegister'=>usuario::getErrorRegister()  
        ));
    
    });

 //---------ROTA PARA O ENVIO DO FORMULÁRIO DE EDIÇÃO DOS ROLLOUTS----------------------//

    $app->post("/usuario/rollouts/editar-rec/:id_rollout",function($id_rollout){

        Usuario::verificaLogin();

        $rollout = new Rollout();


        $rollout->get((int)$id_rollout);
    
        $rollout->setData($_POST);
        

        $rollout->editarRollouts();

        Usuario::setSuccess("Dados alterados com Sucesso");

        header("Location: /usuario/meus-rollouts-rec");
        exit;


    });

//---------ROTA PARA A PÁGINA DE SITUAÇÃO DOS rolloutS ---------------------//

    $app->get('/usuario/rollout-situacao-rec/:id_rollout', function($id_rollout) {  


        Usuario::verificaLogin();

        $rollout = new Rollout();

        $page = new Page();

        $page->setTpl("usuario-rollout-situacao-rec",[
            "id_rollout"=>$rollout->get((int)$id_rollout),
            "value"=>$rollout->getValues()

        ]);

    });


    //---------ROTA PARA A ALTERAÇÃO DA SITUAÇÃO DOS  rolloutS ---------------------//

    $app->post("/usuario/rollout/atualizar-situacao-rec/:id_rollout",function($id_rollout){

        $rollout = new Rollout();

        $rollout->get((int)$id_rollout);

        $rollout->setData($_POST);

        $rollout->editarSituacao();

        Usuario::setSuccess("Situação alterada com Sucesso");

        header("Location: /usuario/meus-rollouts-rec");
        exit;
    });


//---------ROTA PARA ANEXAR ARQUIVO  - POST---------------------//

$app->post("/usuario/rollout/anexar-arquivo-rec/:id_rollout", function ($id_rollout) {

	$rollout = new Rollout();

    $rollout ->get((int)$id_rollout);
   
    $rollout ->setData($_POST);
   
	$rollout ->moveArquivo();

    Usuario::setSuccess("Arquivo(s) Anexado(s) com Sucesso");

	header('Location: /usuario/meus-rollouts-rec');
	exit;

});

//---------ROTA PARA A PÁGINA DOS ARQUIVOS DO ROLLOUT----------------------//

$app->get('/usuario/meus-rollouts/arquivos-rec/:id_rollout', function($id_rollout) {  


	Usuario::verificaLogin();

	$rollout = new Rollout();

	$page = new Page();

	$page->setTpl("usuario-arquivos-rollouts-rec",[
        "id_rollout"=>$rollout->get((int)$id_rollout),
		'arquivo'=>$rollout->showArquivo($id_rollout),
        "value"=>$rollout->getValues()

	]);

});

$app->get('/usuario/rollouts-locais', function() {  


    usuario::verificaLogin();



    $page = new Page();

    $page->setTpl("usuario-rollouts-locais",[ ]);

});




