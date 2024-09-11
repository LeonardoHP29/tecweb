<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <!-- Ejercicio 1 -->
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>
    <?php
        // Variables
        $_myvar;
        $_7var;
        $myvar;
        $var7;
        $_element1;
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dólar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
        // Eliminar variables
        unset($_myvar, $_7var, $myvar, $var7, $_element1);
    ?>
    
    <!-- Ejercicio 2 -->
    <h2>2. Proporcionar los valores de $a, $b, $c como sigue</h2>
    <p>$a = "ManejadorSQL"<br>$b = 'MySQl'<br>$c = &$a</p>
    <?php
        // Código de variables
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;
        echo '<h3>a. Ahora muestra el contenido de cada variable</h3>';
        echo '<ul>';
        echo '<li>La variable $a muestra '.$a.'</li>';
        echo '<li>La variable $b muestra '.$b.'</li>';
        echo '<li>La variable $c muestra '.$c.'</li>';
        echo '</ul>';
        echo '<h3>b. Agrega al código actual las siguientes asignaciones:</h3>';
        echo '<p>$a = "PHP server"<br>$b = &$a</p>';
        
        // Código de variables
        $a = "PHP server";
        $b = &$a;
        echo '<h3>c. Vuelve a mostrar el contenido de cada uno</h3>';
        echo '<ul>';
        echo '<li>La variable $a muestra '.$a.'</li>';
        echo '<li>La variable $b muestra '.$b.'</li>';
        echo '<li>La variable $c muestra '.$c.'</li>';
        echo '</ul>';
        echo '<h3>d. Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones</h3>';
        echo '<h4>Respuesta:</h4>';
        echo '<p>Al momento de dar el segundo bloque de asignaciones se declaró que en la variable $a tuviera la cadena "PHP server", donde después al declarar la variable $b se dice que será igual a lo que contenga la variable $a. Por último, al mostrar las variables $a, $b y $c muestran la cadena PHP server.</p>';
        // Eliminar variables
        unset($a, $b, $c);
    ?>
    
    <!-- Ejercicio 3 -->
    <h2>3. Muestra el contenido de cada variable inmediatamente después de cada asignación, verifica la evolución del tipo de estas variables (imprime todos los componentes del arreglo):</h2>
    <?php
        // Descripción
        echo '<p>$a = "PHP%"</p>';
        echo '<p>$z [] = &$a</p>';
        echo '<p>$b = "5a version de PHP"</p>';
        echo '<p>$c = $b*10</p>';
        echo '<p>$a .= $b;</p>';
        echo '<p>$b *= $c</p>';
        echo '<p>$z[0] = "MySQL"</p>';

        // Variables
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        // $c = $b * 10; // Comentado para preguntar
        $a .= $b; 
        // $b *= $c; // Comentado para preguntar
        $z[0] = "MySQL";

        // Impresión
        echo '<p>Resultados:</p>';
        echo '<ul>';
        echo '<li>El contenido de la variable $a es ';
        print_r($a);
        echo '</li>';
        echo '<li>El contenido de la variable $z es ';
        print_r($z);
        echo '</li>';
        echo '<li>El contenido de la variable $b es ';
        print_r($b);
        echo '</li>';
        // echo '<li>El contenido de la variable $c es ';
        // print_r($c);
        // echo '</li>';
        echo '</ul>';
    ?>
    
    <!-- Ejercicio 4 -->
    <h2>4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP.</h2>
    <?php
        // Función para mostrar las variables usando 'global'
        function mostrarVariables() {
            global $a, $z, $b;
            echo '<p>El valor de las variables globales del ejercicio anterior son las siguientes:</p>';
            echo '<ul>';
            echo '<li>Valor de $a: '.$a.'</li>';
            echo '<li>Valor de $b: '.$b.'</li>';
            // echo '<li>Valor de $c: '.$c.'</li>';
            echo '<li>Valor de $z: ';
            print_r($z);
            echo '</li>';
            echo '</ul>';
        }
        mostrarVariables();
        // Eliminar variables
        unset($a, $b, $z);
    ?>
    
    <!-- Ejercicio 5 -->
    <h2>5. Dar el valor de las variables $a, $b, $c al final del siguiente script:</h2>
    <p>$a = "7 personas"<br>$b = (integer) $a<br>$a="9E3"<br>$c=(double) $a</p>
    <?php
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';
        echo '<li>El valor final de $a es '.$a.'</li>';
        echo '<li>El valor final de $b es '.$b.'</li>';
        echo '<li>El valor final de $c es '.$c.'</li>';
        echo '</ul>';
        // Eliminar variables
        unset($a, $b, $c);
    ?>
    
    <!-- Ejercicio 6 -->
    <h2>6. Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas usando la función var_dump(<datos>).</h2>
    <p>$a = "0"<br>$b = "TRUE"<br>$c = FALSE<br>$d = ($a OR $b)<br>$e = ($a AND $c)<br>$f = ($a XOR $b)</p>
    <?php
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        echo '<ul>';
        echo '<li>El valor de $a es ';
        var_dump($a);
        echo '</li>';
        echo '<li>El valor de $b es ';
        var_dump($b);
        echo '</li>';
        echo '<li>El valor de $c es ';
        var_dump($c);
        echo '</li>';
        echo '<li>El valor de $d es ';
        var_dump($d);
        echo '</li>';
        echo '<li>El valor de $e es ';
        var_dump($e);
        echo '</li>';
        echo '<li>El valor de $f es ';
        var_dump($f);
        echo '</li>';
        echo '</ul>';
        // Transformación
        echo '<p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e en uno que se pueda mostrar con un echo:</p>';
        echo '<h4>Respuesta:</h4>';
        echo "<p>La función que nos permitirá transformar el valor booleano de \$c y \$e es la siguiente:<br>
        \$c_t = (!\$c) ? 'TRUE' : 'FALSE';<br>\$e_t = (!\$e) ? 'TRUE' : 'FALSE';<br></p>";
        $c_t = (!$c) ? 'TRUE' : 'FALSE';
        $e_t = (!$e) ? 'TRUE' : 'FALSE';
        echo '<p>Resultados:</p>';
        echo '<ul>';
        echo '<li>El valor de $c es '.$c_t.'</li>';
        echo '<li>El valor de $e es '.$e_t.'</li>';
        echo '</ul>';
    ?>
    
    <!-- Ejercicio 7 -->
    <h2>7. Usando la variable predefinida $_SERVER, determina lo siguiente:</h2>
    <?php
        // 1 
        echo '<p>a. La versión de Apache y PHP:</p>';
        echo '<h4>Respuesta: </h4>';
        echo '<p>Usando la variable $_SERVER se puede determinar la versión de PHP y Apache con la siguiente sintaxis:<br>';
        echo '$_SERVER["SERVER_SOFTWARE"]<br>';
        echo 'phpversion()</p>';
        echo '<p>Resultados:</p>';
        echo '<ul>';
        echo '<li>La versión de Apache es: '.$_SERVER["SERVER_SOFTWARE"].'</li>';
        echo '<li>La versión de PHP es: '.phpversion().'</li>';
        echo '</ul>';

        // 2
        echo '<p>b. El nombre del sistema operativo (servidor):</p>';
        echo '<h4>Respuesta: </h4>';
        echo '<p>Usando la variable $_SERVER se puede determinar el nombre del sistema operativo con la siguiente sintaxis:<br>';
        echo '$_SERVER["SERVER_OS"]</p>';
        echo '<ul>';
        echo '<li>El nombre del sistema operativo es: '.(isset($_SERVER["SERVER_OS"]) ? $_SERVER["SERVER_OS"] : 'No disponible').'</li>';
        echo '</ul>';

        // 3
        echo '<p>c. El idioma del navegador (cliente):</p>';
        echo '<h4>Respuesta: </h4>';
        echo '<p>Usando la variable $_SERVER se puede determinar el idioma del navegador del cliente con la siguiente sintaxis:<br>';
        echo '$_SERVER["HTTP_ACCEPT_LANGUAGE"]</p>';
        echo '<ul>';
        echo '<li>El idioma del navegador del cliente es: '.(isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? $_SERVER["HTTP_ACCEPT_LANGUAGE"] : 'No disponible').'</li>';
        echo '</ul>';
    ?>
</body>
</html>