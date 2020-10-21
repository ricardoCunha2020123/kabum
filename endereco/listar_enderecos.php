<?php
	require("../libs/conec.php");
	$sql_cli = "SELECT nome FROM cliente WHERE id_cliente = {$_GET["id_cliente"]}";
	$qry   = mysql_query($sql_cli,$con);
	$result = mysql_fetch_assoc($qry);
	
	$sql_end = "SELECT * FROM endereco WHERE id_cliente = {$_GET["id_cliente"]}";
	$query   = mysql_query($sql_end,$con);

?>
<link rel="stylesheet" type="text/css" href="../css/cliente.css">
<script src="../libs/jquery-3.5.1.min.js"></script>
<script src="../libs/funcoes_endereco.js"></script>

<div class="titulo">Enderecos - <?php echo($result["nome"]); ?></div>
<table width="70%" class="tab">
	<tr class="titulo_tab">
		<td>LOGRADOURO</td>
		<td>NUMERO</td>
		<td>BAIRRO</td>
		<td>COMPLEMENTO</td>
		<td>CIDADE</td>
		<td>ESTADO</td>
		<td>CEP</td>
		<td>EXCLUIR</td>
	</tr>
	
<?php
	if(mysql_num_rows($query) == 0){
		echo("<tr><td colspan='8' style='padding:2px; text-align:center;'>NENHUM ENDERECO CADASTRADO</td></tr>");
	}
	else{
		$i = 0;
		while($rs = mysql_fetch_assoc($query)){
?>	
	<tr>
		<td><?php echo($rs["endereco"]);?></td>
		<td><?php echo($rs["numero"]);?></td>
		<td><?php echo($rs["bairro"]);?></td>
		<td><?php echo($rs["complemento"]);?></td>
		<td><?php echo($rs["cidade"]);?></td>
		<td><?php echo($rs["estado"]);?></td>
		<td><?php echo($rs["cep"]);?></td>
		<td><input type="button" value="Excluir" name="bt_del_end" id="bt_del_end" class="button_red" onclick="excluir_endereco(<?php echo($rs["id_endereco"]);?>);"></td>
	</tr>
<?php
			$i++;
		}
	}		
?>		
</table>
<div style="width: 70%; text-align:center;">
	<input type="button" name="bt_inserir_endereco" id="bt_inserir_endereco" value="Adicionar Endereco" class="button_blue" onclick="inserir_endereco(<?php echo($_GET["id_cliente"]);?>);">
	<input type="button" name="bt_voltar" id="bt_voltar" value="Voltar" class="button_blue" onclick="voltar();">
</div>
