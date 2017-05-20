<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo base_url();?>login/ingresar" method="post">
		<table>
			<tr>
				<td><label>Email</label></td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td><label>Clave</label></td>
				<td><input type="password" name="clave"></td>
			</tr>
			<tr>				
				<td><input type="submit" value="Ingresar"></td>
			</tr>	
		</table>
	</form>
	<?php echo $msj?>
</body>
</html>