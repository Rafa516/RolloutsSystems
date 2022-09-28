<?php 

namespace Projeto\Model;

use \Projeto\DB\Sql;
use \Projeto\Model;

//Classe Rollout(Rollout, com seus métodos específicos)
class Rollout extends Model {

//MÉTODO ESTÁTICO QUE VERIFICA O ARRAY DE DADOS
	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Rollout();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS REGISTRADO
	public static function totalRollouts()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotal'=>(int)$resultTotal[0]["nrtotal"]];
	}

	
//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS REGISTRADO RIO DE JANEIRO
public static function totalRolloutsRj()
{
	
	$sql = new Sql();
	$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_rollouts WHERE cidade='Rio de Janeiro'");
	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


	return ['rolloutsTotalRj'=>(int)$resultTotal[0]["nrtotal"]];
}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS REGISTRADO BRASILIA
public static function totalRolloutsBsb()
{
	
	$sql = new Sql();
	$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_rollouts WHERE cidade='Brasília'");
	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


	return ['rolloutsTotalBsb'=>(int)$resultTotal[0]["nrtotal"]];
}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS REGISTRADO RECIFE
public static function totalRolloutsRec()
{
	
	$sql = new Sql();
	$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_rollouts WHERE cidade='Recife'");
	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


	return ['rolloutsTotalRec'=>(int)$resultTotal[0]["nrtotal"]];
}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS REGISTRADO FLORIANOPOLIS
public static function totalRolloutsFlr()
{
	
	$sql = new Sql();
	$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_rollouts WHERE cidade='Florianópolis'");
	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


	return ['rolloutsTotalFlr'=>(int)$resultTotal[0]["nrtotal"]];
}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS FINALIZADOS
	public static function totalRolloutsFinalizado()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts  WHERE situacao = 'Finalizado' ");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotalFinalizado'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS FINALIZADOS EM BRASILIA 
	public static function totalRolloutsFinalizadoBsb()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts  WHERE situacao = 'Finalizado' AND cidade ='Brasília' ");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotalFinalizadoBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS PENDENTES
	public static function totalRolloutsPendente()
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts  WHERE situacao = 'Pendente' ");
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotalPendente'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL  DE ROLLOUTS PENDENTES EM BRASÍLIA
public static function totalRolloutsPendenteBsb()
{
	
	$sql = new Sql();
	$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_rollouts  WHERE situacao = 'Pendente' AND cidade ='Brasília' ");
	$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");


	return ['rolloutsTotalPendenteBsb'=>(int)$resultTotal[0]["nrtotal"]];
}



	
//METODO QUE VERIFICA O TOTAL DE ROLLOUTS DE CADA USUÁRIO
	public static function totalRolloutsID($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts WHERE id_usuario = :id_usuario",[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotalID'=>(int)$resultTotal[0]["nrtotal"]];
	}
//METODO QUE VERIFICA O TOTAL DE ROLLOUTS DE CADA USUÁRIO DE BRASÍLA 
	public static function totalRolloutsIDBsb($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Brasília'",[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotalIDBsb'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL DE ROLLOUTS DE CADA USUÁRIO DE BRASÍLA 
	public static function totalRolloutsIDRj($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Rio de Janeiro'",[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotalIDRj'=>(int)$resultTotal[0]["nrtotal"]];
	}

	//METODO QUE VERIFICA O TOTAL DE ROLLOUTS DE CADA USUÁRIO DE RECIFE 
	public static function totalRolloutsIDRec($id_usuario)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Recife'",[
				':id_usuario'=>$id_usuario
				]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

	
		return ['rolloutsTotalIDRec'=>(int)$resultTotal[0]["nrtotal"]];
	}

