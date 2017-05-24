<html>
	<head>
		<title> Listados completo </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<?php
			include("../conexion.php");
			$vSql = "SELECT * FROM menu";
			$vResultado = mysqli_query($con,$vSql) or die (mysql_error());
			?>
			<table style="margin-left: 15px; margin-top: 15px;" class="table-bordered table" border=1>
				<tr class="success">
					<td><b>Menú</b></td>
				</tr>
				<?php
				while ($fila = mysqli_fetch_array($vResultado))
				{
				?>
				<tr class="info">
					<td><?php echo ($fila['descripcion']); ?></td>
				</tr>
				<tr>
					<td colspan="1">
						<?php
						}
						// Liberar conjunto de resultados
						mysqli_free_result($vResultado);
						// Cerrar la conexion
						mysqli_close($con);
						?>
					</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<p align="center"><a href="index.php">Volver al men&uacute; del ABM</a></p>
		</div>
	</body>
</html>