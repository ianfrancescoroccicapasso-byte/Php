<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP - Unidad 2_C</title>
</head>

<body>

    <?php
    // 1. Función personalizada
    echo "<h2>1. Función personalizada</h2>";
    function saludar($nombre)
    {
        return "Hola, $nombre";
    }
    echo saludar("Carlos") . "<hr>";

    // 2. Función con valor de retorno
    echo "<h2>2. Función con valor de retorno</h2>";
    function sumar_valores($a, $b)
    {
        return $a + $b;
    }
    echo "La suma es: " . sumar_valores(12, 8) . "<hr>";

    // 3. Función con parámetros
    echo "<h2>3. Función con parámetros (Listado de totales)</h2>";
    function calcularTotal($num_productos, $precio)
    {
        return $num_productos * $precio;
    }
    for ($precio = 1; $precio <= 5; $precio++) {
        for ($num = 10; $num <= 12; $num++) { // Rango optimizado para visualización limpia
            $total = calcularTotal($num, $precio);
            echo "Prod: $num | Precio: $precio € | Total: $total €<br>";
        }
    }
    echo "<hr>";

    // 4. Array y funciones
    echo "<h2>4. Array y funciones (array_sum)</h2>";
    $numeros = [12, 25, 8, 40, 15];
    $suma_total = array_sum($numeros);
    echo "La suma de los elementos [12, 25, 8, 40, 15] es: " . $suma_total . "<hr>";

    // 5. Parámetros por defecto
    echo "<h2>5. Parámetros por defecto</h2>";
    function multiplicar($num, $multiplicador = 2)
    {
        return $num * $multiplicador;
    }
    echo "Multiplicar 7 por defecto (x2): " . multiplicar(7) . "<hr>";

    // 6. Uso de include para funciones (Nota en archivo unificado)
    echo "<h2>6. Uso de include para funciones (Nota teórica)</h2>";
    echo "En un entorno multi-archivo, incluirías 'funciones.php' con include para usar funciones externas.<hr>";

    // 7. Operador de módulo
    echo "<h2>7. Operador de módulo</h2>";
    $num1 = 17;
    $num2 = 4;
    $resto = $num1 % $num2;
    echo "El resto de dividir $num1 entre $num2 es: $resto<hr>";

    // 8. Uso de require con control de errores (Nota teórica)
    echo "<h2>8. Uso de require con control de errores (Nota teórica)</h2>";
    echo "El uso de require detiene la ejecución si el archivo no existe, a diferencia de include.<hr>";

    // 9. Función isset
    echo "<h2>9. Función isset</h2>";
    $variable_prueba = "Hola Mundo";
    if (isset($variable_prueba)) {
        echo "La variable está definida y tiene un valor.";
    } else {
        echo "La variable no está definida.";
    }
    echo "<hr>";

    // 10. Scope de variables
    echo "<h2>10. Scope de variables</h2>";
    $nombre_global = "Ámbito Global";
    function mostrarVariableGlobal()
    {
        global $nombre_global;
        echo "Dentro de la función: $nombre_global";
    }
    mostrarVariableGlobal();
    echo "<hr>";

    // 11. Array de funciones
    echo "<h2>11. Array de funciones anónimas</h2>";
    $funciones = [
        fn() => "Ejecutando primera función flecha.<br>",
        fn() => "Ejecutando segunda función flecha.<br>",
        fn() => "Ejecutando tercera función flecha.<br>"
    ];
    foreach ($funciones as $fn) {
        echo $fn();
    }
    echo "<hr>";

    // 12. Manipulación de arrays con unset
    echo "<h2>12. Manipulación de arrays con unset</h2>";
    $elementos = ["Manzana", "Pera", "Plátano", "Naranja", "Fresa"];
    unset($elementos[2]); // Elimina "Plátano"
    echo "<pre>";
    print_r($elementos);
    echo "</pre><hr>";

    // 13. Uso de require_once (Nota teórica)
    echo "<h2>13. Uso de require_once (Nota teórica)</h2>";
    echo "require_once asegura que el archivo de configuración se incluya una única vez.<hr>";

    // 14. Operador de concatenación
    echo "<h2>14. Operador de concatenación</h2>";
    $cadena1 = "Desarrollo Web con ";
    $cadena2 = "PHP";
    echo $cadena1 . $cadena2;
    ?>

</body>

</html>