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

                        </a>


                        <p class="post-meta">Publicado por <a href="#"><?= $fila['nombre']." " . $fila['apellido']?></a>
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