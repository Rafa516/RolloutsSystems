<?php

use \Projeto\Model\Usuario;
use \Projeto\Model\Rollout;
use \Projeto\Model\Termo;
use \Projeto\Model\Documento;
use \Projeto\Model\Estoque;



	function formatDate($data)
	{

		return date('d/m/Y', strtotime($data));

	}


	function getUsuarioNome()
	{

		$res = Usuario::getFromSession();

		$usuario =  $res->getnome_user();

		return utf8_decode($usuario);

	}

	function totalUsuarios(){

		$total = Usuario::total();

	   return  $total['totalUsuarios'];

	}

	function totalRollouts(){

		$total = Rollout::totalRollouts();
	

	   return  $total['rolloutsTotal'];

	}
//-----------------TOTAL DE ROLLOUTS DE CADA CIDADE------------------------------//
	function totalRolloutsBsb(){

		$total = Rollout::totalRolloutsBsb();
	

	   return  $total['rolloutsTotalBsb'];

	}

	
	function totalRolloutsRj(){

		$total = Rollout::totalRolloutsRj();
	

	   return  $total['rolloutsTotalRj'];

	}

	function totalRolloutsRec(){

		$total = Rollout::totalRolloutsRec();
	

	   return  $total['rolloutsTotalRec'];

	}

	function totalRolloutsFlr(){

		$total = Rollout::totalRolloutsFlr();
	

	   return  $total['rolloutsTotalFlr'];

	}
//TOTAL DE ROLLOUTS FINALIZADOS

	function totalRolloutsFinalizado(){

		$total = Rollout::totalRolloutsFinalizado();
	

	   return  $total['rolloutsTotalFinalizado'];

	}

	function totalRolloutsFinalizadoBsb(){

		$total = Rollout::totalRolloutsFinalizadoBsb();
	

	   return  $total['rolloutsTotalFinalizadoBsb'];

	}
//TOTAL DE ROLLOUTS PENDENTES

function totalRolloutsPendente(){

	$total = Rollout::totalRolloutsPendente();


   return  $total['rolloutsTotalPendente'];

}
	function totalRolloutsPendenteBsb(){

		$total = Rollout::totalRolloutsPendenteBsb();
	

	   return  $total['rolloutsTotalPendenteBsb'];

	}

	function totalRolloutsID($id_usuario){

		$total = Rollout::totalRolloutsID($id_usuario);
	

	   return  $total['rolloutsTotalID'];

	}

	function totalTermos(){

		$total = Termo::totalTermos();
	

	   return  $total['termosTotal'];

	}
//----------------TOTAL DE TERMOS DE CADA CIDADE-------------------------//
	function totalTermosBsb(){

		$total = Termo::totalTermosBsb();
	

	   return  $total['termosTotalBsb'];

	}

	function totalTermosRj(){

		$total = Termo::totalTermosRj();
	

	   return  $total['termosTotalRj'];

	}

	function totalTermosRec(){

		$total = Termo::totalTermosRec();
	

	   return  $total['termosTotalRec'];

	}

	function totalTermosFlr(){

		$total = Termo::totalTermosFlr();
	

	   return  $total['termosTotalFlr'];

	}
//--------------TERMOS DE ENTREGA -------------------------------->
	function totalTermosEntrega(){

		$total = Termo::totalTermosEntrega();
	

	   return  $total['termosTotalEntrega'];

	}

	function totalTermosEntregaBsb(){

		$total = Termo::totalTermosEntregaBsb();
	

	   return  $total['termosTotalEntregaBsb'];

	}
//--------------TERMOS DE DEVOLUÇÃO-------------------------------->

function totalTermosDevolucao(){

	$total = Termo::totalTermosDevolucao();


   return  $total['termosTotalDevolucao'];

}
	function totalTermosDevolucaoBsb(){

		$total = Termo::totalTermosDevolucaoBsb();
	

	   return  $total['termosTotalDevolucaoBsb'];

	}
//--------------------TERMOS PENDENTES----------------------------
	function totalTermosPendente(){

		$total = Termo::totalTermosPendente();
	

	   return  $total['termosTotalPendente'];

	}

	function totalTermosPendenteBsb(){

		$total = Termo::totalTermosPendenteBsb();
	

	   return  $total['termosTotalPendenteBsb'];

	}

