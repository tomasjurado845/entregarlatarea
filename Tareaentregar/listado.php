<?php
include("includes/db.php");

if (!$conx) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$resultado = $conx->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #e9f5e9;
        }
        h1 {
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #a5d6a7;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <a href="nuevo.php" style="color: #4CAF50; font-size: 18px; text-decoration: none;">Agregar nuevo Usuario</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Password</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $resultado->fetch_object()) { ?>
            <tr>
                <td><?php echo $fila->id; ?></td>
                <td><?php echo $fila->email; ?></td>
                <td><?php echo $fila->password; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $fila->id; ?>">Editar</a> |
                    <a href="eliminar.php?id=<?php echo $fila->id; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