//METODO QUE VERIFICA O TOTAL DE ROLLOUTS DE CADA USUÁRIO DE FLORIANOPOLIS
		public static function totalRolloutsIDFlr($id_usuario)
		{
			
			$sql = new Sql();
			$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
				FROM tb_rollouts WHERE id_usuario = :id_usuario AND cidade = 'Florianópolis'",[
					':id_usuario'=>$id_usuario
					]);
			$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
	
		
			return ['rolloutsTotalIDFlr'=>(int)$resultTotal[0]["nrtotal"]];
		}
	


//METODO PARA REGISTRO DOS ROLLOUTS
	public function registrarRollouts()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_registro_rollout(:id_usuario,:n_chamado,:situacao,:nome,:diretoria,:gerencia,:gerencia_executiva,:andar,
		:mq_marca_atual,:mq_modelo_atual,:mq_patrimonio_atual,:mq_hostname_atual,:mq_nserie_atual,:mq_rede_atual,
		:mn_marca_atual1,:mn_modelo_atual1,:mn_patrimonio_atual1,:mn_nserie_atual1,
		:mn_marca_atual2,:mn_modelo_atual2,:mn_patrimonio_atual2,:mn_nserie_atual2,
		:mn_marca_atual3,:mn_modelo_atual3,:mn_patrimonio_atual3,:mn_nserie_atual3,
		:mq_marca_novo,:mq_modelo_novo,:mq_patrimonio_novo,:mq_hostname_novo,:mq_nserie_novo,:mq_rede_novo,
		:mn_marca_novo1,:mn_modelo_novo1,:mn_patrimonio_novo1,:mn_nserie_novo1,
		:mn_marca_novo2,:mn_modelo_novo2,:mn_patrimonio_novo2,:mn_nserie_novo2,
		:mn_marca_novo3,:mn_modelo_novo3,:mn_patrimonio_novo3,:mn_nserie_novo3,
		:mq_marca_qrt,:mq_modelo_qrt,:mq_patrimonio_qrt,:mq_hostname_qrt,:mq_nserie_qrt,:mq_rede_qrt,
		:software1,:software2,:software3,:software4,:software5,:software6,:software7,:software8,:software9,:software10,
		:sof1,:sof2,:sof3,:sof4,:sof5,:sof6,:sof7,:sof8,:sof9,:sof10,
		:bkp,:admin,
		:ac_devolvido,
		:ac_mantido,
		:conf1,:conf2,:conf3,:conf4,:conf5,:conf6,:conf7,:conf8,:conf9,:conf10,:conf11,:conf12,:conf13,:conf14,
		:obs_geral,
		:cidade,
		:dt_data_rollout

		



		)", array(
			":id_usuario"=>$this->getid_usuario(),":n_chamado"=>$this->getn_chamado(),":situacao"=>$this->getsituacao(),":nome"=>$this->getnome(),":diretoria"=>$this->getdiretoria(),
			":gerencia"=>$this->getgerencia(),":gerencia_executiva"=>$this->getgerencia_executiva(),":andar"=>$this->getandar(),
			":mq_marca_atual"=>$this->getmq_marca_atual(),":mq_modelo_atual"=>$this->getmq_modelo_atual(),":mq_patrimonio_atual"=>$this->getmq_patrimonio_atual(),":mq_hostname_atual"=>$this->getmq_hostname_atual(),":mq_nserie_atual"=>$this->getmq_nserie_atual(),":mq_rede_atual"=>$this->getmq_rede_atual(),
			":mn_marca_atual1"=>$this->getmn_marca_atual1(),":mn_modelo_atual1"=>$this->getmn_modelo_atual1(),":mn_patrimonio_atual1"=>$this->getmn_patrimonio_atual1(),":mn_nserie_atual1"=>$this->getmn_nserie_atual1(),
			":mn_marca_atual2"=>$this->getmn_marca_atual2(),":mn_modelo_atual2"=>$this->getmn_modelo_atual2(),":mn_patrimonio_atual2"=>$this->getmn_patrimonio_atual2(),":mn_nserie_atual2"=>$this->getmn_nserie_atual2(),
			":mn_marca_atual3"=>$this->getmn_marca_atual3(),":mn_modelo_atual3"=>$this->getmn_modelo_atual3(),":mn_patrimonio_atual3"=>$this->getmn_patrimonio_atual3(),":mn_nserie_atual3"=>$this->getmn_nserie_atual3(),
			":mq_marca_novo"=>$this->getmq_marca_novo(),":mq_modelo_novo"=>$this->getmq_modelo_novo(),":mq_patrimonio_novo"=>$this->getmq_patrimonio_novo(),":mq_hostname_novo"=>$this->getmq_hostname_novo(),":mq_nserie_novo"=>$this->getmq_nserie_novo(),":mq_rede_novo"=>$this->getmq_rede_novo(),
			":mn_marca_novo1"=>$this->getmn_marca_novo1(),":mn_modelo_novo1"=>$this->getmn_modelo_novo1(),":mn_patrimonio_novo1"=>$this->getmn_patrimonio_novo1(),":mn_nserie_novo1"=>$this->getmn_nserie_novo1(),
			":mn_marca_novo2"=>$this->getmn_marca_novo2(),":mn_modelo_novo2"=>$this->getmn_modelo_novo2(),":mn_patrimonio_novo2"=>$this->getmn_patrimonio_novo2(),":mn_nserie_novo2"=>$this->getmn_nserie_novo2(),
			":mn_marca_novo3"=>$this->getmn_marca_novo3(),":mn_modelo_novo3"=>$this->getmn_modelo_novo3(),":mn_patrimonio_novo3"=>$this->getmn_patrimonio_novo3(),":mn_nserie_novo3"=>$this->getmn_nserie_novo3(),
			":mq_marca_qrt"=>$this->getmq_marca_qr(),":mq_modelo_qrt"=>$this->getmq_modelo_qrt(),":mq_patrimonio_qrt"=>$this->getmq_patrimonio_qrt(),":mq_hostname_qrt"=>$this->getmq_hostname_qrt(),":mq_nserie_qrt"=>$this->getmq_nserie_qrt(),":mq_rede_qrt"=>$this->getmq_rede_qrt(),
			":software1"=>$this->getsoftware1(),":software2"=>$this->getsoftware2(),":software3"=>$this->getsoftware3(),":software4"=>$this->getsoftware4(),":software5"=>$this->getsoftware5(),":software6"=>$this->getsoftware6(),":software7"=>$this->getsoftware7(),":software8"=>$this->getsoftware8(),":software9"=>$this->getsoftware9(),":software10"=>$this->getsoftware10(),
			":sof1"=>$this->getsof1(),":sof2"=>$this->getsof2(),":sof3"=>$this->getsof3(),":sof4"=>$this->getsof4(),":sof5"=>$this->getsof5(),":sof6"=>$this->getsof6(),":sof7"=>$this->getsof7(),":sof8"=>$this->getsof8(),":sof9"=>$this->getsof9(),":sof10"=>$this->getsof10(),
			":bkp"=>$this->getbkp(),":admin"=>$this->getadmin(),
			":ac_devolvido"=>$this->getac_devolvido(),
			":ac_mantido"=>$this->getac_mantido(),
			":conf1"=>$this->getconf1(),":conf2"=>$this->getconf2(),":conf3"=>$this->getconf3(),":conf4"=>$this->getconf4(),":conf5"=>$this->getconf5(),":conf6"=>$this->getconf6(),
			":conf7"=>$this->getconf7(),":conf8"=>$this->getconf8(),":conf9"=>$this->getconf9(),":conf10"=>$this->getconf10(),":conf11"=>$this->getconf11(),":conf12"=>$this->getconf12(),
			":conf13"=>$this->getconf13(),":conf14"=>$this->getconf14(),
			":obs_geral"=>$this->getobs_geral(),
			":cidade"=>$this->getcidade(),
			":dt_data_rollout"=>$this->getdt_data_rollout()
			
			
		
		));


		$this->setData($results[0]);
	
		

	}
