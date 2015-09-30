<script>
  $(document).ready(function() {
    
    //Page cadastro de imovel
    //Add linha para adicionar nova imagem para o imovel
    $('#new_image').on("click", function() { 
      var input = " <div class='row'> " +
                  " <div class='form-group col-lg-11'> " + 
                  " <input type='file' class='form-control' name='FRMimagem[]' pattern='\d*' required  placeholder='Imagem'/>" +
                  " </div>"+
                  " <div class='form-group col-lg-1'>"+
                  " <button type='button' class='btn btn-default col-lg-12' onclick='Excluir(this)'>-</button>"+
                  " </div>"+
                  "</div>";
      $("#campos_imagens").append(input);
    });

    //Cadastra imovel
    $('#formCadastro').on('submit', function (e) {

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
              var url = '<?=$urlC?>'+ "contatos-cadastro/" + dados;
   
              window.location.href = url;
            }
            
          });
      return false;
    });
 
}); 

</script>