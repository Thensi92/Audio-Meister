DROP DATABASE IF EXISTS audio_meister;

CREATE DATABASE IF NOT EXISTS audio_meister CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS Usuarios(
    correo VARCHAR(255),
    nombre VARCHAR(255),
    apodo VARCHAR(255),
    passwd VARCHAR(255),
    modalidad VARCHAR(255), 
    rol VARCHAR(255),
    PRIMARY KEY (correo)
);

CREATE TABLE IF NOT EXISTS Tipos(
    id_tipo int,
    tipo VARCHAR(255),
    PRIMARY KEY(id_tipo)
);

CREATE TABLE IF NOT EXISTS Audios(
    id_audio int AUTO_INCREMENT,
    nombre_audio VARCHAR(255),
    ruta_audio VARCHAR(255),
    ruta_imagen_audio VARCHAR(255),
    duracion VARCHAR(255),
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    correo VARCHAR(255),
    id_tipo int,
    PRIMARY KEY (id_audio),
    CONSTRAINT fk_correo FOREIGN KEY (correo) REFERENCES Usuarios(correo),
    CONSTRAINT fk_id_tipo FOREIGN KEY (id_tipo) REFERENCES Tipos(id_tipo)
);

INSERT INTO tipos VALUES(1,'Podcast');
INSERT INTO tipos VALUES(2,'NotaAudio');
INSERT INTO tipos VALUES(3,'Musica');

INSERT INTO `usuarios` (
    `correo`, 
    `nombre`, 
    `apodo`, 
    `passwd`, 
    `modalidad`, 
    `rol`) VALUES (
        'adm@adm', 
        'Admin', 'adm', 'adm', 'Premium', 'admin'
        );
