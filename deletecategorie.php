<?php
// include '../Controller/ReclamationsC.php';
include ('C:\xampp\htdocs\projetweb1\controller\categorieC.php');
$categorieC = new categorieC();
$categorieC->supprimercategorie($_GET["idCategorie"]);
 header('Location:listCategory.php');
?>