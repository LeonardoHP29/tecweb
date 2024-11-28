<?php
libxml_use_internal_errors(true);
$xml = new DOMDocument();
$documento = file_get_contents('catalogovodN.xml');
$xml->loadXML($documento, LIBXML_NOBLANKS);
$xsd = 'catalogovodN.xsd';
if (!$xml->schemaValidate($xsd)) {
    $errors = libxml_get_errors();
    $lista = '';
    echo '<html>';
    echo '<head>
        <meta charset="UTF-8"/>
        <title>Errores del Catálogo VOD</title>
    </head>';
    echo '<body>';
    echo '<h1>Errores del Archivo catalogovodN.xml</h1>';
    echo '<ol>';
    foreach ($errors as $error) {
        echo '<li>'. $error->message . '</li>';
    }
    echo '</ol>';
    echo '</body>';
    echo '</html>';
} else {
    //obtener datos
    $contenido = $xml->getElementsByTagName('contenido')->item(0);
    $peliculas = $contenido->getElementsByTagName('peliculas');
    $series = $contenido->getElementsByTagName('series');
    //formato html
    echo '<html>';
    echo '<head>
        <meta charset="UTF-8"/>
        <title>Catálogo VOD</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f9f9f9;
            }

            header img {
                width: 200px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                background-color: #fff;
                border: 1px solid #ccc;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            th, td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }

            th {
                background-color: #0073e6;
                color: #fff;
                font-weight: bold;
                text-transform: uppercase;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2; 
            }

            tr:hover {
                background-color: #eaf4ff;
            }

            h1, h2 {
                color: #333;
            }

            footer {
                text-align: center;
                margin-top: 20px;
                color: #666;
                font-size: 0.9em;
            }
        </style>
    </head>';
    echo '<body>';
    echo '<h1>Catálogo de Videos</h1>';
    echo '<h2>Películas</h2>';
    echo '<table>';
    echo '<thead>';
    echo '<tr>
            <th>Título</th>
            <th>Duración</th>
            <th>Género</th>
        </tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($peliculas as $pelicula){
        $generos = $pelicula->getElementsByTagName('genero');
        foreach($generos as $genero){
            $nombreGenero = $genero->getAttribute('nombre');
            $titulos = $genero->getElementsByTagName('titulo');
            foreach ($titulos as $titulo){
                $duracion = $titulo->getAttribute('duracion');
                $nombreTitulo = $titulo->nodeValue;
                echo '<tr>';
                echo '<td>' . $nombreTitulo . '</td>';
                echo '<td>' . $duracion . '</td>';
                echo '<td>' . $nombreGenero . '</td>';
                echo '</tr>';
            }
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '<h2>Series</h2>';
    echo '<table>';
    echo '<thead>';
    echo '<tr>
            <th>Título</th>
            <th>Duración</th>
            <th>Género</th>
        </tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($series as $serie){
        $generos = $serie->getElementsByTagName('genero');
        foreach($generos as $genero){
            $nombreGenero = $genero->getAttribute('nombre');
            $titulos = $genero->getElementsByTagName('titulo');
            foreach ($titulos as $titulo){
                $duracion = $titulo->getAttribute('duracion');
                $nombreTitulo = $titulo->nodeValue;
                echo '<tr>';
                echo '<td>' . $nombreTitulo . '</td>';
                echo '<td>' . $duracion . '</td>';
                echo '<td>' . $nombreGenero . '</td>';
                echo '</tr>';
            }
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</body>';
    echo '</html>';
}
?>
