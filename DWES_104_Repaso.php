<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP - Unidad 2</title>
</head>

<body>

    <?php
    // 1. Variables
    echo "<h2>1. Variables</h2>";
    $nombre = "Carlos";
    $edad = 16;
    echo "Mi nombre es $nombre y tengo $edad años.<hr>";

    // 2. Tipos de datos
    echo "<h2>2. Tipos de datos</h2>";
    $precio = 19.99;
    $cantidad = 3;
    $costo_total = $precio * $cantidad;
    echo "El costo total es: " . $costo_total . "<hr>";

    // 3. Arrays
    echo "<h2>3. Arrays</h2>";
    $ciudades = ["Madrid", "Barcelona", "Valencia"];
    echo "<pre>";
    print_r($ciudades);
    echo "</pre><hr>";

    // 4. Expresiones matemáticas
    echo "<h2>4. Expresiones matemáticas</h2>";
    $num1 = 5;
    $num2 = 7;
    $resultado_mat = ($num1 + $num2) * 2;
    echo "El resultado final es: " . $resultado_mat . "<hr>";

    // 5. Concatenación de cadenas
    echo "<h2>5. Concatenación de cadenas</h2>";
    $cadena1 = "Hola";
    $cadena2 = "Mundo PHP";
    $frase = $cadena1 . " " . $cadena2;
    echo $frase . "<hr>";

    // 6. Condicionales
    echo "<h2>6. Condicionales</h2>";
    $nota = 55;
    if ($nota >= 50) {
        echo "Aprobado";
    } else {
        echo "Suspenso";
    }
    echo "<hr>";

    // 7. Condicional con tipo estricto
    echo "<h2>7. Condicional con tipo estricto</h2>";
    $x_estricto = 5;
    $y_estricto = "5";
    if ($x_estricto === $y_estricto) {
        echo "Son iguales en valor y tipo.";
    } else {
        echo "No son iguales en valor y/o tipo.";
    }
    echo "<hr>";

    // 8. Switch con valor
    echo "<h2>8. Switch con valor</h2>";
    $color = "rojo";
    switch ($color) {
        case "rojo":
            echo "El color es rojo";
            break;
        case "verde":
            echo "El color es verde";
            break;
        default:
            echo "Color no reconocido";
            break;
    }
    echo "<hr>";

    // 9. Bucle while
    echo "<h2>9. Bucle while (1 al 10)</h2>";
    $i_while = 1;
    while ($i_while <= 10) {
        echo $i_while . " ";
        $i_while++;
    }
    echo "<hr>";

    // 10. Includes (Ejemplo teórico en archivo unificado)
    echo "<h2>10. Includes (Nota teórica)</h2>";
    echo "Para el ejercicio 10 se requieren archivos separados (cabecera.php, contenido.php y pie.php), tal como se mostró en la solución individual.<hr>";

    // 11. Arrays asociativos
    echo "<h2>11. Arrays asociativos</h2>";
    $alumnos = [
        "Ana" => 85,
        "Carlos" => 90,
        "Elena" => 78
    ];
    $claves = array_keys($alumnos);
    echo "La calificación del segundo alumno (" . $claves[1] . ") es: " . $alumnos[$claves[1]] . "<hr>";

    // 12. Bucle do while
    echo "<h2>12. Bucle do while (5 al 1 descendente)</h2>";
    $i_dowhile = 5;
    do {
        echo $i_dowhile . " ";
        $i_dowhile--;
    } while ($i_dowhile >= 1);
    echo "<hr>";

    // 13. Bucle for
    echo "<h2>13. Bucle for (1 al 5)</h2>";
    for ($i_for = 1; $i_for <= 5; $i_for++) {
        echo $i_for . "<br>";
    }
    echo "<hr>";

    // 14. Bucle foreach
    echo "<h2>14. Bucle foreach (Edades)</h2>";
    $edades_array = [14, 15, 16, 17];
    foreach ($edades_array as $edad_persona) {
        echo "Edad: $edad_persona<br>";
    }
    echo "<hr>";

    // 15. Switch con condición
    echo "<h2>15. Switch con condición</h2>";
    $edad_switch = 20;
    switch (true) {
        case ($edad_switch < 18):
            echo "Menor de 18 años";
            break;
        case ($edad_switch >= 18 && $edad_switch <= 30):
            echo "Entre 18 y 30 años";
            break;
        default:
            echo "Mayor de 30 años";
            break;
    }
    echo "<hr>";

    // 16. Operador lógico (AND)
    echo "<h2>16. Operador lógico (AND)</h2>";
    $x_and = 10;
    $y_and = 20;
    if ($x_and > 5 && $y_and > 5) {
        echo "Ambas variables son mayores de 5.";
    }
    echo "<hr>";

    // 17. Operador lógico (OR)
    echo "<h2>17. Operador lógico (OR)</h2>";
    $a_or = 0;
    $b_or = 20;
    if ($a_or > 10 || $b_or > 10) {
        echo "Al menos una de las variables es mayor de 10.";
    }
    echo "<hr>";

    // 18. Herencia de cadenas heredoc
    echo "<h2>18. Herencia de cadenas heredoc</h2>";
    $nombre_heredoc = "Laura";
    $edad_heredoc = 17;
    $mensaje_heredoc = <<<EOT
Hola, mi nombre es $nombre_heredoc 
y tengo $edad_heredoc años. 
Este es un texto multilinea usando la sintaxis heredoc.
EOT;
    echo nl2br($mensaje_heredoc) . "<hr>";

    // 19. Array multidimensional
    echo "<h2>19. Array multidimensional</h2>";
    $personas = [
        ["nombre" => "Juan", "edad" => 16, "ciudad" => "Madrid"],
        ["nombre" => "Sofía", "edad" => 17, "ciudad" => "Barcelona"],
        ["nombre" => "Lucas", "edad" => 15, "ciudad" => "Valencia"]
    ];
    echo "La ciudad de la segunda persona es: " . $personas[1]["ciudad"] . "<hr>";

    // 20. Require vs Include (Nota teórica)
    echo "<h2>20. Require vs Include (Nota teórica)</h2>";
    echo "Include emite una advertencia si el archivo no existe y continúa la ejecución; Require detiene el script por completo.<hr>";

    // 21. Declaración de constantes
    echo "<h2>21. Declaración de constantes</h2>";
    define("VALOR_PI", 3.1416);
    $radio = 5;
    $area = VALOR_PI * ($radio * $radio);
    echo "El área del círculo con radio 5 es: " . $area . "<hr>";

    // 22. Operador ternario
    echo "<h2>22. Operador ternario</h2>";
    $edad_ternario = 16;
    $resultado_ternario = ($edad_ternario >= 18) ? "Mayor de edad" : "Menor de edad";
    echo $resultado_ternario;
    ?>

</body>

</html>