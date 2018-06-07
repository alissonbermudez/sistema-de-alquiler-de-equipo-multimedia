--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.3
-- Dumped by pg_dump version 9.6.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: limpiar(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION limpiar() RETURNS boolean
    LANGUAGE plpgsql SECURITY DEFINER
    AS $$

BEGIN

  UPDATE reservas SET estado=4 WHERE fecha_reserva<current_date AND estado=1;

  RETURN FOUND;

END;

$$;


ALTER FUNCTION public.limpiar() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: comentarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE comentarios (
    idcoment integer NOT NULL,
    fecha date DEFAULT ('now'::text)::date,
    titulo character varying,
    comentar text
);


ALTER TABLE comentarios OWNER TO postgres;

--
-- Name: equipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE equipo (
    idequipo character varying NOT NULL,
    marca character varying,
    modelo character varying,
    serie character varying,
    tipo integer,
    descripcion text,
    fechaadq date,
    estado integer DEFAULT 1
);


ALTER TABLE equipo OWNER TO postgres;

--
-- Name: equipo_comentario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE equipo_comentario (
    equipo character varying,
    comentario integer
);


ALTER TABLE equipo_comentario OWNER TO postgres;

--
-- Name: estado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE estado (
    idestado integer NOT NULL,
    nombre character varying
);


ALTER TABLE estado OWNER TO postgres;

--
-- Name: estado_reserva; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE estado_reserva (
    id integer NOT NULL,
    estado character varying
);


ALTER TABLE estado_reserva OWNER TO postgres;

--
-- Name: horarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE horarios (
    id integer NOT NULL,
    horario character varying NOT NULL
);


ALTER TABLE horarios OWNER TO postgres;

--
-- Name: reservas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE reservas (
    id integer NOT NULL,
    fecha date DEFAULT ('now'::text)::date,
    fecha_reserva date,
    usuario character varying,
    equipo character varying,
    horario integer,
    estado integer,
    pagado boolean DEFAULT false
);


ALTER TABLE reservas OWNER TO postgres;

--
-- Name: reservasall; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW reservasall AS
 SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva
   FROM ((reservas a
     JOIN horarios b ON ((a.horario = b.id)))
     JOIN estado_reserva c ON ((a.estado = c.id)));


ALTER TABLE reservasall OWNER TO postgres;

--
-- Name: ncancel; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW ncancel AS
 SELECT count(*) AS num
   FROM reservasall
  WHERE ((reservasall.fecha_reserva < ('now'::text)::date) AND ((reservasall.estado)::text = 'Reservado'::text));


ALTER TABLE ncancel OWNER TO postgres;

--
-- Name: noprocesadas; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW noprocesadas AS
 SELECT reservasall.id,
    reservasall.usuario,
    reservasall.equipo,
    reservasall.horario,
    reservasall.estado,
    reservasall.fecha,
    reservasall.fecha_reserva
   FROM reservasall
  WHERE ((reservasall.fecha_reserva < ('now'::text)::date) AND ((reservasall.estado)::text = 'Reservado'::text));


ALTER TABLE noprocesadas OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    id character varying NOT NULL,
    perfil character varying(50),
    username character varying(200),
    password character varying(250),
    nombre character varying(150)
);


ALTER TABLE users OWNER TO postgres;

--
-- Name: reservas_dia; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW reservas_dia AS
 SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva,
    a.pagado,
    d.perfil
   FROM (((reservas a
     JOIN horarios b ON ((a.horario = b.id)))
     JOIN estado_reserva c ON ((a.estado = c.id)))
     JOIN users d ON (((a.usuario)::text = (d.id)::text)))
  WHERE ((a.estado = 1) AND (a.fecha_reserva = ('now'::text)::date));


ALTER TABLE reservas_dia OWNER TO postgres;

--
-- Name: reservas_ent; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW reservas_ent AS
 SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva,
    a.pagado,
    d.perfil
   FROM (((reservas a
     JOIN horarios b ON ((a.horario = b.id)))
     JOIN estado_reserva c ON ((a.estado = c.id)))
     JOIN users d ON (((a.usuario)::text = (d.id)::text)))
  WHERE ((a.estado = 2) AND (a.fecha_reserva = ('now'::text)::date));


ALTER TABLE reservas_ent OWNER TO postgres;

--
-- Name: reservas_sin_pagar; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW reservas_sin_pagar AS
 SELECT a.id,
    a.usuario,
    a.equipo,
    b.horario,
    c.estado,
    a.fecha,
    a.fecha_reserva,
    a.pagado,
    d.perfil
   FROM (((reservas a
     JOIN horarios b ON ((a.horario = b.id)))
     JOIN estado_reserva c ON ((a.estado = c.id)))
     JOIN users d ON (((a.usuario)::text = (d.id)::text)))
  WHERE ((a.estado = 1) AND ((d.perfil)::text = 'Alumno'::text) AND (a.pagado = false) AND (a.fecha_reserva >= ('now'::text)::date));


