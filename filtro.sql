
CREATE DATABASE campuslands;

use campuslands;

CREATE TABLE pais(
idPais int AUTO_INCREMENT PRIMARY KEY,
nombrePais varchar(50) NOT NULL
);

CREATE TABLE departamento(
idDep int AUTO_INCREMENT PRIMARY KEY,
nombreDep varchar(50) NOT NULL,
idPais int not null,
FOREIGN KEY (idPais) REFERENCES pais(idPais)
);

CREATE TABLE region(
idReg int AUTO_INCREMENT PRIMARY KEY,
nombreReg varchar(60) NOT NULL,
idDep int NOT NULL,
FOREIGN KEY (idDep) REFERENCES departamento(idDep)
);

CREATE TABLE campers(
idCamper varchar(20) PRIMARY KEY,
nombreCamper varchar(50) NOT NULL,
apellidoCamper varchar(50) NOT NULL,
fechaNac date NOT NULL,
idReg INT not null,
FOREIGN KEY (idReg) REFERENCES region(idReg)
);




INSERT INTO pais (nombrePais) VALUES ("Colombia");
INSERT INTO pais (nombrePais) VALUES ("Polonia");
INSERT INTO pais (nombrePais) VALUES ("Peru");

INSERT INTO departamento (nombreDep,idPais) VALUES ("Santander",1);
INSERT INTO departamento (nombreDep,idPais) VALUES ("Varsovia",2);
INSERT INTO departamento (nombreDep,idPais) VALUES ("Cajamarca",3);

INSERT INTO region (nombreReg, idDep) VALUES ("Andina", 1);
INSERT INTO region (nombreReg, idDep) VALUES ("BAJA SILESIA", 2);
INSERT INTO region (nombreReg, idDep) VALUES ("la Montañana", 3);

INSERT INTO campers(idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES ("105423","Ivan", "Sanchez", 24-05-2003, 1);
INSERT INTO campers(idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES ("957445","Victor", "Palaciois",'2000-04-14', 2);
INSERT INTO campers(idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES ("456565","Mark", "Joeh",'1999-11-02', 3);






























