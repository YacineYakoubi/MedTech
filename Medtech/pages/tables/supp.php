<?php  
require_once("../../connect.inc.php");
$requete5="DELETE FROM notification WHERE Patient_IdPatient ='".$_GET['id']."'";
$resultat45=mysql_query($requete5); 
$requete123="DELETE FROM patient WHERE IdPatient='".$_GET['id']."'";
$resultat123=mysql_query($requete123); 
header("Location:../../index.php");

 ?>