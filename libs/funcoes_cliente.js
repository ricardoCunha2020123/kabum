$( document ).ready(function() {
	$("#bt_excluir_cli").click(excluir_cli);
	$("#bt_inserir_cli").click(exibir_cad_cli);
	$("#bt_editar_cli").click(alterar_cad_cli);
	$("#bt_alter_cli").click(cadastrar);
	$("#bt_add_cliente").click(cadastrar);
	$('.cpf').mask('000.000.000-00', {reverse: true});
	$('.fone').mask('(00)0000-0000');
});

function excluir_cli(){
	var id_cliente = $("input[type=radio][name=id_cliente]:checked").val();
	
	if(id_cliente === undefined){
		alert("Selecione um cliente para excluir.");
	}
	else{
		$.post( "cliente/proc_cliente.php", 
			{ acao : 3,
			  "id_cliente": id_cliente
			}, 
		function( data ) {
		  alert(data.msg); 	
		  if(data.erro == 0)
			 window.location.reload();	 		 
		}, "json");
	}
	
}

function exibir_cad_cli(){
	window.location = "../kabum/cliente/incluir_cliente.php";
}

function alterar_cad_cli(){
	var id_cliente = $("input[type=radio][name=id_cliente]:checked").val();
	
	if(id_cliente === undefined){
		alert("Selecione um cliente.");
	}
	else{
		window.location = "../kabum/cliente/incluir_cliente.php?id_cliente="+id_cliente;
	}	
}


function validacao(acao){
	if($("#nome").val() == ""){
		alert("Informe o Nome do cliente.");
		$("#nome'").focus();
		return 0;
	}
	else if($("#cpf").val() == ""){
		alert("Informe o CPF.");
		$("#cpf").focus();
		return 0;
	}
	else{
		return acao;
	}
}

function cadastrar(){
	if($("#id_cliente").val() == "")
		acao = 1;
	else
		acao = 2;	
	retorno = validacao(acao);
	if(retorno > 0){
		$.post( "../cliente/proc_cliente.php", 
			{ "acao" : retorno,
			  id_cliente: $("#id_cliente").val(),
			  nome: $("#nome").val(),
			  cpf: $("#cpf").val(),
			  rg: $("#rg").val(),
			  telefone: $("#telefone").val(),
			  data_nasc: $("#ano").val()+"-"+$("#mes").val()+"-"+$("#dia").val()
			}, 
		function( data ) {
		  alert(data.msg); 	
		  if(data.erro == 0)
			 window.location = "../index.php";	 		 
		}, "json");
	}
}

function exibir_endereco(id_cliente){
	window.location = "../kabum/endereco/listar_enderecos.php?id_cliente="+id_cliente;
}

