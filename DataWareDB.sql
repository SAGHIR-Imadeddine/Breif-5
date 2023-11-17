CREATE DATABASE dataware;
USE dataware;

CREATE TABLE equipe(
eqp_id INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(20) UNIQUE,
date_creation DATE
);

CREATE TABLE membre_personnel(
member_id INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(20),
prenom VARCHAR(20),
numero INT UNIQUE,
equipe INT,
member_role VARCHAR(20),
statut VARCHAR(20),
FOREIGN KEY (equipe) REFERENCES equipe (eqp_id)
);

INSERT INTO equipe(nom , date_creation) VALUES ("equipe1" , "2023-1-5" ), ("equipe2" , "2023-2-3");

INSERT INTO membre_personnel (nom , prenom , numero , equipe , member_role , statut) 
VALUES ("cj" , "imad" , "0661000001" , "1" , "CEO" , "active" ),
 ("mohammad" , "ali" , "0661000002" , "1" , "Manager" , "active" ), 
 ("hamed" , "nassem" , "0661000005" , "1" , "Security" , "active" );

 INSERT INTO membre_personnel (nom , prenom , numero , equipe , member_role , statut) 
 VALUES ("slim" , "shady" , "0661000004" , "1" , "dev" , "inactive" ), 
 ("stanly" , "stan" , "0661000008" , "1" , "dev" , "inactive" ), 
 ("gary" , "moore" , "0661000006" , "1" , "dev" , "inactive" );

 UPDATE membre_personnel SET equipe = 2 WHERE member_role = 'dev';


