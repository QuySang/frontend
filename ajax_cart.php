<?php
    session_start();
  if(isset($_SESSION['cart'])){
    
    $ca=$_SESSION['cart'];
    var_dump($ca);
    foreach($ca as $key=> $va){
        echo $va['ID_TT'] ."<br>";
    }
  }else{
    echo "loi";
  }
   echo "!23";
?>