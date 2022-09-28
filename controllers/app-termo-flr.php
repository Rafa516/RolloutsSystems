<?php

use \Projeto\Page;
use \Projeto\Model\Usuario;
use \Projeto\Model\Termo;
		

//---------ROTA PARA DELETAR UM TERMO ----------------------//

    $app->get("/usuario/termos-flr/delete/:id_termos",function($id_termos){

        $termos = new Termo();
       
        $termos->get((int)$id_termos);

     
        $termos->delete();


        Usuario::setSuccess("Termo removido com sucesso.");

        header("Location: /usuario/meus-termos-flr");
        exit;
    });

    //---------ROTA PARA DELETAR UM ARQUIVO ----------------------//

    $app->get("/usuario/arquivos-termos-flr/delete/:id_arquivoT",function($id_arquivoT){

        $arquivo = new Termo();
       
        $arquivo->getArquivos((int)$id_arquivoT);
       
       
        $arquivo->deletarArquivo($id_arquivoT);

        Usuario::setSuccess("Arquivo removido com sucesso.");

        header("Location: /usuario/meus-termos-flr");
        exit;
    });


//---------ROTA PARA A ABERTURA DOS TERMOS----------------------//

    $app->get('/usuario/registrar-termos-flr', function() {  


        usuario::verificaLogin();



        $page = new Page();

        $page->setTpl("usuario-abertura-termos-flr",[
            'CallOpenMsg'=>usuario::getSuccess(),
            'errorRegister'=>usuario::getErrorRegister(),
            


        ]);

    });

//---------ROTA PARA O FORMULÁRIO DOS TERMOS----------------------//


    $app->post("/usuario/registrar-termos-flr/enviar", function(){

        usuario::verificaLogin();

        $termo = new Termo();


        $termo->setData($_POST);



        $termo->registrarTermos();


        usuario::setSuccess("Termo registrado com sucesso!!");

        header("Location: /usuario/todos-termos-flr");
        exit;


    });

//---------ROTA PARA A PÁGINA DOS TERMOS DO USUÁRIO----------------------//
    $app->get('/usuario/meus-termos-flr', function() {  


        Usuario::verificaLogin();

        $usuario = Usuario::getFromSession();


        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if ($search != '') {

            $pagination = $usuario->getPageSearchTermoFlr($search, $page);

        } else {

            $pagination = $usuario->getPageTermoFlr($page);

        }

        $pages = [];

        for ($i=1; $i <= $pagination['pages']; $i++) { 
            array_push($pages, [
                'link'=>'/usuario/meus-termos-flr?page='.$i,
                'page'=>$i,
                'search'=>$search,
            ]);
        }

        $page = new Page();

        $page->setTpl("usuario-meus-termos-flr",[
            
            "termos"=>$pagination['data'],
            "search"=>$search,
            'profileMsg'=>usuario::getSuccess(),
            "pages"=>$pages
        ]);

    });

//---------ROTA PARA A PÁGINA DE VISUALIZAÇÃO  DOS TERMOS ---------------------//

    $app->get('/usuario/termo-visualizar-flr/:id_termos', function($id_termos) {  


        Usuario::verificaLogin();

        $termo = new Termo();

        $termo->get((int)$id_termos);

        $page = new Page();

        $page->setTpl("usuario-termo-visualizar-flr",[
            "value"=>$termo->getValues()

        ]);
    });

//---------ROTA PARA EDITAR ALTERAÇÃO DOS TERMOS----------------------//

    $app->get('/usuario/termo/editar-flr/:id_termos', function($id_termos){
    
        Usuario::verificaLogin();
    
        $termo = new Termo();
    
        $termo->get((int)$id_termos);
    
        $page = new Page();
    
        $page ->setTpl("usuario-termo-editar-flr", array(
            "value"=>$termo->getValues(),
            'CallOpenMsg'=>usuario::getSuccess(),
            'errorRegister'=>usuario::getErrorRegister()  
        ));
    
    });

 //---------ROTA PARA O ENVIO DO FORMULÁRIO DE EDIÇÃO DOS TERMOS----------------------//

    $app->post("/usuario/termo/editar-flr/:id_termos",function($id_termos){

        Usuario::verificaLogin();

        $termo = new Termo();


        $termo->get((int)$id_termos);
    
        $termo->setData($_POST);
        

        $termo->editarTermos();

        Usuario::setSuccess("Dados alterados com Sucesso");

        header("Location: /usuario/meus-termos-flr");
        exit;


    });

//---------ROTA PARA A PÁGINA DE SITUAÇÃO DOS TERMOS ---------------------//

    $app->get('/usuario/termo-situacao-flr/:id_termos', function($id_termos) {  


        Usuario::verificaLogin();

        $termo = new Termo();

        $page = new Page();

        $page->setTpl("usuario-termo-situacao-flr",[
            "id_termos"=>$termo->get((int)$id_termos),
            "value"=>$termo->getValues()

        ]);

    });


//---------ROTA PARA A ALTERAÇÃO DA SITUAÇÃO DOS TERMOS ---------------------//

    $app->post("/usuario/termo/atualizar-situacao-flr/:id_termos",function($id_termos){

        $termo = new Termo();

        $termo ->get((int)$id_termos);

        $termo ->setData($_POST);

        $termo ->editarSituacao();

        Usuario::setSuccess("Situação alterada com Sucesso");

        header("Location: /usuario/meus-termos-flr");
        exit;
    });

//---------ROTA PARA A PÁGINA DE TODOS OS TERMOS ----------------------//
    $app->get('/usuario/todos-termos-flr', function() {  


        Usuario::verificaLogin();

        $usuario = Usuario::getFromSession();
        $termo = new Termo();


        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if ($search != '') {

            $pagination = $termo->getPageSearchFlr($search, $page);

        } else {

            $pagination = $termo->getPageAllFlr($page);

        }

        $pages = [];

        for ($i=1; $i <= $pagination['pages']; $i++) { 
            array_push($pages, [
                'link'=>'/usuario/todos-termos-flr?page='.$i,
                'page'=>$i,
                'search'=>$search,
            ]);
        }

        $page = new Page();

        $page->setTpl("usuario-todos-termos-flr",[
            
            "termos"=>$pagination['data'],
            "search"=>$search,
            'profileMsg'=>usuario::getSuccess(),
            "pages"=>$pages,
            "values"=>$termo->getValues()
        ]);

    });

//---------ROTA PARA ANEXAR ARQUIVO  - POST---------------------//

    $app->post("/usuario/termo/anexar-arquivo-flr/:id_termos", function ($id_termos) {

        $termo = new Termo();

        $termo ->get((int)$id_termos);
    
        $termo ->setData($_POST);
    
        $termo ->moveArquivo();

        Usuario::setSuccess("Arquivo(s) Anexado(s) com Sucesso");

        header('Location: /usuario/meus-termos-flr');
        exit;

    });

//---------ROTA PARA A PÁGINA DOS ARQUIVOS DO TERMO----------------------//

    $app->get('/usuario/meus-termos-flr/arquivos/:id_termos', function($id_termos) {  


        Usuario::verificaLogin();

        $termo = new termo();

        $page = new Page();

        $page->setTpl("usuario-arquivos-termos-flr",[
            "id_termos"=>$termo->get((int)$id_termos),
            'arquivo'=>$termo->showArquivo($id_termos),
            "value"=>$termo->getValues()

        ]);

    });

    //---------ROTA PARA PAINEL DE LOCAIS---------------------//

    $app->get('/usuario/termos-locais', function() {  


        usuario::verificaLogin();



        $page = new Page();

        $page->setTpl("usuario-termos-locais",[ ]);

    });




