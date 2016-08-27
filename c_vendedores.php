<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        //(id_cliente,nombre,direccion,ciudad,pais,contacto,telefono,email)
        // keep track post values
        $id_cliente = $_POST['id_cliente'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $pais = $_POST['pais'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
         
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
            $sql = "INSERT INTO public.clientes (id_cliente,nombre,direccion,ciudad,pais,contacto,telefono,email) values(?, ?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id_cliente,$nombre, $direccion, $ciudad, $pais, $contacto, $telefono, $email));
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
                        <h3>Crear Vendedor</h3>
                    </div>
             
                    <form class="form-horizontal" action="c_clientes.php" method="post">
                                          <div class="control-group">
                        <label class="control-label">Id Cliente</label>
                        <div class="controls">
                            <input name="id_cliente" type="text" placeholder="Id" value="<?php echo !empty($id_cliente)?$id_cliente:'';?>">
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Name" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Direccion</label>
                        <div class="controls">
                            <input name="direccion" type="text" placeholder="Direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">
                        </div>
                      </div>
                                            <div class="control-group">
                        <label class="control-label">Ciudad</label>
                        <div class="controls">
                            <input name="ciudad" type="text" placeholder="Ciudad" value="<?php echo !empty($ciudad)?$ciudad:'';?>">
                        </div>
                      </div>
                                            <div class="control-group">
                        <label class="control-label">Pais</label>
                        <div class="controls">
                            <input name="pais" type="text" placeholder="Pais" value="<?php echo !empty($pais)?$pais:'';?>">
                        </div>
                      </div>
                                            <div class="control-group">
                        <label class="control-label">Contacto</label>
                        <div class="controls">
                            <input name="contacto" type="text" placeholder="Contacto" value="<?php echo !empty($contacto)?$contacto:'';?>">
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Numero</label>
                        <div class="controls">
                            <input name="telefono" type="text"  placeholder="Numero de telefono" value="<?php echo !empty($telefono)?$telefono:'';?>">
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Crear</button>
                          <a class="btn" href="r_vendedores.php">Atras</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>