$( document ).ready(function() {
	$("#bt_login").click(login);
	$("#bt_cadastro").click(cadastrar);
});

function validacao(acao){
	if($("#login").val() == ""){
		alert("Informe o Usuario.");
		$("#login").focus();
		return 0;
	}
	else if($("#senha").val() == ""){
		alert("Informe a senha.");
		$("#senha").focus();
		return 0;
	}
	else if($("#senha").val().length <= 4){
		alert("A senha deve ter pelo menos 5 caracteres.");
		$("#senha").focus();
		return 0;
	}
	else{
		return acao;
	}
}

function cadastrar(){
	retorno = validacao("1");
	if(retorno > 0){
		$.post( "login/proc_login.php", 
			{ acao : retorno,
			  login: $("#login").val(),
			  senha: $("#senha").val()
			}, 
		function( data ) {
		  alert(data.msg); 	
		  if(data.erro == 0)
			 window.location.reload();	 		 
		}, "json");
	}
}

function login(){
	alert('login');
	retorno = validacao("2");
	if(retorno > 0){
		$.post( "login/proc_login.php", 
			{ acao : retorno,
			  login: $("#login").val(),
			  senha: $("#senha").val()
			}, 
		function( data ) {
		  alert(data.msg); 	
		  if(data.erro == 0)
			 window.location.reload();	 
		 
		}, "json");
	}
}