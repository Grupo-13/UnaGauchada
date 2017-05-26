    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top " style="background: rgba(0, 0, 0, 0.5);">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?= base_url() ?>">Una Gauchada</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li>
                        <a href="">Inicio</a>
                    </li> -->
                   
                    <?php if (!$this->session->userdata('login')) { ?>
                     <li>
                        <a href="<?= base_url() ?>registro1/nuevo_usuario">Registrarse</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>login/ingresar">Iniciar sesión</a>
                    </li>
                    <!-- <li class='dropdown'>
                      <a class='dropdown-toggle' href='#' data-toggle='dropdown' style="background: none;">INICIAR SESION<strong class='caret'></strong></a>
                      <div class='dropdown-menu' style='padding: 10px; padding-bottom: 0px; background: rgba(0, 0, 0, 0.5); width: 400px;'>
                        <form action='<?= base_url() ?>login' method='post' accept-charset='UTF-8' role="form">
                          <div class='form-group'>
                            <input class='form-control large' style='text-align: center;' type='text' name='email' placeholder='Email'/>
                          </div>
                          <div class='form-group'> 
                            <input class='form-control large' style='text-align: center;' type='password' name='clave' placeholder='Contraseña' />
                          </div>
                          <div class='form-group'>
                            <button class='btn btn-primary' style='width: 380px;' type='submit'>INGRESAR</button>
                          </div>
                          </form>
                      </div> -->
                    </li>
                    
                    
                    <?php }else{ ?>
                    <li>
                        <a href="<?= base_url() ?>publicar">Publicar gauchada</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>comprarcredito">Comprar creditos</a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>login/logout">Cerrar sesión</a>
                    </li>
                    
                    
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
