		<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                	 <?php if ($this->session->userdata('login')) { ?>
                      
                        <br>
                        <br>
                		<h2><?= $titulo ?></h2>
                		<p><?= $descripcion ?></p>
                		<?php if($foto != Null){?>
                            <img src="<?=base_url()?>public/img/<?= $foto ?>"width=600 hspace=60> <br> <?php } ?>
                        
                        <p><?php echo'Fecha límite: '; $fecha = new DateTime($fecha_maxima); echo $fecha->format('d/m/Y');?></p>
                        <p><?= 'Lugar: ', $ciudad ?></p>
                         
                        Categorías:
                        <!-- <table style="" border="2" bordercolor="black"><tbody>
                            <tr> -->
                        <?php                        
                        foreach ($consulta as $fila) {?>

                             <span style="border-image: initial; border: 2px solid #FFA500"><?=$fila['nombre_categoria']?></span>

                        <?php } 

                         //   echo '</tr>
                         // </tbody></table>';
                     }else{ ?>
                        <p><?= $categoria ?></p>
                     	<br><br><p> Para ver el detalle de la gauchada usted debe haber iniciado sesión. </p>
			
                        <p><a href="<?= base_url() ?>login/ingresar"><input type="submit" value="Iniciar sesión"></a></p>
                    	
                 

                     <?php } ?>
                </div>
            </div>
        </div>