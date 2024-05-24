<?php
  // Inicializa la sesión
  session_start();

  // Incluir el archivo de configuración
  require_once "./includes/conexion.php";
  
  // Definir variables e inicializar con valores vacíos
  $username = $password = $username_err = $password_err = "";
  
  // Procesamiento de datos del formulario cuando se envía el formulario
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
      // Comprobar si el nombre de usuario está vacío
      if(empty(trim($_POST["username"]))){
          $username_err = "Por favor ingrese su correo.";
      } else{
          $username = trim($_POST["username"]);
      }
      
      // Comprobar si la contraseña está vacía
      if(empty(trim($_POST["password"]))){
          $password_err = "Por favor ingrese su contraseña.";
      } else{
          $password = trim($_POST["password"]);
      }
      $username = trim($_POST["username"]);
      $password = trim($_POST["password"]);
      // Validar información del usuario
      if(empty($username_err) && empty($password_err)){
          // Preparar la consulta select
          $sql = "SELECT  idRol, documento, correo, nombre, apellido, password FROM paciente WHERE correo = ?";
          
          if(isset($_SESSION['idRol'])){
            switch($_SESSION['idRol']){

              case 4;
              header('location: ./paciente/homepacientes.php');
              break;
          
              default:
            }
          }

          if($stmt = mysqli_prepare($link, $sql)){
              /* Vincular variables a la declaración preparada como parámetros, s es por la
        variable de tipo string*/
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              
              // Asignar parámetros
              $param_username = $username;
              
              // Intentar ejecutar la declaración preparada
              if(mysqli_stmt_execute($stmt)){
                  // almacenar el resultado de la consulta
                  mysqli_stmt_store_result($stmt);
                  
                  /*Verificar si existe el nombre de usuario, si es así,
          verificar la contraseña*/
                  if(mysqli_stmt_num_rows($stmt) == 1){                    
                      // Vincular las variables del resultado
                      mysqli_stmt_bind_result($stmt, $id, $documento, $username, $nombre, $apellido, $hashed_password);
            //obtener los valores de la consulta
                      if(mysqli_stmt_fetch($stmt)){
              /*comprueba que la contraseña ingresada sea igual a la 
              almacenada con hash*/
                          if(password_verify($password, $hashed_password)){
                              // La contraseña es correcta, así que se inicia una nueva sesión
                              session_start();
                              
                              // se almacenan los datos en las variables de la sesión
                              $_SESSION["loggedin"] = true;
                              
                                                        
                              
                              $_SESSION["documento"] = $documento;

                              $_SESSION["nombre"] = $nombre;

                              $_SESSION["apellido"] = $apellido;

                              $_SESSION["username"] = $username; 

                              $_SESSION["idRol"] = $id;
                              $id = $row[6];
                              switch($_SESSION['idRol']){
                              // Redirigir al usuario a la página de admin
                              
                                case 4;
                                header('location: ./paciente/homepacientes.php');
                                break;
                    
                                default:
                              
                              }
                              
                          } else{
                              // Mostrar un mensaje de error si la contraseña no es válida
                              $password_err = "La contraseña que ha ingresado no es válida.";
                          }
                      }
                  } else{
                      // Mostrar un mensaje de error si el nombre de usuario no existe
                    $username_err = "No existe cuenta registrada con ese correo.";
                  }
              } else{
                  echo "Algo salió mal, por favor vuelve a intentarlo.";
              }
          }
          
          // Cerrar la sentencia de consulta
          mysqli_stmt_close($stmt);
      }
      
      // Cerrar laconexión
      mysqli_close($link);
  }
?>  

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./css/styleinicio.css" />
    <title>index</title>
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form sign-in-form">
            <h2 class="title">Pacientes</h2>
            <h2 class="title">Inicio de Sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="user" type="text" class="input" name="username" placeholder="Ingresa tu Correo">             
            </div>
              <span style="color: black"><?php echo $username_err; ?></span>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="pass" type="password" class="input" data-type="password" name="password" placeholder="Contraseña">
            </div>
              <span style="color: black"><?php echo $password_err; ?></span><br>
            <input type="submit" value="Iniciar Sesión" class="btn" />
            <a href="inicio.html"><input type="button" class="btn" value="Volver Inicio"></a>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <img src="./img/fondito.jpg"  style="border-radius:450px" class="image"/>
        </div>
      </div>
  </div>   
  </form>
  </body>
</html>