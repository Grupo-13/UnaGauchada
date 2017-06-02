<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		<?php if ($this->session->userdata('login')) { ?>
			<br>
			<br>
	<h1>
		Comprar créditos
	</h1>
	<h5>
		Sólo se aceptan tarjetas Visa y Mastercard.
	</h5>
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
						'aria-describedby'       => 'basic-addon1',
						'maxlength'		=>'16'
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
						'aria-describedby'       => 'basic-addon1',
						'maxlength'		=>'4',
						'value' => set_value('codigo')
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';

				

       	       	echo form_error('fecVencimiento');
                echo '
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Fecha de vencimiento</span>
                            ';
                echo '<input type="date" name="fecVencimiento"  value = ' . set_value('fecVencimiento') . '>';
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
						'aria-describedby'       => 'basic-addon1',
						'maxlength'		=>'3',
						'value' => set_value('creditos')
						);
					echo form_input($data);
					echo '
					</div>';
					echo '
					<br>';
			
		echo form_submit('botonSubmit', 'Comprar');
		echo form_close();
	
	 }else{ ?>
                     
                     
                     	<br><br><p> Para acceder a la compra de créditos usted debe haber iniciado sesión. </p>
			
                        <p><a href="<?= base_url() ?>login/ingresar"><input type="submit" value="Iniciar sesión"></a></p>
          <?php } ?>

		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
