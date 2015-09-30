<script>
  $(document).ready(function() {
		  
    //carrega lista de imoveis
	  carregardadostabela('<?=$urlLink?>/controllers/_imoveis-lista.php', 'listarimoveis', 'tmplListarImoveis', 'tbl_lista_imoveis tbody' );

	  // formulario de exclusao de imovel
    $('#formExcluirImovel').on('submit', function (e) {

      //limpa tbody para recarregar
      $("#tbl_lista_imoveis tbody").html('');

      var formData = new FormData($(this)[0]);
      
      $.ajax({
        url: $(this).prop("action"),
        type: 'POST',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (dados) {                
          var data = $.parseJSON(dados);
          $( "#tmplListarImoveis" ).tmpl( data ).appendTo( "#tbl_lista_imoveis tbody" );
          $(".close").click();
        }
        
      });

      return false;
        
    });

	//Passa id do imovel selecionado ao abrir a modal
    $('#modalExcluirContato').on('show.bs.modal', function (event) {      
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
      var modal = $(this)

      modal.find('#FRMidimovel').val(recipient)

    })


  }); 
</script>


<script id="tmplListarImoveis" type="text/x-jquery-tmpl">
  <tr>
    <td><a href='<?php echo $urlLink;?>imovel/${id}'>${rua}</a></td>
    <td>${numero}</td>
    <td>${bairro}</td>
    <td>${uf} - ${cidade}</td>
    <td>${descricao}</td>
    <td><a href="<?=$urlLink?>contatos-cadastro/${id}" class="btn btn-primary " title="Adicionar contato ao imóvel"><span class="glyphicon glyphicon-earphone" aria-hidden="true"> </span></a></td>
    <td><button type="button" style="float:right;" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluirContato" title="Remover Imóvel" data-whatever="${id}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
  </td>
</script>