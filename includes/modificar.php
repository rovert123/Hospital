<?php
    require '../includes/conexion.php';
    session_start();

        $id = $_GET['idMedicamento'];
        $sql = "SELECT * FROM medicamento WHERE idMedicamento = '$id'";
        $resultado = $link->query($sql);
        $row = $resultado->fetch_array(MYSQLI_ASSOC);
    
        $sql3 = "SELECT * FROM administracion";
        $resultado3 = $link->query($sql3);
    
        $sql4 = "SELECT * FROM tipomedicamento";
        $resultado4 = $link->query($sql4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Modificar Medicamento</title>
    <link rel="stylesheet" href="../css/styleusuario.css">
    <link rel="shortcut icon" href="../img/editar.png" />
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="finger-print-outline"></ion-icon></span>
                        <span class="title"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
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
                    <form method="POST" action="update.php" autocomplete="off"method="post">
                        <section class="price container" >
                                <h1 style="color: var(--blue);">Ingresar Medicamentos</h1>
                                <br>
                                <p class="text-center txt">Complete este formulario para registrar los nuevos medicamentos</p>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="idMedicamento"  readonly placeholder="id Medicamento" value="<?php echo $row['idMedicamento'];?>">
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="nombre" required placeholder="Nombre Medicamento" value="<?php echo $row['nombre'];?>">
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="stock" required placeholder="Cantidad" value="<?php echo $row['stock'];?>">
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="text" name="descripcion" required placeholder="Descripcion" value="<?php echo $row['descripcion'];?>">
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="date" name="fecha" required  placeholder="Fecha" value="<?php echo $row['fechaCaducidad'];?>">
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <input type="number" name="precio" required placeholder="Precio" value="<?php echo $row['precio'];?>">
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="administracion" id="administracion" required>
                                            <option value="">Seleccione la via de administracion</option>

                                                <?php while ($row = $resultado3->fetch_array(MYSQLI_ASSOC)){
                                                            echo "<option value='".$row['idAdministracion']."'>".$row['nombre']."</option>";
                                                        }
                                                ?>

                                        </select>
                                    </label>
                                </div>
                                <br>
                                <div class="search">
                                    <label>
                                        <select name="tipo" id="tipo" required>
                                            <option value="">Seleccione la presentación del medicamento</option>

                                                <?php while ($row = $resultado4->fetch_array(MYSQLI_ASSOC)){
                                                            echo "<option value='".$row['idTipomedicamento']."'>".$row['nombre']."</option>";
                                                        }
                                                ?>

                                        </select>
                                    </label>
                                </div>
                                <div class="forms-container">
                                    <div class="signin-signup">
                                    <center><button type="submit" class="btn">Registrar</button>
                                    <a href="homeencargado.php"><input type="button" class="btn" value="Volver"></a></center>
                                    
                                    </div>
                                </div>
                        </section>
                    </form>
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