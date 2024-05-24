<?php
// initializ shopping cart class
include 'La-carta.php';
if($_SESSION['idRol'] != 3){
    header('location: ../index.php');
}
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ver Carrito</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    input[type="number"]{width: 20%;}
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
</head>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="index.php">Inicio</a></li>
  <li role="presentation" class="active"><a href="VerCarta.php">Ver Carrito</a></li>
  <li role="presentation"><a href="Pagos.php">Pagos</a></li>
  <li role="presentation"><a href="../includes/homeencargado.php">Volver al Inicio</a></li>
</ul>
</div>

<div class="panel-body">


    <center><h1>Carrito de Compras</h1></center>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["nombre"]; ?></td>
            <td><?php echo '$'.$item["precio"].' COP'; ?></td>
            <td><input type="number" class="form-control text-center" readonly value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '$'.$item["subtotal"].' COP'; ?></td>
            <td>
                <a href="AccionCarta.php?action=removeCartItem&idMedicamento=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('¿Eliminar Producto del Carrito?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Tu carta esta vacia.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Volver a Medicamentos</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' COP'; ?></strong></td>
            <td><a href="Pagos.php" class="btn btn-success btn-block">Pagar <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    
    </div>

 </div><!--Panek cierra-->
 
</div>
</body>
</html>