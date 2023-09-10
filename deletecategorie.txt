<?php
// include '../Controller/ReclamationsC.php';
include ('C:\xampp\htdocs\Project\Controller\ReclamationsC.php');
$reclamationC = new reclamationC();
$reclamationC->deleteReclamation($_GET["idReclamation"]);
header('Location:indexRec.php');
?>