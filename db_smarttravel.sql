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
-- Insert 5 autobuses for Supra (entreprise with idEn = 1)
INSERT INTO Autobus (immat, numbus, capacite, fk_idEn)
VALUES
('AB123', 1, 50, 1),
('CD456', 2, 50, 1),
('EF789', 3, 50, 1),
('GH012', 4, 50, 1),
('IJ345', 5, 50, 1);

--@block
-- Insert 5 autobuses for CTM (entreprise with idEn = 2)
INSERT INTO Autobus (immat, numbus, capacite, fk_idEn)
VALUES
('KL678', 6, 50, 2),
('MN901', 7, 50, 2),
('OP234', 8, 50, 2),
('QR567', 9, 50, 2),
('ST890', 10, 50, 2);

--@block
-- Insert 5 autobuses for SATAS (entreprise with idEn = 3)
INSERT INTO Autobus (immat, numbus, capacite, fk_idEn)
VALUES
('UV123', 11, 50, 3),
('WX456', 12, 50, 3),
('YZ789', 13, 50, 3),
('AB012', 14, 50, 3),
('CD345', 15, 50, 3);

-- Repeat similar INSERT statements for other entreprises...

--@block
-- Insert 5 autobuses for Afriquia (entreprise with idEn = 4)
INSERT INTO Autobus (immat, numbus, capacite, fk_idEn)
VALUES
('EF456', 16, 50, 4),
('GH789', 17, 50, 4),
('IJ012', 18, 50, 4),
('KL345', 19, 50, 4),
('MN678', 20, 50, 4);

--@block
-- Insert 5 autobuses for Ghazala (entreprise with idEn = 5)
INSERT INTO Autobus (immat, numbus, capacite, fk_idEn)
VALUES
('OP901', 21, 50, 5),
('QR234', 22, 50, 5),
('ST567', 23, 50, 5),
('UV890', 24, 50, 5),
('WX012', 25, 50, 5);

--@block
create table route (
idVil_dep VARCHAR(50),
idVil_arv VARCHAR(50) ,
PRIMARY KEY (idVil_dep, idVil_arv),
FOREIGN KEY (idVil_dep) REFERENCES city(city_name),
FOREIGN KEY (idVil_arv) REFERENCES city(city_name),
dist float not null,
duree time not null);
--@block
INSERT INTO route (idVil_dep, idVil_arv, dist, duree) VALUES
('Casablanca', 'Marrakesh', 200.0, '04:00:00'),
('Fez', 'Tangier', 300.0, '05:30:00'),
('Rabat', 'Agadir', 400.0, '07:30:00'),
('Oujda', 'Kenitra', 600.0, '09:00:00'),
('Meknes', 'Safi', 250.0, '04:30:00'),
('Tetouan', 'Temara', 350.0, '06:00:00'),
('Settat', 'Berrechid', 100.0, '02:00:00'),
('Khouribga', 'El Jadida', 180.0, '03:30:00'),
('Bouskoura', 'Fquih Ben Salah', 120.0, '02:30:00'),
('Dcheira El Jihadia', 'Oued Zem', 320.0, '06:30:00');

--@block
create table voyage(
idVoy int  primary key AUTO_INCREMENT,
hr_dep time not null,
hr_arv time not null,
fk_idVil_arv VARCHAR(50) not null,
fk_idVil_dep VARCHAR(50) not null,
FOREIGN KEY (fk_idVil_dep, fk_idVil_arv) REFERENCES route(idVil_dep, idVil_arv),
bus varchar(30),
FOREIGN KEY (bus) REFERENCES Autobus(immat),
prix float not null,
date_voy date not null);
--@block
INSERT INTO voyage (hr_dep, hr_arv, fk_idVil_dep, fk_idVil_arv, bus, prix, date_voy) VALUES
('08:00:00', '12:00:00', 'Casablanca', 'Marrakesh', 'AB123', 200.0, '2024-02-15'),
('09:30:00', '15:00:00', 'Fez', 'Tangier', 'CD456', 250.0, '2024-02-16'),
('11:00:00', '18:30:00', 'Rabat', 'Agadir', 'EF789', 300.0, '2024-02-17'),
('13:30:00', '18:00:00', 'Oujda', 'Kenitra', 'GH012', 180.0, '2024-02-18'),
('10:45:00', '15:15:00', 'Meknes', 'Safi', 'IJ345', 220.0, '2024-02-19'),
('12:15:00', '18:15:00', 'Tetouan', 'Temara', 'KL678', 280.0, '2024-02-20'),
('15:00:00', '17:00:00', 'Settat', 'Berrechid', 'MN901', 100.0, '2024-02-21'),
('14:30:00', '18:00:00', 'Khouribga', 'El Jadida', 'OP234', 150.0, '2024-02-22'),
('16:45:00', '22:15:00', 'Bouskoura', 'Fquih Ben Salah', 'QR567', 200.0, '2024-02-23'),
('18:00:00', '23:30:00', 'Dcheira El Jihadia', 'Oued Zem', 'ST890', 300.0, '2024-02-24'),

('08:30:00', '13:00:00', 'Casablanca', 'Fez', 'AB123', 180.0, '2024-03-01'),
('10:00:00', '16:30:00', 'Tangier', 'Marrakesh', 'CD456', 220.0, '2024-03-02'),
('12:30:00', '17:45:00', 'Rabat', 'Oujda', 'EF789', 260.0, '2024-03-03'),
('14:00:00', '19:30:00', 'Kenitra', 'Agadir', 'GH012', 320.0, '2024-03-04'),
('11:15:00', '14:45:00', 'Marrakesh', 'Tetouan', 'IJ345', 150.0, '2024-03-05'),
('13:45:00', '20:15:00', 'Safi', 'El Jadida', 'KL678', 200.0, '2024-03-06'),
('15:30:00', '18:30:00', 'Berrechid', 'Settat', 'MN901', 120.0, '2024-03-07'),
('16:00:00', '20:45:00', 'El Jadida', 'Khouribga', 'OP234', 180.0, '2024-03-08'),
('18:15:00', '23:45:00', 'Temara', 'Bouskoura', 'QR567', 240.0, '2024-03-09'),
('19:30:00', '01:00:00', 'Fquih Ben Salah', 'Dcheira El Jihadia', 'ST890', 280.0, '2024-03-10');


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


-- @block
INSERT INTO Entreprise (nomEn, img) VALUES
('CTM', 'ctm_logo.png'),
('Sahara Voyages', 'sahara_voyages_logo.png'),
('Atlas Express', 'atlas_express_logo.png'),
('Marrakech Tours', 'marrakech_tours_logo.jpeg'),
('Moroccan Explorer', 'moroccan_explorer_logo.png'),
('Maghreb Adventures', 'maghreb_adventures_logo.png'),
('Golden Dunes Tours', 'golden_dunes_tours_logo.png'),
('Casablanca Shuttles', 'casablanca_shuttles_logo.png'),
('Rif Explorers', 'rif_explorers_logo.png'),
('Atlas Trekking', 'atlas_trekking_logo.png');


