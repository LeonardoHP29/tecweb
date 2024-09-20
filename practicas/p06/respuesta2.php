<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Practica 6</title>
    </head>
    <?php
        
    ?>
    <body>
    <?php
    echo "<h2 style='text-align:center';>Respuesta del Formulario 2</h2>";
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['consultar'])) {
                $matricula = $_POST['matricula'];
                if (isset($Parque_Vehicular[$matricula])) {
                    $vehiculo = $Parque_Vehicular[$matricula];
                    echo "<h2>Información del Auto</h2>";
                    echo "<p><strong>Matrícula:</strong> $matricula</p>";
                    echo "<p><strong>Marca:</strong> {$vehiculo['Auto']['marca']}</p>";
                    echo "<p><strong>Modelo:</strong> {$vehiculo['Auto']['modelo']}</p>";
                    echo "<p><strong>Tipo:</strong> {$vehiculo['Auto']['tipo']}</p>";
                    echo "<p><strong>Propietario:</strong> {$vehiculo['Propietario']['nombre']}</p>";
                } else {
                    echo "<p>Matrícula no encontrada.</p>";
                }
            }

            if (isset($_POST['mostrar_todos'])) {
                echo "<h2>Todos los Autos Registrados</h2>";
                foreach ($Parque_Vehicular as $matricula => $vehiculo) {
                    echo "<p><strong>Matrícula:</strong> $matricula | ";
                    echo "<strong>Marca:</strong> {$vehiculo['Auto']['marca']} | ";
                    echo "<strong>Modelo:</strong> {$vehiculo['Auto']['modelo']} | ";
                    echo "<strong>Tipo:</strong> {$vehiculo['Auto']['tipo']} | ";
                    echo "<strong>Propietario:</strong> {$vehiculo['Propietario']['nombre']}</p>";
                }
            }
        }
    ?>
    </body>
</html>