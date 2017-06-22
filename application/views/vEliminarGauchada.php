    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            
                     <div class="post-preview">
                        <a href="<?= base_url()?>detalle/post/<?= $fila['id_gauchada']?>"></a>

                            <?php if($this->session->userdata('id') == $fila['id_usuario'])
                                {?>
                                   <table>
                                   <form action ="<?php echo base_url();?>publicar/aceptarEliminacion/<?= $fila['id_gauchada']?>">                        
                                   <br>
                                   <td colspan="2"><input type = "submit" value = "Aceptar" /td>
                                   </form>
                                   <form action ="<?php echo base_url();?>publicar/cancelarEliminacion">
                                   <td colspan="2"><input type = "submit" value = "Cancelar" /td>
                                   </form>
                                   </table>
                            <?php }   ?>

                    </div>
                    <hr>
                
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