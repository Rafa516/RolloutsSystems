<?php 

namespace Projeto\Model;

use \Projeto\DB\Sql;
use \Projeto\Model;



//Classe Termo(Termo, com seus métodos específicos)
class Termo extends Model {

//MÉTODO ESTÁTICO QUE VERIFICA O ARRAY DE DADOS

	public static function checkList($list)
	{

		foreach ($list as &$row) {
		
			$p = new Termo();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}


//METODO QUE VERIFICA O TOTAL  DE TERMOS EM BRASILIA REGISTRADOS
	public static function totalTermosBsb()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE cidade = 'Brasília'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS EM RIO DE JANEIRO REGISTRADOS
	public static function totalTermosRj()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE cidade = 'Rio de Janeiro'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalRj'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS EM RECIFE REGISTRADOS
	public static function totalTermosRec()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE cidade = 'Recife'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalRec'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS EM RECIFE REGISTRADOS
	public static function totalTermosFlr()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE cidade = 'Florianópolis'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalFlr'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS REGISTRADOS
	public static function totalTermos()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotal'=>(int)$resultTotal[0]["nrtotal"]];
	}


//METODO QUE VERIFICA O TOTAL  DE TERMOS DE ENTREGA REGISTRADOS
	public static function totalTermosEntrega()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE termo = 'Entrega'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalEntrega'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS DE ENTREGA REGISTRADOS EM BRASILIA
	public static function totalTermosEntregaBsb()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE termo = 'Entrega' AND cidade ='Brasília'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalEntregaBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}


//METODO QUE VERIFICA O TOTAL  DE TERMOS DE DEVOLUÇÃO REGISTRADOS
	public static function totalTermosDevolucao()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE termo = 'Devolução'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalDevolucao'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS DE DEVOLUÇÃO REGISTRADOS EM BRASILIA
	public static function totalTermosDevolucaoBsb()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE termo = 'Devolução' AND cidade ='Brasília'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalDevolucaoBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS DE PENDENTES REGISTRADOS
	public static function totalTermosPendente()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE situacao_t = 'Pendente'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalPendente'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS DE PENDENTES REGISTRADOS
	public static function totalTermosPendenteBsb()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE situacao_t = 'Pendente' AND cidade='Brasília'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalPendenteBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS DE FINALIZADOS REGISTRADOS
	public static function totalTermosFinalizado()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE situacao_t = 'Finalizado'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalFinalizado'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE TERMOS DE FINALIZADOS REGISTRADOS EM bRASÍLIA
	public static function totalTermosFinalizadoBsb()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE situacao_t = 'Finalizado' AND cidade='Brasília'");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


		return ['termosTotalFinalizadoBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}
//METODO QUE VERIFICA O TOTAL DE TERMOS DE CADA USUÁRIO	TOTAL
	
	public static function totalTermosID($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE id_usuario = :id_usuario",[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalID'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL DE TERMOS DE CADA USUÁRIO	 de Brasília
	
		public static function totalTermosIDBsb($id_usuario)
		{
			
			$sql = new Sql();
			$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_termos WHERE id_usuario = :id_usuario AND cidade ='Brasília'",[
					':id_usuario'=>$id_usuario
					]);
			$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


			return ['termosTotalIDBsb'=>(int)$resultTotal[0]["nrtotal"]];
		}



//METODO QUE VERIFICA O TOTAL DE TERMOS DE CADA USUÁRIO	DO RIO DE JANEIRO
	
	public static function totalTermosIDRj($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE id_usuario = :id_usuario AND cidade = 'Rio de Janeiro'" ,[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalIDRj'=>(int)$resultTotal[0]["nrtotal"]];
	}
