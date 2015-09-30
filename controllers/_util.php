<?php
//Funcoes uteis 

  function mostraAviso($aviso){
    echo "<div class='alert alert-".$aviso['tipo']."' role='alert'>". $aviso['texto'] ."</div>";
  }

  $oEstados = new Estados();
  $aEstado = $oEstados->getList();

  function listaOption($aOption, $campo) {
     $iTotal = count($aOption);
     $sOptions = " <option value=''>Selecione..</option>";
     for ($i = 0; $i < $iTotal; $i++) {
       $sOptions .= "<option value='".$aOption[$i]['id']."'>".$aOption[$i][$campo]."</option>";
     }
     return($sOptions);
  }
?>