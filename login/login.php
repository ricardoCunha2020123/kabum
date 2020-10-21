
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="libs/jquery-3.5.1.min.js"></script>
<script src="libs/funcoes_login.js"></script>

<form action="login/proc_login.php" method="POST">
	<div class="center">
		<div class="titulo">
			Gerenciador de Clientes
		</div>
		<div>
			Usuario<br>
			<input type="text" name="login" id="login" maxlength="15">
		</div>
		<div>
			Senha<br>
			<input type="password" name="senha" id="senha" maxlength="15">
		</div>
		<div>
			<input type="button" name="bt_login" id="bt_login" value="Entrar" class="button_blue">
		</div>
		<div>
			<input type="button" name="bt_cadastro" id="bt_cadastro" value="Criar Cadastro" class="button_green">
		</div>
	</div>
</form>
