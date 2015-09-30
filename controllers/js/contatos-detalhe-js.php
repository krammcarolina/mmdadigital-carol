<script>
	$(document).ready(function() {


		// formulario de exclusao de imovel
	    $('#formExcluirContato').on('submit', function (e) {

	      //limpa tbody para recarregar
	      $("#tbContatosDetalhes tbody").html('');

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
	          // var data = $.parseJSON(dados);
	          // $( "#tmplContatosDetalhes" ).tmpl( data ).appendTo( "#tbContatosDetalhes tbody" );
	          carregardadostabela('<?=$urlLink?>controllers/_contatos-detalhe-json.php', <?=$parametro1?>, 'tmplContatosDetalhes', 'tbContatosDetalhes tbody' )
	          $(".close").click();
	        }
	        
	      });

	      return false;
	        
	    });

	    
	  $('#btnVolar').on('click', function (e) {
	  	console.log("xuxu");
	  	window.history.back();
	  });

		//Passa id do imovel selecionado ao abrir a modal
	    $('#modalExcluirContato').on('show.bs.modal', function (event) {      
	      var button = $(event.relatedTarget) 
	      var recipient = button.data('whatever') 
	      var modal = $(this)
	      modal.find('#FRMidformacontato').val(recipient)

	    });


		carregardadostabela('<?=$urlLink?>controllers/_contatos-detalhe-json.php', <?=$parametro1?>, 'tmplContatosDetalhes', 'tbContatosDetalhes tbody' )
	}); 
</script>	

<!-- Page Detalhe de contato -->
<script id="tmplContatosDetalhes" type="text/x-jquery-tmpl">
  <tr>
    <td>${contato}</td>
    <td><button type="button" style="float:right;" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluirContato" data-whatever="${id}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
  </td>
</script>
  
  