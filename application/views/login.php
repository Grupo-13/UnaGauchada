	
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<br>
				<br>
				
				<h1>
					Iniciar sesion
				</h1>
	
				<?php
					echo form_open('login/ingresar');

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

					echo form_error('clave');
					// echo form_label('Clave', 'clave');
					// echo form_password('clave'); echo '<br>';
					echo 	'
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Contraseña</span>
							';
					$data = array(
						'name' => 'clave',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su contraseña',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_password($data);
					echo '
					</div>
						';
					echo '
					<br>';
				   
				 
					echo form_submit('botonSubmit', 'Ingresar');
					echo form_close();
				?>
			</div>
		</div><!-- /.col-lg-6 -->
	</div><!-- /.row -->