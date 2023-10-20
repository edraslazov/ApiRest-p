-- SENTENCIAS DDL
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id smallserial PRIMARY KEY,
    username varchar(15),
    password varchar(10)
);

DROP TABLE IF EXISTS datos_usuarios;
CREATE TABLE datos_usuarios (
    id_usuarios smallserial PRIMARY KEY,
    id_user smallint,
    nombre varchar(15),
    apellido varchar(15),
    edad varchar(5),
    fecha_creacion varchar(20),
    FOREIGN KEY (id_user) REFERENCES users(id)


);

--ALTER TABLE users ADD COLUMN last_update TIMESTAMP;

