CREATE TABLE usuario (
	id_usuario INTEGER AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(15) NOT NULL,
	senha VARCHAR(15) NOT NULL
);


CREATE TABLE cliente (
	id_cliente INTEGER AUTO_INCREMENT PRIMARY KEY,
	id_usuario INTEGER,
	nome VARCHAR(120) NOT NULL,
	cpf VARCHAR(13),
	rg VARCHAR(15), 
	telefone VARCHAR(20),
	data_nasc date
);

CREATE TABLE endereco(
id_endereco INTEGER AUTO_INCREMENT PRIMARY KEY,
id_cliente INTEGER,
endereco VARCHAR(150) NOT NULL,
numero VARCHAR(10) NOT NULL,
complemento VARCHAR(150) NOT NULL,
bairro VARCHAR(150) NOT NULL,
cidade VARCHAR(150) NOT NULL,
estado VARCHAR(2) NOT NULL,
cep VARCHAR(8) NOT NULL
);