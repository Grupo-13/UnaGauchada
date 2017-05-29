
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	<h2>
		<br>
		<br>
		Publicar gauchada
		
	</h2>
	<?php if ($this->session->userdata('login')){


		//echo validation_errors();
		
		echo form_open_multipart('publicar/nueva_gauchada');
		echo '<br>';
		echo form_error('titulo');
        // echo form_label('Título ', 'titulo');
        // echo form_input('titulo');echo '<br>';

        echo '<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Título</span>
							';
					$data = array(
						'name' => 'titulo',
						'class'        => 'form-control',
						'placeholder'          => 'Título',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

	
        echo form_error('descripcion');
        // echo form_label('Descripción ', 'descripcion');
        // echo form_textarea('descripcion');echo '<br>';
        echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Descripción</span>
							';
					$data = array(
						'name' => 'descripcion',
						'class'        => 'form-control',
						'placeholder'          => 'Descripción',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

			
        //echo form_error('datefechamax');
        //echo form_label('Fecha máxima', 'datefechamax');
        //echo form_input('datefechamax');echo '<br>';

        echo form_error('datefechamax');

   		//echo form_label('Fecha límite ');
   		 echo ' <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Fecha límite</span> ';
         echo '<input type="date" name="datefechamax">';
         echo '
                    </div>';
                    echo '
                    <br>';

        echo form_error('file_name');
       	echo form_label('Foto ', 'file_name');
        echo form_input_file('Subir foto');

         echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Seleccione las categorías</span>
							';

					foreach ($consulta as $fila) {
            //<input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
       		echo '<input type="checkbox" name="categoria" value="' . $fila['id_categoria'] . '"> ' . $fila['nombre_categoria'] . '<br>';
			}
			echo '
					</div>'; 
					echo '
					<br>';
   
        

		echo form_error('creditos');
		echo form_hidden('creditos', '1');

		echo form_submit('botonSubmit', 'Publicar');
        echo form_close();
    }

    else 
    {
 
    	echo '<br>';
   
    	echo "Para publicar una gauchada debe estar registrado." ; ?>
   		
    	<form action ="<?php echo base_url();?>registro1/nuevo_usuario">
    	<table>
    	<tr>
    		<br>
			<td colspan="2"><input type = "submit" value = "Registrarse" /td>
		</tr>
		</table>
		</form>
			
  	 <?php }?>

		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->


<!-- <DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Publicar gauchada</h1>
	<form action ="<?php //echo base_url();?>publicar/botonpublicar" method = "POST" enctype="multipart/form-data">	
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
				<td> <input type = "longblob" name = "filefoto" class="form-control">
						<td colspan="2"><input type = "submit" value = "Subir Imagen" onclik = "<?php //echo base_url();?>publicar/subirImagen"/td> </td>
			</tr>
			<tr> <td colspan="2"><input type = "submit" value = "Publicar"/td>
			</tr>

		</table>	
	<!-</form>
	<form action ="<?php //echo base_url();?>publicar/subirImagen" method = "POST" enctype="multipart/form-data">
	</form>	
	<a href="<?php //echo base_url();?>cimagenes/downloads/<?php //echo $archivo;?>">Descargar</a> -->
<!-- </body>
</html> -->