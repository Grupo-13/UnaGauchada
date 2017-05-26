<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<br>
			<br>
			
			<h1>
				Nuevo usuario
			</h1>
			<?php
				echo form_open('registro1/nuevo_usuario');

				// echo '<table><tr><td>';
				// echo form_error('email');
				// echo form_label('Email', 'email');
				// echo '</td><td>';
				// echo form_input('email');
				// echo '</td></tr>';

				echo form_error('email');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Email</span>
							';
					$data = array(
						'name' => 'email',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su email',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

				// echo '<tr><td>';
				// echo form_error('clave');
				// echo form_label('Clave', 'clave');
				// echo '</td><td>';
				// echo form_password('clave'); echo '<br>';
				// echo '</td></tr>';

				echo form_error('clave');;
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Clave</span>
							';
					$data = array(
						'name' => 'clave',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su clave',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_password($data);
					echo '
					</div>';
					echo '
					<br>';

				// echo '<tr><td>';
				// echo form_error('clave2');
				// echo form_label('Clave2', 'clave2');
				// echo '</td><td>';
				// echo form_password('clave2'); echo '<br>';
				// echo '</td></tr>';

				echo form_error('clave2');;
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Clave</span>
							';
					$data = array(
						'name' => 'clave2',
						'class'        => 'form-control',
						'placeholder'          => 'Reingrese su clave',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_password($data);
					echo '
					</div>';
					echo '
					<br>';

				// echo '<tr><td>';
				// echo form_error('nombre');
				// echo form_label('Nombre', 'nombre');
				// echo '</td><td>';
				// echo form_input('nombre');echo '<br>';
				// echo '</td></tr>';

				echo form_error('nombre');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Nombre</span>
							';
					$data = array(
						'name' => 'nombre',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su nombre',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

				// echo '<tr><td>';
				// echo form_error('apellido');
				// echo form_label('Apellido', 'apellido');
				// echo '</td><td>';
				// echo form_input('apellido');echo '<br>';
				// echo '</td></tr>';

				echo form_error('apellido');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Apellido</span>
							';
					$data = array(
						'name' => 'apellido',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su apellido',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

				// echo '<tr><td>';
				// echo form_error('dni');
				// echo form_label('DNI', 'dni');
				// echo '</td><td>';
				// echo form_input('dni');echo '<br>';
				// echo '</td></tr>';

				echo form_error('dni');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">DNI</span>
							';
					$data = array(
						'name' => 'dni',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su DNI',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';
				
				// echo '<tr><td>';
				// echo form_error('tel');
				// echo form_label('Telefono', 'tel');
				// echo '</td><td>';
				// echo form_input('tel');echo '<br>';
				// echo '</td></tr></table>';

				echo form_error('tel');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Telefono</span>
							';
					$data = array(
						'name' => 'tel',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su telefono',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';
			 
				echo form_submit('botonSubmit', 'Registrar');
				echo form_close();
			?>
		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->