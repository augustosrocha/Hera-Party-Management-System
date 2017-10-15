<?php
	
	$num_campos = <script>
	
	for($x =0; $x < 4; $x++)
	{
		$id_custo[$x] = $_POST['id_custo'][$x];
	}
	
	for($x =0; $x < 4; $x++)
	{
		echo $id_custo[$x], '<br>';
	}
	
	/*if(isset($_POST['id_custo']) && !empty($_POST['id_custo'])){
		
		//echo  join(",",$_POST['id_custo']);
		
		
	
		
	}else
	{
		echo "NAO FOI ESSA MERDA!!!!!!!!!!!!";
	}
	
	*/
	
?>