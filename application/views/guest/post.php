		<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                	    <br>
                        <br>
                        <div class="panel panel-default">
                        <div class="panel-body">    
                          <h2><?=$titulo ?></h2>
                		  <p align = "justify"><?= $descripcion ?></p>
                		  <?php if($foto != Null){?>
                              <img src="<?=base_url()?>public/img/<?= $foto ?>"width=600 hspace=60> <br> <?php } ?>
                            </div>
                         <div class="panel-footer">
                         <p><?php echo'Fecha límite: '; $fecha = new DateTime($fecha_maxima); echo $fecha->format('d/m/Y');?></p>
                         <p><?= 'Lugar: ', $ciudad ?></p>
                         
                        Categorías:
                       
                        <?php                        
                        foreach ($consulta as $fila) {?>

                             <span style="border-image: initial; border: 2px solid #FFA500"><?=$fila['nombre_categoria']?></span>

                        <?php }?>

                     
                    	</div>
                     </div>
                </div>
            </div>
        </div>