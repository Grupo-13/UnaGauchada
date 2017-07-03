<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			<div class="panel-body">
				<br>
				<br>
				<center><h3>Candidatos postulados en la gauchada</h3></center>
				<br> 
				<br>
				<?php                        
				foreach ($postulados as $p) { 

					$result = $this->usuario->getNombreUsuario($p['id_usuario']); ?>
					<div class="panel panel-default">
					<div class="panel-body">
						<a href="<?= base_url()?>perfil/usuario/<?=$p['id_usuario']?>"><?=$result->nombre ." " . $result->apellido?></a>
						<?php $aux = $this->usuario->getUsuarioById($p['id_usuario']);
						$logro = $this->usuario->getLogro($aux->reputacion);
						$l = $logro->row();

						?>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i> Reputación: <?=$l->nombre_logro?></i>
						<br>
						<?=$p['descripcion']?>
						<br>
						<?php 
						$data = array('id_gauchada' => $p['id_gauchada'], 
									  'id_usuario'=>$p['id_usuario']);
						
						?>

						<form action ="<?php echo base_url();?>calificarusuario/elegido/<?=$p['id_usuario']?>/<?=$p['id_gauchada']?>" onsubmit="return confirm('Esta seguro?');"> 
						<?php $fecha = new DateTime($p['fecha_postulacion']); echo $fecha->format('d/m/Y'); ?>
						&emsp;
						<?php $candidato = $this->gauchada->getCandidato($p['id_gauchada']);
						$can = $candidato->row();
						
						if ($can->candidato == 0) {	?>
						<input type = "submit" value = "Elegir">
						<?php } ?> 
						
					</div>
					</div>
				
				<?php } ?>
			</div>
			</div>
		</div>
	</div>
</div>