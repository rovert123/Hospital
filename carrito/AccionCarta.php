<?php
date_default_timezone_set("America/Lima");
// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;
include 'Configuracion.php';
$query = $db->query("SELECT * FROM usuario WHERE documento = $_SESSION[documento]");
$custRow = $query->fetch_assoc();
// include database configuration file
include 'Configuracion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['idMedicamento'])){
        $productID = $_REQUEST['idMedicamento'];
        // get product details
        $query = $db->query("SELECT * FROM medicamento WHERE idMedicamento = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'idMedicamento' => $row['idMedicamento'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarta.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['idMedicamento'])){
        $itemData = array(
            'rowid' => $_REQUEST['idMedicamento'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['idMedicamento'])){
        $deleteItem = $cart->remove($_REQUEST['idMedicamento']);
        header("Location: VerCarta.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO pedido (customer_id, total_price, created, modified) VALUES ('".$custRow['documento']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            $sql2 = '';
            $sql3 = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO pedido_articulos (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['idMedicamento']."', '".$item['qty']."');";
                $sql .= "UPDATE medicamento SET stock = stock-$item[qty] WHERE idMedicamento = '$item[idMedicamento]' ;";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$orderID");
            }else{
                header("Location: Pagos.php");
            }
        }else{
            header("Location: Pagos.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}