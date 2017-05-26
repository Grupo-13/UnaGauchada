<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<br>
			<br>
	<h1>
		Comprar créditos
	</h1>
	<h3>
		Datos de compra:
	</h3>
	<?php
		echo form_open('comprarcredito/comprar');

		// echo form_error('nrotarjeta');
		// echo form_label('Nro. Tarjeta', 'nrotarjeta');
  //      	echo form_input('nrotarjeta');echo '<br>';

       	echo form_error('nrotarjeta');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Número de tarjeta</span>
							';
					$data = array(
						'name' => 'nrotarjeta',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese su número de tarjeta',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

	

       	       	echo form_error('codigo');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Código</span>
							';
					$data = array(
						'name' => 'codigo',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese clave de seguridad',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';


       	       	echo form_error('fecVencimiento');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Fecha de vencimiento</span>
							';
					$data = array(
						'name' => 'fecVencimiento',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese fecha de vencimiento',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';


       	       	echo form_error('creditos');
					//echo form_label('Email', 'email');
					//echo form_input('email');
					echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Créditos</span>
							';
					$data = array(
						'name' => 'creditos',
						'class'        => 'form-control',
						'placeholder'          => 'Ingrese la cantidad de créditos',
						'aria-describedby'       => 'basic-addon1'
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';
			
		echo form_submit('botonSubmit', 'Comprar');
		echo form_close();
	?>
		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