ALTER TABLE reservas_sin_pagar OWNER TO postgres;

--
-- Name: tipoequipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tipoequipo (
    idtipo integer NOT NULL,
    nombre character varying
);


ALTER TABLE tipoequipo OWNER TO postgres;

--
-- Name: vercomentarios; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW vercomentarios AS
 SELECT a.idcoment,
    a.fecha,
    a.titulo,
    a.comentar,
    b.equipo,
    b.comentario
   FROM (comentarios a
     FULL JOIN equipo_comentario b ON ((b.comentario = a.idcoment)));


ALTER TABLE vercomentarios OWNER TO postgres;

--
-- Name: vistaequipo; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW vistaequipo AS
 SELECT equipo.idequipo,
    equipo.marca,
    equipo.modelo,
    equipo.serie,
    equipo.tipo,
    equipo.descripcion,
    equipo.fechaadq,
    equipo.estado
   FROM equipo;


ALTER TABLE vistaequipo OWNER TO postgres;

--
-- Data for Name: comentarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY comentarios (idcoment, fecha, titulo, comentar) FROM stdin;
\.


--
-- Data for Name: equipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY equipo (idequipo, marca, modelo, serie, tipo, descripcion, fechaadq, estado) FROM stdin;
1234	epson	159	78956	1	nuevo equipo	2018-03-02	1
\.


--
-- Data for Name: equipo_comentario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY equipo_comentario (equipo, comentario) FROM stdin;
\.


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY estado (idestado, nombre) FROM stdin;
1	Bueno
2	Dañado
3	En reparación
\.


--
-- Data for Name: estado_reserva; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY estado_reserva (id, estado) FROM stdin;
2	Entregado
3	Recibido
4	Cancelado
1	Reservado
\.


--
-- Data for Name: horarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY horarios (id, horario) FROM stdin;
1	7:00 am - 9:30 am
2	9:30 am - 12:30 md
3	1:00 pm - 3:30 pm
\.


--
-- Data for Name: reservas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY reservas (id, fecha, fecha_reserva, usuario, equipo, horario, estado, pagado) FROM stdin;
\.


--
-- Data for Name: tipoequipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipoequipo (idtipo, nombre) FROM stdin;
1	Proyector
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, perfil, username, password, nombre) FROM stdin;
11111	Admin	admin	d033e22ae348aeb5660fc2140aec35850c4da997	Administrador
\.


--
-- Name: comentarios comentarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comentarios
    ADD CONSTRAINT comentarios_pkey PRIMARY KEY (idcoment);


--
-- Name: equipo equipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY equipo
    ADD CONSTRAINT equipo_pkey PRIMARY KEY (idequipo);


--
-- Name: estado estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estado
    ADD CONSTRAINT estado_pkey PRIMARY KEY (idestado);


--
-- Name: estado_reserva estado_reserva_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estado_reserva
    ADD CONSTRAINT estado_reserva_pkey PRIMARY KEY (id);


--
-- Name: horarios horarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horarios
    ADD CONSTRAINT horarios_pkey PRIMARY KEY (id);


--
-- Name: reservas reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id);


--
-- Name: tipoequipo tipoequipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipoequipo
    ADD CONSTRAINT tipoequipo_pkey PRIMARY KEY (idtipo);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: equipo_comentario equipo_comentario_comentario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY equipo_comentario
    ADD CONSTRAINT equipo_comentario_comentario_fkey FOREIGN KEY (comentario) REFERENCES comentarios(idcoment);


--
-- Name: equipo_comentario equipo_comentario_equipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY equipo_comentario
    ADD CONSTRAINT equipo_comentario_equipo_fkey FOREIGN KEY (equipo) REFERENCES equipo(idequipo);


--
-- Name: equipo equipo_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY equipo
    ADD CONSTRAINT equipo_estado_fkey FOREIGN KEY (estado) REFERENCES estado(idestado);


--
-- Name: equipo equipo_tipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY equipo
    ADD CONSTRAINT equipo_tipo_fkey FOREIGN KEY (tipo) REFERENCES tipoequipo(idtipo);


--
-- Name: reservas reservas_equipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservas
    ADD CONSTRAINT reservas_equipo_fkey FOREIGN KEY (equipo) REFERENCES equipo(idequipo);


--
-- Name: reservas reservas_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservas
    ADD CONSTRAINT reservas_estado_fkey FOREIGN KEY (estado) REFERENCES estado_reserva(id);


--
-- Name: reservas reservas_horario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservas
    ADD CONSTRAINT reservas_horario_fkey FOREIGN KEY (horario) REFERENCES horarios(id);


--
-- Name: reservas reservas_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservas
    ADD CONSTRAINT reservas_usuario_fkey FOREIGN KEY (usuario) REFERENCES users(id);


--
-- PostgreSQL database dump complete
--