//METODO QUE VERIFICA O TOTAL DE TERMOS DE CADA USUÁRIos DO RECIFE 
	
	public static function totalTermosIDRec($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE id_usuario = :id_usuario AND cidade = 'Recife'" ,[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalIDRec'=>(int)$resultTotal[0]["nrtotal"]];
	}

	//METODO QUE VERIFICA O TOTAL DE TERMOS DE CADA USUÁRIos DE FLORIANOPOLIS
	
	public static function totalTermosIDFlr($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_termos WHERE id_usuario = :id_usuario AND cidade = 'Florianópolis'" ,[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['termosTotalIDFlr'=>(int)$resultTotal[0]["nrtotal"]];
	}


//METODO PARA REGISTRO DOS TERMOS
	public function registrarTermos()
	{
		 
		$sql = new Sql();

		$results = $sql->select("CALL sp_registro_termos(:id_usuario,:termo,:n_chamadoT,:situacao_t,:nome_t,
		:diretoria_t,:gerencia_t,:gerencia_exeT,
		:observacao_t,
		:finalidade,:dt_data,:cidade,:antigo,:destino_t

	
	
		)", array(
			":id_usuario"=>$this->getid_usuario(),":termo"=>$this->gettermo(),":n_chamadoT"=>$this->getn_chamadoT(),
			":situacao_t"=>$this->getsituacao_t(),":nome_t"=>$this->getnome_t(),":diretoria_t"=>$this->getdiretoria_t(),
			":gerencia_t"=>$this->getgerencia_t(),":gerencia_exeT"=>$this->getgerencia_exeT(),
			":observacao_t"=>$this->getobservacao_t(),
			":finalidade"=>$this->getfinalidade(),":dt_data"=>$this->getdt_data(),":cidade"=>$this->getcidade(),":antigo"=>$this->getantigo(),
			":destino_t"=>$this->getdestino_t()
			
		));
	
		
		$this->setData($results[0]);

      if ($this->gettermo() == 'Entrega') {
		Termo::retiradasEquipamentos();
	  }
	  else{
		Termo::entradasEquipamentos();
	  }

	

	}
	

//METODO PARA EDIÇÃO DOS TERMOS
	public function editarTermos($id_termos)
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_edita_termo(:id_termos,:n_chamadoT,:situacao_t,:nome_t,
		:diretoria_t,:gerencia_t,:gerencia_exeT,
		:observacao_t,
		:finalidade,:dt_data,:destino_t

		)", array(
			":id_termos"=>$this->getid_termos(),":n_chamadoT"=>$this->getn_chamadoT(),
			":situacao_t"=>$this->getsituacao_t(),":nome_t"=>$this->getnome_t(),":diretoria_t"=>$this->getdiretoria_t(),
			":gerencia_t"=>$this->getgerencia_t(),":gerencia_exeT"=>$this->getgerencia_exeT(),
			":observacao_t"=>$this->getobservacao_t(),
			":finalidade"=>$this->getfinalidade(),":dt_data"=>$this->getdt_data(),":destino_t"=>$this->getdestino_t()
			
		));

		$this->setData($results[0]);

		if ($this->gettermo() == 'Entrega') {

			$sql->query("UPDATE tb_estoque a  INNER JOIN tb_retirada_equipamentos_termos b USING(id_equipamento)
			INNER JOIN tb_termos c
			SET a.lugar = c.destino_t WHERE c.id_termos = :id_termos 
			AND b.id_equipamento = a.id_equipamento", [
				":id_termos"=>$id_termos																
			]);
		}else{
			$sql->query("UPDATE tb_estoque a  INNER JOIN tb_entrada_equipamentos_termos b USING(id_equipamento)
			INNER JOIN tb_termos c
			SET a.lugar = c.destino_t WHERE c.id_termos = :id_termos 
			AND b.id_equipamento = a.id_equipamento", [
				":id_termos"=>$id_termos																
			]);
		}



	}

//METODO PARA ALTERAÇÃO DOS ANALISTAS
	public function alterarAnalista()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_altera_analista_termo(:id_termos,:id_usuario

		)", array(
			":id_termos"=>$this->getid_termos(),
			":id_usuario"=>$this->getid_usuario()
			
		));

		$this->setData($results[0]);


	}



