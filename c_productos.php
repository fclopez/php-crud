<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        //(id_cliente,nombre,direccion,ciudad,pais,contacto,telefono,email)
        // keep track post values
        
        $id_producto = $_POST['id_producto'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $vr_unidad = $_POST['vr_unidad'];
        $existencias = $_POST['existencias'];

         
        // validate input
        $valid = true;
        if (empty($nombre)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($telefono)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO public.productos (id_producto,nombre ,descripcion,vr_unidad, existencias) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id_producto,$nombre, $descripcion, $vr_unidad, $existencias));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Crear producto</h3>
                    </div>
             
                    <form class="form-horizontal" action="c_productos.php" method="post">
                                          <div class="control-group">
                        <label class="control-label">Id Producto</label>
                        <div class="controls">
                            <input name="id_producto" type="text" placeholder="Id" value="<?php echo !empty($id_producto)?$id_producto:'';?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Descripcion</label>
                        <div class="controls">
                            <input name="descripcion" type="text" placeholder="Descripcion" value="<?php echo !empty($descripcion)?$descripcion:'';?>">
                        </div>
                      </div>
                                            <div class="control-group">
                        <label class="control-label">Vr unidad</label>
                        <div class="controls">
                            <input name="vr_unidad" type="text" placeholder="Vr unidad" value="<?php echo !empty($vr_unidad)?$vr_unidad:'';?>">
                        </div>
                      </div>
                      <div class="control-group ">
                        <label class="control-label">Existencias</label>
                        <div class="controls">
                            <input name="existencias" type="text" placeholder="Existencias" value="<?php echo !empty($existencias)?$existencias:'';?>">
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Crear</button>
                          <a class="btn" href="r_productos.php">Atras</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>