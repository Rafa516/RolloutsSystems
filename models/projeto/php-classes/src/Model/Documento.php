<?php 

namespace Projeto\Model;

use \Projeto\DB\Sql;
use \Projeto\Model;


//Classe Documento(Documento, com seus métodos específicos)
class Documento extends Model {

//MÉTODO ESTÁTICO QUE VERIFICA O ARRAY DE DADOS

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Documento();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}


//METODO QUE VERIFICA O TOTAL  DE DOCUMENTOS EM BRASILIA REGISTRADOS
	public static function totalDocumentosBsb()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_documentos WHERE cidade = 'Brasília'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['documentosTotalBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE DOCUMENTOS EM RIO DE JANEIRO REGISTRADOS
	public static function totalDocumentosRj()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_documentos WHERE cidade = 'Rio de Janeiro'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['documentosTotalRj'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE DOCUMENTOS EM RECIFE REGISTRADOS
	public static function totalDocumentosRec()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_documentos WHERE cidade = 'Recife'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['documentosTotalRec'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE DOCUMENTOS EM RECIFE REGISTRADOS
	public static function totalDocumentosFlr()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_documentos WHERE cidade = 'Florianópolis'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['documentosTotalFlr'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE DOCUMENTOS REGISTRADOS
	public static function totalDocumentos()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_documentos");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['documentosTotal'=>(int)$resultTotal[0]["nrtotal"]];
	}



//METODO PARA REGISTRO DOS DOCUMENTOS
	public function registrarDocumentos()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_registro_documentos(:id_usuario,:nome_documento,:dt_documento,:cidade
	
		)", array(
			":id_usuario"=>$this->getid_usuario(),":nome_documento"=>$this->getnome_documento(),
            ":dt_documento"=>$this->getdt_documento(),":cidade"=>$this->getcidade(),
			
			
		));

		$this->setData($results[0]);
	
       Documento::moveArquivo();

	}

//METODO PARA EDIÇÃO DOS DOCUMENTOS
	public function editarDocumentos()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_edita_documento(:id_documento,:nome_documento,:dt_documento
	
		)", array(
			":id_documento"=>$this->getid_documento(),":nome_documento"=>$this->getnome_documento(),
            ":dt_documento"=>$this->getdt_documento()
			
			
		));

		$this->setData($results[0]);


	}

 //METODO GET POR ID   
    public function get($id_documento)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT  * FROM  tb_documentos WHERE id_documento = :id_documento", [
			':id_documento'=>$id_documento
		]);

		$this->setData($results[0]);

	

	}


	//METODO PARA ALTERAÇÃO DOS ANALISTAS
	public function alterarAnalista()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_altera_analista_documento(:id_documento,:id_usuario

		)", array(
			":id_documento"=>$this->getid_documento(),
			":id_usuario"=>$this->getid_usuario()
			
		));

		$this->setData($results[0]);


	}


	public function getArquivos($id_arquivoT)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT * FROM tb_arquivos_documentos WHERE id_arquivoT  = :id_arquivoT ", [
			':id_arquivoT '=>$id_arquivoT 	
		]);	
		
			

	}

	
//METODO PARA DELETAR UM DOCUMENTO
	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_documentos WHERE id_documento = :id_documento", [
			':id_documento'=>$this->getid_documento()
		]);


		/*$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
				"res" . DIRECTORY_SEPARATOR . 
				"ft_arquivo_documento" . DIRECTORY_SEPARATOR . 
				$this->getarquivo_documento();
				unlink($img);*/

	}


	

//METODO PARA PEGAR OS VALORES DO ARRAY DE DADOS
	public function getValues()
	{
		

		$values = parent::getValues();

		return $values;

	}