//METODO PARA ATUALIZAR A SITUAÇÃO DE CADA TERMO 
	public function editarSituacao()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_editar_situacaoT(:id_termos,:situacao_t)", [
			':id_termos'=>$this->getid_termos(),
			':situacao_t'=>$this->getsituacao_t()	
		]);

		$this->setData($results[0]);	

	}
//METODO PARA VERIFICAÇÃO DA SITUAÇÃO DE CADA TERMO
	public function valueSituacao($id_termos)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT * FROM tb_termos WHERE id_termos = :id_termos", [
			':id_termos'=>$id_termos
		]);

		$this->setData($results[0]);

		return ['value'=>$results[0]["situacao"]];

	}
	

//METODO PARA VISUALIZAÇÃO DOS CHAMADOS POR USUARIO
	public function get($id_termos)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT  * FROM   tb_termos WHERE id_termos = :id_termos", [
			':id_termos'=>$id_termos
		]);

		$this->setData($results[0]);

	}
//METODO PARA VISUALIZAÇÃO DAS RETIRADAS DOS EQUIPAMENTOS
	public function getEquipamentosRetirada($id_termos)
	{
		
		$sql = new Sql(); 
		$results  = $sql->select("SELECT * FROM tb_retirada_equipamentos_termos a 
		INNER JOIN tb_estoque b USING(id_equipamento) WHERE a.id_termos = :id_termos AND categoria = 'Estação' OR  categoria = 'Telecom'", [
		  ':id_termos'=>$id_termos
	  ]);

	  return ['data'=>$results];
	
	}

//METODO PARA VISUALIZAÇÃO DAS ENTRADAS DOS EQUIPAMENTOS
	public function getEquipamentosEntrada($id_termos)
	{
		
		$sql = new Sql(); 
		$results  = $sql->select("SELECT * FROM tb_entrada_equipamentos_termos a 
		INNER JOIN tb_estoque b USING(id_equipamento) WHERE a.id_termos = :id_termos AND categoria = 'Estação' OR  categoria = 'Telecom'", [
		  ':id_termos'=>$id_termos
	  ]);

	  return ['data'=>$results];
	
	}
//METODO PARA VISUALIZAÇÃO DAS RETIRADAS DOS ACESSORIOS
	public function getAcessoriosRetirada($id_termos)
	{
		
		$sql = new Sql(); 
		$results  = $sql->select("SELECT * FROM tb_retirada_equipamentos_termos a 
		INNER JOIN tb_estoque b USING(id_equipamento) WHERE a.id_termos = :id_termos AND categoria = 'Consumo' OR categoria = 'Acessórios'", [
		  ':id_termos'=>$id_termos
	  ]);

	  return ['data'=>$results];
	
	}
//METODO PARA VISUALIZAÇÃO DAS ENTRADAS DOS ACESSORIOS
	public function getAcessoriosEntrada($id_termos)
	{
		
		$sql = new Sql(); 
		$results  = $sql->select("SELECT * FROM tb_entrada_equipamentos_termos a 
		INNER JOIN tb_estoque b USING(id_equipamento) WHERE a.id_termos = :id_termos AND categoria = 'Consumo' OR categoria = 'Acessórios'", [
		  ':id_termos'=>$id_termos
	  ]);

	  return ['data'=>$results];
	
	}

//METODO PARA VERIFICAR UM ARQUIVO 

	public function getArquivos($id_arquivoT)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT * FROM tb_arquivos_termos WHERE id_arquivoT  = :id_arquivoT", [
			':id_arquivoT '=>$id_arquivoT 	
		]);	
		
			
		$this->setData($results[0]);

	}


	
