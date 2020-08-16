<?php
	session_start();
	define("INCLUDE_PATH",'http://localhost/KNipex/');//http://localhost/PA2/BLOG/
	define("INCLUDE_PATH_FULL",INCLUDE_PATH.'Views/src/');//http://localhost/PA2/BLOG/Views/pages/
	echo "<script> const includePath = '".INCLUDE_PATH."';</script>";
	echo "<script> const includePathFull = '".INCLUDE_PATH_FULL."';</script>";
	class App
	{

		public static function executar(){
			$url = isset($_GET['url']) ? explode("/", $_GET['url'])[0] : 'home';
			$url = ucfirst($url);
			$url.="Controller";
			if (file_exists("Controllers/".$url.".php")) {
				$className = "Controllers\\".$url;
				$controller = new $className();
				$controller->executar();
			}else{
				$url = "NotfoundController";
				$className = "Controllers\\".$url;
				$controller = new $className();
				$controller->executar();
			}
		}

		
	}
?>