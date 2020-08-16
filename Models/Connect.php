<?php
// CLASSE FEITA PARA FAZER A CONEXÃO COM O BANCO DE DADOS PELO PDO
	
	// INICIANDO SESSÃO QUE VAI SER USADO PELOS MODELS
	session_start();
	date_default_timezone_set('GMT');
	// CRIANDO AS CONSTANTES QUE SERÃO UTILIZADAS DENTRO DO PDO, POIS AS CONSTANTES DO APP.PHP NÃO IRÃO FUNCIONAR AQUI POIS ACESSAMOS OS MODELS VIA AJAX
	define("PREFIX",'lucas_');
	define("HOST","localhost"); //Constante para o host da hospedagem
	define("DATABASE","expdo"); //Nome da base de dados ::: lapise92_db_pa
	define("USER","root"); //Usuário do servidor de banco de dados ::: lapise92_db_pa
	define("PASS",""); // Senha do servidor de banco de dados
	define("INCLUDE_PATH",'http://localhost/KNipex/'); // Constante com o caminho para a raiz do sistema ||| http://localhost/PA2/BLOG/

	define("INCLUDE_PATH_FULL",INCLUDE_PATH . 'Views/src/');// Constante com o caminho até a pages do sistema ||| http://localhost/PA2/BLOG/Views/pages/
	
	// CLASSE DE CONEXAO QUE VAI SER INVOCADA NOS MODELS
	class Connect
	{
		private static $pdo; // Variável do PDO que está privada e estática
		// FUNÇÃO DE CONECTAR
		public static function conectar(){

			// CASO O PDO JÁ EXISTA SÓ RETORNA ESSA CONEXÃO JÁ FEITA
			if (self::$pdo) {
				return self::$pdo; //Retornando a variável com a conexão já existente
			}else{

				// USANDO TRY PARA O SISTEMA TENTAR CRIAR A CONEXÃO E CONTROLARMOS OS ERROS
				try{
					// CRIANDO A NOVA CONEXÃO DO PDO DENTRO DA NOSSA VARIÁVEL
					self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASS);	
					return self::$pdo; //Retornando o nova conexão PDO dentro da variável

				}catch(Exception $e){ //Criando a mensagem personalizada para erros de conexão
					echo "Não foi possivel se conectar ao Bando de Dados";
				}
			}
		}
	}

?>