<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<br>
					<br>
					<div class="panel panel-default">
					<div class="panel-body"> 
					<?=$email ?>
					<?=$nombre ?>
					<?=$apellido ?>

					<?php
					$id = $id_usuario; 
					if ($id == $this->session->userdata('id')) {
						echo 'Editar';
					}
					?>
					</div>
					</div>
		</div>
	</div>
</div>