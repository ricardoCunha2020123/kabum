<?php
require("../libs/conec.php");
session_start();
error_reporting(0);

$id_endereco = $_POST["id_endereco"];
$acao = $_POST["acao"];

$id_cliente = $_POST["id_cliente"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];

$erro = 0;
$msg  = "";


switch($acao){
	CASE 1:
		$insert = "INSERT INTO endereco( id_cliente, endereco, numero, complemento, bairro, cidade, estado, cep) VALUES('$id_cliente', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep');";
		if($query=mysql_query($insert,$con)){
			$msg = "Endereco cadastrado com sucesso.";
		}
		else{
			$msg = "Erro ao cadastrar o Endereco.";
			$erro = 2;
		}				
		break;	
	CASE 3:
		if($id_endereco != ""){
			$sql_del = "DELETE FROM endereco WHERE id_endereco = $id_endereco;";
			mysql_query($sql_del,$con);
			$msg = "O endereco foi excluido com sucesso.";
		}
		else{
			$msg = "Erro ao excluir o endereco.";
			$erro = 5;
		}	
		break;
}

echo json_encode(array('erro' => $erro, 'msg' => utf8_encode($msg)));

?>