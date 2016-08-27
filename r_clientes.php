<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h2>Comercial PATOMAR</h2>
            </div>
            <div class="row">
            <h4>Clientes</h4>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Direccion</th>
                      <th>Ciudad</th>
                      <th>Email</th>
                      <th>Numero Celular</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM clientes ORDER BY id_cliente DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['nombre'] . '</td>';
                            echo '<td>'. $row['direccion'] . '</td>';
                            echo '<td>'. $row['ciudad'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['telefono'] . '</td>';
                            echo '<td width=250>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="u_clientes.php?id='.$row['id_cliente'].'">Actualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id_cliente'].'">Borrar</a>';
                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
        <p>
        <a href="c_clientes.php" class="btn btn-success">Crear Cliente</a>
        <a class="btn" href="index.php">Regresar</a>
        </p>
    </div> <!-- /container -->
  </body>
</html>