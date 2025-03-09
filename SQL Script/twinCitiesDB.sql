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
    StreetName VARCHAR(45),
    Postcode VARCHAR(15),
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

INSERT INTO Place_of_Interest (StreetName, Postcode, NameofLocation, Lon, Lat, Place_Description, City_ID)
VALUES
('4 Keel Wharf', 'L3 4FN', 'Wheel of Liverpool', -3.045740, 53.236990, 'Ferris Wheel in Liverpool', 1),
('Royal Albert Dock', 'L3 4AQ', 'Liverpool Mountain', -3.290940, 53.415720, 'Not actually a mountain', 1),
('Royal Albert Dock', 'L3 4AA', 'Pride of Liverpool', -3.250740, 53.360870, 'Souvenir shop', 1),
('Royal Albert Dock', 'L3 1PZ', 'De Wadden', -3.267220, 53.500720, 'Ship that got scrapped in 2024', 1),
('Royal Albert Dock', 'L3 4AQ', 'Maritime Museum', -3.180720, 53.435430, 'Museum in Liverpool', 1),
('2 Park Ln', 'L1 8AW', 'Maldron Hotel', -2.745510, 53.378070, '4-star hotel', 1),
('Cosme Velho', '22241-125', 'Christ the Redeemer', -43.211120, -22.953500, 'Wonder of the world', 2),
('Avenida Atlantica', '22070-011', 'Copacabana Beach', -43.180830, -22.972000, 'Big beach', 2),
('Rua Jardim Botanico', '22461-000', 'Parque Lage', -43.212150, -22.962670, 'Public park and garden', 2),
('Praia de Botafogo', '22250-040', 'Botafogo Praia Shopping', -43.183320, -22.949480, 'Shopping Centre', 2),
('Rua General Severiano', '22290-040', 'Museu Botafogo FR', -43.178000, -22.956500, 'Museum in Rio de Janeiro', 2),
('Avenida Pasteur', '22290-040', 'Sugarloaf Mountain', -43.154150, -22.950500, 'AKA Pao de Acucar', 2);

CREATE TABLE News (
    NewsID INT PRIMARY KEY AUTO_INCREMENT,
    Headline VARCHAR(200),
    Link VARCHAR(100),
    Body TEXT,
    City_ID INT,
    PublishTime DATETIME,
    FOREIGN KEY (City_ID) REFERENCES City(City_ID) ON DELETE CASCADE
);

INSERT INTO News (Headline, Link, Body, City_ID, PublishTime)
VALUES 
('RioNewsTest', 'www.test.com', "abc", 1, NOW()),
('LiverpoolNewsTest', 'www.test.com', "abc", 2, NOW());

SELECT * FROM News;

CREATE TABLE Photos (
    PhotoID INT PRIMARY KEY AUTO_INCREMENT,
    Photo LONGBLOB,
    PhotoName VARCHAR(100),
    Description VARCHAR(200),
    Time DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE PhotoSet (
    PhotoSetID INT PRIMARY KEY AUTO_INCREMENT,
    Place_of_InterestID INT,
    PhotoID INT,
    FOREIGN KEY (Place_of_InterestID) REFERENCES Place_of_Interest(Place_of_InterestID) ON DELETE CASCADE,
    FOREIGN KEY (PhotoID) REFERENCES Photos(PhotoID) ON DELETE CASCADE
);

