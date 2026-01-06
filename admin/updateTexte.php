<?php
require('../inc/functions.php');

session_start();
$sessionid = $_REQUEST["PHPSESSID"];

$etat = $_POST['etat'] ;
$texte = addslashes($_POST['texte']);
$textea = addslashes($_POST['textea']);
$id = $_POST['id'];
//if (isset($_POST['idC'])) { $idC = $_POST['idC']; $id =  } else { $idC = 0; }

$query = "UPDATE textpool set texte = '" . $texte . "', texteA = '" . $textea . "' where idTextPool = " . $id; // . " AND  idCategorie = " . $idC;
//echo $query;
$result = SQL($query);

mysql_close();

header("Location:adminMenus.php");
exit();

?>

