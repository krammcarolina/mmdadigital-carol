<script>
  $(document).ready(function() {
    

    carregardadostabela('<?=$urlLink?>/controllers/_contato-cadastro-json.php', '<?=$parametro1?>', 'tmplContatosImoveis', 'tbContatosImoveis tbody' ) 
    
    //Page cadastro contato para o imovel
    $('.autocompletar').each(function(e) {
         var urlCorrente = $(this).data('url');
         var funcaoCorrente = $(this).data('autocomplete');
         var funcaoModulo = $(this).data('modulo');
         
         $(this).select2({
            allowClear : true,
            placeholder: "Selecione",
            minimumInputLength: 3,
            ajax:{
               url: urlCorrente,
               dataType: 'json',
               data: function (term, page) {
                  return { term: term, funcao: funcaoCorrente, modulo: funcaoModulo};
               },
               results: function (data, page) 
               {
                  return {results: data.results};
               }
            }
            ,initSelection : function (element, callback) {
                  var id = $(element).data('inicial-id');
                  var texto = $(element).data('inicial-texto');
                  callback({id:id, text:texto});
            }
          });
      });

        $('#bntFinalizar').on('click', function (e) {
            if($("table tbody tr").length == 0) {
                alert("Você precisa cadastrar ao menos um contato para este imóvel.")
                return false;   
            } else {
                window.location.replace("<?=$urlLink.'imoveis-lista'?>");
            }
        });


        $('.autocompletar').on('change', function(){

         $(this).parent().find('label:eq(0)').find('a').remove();

         if ($(this).hasClass('visualizacao-previa') && $(this).select2('val') != '')
         {

            var datamodulo = ' data-idmodulo="' + $(this).data('modulo') + '" ' ; 
            var dataurl = ' data-url="' + $('#hostFixoHidden').val() + 'controllers/visualizacao_previa_p.php' + '" ';
            var dataid = ' data-idedicao="' + $(this).select2('val') + '" ';
            var dataautocomplete = ' data-autocomplete="' + $(this).data('autocomplete') + '" ';

            var anchor = '<a href="javascript:;" ' + dataurl + dataid + datamodulo + dataautocomplete + 
                         ' class="btn btn-primary btn-xs visualicao-previa-btn" style="float:right"><i class="glyphicon glyphicon-info-sign"></i></a>';

            $(this).parent().find('label:eq(0)').append(anchor);

         }

         autoCompleteHidden($(this).attr('name'), $(this).select2('val'), $(this));
      });

      //seta os valores para edição
      $('.autocompletar').select2('val', []);
      $('.autocompletar').trigger('change');

      //
      // Cria um hidden field para cada autocomplete ajax
      //
        function autoCompleteHidden(name, value, current) {
            var $input = $('input[name="' + name + '"]');

            if ($input.length == 0) {
                var input = "<input type='hidden' name='" + name + "' id='" + name + "' /> ";
                $(input).insertAfter(current);
                $input = $('input[name="' + name + '"]');
            }

            $input.val(value);
        }


        //Cadastro Contatos
        $('#formCadastroContato').on('submit', function (e) {
             sCampo = $("input[name$='auto1']").val();
            if(sCampo.length == 0) {
                alert("Selecione um contato, para este imóvel.");
                return false;
            } 

            $("#tbContatosImoveis tbody").html('');
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
                        $("input[name$='auto1']").val("");
                        $( "#tmplContatosImoveis" ).tmpl( data ).appendTo( "#tbContatosImoveis tbody" );
                    }
                });
            return false;
        });
      

      // Cadastrar nova forma de contato para o responsavel
      //Passa id do contato selecionado ao abrir a modal
      $('#addcontato').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('#FRMidcontato').val(recipient)
      })

      $('#formNovoContato').on('submit', function (e) {
        
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
                $("#tbContatosImoveis tbody").html('');
                var data = $.parseJSON(dados);
                $( "#tmplContatosImoveis" ).tmpl( data ).appendTo( "#tbContatosImoveis tbody" );
                $(".close").click();
              }
              
            });
        return false;
      });
      
     //Add novo contato para responsavel
     //Cadastro Tipos de imoveis
      $('#formaddContato').on('submit', function (e) {

          var formData = new FormData($('#formaddContato')[0]);
                
          $.ajax({
            url: $(this).prop("action"),
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (dados) {
              $(".close").click();   
              var data = $.parseJSON(dados);
              $( "#tmplContatosImoveis" ).tmpl( data ).appendTo( "#tbContatosImoveis tbody" );
            }
            
          });
          return false;
      });
      //Fim pagina contatos 
   
}); 

</script>

<!-- Page cadastro de contato -->
<script id="tmplContatosImoveis" type="text/x-jquery-tmpl">
    <tr>
        <td>${responsavel}</td>
        <th style="width: 10%"><a href="<?=$urlLink?>contatos-detalhe/${id}" style="float:right;" class="btn btn-primary"><span class="glyphicon glyphicon-zoom-in" title="Visualizar contato" aria-hidden="true"></a></th>
        <td><button type="button" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#addcontato" data-whatever="${id}"><span class="glyphicon glyphicon-plus" title="Add forma de contato" aria-hidden="true"></button></td>
    </td>
</script>