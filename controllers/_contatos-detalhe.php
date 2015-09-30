<?php

    $oContatos = new Contatos();
    $sFiltro  = " id = " . $parametro1;
    $aContato = $oContatos->getList($sFiltro);
?>