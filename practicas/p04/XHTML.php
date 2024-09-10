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
        //Eliminar variables
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
        //Eliminar variables
        unset($a,$b,$c);
    ?>
    <!--Ejercicio 3 -->
    <h2>3. Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):</h2>
    <?php
        //1
        echo '<p>$a = "PHP%"</p>';
        $a="PHP5";
        echo 'El contenido de la variable $a es ';
        print_r($a);
        //2
        echo '<p>$z [] = &$a</p>';
        $z[] = &$a;
        echo 'El contenido de la variable $z es un ';
        print_r($z);
        //3
        echo '<p>$b = "5a version de PHP"</p>';
        $b = "5a version de PHP";
        echo 'El contenido de la variable $b es ';
        print_r($b);
        /*
        Preguntar
        //4
        echo '<p>$c = $b*10</p>';
        $c = $b*10;
        echo 'El contenido de la variable $c es ';
        print_r($c);
        */
        //5
        echo '<p>$a .= $b;</p>';
        $a .= $b; 
        echo 'El contenido de la variable $a es ';
        print_r($a);
        /*
        Preguntar
        //6
        echo '<p>$b *= $c</p>';
        $b *= $c
        echo 'El contenido de la variable $b es ';
        print_r($b);
        */
        //7
        echo '<p>$z[0] = "MySQL"</p>';
        $z[0] = "MySQL";
        echo 'El contenido de la variable $z es ';
        print_r($z);
    ?>
    <!--Ejercicio 4 -->
    <h2>4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz $GLOBALS o del modificador global de PHP.</h2>
    <?php
        // Función para mostrar las variables usando 'global'
        function mostrarVariables() {
            global $a, $z, $b;
            echo 'Valor de $a: '.$a.'<br>';
            echo 'Valor de $b: '.$b.'<br>';
            //echo 'Valor de \$c: '.$c.'<br>';
            echo 'Valor de $z: ';
            print_r($z);
        }
        mostrarVariables();
        //Eliminar Variables
        unset($a,$b,$z);
    ?>
    <!--Ejercicio 5 -->
    <h2>5. Dar el valor de las variables $a, $b, $c al final del siguiente script:</h2>
    <p>$a = "7 personas"<br>$b = (integer) $a<br>$a="9E3"<br>$c=(double) $a</p>
    <?php
        $a = "7 personas";
        $b= (integer) $a;
        $a = "9E3";
        $c =(double) $a;
        echo '<h4>Respuesta:</h4>';
        echo 'El valor final de $a es '.$a.'<br>';
        echo 'El valor final de $b es '.$b.'<br>';
        echo 'El valor final de $c es '.$c.'<br>';
        unset($a,$b,$c);
    ?>
    <!--Ejercicio 6 -->
    <h2>6. Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función var_dump(<datos>).</h2>
    <p>$a = "0"<br>$b = "TRUE"<br>$c = FALSE<br>$d = ($a OR $b)<br>$e = ($a AND $c)<br>$f = ($a XOR $b)</p>
    <?php
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo 'El valor de $a es ';
        var_dump($a);
        echo '<br>';
        echo 'El valor de $b es ';
        var_dump($b);
        echo '<br>';
        echo 'El valor de $c es ';
        var_dump($c);
        echo '<br>';
        echo 'El valor de $d es ';
        var_dump($d);
        echo '<br>';
        echo 'El valor de $e es ';
        var_dump($e);
        echo '<br>';
        echo 'El valor de $f es ';
        var_dump($f);
        echo '<br>';
        //transformaciom
        echo '<p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
        en uno que se pueda mostrar con un echo:</p>';
        echo '<h4>Respuesta:</h4>';
        echo "La función que nos permitirá transformar el valor booleano de \$c y \$e es la siguiente:<br>
        \$c_t = (!\$c) ? 'TRUE' : 'FALSE';<br>\$e_t = (!\$e) ? 'TRUE' : 'FALSE';<br>";
        $c_t = (!$c) ? 'TRUE' : 'FALSE';
        $e_t = (!$e) ? 'TRUE' : 'FALSE';
        echo 'El valor de $c es '.$c_t.'<br>';
        echo 'El valor de $e es '.$e_t.'<br>';
    ?>
</body>
</html>