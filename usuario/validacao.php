<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
	<script src="js/validator.min.js"></script>
	<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		jQuery(function($){
		
		$('#telefone').mask('(99) 99999-9999');
		
		
		});
		
		jQuery(function($){
			$("#preco").maskMoney({symbol:'R$ ', 
			showSymbol:true, thousands:'', decimal:'.'});
		 });
		
	</script>
	
	
	
	<script type="text/javascript">
		function lotacao(){
		// allowed: numeric keys, numeric numpad keys, backspace
		if (  event.keyCode == 8 || ( event.keyCode < 106 && event.keyCode > 95 ) ) { 
			return true;
		}else{
			return false;
		}
		}

		$(document).ready(function(){

		$("#lotacao").keydown(function(event) { 

			   if ( lotacao() ) { 

			   } else { 
					   if ( event.keyCode < 48 || event.keyCode > 57 ) { 
							   event.preventDefault();  
					   }        
			   } 
		   }); 

		});
</script>

<link rel="icon" href="../imagens/icone_Hera.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../imagens/icone_Hera.ico" type="image/x-icon" />