<script>
  $(document).ready(function() {


    // Page cadastra tipo de imovel
    $('#formCadastroTipoImovel').on('submit', function (e) {

      //limpa tbody para recarregar
      $("#tbTiposImoveis tbody").html('');

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
          $( "#tmplTiposImoveis" ).tmpl( data ).appendTo( "#tbTiposImoveis tbody" );
          $(".close").click();
        }
        
      });

      return false;
        
    });

    //Carreda Tipo de Imoveis cadastrados
    carregardadostabela('<?=$urlLink?>controllers/_tipo-imovel-cadastro-json.php', 'carregartiposimoveis', 'tmplTiposImoveis', 'tbTiposImoveis tbody' ) ;
    //Fim pagina tipo de imoveis

    
    // Cadastrar nova forma de contato para o responsavel
    //Passa id do contato selecionado ao abrir a modal
    $('#cadastrotipoimovel').on('show.bs.modal', function (event) {      
      //console.log('teste');
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes      
      var modal = $(this)
      var arrDados = recipient.split('|');

      modal.find('#FRMidtipoimovel').val(arrDados[0])
      modal.find('#FRMtipoimovel').val(arrDados[1])

    })

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

            console.log(dados.aDados);

            if(!dados.sucesso)
              alert(dados.mensagem);
            else {
              //limpa tbody para recarregar
              $("#tbTiposImoveis tbody").html('');
              $( "#tmplTiposImoveis" ).tmpl( dados.aDados ).appendTo( "#tbTiposImoveis tbody" );
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
        modal.find('#FRMidtipodeimovel').val(recipient)

      })

  }); 
</script>

<script id="tmplTiposImoveis" type="text/x-jquery-tmpl">
    <tr>
        <td>${tipo}</td>
        <td><button type="button" style="float:right;" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir" data-whatever="${id}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
    </td>
</script>