<div class="container">
		<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
						<br>
						<br>
						<div class="panel panel-default">
						<div class="panel-body">    
							<center><h2><?=$titulo ?></h2></center>
						<p align = "justify"><?= $descripcion ?></p>
						<?php if($foto_gauchada != Null){?>
								<img src="<?=base_url()?>public/img/<?= $foto_gauchada ?>"width=600 hspace=60> <br> <?php } 
								$r = $this->usuario->getNombreUsuario($id_usuario);?>
								<br>			
								<i class="post-meta">Publicado por <a href="<?= base_url()?>perfil/usuario/<?= $id_usuario?>"><?= $r->nombre." " . $r->apellido?></a></i>
						</div>
						 <div class="panel-footer">
						 <p><?php echo'Fecha límite: '; $fecha = new DateTime($fecha_maxima); echo $fecha->format('d/m/Y');?></p>
						 <p><?= 'Lugar: ', $ciudad ?></p> 

						Categorías:
						<!-- <table style="" border="2" bordercolor="black"><tbody>
								<tr> -->
						<?php                        
						foreach ($consulta as $fila) {?>

								 <span style="border-image: initial; border: 2px solid #FFA500"><?=$fila['nombre_categoria']?></span>

						<?php } $id = $id_gauchada;?>
						<br><br>

						
		
							<?php

							if ($this->session->userdata('login')){


								if ($this->session->userdata('id') == $id_usuario) { ?>
										<a href="<?= base_url()?>detalle/postulados/<?=$id_gauchada?>">
										<?= 'Cantidad de postulados: ', $cant_postulados;
										$postulado = $this->gauchada->estoyPostulado($id_gauchada); ?>
										</a>
										<br>
								<?php }
								else { ?>

										<?= 'Cantidad de postulados: ', $cant_postulados; 
										$postulado = $this->gauchada->estoyPostulado($id_gauchada); ?>
										<br>


								<?php }
								
								date_default_timezone_set('America/Argentina/Buenos_Aires');
								$today = new DateTime(); 
								$fecha2 = new DateTime($fecha_maxima);

								if ($this->session->userdata('id') != $id_usuario){
										if(!($postulado)& ($fecha2->format('Y-m-d') > $today->format('Y-m-d'))){?>
											<form action ="<?php echo base_url();?>detalle/postularse/<?= $id?>">
										  <table>
										  <tr> 
										  <br>
											<td colspan="2"><input type = "submit" value = "Postularse" /td>
										  </tr>
										  </table>
										  </form>
									 <?php } elseif ($postulado)
									 {
											echo '<br>';
											echo '<br>';
											echo '¡Usted está postulado para resolver esta gauchada!';
									 }
								} 
								elseif ($fecha2->format('Y-m-d') > $today->format('Y-m-d'))
									{ ?>
										 <table>
										 <form action ="<?php echo base_url();?>publicar/modificarGauchada/<?= $id_gauchada?>">                        
												 <br>
												 <td colspan="2"><input type = "submit" value = "Modificar" /td> &emsp;
										 </form>
										 <form action ="<?php echo base_url();?>publicar/despublicar/<?= $id_gauchada?>">
												 <td colspan="2"><input type = "submit" value = "Despublicar" /td>
										 </form>
										 </table>
								 <?php }  

						} 
							?>								

						<br>
						<h3>Comentarios</h3>
						<br>
						
						<?php  
						$this->load->model('usuario');                      
						foreach ($comentarios as $f) 

						{
						
						$result = $this->usuario->getNombreUsuario($f['id_usuario']); ?>
						
					
						<i><img src="<?=base_url()?>public/img/<?=$result->foto?>" width="50">
								

						<a href="<?= base_url()?>perfil/usuario/<?=$f['id_usuario']?>"><?=$result->nombre ." " . $result->apellido?></a>                                
						<ul><?=$f['pregunta']?>
						<br>
						<?php $fecha = new DateTime($f['fecha_comentario']); echo $fecha->format('d-m-Y');?></ul>
						<br>
			 
						
						<?php

						$usuario = $this->usuario->getNombreUsuario($id_usuario);

						if ($f['respuesta'] != NULL) 
						{ ?>
								<ul>

								<img src="<?=base_url()?>public/img/<?=$usuario->foto?>" width="50">
								

								<a href="<?= base_url()?>perfil/usuario/<?=$id_usuario ?>"><?=$usuario->nombre ." " . $usuario->apellido?></a>
								<br>
								<ul><?=$f['respuesta']?></ul>
								</i></ul>
						<?php 
						} ?>

						

						 <?php if ($this->session->userdata('login'))
										{
											if (($this->session->userdata('id') == $id_usuario) & ($f['respuesta'] == NULL)){ ?>

													<?php

													echo form_open('detalle/respuesta/' . $f['id_comentario']);

													echo form_error('respuesta');
											//echo form_label('Email', 'email');
											//echo form_input('email');
													echo '
															<div class="input-group">
															<span class="input-group-addon" id="basic-addon1"> <i class="fa fa-reply" title="Responder"></i></span>
															';
													$data = array(
															'name' => 'respuesta',
															'class'        => 'form-control',
															'placeholder'          => 'Escriba aquí',
															'aria-describedby'       => 'basic-addon1',
															'maxlength'     =>'140',
															'value' => set_value()
															);
													echo form_input($data);
													echo '
													</div>';
													echo '
													<br>';

													echo form_submit('botonSubmit', 'Enviar');
													echo form_close();
													}
											}  ?>   
											
											<hr size="2px" width="50%" align="center" color="black"/>
						<?php
						} ?>                                                                 
					 

						

						<?php
									 
						//if ($this->session->userdata('login') & ($fecha2->format('Y-m-d') > $today->format('Y-m-d'))){			
						if ($this->session->userdata('login')){ ?>

							<h4>Deja un comentario</h4>  
									<br>

									<?php
									echo form_open('detalle/nuevo_comentario/' . $id_gauchada);

									echo form_error('pregunta');
							//echo form_label('Email', 'email');
							//echo form_input('email');
									echo '
											<div class="input-group">
											<span class="input-group-addon" id="basic-addon1">Comentario</span>
											';
									$data = array(
											'name' => 'pregunta',
											'class'        => 'form-control',
											'placeholder'          => 'Escriba una pregunta',
											'aria-describedby'       => 'basic-addon1',
											'maxlength'     =>'140',
											'value' => set_value()
											);
									echo form_input($data);
									echo '
									</div>';
									echo '
									<br>';

									echo form_submit('botonSubmit', 'Enviar');
									echo form_close();															

						} ?>


						 
					</div>
				</div>
		</div>
</div>