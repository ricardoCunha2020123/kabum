<?php
error_reporting(0);
require("../../kabum/libs/conec.php");
?>

<link rel="stylesheet" type="text/css" href="../css/cliente.css">
<script src="../libs/jquery-3.5.1.min.js"></script>
<script src="../libs/jquery.mask.js"></script>
<script src="../libs/funcoes_endereco.js"></script>


<form action="cliente/proc_cliente.php" method="POST">
	<div class="center">
		<div class="titulo">
			Cadastro de Endereco
		</div>
		<div>
			LOGRADOURO<br>
			<input type="text" name="endereco" id="endereco" style="width:95%;">
		</div>
		<div>
			NUMERO<br>
			<input type="text" name="numero" id="numero"  style="width:95%;" >
		</div>
		<div>
			BAIRRO<br>
			<input type="text" name="bairro" id="bairro"  style="width:95%;">
		</div>
		<div>
			COMPLEMENTO<br>
			<input type="text" name="complemento" id="complemento" style="width:95%;">
		</div>
		<div>
			CIDADE<br>
			<input type="text" name="cidade" id="cidade" style="width:95%;" >
		</div>
		<div>
			ESTADO<br>
			<input type="text" name="estado" id="estado" style="width:95%;" maxlength="2">
		</div>
		<div>
			CEP<br>
			<input type="text" name="cep" id="cep" style="width:95%;" class="cep">
		</div>
		<div>
			<input type="button" name="bt_add_endereco" id="bt_add_endereco" value="Cadastrar" class="button_blue" >
			<input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo($_GET["id_cliente"]);?>" >
		</div>
	</div>
</form>
