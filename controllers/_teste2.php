<?php
$aMenu = array(
  0 => array(
    'title' => 'Imóveis',
    'href' => '/community',
    'child' => array(
      0 => array(
        'title' => 'Cadastrar',
        'href' => 'community',
        'child' => array(
          0 => array(
            'title' => 'Irc',
            'href' => 'irc',
          ),
          1 => array(
            'title' => 'Events',
            'href' => 'events',
            
          ),
        ),
      ),
      1 => array(
        'title' => 'Buscar',
        'href' => 'getting-involved',
        'child' => array(
          0 => array(
            'title' => 'Translation',
            'href' => 'translation',
          ),
          1 => array(
            'title' => 'Design',
            'href' => 'contribute/themes',
          ),
          2 => array(
            'title' => 'Coding',
            'href' => 'contribute/development',
          ),
        ),
      ),
    ),
  ),
  1 => array(
    'title' => 'Contatos',
    'href' => 'support',
    'child' => array(
      0 => array(
        'title' => 'Search',
        'href' => 'search/apachesolr_search',
      ),
      1 => array(
        'title' => 'Forums',
        'href' => 'Forum',
      ),
      2 => array(
        'title' => 'Community Documentation',
        'href' => 'documentation',
      ),
    ),
  ),
  2 => array(
    'title' => 'Tipos de Imóveis',
    'href' => 'support',
    'child' => array(
      0 => array(
        'title' => 'Search',
        'href' => 'search/apachesolr_search',
      ),
      1 => array(
        'title' => 'Forums',
        'href' => 'Forum',
      ),
      2 => array(
        'title' => 'Community Documentation',
        'href' => 'documentation',
      ),
    ),
  ),
);

if(!empty($_POST['frmNome'])) {
  $oResponsavel = new Responsaveis();
  $oResponsavel->_item['nome']      = $_POST['frmNome'];
  $iId = $oResponsavel->createNewObject(true);
  $iId = 1;
  
  $oContatos = new Contatos();
  $iTotal = count($_POST['frmTelefone']);
  
  for ($i = 0; $i < $iTotal; $i++) {
    $oContatos->_item['tipo']      = 1; //ID 1 TELEFONE
    $oContatos->_item['responsavel'] = $iId;
    $oContatos->_item['contato'] = $_POST['frmTelefone'][$i];
    $oContatos->createNewObject(true);
  }
  
  $iTotal = count($_POST['frmEmail']);
  for ($i = 0; $i < $iTotal; $i++) {
    $oContatos->_item['tipo']      = 2; //ID 2 E-MAIL
    $oContatos->_item['responsavel'] = $iId;
    $oContatos->_item['contato'] = $_POST['frmEmail'][$i];
    $return = $oContatos->createNewObject(true);
  }
  if($return) {
    $aAviso['texto'] = "Cadastro realizado com sucesso!";
    $aAviso['tipo']  = "success";
  } else {
    $aAviso['texto'] = "Erro ao cadastrar!";
    $aAviso['tipo']  = "danger";
  }
 
    
}
  function mostraAviso($aviso){
    echo "<div class='alert alert-".$aviso['tipo']."' role='alert'>". $aviso['texto'] ."</div>";
  }

  $oEstados = new Estados();
  $aEstado = $oEstados->getList();
  
  $iTotal = count($aEstado);

  function listaOption($aOption, $campo) {
     $iTotal = count($aOption);
     $sOptions = " <option value=''>Selecione..</option>";
     for ($i = 0; $i < $iTotal; $i++) {
       $sOptions .= "<option value='".$aOption[$i]['id']."'>".$aOption[$i][$campo]."</option>";
     }
     return($sOptions);
  }
  
?>