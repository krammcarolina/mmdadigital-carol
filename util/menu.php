<?php
 require_once 'controllers/_menu.php';
 if(empty($aMenu)) {
 	  $aMenu = array(
	    0 => array(
	      'title' => 'Home',
	      'href' => '/',
	    ),
	    1 => array(
	      'title' => 'Imovéis',
	      'href' => '',
	      'child' => array(
	        0 => array(
	          'title' => 'Lista de Imovéis',
	          'href' => 'imoveis-lista',
	   
	        ),
	        1 => array(
	          'title' => 'Cadastro de Imovéis',
	          'href' => 'imovel-cadastro',
	        ),
	      ),
	    ),
	    2 => array(
	      'title' => 'Tipo Imovéis',
	      'href' => 'tipo-imovel-cadastro',
	    ),
	    3 => array(
	      'title' => 'Contatos',
	      'href' => 'contatos-lista',
	    ),
	  );
	 }
?>
<style>
.form-control {
 margin-bottom: 20px;
}

.input-group {
 margin-bottom: 20px;
}

.header {
  background-color: #3f51b5;
  width: 100%;
  color: white;
  margin-top:-20px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.26);
}
.jumbotron {
 background-color: white;
}
.form-control {
 border-radius: 0px;
}

.input-group-addon {
 border-radius: 0px;
}

.btn-teste {
 border-radius: 0px;
 background-color:#3f51b5!important;
 border: 0px;
 color: white;
 font-weight: bold;
}
h1 {
 padding: 15px;
}
</style>

<div class="header">
	<h1>Carolia Garcia</h1>
</div>
<div class="sidebar non-printable" id="sidebar">
  <ul class="nav nav-tabs">
    <?php listaMenu($aMenu, $urlLink); ?>
  </ul>
</div> 