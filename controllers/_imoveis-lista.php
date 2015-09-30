<?php

	require_once "../util/includes-json-class.php";
	
	$oImoveis = new Imoveis();

	//controla id enviado para exclusao
	if(!empty($_POST['FRMidimovel'])){
		$oImoveis->deleteObject($_POST['FRMidimovel']);
	}

	//sempre carrega a lista de imoveis atualizada
	$aImoveis = $oImoveis->getList();

	echo json_encode($aImoveis);	
	
?>
