<?php 

class metodospdo
{
	
	public function selectAll($con,$table){
		$sql = $con->prepare(
					"SELECT * FROM `".$table."`"
		);
		// EXECUTANDO A SQL PREPARADA ACIMA
		$sql->execute();//Nenhum array passado, pois é uma busca geral
		$result = $sql->fetchAll(PDO::FETCH_ASSOC);//Pegando todos os resultado pelo fetchAll e atribuindo a variável result
		return $result;
	}//SELECT ALL -- FIM

	public function selectAllById($con,$table,$arr_1,$id){
		$sql = $con->prepare(
					"SELECT * FROM `".$table."` WHERE `".$arr_1."` = ?"
		);

		// EXECUTANDO A SQL PREPARADA ACIMA
		$sql->execute(array($id));//Array com os dados referente a query
		$result = $sql->fetchAll(PDO::FETCH_ASSOC);//Pegando todos os resultado pelo fetchAll e atribuindo a variável result
		return $result;
	}//SELECT ALL BY ID -- FIM

	public function selectEspeficById($con,$table,$arr_1,$arr_2,$id){
		$sql = $con->prepare(
					"SELECT ".$arr_1." FROM `".$table."` WHERE `".$arr_2."` = ?"
		);

		// EXECUTANDO A SQL PREPARADA ACIMA
		$sql->execute(array($id));//Array com os dados referente a query
		$result = $sql->fetchAll(PDO::FETCH_ASSOC);//Pegando todos os resultado pelo fetchAll e atribuindo a variável result
		return $result;
	}//SELECT ESPECIFIC BY ID -- FIM

	public function selectEspeficAll($con,$table,$arr_1){
		$sql = $con->prepare(
					"SELECT ".$arr_1." FROM `".$table."`"
		);

		// EXECUTANDO A SQL PREPARADA ACIMA
		$sql->execute();//Não necessita de array
		$result = $sql->fetchAll(PDO::FETCH_ASSOC);//Pegando todos os resultado pelo fetchAll e atribuindo a variável result
		return $result;

	}//SELECT ESPECIFIC ALL -- FIM

	public function selectMultiplyWhere($con,$table,$arr_1,$values){
		$sql = $con->prepare(
					"SELECT * FROM `".$table."` WHERE ".$arr_1.""
		);

		// EXECUTANDO A SQL PREPARADA ACIMA
		$sql->execute($values);//Não necessita de array
		$sql->fetchAll(PDO::FETCH_ASSOC);//Pegando todos os resultado pelo fetchAll e 
		if ($sql->rowCount() == 1) {
			return true;
		}else{
			return false;
		}

	}//SELECT ESPECIFIC ALL -- FIM

	public function updateTable($con,$table,$arr_1,$arr_2,$values){
		$sql = $con->prepare("
			UPDATE `".$table."` SET ".$arr_1." WHERE ".$arr_2." = ?
		");

		$sql->execute($values);

		if ($sql->rowCount() == 1) {

			return true;

		}else{

			return false;

		}//FIM ELSE


	}//UPDATETABLE -- FIM


	public function insertTable($con,$table, $arr_1, $arr_2, $valores){
		$sql = $con->prepare("
			INSERT INTO ".$table." (".$arr_1.") VALUES (".$arr_2.")
		");
		

		$sql->execute($valores);

		if ($sql->rowCount() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteById($con, $table,$arr_1,$id){
		$sql = $con->prepare("
			DELETE FROM `".$table."` WHERE `".$arr_1."` = ?
		");

		$sql->execute(array($id));
		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return "false";
		}
		
	}
}


?>