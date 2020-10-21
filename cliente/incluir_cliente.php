<?php
error_reporting(0);
require("../../kabum/libs/conec.php");
function montar_ano(){
	$ano_atual=date("Y");
	echo("<select name='ano' id='ano' size='1' style='width:45%'>");
	for($ano = $ano_atual; $ano >=1900; $ano--)
		echo("<option>$ano</option>");
	echo("</select>");
}

$sql_cli = "SELECT id_cliente, nome, cpf, rg, telefone, DATE_FORMAT(data_nasc, '%d/%m/%Y') as data_nasc FROM cliente WHERE id_cliente = {$_GET["id_cliente"]}";
$query   = mysql_query($sql_cli,$con);
$rs =  mysql_fetch_assoc($query);
if($_GET["id_cliente"] == ""){
	$bt_inserir = "";
	$bt_alterar = "disabled";
}
else{
	$bt_inserir = "disabled";
	$bt_alterar = "";
}
?>

<link rel="stylesheet" type="text/css" href="../css/cliente.css">
<script src="../libs/jquery-3.5.1.min.js"></script>
<script src="../libs/jquery.mask.js"></script>
<script src="../libs/funcoes_cliente.js"></script>


<form action="cliente/proc_cliente.php" method="POST">
	<div class="center">
		<div class="titulo">
			Cadastro de Clientes
		</div>
		<div>
			NOME<br>
			<input type="text" name="nome" id="nome" value="<?php echo($rs["nome"]);?>" style="width:95%;">
		</div>
		<div>
			CPF<br>
			<input type="text" name="cpf" id="cpf" value="<?php echo($rs["cpf"]);?>" style="width:95%;" class="cpf">
		</div>
		<div>
			RG<br>
			<input type="text" name="rg" id="rg" value="<?php echo($rs["rg"]);?>" style="width:95%;">
		</div>
		<div>
			TELEFONE<br>
			<input type="text" name="telefone" id="telefone" value="<?php echo($rs["telefone"]);?>" style="width:95%;" class="fone">
		</div>
		<div>
			DATA NASCIMENTO<br>
			<div>
				<select name="dia" id="dia" size="1" style="width:25%;">
					<option value="01">01</option>  
					<option value="02">02</option>  
					<option value="03">03</option>  
					<option value="04">04</option>  
					<option value="05">05</option>  
					<option value="06">06</option>  
					<option value="07">07</option>  
					<option value="08">08</option>  
					<option value="09">09</option>  
					<option value="10">10</option>  
					<option value="11">11</option>  
					<option value="12">12</option>  
					<option value="13">13</option>  
					<option value="14">14</option>  
					<option value="15">15</option>  
					<option value="16">16</option>  
					<option value="17">17</option>  
					<option value="18">18</option>  
					<option value="19">19</option>  
					<option value="20">20</option>  
					<option value="21">21</option>  
					<option value="22">22</option>  
					<option value="23">23</option>  
					<option value="24">24</option>  
					<option value="25">25</option>  
					<option value="26">26</option>  
					<option value="27">27</option>
					<option value="29">29</option>  
					<option value="30">30</option>  
					<option value="31">31</option>
				</select>
				<select name="mes" id="mes" size="1" style="width:25%;">
					<option value="01">01</option>  
					<option value="02">02</option>  
					<option value="03">03</option>  
					<option value="04">04</option>  
					<option value="05">05</option>  
					<option value="06">06</option>  
					<option value="07">07</option>  
					<option value="08">08</option>  
					<option value="09">09</option>  
					<option value="10">10</option>  
					<option value="11">11</option>  
					<option value="12">12</option>  
				</select>
				<?php montar_ano(); ?>
			</div>				
		</div>
		<div>
			<input type="button" name="bt_add_cliente" id="bt_add_cliente" value="Cadastrar" class="button_blue" <?php echo("$bt_inserir"); ?> >
			<input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo($_GET["id_cliente"]);?>" >
		</div>
		<div>
			<input type="button" name="bt_alter_cli" id="bt_alter_cli" value="Alterar" class="button_green" <?php echo("$bt_alterar"); ?>>
		</div>
	</div>
</form>
