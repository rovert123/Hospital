<?php

require '../includes/conexion.php';
// Se inicializa la sesión
session_start();
$where = "";

if($_SESSION['idRol'] != 4){
    header('location: ../login.php');
}

$sql = "SELECT medicamento.nombre AS medicamento, medicamento.descripcion AS descripcion, orden.dosificacion AS dosificacion, orden.cantidad AS cantidad, usuario.nombre AS nombreU, usuario.apellido AS apellidoU, estadoorden.nombre AS estado, estadoorden.idEstado AS idEstado FROM orden 
INNER JOIN medicamento ON orden.idMedicamento = medicamento.idMedicamento
INNER JOIN usuario ON orden.documentoUsuario = usuario.documento
INNER JOIN estadoorden ON orden.idEstado = estadoorden.idEstado
INNER JOIN paciente ON orden.documentoPaciente = paciente.documento WHERE paciente.documento = $_SESSION[documento]";
$resultado = $link->query($sql);
$id = $_SESSION["idRol"];
?>


<div class="details">
                <div class="recentOrders">
                <section class="price container" >
                <h1 style="color: var(--blue);">Ordenes</h1>

                    <table>
                        <thead>
                            <tr>                
                                <td>Medicamento</td>
                                <td>Descripcion</td>
                                <td>Dosificación</td>
                                <td>Cantidad</td>
                                <td>Prescribe</td>
                                <td>Estado</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>                   
                            <td>
								<?php echo $row['medicamento']; ?>
							</td>
                            <td>
								<?php echo $row['descripcion']; ?>
							</td>
							<td>
								<?php echo $row['dosificacion']; ?>
							</td>
							<td>
								<?php echo $row['cantidad']; ?>
							</td>
                            <td>
								<?php echo $row['nombreU']." ".$row['apellidoU'];?>
							</td>
                            <td>
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
                      
                            ?>
                            
							</td>
						</tr>
						<?php } ?>
                        </tbody>
                    </table>
                    </section>
                </div>
            </div>