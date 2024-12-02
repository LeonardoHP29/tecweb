$(document).ready(function(){
    console.log('Aqui comienza JQuery');
    mostrarlista();
    //busquedad
    $('#search').keyup(function(e) {
        if ($('#search').val()) {
            let search = $('#search').val();
            console.log(search);
            $.ajax({
                url: 'backend/area-search.php', 
                type: 'POST',
                data: { search },
                success: function(response) {
                    //console.log(response);
                    let areas = JSON.parse(response);
                    let template = '';
                    areas.forEach(area => {
                        template += `
                            <li id="AreaID">${area.id}</li>
                        `;
                        console.log(area.id);
                    });
                    $('#search-results').html(template);
                }
            });
        } else {
            $('#search-results').html(''); 
        }
    });

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
                        <tr areaID="${area.id}">
                            <td>
                                <a href="#" class="area-item">${area.id}</a>
                            </td>
                            <td class="limitar-texto">${area.ubicacion}</td>
                            <td class="texto2">${area.descripcion}</td>
                            <td>${area.prioridad}</td>
                            <td><img src="${area.imagen}" width="200" height="auto" alt="Imagen del producto"> </td>
                        </tr>
                    `;
                    $('#areas').html(template);
                });
            }
        })
    }
    //Iteraccion con el usuario
    $(document).on('click', '.area-item', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('areaID');
        //console.log(id);
        $.post('backend/area-single.php', { id }, function(response) {
            console.log(response);
            const area = JSON.parse(response);
            $('#area-info').show(); 
            $('#area-info h3').text(`Información del Área: ${area.id}`);
            $('#ubicacion-info').html(`
                <iframe src="${area.ubicacion}" width="600" height="450" style="border:0;" allowfullscreen="" 
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            `);
            $('#imagen-info').html(`<img src="${area.imagen}" width="600px" height="auto" alt="Imagen del área">`);
            $('#descripcion').text(area.descripcion);
            $('#prioridad').text(area.prioridad);
            let prioridad = area.prioridad; 
            
            let prioridadElement = document.getElementById('prioridad');
            prioridadElement.textContent = prioridad; 

            prioridadElement.classList.remove('bajo', 'moderado', 'alto', 'critico');

            if (prioridad === 'bajo') {
                prioridadElement.classList.add('bajo');
            } else if (prioridad === 'moderado') {
                prioridadElement.classList.add('moderado');
            } else if (prioridad === 'alto') {
                prioridadElement.classList.add('alto');
            } else if (prioridad === 'critico') {
                prioridadElement.classList.add('critico');
            }

        });
    });
    $('#search-button').click(function() {
        let id = $('#search').val();
        if (id) {
            $.ajax({
                url: 'backend/area-single.php', 
                type: 'POST',
                data: { id },
                success: function(response) {
                    console.log(response); 
                    const area = JSON.parse(response); 
                    $('#area-info').show(); 
    
                    
                    $('#area-info h3').text(`Información del Área: ${area.id}`);
                    $('#ubicacion-info').html(`
                        <iframe src="${area.ubicacion}" width="600" height="450" style="border:0;" allowfullscreen="" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    `);
                    $('#imagen-info').html(`<img src="${area.imagen}" width="600px" height="auto" alt="Imagen del área">`);
                    $('#descripcion').text(area.descripcion);
                    $('#prioridad').text(area.prioridad);
    
                    let prioridad = area.prioridad; 
                    let prioridadElement = document.getElementById('prioridad');
                    prioridadElement.textContent = prioridad;
    
                    
                    prioridadElement.classList.remove('bajo', 'moderado', 'alto', 'critico');
    
                    if (prioridad === 'bajo') {
                        prioridadElement.classList.add('bajo');
                    } else if (prioridad === 'moderado') {
                        prioridadElement.classList.add('moderado');
                    } else if (prioridad === 'alto') {
                        prioridadElement.classList.add('alto');
                    } else if (prioridad === 'critico') {
                        prioridadElement.classList.add('critico');
                    }
                },
            });
        }
    });
    

});