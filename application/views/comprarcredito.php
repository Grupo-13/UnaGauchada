<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Comprar créditos</h1>
	<form action="<?php base_url()?>comprarcredito/comprar" method="POST">
		<table>
			<tr>
				<p>Datos de compra:</p>
			</tr>
			<tr>
				<td><label>Nro de tarjeta</label></td>
				<td><input type="text" name="txtNroTarjeta" maxlength="16"</td>
			</tr>
			<tr>
				<td><label>Código</label></td>
				<td><input type="text" name="txtCodigo" maxlength="4"</td>
			</tr>
			<tr>
				<td><label>Fecha de vencimiento</label></td>
				<td><input type="date" name="txtFecVencimiento" </td>
			</tr>
			<tr>
				<p>Ingrese la cantidad de créditos que desea comprar:</p>
			</tr>
			<tr>
				<td><label>Créditos</label></td>
				<td><input type="text" name="txtCantidad" maxlength="3"</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Comprar"</td>
			</tr>
		</table>
	</form>
</body>
</html>