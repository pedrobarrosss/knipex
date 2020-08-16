<?php 
	
	function load($class){
		$class = str_replace("\\", "/", $class);
		$diretorios = [
			'',
			'/Controllers',
			'/Models',
			'/Views'
		];

		

		foreach ($diretorios as $diretorio) {
			if (file_exists(__DIR__.$diretorio.DIRECTORY_SEPARATOR.$class.".php")) {
				require_once (__DIR__.$diretorio.DIRECTORY_SEPARATOR.$class.".php");
			}
			
		}

	};

	spl_autoload_register(__NAMESPACE__."load");


	$app = new App();
	$app->executar();

?>