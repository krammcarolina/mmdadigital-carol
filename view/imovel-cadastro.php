<?php
  require_once 'controllers/_imovel-cadastro.php';
  require_once 'util/menu.php';
?>
<
<div class='container'>
		
	<div class="page-header">
		<h1>TIPOS DE IMÓVEIS</h1>
	</div>
  
  <form class="bs-example bs-example-form" class="cadastro-imovel" id="formCadastro" action="<?= $urlC."controllers/_imovel-cadastro-json.php"?>" method="post" enctype="multipart/form-data">
				 
	  <input type="hidden" name="FRMcadastro" value="1" />

		<div class="row">       
			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon" id="basic-addon1">Tipo Anuncio</span>
					 <select name="FRMtipoanuncio" class="form-control" placeholder="" required="">
							<option value="">Selecione..</option>
							<option value="1">Aluguel</option>
							<option value="2">Venda</option>
					 </select>
				 </div>
			</div>
		
			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon" id="basic-addon1">Tipo Imóvel</span>
					 <select name="FRMtipoimovel" class="form-control" placeholder="" required="">
							<?= listaOption($aTiposImovel, 'tipo'); ?>
					 </select>
				 </div>
			</div>
		</div>
	
		<div class="row">       
			<div class="col-lg-6">
				<input type="text" name="FRMrua" class="form-control" placeholder="Rua" aria-describedby="basic-addon1" required=""/>
			</div>
			<div class="col-lg-3">
				<input type="number" pattern="\d*" class="form-control" placeholder="Número" name="FRMnumero" aria-describedby="basic-addon1" required=""/>
			</div>
			<div class="col-lg-3"> 
				<input type="text" class="form-control" placeholder="Complemento" name="FRMcomplemento" aria-describedby="basic-addon1" required=""/>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-3">
				<input type="text" class="form-control " placeholder="Bairro" name="FRMbairro" aria-describedby="basic-addon1" required=""/>
			</div>
			<div class="col-lg-3">
				<input type="text" class="form-control " placeholder="Cidade" name="FRMcidade" aria-describedby="basic-addon1" required=""/>
			</div>
			
			<div class="col-lg-3"> 
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Estado</span>
						<select name="FRMestado" class="form-control" placeholder="" required="">
							<?= listaOption($aEstado, 'sigla'); ?>
						</select>
				</div>
			</div>
		</div>
	
		<div class="row">       
			<div class="col-lg-12">
				<textarea name="FRMdescricao" class="form-control " placeholder="Descrição" required=""></textarea>
			</div>
		</div>

	  <div class="row">			
			<div class="form-group col-lg-11">
				<input type="file" class="form-control"  name="FRMimagem[]" placeholder="Imagem" required="" />              
			</div>
			<div class="form-group col-lg-1">
				<button type="button" class="btn btn-default col-lg-12" id="new_image">+</button>
			</div>
		</div>

		<div class="row">
			<div id="campos_imagens"></div>
    </div>
		  
		<div style="float:right">
			<input type='submit' class='btn btn-default btn-success' id="btn-cadastro" value='Cadastrar' />
		</div>
  </form>
</div>

