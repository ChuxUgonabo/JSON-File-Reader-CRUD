DROP DATABASE IF EXISTS CSIS3280002Final;
CREATE DATABASE CSIS3280002Final;
USE CSIS3280002Final;


create table app (
    id INT PRIMARY KEY AUTO_INCREMENT,
	appName VARCHAR(50),
	appVersion VARCHAR(50),
    platform VARCHAR(50),
	author VARCHAR(50),
	email VARCHAR(50)
);