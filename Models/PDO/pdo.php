<?php
	// INVOCANDO A CLASSE DE CONEXÃO COM O BANCO DE DADOS
	include("../Connect.php");

	// CRIANDO UMA VARIÁVEL PARA ARMAZENAR A CONEXÃO COM O BANCO
	$con = Connect::conectar();

	// RECEBENDO UM ACTION PARA ENTENDER QUAL AÇÃO É NECESSÁRIA SER EXECUTADA AQUI DENTRO
	$action = $_POST['action'];

	// RECEBENDO O PDO_CONNECT PARA SABER QUAL ARQUIVO PDO INCLUIR
	$pdo_connect = $_POST['pdo_connect'];

	// RECEBENDO QUAL O METODO DO PDO DEVO CARREGAR PARA ESSE MODEL
	$metodo_pdo = isset($_POST['metodo_pdo']) ? $_POST['metodo_pdo'] : "metodospdo";


	// VERIFICANDO SE O ARQUIVO DO METODO POST EXISTE
	if (file_exists("metodos-pdo/".$metodo_pdo.".php")) {

		// INCLUIDO O METODO POST CORRESPONDENTE AO MODEL SOLICIDADO CASO EXISTA
		include("metodos-pdo/".$metodo_pdo.".php");

		// INSTANCIANDO O METODO POST REQUISITADO
		$metodo_pdo = new $metodo_pdo();
		// VERIFICANDO SE O PDO CONNECT EXISTE
		if (file_exists($pdo_connect.".php")) {
			
			// INCLUINDO O PDO CONNECT REQUISITADO
			include($pdo_connect.".php");

		}
	}
	
?>