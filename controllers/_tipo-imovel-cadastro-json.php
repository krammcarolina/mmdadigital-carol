<?php

  //Classes
  require_once "../util/includes-json-class.php";
 
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";die;

  $oTiposImov = new TiposImoveis();

  //trata exclusao do tipo de imovel
  if(!empty($_POST['FRMidtipodeimovel'])) {      
      $bresultado = $oTiposImov->deleteObject($_POST['FRMidtipodeimovel']);

      $msg = "";      

      //se resultado verdadeiro é porque existe imovel vinculado
      if(!$bresultado)
        $msg = "Este tipo de imóvel não pode ser excluído porque está vinculado a um ou mais imóveis!";              
      else
        $aRetorno['aDados'] = $oTiposImov->getList();

      $aRetorno['sucesso'] =  $bresultado;
      $aRetorno['mensagem'] =  $msg;
      

      echo json_encode($aRetorno);
  }

  if(!empty($_POST['FRMtipoimovel'])) {

    //Cadastro de Tipo Imóvel
    
    $oTiposImov->_item['tipo']  = $_POST['FRMtipoimovel'];

    //se parametro vazio então é registro novo
    if(empty($_POST['FRMidtipoimovel']))
      $oTiposImov->createNewObject();

    else{      
      $oTiposImov->_item['id'] = $_POST['FRMidtipoimovel'];
      $oTiposImov->_updateDB();
    }

    $aTiposImov = consultaTiposImoveis();

    echo json_encode($aTiposImov);   
  }


 if(!empty($_POST['parametro'])) {
    
    $aTiposImov = consultaTiposImoveis();
    echo json_encode($aTiposImov);   
  }

  function consultaTiposImoveis() {
    $oTiposImov = new TiposImoveis();
    $aTiposImov = $oTiposImov->getList();
    return  $aTiposImov;
  }



?>