//METODO PARA DELETAR UM TERMO
	public function delete($id_termos)
	{

		if ($this->gettermo() == 'Entrega') {

			$sql = new Sql();

			$sql->query("UPDATE tb_estoque a INNER JOIN tb_retirada_equipamentos_termos b USING(id_equipamento)
			 INNER JOIN tb_termos c SET a.quantidade = a.quantidade + b.qtd_retirada 
			 WHERE b.id_termos = :id_termos AND b.id_equipamento = a.id_equipamento;", [
			":id_termos"=>$id_termos
			]);

			$sql->query("DELETE FROM tb_termos WHERE id_termos = :id_termos", [
				":id_termos"=>$id_termos
			]);
		
		}
		  else{

			$sql = new Sql();

			$sql->query("UPDATE tb_estoque a INNER JOIN tb_entrada_equipamentos_termos b USING(id_equipamento)
			 INNER JOIN tb_termos c SET a.quantidade = a.quantidade - b.qtd_entrada 
			 WHERE b.id_termos = :id_termos AND b.id_equipamento = a.id_equipamento;", [
			":id_termos"=>$id_termos
			]);

			$sql->query("DELETE FROM tb_termos WHERE id_termos = :id_termos", [
				":id_termos"=>$id_termos
			]);
			
		  }

		/*$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
				"res" . DIRECTORY_SEPARATOR . 
				"ft_arquivo_termo" . DIRECTORY_SEPARATOR . 
				$this->getarquivo_termo();
				unlink($img);*/

	}

//METODO PARA DELETAR UM ARQUIVO
	public function deletarArquivo($id_arquivoT)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_arquivos_termos WHERE id_arquivoT  = :id_arquivoT ", [
			':id_arquivoT '=>$id_arquivoT
		]);


		$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
				"res" . DIRECTORY_SEPARATOR . 
				"ft_arquivo_termo" . DIRECTORY_SEPARATOR . 
				$this->getarquivo_termo();
				unlink($img);

	}

	

//METODO PARA PEGAR OS VALORES DO ARRAY DE DADOS
	public function getValues()
	{
		

		$values = parent::getValues();

		return $values;

	}


