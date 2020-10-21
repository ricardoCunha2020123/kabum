$( document ).ready(function() {
	$('.cep').mask('00000-000');
	$("#bt_add_endereco").click(cadastrar_endereco);	
});


function excluir_endereco(id){
	$.post( "../endereco/proc_endereco.php", 
			{ "acao" : 3,
			  id_endereco: id
			}, 
		function( data ) {
		  alert(data.msg); 	
		  if(data.erro == 0)
			 window.location.reload();	 		 
		}, "json");
}

function inserir_endereco(id_cliente){
	window.location = "../endereco/incluir_endereco.php?id_cliente="+id_cliente;
}

function voltar(){
	window.location = "../index.php";
}

function validacao(){
	if($("#endereco").val() == ""){
		alert("Informe o Logradouro.");
		$("#endereco").focus();
		return 0;
	}
	else if($("#numero").val() == ""){
		alert("Informe o Numero.");
		$("#numero").focus();
		return 0;
	}
	else if($("#bairro").val() == ""){
		alert("Informe o bairro.");
		$("#bairro'").focus();
		return 0;
	}
	else if($("#cidade").val() == ""){
		alert("Informe a cidade.");
		$("#cidade").focus();
		return 0;
	}
	else if($("#estado").val() == ""){
		alert("Informe o estado.");
		$("#estado").focus();
		return 0;
	}
	else{
		return 1;
	}
}

function cadastrar_endereco(){
	if(validacao() == 1){
		$.post( "../endereco/proc_endereco.php", 
				{ "acao" : 1,
				  id_cliente :$("#id_cliente").val(),
				  endereco:$("#endereco").val(), 
				  numero:$("#numero").val(), 
				  complemento:$("#complemento").val(), 
				  bairro:$("#bairro").val(), 
				  cidade:$("#cidade").val(), 
				  estado:$("#estado").val(), 
				  cep:$("#cep").val()
				}, 
			function( data ) {
			  alert(data.msg); 	
			  if(data.erro == 0)
				 window.location  = "../endereco/listar_enderecos.php?id_cliente="+$("#id_cliente").val();	 		 
			}, "json");
	}		
}