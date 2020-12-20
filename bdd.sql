DROP DATABASE entorno_bdd;

CREATE DATABASE entorno_bdd;

USE entorno_bdd;


CREATE TABLE usuario(
    id_user int NOT NULL AUTO_INCREMENT,
    usuario varchar(30) NOT NULL UNIQUE,
    clave varchar(255) NOT NULL,
    PRIMARY KEY(id_user)
);


CREATE TABLE registro(
    id_registro int NOT NULL AUTO_INCREMENT,
    fecha DATE not null,
    hora time not null,
    consulta varchar(600) not null,
    id_user int NOT NULL,
    PRIMARY KEY(id_registro),
    FOREIGN KEY(id_user) REFERENCES usuario(id_user) ON DELETE CASCADE
);


-- INSERCIONES  ------------------------------------------------------------------------------------------------------

INSERT INTO
    usuario(usuario, clave)
VALUES
    ('juani', '$2y$10$sJeaOnfU5u0IpsYOv2b4Oepo/P0TuMoIn2F2unjZXIOrh6TfVbcza');


INSERT INTO
    registro(fecha,hora,consulta,id_user)
VALUES
    ('2020-12-17','10:00', 'SELECT * FROM ', 1);