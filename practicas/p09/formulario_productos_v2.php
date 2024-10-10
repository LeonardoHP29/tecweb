<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Producto</title>
</head>
<body>

<h1>Formulario de MarketZone</h1>

<fieldset>
    <legend><h2>Actualización del producto</h2></legend>
    <form id="miFormulario" method="post" action="https://localhost/tecweb/practicas/p09/update_productos.php">
        <ul>
            <li>
            <label>ID:</label>
            <input type="text" id="form-id" name="id" value="<?= htmlspecialchars($_POST['id'] ?? '') ?>">
            </li>
            <li>
                <label>Nombre:</label>
                <input type="text" name="nombre" id="form-name" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>" required>
            </li>
            <li>
                <label>Marca:</label>
                <select name="marca" id="form-marca" required>
                    <option value="">Seleccione una marca</option>
                    <option value="Lenovo" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Lenovo') ? 'selected' : '' ?>>Lenovo</option>
                    <option value="HP" <?= (isset($_POST['marca']) && $_POST['marca'] == 'HP') ? 'selected' : '' ?>>HP</option>
                    <option value="Motorola" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Motorola') ? 'selected' : '' ?>>Motorola</option>
                    <option value="Samsung" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Samsung') ? 'selected' : '' ?>>Samsung</option>
                    <option value="Apple" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Apple') ? 'selected' : '' ?>>Apple</option>
                    <option value="E-Yooso" <?= (isset($_POST['marca']) && $_POST['marca'] == 'E-Yooso') ? 'selected' : '' ?>>E-Yooso</option>
                    <option value="Free Wolf" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Free Wolf') ? 'selected' : '' ?>>Free Wolf</option>
                    <option value="Microsoft" <?= (isset($_POST['marca']) && $_POST['marca'] == 'Microsoft') ? 'selected' : '' ?>>Microsoft</option>
                </select>
            </li>
            <li>
                <label>Modelo:</label>
                <input type="text" id="form-modelo" name="modelo" value="<?= htmlspecialchars($_POST['modelo'] ?? '') ?>">
            </li>
            <li>
                <label>Precio:</label>
                <input type="number" id="form-precio" name="precio" step="0.01" value="<?= htmlspecialchars($_POST['precio'] ?? '') ?>" required>
            </li>
            <li>
                <label>Unidades:</label>
                <input type="number" id="form-unidades" name="unidades" value="<?= htmlspecialchars($_POST['unidades'] ?? '') ?>" min="0">
            </li>
            <li>
                <label>Detalles:</label><br>
                <textarea id="form-detalles" rows="4" cols="60" name="detalles"><?= htmlspecialchars($_POST['detalles'] ?? '') ?></textarea>
            </li>
            <li>
                <label>Imagen (URL):</label>
                <input type="text" id="form-imagen" name="imagen" value="<?= htmlspecialchars($_POST['imagen'] ?? '') ?>">
            </li>
        </ul>
        <p>
            <input type="submit" value="Actualizar" onclick="validar(event);">
        </p>
    </form>
</fieldset>

<script>
    function validar(event) {
        var nombre = document.getElementById('form-name').value;
        var marcaSelect = document.getElementById('form-marca');
        var marca = marcaSelect.options[marcaSelect.selectedIndex].value;
        var precio = parseFloat(document.getElementById('form-precio').value);
        var detalles = document.getElementById('form-detalles').value;
        var unidades = parseInt(document.getElementById('form-unidades').value);
        var imagen = document.getElementById('form-imagen').value;

        // Validaciones
        if (nombre === '') {
            alert('¡Debes llenar el campo Nombre!');
            event.preventDefault();
            return;
        } else if (marca === '') {
            alert('Debe seleccionar una marca.');
            event.preventDefault();
            return;
        } else if (isNaN(precio) || precio <= 99.99) {
            alert('¡El precio debe ser un número mayor a 99.99!');
            event.preventDefault();
            return;
        }
        if (detalles.length > 250) {
            alert('¡El campo detalles tiene más de 250 caracteres!');
            event.preventDefault();
            return;
        }
        if (isNaN(unidades) || unidades < 0) {
            alert('¡El campo unidades debe ser un número mayor o igual a 0!');
            event.preventDefault();
            return;
        }
        if (imagen === '') {
            imagen = 'img/imagen_predefinida.png';
        }
    }
</script>

</body>
</html>
