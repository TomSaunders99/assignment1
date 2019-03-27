CREATE DATABASE id9073106_drivers;

use id9073106_drivers;

CREATE TABLE Drivers (
    id int(10) 
	driver VARCHAR(255) NOT NULL,
    country VARCHAR(255),
	entries INT(10) NOT NULL,
	wins INT(10) NOT NULL,
    podiums INT(10) NOT NULL,
    points INT(10) NOT NULL
);