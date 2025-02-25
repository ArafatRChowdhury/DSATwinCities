
CREATE DATABASE IF NOT EXISTS Twin_Cities_Assessment;
USE Twin_Cities_Assessment;

CREATE TABLE City (
City_ID int PRIMARY KEY,
Name VARCHAR(45),
Country VARCHAR(45),
Population int,
Time DATETIME,
Weather VARCHAR(100),
Currency VARCHAR(45),
coordinates VARCHAR(30)
);

INSERT INTO City (City_ID, Name, Country,Population,Time,Weather,Currency,coordinates)
VALUES(1,'Liverpool','United Kingdom',922871,'2024-12-10 00:00:00', 'Sunny', 'Pounds(£)', 'N-22324242 E-27327832');

SELECT * FROM City;

CREATE TABLE Place_of_Interest (
Place_of_InterestID int PRIMARY KEY,
Photo LONGBLOB,
StreetName VARCHAR(45),
Postcode VARCHAR(10),
NameofLocation VARCHAR(100),
Lon VARCHAR (30),
Lat VARCHAR (30),
Place_Description VARCHAR(150),
Category VARCHAR(50)
);

INSERT INTO Place_of_Interest(Place_of_IterestID, Photo, StreetName, Postcode, NameofLocation, Coordinates, Place_Description, Category)
VALUES(1,NULL,'Scenic avenue','LV1 AB2','ABC', 'N-2929302', 'W-29392942', 'ABC','History');

SELECT * FROM Place_of_Interest;

CREATE TABLE News (
NewsID int PRIMARY KEY,
Headline VARCHAR(200),
Publisher VARCHAR(100),
Time DATETIME,
Photo LONGBLOB,
Body VARCHAR(65535)
);
INSERT INTO News (NewsID, Headline, Publisher, Time, Photo, Body)
VALUES(1, 'News', 'Arthur 123', '2024-12-11 00:00:00',NULL,'ABC');

SELECT * FROM News;

CREATE TABLE Photos(
PhotoID int PRIMARY KEY,
Photo LONGBLOB,
PhotoName VARCHAR(100),
Description VARCHAR(200),
Time DATETIME
);
INSERT INTO Photos (PhotoID, Photo, PhotoName,Description, Time)
VALUES (1, NULL, 'Tree', 'Many trees', '2024-12-11 00:00:00');

SELECT * FROM Photos;
