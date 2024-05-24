<?php
	require '../includes/conexion.php';


	$id = $_POST['idMedicamento'];
	$nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $precio = $_POST['precio'];
	$administracion = $_POST['administracion'];
    $tipo = $_POST['tipo'];

	$sql = "UPDATE medicamento SET idMedicamento='$id', stock='$stock', nombre='$nombre', descripcion='$descripcion',  
    fechaCaducidad='$fecha', precio='$precio', viaAdministracion='$administracion', tipoMedicamento='$tipo' WHERE idMedicamento = '$id'";

	$resultado = $link->query($sql);
?>

<html lang="es">
	<head>	
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Actualización</title>
        <link rel="stylesheet" href="../css/styleusuario.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	
	<body>
		<div class="container">
            <div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3><script type="text/javascript">
                    alert("Medicamento editado de forma correcta")
                    window.location.href="homeencargado.php";
                    </script>;</h3>
				<?php } else { ?>
				<h3><script type="text/javascript">
                    alert("Error al modificar")
                    window.location.href="homeencargado.php";
                    </script>;</h3>
				<?php } ?>
				</div>
			</div>
			</div>
		</div>
	</body>
</html>
