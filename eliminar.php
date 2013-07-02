<?php
	require_once("/class/ficha.php");
	if(isset($_POST['carnet']) && $_POST['carnet'] != "" )
	{
		$carnet = $_POST['carnet'];
		$objetoficha = new ficha();
		$objetoficha->eliminar_ficha($carnet);
	}
	else
	{
		?>	
	<script>
		window.history.back();
	</script>	
	<?php } ?>