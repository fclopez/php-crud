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
            <h4>Productos</h4>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Valor Unidad</th>
                      <th>Existencias</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM productos order by id_producto asc';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['nombre'] . '</td>';
                            echo '<td>'. $row['descripcion'] . '</td>';
                            echo '<td>'. $row['vr_unidad'] . '</td>';
                            echo '<td>'. $row['existencias'] . '</td>';
                            echo '<td width=250>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="a_vendedor.php?id='.$row['id_producto'].'">Actualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="b_vendedor.php?id='.$row['id_producto'].'">Borrar</a>';
                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
        <p>
                <a href="c_productos.php" class="btn btn-success">Crear producto</a>
        <a class="btn" href="index.php">Regresar</a>
        </p>
    </div> <!-- /container -->
  </body>
</html>