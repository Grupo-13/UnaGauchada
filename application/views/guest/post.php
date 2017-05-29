		<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                	 <?php if ($this->session->userdata('login')) { ?>
                     

                		<p><?= $titulo ?></p>
                		<p><?= $descripcion ?></p>
                		<p><?= 'Fecha límite: ', $fecha_maxima ?></p>
                		<img src="<?=base_url()?>public/img/<?= $foto ?>"width=600 align="center">


                     <?php }else{ ?>
                     
                     
                     	<br><br><p> Para ver el detalle de la gauchada usted debe haber iniciado sesión. </p>
			
                        <p><a href="<?= base_url() ?>login/ingresar"><input type="submit" value="Iniciar sesión"></a></p>
                    	
                 

                     <?php } ?>
                </div>
            </div>
        </div>