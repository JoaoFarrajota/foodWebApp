
CREATE TABLE utilizador(
  utilizadorID int(11) UNIQUE NOT NULL AUTO_INCREMENT,
  nickname varchar(255),
  nomeProprio varchar(255),
  apelido varchar(255),
  email varchar(255),
  sexo ENUM("feminino", "masculino", "naodiz") NOT NULL ,
  dataNascimento DATE,
  morada varchar(255),
  concelho varchar(255),
  distrito varchar(255),
  pais varchar(255),
  avatar ENUM('burgerking.jpg','chipotle.jpg','Kfc.jpg','redLobster.png','Ronald_Macdonald.jpg','starbucks_mascot.jpg','Wendy_mascot.jpg'),
  tipo ENUM("consumidor", "vendedor" , "ambos"),
  palavraPasse varchar(255),
  idade int(2),
  saldo decimal(5,2) DEFAULT '0,00' ,
  PRIMARY KEY (utilizadorID)
);



CREATE TABLE consumidor(
    consumidorID int (11) UNIQUE NOT NULL AUTO_INCREMENT,
    utilizadorID int(11),
    PRIMARY KEY (consumidorID),
    FOREIGN KEY (utilizadorID) REFERENCES utilizador(utilizadorID)
);



CREATE TABLE vendedor(
    vendedorID int (11) UNIQUE NOT NULL AUTO_INCREMENT,
    tipoComida SET("portuguesa", "italiana", "indiana", "japonesa") NOT NULL,
    tempoFornecer SET("semana", "fds") NOT NULL,
    periodo SET("almoco", "jantar") NOT NULL,
    especialidade varchar(255),
    utilizadorID int(11) ,
    PRIMARY KEY (vendedorID),
    FOREIGN KEY (utilizadorID) REFERENCES utilizador(utilizadorID)
);

/*
CREATE TABLE imagem(
  imgID int Unique,
  fileLocation varchar(255),
  fileSize int,
  fileType varchar(255),
  fileName varchar(255),
  utilizadorID int ,
  PRIMARY KEY (imgID),
  FOREIGN KEY (utilizadorID) REFERENCES utilizador(utilizadorID)
);
*/


CREATE TABLE prato(
    pratoID int(11) UNIQUE NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    preco decimal(4,2),
    quantidade int,
    data_disponibilidade DATETIME,
    img_prato varchar(100),
    estado SET("disponivel", "indisponivel") NOT NULL,
    rating int  CHECK (rating<=5),
    vendedorID int,
    utilizadorID int,
    FOREIGN KEY (utilizadorID) REFERENCES utilizador(utilizadorID),
    FOREIGN KEY (vendedorID) REFERENCES vendedor(vendedorID),
    PRIMARY KEY (pratoID)
);


CREATE TABLE administrador(
    administradorID int(11) UNIQUE,
    palavraPasse varchar(255),
    PRIMARY KEY (administradorID)
);


CREATE TABLE rating_prato(
    pratingID int(11) UNIQUE NOT NULL AUTO_INCREMENT,;
    nvotos int,
    nrating1 int,
    nrating2 int,
    nrating3 int,
    nrating4 int,
    nrating5 int,
    rating int, 
    pratoID int,
    PRIMARY KEY(pratingID)
    FOREIGN KEY (pratoID) REFERENCES prato(pratoID)
);


CREATE TABLE rating_vendedor(
    vratingID int(11) UNIQUE NOT NULL AUTOINCREMENT;
    nvotos int,
    nrating1 int,
    nrating2 int,
    nrating3 int,
    nrating4 int,
    nrating5 int,
    rating int, 
    vendedorID int,
    PRIMARY KEY(vratingID)
    FOREIGN KEY (vendedorID) REFERENCES vendedor(vendedorID)
);


CREATE TABLE categoria(
    categoriaID int(11) UNIQUE NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    pratoID int(11),
    PRIMARY KEY (categoriaID),
    FOREIGN KEY (pratoID) REFERENCES prato(pratoID)
);
  
  
/*CREATE TABLE ingredientesMap(
    ingredientesMapID int(11) UNIQUE NOT NULL AUTO_INCREMENT,
    pratoID int(11),
    PRIMARY KEY (ingredientesMapID),
    FOREIGN KEY (pratoID) REFERENCES prato(pratoID)
);*/
  
  
CREATE TABLE ingredientes(
    ingredientesID int(11) UNIQUE NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    pratoID int(11),
    PRIMARY KEY (ingredientesID),
    FOREIGN KEY (pratoID) REFERENCES prato(pratoID)
 );
 
 
CREATE TABLE hVendas(
  vendaID int(11) UNIQUE NOT NULL AUTO_INCREMENT,
  data_entrega DATETIME, 
  quant_comprada int(11),
  preco decimal(4,2),
  nome_prato  varchar(255),
  vendedor int(11),
  comprador int(11),
  PRIMARY KEY(vendaID), 
  FOREIGN KEY(vendedor) REFERENCES utilizador(utilizadorID),
  FOREIGN KEY(comprador) REFERENCES utilizador(utilizadorID)
);

CREATE TABLE chat(
   chatID int(11) UNIQUE NOT NULL AUTO_INCREMENT,
   para_userID int(11)  , 
   de_userID int(11) 
   mensagem text NOT NULL,
   tempo timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(chatID), 
  FOREIGN KEY(para_userID) REFERENCES utilizador(utilizadorID),
  FOREIGN KEY(de_userID) REFERENCES utilizador(utilizadorID)

);

  