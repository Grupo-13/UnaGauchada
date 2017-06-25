    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php

                    
                echo form_open('home/buscar');
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
                echo '
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Seleccione las categorías</span>
                            ';
                echo '
                    </div>'; 
                    
                ?>

                <div class="panel panel-default">
                <div class="panel-body"> 
                <?php   $i = 0;
                    foreach ($categorias as $fila) 
                    {
                        //<input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
                    
                        echo '<input type="checkbox" name="categoria[]" value="' . $fila['id_categoria'] . '"> ' . $fila['nombre_categoria'] .'     ';
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
                echo '<option selected disabled>Seleccione una localidad</option>';
                foreach ($localidades as $tupla) {
                    echo '<option value="'. $tupla['id_localidad'] . '">' . $tupla['nombre_localidad'] . '</option>';
                }   
                
                echo '</select>';
                echo '
                </div>';
                echo '
                <br>';

                echo form_submit('botonSubmit', 'Buscar');
                echo form_close();


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
                            <?php if($fila['foto_gauchada'] != Null){?>
                            <img src="<?=base_url()?>public/img/<?= $fila['foto_gauchada'] ?>" width=300 hspace=170> <?php } ?>
                            
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
                                                <br>
                                                <td colspan="2"><input type = "submit" value = "Modificar" /td> &emsp;
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