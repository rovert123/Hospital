<?php
    require '../includes/conexion.php';
    // Se inicializa la sesión
    session_start();
    $where = "";

    if($_SESSION['idRol'] != 3){
        header('location: ../index.php');
    }

    $sql = "SELECT medicamento.idMedicamento, medicamento.nombre AS nombre, medicamento.stock AS stock, medicamento.descripcion AS descripcion, medicamento.fechaCaducidad AS fecha, medicamento.precio AS precio, administracion.nombre AS via, tipomedicamento.nombre AS tipo FROM medicamento 
    INNER JOIN administracion on medicamento.viaAdministracion = administracion.idAdministracion
    INNER JOIN tipomedicamento on medicamento.tipoMedicamento = tipomedicamento.idTipomedicamento";
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
    <title>Medicamentos</title>
    <link rel="shortcut icon" href="../img/medi.png" />
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
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
                    <a href="homeencargado.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="registrom.php">
                        <span class="icon"><ion-icon name="medical-outline"></ion-icon></span>
                        <span class="title">Registrar Medicamento</span>
                    </a>
                </li>
                <li>
                    <a href="vermedicamento.php">
                        <span class="icon"><ion-icon name="medical-outline"></ion-icon></span>
                        <span class="title"> Ver Medicamentos</span>
                    </a>
                </li>
                <li>
                    <a href="../carrito/index.php">
                        <span class="icon"><ion-icon name="bag-handle-outline"></ion-icon></span>
                        <span class="title">Comprar Productos</span>
                    </a>
                </li>
                <li>
                    <a href='verorden.php'>
                        <span class='icon'><ion-icon name='document-text-outline'></ion-icon></span>
                        <span class='title'>Ver Ordenes</span>
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
                        <h1 style="color: var(--blue);">Medicamentos</h1>
                   
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre Medicamento</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Descripcion</th>
                                <th>Via Administracion</th>
                                <th>Tipo de Medicamento</th>
                                <th>Caducidad</th>
                                <th>Editar</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr> 
                                <td><center><?php echo $row['nombre']; ?></center></td>
                                <td><center>
                                <?php
                                    if($row['stock'] < 20){
                                        print "<span class='status retunr'>".$row['stock']."</span>";
                                    }else{
                                        echo $row['stock'];
                                        
                                    }
                                ?></center>
                                </td>
                                <td><center>$ <?php echo $row['precio']; ?></center></td>
                                <td><center><?php echo $row['descripcion']; ?></center></td>
								<td><center><?php echo $row['via']; ?></center></td>
								<td><center><?php echo $row['tipo']; ?></center></td>
                                <td><center><?php echo $row['fecha']; ?></center></td>
                                <td><center><a href="modificar.php?idMedicamento=<?php echo $row['idMedicamento']; ?>"><img
										src="../img/edit.svg"/></a></center></td>
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