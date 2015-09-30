<script>
  $(document).ready(function() {
		  
    //carrega lista de contatos
    carregardadostabela('<?=$urlLink?>controllers/_contatos-lista-json.php', 'listarimoveis', 'tmplContatos', 'tbl_lista_contatos tbody' ) 
    
    //Cadastro Contatos
    $('#formNovoContato').on('submit', function (e) {
        
        $("table tbody").html("");
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
                    $("#tmplContatos").tmpl( data ).appendTo( "#tbl_lista_contatos tbody" );
                    $(".close").click();
                }
            });
        return false;
    });

	// formulario de exclusao tipo de imovel
      $('#formExcluir').on('submit', function (e) {

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

            dados = $.parseJSON(dados);

            if(!dados.sucesso)
              alert(dados.mensagem);
            else {
              //limpa tbody para recarregar
              $("#tbl_lista_contatos tbody").html('');
              $( "#tmplContatos" ).tmpl( dados.aDados ).appendTo( "#tbl_lista_contatos tbody" );
            }

            $(".close").click();
          }
          
        });

        return false;
          
      });

    //Passa id do imovel selecionado ao abrir a modal
      $('#modalExcluir').on('show.bs.modal', function (event) {      
        var button = $(event.relatedTarget) 
        var recipient = button.data('whatever') 
        var modal = $(this)
        modal.find('#FRMidcontato').val(recipient)

      })

  }); 
</script>
<!-- Page cadastro de contato -->
<script id="tmplContatos" type="text/x-jquery-tmpl">
  <tr>
    <td>${text}</td>
    <td style="width:10%"><a href="<?=$urlLink?>contatos-detalhe/${id}" style="float:right;" class="btn btn-primary"><span class="glyphicon glyphicon-zoom-in" title="Visualizar contato" aria-hidden="true"></span></a></td>
    <td><button type="button" style="float:right;" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir" data-whatever="${id}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
  </td>
</script>