<?php
//Classes
require_once "../util/includes-json-class.php";

if(!empty($_POST['FRMfuncao'])) {
    if($_POST['FRMfuncao'] == 'cadastraNovoContato') {
        //Cadastra contatos 
        $oContatos  = new Contatos();
        $oContatos->_item['responsavel']  = $_POST['FRMresponsavel'];
        $iIdcontato = $oContatos->createNewObject();

        //Cadastra formas de contatos
        cadastraFormasContatos($iIdcontato, 1,  $_POST['FRMemail']);
        cadastraFormasContatos($iIdcontato, 2,  $_POST['FRMtelefone']);

        if(!empty($_POST['FRMidimovel'])) {
            //Relaciona contato com imovel
            $aContatoImovel = relacionaContatoImovel($_POST['FRMidimovel'], $iIdcontato);
            echo json_encode($aContatoImovel);
        } else {
            echo json_encode(consultaContatos());
        }
        
    }
} else {
    //Lista contatos na tela
    if(!empty($_POST['parametro'])) {
        echo json_encode(consultaContatoImovel($_POST['parametro']));
    }
   
}

function cadastraFormasContatos($iIdcontato, $iTipo , $sContato) {
    $oFormContato = new Formascontatos();
    $oFormContato->_item['contatoid']  = $iIdcontato;
    $oFormContato->_item['tipo']       = $iTipo;
    $oFormContato->_item['contato']    = $sContato;
    $oFormContato->createNewObject();
}


if(!empty($_POST['FRMidcontato'])) {
    $aReturn = cadastraFormasContatos($_POST['FRMidcontato'], $_POST['FRMtipo'], $_POST['FRMcontato']);
    echo json_encode($aReturn);
}
  

//Relaciona contato com imovel
if(!empty($_POST['FRMcadastro'])) {
    $aContatos = relacionaContatoImovel($_POST['FRMimovel'], $_POST['auto1']);
    echo json_encode($aContatos);
}

function relacionaContatoImovel($iIdImovel, $iIdContato) {  
    $oContatos = new ContatosImoveis();
    $oContatos->_item['imovel']  = $iIdImovel;
    $oContatos->_item['contato'] = $iIdContato;
    $oContatos->createNewObject();
    $aContatos = consultaContatoImovel($iIdImovel);
    return $aContatos;
}

function consultaContatoImovel($idImovel) {
    $oContatosImov = new ContatosImoveis();
    $sFiltro   = "imovel = " . $idImovel;
    $aContatos = $oContatosImov->getList($sFiltro);
    return  $aContatos;
}

function consultaContatos() {
    $oContatos  = new Contatos();

    $aContatos = $oContatos->getList("", " ORDER BY id DESC ");
    return  $aContatos;
}

?>