//PAGINAÇÃO DA PÁGINA TODOS TERMOS Brasília
	public static function getPageAllBsb($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND antigo = 'Não'
			WHERE cidade = 'Brasília'		 
			ORDER BY b.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS TERMOS BRASÍLIA

	public static function getPageSearchBsb($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Brasília'  AND antigo = 'Não'
			WHERE  a.nome_user LIKE :search OR b.nome_t LIKE :search OR a.localidade LIKE :search   
			OR b.termo LIKE :search OR b.n_chamadoT LIKE :search OR b.data_registro LIKE :search 
			OR b.situacao_t LIKE :search ORDER BY b.dt_data DESC
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

	//PAGINAÇÃO DA PÁGINA TODOS TERMOS  Antigos Brasília
	public static function getPageAllAntigosBsb($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND antigo != 'Não' 
			WHERE cidade = 'Brasília'		 
			ORDER BY b.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS TERMOS ANTIGOS BRASÍLIA

	public static function getPageSearchAntigosBsb($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Brasília' AND antigo != 'Não'
			WHERE  a.nome_user LIKE :search OR b.nome_t LIKE :search OR a.localidade LIKE :search   
			OR b.termo LIKE :search OR b.n_chamadoT LIKE :search OR b.data_registro LIKE :search 
			OR b.situacao_t LIKE :search ORDER BY b.dt_data DESC
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
	
//PAGINAÇÃO DA PÁGINA TODOS TERMOS dO RIO DE JANEIRO
	public static function getPageAllRj($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario WHERE cidade = 'Rio de Janeiro'  
			ORDER BY b.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS TERMOS DO RIO DE JANEIRO

	public static function getPageSearchRj($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Rio de Janeiro'
			WHERE  a.nome_user LIKE :search OR b.nome_t LIKE :search OR a.localidade LIKE :search   
			OR b.termo LIKE :search OR b.n_chamadoT LIKE :search OR b.data_registro LIKE :search 
			OR b.situacao_t LIKE :search ORDER BY b.dt_data DESC
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

//PAGINAÇÃO DA PÁGINA TODOS TERMOS dO Recife
	public static function getPageAllRec($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario WHERE cidade = 'Recife' 
			 ORDER BY b.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}
//BUSCA DA PÁGINA TODOS TERMOS DO RECIFE

	public static function getPageSearchRec($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Recife'
			WHERE  a.nome_user LIKE :search OR b.nome_t LIKE :search OR a.localidade LIKE :search   
			OR b.termo LIKE :search OR b.n_chamadoT LIKE :search OR b.data_registro LIKE :search 
			OR b.situacao_t LIKE :search ORDER BY b.dt_data DESC
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

//PAGINAÇÃO DA PÁGINA TODOS TERMOS dO FLORIANOPOLIS
	public static function getPageAllFlr($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario WHERE cidade = 'Florianópolis' 
			 ORDER BY b.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS TERMOS DE FLORIANOPOLIS

	public static function getPageSearchFlr($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario AND cidade = 'Florianópolis'
			WHERE  a.nome_user LIKE :search OR b.nome_t LIKE :search OR a.localidade LIKE :search   
			OR b.termo LIKE :search OR b.n_chamadoT LIKE :search OR b.data_registro LIKE :search 
			OR b.situacao_t LIKE :search ORDER BY b.dt_data DESC
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
		    FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario
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
			FROM tb_usuarios a INNER JOIN  tb_termos b ON b.id_usuario = a.id_usuario
			WHERE a.nome_user LIKE :search OR b.nome_t LIKE :search OR b.n_chamadoT  LIKE :search 
			OR b.id_termos LIKE :search OR b.situacao_t  LIKE :search OR b.termo  LIKE :search
			OR b.cidade  LIKE :search
		    ORDER BY b.dt_data DESC
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
						
			$file = isset($_FILES['arquivo_termo']) ? $_FILES['arquivo_termo'] : FALSE;

		

				//loop para ler os arquivos
				for ($cont = 0; $cont < count($file['name']); $cont++){ 


					$directory = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
						"res" . DIRECTORY_SEPARATOR . 
						"ft_arquivo_termo" . DIRECTORY_SEPARATOR . 
						
						$file['name'][$cont];

						$arquivo_termo = $file['name'][$cont];			
			
						$sql = new Sql();
						$sql->select("CALL sp_arquivo_termo_add(:id_termos,:id_usuario, :arquivo_termo)", array(
							":id_termos"=>$this->getid_termos(),
							":id_usuario"=>$this->getid_usuario(),
							":arquivo_termo"=>$arquivo_termo));
			
						move_uploaded_file($file['tmp_name'][$cont], $directory);

				}
			
		
	}

//METODO PARA VERIFICAR O TOTAL DE ARQUIVO DE CADA termo
	public static function numArquivosTermos($id_termos)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_arquivos_termos WHERE id_termos = :id_termos",[
			':id_termos'=>$id_termos
			]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return ['arquivos'=>(int)$resultTotal[0]["nrtotal"]];
	}


	public static function nomeArquivos($id_termos)
	{

		$sql = new Sql();

		$results  = $sql->select("SELECT * FROM tb_arquivos_termos WHERE id_termos = :id_termos", [
			':id_termos'=>$id_termos
		]);

		return ['nome'=>$results[0]["arquivo_rollout"]];

	}

//METODO PARA LISTAR OS ARQUIVOS
		public function showArquivo($id_termos)
		{
		$sql = new Sql();


		$resultsExistFile = $sql->select("SELECT * FROM tb_arquivos_termos WHERE id_termos = :id_termos ", [
			':id_termos'=>$id_termos
		]);

		$countResultsFile = count($resultsExistFile);
		if ($countResultsFile > 0)
		{
			foreach ($resultsExistFile as &$result)
			{
				foreach ($result as $key => $value) {
					if ($key === "arquivo_termo") {
						$result["arquivo"] = '/res/ft_arquivo_termo/'. $result['arquivo_termo'];
					}
				}
			} 


		
		return $resultsExistFile;
		}


		}

	//BUSCA NA TABELA USUÁRIOS
	public static function getAnalistas()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios   
		ORDER BY nome_user ASC");


	}

//METODO PARA ENTREGA DOS EQUIPAMENTOS
	public function  retiradasEquipamentos()
	{		

		$eqp = isset($_POST['id_equipamento']) ? $_POST['id_equipamento'] : FALSE;

	    $qtd = isset($_POST['qtd_retirada']) ? $_POST['qtd_retirada'] : FALSE;
		//loop para ler os equipamentos, quantidadades 

				for ($cont = 0; $cont < count($eqp) && count($qtd); $cont++){ 
					
						$eqp[$cont];
						$qtd[$cont];
				
						$id_equipamento = $eqp[$cont];	
						$qtd_retirada = $qtd[$cont];
				
						if($qtd_retirada!= "" || $id_equipamento != "" )
						{
			
							$sql = new Sql();
							$sql->select("CALL sp_retirada_equipamento_termos(:id_termos,:id_equipamento,:qtd_retirada)", array(
								":id_termos"=>$this->getid_termos(),
								":id_equipamento"=>$id_equipamento,
								":qtd_retirada"=>$qtd_retirada								
							));
						

							$sql->query("UPDATE tb_estoque a  INNER JOIN tb_retirada_equipamentos_termos b USING(id_equipamento)
							SET a.quantidade = a.quantidade - b.qtd_retirada WHERE b.id_termos = :id_termos 
							AND b.id_equipamento = :id_equipamento", [
								":id_termos"=>$this->getid_termos(),
								":id_equipamento"=>$id_equipamento,
							
																								
							]);

							$sql->query("UPDATE tb_estoque a  INNER JOIN tb_retirada_equipamentos_termos b USING(id_equipamento)
							INNER JOIN tb_termos c
							SET a.lugar = c.destino_t WHERE c.id_termos = :id_termos 
							AND b.id_equipamento = :id_equipamento", [
								":id_termos"=>$this->getid_termos(),
								":id_equipamento"=>$id_equipamento,
							
																								
							]);
						}
					}	
					
	}



//METODO PARA DEVOLUÇÃO DOS EQUIPAMENTOS
	public function  entradasEquipamentos()
	{		
		
		$eqp = isset($_POST['id_equipamento']) ? $_POST['id_equipamento'] : FALSE;

	    $qtd = isset($_POST['qtd_entrada']) ? $_POST['qtd_entrada'] : FALSE;

		//loop para ler os equipamentos, quantidadades 

				for ($cont = 0; $cont < count($eqp) && count($qtd) ; $cont++){ 
				
					$eqp[$cont];
					$qtd[$cont];
					
					$id_equipamento = $eqp[$cont];
					$qtd_entrada = $qtd[$cont];	
	

					if($qtd_entrada!= "" || $id_equipamento != ""  )
						{
							$sql = new Sql();
							$sql->select("CALL sp_entrada_equipamento_termos(:id_termos,:id_equipamento,:qtd_entrada)", array(
								":id_termos"=>$this->getid_termos(),
								":id_equipamento"=>$id_equipamento,
								":qtd_entrada"=>$qtd_entrada
													
							));
			
							$sql->query("UPDATE tb_estoque a INNER JOIN tb_entrada_equipamentos_termos b USING(id_equipamento)
							SET a.quantidade = a.quantidade + b.qtd_entrada WHERE b.id_termos = :id_termos 
							AND b.id_equipamento = :id_equipamento", [
								":id_termos"=>$this->getid_termos(),
								":id_equipamento"=>$id_equipamento
								
							]);

							$sql->query("UPDATE tb_estoque a  INNER JOIN tb_entrada_equipamentos_termos b USING(id_equipamento)
							INNER JOIN tb_termos c
							SET a.lugar = c.destino_t WHERE c.id_termos = :id_termos 
							AND b.id_equipamento = :id_equipamento", [
								":id_termos"=>$this->getid_termos(),
								":id_equipamento"=>$id_equipamento,
							
																								
							]);
					    }
						
						
				}
	}


}