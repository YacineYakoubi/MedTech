<?php 
require_once("Medtech/connect.inc.php");
session_start();
if (isset($_POST['button'])){
$requete="select MailP, count(*) as exist from praticien where MailP='".$_POST['username']."' and MdpPraticient='".$_POST['password']."'  ";
$resultat=mysql_query($requete);
$ele=mysql_fetch_array($resultat);
/****verifier compte patient ******/
$requete1="select *, count(*) as exist1 from patient where Email='".$_POST['username']."' and MdpPatient='".$_POST['password']."'  ";
$resultat1=mysql_query($requete1);
$ele1=mysql_fetch_array($resultat1);
/****** verfier compte auxilliare *****/
$requete2="select *, count(*) as exist2 from auxiliaire where Email='".$_POST['username']."' and MdpAux='".$_POST['password']."'  ";
$resultat2=mysql_query($requete2);
$ele2=mysql_fetch_array($resultat2);
/*****verifer compte assisstant medical ****/
$requete3="select *, count(*) as exist3 from assistantmedical where Email='".$_POST['username']."' and MdpAssi='".$_POST['password']."'  ";
$resultat3=mysql_query($requete3);
$ele3=mysql_fetch_array($resultat3);
if ($ele['exist'])
{
$_SESSION['username']=$ele['MailP'];
header("Location:Medtech/index.php");
}
else if ($ele1['exist1'])
{
$_SESSION['username']=$ele1['Email'];
 header("Location:Medtech/interfacePatient.php");

}else if ($ele2['exist2']){
$_SESSION['username']=$ele2['Email'];
header("Location:Medtech/index1.php");

}
else if ($ele3['exist3']){
$_SESSION['username']=$ele3['Email'];
header("Location:Medtech/index2.php");

}else {
header("Location:Medtech/pages/examples/404.php");


}


}

?>

<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>MedTech</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="img/logo.png" ;="" length="150" alt="" width="150">
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="index.php" method="post">
		<h3 class="form-title">SE CONNECTER </h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Connecter-vous pour acceder � votre  compte   </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Utilisateur</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="on" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Mot de Pass </label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="on" placeholder="Password" name="password"/>
			</div>
		</div>
		
		
		
		<div class="form-actions">
	
			<button type="submit" class="btn blue pull-right" name="button" >Envoyer
			
			</button>
		</div>
		
		
		
     
    <div class="forget-password">
			<h4>Mot de passe oublié?</h4>
			<p>
				  <a href="javascript:;" id="forget-password"> cliquer ici
				 </a>
				
			</p>
		</div>
	</form>
	<form class="forget-form" action="index.html" method="post">
		<h3>Mot de passe oublié ?</h3>
		<p>
			 Entrer  votre  adresse e-mail pour réinitialiser votre mot de passe 
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Retour </button>
			<button type="submit" class="btn blue pull-right">
			Envoyer <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->

	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->

<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "assets/admin/pages/media/1.jpg",
        "assets/admin/pages/media/2.jpg",
        "assets/admin/pages/media/3.jpg",
        "assets/admin/pages/media/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>