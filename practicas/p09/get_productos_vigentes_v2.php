<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h3>PRODUCTOS VIGENTES</h3>
        <?php
            if (isset($_GET['tope'])) {
                $tope = $_GET['tope'];
            } else {
                die('Parámetro "tope" no detectado...');
            }
            if (!empty($tope)) {
                @$link = new mysqli('localhost', 'root', 'Anime2905', 'marketzone');
                if ($link->connect_errno) {
                    die('Falló la conexión: ' . $link->connect_error . '<br/>');
                }
                if ($tope === "n") {
                    $query = "SELECT * FROM productos";
                } else if (is_numeric($tope)) {
                    $query = "SELECT * FROM productos WHERE unidades <= $tope";
                } else {
                    die('El parámetro "tope" debe ser un número o "n".');
                }
                if ($result = $link->query($query)) {
                    if ($result->num_rows > 0) {
                        // Inicio de la tabla HTML
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
                        echo '<th scope="col">Modificar</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($row = $result->fetch_assoc()) {
                            if ($row['eliminado'] == 1) {
                                continue;
                            } else {
                                // Cada fila de la tabla
                                echo '<tr id="row_' . $row['id'] . '">';
                                echo '<th scope="row">' . $row['id'] . '</th>';
                                echo '<td class="row-data">' . $row['nombre'] . '</td>';
                                echo '<td class="row-data">' . $row['marca'] . '</td>';
                                echo '<td class="row-data">' . $row['modelo'] . '</td>';
                                echo '<td class="row-data">' . $row['precio'] . '</td>';
                                echo '<td class="row-data">' . $row['unidades'] . '</td>';
                                echo '<td class="row-data">' . utf8_encode($row['detalles']) . '</td>';
                                echo '<td class="row-data"><img src="' . $row['imagen'] . '" width="100" height="auto" alt="Imagen del producto"></td>';
                                echo '<td><input type="button" value="Modificar" onclick="cambiar(event);" /></td>';
                                echo '</tr>';
                            }
                        }
                        
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo '<p>No se encontraron productos vigentes.</p>';
                    }
                    $result->free();
                } else {
                    echo 'Error en la consulta: ' . $link->error;
                }
                $link->close();
            }
        ?>
    </div>

    <script>
        function cambiar(event) {
            console.log("Botón de modificar presionado");

            // Obtiene el ID de la fila donde está el botón presionado
            var rowId = event.target.closest('tr').id; // Usar closest para obtener la fila

            // Se obtienen los datos de la fila en forma de arreglo
            var data = document.getElementById(rowId).querySelectorAll(".row-data");
            
            // Obtener valores de la fila
            var nombre = data[0].innerHTML;
            var marca = data[1].innerHTML;
            var modelo = data[2].innerHTML;
            var precio = data[3].innerHTML;
            var unidades = data[4].innerHTML;
            var detalles = data[5].innerHTML;
            var imagen = data[6].querySelector('img').src; // Obtener la imagen correctamente

            alert("Nombre: " + nombre + "\nMarca: " + marca+"\nModelo: " + modelo + "\nPrecio: " + precio+"Detalles: " + detalles + "\nUnidades: " + unidades+"\nImagen: " + imagen );
            send2form(nombre, marca, modelo, precio, detalles, unidades, imagen);

        }

        function send2form(nombre, marca, modelo, precio, detalles, unidades, imagen) {
            var form = document.createElement("form");

            // Campo para el nombre
            var nombreIn = document.createElement("input");
            nombreIn.type = 'text';
            nombreIn.name = 'nombre';
            nombreIn.value = nombre;
            form.appendChild(nombreIn);

            // Campo para la marca
            var marcaIn = document.createElement("input");
            marcaIn.type = 'text';
            marcaIn.name = 'marca';
            marcaIn.value = marca;
            form.appendChild(marcaIn);

            // Campo para el modelo
            var modeloIn = document.createElement("input");
            modeloIn.type = 'text';
            modeloIn.name = 'modelo';
            modeloIn.value = modelo;
            form.appendChild(modeloIn);

            // Campo para el precio
            var precioIn = document.createElement("input");
            precioIn.type = 'text';
            precioIn.name = 'precio';
            precioIn.value = precio;
            form.appendChild(precioIn);

            // Campo para los detalles
            var detallesIn = document.createElement("textarea");
            detallesIn.name = 'detalles';
            detallesIn.value = detalles; // Aquí se establece el valor de detalles
            form.appendChild(detallesIn);

            // Campo para las unidades
            var unidadesIn = document.createElement("input");
            unidadesIn.type = 'text';
            unidadesIn.name = 'unidades';
            unidadesIn.value = unidades;
            form.appendChild(unidadesIn);

            // Campo para la imagen
            var imagenIn = document.createElement("input");
            imagenIn.type = 'text';
            imagenIn.name = 'imagen';
            imagenIn.value = imagen;
            form.appendChild(imagenIn);

            // Configurar el formulario para enviar los datos
            form.method = 'POST';
            form.action = 'https://localhost/tecweb/practicas/p09/formulario_productos_v2.php';

            // Agregar el formulario al cuerpo del documento y enviarlo
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
