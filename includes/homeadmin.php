<?php

    require 'conexion.php';
    // Se inicializa la sesión
    session_start();

    if($_SESSION['idRol'] != 1){
        header('location: ../index.php');
    }

    $id = $_SESSION["idRol"];


   /* $sql = "SELECT COUNT(*) as total FROM usuario";
    $resultado = $link->query($sql);*/

    $sql = "select count(*) as total from usuario";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);
    
    $sql2 = "select count(*) as total from medicamento";
    $result2 = mysqli_query($link, $sql2);
    $data2 = mysqli_fetch_assoc($result2);

    $sql3 = "select count(*) as total from paciente";
    $result3 = mysqli_query($link, $sql3);
    $data3 = mysqli_fetch_assoc($result3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Inicio Administrador</title>
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="shortcut icon" href="../img/inicio.png" />
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

        <div class="cardBox">
                <div class="card">
                    <div>
                        <?php print "<div class='numbers'>". $data['total']."</div>"?>
                        <div class="cardName">Usuarios Registrados</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <?php print "<div class='numbers'>". $data2['total']."</div>"?>
                        <div class="cardName">Medicamentos</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="unlink-outline" style="transform:rotate(135deg);"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <?php print "<div class='numbers'>". $data3['total']."</div>"?>
                        <div class="cardName">Pacientes</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="fitness-outline"></ion-icon>
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