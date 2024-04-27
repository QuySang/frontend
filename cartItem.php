<?php
    include "connect.php";
	session_start();
	$tong=0;	
	if (isset($_POST['id_SP'])) {
		$id_SP = $_POST['id_SP'];
		$sqlGet = "SELECT * FROM SAN_PHAM WHERE ID_SP=$id_SP";
		$result = $conn->query($sqlGet);
		$data=[];
		$sl = 1;
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$row['sl'] = $sl;
				$data[] = $row;
			}
		}
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = $data;
		} else {
			$cart=$_SESSION['cart'];
			$flag = true;
			foreach ($cart as $key => $value) {
				if ($value['ID_SP'] == $id_SP) {
					$_SESSION['cart'][$key]['sl'] = $value['sl'] + 1;
					$flag = false;
					break;
				}
			}
			if ($flag) {
				// Thêm mảng dữ liệu sản phẩm vào giỏ hàng
				$_SESSION['cart']= array_merge($cart ,$data);
			}
		}
        
		
	}
	if(isset($_POST['sl'])){
		$sl= $_POST['sl'];
		$id_SP=$_POST['id_SP'];
		if(isset($_SESSION['cart'])){
			$cart=$_SESSION['cart'];
			foreach ($cart as $key => $value) {
				if ($value['ID_SP'] == $id_SP) {
					$_SESSION['cart'][$key]['sl'] = $sl;
					break;
				}
			}
			
		}
		
	}
	$newCart= $_SESSION['cart'];
	$slCart =count($newCart);
    echo $slCart;
?>