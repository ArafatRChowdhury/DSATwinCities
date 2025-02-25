CREATE DATABASE IF NOT EXISTS Twin_Cities_Assessment;
USE Twin_Cities_Assessment;

CREATE TABLE City (
    City_ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(45),
    Country VARCHAR(45),
    Population INT,
    Weather VARCHAR(100),
    Currency VARCHAR(45),
    Lon DECIMAL(9,6),  
    Lat DECIMAL(9,6)
);

CREATE TABLE Place_of_Interest (
    Place_of_InterestID INT PRIMARY KEY AUTO_INCREMENT,
    Photo LONGBLOB,
    StreetName VARCHAR(45),
    Postcode VARCHAR(10),
    NameofLocation VARCHAR(100),
    Lon DECIMAL(9,6),  
    Lat DECIMAL(9,6),
    Place_Description VARCHAR(150),
    City_ID INT,
    FOREIGN KEY (City_ID) REFERENCES City(City_ID) ON DELETE CASCADE
);

INSERT INTO City (Name, Country, Population, Weather, Currency, Lon, Lat)
VALUES
('Liverpool', 'United Kingdom', 922871, 'Sunny', 'Pounds(£)', -2.983333, 53.400002),
('Rio de Janeiro', 'Brazil', 13824000, 'Sunny', 'Reais(R$)', -43.196388, -22.908333);

INSERT INTO Place_of_Interest (Photo, StreetName, Postcode, NameofLocation, Lon, Lat, Place_Description, City_ID)
VALUES
(NULL, '4 Keel Wharf', 'L3 4FN', 'Wheel of Liverpool', -3.045740, 53.236990, 'Ferris Wheel in Liverpool', 1),
(NULL, 'Royal Albert Dock', 'L3 4AQ', 'Liverpool Mountain', -3.290940, 53.415720, 'Not actually a mountain', 1),
(NULL, 'Royal Albert Dock', 'L3 4AA', 'Pride of Liverpool', -3.250740, 53.360870, 'Souvenir shop', 1),
(NULL, 'Royal Albert Dock', 'L3 1PZ', 'De Wadden', -3.267220, 53.500720, 'Ship that got scrapped in 2024', 1),
(NULL, 'Royal Albert Dock', 'L3 4AQ', 'Maritime Museum', -3.180720, 53.435430, 'Museum in Liverpool', 1),
(NULL, '2 Park Ln', 'L1 8AW', 'Maldron Hotel', -2.745510, 53.378070, '4-star hotel', 1),
(NULL, 'Cosme Velho', '22241-125', 'Christ the Redeemer', -43.211120, -22.953500, 'Wonder of the world', 2),
(NULL, 'Avenida Atlantica', '22070-011', 'Copacabana Beach', -43.180830, -22.972000, 'Big beach', 2),
(NULL, 'Rua Jardim Botanico', '22461-000', 'Parque Lage', -43.212150, -22.962670, 'Public park and garden', 2),
(NULL, 'Praia de Botafogo', '22250-040', 'Botafogo Praia Shopping', -43.183320, -22.949480, 'Shopping Centre', 2),
(NULL, 'Rua General Severiano', '22290-040', 'Museu Botafogo FR', -43.178000, -22.956500, 'Museum in Rio de Janeiro', 2),
(NULL, 'Avenida Pasteur', '22290-040', 'Sugarloaf Mountain', -43.154150, -22.950500, 'AKA Pao de Acucar', 2);

CREATE TABLE News (
    NewsID INT PRIMARY KEY AUTO_INCREMENT,
    Headline VARCHAR(200),
    Publisher VARCHAR(100),
    Time DATETIME DEFAULT CURRENT_TIMESTAMP,
    Photo LONGBLOB,
    Body TEXT
);

INSERT INTO News (Headline, Publisher, Photo, Body)
VALUES ('News', 'Arthur 123', NULL, 'ABC');

SELECT * FROM News;

CREATE TABLE Photos (
    PhotoID INT PRIMARY KEY AUTO_INCREMENT,
    Photo LONGBLOB,
    PhotoName VARCHAR(100),
    Description VARCHAR(200),
    Time DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Photos (Photo, PhotoName, Description)
VALUES (NULL, 'Tree', 'Many trees');

SELECT * FROM Photos;
