<?php

use \Projeto\PageAdmin;
use \Projeto\Model\Usuario;
use \Projeto\Model\Documento;
		

//---------ROTA PARA DELETAR UM Documento ----------------------//

    $app->get("/admin/documentos-bsb/delete/:id_documento",function($id_documento){

        $documentos = new Documento();
       
        $documentos->get((int)$id_documento);
     
        $documentos->delete();
       

        Usuario::setSuccess("Documento removido com sucesso.");

        header("Location: /admin/todos-documentos-bsb");
        exit;
    });

    //---------ROTA PARA DELETAR UM ARQUIVO ----------------------//

    $app->get("/admin/arquivos-documentos-bsb/delete/:id_arqDocumento",function($id_arqDocumento){

        $arquivo = new Documento();
       
        $arquivo->getArquivos((int)$id_arqDocumento);
       
       
        $arquivo->deletarArquivo($id_arqDocumento);

        Usuario::setSuccess("Arquivo removido com sucesso.");

        header("Location: /admin/meus-documentos-bsb");
        exit;
    });


//---------ROTA PARA A ABERTURA DOS DocumentoS----------------------//

    $app->get('/admin/registrar-documentos-bsb', function() {  


        Usuario::verificaLoginAdmin();



        $page = new PageAdmin();

        $page->setTpl("admin-abertura-documentos-bsb",[
            'CallOpenMsg'=> Usuario::getSuccess(),
            'errorRegister'=> Usuario::getErrorRegister(),
            


        ]);

    });

//---------ROTA PARA O FORMULÁRIO DOS DocumentoS----------------------//


    $app->post("/admin/registrar-documentos-bsb/enviar", function(){

        Usuario::verificaLoginAdmin();

        $Documento = new Documento();


        $Documento->setData($_POST);


        $Documento->registrarDocumentos();

        

        Usuario::setSuccess("Documento registrado com sucesso!!");

        header("Location: /admin/todos-documentos-bsb");
        exit;


    });




//---------ROTA PARA EDITAR ALTERAÇÃO DOS DocumentoS----------------------//

    $app->get('/admin/documento/editar-bsb/:id_documento', function($id_documento){
    
        Usuario::verificaLoginAdmin();
    
        $documento = new Documento();
    
        $documento->get((int)$id_documento);
    
        $page = new PageAdmin();
    
        $page ->setTpl("admin-documento-editar-bsb", array(
            "value"=>$documento->getValues(),
            'CallOpenMsg'=> Usuario::getSuccess(),
            'errorRegister'=> Usuario::getErrorRegister()  
        ));
    
    });

 //---------ROTA PARA O ENVIO DO FORMULÁRIO DE EDIÇÃO DOS DocumentoS----------------------//

    $app->post("/admin/Documento/editar-bsb/:id_documento",function($id_documento){

        Usuario::verificaLoginAdmin();

        $Documento = new Documento();


        $Documento->get((int)$id_documento);
    
        $Documento->setData($_POST);
       
        

        $Documento->editarDocumentos();

        Usuario::setSuccess("Dados alterados com Sucesso");

        header("Location: /admin/todos-documentos-bsb");
        exit;


    });


//---------ROTA PARA A PÁGINA DE TODOS OS DocumentoS ----------------------//
    $app->get('/admin/todos-documentos-bsb', function() {  


        Usuario::verificaLoginAdmin();

        $admin = Usuario::getFromSession();
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
                'link'=>'/admin/todos-documentos-bsb?page='.$i,
                'page'=>$i,
                'search'=>$search,
            ]);
        }

        $page = new PageAdmin();

        $page->setTpl("admin-todos-documentos-bsb",[
            
            "documentos"=>$pagination['data'],
            "search"=>$search,
            'profileMsg'=>Usuario::getSuccess(),
            "pages"=>$pages,
            "values"=>$Documento->getValues()
        ]);

    });

//---------ROTA PARA ANEXAR ARQUIVO  - POST---------------------//

    $app->post("/admin/documento/anexar-arquivo-bsb/:id_documento", function ($id_documento) {

        $documento = new Documento();

        $documento  ->get((int)$id_documento);
    
        $documento  ->setData($_POST);
    
        $documento  ->moveArquivo();

        Usuario::setSuccess("Arquivo(s) Anexado(s) com Sucesso");

        header('Location: /admin/todos-documentos-bsb');
        exit;

    });

//---------ROTA PARA A PÁGINA DOS ARQUIVOS DO Documento----------------------//

    $app->get('/admin/todos-documentos-bsb/arquivos/:id_documento', function($id_documento) {  


        Usuario::verificaLoginAdmin();

        $documento = new Documento();

        $page = new PageAdmin();

        $page->setTpl("admin-arquivos-documentos-bsb",[
            "id_documento"=>$documento->get((int)$id_documento),
            'arquivo'=>$documento->showArquivo($id_documento),
            "value"=>$documento->getValues()

        ]);

    });






