CREATE DATABASE smarttravel;
--@block

CREATE TABLE city(
    city_name VARCHAR(30),
    PRIMARY KEY(city_name)
);
--@block
INSERT INTO city (city_name) VALUES
('Casablanca'),
('Fez'),
('Tangier'),
('Marrakesh'),
('Salé'),
('Meknes'),
('Rabat'),
('Oujda'),
('Kenitra'),
('Agadir'),
('Tetouan'),
('Temara'),
('Safi'),
('Mohammedia'),
('Khouribga'),
('El Jadida'),
('Beni Mellal'),
('Aït Melloul'),
('Nador'),
('Dar Bouazza'),
('Settat'),
('Berrechid'),
('Khemisset'),
('Inezgane'),
('Ksar El Kebir'),
('Larache'),
('Guelmim'),
('Khenifra'),
('Berkane'),
('Taourirt'),
('Bouskoura'),
('Fquih Ben Salah'),
('Dcheira El Jihadia'),
('Oued Zem'),
('El Kelaa Des Sraghna'),
('Sidi Slimane'),
('Errachidia'),
('Guercif'),
('Oulad Teima'),
('Ben Guerir'),
('Tifelt'),
('Lqliaa'),
('Taroudant'),
('Sefrou'),
('Essaouira'),
('Fnideq'),
('Sidi Kacem'),
('Tiznit'),
('Tan-Tan'),
('Ouarzazate'),
('Souk El Arbaa'),
('Youssoufia'),
('Lahraouyine'),
('Martil'),
('Ain Harrouda'),
('Suq as-Sabt Awlad an-Nama'),
('Skhirat'),
('Ouazzane'),
('Benslimane'),
('Al Hoceima'),
('Beni Ansar'),
('Mdieq'),
('Sidi Bennour'),
('Midelt'),
('Azrou'),
('Drargua');

--@block
create table Entreprise (
idEn int primary key AUTO_INCREMENT,
nomEn varchar(50) not null,
img varchar(200));
--@block
INSERT INTO Entreprise (nomEn, img) VALUES
('Supra','Supratours.png'),
('CTM', 'ctm.png'),
('SATAS', 'SATAS.jpg'),
('Afriquia', 'Afriquia_Gaz.png'),
('Ghazala', 'ghazala.png');
--@block
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM ('admin', 'operateur', 'client', 'visitor') DEFAULT 'visitor',
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
        (NEW.role = 'client' AND NEW.is_active IS NOT NULL AND NEW.date_register IS NOT NULL AND NEW.fk_idEn IS NULL) OR
        (NEW.role = 'visitor' AND NEW.is_active IS NULL AND NEW.date_register IS NULL AND NEW.fk_idEn IS NULL AND NEW.password IS NULL)
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
CREATE TRIGGER before_insert_reserv
BEFORE INSERT ON reservation
FOR EACH ROW
BEGIN
    IF NOT(
        (SELECT users.role FROM users INNER JOIN reservation ON users.email=reservation.fk_email WHERE users.email=reservation.fk_email)='visitor' AND
        NEW.fk_idPnts IS NULL
    )THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid data for the specified role.';
    END IF;
END; 
--@block
create table notification (
idNot int primary key AUTO_INCREMENT,
fk_idRes int not null,
FOREIGN KEY (fk_idRes) REFERENCES reservation(idRes),
msg varchar(100) not null);

