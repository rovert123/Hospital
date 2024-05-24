<?php

require '../includes/conexion.php';
// Se inicializa la sesión
session_start();

if($_SESSION['idRol'] != 3){
    header('location: ../index.php');
}

    $id = $_SESSION["idRol"];

    // se incluye el archivo de configuración
    $sql = "SELECT * FROM medicamento";
    $resultado = $link->query($sql);

    $sql2 = "SELECT * FROM administracion";
    $resultado2 = $link->query($sql2);

    $sql3 = "SELECT * FROM tipomedicamento";
    $resultado3 = $link->query($sql3);

    // Definir variables e inicializar con valores vacíos
    $nombre = $stock = $fecha = $precio = $descripcion = $administracion = $tipo = "";
    $nombre_err = $stock_err = $fecha_err = $precio_err = $descripcion_err = $administracion_err = $tipo_err ="";
    
    // Procesamiento de datos del formulario cuando se envía el formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validar el nombre 
        if(empty(trim($_POST["nombre"]))){
                $nombre_err = "Por favor ingrese el nombre del medicamento.";
            }else{
                $nombre = trim($_POST["nombre"]);
        }

        if(empty(trim($_POST["fecha"]))){
                $fecha_err = "Por favor ingrese la fecha de caducidad del medicamento.";
            }else{
                $fecha = trim($_POST["fecha"]);
        }
        //Validar el rol
        if(empty(trim($_POST["stock"]))){
                $stock_err = "Por favor ingrese la cantidad disponible.";
            }else{
                $stock= trim($_POST["stock"]);
        }

                //Validar el rol
        if(empty(trim($_POST["precio"]))){
                $precio_err = "Por favor ingrese el precio del medicamento.";
            }else{
                $precio= trim($_POST["precio"]);
        }

        if(empty(trim($_POST["descripcion"]))){
                $descripcion_err = "Por favor ingrese la descripción del medicamento.";
            }else{
                $descripcion= trim($_POST["descripcion"]);
        }

        //Validar el rol
        if(empty(trim($_POST["tipo"]))){
                $tipo_err = "Por favor ingrese la presentación del medicamento.";
            }else{
                $tipo = trim($_POST["tipo"]);
        }

        //Validar el rol
        if(empty(trim($_POST["administracion"]))){
                $administracion_err = "Por favor ingrese la forma de administrar el medicamento.";
            }else{
                $administracion = trim($_POST["administracion"]);
        }

        // Verifique los errores de entrada antes de insertar en la base de datos
        if(empty($$nombre_err) && empty($stock_err) && empty($precio_err) && empty($descripcion_err) && empty($administracion_err) && empty($tipo_err) && empty($fecha_err) ){
            
            // Prepare una declaración de inserción
            $sql = "INSERT INTO medicamento (stock, nombre, descripcion, fechaCaducidad, precio, viaAdministracion, tipoMedicamento) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Vincular variables a la declaración preparada como parámetros
                mysqli_stmt_bind_param($stmt, "isssiii", $param_stock, $param_nombre, $param_descripcion, $param_fecha, $param_precio, $param_via, $param_tipo);
                
                // Establecer parámetros
                $param_stock = $stock; 
                $param_nombre = $nombre;
                $param_descripcion = $descripcion;
                $param_fecha = $fecha; 
                $param_precio = $precio;
                $param_via = $administracion; 
                $param_tipo = $tipo;                 
                
                // Intentar ejecutar la declaración preparada
                if(mysqli_stmt_execute($stmt)){
                    // Redirigir a la página de inicio de sesión (login.php)
                  echo '<script type="text/javascript">
                    alert("Medicamento registrado de forma correcta")
                    window.location.href="homeencargado.php";
                    </script>';


                } else{
                    echo "Algo salió mal, por favor inténtalo de nuevo.";
                }
            }
            
            // claración de cierre
            mysqli_stmt_close($stmt);
        }
        
        // Cerrar la conexión
        mysqli_close($link);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registrar Medicamento</title>
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="shortcut icon" href="../img/medi.png" />

</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="finger-print-outline"></ion-icon></span>
                        <span class="title"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                    </a>
                </li>
                <li>
                    <a href="homeencargado.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="registrom.php">
                        <span class="icon"><ion-icon name="medical-outline"></ion-icon></span>
                        <span class="title">Registrar Medicamento</span>
                    </a>
                </li>
                <li>
                    <a href="vermedicamento.php">
                        <span class="icon"><ion-icon name="medical-outline"></ion-icon></span>
                        <span class="title"> Ver Medicamentos</span>
                    </a>
                </li>
                <li>
                    <a href="../carrito/index.php">
                        <span class="icon"><ion-icon name="bag-handle-outline"></ion-icon></span>
                        <span class="title">Comprar Productos</span>
                    </a>
                </li>
                <li>
                    <a href='verorden.php'>
                        <span class='icon'><ion-icon name='document-text-outline'></ion-icon></span>
                        <span class='title'>Ver Ordenes</span>
                    </a>
                </li>
                <li>
                    <a href="contraseña.php">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Cambiar Contraseña</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
    <!-- search-->

        </div>

        
    <!-- Order details list -->
            <div class="details">
                <div class="recentOrders">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <section class="price container" >
                                <h1 style="color: var(--blue);">Ingresar Medicamentos</h1>
                                <br>
                                <p class="text-center txt">Complete este formulario para registrar los nuevos medicamentos</p>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="nombre" placeholder="Nombre Medicamento" value="<?php echo $nombre;?>">
                                        <span style="color: black"><?php echo $nombre_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="stock" placeholder="Cantidad" value="<?php echo $stock;?>">
                                        <span style="color: black"><?php echo $stock_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion;?>">
                                        <span style="color: black"><?php echo $descripcion_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="date" name="fecha" placeholder="Fecha" value="<?php echo $fecha;?>">
                                        <span style="color: black"><?php echo $fecha_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="precio" placeholder="Precio" value="<?php echo $precio;?>">
                                        <span style="color: black"><?php echo $precio_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="administracion" id="administracion">
                                            <option value="">Seleccione la via de administracion</option>

                                                <?php while ($row = $resultado2->fetch_array(MYSQLI_ASSOC)){
                                                            echo "<option value='".$row['idAdministracion']."'>".$row['nombre']."</option>";
                                                        }
                                                ?>

                                        </select>
                                        <span style="color: black"><?php echo $administracion_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="tipo" id="tipo">
                                            <option value="">Seleccione la presentación del medicamento</option>

                                                <?php while ($row = $resultado3->fetch_array(MYSQLI_ASSOC)){
                                                            echo "<option value='".$row['idTipomedicamento']."'>".$row['nombre']."</option>";
                                                        }
                                                ?>

                                        </select>
                                        <span style="color: black"><?php echo $tipo_err;?></span>
                                    </label>
                                </div>


                                <div class="forms-container">
                                    <div class="signin-signup">
                                    <center><button type="submit" class="btn">Registrar</button>
                                    <a href="homeencargado.php"><input type="button" class="btn" value="Volver"></a></center>
                                    
                                    </div>
                                </div>
                        </section>
                    </form>
                </div>
            </div>

            
        
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        //add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
    </script>
</body>
</html>