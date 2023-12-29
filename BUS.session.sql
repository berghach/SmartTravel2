
USE bustravel; 

-- @block


CREATE TABLE Company(
    id INT PRIMARY KEY ,
    name VARCHAR(25),
    image VARCHAR(25)
);
CREATE TABLE Bus(
    id INT PRIMARY KEY,
    name VARCHAR(25),
    capacite INT,
    Company int,
    FOREIGN KEY (Company) REFERENCES Company(id)
    
);
CREATE TABLE City(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(45)
);

CREATE TABLE Route(
    id INT PRIMARY KEY,
    depart_city INT,
    Arrive_city INT,
    FOREIGN KEY (depart_city) REFERENCES City(id),
    FOREIGN KEY (Arrive_city) REFERENCES City(id),
    duree TIME

);
-- @block
CREATE TABLE Horraire(
    hr_dep TIME ,
    hr_arv TIME ,
    Prix FLOAT ,
    
    nhar Date ,
    tri9 INT ,
    FOREIGN KEY (tri9) REFERENCES Route(id)
);
ALTER TABLE Route
ADD COLUMN periode INT;


-- Insert into Company table
INSERT INTO Company (id, name, image) VALUES
(1, 'CTM', 'ctm_logo.jpg'),
(2, 'Sahara Voyages', 'sahara_voyages_logo.jpg'),
(3, 'Atlas Express', 'atlas_express_logo.jpg'),
(4, 'Marrakech Tours', 'marrakech_tours_logo.jpg'),
(5, 'Moroccan Explorer', 'moroccan_explorer_logo.jpg');
-- @block
-- Insert into City table
INSERT INTO City (name) VALUES
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
-- @block
-- Insert into Bus table
INSERT INTO Bus (id, name, capacite, Company) VALUES
(1, 'BusA', 50, 1),
(2, 'BusB', 40, 2);

-- Insert into Route table
INSERT INTO Route (id, depart_city, Arrive_city, duree) VALUES
(1, 1, 2 , '02:30:00'),
(2, 2, 1 , '03:30:00');

-- Insert into Horraire table
INSERT INTO Horraire (hr_dep, hr_arv, Prix, nhar, tri9) VALUES
('08:00:00', '12:00:00', 50.00, '2023-01-01', 1),
('14:00:00', '17:30:00', 40.00, '2023-01-02', 2);


-- ALTER TABLE Route
-- MODIFY COLUMN periode INT;

-- UPDATE Route
-- SET periode = (
--     SELECT TIME_TO_SEC(TIMEDIFF(Horraire.hr_arv, Horraire.hr_dep)) / 60
--     FROM Horraire
--     WHERE Horraire.tri9 = Route.id
-- );
-- @block

DELETE FROM Company;
-- @block
INSERT INTO Company (id, name, image) VALUES
(1, 'CTM', 'ctm_logo.jpg'),
(2, 'Sahara Voyages', 'sahara_voyages_logo.jpg'),
(3, 'Atlas Express', 'atlas_express_logo.jpg'),
(4, 'Marrakech Tours', 'marrakech_tours_logo.jpg'),
(5, 'Moroccan Explorer', 'moroccan_explorer_logo.jpg'),
(6, 'Maghreb Adventures', 'maghreb_adventures_logo.jpg'),
(7, 'Golden Dunes Tours', 'golden_dunes_tours_logo.jpg'),
(8, 'Casablanca Shuttles', 'casablanca_shuttles_logo.jpg'),
(9, 'Rif Explorers', 'rif_explorers_logo.jpg'),
(10, 'Atlas Trekking', 'atlas_trekking_logo.jpg');

