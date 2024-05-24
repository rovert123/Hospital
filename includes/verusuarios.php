<?php

require '../includes/conexion.php';
// Se inicializa la sesión
session_start();
$where = "";

if($_SESSION['idRol'] != 1){
    header('location: ../index.php');
}

$sql = "SELECT usuario.documento AS documento, usuario.nombre AS nombre, usuario.apellido AS apellido, usuario.correo AS correo, usuario.telefono AS telefono, rol.nombre AS rol FROM usuario INNER JOIN rol on usuario.idRol = rol.idRol;";
$contador = 0; 
$resultado = $link->query($sql);
$id = $_SESSION["idRol"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="shortcut icon" href="../img/usuario.png" />
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
                    <a href="homeadmin.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="registro.php">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="title">Registrar Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="verusuarios.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Ver Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href='pacientes.php'>
                        <span class='icon'><ion-icon name='person-outline'></ion-icon></span>
                        <span class='title'>Ver Pacientes</span>
                    </a>
                </li>
                <li>
                    <a href="vermedicamentoa.php">
                        <span class="icon"><ion-icon name="medical-outline"></ion-icon></span>
                        <span class="title">Medicamentos</span>
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
        </div>
      

                <!-- Order details list -->
                <div class="details">
                <div class="recentOrders">
                    <section class="price container">
                        <h1 style="color: var(--blue);">Recent Orders</h1>
                    <table>
                        <thead>
                        <tr>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr> 
								<td><center><?php echo $row['documento'];?></center></td>
								<td><center><?php echo $row['nombre']; ?></center></td>
								<td><center><?php echo $row['apellido']; ?></center></td>
								<td><center><?php echo $row['correo']; ?></center></td>
								<td><center><?php echo $row['telefono']; ?></center></td>
								<td><center><?php echo $row['rol']; ?></center></td>
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