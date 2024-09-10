<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <!--Ejercicio 1 -->
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //Variables 
        $_myvar;
        $_7var;
        $myvar;
        $var7;
        $_element1;
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
        unset($_myvar,$_7var,$myvar,$var7,$_element1);
    ?>
    <!--Ejercicio 2 -->
    <h2>2. Proporcionar los valores de $a, $b, $c como sigue</h2>
    <p>$a = "ManejadorSQL"<br>$b = 'MySQl'<br>$c = &$a</p>
    <?php
    //codigo de variables
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo '<h3>';
    echo "a. Ahora muestra el contenido de cada variable";
    echo '</h3>';
    echo 'La variable $a muestra '.$a.'<br>';
    echo 'La variable $b muestra '.$b.'<br>';
    echo 'La variable $c muestra '.$c.'<br>';
    echo '<h3>';
    echo "b. Agrega al código actual las siguientes asignaciones:";
    echo '</h3>';
    echo '<p>';
    echo '$a = "PHP server"<br>$b = &$a';
    echo '</p>';
    //Codigo de variables
    $a = "PHP server";
    $b = &$a;
    echo '<h3>';
    echo "c. Vuelve a mostrar el contenido de cada uno";
    echo '</h3>';
    echo 'La variable $a muestra '.$a.'<br>';
    echo 'La variable $b muestra '.$b.'<br>';
    echo 'La variable $c muestra '.$c.'<br>';
    echo '<h3>';
    echo "d. Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones";
    echo '</h3>';
    echo '<h4>Respuesta:</h4>';
    echo 'Al momento de dar el segundo bloque de asignaciones se declaro que en la variable $a tuviera la cadena "PHP server",
     donde despues al declara la variable $b se dice que sera igual a lo que contenga en la variable $a,por ultimo al momento 
     de mostrar las variables $a,$b,$c muestran la cadena PHP server';
    ?>
</body>
</html>