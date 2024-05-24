<?php

require '../includes/conexion.php';
// Se inicializa la sesión
session_start();
$where = "";

if($_SESSION['idRol'] != 2){
    header('location: ../index.php');
}

if (!empty($_POST)) {
	$valor = $_POST['campo'];
	if (!empty($valor)) {
		$where = "WHERE idRol LIKE '%$valor'";
	}
}

$id = $_SESSION["idRol"];
//$sql = "SELECT * FROM usuario";
$total = 0;

$sql2 = "select count(*) as total from medicamento";
$result2 = mysqli_query($link, $sql2);
$data2 = mysqli_fetch_assoc($result2);

$sql4 = "select count(*) as total from orden WHERE documentoUsuario = $_SESSION[documento]";
$result4 = mysqli_query($link, $sql4);
$data4 = mysqli_fetch_assoc($result4);

$sql3 = "select count(*) as total from paciente WHERE documentoUsuario = $_SESSION[documento]";
$result3 = mysqli_query($link, $sql3);
$data3 = mysqli_fetch_assoc($result3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Inicio Medico</title>
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
                    <a href="">
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

            
              <!-- cards -->
    

        </div>
        <div class="cardBox">
                <div class="card">
                    <div>
                        <?php print "<div class='numbers'>". $data3['total']."</div>"?>
                        <div class="cardName">Pacientes</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="fitness-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <?php print "<div class='numbers'>". $data4['total']."</div>"?>
                        <div class="cardName">Ordenes</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name='document-text-outline'></ion-icon>
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