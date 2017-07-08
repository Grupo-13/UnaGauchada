<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	<h2>
		<br>
		<br>
		Modificar gauchada
		
	</h2>
	<?php

	if ($cant_postulados == 0){

		
		echo form_open_multipart('publicar/modificar/'.$id_gauchada);
		echo '<br>';
		echo form_hidden('id_gau', $id_gauchada);
		echo form_hidden('cant_postulados', $cant_postulados);
		echo form_error('titulo');

        echo '<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Título</span>
							';
					$data = array(
						'name' => 'titulo',
						'class'        => 'form-control',
						'placeholder'          => 'Título',
						'aria-describedby'       => 'basic-addon1',
						'value' => $titulo
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
						'aria-describedby'       => 'basic-addon1',
						'value' => $descripcion
						);
					echo form_textarea($data);
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
         echo '<input type="date" name="datefechamax" value = ' . $fecha_maxima . '>';
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
						<span class="input-group-addon" id="basic-addon1">Seleccione las categorías</span>
							';
			echo '
					</div>'; 
					
				 ?>

			<div class="panel panel-default">
			<div class="panel-body"> 
			<?php	
				$i = 0;
				$oneDimensionalArray = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($categ)), 0);
				foreach ($categorias as $fila) 
				{	
					//<input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
					if (in_array($fila['id_categoria'], $oneDimensionalArray)){
						echo '<input type="checkbox" name="categoria[]" value="' . $fila['id_categoria'] . '" checked> ' . $fila['nombre_categoria'] .' 	';
					}
					else {
						echo '<input type="checkbox" name="categoria[]" value="' . $fila['id_categoria'] . '"> ' . $fila['nombre_categoria'] .' 	';
					}
					

					$i = $i +1;
					
					if($i==5){
						echo'<br>';
						$i=0;
					}
				}?>
				 </div>
			</div>
   
        <?php


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

		echo form_submit('botonSubmit', 'Guardar cambios');
        echo form_close();
    }

    else 
    {
 
    	echo '<br>';
   
    	echo "Usted no puede modificar esta gauchada, ya que posee postulaciones." ;
	}?>

		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->
