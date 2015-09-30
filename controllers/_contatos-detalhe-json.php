<?php
    //Classes
    require_once "../util/includes-json-class.php";

    
    $oFormaContatos = new FormasContatos();

    if(!empty($_POST['FRMidformacontato'])) {  
        $oFormaContatos = new FormasContatos();
        $oFormaContatos->deleteObject($_POST['FRMidformacontato']);
    }
    
    if(!empty($_POST['parametro'])) {
        $sFiltro = " contatoid = " . $_POST['parametro'];
        $aFormaContatos = listaFormaContatos($sFiltro);
        echo json_encode($aFormaContatos);
    }


    function listaFormaContatos($sFriltro) {
        $oFormaContatos = new FormasContatos();
        $aFormaContatos = $oFormaContatos->getList($sFriltro);
        return $aFormaContatos;
    }
?>