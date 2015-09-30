<?php
	require_once "../util/includes-json-class.php";
	
	$oContatos = new Contatos();

	//trata exclusao do tipo de imovel
  if(!empty($_POST['FRMidcontato'])) {      
      $bresultado = $oContatos->deleteObject($_POST['FRMidcontato']);

      $msg = "";      

      //se resultado verdadeiro é porque existe imovel vinculado
      if(!$bresultado)
        $msg = "Este contato não pode ser excluído porque está vinculado a um ou mais imóveis!";              
      else
      {
        $aRetorno['aDados'] = $oContatos->getList();
        $aContatos = $oContatos->getList("", " ORDER BY id DESC");
      }

      $aRetorno['sucesso'] =  $bresultado;
      $aRetorno['mensagem'] =  $msg;
      

      echo json_encode($aRetorno);
  }
  else
  {	
	$aContatos = $oContatos->getList("", " ORDER BY id DESC");
	echo json_encode($aContatos);
  }

	
?>
