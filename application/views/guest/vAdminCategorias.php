		<div class="col-md-10">
			<br>
			<br>
			<br>
			<b>Categorias</b>
			<br><br>

			<form action="<?= base_url()?>categoria/agregar" method="post">
				<div class="col-lg-6">
				<?php echo form_error('nombre'); ?>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Nombre</span>
					<input type="text" name="nombre" class="form-control" aria-describedby="basic-addon1">
				</div>
				
				</div>
				<button class="btn btn-default" type="submit">Agregar categoria</button>

			</form>
			<br>


			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
					</tr>
				</thead>
			<?php  
				foreach ($categorias as $fila){
					if ($fila['id_categoria'] != 8) {?>
						<tr>
							<td colspan="3"><?= $fila['nombre_categoria'] ?></td>
							<td><a href="<?= base_url()?>categoria/modificar/<?= $fila['id_categoria']?>" type="button" class="btn btn-primary">Modificar</a></td>
							<td><a href="<?= base_url()?>categoria/eliminar/<?= $fila['id_categoria']?>" type="button" class="btn btn-warning" onclick="return confirm('Esta seguro?');">Eliminar</a></td>
						</tr>
			
			<?php } }?>
				<tr>
					<td colspan="3">Otras</td>
					<td><a href="<?= base_url()?>categoria/modificar/8" type="button" class="btn btn-primary">Modificar</a></td>
					<td><a class="btn btn-warning">No se puede eliminar</a></td>
				</tr>
			
			</table>


		</div>
	</div>
</div>

<hr>