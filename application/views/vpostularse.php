<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	<h2>
		<br>
		<br>
		Postularse
	</h2>
	<?php 
		
		
		echo form_open('detalle/enviarPostulacion/' . $id_gauchada);
	
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
						'aria-describedby'       => 'basic-addon1',
						'value' => set_value('descripcion')
						);
					echo form_textarea($data);
					echo '
					</div>';
					echo '
					<br>';



		echo form_submit('botonSubmit', 'Enviar');
        echo form_close();
    ?>

		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->