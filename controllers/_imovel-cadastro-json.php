<?php
  //Classes
  require_once "../util/includes-json-class.php";

  if(!empty($_POST['FRMcadastro'])) {
    
    //Cadastra Imoveis
    $oImoveis = new Imoveis();
    $oImoveis->_item['tipoimovel']  = $_POST['FRMtipoimovel'];
    $oImoveis->_item['tipoanuncio'] = $_POST['FRMtipoanuncio'];
    $oImoveis->_item['rua']         = $_POST['FRMrua'];
    $oImoveis->_item['numero']      = $_POST['FRMnumero'];
    $oImoveis->_item['cidade']      = $_POST['FRMcidade'];
    $oImoveis->_item['bairro']      = $_POST['FRMbairro'];
    $oImoveis->_item['estado']      = $_POST['FRMestado'];
    $oImoveis->_item['descricao']   = $_POST['FRMdescricao'];
    $iIdImovel = $oImoveis->createNewObject();

    //Cadastra Imagens
    $oImagens = new Imagens();
    $iTotalImg = count($_FILES['FRMimagem']['name']);
   
    for ($i = 0; $i < $iTotalImg; $i++) {
      
      //Upload de arquivos
      // verifica se foi enviado um arquivo
      if(isset($_FILES['FRMimagem']['name'][$i]) && $_FILES["FRMimagem"]["error"][$i] == 0) {
   
        $arquivo_tmp = $_FILES['FRMimagem']['tmp_name'][$i];
        $nome = $_FILES['FRMimagem']['name'][$i];
       
        // Pega a extensao
        $extensao = strrchr($nome, '.');
   
        // Converte a extensao para mimusculo
        $extensao = strtolower($extensao);
   
        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfilero as extesões permitidas e separo por ';'
        // Isso server apenas para eu poder pesquisar dentro desta String
        if(strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
          // Cria um nome único para esta imagem
          // Evita que duplique as imagens no servidor.
          $novoNome = md5(microtime()) . $extensao;
           
          // Concatena a pasta com o nome
          $destino = '../imagens/' . $novoNome;
           
          // tenta mover o arquivo para o destino
          if( @move_uploaded_file( $arquivo_tmp, $destino  ))
          {
              $aAviso['texto']  = "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
              $aAviso['texto'] .= "<img src='". $destino ."' />";
              $aAviso['tipo']  = "success";
          }
          else {
            $aAviso['texto'] = "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
            $aAviso['tipo']  = "danger";
          }
        } 
        else {
          $aAviso['texto'] = "Você não enviou nenhum arquivo!";
          $aAviso['tipo']  = "danger";
        }
     
        $oImagens->_item['imovel'] = $iIdImovel;
        $oImagens->_item['imagem'] = $novoNome;
        $oImagens->createNewObject();

      }
    }  
    echo json_encode($iIdImovel);   
  }

?>