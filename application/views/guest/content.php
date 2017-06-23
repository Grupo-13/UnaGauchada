    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php

                    
                    foreach ($consulta as $fila) {
               
                      ?>
                     <div class="post-preview">
                        <a href="<?= base_url()?>detalle/post/<?= $fila['id_gauchada']?>">
                            <h2 class="post-title">
                                <?= $fila['titulo']; ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?= substr($fila['descripcion'], 0, 100). "...";
                                 ?>
                            </h3>
                            <?php if($fila['foto'] != Null){?>
                            <img src="<?=base_url()?>public/img/<?= $fila['foto'] ?>" width=300 hspace=170> <?php } ?>
                            
                            <p><?php echo'Fecha límite: '; $fecha = new DateTime($fila['fecha_maxima']); echo $fecha->format('d/m/Y');?></p>
                            <p><?php echo 'Lugar: '; $ciudad = $this->gauchada->getCiudadGauchada($fila['id_gauchada']); echo $ciudad->nombre_localidad ?></p>

                            <?php $result = $this->mcategorias->getCategoriasGauchadas($fila['id_gauchada']);
                            $data = $result->result_array();  ?>
                            Categorías: 
                        
                             <?php    
                          

                            foreach ($data as $row) {?>

                                <span style="border-image: initial; border: 2px solid #FFA500"><?php echo $row['nombre_categoria']?></span>

                            <?php }
                            ?>


                        </a>

                            <?php if($this->session->userdata('login'))
                                    {
                                         if($this->session->userdata('id') == $fila['id_usuario'])
                                         {
                                            $id = $fila['id_gauchada'] ?>
                                            <table>
                                            <form action ="<?php echo base_url();?>publicar/modificarGauchada/<?= $id?>">                        
                                                <br>
                                                <td colspan="2"><input type = "submit" value = "Modificar" /td>
                                            </form>
                                            <form action ="<?php echo base_url();?>publicar/despublicar/<?= $id?>">
                                                <td colspan="2"><input type = "submit" value = "Despublicar" /td>
                                            </form>
                                            </table>
                                        <?php }   

                                    }   ?>


                        <p class="post-meta">Publicado por <a href="<?= base_url()?>perfil/usuario/<?= $fila['id_usuario']?>"><?= $fila['nombre']." " . $fila['apellido']?></a>
                            <?php $fecha = new DateTime($fila['fecha_publicacion']); echo ' el ' .$fecha->format('d/m/Y'); ?></p>
                    </div>
                    <hr>

                <?php 
                    }
                ?>
                
                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>

<hr>