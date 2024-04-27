<?php
    include "connect.php";
    session_start();
    if(isset($_GET['id'])){
        $id_SP=$_GET['id'];
        echo $id_SP;
        $sql="DELETE  FROM SAN_PHAM where ID_SP=$id_SP";
        $result=$conn->query($sql);
        var_dump($result);
        if($result){
            header("Location: my-product.php");
        }
    }if(isset($_POST['id_Xoa'])){
		$id_Xoa=$_POST['id_Xoa'];
		if(isset($_SESSION['cart'])){
			$cart=$_SESSION['cart'];
			foreach ($cart as $key => $value) {
				if ($value['ID_SP'] == $id_Xoa) {
					unset($_SESSION['cart'][$key]);
					break;
				}
			}	
		}
		$newCart= $_SESSION['cart'];
		$slCart =count($newCart);
		echo $slCart;
	}
    
?>