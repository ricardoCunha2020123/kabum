<?php
	$sql_cli = "SELECT id_cliente, nome, cpf, rg, telefone, DATE_FORMAT(data_nasc, '%d/%m/%Y') as data_nasc FROM cliente WHERE id_usuario = {$_SESSION["id_usuario"]}";
	$query   = mysql_query($sql_cli,$con);

?>
<link rel="stylesheet" type="text/css" href="css/cliente.css">
<script src="libs/jquery-3.5.1.min.js"></script>
<script src="libs/funcoes_cliente.js"></script>

<div class="titulo">Gerenciador de Clientes</div>
<table width="70%" class="tab">
	<tr class="titulo_tab">
		<td></td>
		<td>NOME</td>
		<td>CPF</td>
		<td>RG</td>
		<td>TELEFONE</td>
		<td>DATA DE NASC.</td>
		<td>ENDERECO</td>
	</tr>
	
<?php
	if(mysql_num_rows($query) == 0){
		echo("<tr><td colspan='7' style='padding:2px; text-align:center;'>NENHUM CLIENTE CADASTRADO</td></tr>");
	}
	else{
		$i = 0;
		while($rs = mysql_fetch_assoc($query)){
?>	
	<tr>
		<td><input type="radio" name="id_cliente" id="id_cliente_<?php echo($i);?>" value="<?php echo($rs["id_cliente"]);?>"></td>
		<td><?php echo($rs["nome"]);?></td>
		<td><?php echo($rs["cpf"]);?></td>
		<td><?php echo($rs["rg"]);?></td>
		<td><?php echo($rs["telefone"]);?></td>
		<td><?php echo($rs["data_nasc"]);?></td>
		<td><input type="button" value="Ver Enderecos" name="bt_endereco" id="bt_endereco" class="button_green" onclick="exibir_endereco(<?php echo($rs["id_cliente"]);?>);"></td>
	</tr>
<?php
			$i++;
		}
	}		
?>		
</table>
<div style="width: 70%; text-align:center;">
			<input type="button" name="bt_inserir_cli" id="bt_inserir_cli" value="Inserir" class="button_blue">
			<input type="button" name="bt_editar_cli" id="bt_editar_cli" value="Editar" class="button_green">
			<input type="button" name="bt_excluir_cli" id="bt_excluir_cli" value="Excluir" class="button_red">
		</div>
