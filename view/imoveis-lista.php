<?php
	require_once 'util/menu.php';
?>

<div class='container'>
	
<div class="page-header">
	<h1>Lista de Imóveis</h1>
</div> 
<div class="row">
    <div class="form-group col-lg-12">
    	<table class="table table-striped" id="tbl_lista_imoveis">
		    <thead>
		      <tr>
		        <th>Rua</th>
		        <th>numero</th>
		        <th>bairro</th>
		        <th>UF - cidade</th>
		        <th>descricao</th>
		        <th>&nbsp;</th>
            <th>&nbsp;</th>
		      </tr>
		    </thead>
		    <tbody>
		    </tbody>
		</table>
	</div>
</div>

<!-- Modal Confirmação de exclusão -->
<div class="modal fade" id="modalExcluirContato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
      </div>
      <form class="bs-example bs-example-form" class="cadastro-imovel" id="formExcluirImovel" action="<?= $urlLink."controllers/_imoveis-lista.php"?>" method="post">
      <input type="hidden" class="form-control" id="FRMidimovel" name="FRMidimovel" value="">
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



			

	