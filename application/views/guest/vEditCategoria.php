		<div class="col-md-10">
			<br>
			<br>
			<br>
			<b>Editar categoria</b>
			<br>
			<br>
			<form action="<?= base_url()?>categoria/editar/<?= $categoria->id_categoria?>" method="post">
				<div class="col-lg-6">
				<?php echo form_error('nombre'); ?>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Nombre</span>
					<input type="text" name="nombre" value="<?= $categoria->nombre_categoria?>" class="form-control" aria-describedby="basic-addon1">
				</div>
				
				</div>
				<button class="btn btn-default" type="submit">Aceptar</button>

			</form>



		</div>
	</div>
</div>

<hr>