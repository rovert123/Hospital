<?php
    require '../includes/conexion.php';
    // Se inicializa la sesión
    session_start();

    // se incluye el archivo de configuración
    $sql = "SELECT * FROM gruposanguineo";
    $resultado = $link->query($sql);

    $sql2 = "SELECT * FROM rol";
    $resultado2 = $link->query($sql2);

    $sql3 = "SELECT * FROM rol WHERE idRol = 4";
    $resultado3 = $link->query($sql3);

    // Definir variables e inicializar con valores vacíos
    $documento = $nombre = $apellido = $edad = $tipo = $correo = $telefono = $password = $confirm_password = $id = $direccion = $documentoU = "";
    $documento_err = $nombre_err = $apellido_err = $edad_err = $tipo_err =$correo_err = $telefono_err = $password_err = $confirm_password_err = $id_err= $direccion_err = $documentoU_err = "";
    
    // Procesamiento de datos del formulario cuando se envía el formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
            // Validar el id del estudiante
        if(empty(trim($_POST["documento"]))){
                $documento_err = "Por favor ingrese el documento del usuario.";
            } else{
                // Preparar la consulta
                $sql = "SELECT documento FROM paciente WHERE documento = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Vincular variables a la declaración preparada como parámetros
                    mysqli_stmt_bind_param($stmt, "i", $param_documento);
                    
                    // asignar parámetros
                    $param_documento = trim($_POST["documento"]);
                    
                    // Intentar ejecutar la declaración preparada
                    if(mysqli_stmt_execute($stmt)){
                        /* almacenar resultado*/
                        mysqli_stmt_store_result($stmt);
                        
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $documento_err = "Este documento ya fue registrado. Por favor vuelve a intentar.";
                        } else{
                            $documento = trim($_POST["documento"]);
                        }
                    } else{
                        echo "Al parecer algo salió mal.";
                    }
            }
            
            // Declaración de cierre
            mysqli_stmt_close($stmt);
        }

        // Validar el nombre 
        if(empty(trim($_POST["nombre"]))){
                $nombre_err = "Por favor ingrese el nombre.";
            }else{
                $nombre = trim($_POST["nombre"]);
        }

        //Validar el apellido
        if(empty(trim($_POST["apellido"]))){
                $apellido_err = "Por favor ingrese el apellido.";
            }else{
                $apellido = trim($_POST["apellido"]);
        }

        //Validar el edad
        if(empty(trim($_POST["edad"]))){
                $edad_err = "Por favor ingrese la edad.";
            }else{
                $edad = trim($_POST["edad"]);
        }

         //Validar el direccion
        if(empty(trim($_POST["direccion"]))){
                $direccion_err = "Por favor ingrese la direccion.";
            }else{
                $direccion = trim($_POST["direccion"]);
        }

        // Validar el correo del estudiante
        if(empty(trim($_POST["correo"]))){
                $correo_err = "Por favor ingrese el correo del estudiante.";
            } else{
                // Preparar la consulta
                $sql = "SELECT correo FROM paciente WHERE correo = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Vincular variables a la declaración preparada como parámetros
                    mysqli_stmt_bind_param($stmt, "s", $param_correo);
                    
                    // asignar parámetros
                    $param_correo = trim($_POST["correo"]);
                    
                    // Intentar ejecutar la declaración preparada
                    if(mysqli_stmt_execute($stmt)){
                        /* almacenar resultado*/
                        mysqli_stmt_store_result($stmt);
                        
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $correo_err = "Este correo ya fue tomado. Por favor vuelve a intentar.";
                        } else{
                            $correo = trim($_POST["correo"]);
                        }
                    } else{
                        echo "Al parecer algo salió mal.";
                    }
            }
            
            // Declaración de cierre
            mysqli_stmt_close($stmt);
        }
            
        // Validar contraseña
        if(empty(trim($_POST["password"]))){
                $password_err = "Por favor ingresa una contraseña.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "La contraseña al menos debe tener 6 caracteres.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validar que se confirma la contraseña
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Confirma tu contraseña.";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "La contraseña ingresada no coincide. Intentalo de nuevo.";
                }
        }

        //Validar el telefono
        if(empty(trim($_POST["tel"]))){
                $telefono_err = "Por favor ingrese el telefono.";
            }else{
                $telefono = trim($_POST["tel"]);
        }

        //Validar el rol
        if(empty(trim($_POST["idRol"]))){
                $id_err = "Por favor ingrese el rol.";
            }else{
                $id = trim($_POST["idRol"]);
        }

        //Validar el rol
        if(empty(trim($_POST["idTipo"]))){
                $tipo_err = "Por favor ingrese el grupo sanguíneo.";
            }else{
                $tipo= trim($_POST["idTipo"]);
        }


        if(empty(trim($_POST["documentoU"]))){
                $documentoU_err = "Por favor ingrese su nombre.";
            }else{
                $documentoU = trim($_POST["documentoU"]);
            }

        // Verifique los errores de entrada antes de insertar en la base de datos
        if(empty($documento_err) && empty($nombre_err) && empty($apellido_err) && empty($edad_err) && empty($tipo_err) && empty($correo_err) && empty($telefono_err) && empty($password_err) && empty($confirm_password_err) && empty($direccion_err) && empty($id_err) && empty($documentoU_err) ){
            
            // Prepare una declaración de inserción
            $sql = "INSERT INTO paciente (documento, nombre, apellido, edad, idTipo, correo, password, telefono, direccion, idRol, documentoUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Vincular variables a la declaración preparada como parámetros
                mysqli_stmt_bind_param($stmt, "ississsisii", $param_documento, $param_nombre, $param_apellido, $param_edad, $param_tipo, $param_correo, $param_password, $param_telefono, $param_direccion, $param_id, $param_documentoU);
                
                // Establecer parámetros
                $param_documento = $documento; 
                $param_nombre = $nombre;
                $param_apellido = $apellido; 
                $param_edad = $edad;
                $param_tipo = $tipo;
                $param_correo = $correo;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Crear una contraseña hash
                $param_telefono = $telefono;
                $param_direccion = $direccion;
                $param_id = $id;
                $param_documentoU = $documentoU; 
                
                // Intentar ejecutar la declaración preparada
                if(mysqli_stmt_execute($stmt)){
                    // Redirigir a la página de inicio de sesión (login.php)
                    echo '<script type="text/javascript">
                    alert("Paciente registrado de forma correcta")
                    window.location.href="homemedico.php";
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
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Nuevo Pciente</title>
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="shortcut icon" href="../img/registrar.png" />

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
                                <h1 style="color: var(--blue);">Registrate</h1>
                                <br>
                                <p class="text-center txt">Complete este formulario para registrar un paciente.</p>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="documento" placeholder="Documento" value="<?php echo $documento;?>">
                                        <span style="color: black"><?php echo $documento_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
                                        <span style="color: black"><?php echo $nombre_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="apellido" placeholder="Apellido" value="<?php echo $apellido;?>">
                                        <span style="color: black"><?php echo $apellido_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="edad" placeholder="Edad" value="<?php echo $edad;?>">
                                        <span style="color: black"><?php echo $edad_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="idTipo" id="tipo">
                                            <option value="">Seleccione el Grupo Sanguíneo</option>

                                                <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)){
                                                            echo "<option value='".$row['idTipo']."'>".$row['nombre']."</option>";
                                                        }
                                                ?>
                                        </select>
                                        <span style="color: black"><?php echo $tipo_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="email" name="correo" placeholder="Correo" value="<?php echo $correo;?>">
                                        <span style="color: black"><?php echo $correo_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="password" name="password" placeholder="Contraseña" value="<?php echo $password;?>">
                                        <span style="color: black"><?php echo $password_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" value="<?php echo $confirm_password;?>">
                                        <span style="color: black"><?php echo $confirm_password_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="tel" placeholder="Telefono" value="<?php echo $telefono;?>">
                                        <span style="color: black"><?php echo $telefono_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="direccion" placeholder="Direccion" value="<?php echo $direccion;?>">
                                        <span style="color: black"><?php echo $direccion_err;?></span>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="idRol" id="rol">
                                            <option value="">Seleccione el Rol</option>

                                                <?php while ($row = $resultado3->fetch_array(MYSQLI_ASSOC)){
                                                            echo "<option value='".$row['idRol']."'>".$row['nombre']."</option>";
                                                        }
                                                ?>

                                        </select>
                                        <span style="color: black"><?php echo $id_err;?></span>
                                    </label>
                                </div>

                                <br>
                                <div class="search">
                                    <label>
                                        <select name="documentoU" id="documentoU">
                                            <option value="">Nombre del medico que atiende</option>
                                            <?php 
                                                echo "<option value='".$_SESSION['documento']."'>".$_SESSION['nombre']." ".$_SESSION['apellido']."</option>";            
                                            ?>
                                        </select>

                                        <span style="color: black"><?php echo $documentoU_err;?></span>
                                    </label>
                                </div>


                                <div class="forms-container">
                                    <div class="signin-signup">
                                    <center><button type="submit" class="btn">Registrarse</button>
                                    <a href="homeadmin.php"><input type="button" class="btn" value="Volver"></a></center>
                                    
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