	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo $urlLink;?>assets/js/jquery.min.js'>"+"<"+"/script>");
	</script>	

	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $urlLink;?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>

	<script src="<?php echo $urlLink;?>assets/js/bootstrap.min.js"></script>
  

	  <?php
	  // Adiciona js especifico para a pagina 
	    $sJsPage = "controllers/js/" . $pagina . "-js.php";
	    if (file_exists($sJsPage)) {
	      require_once $sJsPage;
	    }  
	  ?>
   
  <script type="text/javascript">

		function carregardadostabela(url, funcao, idTmp, idTable ) {
			$.ajax({
		    url: url,
		    type: 'POST',
		    data: {parametro: funcao},
		    dataType: "json",
		    success: function (dados) {
		      $( "#"+idTmp ).tmpl( dados ).appendTo( "#"+idTable );
		    }
		    
		 	});
			return false;
		}
	      
	  function Excluir(obj){
	    var par = $(obj).parent().parent();
	    par.remove();
	  };
	</script>
   

	<script src="<?php echo $urlLink;?>assets/js/jquery-ui.custom.min.js"></script>
	<script src="<?php echo $urlLink;?>assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo $urlLink;?>assets/js/jquery.easypiechart.min.js"></script>
	<script src="<?php echo $urlLink;?>assets/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo $urlLink;?>assets/js/flot/jquery.flot.min.js"></script>
	<script src="<?php echo $urlLink;?>assets/js/flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo $urlLink;?>assets/js/flot/jquery.flot.resize.min.js"></script>
	
	<script src="<?php echo  $urlLink;?>assets/select2/select2.min.js"></script>
  <script src="<?php echo  $urlLink;?>assets/select2/select2_locale_pt-BR.js"></script>
  <script src="<?php echo  $urlLink;?>assets/js/jquery.tmpl.min.js"></script>
  <script src="<?php echo  $urlLink;?>assets/js/jssor.slider.min.js"></script>