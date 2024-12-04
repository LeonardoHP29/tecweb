//Iniciacion con JQuery
$(document).ready(function(){
    console.log('Aqui comienza JQuery');
    mostrarlista();
    //Mostrar Lista
    function mostrarlista(){
        $.ajax({
            url:'backend/area-list.php',
            type: 'GET',
            success: function(response){
                //console.log(response);
                let areas = JSON.parse(response);
                let template = '';
                areas.forEach(area => {
                    template += `
                        <tr>
                            <td>${area.id}</td>
                            <td class="limitar-texto">${area.ubicacion}</td>
                            <td class="texto2">${area.descripcion}</td>
                            <td>${area.prioridad}</td>
                            <td>${area.porcentaje}</td>
                            <td><img src="${area.imagen}" width="200" height="auto" alt="Imagen del producto" </td>
                            <td>
                                <button class="area-edit btn btn-primary"">
                                    Modificar
                                </button>
                            </td>
                            <td>
                                <button class="area-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                    $('#areas').html(template);
                });
            }
        })
    }
    //Checar Nombre
    $('#identificador').on('input', function () {
        let id = $(this).val();
        console.log(id);
        if (id.length > 0) {
            $.ajax({
                url: 'backend/area-check-id.php',
                type: 'POST',
                data: { id: id },
                dataType: 'json', // Asegura que la respuesta se espera en formato JSON
                success: function (response) {
                    console.log(response); // Depura la respuesta completa
                    if (response && response.resultado) {
                        const statusBar = $('#IdStatus'); 
                        statusBar.removeClass('d-none red green yellow');
                        if (response.resultado === 'existe') {
                            $('#identificador').next('small').remove();
                            $('#identificador').after('<small style="color: white;">El identificador de la area ya existe.</small>');
                            statusBar.addClass('red');
                        } else {
                            $('#identificador').next('small').remove();
                            $('#identificador').after('<small style="color: white;">El identificador de la area esta disponible.</small>');
                            statusBar.addClass('green');
                        }
                    } else {
                        console.error('Respuesta inesperada:', response);
                    }
                },

            });
        } else {
            $('#identificador').next('small').remove();
        }
    });
    //Validaciones del formulario
    $('#identificador').on('input blur', function() {
        const id = $(this).val();
        const statusBar = $('#IdStatus'); 
        statusBar.removeClass('d-none red green yellow');
        $('#identificador').next('small').remove();
        if (id === '') {
            $('#identificador').after('<small style="color: white;">¡Debes llenar el campo Id!</small>');
            statusBar.addClass('red'); 
        } else if(id.length >= 100){
            $('#identificador').after('<small style="color: white;">¡El Id supera los 100 caracteres!</small>');
            statusBar.addClass('yellow'); 
        }else {
            statusBar.addClass('green');
            console.log("Estado: green");
        }
    });
    $('#ubicacionText').on('input blur', function() {
        const ubicacion = $(this).val();
        const statusBar = $('#UbicacionStatus'); 
        statusBar.removeClass('d-none red green yellow');
        $('#ubicacionText').next('small').remove();
        if (ubicacion === '') {
            $('#ubicacionText').after('<small style="color: white;">¡Debes llenar el campo Ubicacion!</small>');
            statusBar.addClass('red'); 
        } else if(ubicacion.length >= 400){
            $('#ubicacionText').after('<small style="color: white;">¡La ubicacion supera los 150 caracteres!</small>');
            statusBar.addClass('yellow'); 
        }else {
            statusBar.addClass('green');
            console.log("Estado: green");
        }
    });
    $('#descripcion').on('input blur', function() {
        const descripcion = $(this).val();
        const statusBar = $('#detallesStatus'); 
        statusBar.removeClass('d-none red green yellow');
        $('#descripcion').next('small').remove();
        if (descripcion === '') {
            $('#descripcion').after('<small style="color: white;">¡Debes llenar el campo Descripcion!</small>');
            statusBar.addClass('red'); 
        } else if(descripcion.length >= 1200){
            $('#descripcion').after('<small style="color: white;">¡La descripcion supera los 250 caracteres!</small>');
            statusBar.addClass('yellow'); 
        }else {
            statusBar.addClass('green');
            console.log("Estado: green");
        }
    });
    $('#Porcentaje').on('input blur', function() {
        const porcentaje = $(this).val();
        const statusBar = $('#PorcentajeStatus'); 
        statusBar.removeClass('d-none red green yellow');
        $('#Porcentaje').next('small').remove();
        const porcentajeValue = parseFloat(porcentaje.replace('%', '').trim());
        if (porcentaje === '') {
            $('#Porcentaje').after('<small style="color: white;">¡Debes llenar el campo Porcentaje!</small>');
            statusBar.addClass('red'); 
        } else if(porcentajeValue >= 100.00){
            $('#Porcentaje').after('<small style="color: white;">¡El porcentaje debe ser menor a 101% !</small>');
            statusBar.addClass('yellow'); 
        }else {
            statusBar.addClass('green');
            console.log("Estado: green");
        }
    });
    $('#Imagen').on('input blur', function() {
        const imagen = $(this).val();
        const statusBar = $('#imagenStatus'); 
        statusBar.removeClass('d-none red green yellow');
        $('#Imagen').next('small').remove();
        if (imagen === '') {
            $('#Imagen').after('<small style="color: white;">¡Debes llenar el campo Imagen!</small>');
            statusBar.addClass('red'); 
        } else if(imagen.length >= 100){
            $('#Imagen').after('<small style="color: white;">¡La imagen supera los 100 caracteres!</small>');
            statusBar.addClass('yellow'); 
        }else {
            statusBar.addClass('green');
            console.log("Estado: green");
        }
    });
    $('.formulario-reset').click(function() {
        $('#identificador').next('small').remove();
        $('#IdStatus').removeClass('d-none red green yellow');
        
        $('#ubicacionText').next('small').remove();
        $('#UbicacionStatus').removeClass('d-none red green yellow');
        
        $('#descripcion').next('small').remove();
        $('#detallesStatus').removeClass('d-none red green yellow');

        $('#Porcentaje').next('small').remove();
        $('#PorcentajeStatus').removeClass('d-none red green yellow');
        
        $('#Imagen').next('small').remove();
        $('#imagenStatus').removeClass('d-none red green yellow');
    
        $('#form-registro-area').trigger('reset');
    });
    
    

    // Agregar Area
    $('#form-registro-area').submit(function(e){
        e.preventDefault();
        var id = $('#identificador').val();
        var ubicacion = $('#ubicacionText').val();
        var descripcion = $('#descripcion').val();
        var prioridad = $('#Nprioridad').val();
        var porcentaje = $('#Porcentaje').val(); 
        var imagen = $('#Imagen').val(); 
        if (id === '' || ubicacion === '' || descripcion === '' || prioridad === '' ||imagen === ''|| porcentaje==='') {
            alert('¡Debes llenar todos los campos del formulario!');
            e.preventDefault();
            return;
        }
        const porcentajeValue = parseFloat(porcentaje.replace('%', '').trim());
        // Enviar datos
        const postData = {
            Id: $('#identificador').val(),
            Ubicacion: $('#ubicacionText').val(),
            Descripcion: $('#descripcion').val(),
            Prioridad: $('#Nprioridad').val(),
            Porcentaje: porcentajeValue, 
            Imagen: $('#Imagen').val()
        };
        //console.log(postData);
        let Url = "backend/area-add.php";
        $.post(Url, postData, function(response) {
            console.log(response);
            let result = JSON.parse(response);
            alert(result.message);
            $('#form-registro-area').trigger('reset');
            $('#identificador').next('small').remove();
            $('#IdStatus').removeClass('d-none red green yellow');
            $('#ubicacionText').next('small').remove();
            $('#UbicacionStatus').removeClass('d-none red green yellow');
            $('#descripcion').next('small').remove();
            $('#detallesStatus').removeClass('d-none red green yellow');
            $('#Porcentaje').next('small').remove();
            $('#PorcentajeStatus').removeClass('d-none red green yellow');
            $('#Imagen').next('small').remove();
            $('#imagenStatus').removeClass('d-none red green yellow');
        
        });

    });

    //Obtener Area
    $(document).on('click', '.area-edit', function(){
        const row = $(this).closest('tr');
        const id = row.find('td:first').text().trim();
        const ubicacion = row.find('td:nth-child(2)').text().trim();
        const descripcion = row.find('td:nth-child(3)').text().trim();
        const prioridad = row.find('td:nth-child(4)').text().trim();
        const porcentaje = row.find('td:nth-child(5)').text().trim();
        const imagen = row.find('td:nth-child(6)').find('img').attr('src').trim();
        window.location.href = `ActualizarArea.html?id=${id}&ubicacion=${encodeURIComponent(ubicacion)}&descripcion=${encodeURIComponent(descripcion)}&prioridad=${encodeURIComponent(prioridad)}&porcentaje=${encodeURIComponent(porcentaje)}&imagen=${encodeURIComponent(imagen)}`;
    });
    const urlParams = new URLSearchParams(window.location.search);

    const id = urlParams.get('id');
    const ubicacion = urlParams.get('ubicacion');
    const descripcion = urlParams.get('descripcion');
    const prioridad = urlParams.get('prioridad');
    const porcentaje = urlParams.get('porcentaje');
    const imagen = urlParams.get('imagen');
    let previo={
        id,ubicacion,descripcion,prioridad, porcentaje, imagen
    }

    if (id) {
        $('#identificador2').val(id);
        $('#ubicacionText2').val(ubicacion);
        $('#descripcion2').val(descripcion);
        if (["bajo", "moderado", "alto", "critico"].includes(prioridad)) {
            $('#Nprioridad2').val(prioridad);
        }
        $('#Porcentaje2').val(porcentaje);
        $('#Imagen2').val(imagen);
    }

    //Actualizar Area
        //Validaciones del formulario
        $('#identificador2').on('input blur', function() {
            const id = $(this).val();
            const statusBar = $('#IdStatus'); 
            statusBar.removeClass('d-none red green yellow');
            $('#identificador2').next('small').remove();
            if (id === '') {
                $('#identificador2').after('<small style="color: white;">¡Debes llenar el campo Id!</small>');
                statusBar.addClass('red'); 
            } else if(id.length >= 100){
                $('#identificador2').after('<small style="color: white;">¡El Id supera los 100 caracteres!</small>');
                statusBar.addClass('yellow'); 
            }else {
                statusBar.addClass('green');
                console.log("Estado: green");
            }
        });
        $('#ubicacionText2').on('input blur', function() {
            const ubicacion = $(this).val();
            const statusBar = $('#UbicacionStatus'); 
            statusBar.removeClass('d-none red green yellow');
            $('#ubicacionText2').next('small').remove();
            if (ubicacion === '') {
                $('#ubicacionText2').after('<small style="color: white;">¡Debes llenar el campo Ubicacion!</small>');
                statusBar.addClass('red'); 
            } else if(ubicacion.length >= 400){
                $('#ubicacionText2').after('<small style="color: white;">¡La ubicacion supera los 400 caracteres!</small>');
                statusBar.addClass('yellow'); 
            }else {
                statusBar.addClass('green');
                console.log("Estado: green");
            }
        });
        $('#descripcion2').on('input blur', function() {
            const descripcion = $(this).val();
            const statusBar = $('#detallesStatus'); 
            statusBar.removeClass('d-none red green yellow');
            $('#descripcion2').next('small').remove();
            if (descripcion === '') {
                $('#descripcion2').after('<small style="color: white;">¡Debes llenar el campo Descripcion!</small>');
                statusBar.addClass('red'); 
            } else if(descripcion.length >= 1200){
                $('#descripcion2').after('<small style="color: white;">¡La descripcion supera los 250 caracteres!</small>');
                statusBar.addClass('yellow'); 
            }else {
                statusBar.addClass('green');
                console.log("Estado: green");
            }
        });
        $('#Porcentaje2').on('input blur', function() {
            const porcentaje = $(this).val();
            const statusBar = $('#PorcentajeStatus'); 
            statusBar.removeClass('d-none red green yellow');
            $('#Porcentaje2').next('small').remove();
            const porcentajeValue = parseFloat(porcentaje.replace('%', '').trim());
            if (porcentaje === '') {
                $('#Porcentaje2').after('<small style="color: white;">¡Debes llenar el campo Porcentaje!</small>');
                statusBar.addClass('red'); 
            } else if(porcentajeValue >= 100.00){
                $('#Porcentaje2').after('<small style="color: white;">¡El porcentaje debe ser menor a 101% !</small>');
                statusBar.addClass('yellow'); 
            }else {
                statusBar.addClass('green');
                console.log("Estado: green");
            }
        });
        $('#Imagen2').on('input blur', function() {
            const imagen = $(this).val();
            const statusBar = $('#imagenStatus'); 
            statusBar.removeClass('d-none red green yellow');
            $('#Imagen2').next('small').remove();
            if (imagen === '') {
                $('#Imagen2').after('<small style="color: white;">¡Debes llenar el campo Imagen!</small>');
                statusBar.addClass('red'); 
            } else if(imagen.length >= 100){
                $('#Imagen2').after('<small style="color: white;">¡La imagen supera los 100 caracteres!</small>');
                statusBar.addClass('yellow'); 
            }else {
                statusBar.addClass('green');
                console.log("Estado: green");
            }
        });
        $('.formulario-reset2').click(function() {
            // Restaurar los valores previos
            $('#identificador2').val(previo.id);
            $('#ubicacionText2').val(previo.ubicacion);
            $('#descripcion2').val(previo.descripcion);
            $('#Porcentaje2').val(previo.porcentaje);
            $('#Imagen2').val(previo.imagen);
        
            // Restaurar el valor de la prioridad
            if (["bajo", "moderado", "alto", "critico"].includes(previo.prioridad)) {
                $('#Nprioridad2').val(previo.prioridad);
            } else {
                $('#Nprioridad2').val(''); // O asigna un valor por defecto si no está en la lista
            }
        
            // Limpiar los mensajes de error y las clases de estado
            $('#identificador2').next('small').remove();
            $('#IdStatus').removeClass('d-none red green yellow');
            
            $('#ubicacionText2').next('small').remove();
            $('#UbicacionStatus').removeClass('d-none red green yellow');
            
            $('#descripcion2').next('small').remove();
            $('#detallesStatus').removeClass('d-none red green yellow');
        
            $('#Porcentaje2').next('small').remove();
            $('#PorcentajeStatus').removeClass('d-none red green yellow');
            
            $('#Imagen2').next('small').remove();
            $('#imagenStatus').removeClass('d-none red green yellow');
        });

        $('#form-modificar-area').submit(function(e){
            e.preventDefault();
            var id = $('#identificador2').val();
            var ubicacion = $('#ubicacionText2').val();
            var descripcion = $('#descripcion2').val();
            var prioridad = $('#Nprioridad2').val(); 
            var porcentaje =$('#Porcentaje2').val();
            var imagen = $('#Imagen2').val(); 
            if (id === '' || ubicacion === '' || descripcion === '' || prioridad === '' ||imagen === ''||porcentaje==='') {
                alert('¡Debes llenar todos los campos del formulario!');
                e.preventDefault();
                return;
            }
            const porcentajeValue = parseFloat(porcentaje.replace('%', '').trim());
            // Enviar datos
            const postData = {
                Id: $('#identificador2').val(),
                Ubicacion: $('#ubicacionText2').val(),
                Descripcion: $('#descripcion2').val(),
                Prioridad: $('#Nprioridad2').val(), 
                Porcentaje:porcentajeValue,
                Imagen: $('#Imagen2').val()
            };

            console.log(postData);
            let Url = "backend/area-update.php";
            $.post(Url, postData, function(response) {
                console.log(response);
                let result = JSON.parse(response);
                alert(result.message);
                $('#form-modificar-area').trigger('reset');
                $('#form-modificar-area').trigger('reset');
                window.location.href = "https://localhost/tecweb/Proyecto_TW/Analista/Monitoreo.html"; 
            });
    
        });
        //Eliminar Area
        $(document).on('click', '.area-delete', function (e) {
            e.preventDefault(); 
        
            if (confirm('¿Realmente deseas eliminar el producto?')) {
                const row = $(this).closest('tr');
                const id = row.find('td:first').text().trim(); 
                console.log('ID:', id);
                $.post('./backend/area-delete.php', { id }, (response) => {
                    console.log(response); 
                    const data = response;
                    alert(data.message);
                    mostrarlista(); 
                });
            }
        });
        //Graficas
        
});