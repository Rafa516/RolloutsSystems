<?php 

namespace Projeto\Model;

use \Projeto\DB\Sql;
use \Projeto\Model;


//Classe Estoque(Estoque, com seus métodos específicos)
class Estoque extends Model {

//MÉTODO ESTÁTICO QUE VERIFICA O ARRAY DE DADOS

	public static function checkList($list)
	{

		foreach ($list as &$row) {
		
			$p = new Estoque();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}


	public function getEquipamentos($id_termos)
	{
		
		$sql = new Sql(); 
		$results  = $sql->select("SELECT * FROM tb_retirada_equipamentos_termos a 
		INNER JOIN tb_estoque b USING(id_equipamento) WHERE a.id_termos = :id_termos", [
		  ':id_termos'=>$id_termos
	  ]);

	  return ['data'=>$results];
	
	}


	
//METODO PARA DELETAR UM PRODUTO
	public function delete($id_equipamento)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_estoque WHERE id_equipamento = :id_equipamento", [
			':id_equipamento'=>$id_equipamento
		]);


		/*$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
				"res" . DIRECTORY_SEPARATOR . 
				"ft_arquivo_termo" . DIRECTORY_SEPARATOR . 
				$this->getarquivo_termo();
				unlink($img);*/
	}


//METODO PARA PEGAR OS VALORES DO ARRAY DE DADOS
	public function getValues()
	{
		

		$values = parent::getValues();

		return $values;

	}

//METODO PARA REGISTRO DOS EQUIPAMENTOS E ACESSORIOS
	public function registrarEquipamentos()
	{
		 
			$sql = new Sql();

			$results = $sql->select("CALL sp_registro_equipamentos(:categoria,:descricao,:fabricante,:modelo,:serie,
			:patrimonio,:condicao,:validacao,:quantidade,:hostname,:imagem,:tela,:devolucao,:lugar,:cidade	
			)", array(
			":categoria"=>$this->getcategoria(),":descricao"=>$this->getdescricao(),":fabricante"=>$this->getfabricante(),
			":modelo"=>$this->getmodelo(),":serie"=>$this->getserie(),":patrimonio"=>$this->getpatrimonio(),
			":condicao"=>$this->getcondicao(),":validacao"=>$this->getvalidacao(),":quantidade"=>$this->getquantidade(),
			":hostname"=>$this->gethostname(),":imagem"=>$this->getimagem(),":tela"=>$this->gettela(),":devolucao"=>$this->getdevolucao(),
			":lugar"=>$this->getlugar(),":cidade"=>$this->getcidade()
			));
	
		
			$this->setData($results[0]);
							

	}

	//METODO PARA ALTERAÇÃO DOS EQUIPAMENTOS E ACESSORIOS
	public function editarEquipamentos()
	{
		 
			$sql = new Sql();

			$results = $sql->select("CALL sp_edita_equipamento(:id_equipamento,:categoria,:descricao,:fabricante,:modelo,:serie,
			:patrimonio,:condicao,:validacao,:quantidade,:hostname,:imagem,:tela,:devolucao,:lugar
			)", array(
			":id_equipamento"=>$this->getid_equipamento(),":categoria"=>$this->getcategoria(),":descricao"=>$this->getdescricao(),":fabricante"=>$this->getfabricante(),
			":modelo"=>$this->getmodelo(),":serie"=>$this->getserie(),":patrimonio"=>$this->getpatrimonio(),
			":condicao"=>$this->getcondicao(),":validacao"=>$this->getvalidacao(),":quantidade"=>$this->getquantidade(),
			":hostname"=>$this->gethostname(),":imagem"=>$this->getimagem(),":tela"=>$this->gettela(),":devolucao"=>$this->getdevolucao(),
			":lugar"=>$this->getlugar()				
			));
	
		
			$this->setData($results[0]);
							

	}

	//METODO PARA VISUALIZAÇÃO DOS CHAMADOS POR USUARIO
	public function get($id_equipamento)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT  * FROM   tb_estoque WHERE id_equipamento = :id_equipamento", [
			':id_equipamento'=>$id_equipamento
		]);

		$this->setData($results[0]);

	}


//PAGINAÇÃO DA PÁGINA DO ESTOQUE DE BRASÍLIA
	public static function getPageEstoqueBsb($page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_estoque		 
			ORDER BY id_equipamento ASC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA do ESTOQUE DE BRASÍLIA

	public static function getPageSearchBsb($search, $page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_estoque 
			WHERE  categoria LIKE :search  OR descricao LIKE :search OR hostname  LIKE :search OR fabricante  LIKE :search  OR modelo  LIKE :search
			OR serie  LIKE :search  OR patrimonio  LIKE :search  OR condicao LIKE :search  OR quantidade  LIKE :search
			OR imagem  LIKE :search 
			ORDER BY id_equipamento ASC
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

	//PAGINAÇÃO DA PÁGINA dDE RETIRADAS DO ESTOQUE DE BARSILIA
	public static function retiradaEstoqueBsb($page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_estoque a INNER JOIN  tb_retirada_equipamentos_termos b USING(id_equipamento)
		INNER JOIN tb_termos c INNER JOIN tb_usuarios d  WHERE d.id_usuario = c.id_usuario AND  c.id_termos = b.id_termos 
		 ORDER BY c.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA  DE RETIRADAS DO ESTOQUE DE BRASÍLIA

	public static function searchRetiradaEstoqueBsb($search, $page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_estoque a INNER JOIN  tb_retirada_equipamentos_termos b ON a.id_equipamento = b.id_equipamento
		INNER JOIN tb_termos c INNER JOIN tb_usuarios d  ON d.id_usuario = c.id_usuario  AND  c.id_termos = b.id_termos
		WHERE  a.categoria LIKE :search OR d.nome_user LIKE :search  OR a.descricao  LIKE :search OR a.modelo  LIKE :search
		OR a.serie  LIKE :search OR a.patrimonio  LIKE :search OR c.n_chamadoT  LIKE :search
		ORDER BY c.dt_data DESC
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

	//PAGINAÇÃO DA PÁGINA dDE ENTRADAS DO ESTOQUE DE BARSILIA
	public static function entradaEstoqueBsb($page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_estoque a INNER JOIN  tb_entrada_equipamentos_termos b USING(id_equipamento)
		INNER JOIN tb_termos c INNER JOIN tb_usuarios d  WHERE d.id_usuario = c.id_usuario AND  c.id_termos = b.id_termos 
		ORDER BY c.dt_data DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA  DE RETIRADAS DO ESTOQUE DE BRASÍLIA

	public static function searchEntradaEstoqueBsb($search, $page = 1, $itemsPerPage = 100)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_estoque a INNER JOIN  tb_entrada_equipamentos_termos b ON a.id_equipamento = b.id_equipamento
		INNER JOIN tb_termos c INNER JOIN tb_usuarios d  ON d.id_usuario = c.id_usuario  AND  c.id_termos = b.id_termos
		WHERE  a.categoria LIKE :search OR d.nome_user LIKE :search  OR a.descricao  LIKE :search OR a.modelo  LIKE :search
		OR a.serie  LIKE :search OR a.patrimonio  LIKE :search OR c.n_chamadoT  LIKE :search
		ORDER BY c.dt_data DESC
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
	


	public static function getEquipamentosEstoque()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_estoque WHERE categoria = 'Estação' OR  categoria = 'Telecom'
		ORDER BY descricao ASC");

	}

	public static function getAcessoriosEstoque()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_estoque  WHERE categoria = 'Consumo' OR categoria = 'Acessórios'
		ORDER BY descricao ASC");

	}


	

}