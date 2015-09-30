<style type="text/css">
  .btn  a {
    color: #fff;
  }
  .btn a:hover, a:focus {
    color: #fff;
  }

  .obrigatorio {
    color: #a94442;
    display: none;
  }
</style>
<?php
	require_once 'util/menu.php';
?>

<div class='container'>
	
    <div class="page-header">
    	<h1>Contatos do Imóvel</h1>
    </div>
    <div class="col-lg-12">
        <div class="alert alert-info">
          <strong>Info!</strong> Você precisa cadastrar ao menos um contato para o seu imóvel. Selecione um existente em nossa lista ou cadastre um novo.
        </div>

        <form class="bs-example bs-example-form" class="cadastro-imovel" id="formCadastroContato" action="<?= $urlLink."controllers/_contato-cadastro-json.php"?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="FRMcadastro" value="1" />
            <input type="hidden" name="FRMimovel" value="<?= $url[2]?>" />
            <h4>Selecione um contato existente</h4>		 
            <div class="row">
                <div class="col-lg-6">
                    <label class="control-label obrigatorio" for="inputError2">Campo obrigatório</label>
                    <div id="auto1" name="auto1" class="col-md-6 autocompletar form-control" data-autocomplete="idcontato"  data-url="<?= $urlLink.'controllers/_autocomplete.php'; ?>"></div>
                </div>
                <div class="col-lg-3">
                    <button type="submit" id="btn-cadastro" class="btn btn-primary">VINCULAR AO IMÓVEL</button>
                </div>
                <div class="col-lg-3">
                   <th style="width: 10%"><button type="button" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#cadastraresponsavel" data-whatever="@mdo">CADASTRAR  NOVO CONTATO</button></th>
                </div>
            </div> 
        </form>  
    </div>


    <div class="col-lg-12"> 	
        <table class="table table-striped" id="tbContatosImoveis">
            <thead>
                <tr>
                    <th style="width: 80%">Responsáveis</th>
                    <th style="width: 10%"> </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table> 
    </div>  	
  
    <div class="row">
        <div class="col-lg-12">
          <button type="button" style="float:right; margin-right:10px;"  class="btn btn-success"  id="bntFinalizar">FINALIZAR CADASTRO</button>
        </div>
    </div>
</div>


<!-- Modal add contato para user existente -->

<div class="modal fade" id="addcontato" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >Adicionar contato ao responsável</h4>
        </div>
      <form class="bs-example bs-example-form" class="cadastro-imovel" id="formaddContato" action="<?= $urlLink."controllers/_contato-cadastro-json.php"?>" method="post">
	      <input type="hidden" class="form-control" id="FRMidcontato" name="FRMidcontato" value="">
	      <div class="modal-body">
	        <div class="form-group">
	          <label for="recipient-name" class="control-label">Tipo contato</label>
	          <select class="form-control" name="FRMtipo">
	          	<option value="1">E-mail</option>
	          	<option value="2">Telefone</option>
	          </select>
	        </div>
	   
	        <div class="form-group">
	          <label for="recipient-name" class="control-label">Contato</label>
	          <input type="text" class="form-control" id="recipient-name" name="FRMcontato" required="required">
	        </div>
	      </div>
      <div class="modal-footer">
        <button type="submit" style="float:right;" id="addcontato-salvar" class="btn btn-primary">CADASTRAR</button>
      </div>
    </div>
    </form>
    </div>
</div>

<!-- Modal visualix -->
<div class="modal fade" id="cadastraresponsavel" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CADASTRAR NOVO CONTATO</h4>
      </div>
      
      <form class="bs-example bs-example-form" class="cadastro-novo-contato" id="formNovoContato" action="<?= $urlLink."controllers/_contato-cadastro-json.php"?>" method="post" enctype="multipart/form-data">
        
        <div class="modal-body">
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
