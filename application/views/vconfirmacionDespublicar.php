<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                	 <?php if ($this->session->userdata('login')) { ?>
                     
                		<br><br><p>¿Está seguro que quiere eliminar esta gauchada?</p>
                        <p>Si tiene postulaciones perderá su crédito.</p>
                        <table>
                        <form action ="<?php echo base_url();?>publicar/aceptarEliminacion/<?= $id_gauchada?>">                       
                            <td colspan="2"><input type = "submit" value = "Aceptar" /td>
                        </form>
                        <form action ="<?php echo base_url();?>home">
                            <td colspan="2"><input type = "submit" value = "Cancelar" /td>
                        </form>
                        </table>
                	
                    <?php } ?>
                </div>
            </div>
</div>