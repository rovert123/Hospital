<?php
    require '../includes/conexion.php';

    // Se inicializa la sesión
    session_start();

    $contador = 0; 
    $consulta =
        "SELECT orden.idOrden AS numero, paciente.documento AS documento, paciente.nombre AS nombre, paciente.apellido AS apellido, medicamento.nombre AS medicamento, orden.dosificacion AS dosificacion, orden.cantidad AS cantidad, usuario.documento AS documentoU, usuario.nombre AS nombreU, usuario.apellido AS apellidoU, estadoorden.nombre AS estado, estadoorden.idEstado AS idEstado FROM orden 
        INNER JOIN medicamento ON orden.idMedicamento = medicamento.idMedicamento
        INNER JOIN paciente ON orden.documentoPaciente = paciente.documento
        INNER JOIN estadoorden ON orden.idEstado = estadoorden.idEstado 
        INNER JOIN usuario ON orden.documentoUsuario = usuario.documento ";

    $sql2 = "SELECT * FROM estadoorden";
    $resultado2 = $link->query($sql2);

    if($_SESSION['idRol'] == 3){
        $sql = "$consulta";
        $resultado = $link->query($sql);
    }elseif ($_SESSION['idRol'] == 2) {
        $sql = "$consulta WHERE usuario.documento = $_SESSION[documento]";
        $resultado = $link->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Ordenes</title>
    <link rel="shortcut icon" href="../img/orden.png" />
    <link rel="stylesheet" href="../css/styleusuario.css">
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
                <?php
                    if(isset($_SESSION['idRol'])){
                        switch($_SESSION['idRol']){
                      
                          case 2;
                          print "                    <a href='homemedico.php'>
                          <span class='icon'><ion-icon name='home-outline'></ion-icon></span>
                          <span class='title'>Dashboard</span>
                        </a>";
                          break;
                      
                          case 3;
                          print "   <a href='homeencargado.php'>
                                    <span class='icon'><ion-icon name='home-outline'></ion-icon></span>
                                    <span class='title'>Dashboard</span>
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
                      
                          case 3;
                          print "
                          
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
                <h1 style="color: var(--blue);">Ordenes</h1>

                    <table>
                        <thead>
                            <tr>
                                <td><center>Número Orden</center></td>
                                <td><center>Documento Paciente</center></td>
                                <td><center>Nombre Paciente</center></td>
                                <td><center>Medicamento</center></td>
                                <td><center>Dosificación</center></td>
                                <td><center>Cantidad</center></td>
                                <td><center>Prescribe</center></td>
                               <?php
                                    if(isset($_SESSION['idRol'])){
                                        switch($_SESSION['idRol']){
                                        case 3;
                                        print "<td><center>Estado</center></td>";
                                        print "<td><center>Editar</center></td>";
                                        break;
                                        default:
                                        }
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
                            <td><center><?php echo $row['numero'];?></center></td>
                            <td><center><?php echo $row['documento'];?></center></td>
                            <td><center><?php echo $row['nombre']." ".$row['apellido']; ?></td>
                            <td><center><?php echo $row['medicamento']; ?></td>
							<td><center><?php echo $row['dosificacion']; ?></center></td>
							<td><center><?php echo $row['cantidad']; ?></center></td>
                            <td><center><?php echo $row['nombreU']." ".$row['apellidoU'];?></center></td>
                            <td>
                                <center>
                                    <?php      
                                        if(isset($_SESSION['idRol'])){
                                            switch($_SESSION['idRol']){
                                            case 3;
                                                switch($row['idEstado']){
                                                    case 1;
                                                    print "<span class='status pending'>".$row['estado']."</span>";
                                                    break;
                                                    
                                                    case 2;
                                                    print "<span class='status retunr'>".$row['estado']."</span>";
                                                    break;
                                                    
                                                    case 3;
                                                    print "<span class='status delivered'>".$row['estado']."</span>";
                                                    break;
                                                    default:
                                                }
                                            break;
                                            default:
                                            }
                                        }
                                    ?>
                                </center>
                            </td>
                            <td><center>

                                <?php      
                                        if(isset($_SESSION['idRol'])){
                                            switch($_SESSION['idRol']){
                                            case 3;
                                                print "<a href='modificaro.php?idOrden=".$row["numero"]."'>
                                                <img src='../img/edit.svg'/></a>";
                                            default:
                                            }
                                        }
                                    ?>  
                            </center></td>
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
