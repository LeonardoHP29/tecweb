<!DOCTYPE html >


<html>

  <head>
    <meta charset="utf-8" >
    <title>Registro de Producto</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
  </head>
  <?php
    $marca = isset($_POST['marca']) ? htmlspecialchars($_POST['marca']) : '';
  ?>
  <body>

    <h1>Formulario de MarketZone</h1>

    <fieldset>
      <legend><h2>Actualizacion del producto</h2></legend>
      <form id="miFormulario" onsubmit="" method="post">
              <ul>
              <li><label>Nombre:</label> <input type="text" name="name" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li>
              <li>
                  <label>Marca:</label>
                  <select name="marca" id="form-marca">
                      <option value="">Seleccione una marca</option>
                      <option value="Lenovo" <?= ($marca == 'Lenovo') ? 'selected' : '' ?>>Lenovo</option>
                      <option value="HP" <?= ($marca == 'HP') ? 'selected' : '' ?>>HP</option>
                      <option value="Motorola" <?= ($marca == 'Motorola') ? 'selected' : '' ?>>Motorola</option>
                      <option value="Samsung" <?= ($marca == 'Samsung') ? 'selected' : '' ?>>Samsung</option>
                      <option value="Apple" <?= ($marca == 'Apple') ? 'selected' : '' ?>>Apple</option>
                      <option value="E-Yooso" <?= ($marca == 'E-Yooso') ? 'selected' : '' ?>>E-Yooso</option>
                      <option value="Free Wolf" <?= ($marca == 'Free Wolf') ? 'selected' : '' ?>>Free Wolf</option>
                      <option value="Microsoft" <?= ($marca == 'Microsoft') ? 'selected' : '' ?>>Microsoft</option>
                  </select>
              </li>
              <li><label>Precio:</label><input type="text" id="form-precio" name="precio" value="<?= isset($_POST['precio']) ? htmlspecialchars($_POST['precio']) : '' ?>"></li>
              <li><label>Unidades:</label><input type="text" id="form-unidades" name="unidades" value="<?= isset($_POST['unidades']) ? htmlspecialchars($_POST['unidades']) : '' ?>"></li>
              <li><label>Detalles:</label><br><textarea id="form-detalles"rows="4" cols="60" name="detalles"><?= isset($_POST['detalles']) ? htmlspecialchars($_POST['detalles']) : '' ?></textarea></li>
              <li><label>Imagen (URL):</label><input type="text" id="form-imagen" name="imagen" value="<?= isset($_POST['imagen']) ? htmlspecialchars($_POST['imagen']) : '' ?>"></li>
              </ul>
          <p>
              <input type="submit" value="Actualizar">
          </p>
      </form>
    </fieldset>

    <script>
    function validar(event) {
      var nombre = document.getElementById('form-name').value;
      var marcaSelect = document.getElementById('form-marca');
      var marca = marcaSelect.options[marcaSelect.selectedIndex].value;
      var modelo = document.getElementById('form-modelo').value;
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
      } else if (modelo === '') {
        alert('¡Debes llenar el campo Modelo!');
        event.preventDefault();
        return;
      } else if (isNaN(precio)) {
        alert('¡Debes llenar el campo Precio correctamente!');
        event.preventDefault();
        return;
      }

      // Validaciones adicionales
      if (nombre.length > 100) {
        alert('¡El campo nombre tiene más de 100 caracteres!');
        event.preventDefault();
        return;
      }
      if (modelo.length > 25) {
        alert('¡El campo modelo tiene más de 25 caracteres!');
        event.preventDefault();
        return;
      }
      if (precio <= 99.99) {
        alert('¡El precio debe ser mayor a 99.99!');
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
  </body>
</html>