//PAGINAÇÃO DA PÁGINA TODOS DOCUMENTOS Brasília
	public static function getPageAllBsb($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario WHERE cidade = 'Brasília' 
		    ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS DOCUMENTOS BRASÍLIA

	public static function getPageSearchBsb($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario AND cidade = 'Brasília'
			WHERE  b.nome_documento LIKE :search  OR b.dt_documento LIKE :search 
			ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
	
//PAGINAÇÃO DA PÁGINA TODOS DOCUMENTOS dO RIO DE JANEIRO
	public static function getPageAllRj($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario WHERE cidade = 'Rio de Janeiro' 
		    ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS DOCUMENTOS DO RIO DE JANEIRO

	public static function getPageSearchRj($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario AND cidade = 'Rio de Janeiro'
			WHERE  b.nome_documento LIKE :search  OR b.dt_documento LIKE :search 
			ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//PAGINAÇÃO DA PÁGINA TODOS DOCUMENTOS dO Recife
	public static function getPageAllRec($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario WHERE cidade ='Recife' 
		    ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
//BUSCA DA PÁGINA TODOS DOCUMENTOS DO RECIFE

	public static function getPageSearchRec($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario AND cidade = 'Recife'
			WHERE  b.nome_documento LIKE :search  OR b.dt_documento LIKE :search 
			ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

}

//PAGINAÇÃO DA PÁGINA TODOS DOCUMENTOS dO FLORIANOPOLIS
	public static function getPageAllFlr($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario WHERE cidade = 'Florianópolis' 
		    ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS DOCUMENTOS DE FLORIANOPOLIS

	public static function getPageSearchFlr($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario AND cidade = 'Florianópolis'
			WHERE  b.nome_documento LIKE :search  OR  b.dt_documento LIKE :search 
			ORDER BY b.dt_documento DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	//PAGINAÇÃO DA PÁGINA TODOS ROLLOUTS ADMINNISTRADOR
	public static function getPageAll($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario
			 ORDER BY b.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS ROLLOUTS ADMINISTRADOR
	public static function getPageSearchAll($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_documentos b ON b.id_usuario = a.id_usuario
			WHERE  a.nome_documento LIKE OR a.dt_documento LIKE :search 
			ORDER BY a.dt_documento DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


//METODO PARA ENVIAR O AQRUIVO

	public function moveArquivo()
	{
						
			$file = isset($_FILES['arquivo_documento']) ? $_FILES['arquivo_documento'] : FALSE;

		

				//loop para ler os arquivos
				for ($cont = 0; $cont < count($file['name']); $cont++){ 


					$directory = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
						"res" . DIRECTORY_SEPARATOR . 
						"arquivo_documento" . DIRECTORY_SEPARATOR . 
						
						$file['name'][$cont];

						$arquivo_documento = $file['name'][$cont];	
						
						
			
						$sql = new Sql();
						$sql->select("CALL sp_arquivo_documento_add(:id_documento,:id_usuario, :arquivo_documento)", array(
							":id_documento"=>$this->getid_documento(),
							":id_usuario"=>$this->getid_usuario(),
							":arquivo_documento"=>$arquivo_documento));

			
						move_uploaded_file($file['tmp_name'][$cont], $directory);

				}

			
		
	}

//METODO PARA VERIFICAR O TOTAL DE ARQUIVO DE CADA DOCUMENTO
	public static function numArquivosDocumentos($id_documento)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_arquivos_documentos WHERE id_documento = :id_documento",[
			':id_documento'=>$id_documento
			]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return ['arquivos'=>(int)$resultTotal[0]["nrtotal"]];
	}


	public static function nomeArquivos($id_documento)
	{

		$sql = new Sql();

		$results  = $sql->select("SELECT * FROM tb_arquivos_documentos WHERE id_documento = :id_documento", [
			':id_documento'=>$id_documento
		]);

		return ['nome'=>$results[0]["arquivo_rollout"]];

	}

//METODO PARA LISTAR OS ARQUIVOS
		public function showArquivo($id_documento)
		{
		$sql = new Sql();


		$resultsExistFile = $sql->select("SELECT * FROM tb_arquivos_documentos WHERE id_documento = :id_documento ", [
			':id_documento'=>$id_documento
		]);

		$countResultsFile = count($resultsExistFile);
		if ($countResultsFile > 0)
		{
			foreach ($resultsExistFile as &$result)
			{
				foreach ($result as $key => $value) {
					if ($key === "arquivo_documento") {
						$result["arquivo"] = '/res/arquivo_documento/'. $result['arquivo_documento'];
					}
				}
			} 


		
		return $resultsExistFile;
		}


		}

	

}
