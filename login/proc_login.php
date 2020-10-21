<?php
require("../libs/conec.php");
session_start();

$login = limpa_campo($_POST["login"]);
$senha = limpa_campo($_POST["senha"]);
$acao = $_POST["acao"];

$erro = 0;
$msg  = "";


switch($acao){
	CASE 1:
		$sql = "SELECT COUNT(*) as registros FROM usuario WHERE login = '$login'; ";
		$qry = mysql_query($sql,$con);
		$rs = mysql_fetch_assoc($qry);
		if($rs["registros"] >= 1){
			$msg = "Usuario ja cadastrado.";
			$erro = 1;
		}
		else{	
			$insert = "INSERT INTO usuario(login, senha) VALUES('$login', '$senha');";
			if($query=mysql_query($insert,$con)){
				$msg = "Usuario cadastrado com sucesso.";
			}
			else{
				$msg = "Erro ao cadastrar o Usuario.";
				$erro = 2;
			}
		}		
		break;
	CASE 2:
		$sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha';";
		if($query=mysql_query($sql,$con)){
			$rows = mysql_num_rows($query);
			if($rows == 1){
				$rs = mysql_fetch_assoc($query);
				$_SESSION["id_usuario"] = $rs["id_usuario"];
			}
			else{
				$msg = "Erro ao efetuar o Login.";
				$erro = 3;
			}		
		}
		else{
			$msg = "Erro ao efetuar o Login.";
			$erro = 4;
		}
		break;	
}

echo json_encode(array('erro' => $erro, 'msg' => utf8_encode($msg)));

?>