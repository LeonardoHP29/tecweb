<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 6</title>
    <style type="text/css">
        ol, ul { 
      list-style-type: none;
        }
    </style>
</head>
<body>
    <!--Descripcion del Ejercicio 6-->
    <h2>Ejercicio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
    una ciudad. Cada vehículo debe ser identificado por:</p>
    <ul>
        <li>• Matricula.</li>
        <li>• Auto
            <ul>
                <li>o Marca</li>
                <li>o Modelo (año)</li>
                <li>o Tipo (sedan|hachback|camioneta)</li>
            </ul>
        </li>
        <li>• Propietario
            <ul>
                <li>o Nombre</li>
                <li>o Ciudad</li>
                <li>o Dirección</li>
            </ul>
        </li>
    </ul>
    <p>La matrícula debe tener el siguiente formato LLLNNNN, donde las L pueden ser letras de
    la A-Z y las N pueden ser números de 0-9.</p>
    <p>Para hacer esto toma en cuenta las siguientes instrucciones:</p>
    <ul>
        <li>✓ Crea en código duro el registro para 15 autos</li>
        <li>✓ Utiliza un único arreglo, cuya clave de cada registro sea la matricula</li>
        <li>✓ Lógicamente la matricula no se puede repetir.</li>
        <li>✓ Los datos del Auto deben ir dentro de un arreglo.</li>
        <li>✓ Los datos del Propietario deben ir dentro de un arreglo.</li>
    </ul>
    <!--Codigo php-->
    <?php
        $Parque_Vehicular= array(
            //1 regristo
            'ABC1234'=> array(
                'Auto'=> array(
                    'marca' => 'Toyota',
                    'modelo' => '2021',
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Damian Cocone',
                    'ciudad' => 'Guadalajara, Jalisco',
                    'direccion' => 'Av. Juárez 123'
                )
            ),
            //2 regristo
            'DEF5678' => array(
                'Auto'=> array(
                    'marca' => 'Chevrolet',
                    'modelo' => '2011',
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Ignacio Flores',
                    'ciudad' => 'Puebla, Puebla',
                    'direccion' => 'Av. 5 de Mayo 123'
                )
            ),
            //3 regristo
            'GHI9012' => array(
                'Auto'=> array(
                    'marca' => 'Audi',
                    'modelo' => '2019',
                    'tipo' => 'hachback'
                ),
                'Propietario' => array(
                    'nombre' => 'Michell Leon',
                    'ciudad' => 'Puebla, Puebla',
                    'direccion' => 'Av. 16 de Septiembre 12'
                )
            ),
            //4 regristo
            'JKL3456' => array(
                'Auto'=> array(
                    'marca' => 'Ford',
                    'modelo' => '2016',
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Rivaldo Mendez',
                    'ciudad' => 'Puebla, Cholula',
                    'direccion' => 'Calle Reforma 456'
                )
            ),
            //5 regristo
            'MNP7890' => array(
                'Auto'=> array(
                    'marca' => 'Volkswagen',
                    'modelo' => '2018',
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Erwin Gonzalez',
                    'ciudad' => 'Puebla, Cholula',
                    'direccion' => 'Avenida Morales 54'
                )
            ),
            //6 regristo
            'QRS1234' => array(
                'Auto'=> array(
                    'marca' => 'Audi',
                    'modelo' => '2023',
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Leonardo Hernandez',
                    'ciudad' => 'Puebla, Nopalucan',
                    'direccion' => 'Avenida Juan de la Granja 105'
                )
            ),
            //7 regristo
            'TUV5678' => array(
                'Auto'=> array(
                    'marca' => 'Audi',
                    'modelo' => '2020',
                    'tipo' => 'hachback'
                ),
                'Propietario' => array(
                    'nombre' => 'Karina Mendez',
                    'ciudad' => 'Chiapas, San Cristóbal',
                    'direccion' => 'Avenida Juan de la Granja 105'
                )
            ),
            //8 regristo
            'WXY9012' => array(
                'Auto'=> array(
                    'marca' => 'Volkswagen',
                    'modelo' => '2024',
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Angel Garcia',
                    'ciudad' => 'Tabasco, Villa Hermosa',
                    'direccion' => 'Calle Villa Hernosa 104'
                )
            ),
            //9 regristo
            'ZAB3456' => array(
                'Auto'=> array(
                    'marca' => 'Audi',
                    'modelo' => '2018',
                    'tipo' => 'sedan'
                ),
                'Propietario' => array(
                    'nombre' => 'Henoch Gonzalez',
                    'ciudad' => 'Puebla, Amozoc',
                    'direccion' => 'Calle Amozoc 43'
                )
            ),
            //10 regristo
            'CDE7890' => array(
                'Auto'=> array(
                    'marca' => 'Volkswagen',
                    'modelo' => '2020',
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Diego Ortega',
                    'ciudad' => 'Puebla, Tepetzala',
                    'direccion' => 'Calle Tepetzala 41'
                )
            ),
            //11 regristo
            'FGH1234' => array(
                'Auto'=> array(
                    'marca' => 'Chevrolet',
                    'modelo' => '2016',
                    'tipo' => 'hachback'
                ),
                'Propietario' => array(
                    'nombre' => 'Lizeth Torres',
                    'ciudad' => 'Puebla, Grajales',
                    'direccion' => 'Calle Grajales 12'
                )
            ),
            //12 regristo
            'IJK5678' => array(
                'Auto'=> array(
                    'marca' => 'Chevrolet',
                    'modelo' => '2021',
                    'tipo' => 'hachback'
                ),
                'Propietario' => array(
                    'nombre' => 'Carlos Mendez',
                    'ciudad' => 'Puebla, Puebla',
                    'direccion' => 'Calle 5 de Mayo 67'
                )
            ),
            //13 regristo
            'LMN9012' => array(
                'Auto'=> array(
                    'marca' => 'Audi',
                    'modelo' => '2020',
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Angel Aguilar',
                    'ciudad' => 'Puebla, Puebla',
                    'direccion' => 'Calle 16 de Septiembre 6'
                )
            ),
            //14 regristo
            'OPQ3456' => array(
                'Auto'=> array(
                    'marca' => 'Volkswagen',
                    'modelo' => '2024',
                    'tipo' => 'camioneta'
                ),
                'Propietario' => array(
                    'nombre' => 'Yaretzi Palestina',
                    'ciudad' => 'Puebla, Nopalucan',
                    'direccion' => 'Barrio de san Antonio 43'
                )
            ),
            //15 regristo
            'RST7890' => array(
                'Auto'=> array(
                    'marca' => 'Volkswagen',
                    'modelo' => '2017',
                    'tipo' => 'hachback'
                ),
                'Propietario' => array(
                    'nombre' => 'Hector Mendoza',
                    'ciudad' => 'Puebla, Puebla',
                    'direccion' => 'Las Margaritas 43'
                )
            )
        );
    ?>
    <b>Solucion:</b>
    <?php
        echo "Usa print_r para mostrar la estructura general del arreglo:";
        var_dump($Parque_Vehicular);
    ?>
    <!--Formulario-->
    <p>Finalmente crea un formulario simple donde puedas consultar la información:</p>
    <ul>
        <li>• Por matricula de auto.</li>
        <li>• De todos los autos registrados.</li>
    </ul>
    <b>Solucion:</b>
    <h3 style="text-align:center;">FORMULARIO DE CONSULTAR VEHICULAR</h3>
    <form action="respuesta2.php" method="post">
        <fieldset>
            <fieldset>
                <legend>Consultar auto Registrado</legend>
                <p>Ingresar la matricula: <input type="text" name="matricula" required pattern="[A-Z]{3}[0-9]{4}">
                </p>
                <input type="submit" value="Consultar" name="consultar">
            </fieldset>
            <br>
            <fieldset>
                <legend>Consultar todos los autos registrados:</legend>
                <input type="hidden" name="todos" value="1">
                <input type="submit" value="Mostrar Todos los Autos" name="mostrar_todos">
            </fieldset>
        </fieldset>
    </form>
</body>
</html>