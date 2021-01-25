
DROP TABLE IF EXISTS istruttori;
DROP TABLE IF EXISTS candidati;
DROP TABLE IF EXISTS excollaboratori;
DROP TABLE IF EXISTS utente;

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
(1,'Maria','Tosin','Tennis','tennis1.jpg','M.Tosin@gmail.com','1988-05-20','E’ un esperta istruttrice focalizzata sulla tecnica e sui fondamentali. Se volete puntare sulle accortezze e cercate un allenamento intenso e dagli ottimi risultati, questa è l’allenatrice che fa per voi'),
(2,'Michela','Pinni','Tennis','tennis2.jpg','Michela.P@gmail.com','1990-01-11','E’ una nota campionessa di tennis, che ha partecipato a numerosi eventi agonistici ed ora lavora presso il nostro Centro. Se volete iniziare ad approciare con questo sport, questa è l’allenatrice che fa per voi.'),
(3,'Mauro','Freddi','Calcio','soccer1.jpg','M.Freddi@gmail.com','1989-09-28','E’ uno dei migliori allenatori della sua categoria, è specializzato nell’approccio con i bambini. Spicca la sua capacità nel trasmettere principalmente una buona dote educativa e comunicativa, utile per i primi calci.'),
(4,'Antonio','Pellin','Calcio','soccer2.jpg','A.Pellin@gmail.com','1985-02-16','E’ un allenatore storico del nostro Centro, che data la sua esperienza ha maturato una forte predisposizione nella crescita degli allievi e del problem solving. Ottimo per analizzare dati precettivi provenienti dall’ambiente e mettere in atto strategie per superare le difficoltà e raggiungere gli obiettivi prefissati.'),
(5,'Marco','Perretti','Paddle','paddle1.jpg','M.Perr@gmail.com','1990-04-22','E’ un istruttore di secondo grado, ha quindi maturato più di 2 anni di esperienza nei campi da Paddle. Specializzato per chi si vuole avvicinare a questo mondo.'),
(6,'Chiara','Massari','Paddle','paddle2.jpg','Massari.C@gmail.com','1991-12-12','E’ un istruttrice maestro nazionale, cioè è il supremo riconoscimento per un istruttore perché diventa il guru del Padel. Specializzata nelle migliorie e nella perfezione della tecnica.'),
(7,'Silvia','Speranzin','Nuoto','swim1.png','Silvia.S@gmail.com','1983-15-09','E’ un ex campionessa dei 100 metri stile libero. Conosciuta per aver allenato i migliori nuotatori del nostro Centro.'),
(8,'Luca','Pozzini','Nuoto','swim2.jpg','Luca.P@gmail.com','1991-10-25','E’ un istruttore specializzato nell’approccio con i bambini e l’acqua. Colpisce particolarmente la sua dote empatica e coinvolgente, che aiuta ad affrontare le prima paure.');


CREATE TABLE candidati (
	idcandidato INT(11) PRIMARY KEY auto_increment,
	nome VARCHAR(30),
	cognome VARCHAR(30),
	disciplina VARCHAR(30),
	mail VARCHAR(40),
	datanascita DATE
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


CREATE TABLE utente (
	id INT(10) PRIMARY KEY,
	email VARCHAR(20),
	psw VARCHAR(20)
)ENGINE=InnoDB;

INSERT INTO utente VALUES
(1,'admin','admin');




