CREATE DATABASE smarttravel;

--@block
create table Entreprise (
idEn int primary key AUTO_INCREMENT,
nomEn varchar(50) not null,
img varchar(200));
--@block
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM ('admin', 'operateur', 'client') DEFAULT 'client',
    is_active BOOLEAN DEFAULT 1,
    date_register DATETIME,
    fk_idEn INT,
    FOREIGN KEY (fk_idEn) REFERENCES Entreprise(idEn)
);
--@block
CREATE TRIGGER before_insert_users
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    IF NOT (
        (NEW.role = 'admin' AND NEW.is_active IS NULL AND NEW.date_register IS NULL AND NEW.fk_idEn IS NULL) OR
        (NEW.role = 'operateur' AND NEW.is_active IS NOT NULL AND NEW.date_register IS NULL AND NEW.fk_idEn IS NOT NULL) OR
        (NEW.role = 'client' AND NEW.is_active IS NOT NULL AND NEW.date_register IS NOT NULL AND NEW.fk_idEn IS NULL)
    ) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid data for the specified role.';
    END IF;
END;
--@block

CREATE TABLE Autobus (
  immat varchar(30) primary key ,
  numbus int(11) unique not null,
  capacite int(11) not NULL,
  fk_idEn int(11) not null,
 FOREIGN KEY (fk_idEn) REFERENCES Entreprise(idEn)
) ;
--@block
create table route (
idVil_dep int,
idVil_arv int ,
PRIMARY KEY (idVil_dep, idVil_arv),
dist float not null,
duree time not null);
--@block
create table voyage(
idVoy int  primary key AUTO_INCREMENT,
hr_dep time not null,
hr_arv time not null,
fk_idVil_dep int not null,
fk_idVil_arv int not null,
FOREIGN KEY (fk_idVil_dep, fk_idVil_arv) REFERENCES route(idVil_dep, idVil_arv),
prix float not null,
date_voy date not null);

--@block
create table points (
idPnts int primary key AUTO_INCREMENT,
nbrPnts int not null);
--@block
create table reservation (
idRes int primary key AUTO_INCREMENT,
fk_email VARCHAR(255) not null,
FOREIGN KEY (fk_email) REFERENCES users(email),
fk_idVoy int not null,
FOREIGN KEY (fk_idVoy) REFERENCES voyage(idVoy),
fk_idPnts int unique not null,
FOREIGN KEY (fk_idPnts) REFERENCES points(idPnts),
num_sieg int not null,
date_res DATETIME);
--@block
create table notification (
idNot int primary key auto increment,
fk_idRes int not null,
FOREIGN KEY (fk_idRes) REFERENCES reservation(idRes),
msg varchar(100) not null);

