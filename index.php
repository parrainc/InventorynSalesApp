<?php

/*
 * @copyright © 2016 Team Black
 * @author Team Black
 * @project_name InventorynSalesApp
 * 
 */

	require_once("application/config/config.php");

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 *
 * Esto es para ajustar el entorno de desarrollo:
 *
 *     development - para desarrollo (mostrara errores no apto para usuario final)
 *     testing - para prueba
 *     production - para entorno de producción
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}


/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 */

	$application_folder = 'application';

	if (is_dir($application_folder)){
		define('APPPATH', $application_folder.'/');
	}
	else {
		exit("Your application folder path does not appear to be set correctly. Please open the index.php file, and correct the problem.");
	}

/*
 *---------------------------------------------------------------
 * APPLICATION BOOTSTRAP
 *---------------------------------------------------------------
 */

	if(!empty($_GET['controller'])) {
		$controller = trim($_GET['controller']);
	}else {
		$controller = "home";
	}


	if(is_file(APPPATH."controllers/".$controller."Controller.php")) {
		require_once(APPPATH."controllers/" . $controller . "Controller.php");
	}else {
		require_once(APPPATH."errors/404.php");
	}