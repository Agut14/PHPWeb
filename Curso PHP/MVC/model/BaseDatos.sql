use cursophp;

CREATE TABLE usuarios (
    id int(255) AUTO_INCREMENT not NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    constraint pk_usuarios PRIMARY KEY(id)
);


CREATE TABLE notas (
    id INT(255)  PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usuario_id  INT(255) NOT NULL,
    categoria_id INT(255) NOT NULL,
    titulo  VARCHAR(255) NOT NULL,
    descripcion MEDIUMTEXT,
    fecha DATE NOT NULL
);

ALTER TABLE usuarios ADD CONSTRAINT uq_email UNIQUE(email);

