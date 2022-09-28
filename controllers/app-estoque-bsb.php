<?php

use \Projeto\Page;
use \Projeto\Model\Usuario;
use \Projeto\Model\Termo;
use \Projeto\Model\Estoque;
		
//---------ROTA PARA DELETAR UM EQUIPAMENTO ----------------------//

$app->get("/usuario/equipamentos/delete/:id_equipamento",function($id_equipamento){

    $equipamento = new Estoque();
    
    $equipamento->get((int)$id_equipamento);

    $equipamento->delete($id_equipamento);


    Usuario::setSuccess("Equipamento removido com sucesso.");

    header("Location: /usuario/estoque-bsb");
    exit;
});




//--------- PÁGINA REGISTRAR EQUIPAMENTO----------------------//

    $app->get('/usuario/registrar-equipamentos-bsb', function() {  


        Usuario::verificaLogin();

        $equipamento = new Estoque();

        $page = new Page();

        $page->setTpl("usuario-registro-equipamentos-bsb",[
            'CallOpenMsg'=> Usuario::getSuccess(),
            'errorRegister'=> Usuario::getErrorRegister(),
             "equipamentos"=>$equipamento->getequipamentosEstoque(),
           
        ]);

    });
//---------POST REGISTRAR EQUIPAMENTO----------------------//

    $app->post("/usuario/registrar-equipamentos-bsb/enviar", function(){

        Usuario::verificaLogin();

       $equipamento = new Estoque();
    
       
       $equipamento->setData($_POST);
     

        
        $equipamento->registrarEquipamentos();

       
        Usuario::setSuccess("Equipamento registrado com sucesso!!");

        header("Location: /usuario/estoque-bsb");
        exit;


    });


//---------ROTA PARA ALTERAÇÃO DOS EQUIPAMENTOS----------------------//

    $app->get('/usuario/equipamento/editar-bsb/:id_equipamento', function($id_equipamento){
    
        Usuario::verificaLogin();
    
        $equipamento = new Estoque();
    
        $equipamento->get((int)$id_equipamento);
    
        $page = new Page();
    
        $page ->setTpl("usuario-equipamento-editar-bsb", array(
            "value"=>$equipamento->getValues(),
            'CallOpenMsg'=>Usuario::getSuccess(),
            'errorRegister'=>Usuario::getErrorRegister(),
        ));
    
    });

  //---------ROTA PARA O ENVIO DO FORMULÁRIO DE EDIÇÃO DOS TERMOS----------------------//

    $app->post("/usuario/estoque/editar-bsb/:id_equipamento",function($id_equipamento){

            Usuario::verificaLogin();

            $estoque = new Estoque();


            $estoque->get((int)$id_equipamento);

            $estoque->setData($_POST);
            

            $estoque->editarEquipamentos();

            Usuario::setSuccess("Dados alterados com Sucesso");

            header("Location: /usuario/estoque-bsb");
            exit;


        });  

//---------ROTA PARA A PÁGINA DO ESTOQUE ----------------------//
    $app->get('/usuario/estoque-bsb', function() {  


        Usuario::verificaLogin();

        $usuario = Usuario::getFromSession();
        $estoque = new Estoque();


        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if ($search != '') {

            $pagination = $estoque->getPageSearchBsb($search, $page);

        } else {

            $pagination = $estoque->getPageEstoqueBsb($page);

        }

        $pages = [];

        for ($i=1; $i <= $pagination['pages']; $i++) { 
            array_push($pages, [
                'link'=>'/usuario/estoque-bsb?page='.$i,
                'page'=>$i,
                'search'=>$search,
            ]);
        }

        $page = new Page();

        $page->setTpl("usuario-estoque-bsb",[
            
            "estoque"=>$pagination['data'],
            "search"=>$search,
            'profileMsg'=> Usuario::getSuccess(),
            "pages"=>$pages,
            "values"=>$estoque->getValues()
        ]);

    });
//---------ROTA PARA A PÁGINA DAS RETIRADAS DE EQUIPAMENTOS ----------------------//
$app->get('/usuario/retirada-equipamentos-bsb', function() {  


    Usuario::verificaLogin();

    $usuario = Usuario::getFromSession();
    $estoque = new Estoque();


    $search = (isset($_GET['search'])) ? $_GET['search'] : "";
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    if ($search != '') {

        $pagination = $estoque->searchRetiradaEstoqueBsb($search, $page);

    } else {

        $pagination = $estoque->retiradaEstoqueBsb($page);

    }

    $pages = [];

    for ($i=1; $i <= $pagination['pages']; $i++) { 
        array_push($pages, [
            'link'=>'/usuario/retirada-equipamentos-bsb?page='.$i,
            'page'=>$i,
            'search'=>$search,
        ]);
    }

    $page = new Page();

    $page->setTpl("usuario-retirada-equipamentos-bsb",[
        
        "retiradas"=>$pagination['data'],
        "search"=>$search,
        'profileMsg'=> Usuario::getSuccess(),
        "pages"=>$pages,
        "values"=>$estoque->getValues()
    ]);

});

//---------ROTA PARA A PÁGINA DAS ENTREGA DE EQUIPAMENTOS ----------------------//
$app->get('/usuario/entrada-equipamentos-bsb', function() {  


    Usuario::verificaLogin();

    $usuario = Usuario::getFromSession();
    $estoque = new Estoque();


    $search = (isset($_GET['search'])) ? $_GET['search'] : "";
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    if ($search != '') {

        $pagination = $estoque->searchEntradaEstoqueBsb($search, $page);

    } else {

        $pagination = $estoque->entradaEstoqueBsb($page);

    }

    $pages = [];

    for ($i=1; $i <= $pagination['pages']; $i++) { 
        array_push($pages, [
            'link'=>'/usuario/entrada-equipamentos-bsb?page='.$i,
            'page'=>$i,
            'search'=>$search,
        ]);
    }

    $page = new Page();

    $page->setTpl("usuario-entrada-equipamentos-bsb",[
        
        "entradas"=>$pagination['data'],
        "search"=>$search,
        'profileMsg'=> Usuario::getSuccess(),
        "pages"=>$pages,
        "values"=>$estoque->getValues()
    ]);

});

    //---------ROTA PARA PAINEL DE LOCAIS---------------------//

    $app->get('/usuario/estoque-locais', function() {  

        Usuario::verificaLogin();

        $page = new Page();

        $page->setTpl("usuario-estoque-locais",[ ]);

    });




