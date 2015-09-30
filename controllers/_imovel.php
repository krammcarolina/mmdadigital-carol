<?php
	#inicializa classe imóveis
	$oImoveis = new Imoveis();

	#monta filtro do parametro da url para buscar imovel para visulização
	$sFiltro  =  "imoveis.id = ". $parametro1;

	#retorna os dados do imovel
	$aImovel = $oImoveis->getList($sFiltro);

	#tipo do imovel
	$tipoimovel = $aImovel[0]['tipoimovel'];

	#busca o tipo do imovel
	$objTiposImoveis = new TiposImoveis();
	$objTiposImoveis = $objTiposImoveis->getObject($tipoimovel);
	$tipoimovel = $objTiposImoveis[0]['tipo'];

	#demais dados da tabelas
    $rua = $aImovel[0]['rua']; 
    $numero = $aImovel[0]['numero'];
    $cidade = $aImovel[0]['cidade'];
    $bairro = $aImovel[0]['bairro'];
    $estado = $aImovel[0]['estado'];
    $descricao = $aImovel[0]['descricao'];
    $tipoanuncio = ($aImovel[0]['tipoanuncio'] == "1" ? "Aluguel" : "Venda") ;


    #inicializa instancia da classe de imagens
    $objImagensImovel = new Imagens();

    #monta filtro do parametro da url para buscar imovel para visulização
	$sFiltro  =  "imovel = ". $parametro1;

	#busca lista de imagens do imovel
    $arrImagens = $objImagensImovel->getList($sFiltro);
    $iTotalImagens = sizeof($arrImagens);
	$arrImgCarrossel = "";

	//carrega imagens do corrossel
    for ($i=0; $i < $iTotalImagens; $i++) { 
    	$arrImgCarrossel .= "<div><img u='image' class='img-thumbnail' src='../imagens/".$arrImagens[$i]['imagem']."' /></div>";
    }
    
    #Busca 3 imóveis randomicamente
    $arrImoveisRel = $oImoveis->getImoveisRelacionados($cidade, $parametro1);
    $iTotalImoveisRel = sizeof($arrImoveisRel);
    $lstImoveisRel = "";

    //carrega lista dos imoveis randomicos
    for ($i=0; $i < $iTotalImoveisRel; $i++) { 
    	$lstImoveisRel .= "<div class='col-lg-4' style='text-align: center;'>";
    	$lstImoveisRel .= "<a href='".$urlLink."imovel/".$arrImoveisRel[$i]['id']."'><img  width='200' height='200' class='img-rounded'  src='../imagens/".$arrImoveisRel[$i]['imagem']."'></a>";
        $lstImoveisRel .= "<h4>".$arrImoveisRel[$i]['responsavel']."</h4>";
        $lstImoveisRel .= "<p> ".$arrImoveisRel[$i]['contato']."</p>";
    	$lstImoveisRel .= "</div>";
    }

    //busca lista de contatos do imovel
    $arrContatos = $oImoveis->getContatosImovel($parametro1);
    $iTotalContatos = sizeof($arrContatos);
    $sTabelaContatos = "";
    $sNomeContato = "";   //controla a troca do nome do contato
    $bPrimeiraVez = true; //controle para mostrar o nome do contato apenas uma vez
    for ($i=0; $i < $iTotalContatos; $i++) { 

        if($sNomeContato <> $arrContatos[$i]['responsavel']){
            $sNomeContato = $arrContatos[$i]['responsavel'];
            $bPrimeiraVez = true;
        }

        $sTabelaContatos .= "<tr>";
        $sTabelaContatos .=     "<td>". ($sNomeContato) ."</td>";
        $sTabelaContatos .=     "<td>". ($arrContatos[$i]['tipo'] == "1" ? "E-mail" : "Fone" ) ."</td>";
        $sTabelaContatos .=     "<td>". $arrContatos[$i]['contato'] ."</td>";
        $sTabelaContatos .= "</tr>";

        $bPrimeiraVez = false;
    }
?>
