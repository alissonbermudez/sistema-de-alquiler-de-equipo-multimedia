

CREATE TABLE estado
(
  idestado serial NOT NULL,
  nombre character varying,
  CONSTRAINT estado_pkey PRIMARY KEY (idestado)
);



CREATE TABLE tipoequipo
(
  idtipo serial NOT NULL,
  nombre character varying,
  CONSTRAINT tipoequipo_pkey PRIMARY KEY (idtipo)
);




CREATE TABLE equipo
(
  idequipo varchar NOT NULL,
  marca character varying,
  modelo character varying,
  serie character varying,
  tipo integer,
  descripcion text,
  fechaadq date,
  estado integer DEFAULT 1,
  CONSTRAINT equipo_pkey PRIMARY KEY (idequipo),
  CONSTRAINT equipo_estado_fkey FOREIGN KEY (estado)
  REFERENCES estado (idestado) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT equipo_tipo_fkey FOREIGN KEY (tipo)
  REFERENCES tipoequipo (idtipo) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE comentarios
(
  idcoment serial NOT NULL ,
  fecha date DEFAULT ('now'::text)::date,
  titulo character varying,
  comentar text,
  equipo varchar,
  CONSTRAINT comentarios_pkey PRIMARY KEY (idcoment),
  CONSTRAINT comentarios_equipo_fkey FOREIGN KEY (equipo)
  REFERENCES equipo (idequipo) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE equipo_comentario
(
  equipo varchar,
  comentario integer,
  CONSTRAINT equipo_comentario_comentario_fkey FOREIGN KEY (comentario)
  REFERENCES comentarios (idcoment) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT equipo_comentario_equipo_fkey FOREIGN KEY (equipo)
  REFERENCES equipo (idequipo) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE users
(
  id varchar NOT NULL,
  perfil character varying(50),
  username character varying(200),
  password character varying(250),
  nombre character varying(150),
  CONSTRAINT users_pkey PRIMARY KEY (id)
);

CREATE TABLE estado_reserva
(
  id serial NOT NULL,
  estado character varying,
  CONSTRAINT estado_reserva_pkey PRIMARY KEY (id)
);

CREATE TABLE horarios
(
  id serial NOT NULL,
  horario character varying NOT NULL,
  CONSTRAINT horarios_pkey PRIMARY KEY (id)
);



CREATE TABLE reservas
(
  id serial NOT NULL,
  fecha date DEFAULT ('now'::text)::date,
  fecha_reserva date,
  usuario varchar,
  equipo varchar,
  horario integer,
  estado integer,
  pagado boolean DEFAULT false,
  CONSTRAINT reservas_pkey PRIMARY KEY (id),
  CONSTRAINT reservas_equipo_fkey FOREIGN KEY (equipo)
  REFERENCES equipo (idequipo) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT reservas_estado_fkey FOREIGN KEY (estado)
  REFERENCES estado_reserva (id) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT reservas_horario_fkey FOREIGN KEY (horario)
  REFERENCES horarios (id) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT reservas_usuario_fkey FOREIGN KEY (usuario)
  REFERENCES users (id) MATCH SIMPLE
  ON UPDATE NO ACTION ON DELETE NO ACTION
);


CREATE OR REPLACE VIEW vercomentarios AS
  SELECT a.idcoment,
    a.fecha,
    a.titulo,
    a.comentar,
    b.equipo,
    b.comentario
  FROM comentarios a
    FULL JOIN equipo_comentario b ON b.comentario = a.idcoment;


CREATE OR REPLACE VIEW reservasall AS
  SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva
  FROM reservas a
    JOIN horarios b ON a.horario = b.id
    JOIN estado_reserva c ON a.estado = c.id;


CREATE OR REPLACE VIEW reservas_dia AS
  SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva,
    a.pagado,
    d.perfil
  FROM reservas a
    JOIN horarios b ON a.horario = b.id
    JOIN estado_reserva c ON a.estado = c.id
    JOIN users d ON a.usuario = d.id
  WHERE a.estado = 1 AND a.fecha_reserva = 'now'::text::date;


CREATE OR REPLACE VIEW reservas_ent AS
  SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva,
    a.pagado,
    d.perfil
  FROM reservas a
    JOIN horarios b ON a.horario = b.id
    JOIN estado_reserva c ON a.estado = c.id
    JOIN users d ON a.usuario = d.id
  WHERE a.estado = 2 AND a.fecha_reserva = 'now'::text::date;



CREATE OR REPLACE VIEW reservas_sin_pagar AS
  SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva,
    a.pagado,
    d.perfil
  FROM reservas a
    JOIN horarios b ON a.horario = b.id
    JOIN estado_reserva c ON a.estado = c.id
    JOIN users d ON a.usuario = d.id
  WHERE a.estado = 1 AND d.perfil::text = 'Alumno'::text AND a.pagado = false AND a.fecha_reserva >= 'now'::text::date;


CREATE OR REPLACE VIEW ncancel AS
  SELECT count(*) AS num
  FROM reservasall
  WHERE reservasall.fecha_reserva < 'now'::text::date AND reservasall.estado::text = 'Reservado'::text;


CREATE OR REPLACE VIEW noprocesadas AS
  SELECT reservasall.id,
    reservasall.usuario,
    reservasall.equipo,
    reservasall.horario,
    reservasall.estado,
    reservasall.fecha,
    reservasall.fecha_reserva
  FROM reservasall
  WHERE reservasall.fecha_reserva < 'now'::text::date AND reservasall.estado::text = 'Reservado'::text;

CREATE OR REPLACE FUNCTION limpiar()
  RETURNS boolean AS
$BODY$


BEGIN

  UPDATE reservas SET estado=4 WHERE fecha_reserva<current_date AND estado=1;
  RETURN FOUND;
END;
$BODY$
LANGUAGE plpgsql VOLATILE SECURITY DEFINER
COST 100;





INSERT INTO estado VALUES (1, 'Bueno');
INSERT INTO estado VALUES (2, 'Dañado');
INSERT INTO estado VALUES (3, 'En reparación');

INSERT INTO tipoequipo VALUES (1, 'Proyector');

INSERT INTO estado_reserva VALUES (2, 'Entregado');
INSERT INTO estado_reserva VALUES (3, 'Recibido');
INSERT INTO estado_reserva VALUES (4, 'Cancelado');
INSERT INTO estado_reserva VALUES (1, 'Reservado');

INSERT INTO horarios VALUES (1, '7:00 am - 9:30 am');
INSERT INTO horarios VALUES (2, '9:30 am - 12:30 md');
INSERT INTO horarios VALUES (3, '1:00 pm - 3:30 pm');