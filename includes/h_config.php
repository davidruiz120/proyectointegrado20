<?php

// Fichero de configuración para guardar en variables, el nombre de las páginas actuales
// y el contenido del 'title' en el 'head'

	switch ($_SERVER["SCRIPT_NAME"]) {

		// case Casa de subastas
		case "/auctionhouse/index.php":
			$CURRENT_PAGE = "Casa de Subastas"; 
			$PAGE_TITLE = "Forza ATAX | Casa de Subastas";
			break;
			
		// case Páginas básicas
		case "/login.php":
			$CURRENT_PAGE = "Login"; 
			$PAGE_TITLE = "Forza ATAX | Iniciar sesión";
			break;
		case "/registro.php":
			$CURRENT_PAGE = "Registro"; 
			$PAGE_TITLE = "Forza ATAX | Registrarse";
			break;
		case "/perfil.php":
			$CURRENT_PAGE = "Perfil"; 
			$PAGE_TITLE = "Forza ATAX | Perfil";
			break;
		case "/index.php":
			$CURRENT_PAGE = "Index"; 
			$PAGE_TITLE = "Forza ATAX";
			break;
		/*case "/politica.php":
			$CURRENT_PAGE = "Política de privacidad"; 
			$PAGE_TITLE = "Política de privacidad";
			break;
		case "/terminos.php":
			$CURRENT_PAGE = "Términos legales"; 
			$PAGE_TITLE = "Términos legales";
			break;*/
		default:
			$CURRENT_PAGE = "Página-no-establecida";
			$PAGE_TITLE = "Forza ATAX | Página desconocida";
	}

?>