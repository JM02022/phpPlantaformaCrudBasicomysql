CREATE DATABASE ejemplo DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE ejemplo;
CREATE TABLE IF NOT EXISTS Libros (

codigo INT auto_increment,

titulo VARCHAR(255) not NULL,

autor VARCHAR(25) NOT NULL,

disponible TINYINT NOT NULL,

PRIMARY KEY (codigo)
) EnGINE=INNODB;
SELECT * FROM libros;
INSERT INTO Libros VALUES ('', 'La Guerra y 1a Paz', 'Ledn Tolstoi', TRUE);
INSERT INTO Libros VALUES ('', 'Laz Aventuras de Huckleberry Fim', 'Mark Twain', FALSE);
INSERT INTO Libros VALUES ('', 'Momlet', 'William Shakespeare', TRUE);
INSERT INTO Libros VALUES ('', 'En busca del tiempo perdido', 'Marcel Proust', FALSE);
INSERT INTO Libros VALUES ('', 'Don Quijote de la Mancha', 'Miguel de Cervantes', TRUE);

