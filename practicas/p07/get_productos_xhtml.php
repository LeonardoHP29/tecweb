<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset='UTF-8" />
		<title>Productos</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
    <h3>PRODUCTOS</h3>
    <?php
        //variable tope
         if (isset($_GET['tope'])) {
            $tope = $_GET['tope'];
        } else {
            die('Parámetro "tope" no detectado...');
        }
        if (!empty($tope)) {
            //conexion a la base de datos
            @$link = new mysqli('localhost', 'root', 'Anime2905', 'marketzone');

            // Verificar si la conexión fue exitosa
            if ($link->connect_errno) {
                die('Falló la conexión: ' . $link->connect_error . '<br/>');
            }
            // Verificar valor de tope
            if ($tope === "n") {
                $query = "SELECT * FROM productos";
            } else if (is_numeric($tope)) {
                $query = "SELECT * FROM productos WHERE unidades <= $tope";
            } else {
                die('El parámetro "tope" debe ser un número o "n".');
            }

            // Ejecutar la consulta
            if ($result = $link->query($query)) {
                if ($result->num_rows > 0) {
                    echo '<table class="table">';
                    echo '<thead class="thead-dark">';
                    echo '<tr>';
                    echo '<th scope="col">#</th>';
                    echo '<th scope="col">Nombre</th>';
                    echo '<th scope="col">Marca</th>';
                    echo '<th scope="col">Modelo</th>';
                    echo '<th scope="col">Precio</th>';
                    echo '<th scope="col">Unidades</th>';
                    echo '<th scope="col">Detalles</th>';
                    echo '<th scope="col">Imagen</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Mostrar cada producto
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['id'] . '</th>';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td>' . $row['marca'] . '</td>';
                        echo '<td>' . $row['modelo'] . '</td>';
                        echo '<td>' . $row['precio'] . '</td>';
                        echo '<td>' . $row['unidades'] . '</td>';
                        echo '<td>' . utf8_encode($row['detalles']) . '</td>';
                        echo '<td><img src="' . $row['imagen'] . '" width="100" height="auto" alt="Imagen del producto" ></td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>No se encontraron productos con las condiciones establecidas.</p>';
                }

                // Liberar el resultado
                $result->free();
            } else {
                echo 'Error en la consulta: ' . $link->error;
            }
            // Cerrar la conexión a la base de datos
            $link->close();
        }
        ?>
	</body>
</html>