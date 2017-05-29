<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                	 <?php if ($this->session->userdata('login')) { ?>
                     
                		<br><br><p>¡Su compra se ha realizado con éxito!</p>
                        <p><?= 'Se ha registrado una compra de $', $monto, '.'?></p>
                        <p><?= 'Usted ahora posee ', $creditos, ' créditos.' ?></p>
                	
                    <?php } ?>
                </div>
            </div>
</div>