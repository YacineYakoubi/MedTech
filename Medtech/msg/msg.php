<?php
require_once("connect.inc.php");
session_start();
//-------requete  -------------//

$requete="SELECT count(*) as nbfois FROM notification  WHERE Praticien_IdPraticien ='".$_SESSION['username']."'";
$resultat=mysql_query($requete);
$tablep=mysql_fetch_array($resultat);
echo $tablep['nbfois'];

 ?>