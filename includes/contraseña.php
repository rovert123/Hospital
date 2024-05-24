<?php
    // inicializa la sesión
    session_start();

    /* Compruebe si el usuario ha iniciado sesión; 
        de lo contrario, redirija a la página de inicio de sesión (index.php)*/
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: ../index.php");
        exit;
    }

    // incluir el archivo de configuración
    require_once "conexion.php";

    // Definir variables e inicializar con valores vacíos
    $new_password = $confirm_password = "";
    $new_password_err = $confirm_password_err = "";

    // Procesamiento de datos del formulario cuando se envía el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validar la nueva contraseña
        if (empty(trim($_POST["new_password"]))) {
            $new_password_err = "Por favor, introduzca la nueva contraseña.";
        } elseif (strlen(trim($_POST["new_password"])) < 6) {
            $new_password_err = "La contraseña debe tener al menos 6 caracteres.";
        } else {
            $new_password = trim($_POST["new_password"]);
        }

        // Validar la confirmación de contraseña
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Por favor confirme la contraseña.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($new_password_err) && ($new_password != $confirm_password)) {
                $confirm_password_err = "Las contraseñas no coinciden.";
            }
        }

        // Verifique los errores de entrada antes de actualizar la base de datos
        if (empty($new_password_err) && empty($confirm_password_err)) {
            // Prepare la declaración de actualización
            $sql = "UPDATE usuario SET password = ? WHERE correo = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Vincular variables a la declaración preparada como parámetros
                mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_id);

                // Asignar parámetros
                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $param_id = $_SESSION["username"];

                // Intente ejecutar la declaración preparada
                if (mysqli_stmt_execute($stmt)) {
                    /* Contraseña actualizada exitosamente. 
                    Destruye la sesión y redirige a la página de inicio de sesión (iniciostudent.php)*/
                    session_destroy();
                    echo '<script>
                    alert("Contraseña cambiada de forma correcta");
                    window.location.href="../index.php";
                    </script>';
                    exit();
                } else {
                    echo "Algo salió mal, por favor vuelva a intentarlo.";
                }
            }

            // Declaración de cierre
            mysqli_stmt_close($stmt);
        }

        // Cerrar conexión
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="shortcut icon" href="../img/candado.png" />
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

                <?php
                    if(isset($_SESSION['idRol'])){
                        switch($_SESSION['idRol']){

                            case 1;
                            print "             
                            <li>
                            <a href='homeadmin.php'>
                                <span class='icon'><ion-icon name='home-outline'></ion-icon></span>
                                <span class='title'>Dashboard</span>
                            </a>
                        </li>
                        ";
                            break;
                            
                            case 2;
                            print "             
                            <li>
                            <a href='homemedico.php'>
                                <span class='icon'><ion-icon name='home-outline'></ion-icon></span>
                                <span class='title'>Dashboard</span>
                            </a>
                        </li>
                        ";
                            break;
                            

                          case 3;
                          print "             
                          <li>
                          <a href='homeencargado.php'>
                              <span class='icon'><ion-icon name='home-outline'></ion-icon></span>
                              <span class='title'>Dashboard</span>
                          </a>
                      </li>
                      <li>
                      <a href='registrom.php'>
                          <span class='icon'><ion-icon name='medical-outline'></ion-icon></span>
                          <span class='title'>Registrar Medicamento</span>
                      </a>
                  </li>
                  <li>
                      <a href='vermedicamento.php'>
                          <span class='icon'><ion-icon name='medical-outline'></ion-icon></span>
                          <span class='title'> Ver Medicamentos</span>
                      </a>
                  </li>
                  <li>
                      <a href='../carrito/index.php'>
                          <span class='icon'><ion-icon name='bag-handle-outline'></ion-icon></span>
                          <span class='title'>Comprar Productos</span>
                      </a>
                  </li>
                  <li>
                      <a href='verorden.php'>
                          <span class='icon'><ion-icon name='document-text-outline'></ion-icon></span>
                          <span class='title'> Ver Ordenes</span>
                      </a>
                  </li>

                      ";
                          break;
                          default:
                        }
                      }
                    ?>
                <li>
                    <?php
                    if(isset($_SESSION['idRol'])){
                        switch($_SESSION['idRol']){
                      
                          case 1;
                          print "<a href='registro.php'>
                          <span class='icon'><ion-icon name='add-circle-outline'></ion-icon></span>
                          <span class='title'>Registrar Usuarios</span>
                            </a>";
                          break;
                      
                          case 2;
                          print "<a href='registrop.php'>
                          <span class='icon'><ion-icon name='add-circle-outline'></ion-icon></span>
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

                            case 1;
                            print "   
                            <li>
                            <a href='verusuarios.php'>
                                <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
                                <span class='title'>Ver Usuarios</span>
                            </a>
                        </li>          
                            <li>
                            <a href='pacientes.php'>
                                <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
                                <span class='title'>Ver Pacientes</span>
                            </a>
                        </li>

                        ";
                            break;

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
                    <?php
                    if(isset($_SESSION['idRol'])){
                        switch($_SESSION['idRol']){
                      
                          case 1;
                          print "                <li>
                          <a href='vermedicamentoa.php'>
                              <span class='icon'><ion-icon name='medical-outline'></ion-icon></span>
                              <span class='title'>Medicamentos</span>
                          </a>
                      </li>";
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
                    <a href="../includes/logout.php">
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
                    <div class="container-1">
                        <h2 style="color: var(--blue);">Cambiar mi Contraseña</h2>
                            <br>
                                <p class="text-center txt">Complete este formulario para restablecer su contraseña.</p>
                            <br>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h4><strong><label>Nueva contraseña</label></h4></strong>
                            <br>
                            <div class="search">
                                <label>
                                    <input type="password" name="new_password" id="txtPassword" value="<?php echo $new_password; ?>" placeholder="Nueva contraseña">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                </label>
                            </div>
                            <span><?php echo $new_password_err; ?></span><br>
                            <br>
                            <h4><strong><label>Confirmar contraseña</label></h4></strong>
                            <br>
                            <div class="search">
                                <label>
                                    <input type="password" name="confirm_password" id="txtPassword1" placeholder="Repite la Contraseña">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                </label>
                            </div>
                            <span><?php echo $confirm_password_err; ?></span><br><br>
                            <div class="search">
                                <label>
                                    <input type="submit" value="Enviar" class="btn" style="border-radius: 20px;">
                                </label>
                            </div>
                        </form>
                    </div>
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