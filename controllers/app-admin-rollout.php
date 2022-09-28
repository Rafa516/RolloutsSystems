<?php

use \Projeto\PageAdmin;
use \Projeto\Model\Usuario;
use \Projeto\Model\Rollout;




//---------ROTA PARA DELETAR UM Rollout ----------------------//

$app->get("/admin/rollouts/delete/:id_rollout",function($id_rollout){

	$rollout = new Rollout();

	$rollout->get((int)$id_rollout);

	$rollout->delete();

	Usuario::setSuccess("Rollout removido com sucesso.");

	header("Location: /admin/todos-rollouts-bsb");
	exit;
});	

//---------ROTA PARA A ABERTURA DE RolloutS----------------------//


$app->get('/admin/registrar-rollout', function() {  


    Usuario::verificaLoginAdmin();



    $page = new PageAdmin();

    $page->setTpl("admin-abertura-rollout",[
        'CallOpenMsg'=>Usuario::getSuccess(),
        'errorRegister'=>Usuario::getErrorRegister(),
        


    ]);

});

//---------ROTA PARA O FORMULÁRIO DO Rollout----------------------//


$app->post("/admin/registrar-rollout/enviar", function(){

    Usuario::verificaLoginAdmin();

    $rollout = new Rollout();


    $rollout->setData($_POST);



    $rollout->registrarRollouts();


    Usuario::setSuccess("Rollout registrado com sucesso!!");

    header("Location: /admin/todos-rollouts-bsb");
    exit;


});


//---------ROTA PARA A PÁGINA de todos OS ROLLOUTS----------------------//
$app->get('/admin/todos-rollouts-bsb', function() {  


	Usuario::verificaLoginAdmin();

	$usuario = Usuario::getFromSession();
	$rollout = new Rollout();


	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = $rollout->getPageSearchAll($search, $page);

	} else {

		$pagination = $rollout->getPageAll($page);

	}

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/admin/todos-rollouts-bsb?page='.$i,
			'page'=>$i,
			'search'=>$search,
		]);
	}

	$page = new PageAdmin();

	$page->setTpl("admin-todos-rollouts-bsb",[
		
		"rollouts"=>$pagination['data'],
		"search"=>$search,
		'profileMsg'=>usuario::getSuccess(),
		"pages"=>$pages
	]);

});


//---------ROTA PARA A PÁGINA DE visualização  DOS RolloutS ---------------------//

$app->get('/admin/rollout-visualizar/:id_rollout', function($id_rollout) {  


	Usuario::verificaLoginAdmin();

	$rollout = new Rollout();

	$rollout->get((int)$id_rollout);

	$page = new PageAdmin();

	$page->setTpl("admin-rollout-visualizar",[
		"value"=>$rollout->getValues()
	]);
});

//---------ROTA PARA ANEXAR ARQUIVO  - POST---------------------//

$app->post("/admin/rollout/anexar-arquivo/:id_rollout", function ($id_rollout) {

	$rollout = new Rollout();

    $rollout ->get((int)$id_rollout);
   
    $rollout ->setData($_POST);
   
	$rollout ->moveArquivo();

    Usuario::setSuccess("Arquivo(s) Anexado(s) com Sucesso");

	header('Location: /admin/todos-rollouts-bsb');
	exit;

});

//---------ROTA PARA A PÁGINA DOS ARQUIVOS DO ROLLOUT----------------------//

$app->get('/admin/todos-rollouts/arquivos/:id_rollout', function($id_rollout) {  


	Usuario::verificaLoginAdmin();

	$rollout = new Rollout();

	$page = new PageAdmin();

	$page->setTpl("admin-arquivos-rollouts",[
        "id_rollout"=>$rollout->get((int)$id_rollout),
		'arquivo'=>$rollout->showArquivo($id_rollout),
        "value"=>$rollout->getValues()

	]);

});

//---------ROTA PARA EDITAR ALTERAÇÃO DOS ROLLOUTS----------------------//

$app->get('/admin/rollout/editar/:id_rollout', function($id_rollout){
    
    Usuario::verificaLoginAdmin();

    $rollout = new Rollout();

    $rollout->get((int)$id_rollout);

    $page = new PageAdmin();

    $page ->setTpl("admin-rollout-editar", array(
        "value"=>$rollout->getValues(),
        'CallOpenMsg'=>usuario::getSuccess(),
        'errorRegister'=>usuario::getErrorRegister()  
    ));

});

//---------ROTA PARA O ENVIO DO FORMULÁRIO DE EDIÇÃO DOS ROLLOUTS----------------------//

$app->post("/admin/rollouts/editar/:id_rollout",function($id_rollout){

    Usuario::verificaLoginAdmin();

    $rollout = new Rollout();


    $rollout->get((int)$id_rollout);

    $rollout->setData($_POST);
    

    $rollout->editarRollouts();

    Usuario::setSuccess("Dados alterados com Sucesso");

    header("Location: /admin/todos-rollouts-bsb");
    exit;


});

//---------ROTA PARA A PÁGINA DE SITUAÇÃO DOS rolloutS ---------------------//

$app->get('/admin/rollout-situacao/:id_rollout', function($id_rollout) {  


    Usuario::verificaLoginAdmin();

    $rollout = new Rollout();

    $page = new PageAdmin();

    $page->setTpl("admin-rollout-situacao",[
        "id_rollout"=>$rollout->get((int)$id_rollout),
        "value"=>$rollout->getValues()

    ]);

});


//---------ROTA PARA A ALTERAÇÃO DA SITUAÇÃO DOS  rolloutS ---------------------//

$app->post("/admin/rollout/atualizar-situacao/:id_rollout",function($id_rollout){

    $rollout = new Rollout();

    $rollout->get((int)$id_rollout);

    $rollout->setData($_POST);

    $rollout->editarSituacao();

    Usuario::setSuccess("Situação alterada com Sucesso");

    header("Location: /admin/todos-rollouts-bsb");
    exit;
});


//---------ROTA PARA A PÁGINA DA ALTERAÇÃO DOS ANALISTAS---------------------//

$app->get('/admin/rollout/alteracao-analista/:id_rollout', function($id_rollout) {  


    Usuario::verificaLoginAdmin();

    $rollout = new Rollout();

    $page = new PageAdmin();


    $page->setTpl("admin-rollout-alterar-analista",[
        "id_rollouts"=>$rollout->get((int)$id_rollout),
        "values"=>$rollout->getValues(),
        "analistas"=>$rollout->getAnalistas()

    ]);

});

$app->post("/admin/rollout/alterar-analista/:id_rollout",function($id_rollout){

    $rollout = new Rollout();

    $rollout ->get((int)$id_rollout);

    $rollout ->setData($_POST);

    $rollout ->alterarAnalista();

    Usuario::setSuccess("Analista alterado com Sucesso");

    header("Location: /admin/todos-rollouts-bsb");
    exit;
});
