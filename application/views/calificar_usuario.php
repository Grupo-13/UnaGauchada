
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			<div class="panel-body">
				<br>
				<br>
				<?php
				/*	$datetime1 = new DateTime();
					$datetime2 = new DateTime($gauchada->fecha_maxima);
					$interval = $datetime1->diff($datetime2); 
	
					if ($datetime1 < $datetime2) { */
						$result = $this->usuario->getNombreUsuario($usuario->id_usuario); 
						$hoy = strtotime(date("d-m-Y H:i:00",time()));
						$fecha = strtotime($gauchada->fecha_maxima);
						if ($hoy > $fecha) { ?>
							<br>
							<center><h4>¡Calificá a <a href="<?= base_url()?>perfil/usuario/<?=$usuario->id_usuario?>"><?=$result->nombre ." " . $result->apellido?></a> por la gauchada "<a href="<?= base_url()?>detalle/post/<?=$gauchada->id_gauchada?>"><?=$gauchada->titulo?></a>"!</h4></center>
							<br>
							
						
							
							
							<form action ="<?php echo base_url();?>calificarusuario/calificacion/<?=$gauchada->id_gauchada?>" onsubmit="return validateForm()" method="post">
								&emsp;&emsp;&emsp;
								<i><textarea rows="5" cols="50" name="descripcion" placeholder="Escriba aquí su comentario" required></textarea></i>
								<br>					
								<br>									 
								&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								<input type="submit" class="btn btn-success" name="action" value="Positivo"/>
								<input type="submit" class="btn btn-warning" name="action" value="Neutral"/>		
								<input type="submit" class="btn btn-danger" name="action" value="Negativo"/>	
							</form>	
							<br>
							<br>	
						<?php } else { ?>
								<br>
								<center><b>¡Aún no puede calificar a su candidato!</b></center>
								<center><b>Podrá calificarlo cuando caduque la fecha límite para realizar su pedido.</b></center>
								<br>
						<?php } ?>

				

			</div>
			</div>
		</div>
	</div>
</div>