-- Inserting 20 rows into Bus table
INSERT INTO Bus (id, name, capacite, Company) VALUES
(1, 'CTM BusA', 50, 1),
(2, 'Sahara Voyages BusB', 40, 2),
(3, 'Atlas Express BusC', 45, 3),
(4, 'Marrakech Tours BusD', 30, 4),
(5, 'Moroccan Explorer BusE', 55, 5),
(6, 'Maghreb Adventures BusF', 42, 6),
(7, 'Golden Dunes Tours BusG', 38, 7),
(8, 'Casablanca Shuttles BusH', 48, 8),
(9, 'Rif Explorers BusI', 36, 9),
(10, 'Atlas Trekking BusJ', 50, 10),
(11, 'CTM BusK', 44, 1),
(12, 'Sahara Voyages BusL', 33, 2),
(13, 'Atlas Express BusM', 52, 3),
(14, 'Marrakech Tours BusN', 46, 4),
(15, 'Moroccan Explorer BusO', 39, 5),
(16, 'Maghreb Adventures BusP', 47, 6),
(17, 'Golden Dunes Tours BusQ', 34, 7),
(18, 'Casablanca Shuttles BusR', 41, 8),
(19, 'Rif Explorers BusS', 49, 9),
(20, 'Atlas Trekking BusT', 37, 10);


-- Inserting 20 rows into Route table
INSERT INTO Route (id, depart_city, Arrive_city, duree, periode) VALUES
(1, 1, 2, '02:30:00', 1),
(2, 2, 1, '03:30:00', 2),
(3, 3, 4, '02:15:00', 1),
(4, 4, 3, '03:45:00', 2),
(5, 5, 6, '01:45:00', 3),
(6, 6, 5, '02:30:00', 4),
(7, 7, 8, '03:00:00', 3),
(8, 8, 7, '02:15:00', 1),
(9, 9, 10, '02:45:00', 2),
(10, 10, 9, '03:30:00', 4),
(11, 11, 12, '01:30:00', 1),
(12, 12, 11, '04:00:00', 3),
(13, 13, 14, '02:00:00', 2),
(14, 14, 13, '03:15:00', 4),
(15, 15, 16, '03:30:00', 3),
(16, 16, 15, '02:00:00', 1),
(17, 17, 18, '02:45:00', 2),
(18, 18, 17, '03:15:00', 3),
(19, 19, 20, '02:15:00', 4),
(20, 20, 19, '03:00:00', 1);

-- Inserting 20 rows into Horraire table
INSERT INTO Horraire (hr_dep, hr_arv, Prix, nhar, tri9) VALUES
('08:00:00', '12:00:00', 50.00, '2023-01-01', 1),
('14:00:00', '17:30:00', 40.00, '2023-01-02', 2),
('09:30:00', '11:45:00', 35.00, '2023-01-03', 3),
('12:00:00', '15:15:00', 55.00, '2023-01-04', 4),
('10:45:00', '13:30:00', 45.00, '2023-01-05', 5),
('16:00:00', '18:45:00', 60.00, '2023-01-06', 6),
('11:30:00', '14:00:00', 40.00, '2023-01-07', 7),
('13:45:00', '16:30:00', 52.00, '2023-01-08', 8),
('15:15:00', '17:45:00', 48.00, '2023-01-09', 9),
('18:00:00', '21:30:00', 65.00, '2023-01-10', 10),
('07:45:00', '10:15:00', 38.00, '2023-01-11', 11),
('12:30:00', '14:45:00', 42.00, '2023-01-12', 12),
('14:30:00', '17:00:00', 55.00, '2023-01-13', 13),
('09:00:00', '11:30:00', 30.00, '2023-01-14', 14),
('16:45:00', '19:15:00', 48.00, '2023-01-15', 15),
('10:30:00', '13:00:00', 40.00, '2023-01-16', 16),
('13:15:00', '15:45:00', 50.00, '2023-01-17', 17),
('15:45:00', '18:30:00', 42.00, '2023-01-18', 18),
('17:30:00', '20:00:00', 58.00, '2023-01-19', 19),
('08:45:00', '11:15:00', 35.00, '2023-01-20', 20);


-- @block 
-- Drop the foreign key constraint in Horraire table
ALTER TABLE Horraire
DROP FOREIGN KEY horraire_ibfk_1;

-- Modify the id column in Route table
ALTER TABLE Route
MODIFY COLUMN id INT AUTO_INCREMENT;

-- Recreate the foreign key constraint in Horraire table
ALTER TABLE Horraire
ADD FOREIGN KEY (tri9) REFERENCES Route(id);

