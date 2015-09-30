<?php
  require_once 'util/menu.php';
?>
  <div class='container'>
  		
  	<div class="page-header">
  		<h1>CONTATOS</h1>
  	</div>

  	<table class="table table-striped" id="tbl_lista_contatos">
          <thead>
              <tr>
                  <th colspan="2">Tipo</th>
                 <th style="width: 10%"><button type="button" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#form-cadastro-contato" >CADASTRAR  NOVO CONTATO</button></th>
               </tr>
          </thead>
          <tbody>

          </tbody>
     </table>
  </div>


  <!-- Modal visualix -->
  <div class="modal fade" id="form-cadastro-contato" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">CADASTRAR NOVO CONTATO</h4>
        </div>
        <div class="modal-body">
           <form class="bs-example bs-example-form" class="cadastro-novo-contato" id="formNovoContato" action="<?= $urlLink."controllers/_contato-cadastro-json.php"?>" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control"  name="FRMfuncao" value="cadastraNovoContato">
            <input type="hidden" class="form-control" id="FRMidimovel" name="FRMidimovel" value="<?=$parametro1;?>">
            <div class="form-group">
              <label for="recipient-name" class="control-label">Responsável:</label>
              <input type="text" class="form-control" name="FRMresponsavel" required="required">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">E-mail:</label>
              <input type="email" class="form-control" name="FRMemail" required="required">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Telefone:</label>
              <input type="text" class="form-control" name="FRMtelefone" required="required">
            </div>
        </div>
        <div class="modal-footer">
           <button type="submit" style="float:right;" class="btn btn-primary">CADASTRAR</button>  
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
      <form class="bs-example bs-example-form" class="cadastro-imovel" id="formExcluir" action="<?= $urlLink."controllers/_contatos-lista-json.php"?>" method="post">
      <input type="hidden" class="form-control" id="FRMidcontato" name="FRMidcontato" value="">
      <div class="modal-body">
          <div class="form-group">
            <h4 class="modal-title" > Tem certeza que deseja apagar este contato?</h4>
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