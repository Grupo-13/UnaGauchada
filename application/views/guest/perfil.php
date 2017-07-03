<div class="container">
			<div class="row">
				<div class="panel panel-default">
						<div class="panel-body"> 
						<br>
						<br>
						<div class="row">
			  				<div class="col-xs-6 col-md-4">
			  						
									<img src="<?=base_url()?>public/img/<?=$foto?>" width="150">
									
									<br>
									<br>
									<b><?=$nombre ?>
									<?=$apellido ?> </b>
									<br>
									<br>
							</div>
							<div class="col-xs-6 col-md-4">
			  						<br>
			  						<b>Información
									<br>
									<br>
									Ciudad: <?=$ciudad ?>
									<br>
									<br>
									Fecha de nacimiento: <?php $fecha = new DateTime($fecha_nacimiento); echo $fecha->format('d/m/Y');?></ul> 
									<?php
									$id = $id_usuario; 
									?>
									</b>
			  				</div>
							<div class="col-xs-6 col-md-4">
								<br>
								<b>
								<?php
								$this->load->model('usuario');
								$query = $this->usuario->getLogro($reputacion);
								$l = $query->row(); ?>
							
 								Reputación:	<?= $l->nombre_logro?>	
								<br>
								<br>	
								<?php
									if ($id == $this->session->userdata('id')) { ?>
										Créditos: <?=$creditos ?>
										<br>
										<br>
								<?php }	?>							
								</b>	
								<center>
								<?php
									
									if ($id == $this->session->userdata('id')) {
										echo form_open('perfil/editarPerfil/' . $id);
										echo form_submit('botonSubmit', 'Editar');
										echo form_close();
									}
								?> 	
								</center>												
							</div>
						</div>
						<br>

						<div class="row">

						<?php
							if ($id == $this->session->userdata('id')) { ?>
			  				<div class="col-md-6">
									<div class="panel panel-default">
									<div class="panel-body"> 
										
										<center>Gauchadas en las que estoy postulado</center>
										<br>
										
										<?php 
										foreach ($consulta as $fila) { 
												$result = $this->gauchada->getPostById($fila['id_gauchada']);
												/*$datos = $result->result_array(); */
												$res = $this->usuario->getUsuarioById($result->id_usuario); ?>

										<li> 
											<a href="<?= base_url()?>detalle/post/<?=$fila['id_gauchada']?>"><?=$result->titulo ?></a>
											<br><?=$fila['descripcion'] ?>
											<br>
											<?php
											date_default_timezone_set('America/Argentina/Buenos_Aires');
                            				$today = new DateTime(); 
                            				$fecha2 = new DateTime( $result->fecha_maxima);
											if (!$fila['elegido'] == '1' & ($fecha2->format('Y-m-d') > $today->format('Y-m-d'))) { ?>
											<form action="<?= base_url() ?>perfil/despostularse/<?=$fila['id_gauchada']?>" onsubmit="return confirm('¿Está seguro que desea despostularse de esta gauchada?');">
												&emsp; <?php $fecha = new DateTime($fila['fecha_postulacion']); echo $fecha->format('d/m/Y');?>
												&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="botonDespostularse" value="Despostularme" style="align: right;">
                                            </form><br>
											<?php
											}
											if ($fila['elegido'] == '1') { ?>
												<i>¡Usted fue elegido para resolver la gauchada!
												<br>Los ponemos en contacto. Tel: <?=$res->telefono ?>
												<?php
												$calificacion = $this->usuario->getCalificacion($fila['id_gauchada']);
												 
												if ($calificacion->num_rows() > 0) {
													$c = $calificacion->row(); ?>
												
												<br>
												
												<br>
												<br>
												<div class="panel panel-info">
													<div class="panel-heading">
		    											<h3 class="panel-title">
		    												<form action="<?php echo base_url();?>calificarusuario/responderCalif/<?= $c->id_calificacion ?>/<?= $fila['id_gauchada'] ?>" onsubmit="return validateForm()" method="post">		    												
		    												Su calificación: 
															<?php if ($c->calificacion == '1') { 
																echo "Positiva";
															} else if ($c->calificacion == '2'){ 
																echo "Neutral";
															} else if ($c->calificacion == '3'){ 
																echo "Negativa";
															} 
															if ($c->respuesta == null){ ?>															
															&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
															<input type="submit" class=" btn-info btn-xs" value="Responder">  <?php } ?>
													</div>
  													<div class="panel-body">
														Comentario: <?= $c->descripcion ?>	
														<?php
															if ($c->respuesta == null){ ?>														
															<br>
															<br><i><textarea rows="2" cols="40" name="respu" placeholder="Escriba aquí su respuesta" requires></textarea></i>
														<?php } else { ?>
															<br>
															<br>
															&emsp; Respuesta: <?= $c->respuesta ?>	
														<?php } ?>

													</div>
													</form>	
												</div>	</i>

											<?php } }
											else if ($fila['elegido'] == '2') { ?>
												<i>Usted no fue elegido para resolver la gauchada</i>

												<?php } else { ?>
													<i>Su solicitud se encuentra pendiente</i> 
												<?php } ?>					
											<br>
										</li>
										<?php 
										} ?>
										
										
									</div>
									</div>
							</div>
								
							<div class="col-md-6">		
								<div class="panel panel-default">
								<div class="panel-body"> 
									<center>Gauchadas publicadas</center>
									<br>
									
									<?php 
										foreach ($gauchadas as $f) { ?>

										<li> 
											<a href="<?= base_url()?>detalle/post/<?=$f['id_gauchada']?>"><?=$f['titulo'] ?></a>											
											<br>
											&emsp; 
											<?php if ($f['candidato'] == '0') { ?>
												<i>Aún no ha seleccionado un candidato</i>
											<?php } else { 
												$id_u = $f['candidato'];
												$t = $this->usuario->getUsuarioById($id_u); ?>
												<i>¡Usted ha elegido a <a href="<?= base_url()?>perfil/usuario/<?= $f['candidato']?>"><?= $t->nombre." " . $t->apellido?></a> como candidato!
													 
													<?php
														$datetime1 = new DateTime();
														$datetime2 = new DateTime($f['fecha_maxima']);
														$interval = $datetime1->diff($datetime2); 
														if ($interval->format('%r') != '-') {
															echo '<br>&emsp; Restan' . $interval->format('%a días para que concluya el favor.');
														}
														
													?>
													<br>&emsp; Los ponemos en contacto. Tel: <?=$t->telefono ?>
													<br>&emsp; <a href="<?= base_url()?>calificarusuario/elegido/<?=$f['candidato']?>/<?=$f['id_gauchada']?>">¡Calificar candidato!</a>
													
												</i>
											<?php } ?>
											<br>
											&emsp; Fecha: <?php $fecha = new DateTime($f['fecha_publicacion']); echo $fecha->format('d/m/Y');?>
											<br>
											<br>
										</li>
									<?php
									} ?>
								</div>
								</div>
							</div>
						
						</div>

						<?php } 
						else { ?>
								
								<div class="panel panel-default">
								<div class="panel-body"> 
									<h4><center>GAUCHADAS PUBLICADAS</center></h4>
									<br>
									
									<?php 
										foreach ($gauchadas as $f) { 
									?>

										<li> 
											<a href="<?= base_url()?>detalle/post/<?=$f['id_gauchada']?>"><?=$f['titulo'] ?></a>											
											<br>
											&emsp; Fecha: <?php $fecha = new DateTime($f['fecha_publicacion']); echo $fecha->format('d/m/Y');?>
											<br>
											<br>
										</li>
									<?php
									} ?>
								</div>
								</div>
							
					<?php } ?>
							</div>
						
			</div>
		</div>
	</div>
</div>		