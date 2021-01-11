
DROP TABLE IF EXISTS istruttori;
DROP TABLE IF EXISTS candidati;
DROP TABLE IF EXISTS excollaboratori;

CREATE TABLE istruttori (
	idpersonale INT(11) PRIMARY KEY auto_increment,
	nome VARCHAR(30),
	cognome VARCHAR(30),
	disciplina VARCHAR(30),
	nomeimmagine VARCHAR(50),
	mail VARCHAR(40),
	datanascita DATE,
	descrizione VARCHAR(3000)	
) ENGINE=InnoDB;

INSERT INTO istruttori 	VALUES 
(1,'Maria','Tosin','Tennis','tennis1.jpg','M.Tosin@gmail.com','1988-05-20','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla'),
(2,'Michela','Pinni','Tennis','tennis2.jpg','Michela.P@gmail.com','1990-01-11','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla'),
(3,'Mauro','Freddi','Calcio','soccer1.jpg','M.Freddi@gmail.com','1989-09-28','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla'),
(4,'Antonio','Pellin','Calcio','soccer2.jpg','A.Pellin@gmail.com','1985-02-16','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla'),
(5,'Marco','Perretti','Paddle','paddle1.jpg','M.Perr@gmail.com','1990-04-22','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla'),
(6,'Chiara','Massari','Paddle','paddle2.jpg','Massari.C@gmail.com','1991-12-12','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla'),
(7,'Silvia','Speranzin','Nuoto','swim1.jpg','Silvia.S@gmail.com','1983-15-09','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla'),
(8,'Luca','Pozzini','Nuoto','swim2.jpg','Luca.P@gmail.com','1991-10-25','Bla blablabla blablabla bla blablabla blablabla bla blabla blabla blabla blablabla blabla blablabla bla blabla blabla blabla blablabla bla blablabla. blabla blabla blablablabla blabla blablablabla blabla blabla blablabla bla blablabla blabla blablabl ablablabla blablablabla blablablablablabla blabla blablablablablablablabla blablablablablablablabla blablabla blablabla blablabla blablabla blablablabla blablabla bla blablabla');


CREATE TABLE candidati (
	idcandidato INT(11) PRIMARY KEY auto_increment,
	nome VARCHAR(30),
	cognome VARCHAR(30),
	disciplina VARCHAR(30),
	mail VARCHAR(40),
	dantanascita DATE
)ENGINE=InnoDB;

INSERT INTO candidati VALUES
(1,'Massimo','Spenti','Calcio','M.Spenti@gmail.com','1986-07-12'),
(2,'Annalisa','Fioretti','Nuoto','A.fior@gmail.com','1990-03-18');


CREATE TABLE excollaboratori (
	idexcoll INT(11) PRIMARY KEY auto_increment,
	nome VARCHAR(30),
	cognome VARCHAR(30),
	disciplina VARCHAR(30),
	mail VARCHAR(40),
	dantanascita DATE,
	finecontratto DATE 
)ENGINE=InnoDB;

INSERT INTO excollaboratori VALUES
(1,'Antonio','Vercetti','Tennis','A.verc@gmail.com','1975-05-15','1999-07-16'),
(2,'Michela','Pavanin','Nuoto','M.pavanin@gmail.com','1977-02-18','2001-08-16');
