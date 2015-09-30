<?php
  require_once 'util/menu.php';
  require_once "controllers/_contatos-detalhe.php";
?>

<!-- Menu -->
<div class="sidebar non-printable" id="sidebar">
	<ul class="nav nav-tabs">
		
	</ul>
</div>

<div class='container'>
	
<div class="page-header">
	<h1>DETALHE DO CONTATO</h1>
</div>

  <table class="table table-striped" id="tbContatosDetalhes">
    <thead>
        <tr>
            <th ><?= $aContato[0]['text']?></th>
            <th style="width:10%;"> <button type="button" style="float:right;" id="btnVolar" class="btn btn-default">Voltar</button> </th> 
        </tr>
    </thead>
    <tbody>

    </tbody>
</div>

<!-- Modal Confirmação de exclusão -->
<div class="modal fade" id="modalExcluirContato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
      </div>
      <form class="bs-example bs-example-form" class="cadastro-imovel" id="formExcluirContato" action="<?= $urlLink."controllers/_contatos-detalhe-json.php"?>" method="post">
      <input type="hidden" class="form-control" id="FRMidformacontato" name="FRMidformacontato" value="">
      <div class="modal-body">
          <div class="form-group">
            <h4 class="modal-title" > Tem certeza que deseja apagar este imovel?</h4>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
    </form>
  </div>
</div>



