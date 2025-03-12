<?php
// Datos de conexión
$servername = "34.59.152.61"; // IP del servidor MySQL en GCP
$username = "root"; // Usuario de MySQL
$password = "123456"; // Contraseña de MySQL
$database = "PERSONAL"; // Nombre de la base de datos

// Habilitar reportes de error en MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Ejecutar consulta
$sql = "SELECT * FROM DATOSPERSONA";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lista de Personas</h2>
    <table>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['NOMBRES']) . "</td>
                        <td>" . htmlspecialchars($row['APELLIDOS']) . "</td>
                        <td>" . htmlspecialchars($row['EDAD']) . "</td>
                        <td>" . htmlspecialchars($row['TELEFONO']) . "</td>
                        <td>" . htmlspecialchars($row['CORREO']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay datos disponibles</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>
