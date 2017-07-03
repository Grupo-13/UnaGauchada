<?php
	echo load_bootstrap();	
	foreach ($notis as $key) {
		$autor = $this->usuario->getNombreUsuario($key['id_autor']);
		$destino = $this->usuario->getNombreUsuario($key['id_destino']);

		echo '<ul class="list-group">';
		echo '<a target="_parent" href="notificaciones/notiLeida/' . $key['id_notificacion'] . '/' . $key['id_objetivo'] .'">';
		if ($key['leida']) {
			echo '<li class="list-group-item" >';	
		}else{
			echo '<li class="list-group-item" style="background: rgba(128, 128, 128, 0.3);">';
		}
		
		/**
		*Tipos noti:
		* 0- Comentario
		* 1- Respuesta a comentario
		* 2- Postulado a mi gauchada
		* 3- Gauchada a la que me postulé eliminada
		* 4- Elegido para la gauchada
		* 5- No fui elegido para la gauchada
		* 6- Usuario despostulado de tu gauchada
		* 7- Usuario me calificó
		* 8- Usuario me respondió a mi calificacion
		*/
		switch ($key['tipo']) {
			case 0:
				echo $autor->nombre . ' ' . $autor->apellido . ' comentó en tu gauchada "' . $key['titulo'] . '"';
				break;
			case 1:
				echo $autor->nombre . ' ' . $autor->apellido . ' respondió tu comentario en la gauchada "' . $key['titulo'] . '"';
				break;
			case 2:
				echo $autor->nombre . ' ' . $autor->apellido . ' se postuló a tu gauchada "' . $key['titulo'] . '"';
				break;
			case 3:
				echo 'La gauchada "' . $key['titulo'] . '" a la cual te postulaste fué eliminada';
				break;
			case 4:
				echo 'Fuiste seleccionado por ' . $autor->nombre . ' ' . $autor->apellido . ' para realizar la gauchada "' . $key['titulo'] . '"';
				break;
			case 5:
				echo 'La gauchada "' . $key['titulo'] . '" se cerró pero no fuiste seleccionado para resolverla';
				break;	
			case 6:
				echo $autor->nombre . ' ' . $autor->apellido . ' se ha despostulado de tu gauchada "' . $key['titulo'] . '"';
				break;
			case 7:
				echo $autor->nombre . ' ' . $autor->apellido . ' te ha calificado por la gauchada "' . $key['titulo'] . '"';
				break;
			case 8:
				echo $autor->nombre . ' ' . $autor->apellido . ' respondió tu calificación';
				break;

		}

		date_default_timezone_set('America/Argentina/Buenos_Aires');	
		$fecha = new DateTime($key['fecha']);
		$hoy = new DateTime(date('Y-m-d H:i:s'));
		$interval = date_diff($fecha,$hoy);
		if ($interval->format('%a') > 0) {
			echo '<br>Hace '. $interval->format('%d días y %h horas');
		}elseif ($interval->format('%h') > 0){
			echo '<br>Hace '. $interval->format('%h horas');
		}elseif ($interval->format('%i') > 1){
			echo '<br>Hace '. $interval->format('%i minutos');
		}else{
			echo '<br>Hace unos instantes';
		}
		//echo '<br>Hace '. $interval->format('%a días y %h horas');

		$this->usuario->notiVista($key['id_notificacion']);

		echo "</li>";
		echo "</a>";
		echo "</ul>";
	}
?>
