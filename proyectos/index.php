<?php
session_start();

$_SESSION['datos'] = [
    'usuario' => '',
    'producto' => ''
];

const IVA = 0.13;


$productos = [
    "LATTE" => ["nombre" => "Latte", "categoria" => "café", "precio" => 3.5, "disponibilidad" => "disponible"],
    "CAPUCCINO" => ["nombre" => "Capuccino", "categoria" => "café", "precio" => 2.5, "disponibilidad" => "disponible"],
    "PIE" => ["nombre" => "Pie", "categoria" => "postre", "precio" => 3.75, "disponibilidad" => "disponible"],
    "HAMBURGUESA" => ["nombre" => "Hamburguesa", "categoria" => "comida", "precio" => 5.5, "disponibilidad" => "disponible"]
];

$errores = [];

if($_SERVER["REQUEST_METHOD"]){
    $usuario = $_POST['usuario'];
    $productoSeleccionado = $_POST['productos_disponibles'];
    $cantidad = $_POST['cantidad'];

    if(empty($usuario)) {
        $errores[] = "El nombre de usuario es obligatorio.";
    }

    if(!array_key_exists($productoSeleccionado, $productos)) {
        $errores[] = "El producto seleccionado no es válido.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafetería</title>
</head>
<body>
    <form action="" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario"> <br><br>

        <label for="productos">Seleccione un producto:</label>
        <select name="productos_disponibles" id="productos_disponibles">
            <?php foreach($productos as $value => $key): ?>
            <option value="<?= $value ?>"><?= $key['nombre'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="cantidad">Cantidad por producto:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" value="1"> <br><br>

        <button type="submit">Enviar</button>

    </form>
</body>
</html>