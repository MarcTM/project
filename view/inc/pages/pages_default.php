<?php
	switch($_GET['page']){
		case "controller_homepage";
			include("module/inicio/controller/".$_GET['page'].".php");
			break;
		case "controller_login";
			include("module/login/controller/".$_GET['page'].".php");
			break;
		case "controller_shop";
			include("module/shop/controller/".$_GET['page'].".php");
			break;
		case "controller_cart";
			include("module/cart/controller/".$_GET['page'].".php");
			break;
		case "controller_details";
			include("module/details/controller/".$_GET['page'].".php");
			break;
		case "controller_contact";
			include("module/contact/controller/".$_GET['page'].".php");
			break;
		case "services";
			include("module/services/".$_GET['page'].".html");
			break;
		case "aboutus";
			include("module/aboutus/".$_GET['page'].".html");
			break;
		case "404";
			include("view/inc/error".$_GET['page'].".html");
			break;
		case "503";
			include("view/inc/error".$_GET['page'].".html");
			break;
		default;
			$callback = 'index.php?page=controller_homepage&op=list';
			die('<script>window.location.href="'.$callback .'";</script>');
			break;
	}
?>