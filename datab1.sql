CREATE TABLE Utente (
    identificativo int AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    cognome VARCHAR(255),
    data_nascita DATE,
    email VARCHAR(255),
    password VARCHAR(255)
);
INSERT INTO `utente` (`identificativo`, `nome`, `cognome`, `data_nascita`, `email`, `password`) VALUES (NULL, 'Francesco', 'Aiello', '2022-05-04', 'fra1@gmail.com', '12345678');
INSERT INTO `utente` (`identificativo`, `nome`, `cognome`, `data_nascita`, `email`, `password`) VALUES (NULL, 'Lorenzo', 'Greco', '2002-04-11', 'lorigreco@hotmail.it', '12345678');
INSERT INTO `utente` (`identificativo`, `nome`, `cognome`, `data_nascita`, `email`, `password`) VALUES (NULL, 'Mario', 'Rossi', '2001-05-03', 'marioR@gmail.com', 'mario1234');




CREATE TABLE posts (
    id integer primary key auto_increment,
    cliente integer,
    nlikes integer default 0,
    content json,
    foreign key(cliente) references Utente(identificativo) on delete cascade on update cascade
) Engine = 'InnoDB';

INSERT INTO `posts` (`id`, `cliente`, `nlikes`, `content`) VALUES (NULL, '1', '0', '{\"url\": \"https://random-d.uk/api/262.jpg\", \"descrizione\": \"HAHAHAHA \"}');
INSERT INTO `posts` (`id`, `cliente`, `nlikes`, `content`) VALUES (NULL, '8', '0', '{\"url\": \"https://random-d.uk/api/23.gif\", \"descrizione\": \"\"}');
INSERT INTO `posts` (`id`, `cliente`, `nlikes`, `content`) VALUES (NULL, '9', '0', '{\"url\": \"https://random-d.uk/api/268.jpg\", \"descrizione\": \"che bella foto!\"}');





DROP TABLE SocialNetwork(
     id_s INTEGER PRIMARY KEY AUTO_INCREMENT,
     nome_s VARCHAR(255)
)engine="InnoDB";



CREATE TABLE miPiace(
    id_like integer PRIMARY KEY AUTO_INCREMENT,
    id_user integer,
    id_social integer,
    FOREIGN KEY(id_user) REFERENCES Utente(identificativo) on delete cascade on update cascade,
    FOREIGN KEY(id_social) REFERENCES SocialNetwork(id_s) on delete cascade on update cascade
)engine = 'InnoDB';
INSERT INTO `mipiace` (`id_like`, `id_user`, `id_social`) VALUES (NULL, '8', '2');
INSERT INTO `mipiace` (`id_like`, `id_user`, `id_social`) VALUES (NULL, '1', '4');



CREATE TABLE socialntk(
    id_s integer PRIMARY KEY AUTO_INCREMENT,
    n_like integer,
    nome VARCHAR(255)
)engine='InnoDB';