//METODO PARA EDIÇÃO DOS ROLLOUTS
		public function editarRollouts()
		{
	
			$sql = new Sql();

		$results = $sql->select("CALL sp_edita_rollout(:id_rollout,:n_chamado,:situacao,:nome,:diretoria,:gerencia,:gerencia_executiva,:andar,
		:mq_marca_atual,:mq_modelo_atual,:mq_patrimonio_atual,:mq_hostname_atual,:mq_nserie_atual,:mq_rede_atual,
		:mn_marca_atual1,:mn_modelo_atual1,:mn_patrimonio_atual1,:mn_nserie_atual1,
		:mn_marca_atual2,:mn_modelo_atual2,:mn_patrimonio_atual2,:mn_nserie_atual2,
		:mn_marca_atual3,:mn_modelo_atual3,:mn_patrimonio_atual3,:mn_nserie_atual3,
		:mq_marca_novo,:mq_modelo_novo,:mq_patrimonio_novo,:mq_hostname_novo,:mq_nserie_novo,:mq_rede_novo,
		:mn_marca_novo1,:mn_modelo_novo1,:mn_patrimonio_novo1,:mn_nserie_novo1,
		:mn_marca_novo2,:mn_modelo_novo2,:mn_patrimonio_novo2,:mn_nserie_novo2,
		:mn_marca_novo3,:mn_modelo_novo3,:mn_patrimonio_novo3,:mn_nserie_novo3,
		:mq_marca_qrt,:mq_modelo_qrt,:mq_patrimonio_qrt,:mq_hostname_qrt,:mq_nserie_qrt,:mq_rede_qrt,
		:software1,:software2,:software3,:software4,:software5,:software6,:software7,:software8,:software9,:software10,
		:sof1,:sof2,:sof3,:sof4,:sof5,:sof6,:sof7,:sof8,:sof9,:sof10,
		:bkp,:admin,
		:ac_devolvido,
		:ac_mantido,
		:conf1,:conf2,:conf3,:conf4,:conf5,:conf6,:conf7,:conf8,:conf9,:conf10,:conf11,:conf12,:conf13,:conf14,
		:obs_geral,
		:dt_data_rollout

		



		)", array(
			":id_rollout"=>$this->getid_rollout(),":n_chamado"=>$this->getn_chamado(),":situacao"=>$this->getsituacao(),":nome"=>$this->getnome(),":diretoria"=>$this->getdiretoria(),
			":gerencia"=>$this->getgerencia(),":gerencia_executiva"=>$this->getgerencia_executiva(),":andar"=>$this->getandar(),
			":mq_marca_atual"=>$this->getmq_marca_atual(),":mq_modelo_atual"=>$this->getmq_modelo_atual(),":mq_patrimonio_atual"=>$this->getmq_patrimonio_atual(),":mq_hostname_atual"=>$this->getmq_hostname_atual(),":mq_nserie_atual"=>$this->getmq_nserie_atual(),":mq_rede_atual"=>$this->getmq_rede_atual(),
			":mn_marca_atual1"=>$this->getmn_marca_atual1(),":mn_modelo_atual1"=>$this->getmn_modelo_atual1(),":mn_patrimonio_atual1"=>$this->getmn_patrimonio_atual1(),":mn_nserie_atual1"=>$this->getmn_nserie_atual1(),
			":mn_marca_atual2"=>$this->getmn_marca_atual2(),":mn_modelo_atual2"=>$this->getmn_modelo_atual2(),":mn_patrimonio_atual2"=>$this->getmn_patrimonio_atual2(),":mn_nserie_atual2"=>$this->getmn_nserie_atual2(),
			":mn_marca_atual3"=>$this->getmn_marca_atual3(),":mn_modelo_atual3"=>$this->getmn_modelo_atual3(),":mn_patrimonio_atual3"=>$this->getmn_patrimonio_atual3(),":mn_nserie_atual3"=>$this->getmn_nserie_atual3(),
			":mq_marca_novo"=>$this->getmq_marca_novo(),":mq_modelo_novo"=>$this->getmq_modelo_novo(),":mq_patrimonio_novo"=>$this->getmq_patrimonio_novo(),":mq_hostname_novo"=>$this->getmq_hostname_novo(),":mq_nserie_novo"=>$this->getmq_nserie_novo(),":mq_rede_novo"=>$this->getmq_rede_novo(),
			":mn_marca_novo1"=>$this->getmn_marca_novo1(),":mn_modelo_novo1"=>$this->getmn_modelo_novo1(),":mn_patrimonio_novo1"=>$this->getmn_patrimonio_novo1(),":mn_nserie_novo1"=>$this->getmn_nserie_novo1(),
			":mn_marca_novo2"=>$this->getmn_marca_novo2(),":mn_modelo_novo2"=>$this->getmn_modelo_novo2(),":mn_patrimonio_novo2"=>$this->getmn_patrimonio_novo2(),":mn_nserie_novo2"=>$this->getmn_nserie_novo2(),
			":mn_marca_novo3"=>$this->getmn_marca_novo3(),":mn_modelo_novo3"=>$this->getmn_modelo_novo3(),":mn_patrimonio_novo3"=>$this->getmn_patrimonio_novo3(),":mn_nserie_novo3"=>$this->getmn_nserie_novo3(),
			":mq_marca_qrt"=>$this->getmq_marca_qr(),":mq_modelo_qrt"=>$this->getmq_modelo_qrt(),":mq_patrimonio_qrt"=>$this->getmq_patrimonio_qrt(),":mq_hostname_qrt"=>$this->getmq_hostname_qrt(),":mq_nserie_qrt"=>$this->getmq_nserie_qrt(),":mq_rede_qrt"=>$this->getmq_rede_qrt(),
			":software1"=>$this->getsoftware1(),":software2"=>$this->getsoftware2(),":software3"=>$this->getsoftware3(),":software4"=>$this->getsoftware4(),":software5"=>$this->getsoftware5(),":software6"=>$this->getsoftware6(),":software7"=>$this->getsoftware7(),":software8"=>$this->getsoftware8(),":software9"=>$this->getsoftware9(),":software10"=>$this->getsoftware10(),
			":sof1"=>$this->getsof1(),":sof2"=>$this->getsof2(),":sof3"=>$this->getsof3(),":sof4"=>$this->getsof4(),":sof5"=>$this->getsof5(),":sof6"=>$this->getsof6(),":sof7"=>$this->getsof7(),":sof8"=>$this->getsof8(),":sof9"=>$this->getsof9(),":sof10"=>$this->getsof10(),
			":bkp"=>$this->getbkp(),":admin"=>$this->getadmin(),
			":ac_devolvido"=>$this->getac_devolvido(),
			":ac_mantido"=>$this->getac_mantido(),
			":conf1"=>$this->getconf1(),":conf2"=>$this->getconf2(),":conf3"=>$this->getconf3(),":conf4"=>$this->getconf4(),":conf5"=>$this->getconf5(),":conf6"=>$this->getconf6(),
			":conf7"=>$this->getconf7(),":conf8"=>$this->getconf8(),":conf9"=>$this->getconf9(),":conf10"=>$this->getconf10(),":conf11"=>$this->getconf11(),":conf12"=>$this->getconf12(),
			":conf13"=>$this->getconf13(),":conf14"=>$this->getconf14(),
			":obs_geral"=>$this->getobs_geral(),
			":dt_data_rollout"=>$this->getdt_data_rollout()
			
			
		
		));


		$this->setData($results[0]);
			$this->setData($results[0]);
		
	
		}

