CREATE TABLE tipoequipo(
  idtipo SERIAL PRIMARY KEY ,
  nombre VARCHAR
);

CREATE TABLE estado(
  idestado SERIAL PRIMARY KEY ,
  nombre VARCHAR
);


CREATE TABLE equipo (
  idequipo SERIAL PRIMARY KEY ,
  marca VARCHAR ,
  modelo VARCHAR,
  serie VARCHAR,
  tipo INT REFERENCES tipoEquipo(idtipo),
  descripcion TEXT,
  fechaadq DATE,
  estado INT REFERENCES estado(idestado)
);

CREATE TABLE comentarios(
  idcomentario SERIAL PRIMARY KEY ,
  fecha DATE DEFAULT current_date,
  titulo VARCHAR,
  comentario TEXT

);

CREATE TABLE equipo_comentario(
  idequipo INT REFERENCES equipo(idequipo),
  idcomentario INT REFERENCES comentarios(idcomentario)
)