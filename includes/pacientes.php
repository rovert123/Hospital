<?php

require '../includes/conexion.php';

// Se inicializa la sesión
session_start();


if(isset($_SESSION['idRol'])){
    switch($_SESSION['idRol']){
  
      case 1;
      $sql = "SELECT paciente.documento AS documento, paciente.nombre AS nombre, paciente.apellido AS apellido, paciente.edad AS edad, gruposanguineo.nombre AS RH, paciente.correo AS correo, paciente.telefono AS telefono, paciente.direccion AS direccion FROM paciente INNER JOIN gruposanguineo on paciente.idTipo = gruposanguineo.idTipo";
      break;
  
      case 2;
      $sql = "SELECT paciente.documento AS documento, paciente.nombre AS nombre, paciente.apellido AS apellido, paciente.edad AS edad, gruposanguineo.nombre AS RH, paciente.correo AS correo, paciente.telefono AS telefono, paciente.direccion AS direccion FROM paciente INNER JOIN gruposanguineo on paciente.idTipo = gruposanguineo.idTipo WHERE documentoUsuario = $_SESSION[documento]";
      break;
      default:
    }
  }

$contador = 0; 
$resultado = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Ver Pacientes</title>
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="shortcut icon" href="../img/paciente (2).png" />
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
    <!-- userImg-->

        </div>


        
    <!-- Order details list -->
            <div class="details">
                <div class="recentOrders">
                <section class="price container" >
                <h1 style="color: var(--blue);">Pacientes</h1>

                    <table>
                        <thead>
                            <tr>
                                <td><center>Documento</center></td>
                                <td><center>Nombre</center></td>
                                <td><center>Apellido</center></td>
                                <td><center>Edad</center></td>
                                <td><center>RH</center></td>
                                <td><center>Correo</center></td>
                                <td><center>Telefono</center></td>
                                <td><center>Dirección</center></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><center>
								<?php echo $row['documento']; ?>
                                </center>
							</td>
                            <td><center>
                                <?php echo $row['nombre']; ?>
                                </center>
                            </td>
							<td><center>
								<?php echo $row['apellido']; ?>
                                </center>
							</td>
							<td><center>
								<?php echo $row['edad']; ?>
                                </center>
							</td>
							<td><center>
								<?php echo $row['RH']; ?>
							</td>
                            <td><center>
								<?php echo $row['correo'];?>
                                </center>
							</td>
                            <td><center>
								<?php echo $row['telefono'];?>
                                </center>
							</td>
                            <td><center>
								<?php echo $row['direccion'];?>
                                </center>
							</td>
                            <?php   $contador++;?>
						</tr>
						<?php } ?>
                        </tbody>
                    </table>
                    </section>
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