//METODO PARA ALTERAÇÃO DOS ANALISTAS
public function alterarAnalista()
{

	$sql = new Sql();

	$results = $sql->select("CALL sp_altera_analista_rollout(:id_rollout,:id_usuario

	)", array(
		":id_rollout"=>$this->getid_rollout(),
		":id_usuario"=>$this->getid_usuario()
		
	));

	$this->setData($results[0]);


}


//METODO PARA ATUALIZAR A SITUAÇÃO DE CADA ROLLOUT
	public function editarSituacao()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_editar_situacao(:id_rollout,:situacao)", [
			':id_rollout'=>$this->getid_rollout(),
			':situacao'=>$this->getsituacao()	
		]);

		$this->setData($results[0]);	

	}
//METODO PARA VERIFICAÇÃO DA SITUAÇÃO DE CADA ROLLOUT
	public function valueSituacao($id_rollout)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT * FROM tb_rollouts WHERE id_rollout = :id_rollout", [
			':id_rollout'=>$id_rollout
		]);

		$this->setData($results[0]);

		return ['value'=>$results[0]["situacao"]];

	}
	

//METODO PARA VISUALIZAÇÃO DOS ROLLOUTS POR USUARIO
	public function get($id_rollout)
	{

		$sql = new Sql();

	     $results  = $sql->select("SELECT  * FROM  tb_rollouts WHERE id_rollout = :id_rollout", [
			':id_rollout'=>$id_rollout
		]);

		$this->setData($results[0]);

		return ['value_id'=>(int)$results[0]["id_rollout"],
				'value_nome'=>$results[0]["nome"],'value_andar'=>$results[0]["andar"],
				'value_data_registro'=>$results[0]["data_registro"]
				];

	}

	
	
