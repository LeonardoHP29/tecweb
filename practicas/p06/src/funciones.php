<!--Solucion del Ejercicio 1-->
<?php
    function numero(){
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0){
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else{
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    }
?>

<!--Solucion del Ejercicio 2-->
<?php
function secuencia() {
    $matriz = [];
    $iter = 0;
    $secuencia = false;

    while (!$secuencia) {
        $iter++;
        $fila = [];
        
        //numeros aleatorios
        for ($i = 0; $i < 3; $i++) {
            $fila[] = rand(1, 999);
        }
        if ($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0) {
            $secuencia = true;
        }
        $matriz[] = $fila;
    }
    //Mostrar
    echo "<h2>Solucion:</h2>";
    foreach ($matriz as $fila) {
        echo implode(", ", $fila)."<br>";
    }
    $numeros_generados = $iter*3;
    echo "<h3>$numeros_generados números obtenidos en $iter iteraciones.</h3>";
    }
?>
<!--Solucion del Ejercicio 3-->
<?php
    function ciclo_while(){
        echo "<h4>1. Este es el resultado utilizando el ciclo while:</h4>";
        if (isset($_GET['n'])) {
            $n = (int)$_GET['n'];

            function multiplo($n) {
                $numero_aleatorio = rand(1, 100); 
                while ($numero_aleatorio % $n != 0) { 
                    $numero_aleatorio = rand(1, 100); 
                }
                return $numero_aleatorio;
            }
            echo '<p>Primer múltiplo de '.$n.' encontrado: '.multiplo($n).'</p>';
        }
    }

    function ciclo_dowhile(){
        echo "<h4>2. Este es el resultado utilizando el ciclo do while:</h4>";
        if (isset($_GET['n'])) {
            $n = (int)$_GET['n'];

            function multiplo2($n) {
                do {
                    $numero_aleatorio2 = rand(1, 100);
                } while ($numero_aleatorio2 % $n != 0);
        
                return $numero_aleatorio2;
            }
            echo '<p>Primer múltiplo de '.$n.' encontrado: '.multiplo2($n).'</p>';
        }
    }
?>
<!--Solucion del Ejercicio 4-->
<?php
    function matriz(){
        echo "<h4>Tabla de Abecedario de ASCII</h4>";
        $matriz = array();

        for($i=97;$i<=122;$i++){
            $matriz[$i]=chr($i);
        }

        //Tabla
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Índice ASCII</th><th>Letra</th></tr>"; 
        foreach($matriz as $num =>$letra){
            echo "<tr>";
            echo "<td>$num</td>";
            echo "<td>$letra</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>