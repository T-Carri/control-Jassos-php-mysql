CREATE TABLE tienda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    foraneo BOOLEAN NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    id_region INT,
    FOREIGN KEY (id_region) REFERENCES region(id)
);



CREATE TABLE st (
    id INT AUTO_INCREMENT PRIMARY KEY,
    folio VARCHAR(30) NOT NULL,
    trabajo VARCHAR(300),
    id_tienda INT,
    fecha DATE NOT NULL,
    autorizado BOOLEAN NOT NULL,
    estado_portal VARCHAR(15) NOT NULL,
    trabajo_realizado BOOLEAN,
    FOREIGN KEY (id_tienda) REFERENCES tienda(id)
);




ALTER TABLE st
ADD COLUMN archivado TINYINT(1) NOT NULL DEFAULT 0;







CREATE TABLE region (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25) NOT NULL
);

//FALTA REGIONN