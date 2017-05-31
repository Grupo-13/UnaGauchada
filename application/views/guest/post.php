		<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                	 <?php if ($this->session->userdata('login')) { ?>
                     
                        <br>
                        <br>
                		<h2><?= $titulo ?></h2>
                		<p><?= $descripcion ?></p>
                		<img src="<?=base_url()?>public/img/<?= $foto ?>"width=600 align="center">
                        <br>
                        <p><?= 'Fecha límite: ', $fecha_maxima ?></p>
                         
                        Categorías: 
                        <!-- <table style="" border="2" bordercolor="black"><tbody>
                            <tr> -->
                        <?php                        
                        foreach ($consulta as $fila) { ?>
                        
                        <!--  <span style="" border="1" bordercolor="red"><?= $fila['nombre_categoria'] ?></span> -->
                        <!--  <div style=”padding:12px;background-color:#COLOR;line-height:1.4;”><?= $fila['nombre_categoria'] ?></div> -->
                       
                        <!--   <td bgcolor= "grey"><?= $fila['nombre_categoria']?></td> -->
                        <span style="border-image: initial; border: 2px solid #FFA500" ><?= $fila['nombre_categoria']?></span>


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