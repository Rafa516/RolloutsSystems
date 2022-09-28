<?php

use \Projeto\Page;
use \Projeto\Model\Usuario;
use \Projeto\Model\Documento;
		

//---------ROTA PARA DELETAR UM Documento ----------------------//

    $app->get("/usuario/documentos-bsb/delete/:id_documento",function($id_documento){

        $documentos = new Documento();
       
        $documentos->get((int)$id_documento);
     
        $documentos->delete();
       

        Usuario::setSuccess("Documento removido com sucesso.");

        header("Location: /usuario/todos-documentos-bsb");
        exit;
    });

    //---------ROTA PARA DELETAR UM ARQUIVO ----------------------//

    $app->get("/usuario/arquivos-documentos-bsb/delete/:id_arqDocumento",function($id_arqDocumento){

        $arquivo = new Documento();
       
        $arquivo->getArquivos((int)$id_arqDocumento);
       
       
        $arquivo->deletarArquivo($id_arqDocumento);

        Usuario::setSuccess("Arquivo removido com sucesso.");

        header("Location: /usuario/meus-documentos-bsb");
        exit;
    });


//---------ROTA PARA A ABERTURA DOS DocumentoS----------------------//

    $app->get('/usuario/registrar-documentos-bsb', function() {  


        usuario::verificaLogin();



        $page = new Page();

        $page->setTpl("usuario-abertura-documentos-bsb",[
            'CallOpenMsg'=>usuario::getSuccess(),
            'errorRegister'=>usuario::getErrorRegister(),
            


        ]);

    });

//---------ROTA PARA O FORMULÁRIO DOS DocumentoS----------------------//


    $app->post("/usuario/registrar-documentos-bsb/enviar", function(){

        usuario::verificaLogin();

        $Documento = new Documento();


        $Documento->setData($_POST);


        $Documento->registrarDocumentos();

        

        usuario::setSuccess("Documento registrado com sucesso!!");

        header("Location: /usuario/todos-documentos-bsb");
        exit;


    });




//---------ROTA PARA EDITAR ALTERAÇÃO DOS DocumentoS----------------------//

    $app->get('/usuario/documento/editar-bsb/:id_documento', function($id_documento){
    
        Usuario::verificaLogin();
    
        $documento = new Documento();
    
        $documento->get((int)$id_documento);
    
        $page = new Page();
    
        $page ->setTpl("usuario-documento-editar-bsb", array(
            "value"=>$documento->getValues(),
            'CallOpenMsg'=>usuario::getSuccess(),
            'errorRegister'=>usuario::getErrorRegister()  
        ));
    
    });

 //---------ROTA PARA O ENVIO DO FORMULÁRIO DE EDIÇÃO DOS DocumentoS----------------------//

    $app->post("/usuario/Documento/editar-bsb/:id_documento",function($id_documento){

        Usuario::verificaLogin();

        $Documento = new Documento();


        $Documento->get((int)$id_documento);
    
        $Documento->setData($_POST);
       
        

        $Documento->editarDocumentos();

        Usuario::setSuccess("Dados alterados com Sucesso");

        header("Location: /usuario/todos-documentos-bsb");
        exit;


    });


//---------ROTA PARA A PÁGINA DE TODOS OS DocumentoS ----------------------//
    $app->get('/usuario/todos-documentos-bsb', function() {  


        Usuario::verificaLogin();

        $usuario = Usuario::getFromSession();
        $Documento = new Documento();


        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if ($search != '') {

            $pagination = $Documento->getPageSearchBsb($search, $page);

        } else {

            $pagination = $Documento->getPageAllBsb($page);

        }

        $pages = [];

        for ($i=1; $i <= $pagination['pages']; $i++) { 
            array_push($pages, [
                'link'=>'/usuario/todos-documentos-bsb?page='.$i,
                'page'=>$i,
                'search'=>$search,
            ]);
        }

        $page = new Page();

        $page->setTpl("usuario-todos-documentos-bsb",[
            
            "documentos"=>$pagination['data'],
            "search"=>$search,
            'profileMsg'=>usuario::getSuccess(),
            "pages"=>$pages,
            "values"=>$Documento->getValues()
        ]);

    });

//---------ROTA PARA ANEXAR ARQUIVO  - POST---------------------//

    $app->post("/usuario/documento/anexar-arquivo-bsb/:id_documento", function ($id_documento) {

        $documento = new Documento();

        $documento  ->get((int)$id_documento);
    
        $documento  ->setData($_POST);
    
        $documento  ->moveArquivo();

        Usuario::setSuccess("Arquivo(s) Anexado(s) com Sucesso");

        header('Location: /usuario/todos-documentos-bsb');
        exit;

    });

//---------ROTA PARA A PÁGINA DOS ARQUIVOS DO Documento----------------------//

    $app->get('/usuario/todos-documentos-bsb/arquivos/:id_documento', function($id_documento) {  


        Usuario::verificaLogin();

        $documento = new Documento();

        $page = new Page();

        $page->setTpl("usuario-arquivos-documentos-bsb",[
            "id_documento"=>$documento->get((int)$id_documento),
            'arquivo'=>$documento->showArquivo($id_documento),
            "value"=>$documento->getValues()

        ]);

    });



