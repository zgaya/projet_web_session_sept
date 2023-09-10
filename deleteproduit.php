<?php
// include '../controller/produitC.php';
include ('C:\xampp\htdocs\projetweb1\controller\produitC.php');
$produitC = new produitC();
$produitC->supprimerproduit($_GET["idProduit"]);
 header('Location:listProduct.php');
?>