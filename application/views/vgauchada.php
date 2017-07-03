
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	<h2>
		<br>
		<br>
		Publicar gauchada
		
	</h2>
	<?php 
	$creditos = $this->usuario->getCreditos($this->session->userdata('id'));
	$adeudo = $this->gauchada->adeudoCalificaciones($this->session->userdata('id'));
	//if (($creditos->creditos > 0) and (!$adeudo)){
	if (($creditos->creditos > 0) ){


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
						'aria-describedby'       => 'basic-addon1',
						'value' => set_value('titulo')
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
						'value' => set_value('descripcion')
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
         echo '<input type="date" name="datefechamax" value = ' . set_value('fecNac') . '>';
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
			<?php	$i = 0;
				foreach ($consulta as $fila) 
				{
            		//<input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
       			
       				echo '<input type="checkbox" name="categoria[]" value="' . $fila['id_categoria'] . '"> ' . $fila['nombre_categoria'] .'		';
					$i = $i +1;
					if($i==5){
					echo'<br>';
					$i=0;}
				}?>
				 </div>
			</div>
   
        <?php

       				 echo '
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Localidad</span>
							';

					echo '<select name="locali" >';
					foreach ($consulta2 as $tupla) {
  						echo '<option value="'. $tupla['id_localidad'] . '">' . $tupla['nombre_localidad'] . '</option>';
  					}	
					
					echo '</select>';
					echo '
					</div>';
					echo '
					<br>';

		echo form_error('creditos');
		echo form_hidden('creditos', '1');

		echo form_submit('botonSubmit', 'Publicar');
        echo form_close();
    }

    elseif ($creditos->creditos == 0)
    {
 
    	echo '<br>';
   
    	echo "Para publicar una gauchada debe tener 1 crédito." ; ?>
   		
    	<form action ="<?php echo base_url();?>comprarcredito/comprar">
    	<table>
    	<tr>
    		<br>
			<td colspan="2"><input type = "submit" value = "Comprar créditos" /td>
		</tr>
		</table>
		</form>
			
  	 <?php }
  	 else
  	 {
  	 	echo '<br>';
   
    	echo "Para publicar una gauchada no puede adeudar calificaciones." ;
  	 }?>

		</div>
	</div><!-- /.col-lg-6 -->
</div><!-- /.row -->


