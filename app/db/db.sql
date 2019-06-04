
DROP DATABASE IF EXISTS audio_meister;

CREATE DATABASE IF NOT EXISTS audio_meister CHARACTER SET utf8 COLLATE utf8_general_ci;

USE audio_meister;

CREATE TABLE IF NOT EXISTS usuarios(
    correo VARCHAR(255),
    nombre VARCHAR(255),
    apodo VARCHAR(255),
    passwd VARCHAR(255),
    modalidad VARCHAR(255), 
    rol VARCHAR(255),
    PRIMARY KEY (correo)
);

CREATE TABLE IF NOT EXISTS tipos(
    id_tipo int,
    tipo VARCHAR(255),
    PRIMARY KEY(id_tipo)
);

CREATE TABLE IF NOT EXISTS audios(
    id_audio int AUTO_INCREMENT,
    nombre_audio VARCHAR(255),
    ruta_audio VARCHAR(255),
    ruta_imagen_audio VARCHAR(255),
    duracion VARCHAR(255),
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    correo VARCHAR(255),
    id_tipo int,
    PRIMARY KEY (id_audio),
    visibilidad int,
    CONSTRAINT fk_correo FOREIGN KEY (correo) REFERENCES usuarios(correo) ON DELETE CASCADE,
    CONSTRAINT fk_id_tipo FOREIGN KEY (id_tipo) REFERENCES tipos(id_tipo)
);

CREATE TABLE IF NOT EXISTS comentarios(
    id_comentario int AUTO_INCREMENT,
    descripcion VARCHAR(255),
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_audio int,
    correo VARCHAR(255),
    PRIMARY KEY (id_comentario),
    CONSTRAINT fk_comentario_correo FOREIGN KEY (correo) REFERENCES usuarios(correo) ON DELETE CASCADE,
    CONSTRAINT fk_id_audio FOREIGN KEY (id_audio) REFERENCES audios(id_audio) ON DELETE CASCADE
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
        'Admin', 
        'adm', 
        '$2y$10$a0FopDsbSd105Eb4EhvHr.Nl577WPujrfEKKLhg4D35DE42aCA8Bq',
        'Premium', 
        'admin'
        );
