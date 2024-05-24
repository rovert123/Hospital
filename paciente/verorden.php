<?php
    // inicializa la sesión
    session_start();


if($_SESSION['idRol'] != 4){
    header('location: ../login.php');
}

require '../includes/conexion.php';


$sql = "SELECT medicamento.nombre AS medicamento, medicamento.descripcion AS descripcion, orden.dosificacion AS dosificacion, orden.cantidad AS cantidad, usuario.nombre AS nombreU, usuario.apellido AS apellidoU, estadoorden.nombre AS estado, estadoorden.idEstado AS idEstado FROM orden 
INNER JOIN medicamento ON orden.idMedicamento = medicamento.idMedicamento
INNER JOIN usuario ON orden.documentoUsuario = usuario.documento
INNER JOIN estadoorden ON orden.idEstado = estadoorden.idEstado
INNER JOIN paciente ON orden.documentoPaciente = paciente.documento WHERE paciente.documento = $_SESSION[documento]";

$contador = 0; 
$resultado = $link->query($sql);
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
                    <a href="homepacientes.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="verorden.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Ver Ordenes</span>
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
                <section class="price container" >
                <h1 style="color: var(--blue);">Ordenes</h1>
                <!--<a href="imprimir-orden.php">Imprimir Orden</a>-->
                    <table>
                        <thead>
                            <tr>                
                                <td><center>Medicamento</center> </td>
                                <td><center>Descripcion</center></td>
                                <td><center>Dosificación</center></td>
                                <td><center>Cantidad</center></td>
                                <td><center>Prescribe</center></td>
                                <td><center>Estado</center></td>

                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>                   
                            <td><center>
								<?php echo $row['medicamento']; ?></center>
							</td>
                            <td><center>
								<?php echo $row['descripcion']; ?></center>
							</td>
							<td><center>
								<?php echo $row['dosificacion']; ?></center>
							</td>
							<td><center>
								<?php echo $row['cantidad']; ?></center>
							</td>
                            <td><center>
								<?php echo $row['nombreU']." ".$row['apellidoU'];?></center>
							</td>
                            <td><center>
                            <?php

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
                      
                            ?></center>
                            
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

<!--    
        1. Imprimir PDF 
        2. Estado de la orden CONFIGURAR ENCARGADO. 
        3. Facturas
        4. Iconos y cambiar nombres de pestañas (FALTA UPDATE)
        5. Cambiar contraseña desde fuera para pacientes
-->