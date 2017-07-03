<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	<h2>
		<br>
		<br>
		Editar perfil
		
	</h2>
	<?php

		echo form_open_multipart('perfil/editar/'.$id_usuario);
		echo '<br>';
		//echo form_hidden('id_gau', $id_gauchada);
		echo form_error('nombre');

		echo '<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Nombre</span>
							';
					$data = array(
						'name' => 'nombre',
						'class'        => 'form-control',
						'placeholder'          => 'Nombre',
						'aria-describedby'       => 'basic-addon1',
						'value' => $nombre
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

	
		echo form_error('apellido');

		echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Apellido</span>
							';
					$data = array(
						'name' => 'apellido',
						'class'        => 'form-control',
						'placeholder'          => 'Apellido',
						'aria-describedby'       => 'basic-addon1',
						'value' => $apellido
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

		echo form_error('dni');

		echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">DNI</span>
							';
					$data = array(
						'name' => 'dni',
						'class'        => 'form-control',
						'placeholder'          => 'DNI',
						'aria-describedby'       => 'basic-addon1',
						'value' => $dni
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

			


		echo form_error('fecnac');

		 echo ' <div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Fecha de nacimiento</span> ';
		 echo '<input type="date" name="fecnac" value = ' . $fecnac . '>';
		 echo '
					</div>';
					echo '
					<br>';

		echo form_error('file_name');
		echo form_label('Foto ', 'file_name');
		echo form_input_file('Subir foto');
			echo '
					<br>';

	


		echo '
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Localidad</span>
				';

		echo '<select name="localidades" >';
		foreach ($localidades as $tupla) {

				if($tupla['id_localidad'] == $id_localidad){
					echo '<option selected value="'. $tupla['id_localidad'] . '">' . $tupla['nombre_localidad'] . '</option>';
				}
				else{
					echo '<option value="'. $tupla['id_localidad'] . '">' . $tupla['nombre_localidad'] . '</option>';
				}
			}	
		
		echo '</select>';
		echo '
		</div>';
					echo '
					<br>';

		echo form_error('telefono');

		echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Telefono</span>
							';
					$data = array(
						'name' => 'telefono',
						'class'        => 'form-control',
						'placeholder'          => 'Telefono',
						'aria-describedby'       => 'basic-addon1',
						'value' => $telefono
						);	
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';
		echo '
		<br>';

		echo form_submit('botonSubmit', 'Guardar cambios');
		echo form_close();
	
	?>

		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
