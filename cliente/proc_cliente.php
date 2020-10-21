<?php
require("../libs/conec.php");
session_start();

$id_cliente = limpa_campo($_POST["id_cliente"]);
$acao = $_POST["acao"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$telefone = $_POST["telefone"];
$data_nasc = $_POST["data_nasc"];

$erro = 0;
$msg  = "";


switch($acao){
	CASE 1:
		$insert = "INSERT INTO cliente(id_usuario, nome, cpf, rg, telefone, data_nasc) VALUES({$_SESSION["id_usuario"]}, '$nome', '$cpf', '$rg', '$telefone', '$data_nasc');";
		if($query=mysql_query($insert,$con)){
			$msg = "Cliente cadastrado com sucesso.";
		}
		else{
			$msg = "Erro ao cadastrar o Usuario.";
			$erro = 2;
		}				
		break;
	CASE 2:
		$sql = "UPDATE cliente
				   SET nome = '$nome', 
					   cpf = '$cpf', 
					   rg = '$rg', 
					   telefone = '$telefone',
				       data_nasc = '$data_nasc'
			     WHERE id_cliente = $id_cliente;";
				//die("$sql"); 
		if($query=mysql_query($sql,$con)){
			$msg = "Cliente alterado com sucesso.";			
		}
		else{
			$msg = "Erro ao alterar o Cliente.";
			$erro = 3;
		}
		break;	
	CASE 3:
		if($id_cliente != ""){
			$sql = "DELETE FROM endereco WHERE id_cliente = $id_cliente;";
			$sql_del = "DELETE FROM cliente WHERE id_cliente = $id_cliente;";
			mysql_query($sql,$con);
			mysql_query($sql_del,$con);
			$msg = "O cliente foi excluido com sucesso.";
		}
		else{
			$msg = "Erro ao excluir o cliente.";
			$erro = 5;
		}	
		break;
}

echo json_encode(array('erro' => $erro, 'msg' => utf8_encode($msg)));

?>