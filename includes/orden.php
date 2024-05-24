<?php
    require '../includes/conexion.php';
    // Se inicializa la sesión
    session_start();

    // se incluye el archivo de configuración
    $sql = "SELECT * FROM paciente";
    $resultado = $link->query($sql);

    $sql2 = "SELECT * FROM medicamento";
    $resultado2 = $link->query($sql2);

    $sql3 = "SELECT * FROM usuario WHERE idRol = 2";
    $resultado3 = $link->query($sql3);

    $sql4 = "SELECT * FROM paciente WHERE documentoUsuario = $_SESSION[documento]";
    $resultado4 = $link->query($sql4);

    // Definir variables e inicializar con valores vacíos
    $documento = $idMedicamento = $dosificacion = $cantidad = $documentoU = "";
    $documento_err = $idMedicamento_err = $dosificacion_err = $cantidad_err = $documentoU_err = "";
    
    // Procesamiento de datos del formulario cuando se envía el formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validar el nombre 
        if(empty(trim($_POST["documento"]))){
                $documento_err = "Por favor ingrese el nombre del paciente.";
            }else{
                $documento = trim($_POST["documento"]);
        }

        //Validar el rol
        if(empty(trim($_POST["idMedicamento"]))){
                $idMedicamento_err = "Por favor ingrese el medicamento.";
            }else{
                $idMedicamento= trim($_POST["idMedicamento"]);
        }

                //Validar el rol
        if(empty(trim($_POST["dosificacion"]))){
                $dosificacion_err = "Por favor ingrese la dosificacion.";
            }else{
                $dosificacion= trim($_POST["dosificacion"]);
        }

        if(empty(trim($_POST["cantidad"]))){
                $cantidad_err = "Por favor ingrese el medicamento.";
            }else{
                $cantidad= trim($_POST["cantidad"]);
        }

        //Validar el rol
        if(empty(trim($_POST["documentoU"]))){
                $documentoU_err = "Por favor ingrese su nombre.";
            }else{
                $documentoU = trim($_POST["documentoU"]);
        }

        // Verifique los errores de entrada antes de insertar en la base de datos
        if(empty($documento_err) && empty($idMedicamento_err) && empty($dosificacion_err) && empty($cantidad_err) && empty($documentoU_err)){
            
            // Prepare una declaración de inserción
            $sql = "INSERT INTO orden (documentoPaciente, idMedicamento, dosificacion, cantidad, documentoUsuario, idEstado) VALUES (?, ?, ?, ?, ?, 1)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Vincular variables a la declaración preparada como parámetros
                mysqli_stmt_bind_param($stmt, "iisii", $param_documento, $param_idMedicamento, $param_dosificacion, $param_cantidad, $param_documentoU);
                
                // Establecer parámetros
                $param_documento = $documento; 
                $param_idMedicamento = $idMedicamento;
                $param_dosificacion = $dosificacion;
                $param_cantidad = $cantidad; 
                $param_documentoU = $documentoU;                
                
                // Intentar ejecutar la declaración preparada
                if(mysqli_stmt_execute($stmt)){
                    // Redirigir a la página de inicio de sesión (login.php)
                    echo '<script type="text/javascript">
                    alert("Orden registrada de forma correcta")
                    window.location.href="homemedico.php";
                    </script>';
                    //header("location: login.php");
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
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Realizar Orden</title>
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="shortcut icon" href="../img/lista.png" />
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
                    <a href="homemedico.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <?php
                    if(isset($_SESSION['idRol'])){
                        switch($_SESSION['idRol']){
                      
                          case 1;
                          print "<a href='registro.php'>
                          <span class='icon'><ion-icon name='add-circle-outline'></span>
                          <span class='title'>Registrar Usuarios</span>
                            </a>";
                          break;
                      
                          case 2;
                          print "<a href='registrop.php'>
                          <span class='icon'><ion-icon name='add-circle-outline'></span>
                          <span class='title'>Registrar Pacientes</span>
                            </a>";
                          break;
                          default:
                        }
                      }
                    ?>
                </li>
                <li>
                    <?php
                    if(isset($_SESSION['idRol'])){
                        switch($_SESSION['idRol']){
                          case 2;
                          print "             
                      <li>
                          <a href='pacientes.php'>
                              <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
                              <span class='title'>Ver Pacientes</span>
                          </a>
                      </li>
                      <li>
                          <a href='orden.php'>
                              <span class='icon'><ion-icon name='document-outline'></ion-icon></span>
                              <span class='title'>Ordenes</span>
                          </a>
                      </li>
                      <li>
                          <a href='verorden.php'>
                              <span class='icon'><ion-icon name='document-text-outline'></ion-icon></span>
                              <span class='title'>Ver Ordenes</span>
                          </a>
                      </li>
                      ";
                          break;
                          default:
                        }
                      }
                    ?>
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

    <!-- main-->
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
                                <h1 style="color: var(--blue);">Realizar Orden</h1>
                                <br>
                                <p class="text-center txt">Complete este formulario para realizar una orden.</p>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="documento" id="documento">
                                            <option value="">Seleccione el nombre del Paciente</option>
                                                <?php while ($row4 = $resultado4->fetch_array(MYSQLI_ASSOC)){
                                                    echo "<option value='".$row4['documento']."'>".$row4['nombre']." ".$row4['apellido']."</option>";
                                                    }
                                                ?>
                                        </select>
                                        <br>
                                        <span style="color: black"><?php echo $documentoU_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="idMedicamento" id="idMedicamento">
                                            <option value="">Seleccione el nombre el medicamento</option>

                                                <?php while ($row = $resultado2->fetch_array(MYSQLI_ASSOC)){
                                                            echo "<option value='".$row['idMedicamento']."'>".$row['nombre']." ".$row['descripcion']."</option>";
                                                        }
                                                ?>
                                        </select>
                                        <br>
                                        <span style="color: black"><?php echo $idMedicamento_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="message" name="dosificacion" placeholder="Dosificacion" value="<?php echo $dosificacion;?>">
                                        <span style="color: black"><?php echo $dosificacion_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="cantidad" placeholder="Cantidad" value="<?php echo $cantidad;?>">
                                        <span style="color: black"><?php echo $cantidad_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="documentoU" id="documentoU">
                                            <option value="">Seleccione su nombre</option>
                                            <?php 
                                                echo "<option value='".$_SESSION['documento']."'>".$_SESSION['nombre']." ".$_SESSION['apellido']."</option>";        
                                            ?>
                                        </select>

                                        <span style="color: black"><?php echo $documentoU_err;?></span>
                                    </label>
                                </div>

                                <br>


                                <div class="forms-container">
                                    <div class="signin-signup">
                                    <center><button type="submit" class="btn">Aceptar</button>
                                    <a href="homemedico.php"><input type="button" class="btn" value="Volver"></a></center>
                                    
                                    </div>
                                </div>
                        </section>
                    </form>
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
</body>
</html>