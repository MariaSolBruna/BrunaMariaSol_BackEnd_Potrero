<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Tienda de ropa</h1>

    <button type="submit"><a href="index.html">Inicio</a></button>
    <button type="submit"><a href="agregar.html">Agregar ropa</a></button>
    <button type="submit"><a href="buzo.php">Buzos</a></button>
    <button type="submit"><a href="nike.php">Nike</a></button>
    <button type="submit"><a href="mayor500.php">Prendas de mayor valor</a></button>
    <button type="submit"><a href="listarencards.php">Cards</a></button>

    <h2>Lista de ropa</h2>
    <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>TIPO DE PRENDA</th>
        <th>MARCA</th>
        <th>TALLE</th>
        <th>PRECIO</th>
        <th>IMAGEN</th>
        <!-- <th>EDITAR</th>
        <th>BORRAR</th> -->
    </tr>

    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "tiendaropa");

    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta = "SELECT*FROM ropa";

    // 3) Ejecutar la orden y obtenemos los registros
    $datos = mysqli_query($conexion, $consulta);

    // 4) Mostrar los datos del registro
    // EN LA VARIABLE FILA ALMACENAMOS EL ARRAY OBTENIDO A PARTIR DE $datos :
    while ($fila = mysqli_fetch_array($datos)) { ?>
        <tr>
        <td><?php echo $fila['codigo']; ?></td>
        <td><?php echo $fila['tipo']; ?></td>
        <td><?php echo $fila['marca']; ?></td>
        <td><?php echo $fila['talle']; ?></td>
        <td><?php echo $fila['precio']; ?></td>
        <td><img src="data:image/png;base64, <?php echo base64_encode($fila['imagen'])?>" alt="" width="100px" height="100px"></td>
        <td><a href="modificar.php?codigo=<?php echo $fila['codigo'];?>">Editar</a></td>
        <td><a href="borrar.php?codigo=<?php echo $fila['codigo'];?>">Borrar</a></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>
