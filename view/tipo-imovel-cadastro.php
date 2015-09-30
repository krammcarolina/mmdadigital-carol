<?php
  require_once 'util/menu.php';
?>
<div class='container'>
		
	<div class="page-header">
		<h1>TIPOS DE IMÓVEIS</h1>
	</div>

  <input type="hidden" id="idtipoimovelhidden" value="">
	<table class="table table-striped" id="tbTiposImoveis">
    <thead>
      <tr>
        <th>Tipos</th>
        <button type="button" style="float:right;" class="btn btn-primary" data-toggle="modal" data-whatever="" data-target="#cadastrotipoimovel" >CADASTRAR TIPO IMÓVEL</button>    
      </tr>
    </thead>
    <tbody>

    </tbody>
   </table>

</div>


<!-- Modal Cadastro tipo imóvel -->
<div class="modal fade" id="cadastrotipoimovel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Cadastrar tipo de imóvel</h4>
            </div>
            <form class="bs-example bs-example-form" class="cadastro-imovel" id="formCadastroTipoImovel" action="<?= $urlLink."controllers/_tipo-imovel-cadastro-json.php"?>" method="post">
                <input type="hidden" class="form-control" id="FRMidtipoimovel" name="FRMidtipoimovel" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tipo:</label>
                        <input type="text" class="form-control" id="FRMtipoimovel" name="FRMtipoimovel" required="required" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                 </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Confirmação de exclusão -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">      
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
            </div>
            <form class="bs-example bs-example-form" class="cadastro-imovel" id="formExcluir" action="<?= $urlLink."controllers/_tipo-imovel-cadastro-json.php"?>" method="post">
                <input type="hidden" class="form-control" id="FRMidtipodeimovel" name="FRMidtipodeimovel" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <h4 class="modal-title" > Tem certeza que deseja apagar este tipo imovel?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>