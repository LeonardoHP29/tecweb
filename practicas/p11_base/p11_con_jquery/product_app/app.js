// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();
}

//Iniciación con JQuery
$(document).ready(function(){
    console.log('Jquery is working');
    $('#product-result').hide();
    mostrarlista();

    //Busquedad de Producto
    $('#search').keyup(function(e){
        if($('#search').val()){
            
            let search = $('#search').val();
            console.log(search);
            $.ajax({
                url: 'backend/product-search.php', 
                type: 'POST',
                data: { search },
                success: function(response){
                    let productos = JSON.parse(response);
                    let template = '';
                    productos.forEach(producto => {
                        template += `
                            ${producto.nombre}<br>
                        `;
                        console.log(producto.nombre);
                    });
                    $('#container').html(template);
                    $('#product-result').removeClass('d-none');
                }
            });
        }
    })

    //Agregar Producto
    $('#product-form').submit(function(e){
        //Validar datos
        var nombre = $('#name').val();
        var descripcion = $('#description').val();
        var objectJSON = JSON.parse(descripcion);

        if (nombre === '') {
            alert('¡Debes llenar el campo Nombre!');
            e.preventDefault();
            return;
        } else if (objectJSON.marca === '') {
            alert('¡Debes llenar el campo Marca!');
            e.preventDefault();
            return;
        } else if (objectJSON.modelo === '') {
            alert('¡Debes llenar el campo Modelo!');
            e.preventDefault();
            return;
        } else if (isNaN(objectJSON.precio)) {
            alert('¡Debes llenar el campo Precio correctamente!');
            e.preventDefault();
            return;
        }

        if (nombre.length > 100) {
            alert('¡El campo nombre tiene más de 100 caracteres!');
            e.preventDefault();
            return;
        }
        if (objectJSON.modelo.length > 25) {
            alert('¡El campo modelo tiene más de 25 caracteres!');
            e.preventDefault();
            return;
        }
        if (objectJSON.precio <= 99.99) {
            alert('¡El precio debe ser mayor a 99.99!');
            e.preventDefault();
            return;
        }
        if (objectJSON.detalles.length > 250) {
            alert('¡El campo detalles tiene más de 250 caracteres!');
            e.preventDefault();
            return;
        }
        if (isNaN(objectJSON.unidades) || objectJSON.unidades < 0) {
            alert('¡El campo unidades debe ser un número mayor o igual a 0!');
            e.preventDefault();
            return;
        }
        //Enviar datos
        const postData ={
            name: $('#name').val(),
            description: $('#description').val()
        };
        $.post('backend/product-add.php',postData, function(response){
            $('#container').html(response);
            $('#product-result').removeClass('d-none');
            mostrarlista();
            $('#product-form').trigger('reset');
            init();
        })
        e.preventDefault();
    })

    //Mostrar lista
    function mostrarlista(){
        $.ajax({
            url:'backend/product-list.php',
            type: 'GET',
            success: function(response){
                let productos = JSON.parse(response);
                let template = '';
                productos.forEach(producto => {
                    template += `
                        <tr productoID="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td>
                                <ul>
                                    <li>precio: ${producto.precio}</li>
                                    <li>unidades: ${producto.unidades}</li>
                                    <li>modelo: ${producto.modelo}</li>
                                    <li>marca: ${producto.marca}</li>
                                    <li>detalles: ${producto.detalles}</li>
                                </ul>
                            </td>
                            <td>
                                <button class="product-delete btn btn-danger"">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#products').html(template);
                $('#product-result').show();
            }
        })
    }

    //Eliminar producto
    $(document).on('click', '.product-delete', function(){
        if(confirm("De verdad deseas eliminar el Producto")){
            let element = $(this)[0].parentElement.parentElement;
            let id= $(element).attr('productoID');
            $.post('backend/product-delete.php', {id}, function(response){
                $('#container').html(response);
                $('#product-result').removeClass('d-none');
                mostrarlista(); 
            })
        }
    })
});