//---------TERMPOS FINALIZAODS----------------------->
	function totalTermosFinalizado(){

		$total = Termo::totalTermosFinalizado();
	
	   return  $total['termosTotalFinalizado'];
	}


	function totalTermosFinalizadoBsb(){

		$total = Termo::totalTermosFinalizadoBsb();
	
	   return  $total['termosTotalFinalizadoBsb'];
	}

	   function totalTermosFinalizadoRj(){

		$total = Termo::totalTermosFinalizadoRj();
	

	   return  $total['termosTotalFinalizadoRj'];

	}

	function totalTermosFinalizadoRec(){

		$total = Termo::totalTermosFinalizadoRec();
	

	   return  $total['termosTotalFinalizadoRec'];

	}
	
	function totalTermosFinalizadoFlr(){

		$total = Termo::totalTermosFinalizadoFlr();
	

	   return  $total['termosTotalFinalizadoFlr'];

	}

	function totalTermosID($id_usuario){

		$total = Termo::totalTermosID($id_usuario);
	

	   return  $total['termosTotalID'];

	}

	

//---------------TOTAL DE TERMOS DOS ANALISTAS DE CADA CIDADE-----------------//
	function totalTermosIDBsb($id_usuario){

		$total = Termo::totalTermosIDBsb($id_usuario);
	

	   return  $total['termosTotalIDBsb'];

	}

	function totalTermosIDRj($id_usuario){

		$total = Termo::totalTermosIDRj($id_usuario);
	

	   return  $total['termosTotalIDRj'];

	}

	function totalTermosIDRec($id_usuario){

		$total = Termo::totalTermosIDRec($id_usuario);
	

	   return  $total['termosTotalIDRec'];

	}

	function totalTermosIDFlr($id_usuario){

		$total = Termo::totalTermosIDFlr($id_usuario);
	

	   return  $total['termosTotalIDFlr'];

	}
//----------------------TOTAL DE ROLLOUTS DOS ANALISTAS--------------------//
	function totalRolloutsIDBsb($id_usuario){

		$total = Rollout::totalRolloutsIDBsb($id_usuario);
	

	   return  $total['rolloutsTotalIDBsb'];

	}

	function totalRolloutsIDRj($id_usuario){

		$total = Rollout::totalRolloutsIDRj($id_usuario);
	

	   return  $total['rolloutsTotalIDRj'];

	}

	function totalRolloutsIDRec($id_usuario){

		$total = Rollout::totalRolloutsIDRec($id_usuario);
	

	   return  $total['rolloutsTotalIDRec'];

	}

	function totalRolloutsIDFlr($id_usuario){

		$total = Rollout::totalRolloutsIDFlr($id_usuario);
	

	   return  $total['rolloutsTotalIDFlr'];

	}


	

	function numArquivos($id_rollout){

		$total = Rollout::numArquivos($id_rollout);

	   	return  $total['arquivos'];

	}

	function nomeArquivos($id_rollout){

		$total = Rollout::nomeArquivos($id_rollout);

	   	return  $total['nome'];
	}

	function numArquivosTermos($id_termos){

		$total = Termo::numArquivosTermos($id_termos);

	   	return  $total['arquivos'];

	}
	//----------------TOTAL DE DOCUMENTOS DE CADA CIDADE-------------------------//
	function totalDocumentosBsb(){

		$total = Documento::totalDocumentosBsb();
	

	   return  $total['documentosTotalBsb'];

	}

	function totalDocumentosRj(){

		$total = Documento::totalDocumentosRj();
	

	   return  $total['documentosTotalRj'];

	}

	function totalDocumentosRec(){

		$total = Documento::totalDocumentosRec();
	

	   return  $total['documentosTotalRec'];

	}

	function totalDocumentosFlr(){

		$total = Documento::totalDocumentosFlr();
	

	   return  $total['documentosTotalFlr'];

	}

	function numArquivosDocumentos($id_documento){

		$total = Documento::numArquivosDocumentos($id_documento);

	   	return  $total['arquivos'];

	}

	function totalItens(){

		$total = Estoque::getPageEstoqueBsb();
	

	   return  $total['total'];

	}

	function totalRetiradas(){

		$total = Estoque::retiradaEstoqueBsb();
	

	   return  $total['total'];

	}

	function totalEntradas(){

		$total = Estoque::entradaEstoqueBsb();
	

	   return  $total['total'];

	}

	function equipamentosTermos($id_termos){
     
		$total = new Estoque ;
	    $eqp = $total->getEquipamentosTermos($id_termos);
		
		return $eqp['equipamentos'];
	 
	}
	
	


	
	

	
	

?>