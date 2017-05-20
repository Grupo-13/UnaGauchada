<html>
<head>
	<title></title>
</head>
<body>
	<h1>Registrarse</h1>
	<form action="<?php echo base_url();?>registro/registrar" method="post">
		<table>
			<tr>
				<td><label>Email</label></td>
				<td><input type="email" name="email" maxlength="150"> </td>
			</tr>
			<tr>
				<td><label>Clave</label></td>
				<td><input type="password" name="clave" maxlength="50">	</td>
			</tr>
			<tr>
				<td><label>Nombre</label></td>
				<td><input type="text" name="nombre" maxlength="50">	</td>
			</tr>
			<tr>
				<td><label>Apellido</label></td>
				<td><input type="text" name="apellido" maxlength="50">	</td>
			</tr>
			<tr>
				<td><label>DNI</label></td>
				<td><input type="text" name="dni" maxlength="8">	</td>
			</tr>
			<tr>
				<td><label>Fecha de nacimiento</label></td>
				<td><input type="date" name="fecNac">	</td>
			</tr>
			<tr>
				<td><label>Telefono</label></td>
				<td><input type="text" name="tel">	</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Registrarse"></td>
			</tr>

		</table>
	</form>
</body>
</html>