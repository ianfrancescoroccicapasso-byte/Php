<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Factorial en PHP</title>
    <meta name="description" content="Herramienta online y gratuita en PHP para calcular el factorial de un número entero de forma rápida y sencilla.">
</head>
<body>
    <header>
        <h1>Calculadora de Factorial</h1>
    </header>
    
    <main>
        <section>
            <form method="GET" action="">
                <div>
                    <label for="number">Introduce un número entero:</label>
                    <input type="number" id="number" name="number" min="0" max="170" required 
                           value="<?php echo isset($_GET['number']) ? htmlspecialchars($_GET['number']) : ''; ?>">
                </div>
                <button type="submit">Calcular</button>
            </form>
        </section>

        <?php
        if (isset($_GET['number']) && $_GET['number'] !== '') {
            // Validar que sea un número entero
            $num = filter_input(INPUT_GET, 'number', FILTER_VALIDATE_INT);

            if ($num === false || $num < 0) {
                echo "<section><p style='color: red;'>Por favor, introduce un número entero válido mayor o igual a 0.</p></section>";
            } elseif ($num > 170) {
                // PHP con enteros de 64 bits suele desbordarse a partir de 170!
                echo "<section><p style='color: orange;'>El número es demasiado grande. Introduce un número menor o igual a 170.</p></section>";
            } else {
                // Cálculo del factorial
                $factorial = 1;
                for ($i = 1; $i <= $num; $i++) {
                    $factorial *= $i;
                }
                
                echo "<section>";
                echo "<h2>Resultado</h2>";
                echo "<p>El factorial de <strong>" . $num . "</strong> (" . $num . "!) es: <strong>" . number_format($factorial, 0, '', '') . "</strong></p>";
                echo "</section>";
            }
        }
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Calculadora PHP</p>
    </footer>
</body>
</html>