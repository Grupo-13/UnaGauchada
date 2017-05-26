<DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Publicar gauchada</h1>
	<form action ="<?php echo base_url();?>publicar/botonpublicar" method = "POST">	
		<table>
			<tr>
				<td> <label>Titulo </label></td>
				<td> <input type = "text" name = "txttitulo" maxlength="50"> </td>
			</tr>
			<tr>
				<td> <label>Descripcion </label></td>
				<td> <input type = "text" name = "txtdescripcion"> </td>
			</tr>
			<tr>
				<td> <label>Fecha máxima </label></td>
				<td> <input type = "DATE" name = "datefechamax"> </td>
			</tr>
			<tr>
				<td> <label>Foto </label></td>
				<td> <input type = "longblob" name = "imgfoto"> </td>
			</tr>
			<tr> <td colspan="2"><input type = "submit" value = "Publicar"/td>
			</tr>

		</table>	
	</form>
</body>
</html>