//METODO PARA DELETAR UM ROLLOUT
	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_rollouts WHERE id_rollout = :id_rollout", [
			':id_rollout'=>$this->getid_rollout()
		]);


		 /*$img = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
				"res" . DIRECTORY_SEPARATOR . 
				"ft_rollout" . DIRECTORY_SEPARATOR . 
				$this->getnome_foto();
				unlink($img);*/

	}

	

//METODO PARA PEGAR OS VALORES DO ARRAY DE DADOS
	public function getValues()
	{
		

		$values = parent::getValues();

		return $values;

	}

	

	


//PAGINAÇÃO DA PÁGINA TODOS ROLLOUTS DE BRASÍLIA
	public static function getPageAllBsb($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Brasília' 
			ORDER BY b.dt_data_rollout DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS ROLLOUTS DE BRASILIA
	public static function getPageSearchBsb($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Brasília'   
			WHERE  a.nome_user LIKE :search OR b.nome LIKE :search OR a.localidade LIKE :search   
			OR b.id_rollout LIKE :search OR b.situacao  LIKE :search OR b.n_chamado  LIKE :search 
		    ORDER BY b.dt_data_rolloutDESC
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

//PAGINAÇÃO DA PÁGINA TODOS ROLLOUTS DO RIO DE JANEIRO
	public static function getPageAllRj($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Rio de Janeiro' 
			ORDER BY b.dt_data_rollout DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

//BUSCA DA PÁGINA TODOS ROLLOUTS DO RIO DE JANEIRO
	public static function getPageSearchRj($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Rio de Janeiro' 
			WHERE a.nome_user LIKE :search OR b.nome LIKE :search OR a.localidade LIKE :search   
			OR b.id_rollout LIKE :search OR b.situacao  LIKE :search OR b.n_chamado  LIKE :search 
		    ORDER BY b.dt_data_rollout DESC
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

//PAGINAÇÃO DA PÁGINA TODOS ROLLOUTS De RECIFE
	public static function getPageAllRec($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Recife' 
			ORDER BY b.dt_data_rollout DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


//BUSCA DA PÁGINA TODOS ROLLOUTS DE RECIFE
public static function getPageSearchRec($search, $page = 1, $itemsPerPage = 25)
{

	$start = ($page - 1) * $itemsPerPage;

	$sql = new Sql();

	$results = $sql->select("
		SELECT SQL_CALC_FOUND_ROWS *
		FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Recife' 
		WHERE a.nome_user LIKE :search OR b.nome LIKE :search OR a.localidade LIKE :search   
		OR b.id_rollout LIKE :search OR b.situacao  LIKE :search OR b.n_chamado  LIKE :search 
		ORDER BY  b.dt_data_rollout DESC
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

//PAGINAÇÃO DA PÁGINA TODOS ROLLOUTS De FLORIANOPOLIS
	public static function getPageAllFlr($page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
		    FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Florianópolis'
			 ORDER BY b.dt_data_rollout DESC
			LIMIT $start, $itemsPerPage");

		
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	//BUSCA DA PÁGINA TODOS ROLLOUTS DE FLORIANOPOLIS
	public static function getPageSearchFlr($search, $page = 1, $itemsPerPage = 25)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario AND cidade = 'Florianópolis' 
			WHERE a.nome_user LIKE :search OR b.nome LIKE :search OR a.localidade LIKE :search   
			OR b.id_rollout LIKE :search OR b.situacao  LIKE :search OR b.n_chamado  LIKE :search 
		    ORDER BY  b.dt_data_rollout DESC
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
		    FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario
			 ORDER BY b.dt_data_rollout DESC
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
			FROM tb_usuarios a INNER JOIN  tb_rollouts b ON b.id_usuario = a.id_usuario
			WHERE a.nome_user LIKE :search OR b.nome LIKE :search OR b.n_chamado  LIKE :search 
			OR b.id_rollout LIKE :search OR b.situacao  LIKE :search OR b.n_chamado  LIKE :search 
			OR b.cidade  LIKE :search
		    ORDER BY b.dt_data_rollout DESC
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
						
			$file = isset($_FILES['arquivo_rollout']) ? $_FILES['arquivo_rollout'] : FALSE;

		

				//loop para ler os arquivos
				for ($cont = 0; $cont < count($file['name']); $cont++){ 


					$directory = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
						"res" . DIRECTORY_SEPARATOR . 
						"ft_arquivo_rollout" . DIRECTORY_SEPARATOR . 
						
						$file['name'][$cont];

						$arquivo_rollout = $file['name'][$cont];			
			
						$sql = new Sql();
						$sql->select("CALL sp_arquivo_rollout_add(:id_rollout,:id_usuario, :arquivo_rollout)", array(
							":id_rollout"=>$this->getid_rollout(),
							":id_usuario"=>$this->getid_usuario(),
							":arquivo_rollout"=>$arquivo_rollout ));
			
						move_uploaded_file($file['tmp_name'][$cont], $directory);

				}
			
		
}

//METODO PARA VERIFICAR O TOTAL DE ARQUIVO DE CADA ROLLOUT
	public static function numArquivos($id_rollout)
	{
		
		$sql = new Sql();
		$total = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
			FROM  tb_arquivos_rollouts WHERE id_rollout = :id_rollout",[
			':id_rollout'=>$id_rollout
			]);
		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
	
		return ['arquivos'=>(int)$resultTotal[0]["nrtotal"]];
	}


	public static function nomeArquivos($id_rollout)
	{

		$sql = new Sql();

		$results  = $sql->select("SELECT * FROM tb_arquivos_rollouts WHERE id_rollout = :id_rollout", [
			':id_rollout'=>$id_rollout
		]);

		return ['nome'=>$results[0]["arquivo_rollout"]];

	}

//METODO PARA LISTAR OS ARQUIVOS
public function showArquivo($id_rollout)
{
	 $sql = new Sql();
	
	
	 $resultsExistFile = $sql->select("SELECT * FROM tb_arquivos_rollouts WHERE id_rollout = :id_rollout ", [
		 ':id_rollout'=>$id_rollout
	 ]);

	 $countResultsFile = count($resultsExistFile);
	 if ($countResultsFile > 0)
	 {
		 foreach ($resultsExistFile as &$result)
		 {
			 foreach ($result as $key => $value) {
				 if ($key === "arquivo_rollout") {
					 $result["arquivo"] = '/res/ft_arquivo_rollout/'. $result['arquivo_rollout'];
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


}
