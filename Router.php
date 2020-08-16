<?php 
	
	class Router
	{
		
		public static function rota($path,$arg){
			$url = $_GET['url'];
			if ($path == $url) {
				$arg();
				die();
			}
			$path = explode('/',$path);
			$url = explode("/",$_GET['url']);
			$ok = true;
			$id = [];
			if (count($path) == count($url)) {
				foreach ($path as $key => $value) {
					if ($value == "?") {
						$id[$key] = $url[$key];
					}
				}
				if ($ok) {
					$arg($id);
					die();
				}
			}
		}
	}

?>