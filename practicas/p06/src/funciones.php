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