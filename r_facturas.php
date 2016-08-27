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
            <h4>Facturas</h4>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th># Factura</th>
                      <th>Fecha Factura</th>
                      <th>Fecha Entrega</th>
                      <th>Tipo Envio</th>
                      <th>Cliente</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'select * from facturas inner join clientes on facturas.id_cliente = clientes.id_cliente';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['nro_factura'] . '</td>';
                            echo '<td>'. $row['fecha_factura'] . '</td>';
                            echo '<td>'. $row['fecha_entrega'] . '</td>';
                            echo '<td>'. $row['tipo_envio'] . '</td>';
                            echo '<td>'. $row['nombre'] . '</td>';
                            echo '<td width=100>';
                            echo ' ';
                            echo '<a class="btn" href="update.php?id='.$row['id_cliente'].'">Visualizar</a>';                          
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
        <p>
        <a href="create.php" class="btn btn-success">Crear factura</a>
        <a class="btn" href="index.php">Regresar</a>
        </p>
    </div> <!-- /container -->
  </body>
</html>