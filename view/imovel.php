<?php
	require_once 'controllers/_imovel.php';
	require_once 'util/menu.php';
?>
<!-- Menu -->
<div class="sidebar non-printable" id="sidebar">
	<ul class="nav nav-tabs">
		
	</ul>
</div>

<div class='container'>
	
<div class="page-header">
	<h1>DADOS DO IMÓVEL</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <blockquote>
            <h4><?=strtoupper($tipoimovel)?> PARA <?=strtoupper($tipoanuncio)?></h4>
            <p>Rua: <?=$aImovel[0]['rua']?></p>
            <p>Bairro: <?=$aImovel[0]['bairro']?></p>
            <p> <?=$aImovel[0]['cidade']?></p>
            <footer><?=$descricao?> / <?=$aImovel[0]['uf']?></footer>
            <h4>CONTATOS</h4>
               <table class="table table-striped" id="tblimovel">
                    <tbody> <?=$sTabelaContatos?></tbody>
                </table>         
        </blockquote>
    	<h5>
    </div>
   
    <div class="col-lg-6">
    	<!--img style="width:400px;height:400px" src="../assets/images/image-5.jpg" /-->

    	<div id="slider1_container" style="position: relative; top: 0px; left: 0px; height: 400px;">
	    <!-- Slides Container -->
		    <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 500px; height: 370px;">
		        <?=$arrImgCarrossel?>
		    </div>
		</div>

    </div>
</div>

<div class="row"> 
    <div class="col-lg-12"></div>
</div>

<ol class="breadcrumb">
  <li>VEJA OUTROS IMOVEIS NA MESMA CIDADE</li>
</ol>

<div class="row">
    <?php echo $lstImoveisRel; ?>
</div>




			

	