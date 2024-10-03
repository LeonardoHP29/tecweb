<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>Registro Completado</title>
		<style type="text/css">
			body {margin: 20px; 
			font-family: Verdana, Helvetica, sans-serif;
			font-size: 90%;}
			h1 {color: #005825;
			border-bottom: 1px solid #005825;}
			h2 {font-size: 1.2em;
			color: #4A0048;}
		</style>
	</head>
	<?php
		$nombre = $_POST['name'];
		$marca  = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$precio = $_POST['precio'];
		$detalles = $_POST['detalles'];
		$unidades = $_POST['unidades'];
		$imagen   = $_POST['imagen'];

		$errores = array();
		$color = '#C4DF9B';

		// Validar que las variables cumplen con la integridad
		if (strlen($nombre) > 100) {
			$errores[] = "El nombre no puede tener más de 100 caracteres.";
		}
		if (strlen($marca) > 25) {
			$errores[] = "La marca no puede tener más de 25 caracteres.";
		}
		if (strlen($modelo) > 25) {
			$errores[] = "El modelo no puede tener más de 25 caracteres.";
		}
		if (!is_numeric($precio) || $precio <= 0) {
			$errores[] = "El precio debe ser un número válido y mayor a cero.";
		}
		if (strlen($detalles) > 250) {
			$errores[] = "Los detalles no pueden tener más de 250 caracteres.";
		}
		if (!is_int((int)$unidades) || (int)$unidades <= 0) {
			$errores[] = "Las unidades deben ser un número entero válido mayor a cero.";
		}
		if (strlen($imagen) > 100) {
			$errores[] = "La ruta de la imagen no puede tener más de 100 caracteres.";
		}

		if (!empty($errores)) {
			echo '<h1>Error en el registro</h1>';
			echo '<ul>';
			foreach ($errores as $error) {
				echo '<li>' . $error . '</li>';
			}
			echo '</ul>';
			$color = '#FFF8B3';
		} else {
			/** SE CREA EL OBJETO DE CONEXIÓN */
			@$link = new mysqli('localhost', 'root', 'Anime2905', 'marketzone');	

			/** comprobar la conexión */
			if ($link->connect_errno){
				die('Falló la conexión: '.$link->connect_error.'<br/>');
			}
			
			//Comprobar si el producto ya existe en la base de datos 
			$query = $link->prepare("SELECT nombre, marca, modelo FROM productos");
			$query->execute();
			$result = $query->get_result();
			$productoExistente = false;

			while ($row = $result->fetch_assoc()) {
				if ($row['nombre'] == $nombre && $row['marca'] == $marca && $row['modelo'] == $modelo) {
					$productoExistente = true;
					break;
				}
			}

			if ($productoExistente) {
				$color = '#FFCCCC';
				echo '<h1 style="color:#000">Registro no Completado</h1>';
				echo '<h2 style="color:#000">No se pudo regristar el producto ya que se encuentra en la base de datos</h2>';
			} else {
				// Insertar el producto si no existe
				/*
				$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
				$stmt = $link->prepare($sql);
				*/
				$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
				VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen')";
				$stmt = $link->prepare($sql);

				if ($stmt->execute()) {
					echo '<h1>Registro Completado</h1>';
					echo '<h2>Información del Producto:</h2>';
					echo '<ul>';
					echo '<li><strong>Nombre:</strong> <em>' . $nombre . '</em></li>';
					echo '<li><strong>Marca:</strong> <em>' . $marca . '</em></li>';
					echo '<li><strong>Modelo:</strong> <em>' . $modelo . '</em></li>';
					echo '<li><strong>Precio:</strong> <em>' . $precio . '</em></li>';
					echo '<li><strong>Detalles:</strong> <em>' . $detalles . '</em></li>';
					echo '<li><strong>Unidades:</strong> <em>' . $unidades . '</em></li>';
					echo '<li><strong>Ruta de Imagen:</strong> <em>' . $imagen . '</em></li>';
					echo '</ul>';

					echo '<p>
							<a href="http://validator.w3.org/check?uri=referer">
								<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
							</a>
						</p>';
				} else {
					echo '<h1>Error en el registro del producto</h1>';
				}
				
				$stmt->close();
			}
			$link->close();
		}
	?>
	<body style="background-color: <?php echo $color; ?>;">
	</body>
</html>
