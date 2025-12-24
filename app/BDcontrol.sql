CREATE DATABASE IF NOT EXISTS controlgestion
CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE controlgestion;

-- =========================
-- CATÁLOGOS
-- =========================

CREATE TABLE cargo (
  folio_cargo INT AUTO_INCREMENT PRIMARY KEY,
  nombre_cargo VARCHAR(300)
) ENGINE=InnoDB;

CREATE TABLE tipo_area (
  folio_area INT AUTO_INCREMENT PRIMARY KEY,
  nombre_area VARCHAR(300)
) ENGINE=InnoDB;

CREATE TABLE tipo_tramite (
  folio_tramite INT AUTO_INCREMENT PRIMARY KEY,
  tramite VARCHAR(150)
) ENGINE=InnoDB;

CREATE TABLE estado (
  folio_estado INT AUTO_INCREMENT PRIMARY KEY,
  estado VARCHAR(300) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE seccion (
  folio_seccion INT AUTO_INCREMENT PRIMARY KEY,
  nombre_seccion VARCHAR(300)
) ENGINE=InnoDB;

CREATE TABLE archivado (
  folio_archivado INT AUTO_INCREMENT PRIMARY KEY,
  archivado VARCHAR(300)
) ENGINE=InnoDB;

-- =========================
-- TABLAS PRINCIPALES
-- =========================

CREATE TABLE registro_oficio (
  folio_registro VARCHAR(150) NOT NULL,
  fecha_oficio DATE NOT NULL,
  referencia VARCHAR(150) NOT NULL,
  fecha_recepcion DATE NOT NULL,
  PRIMARY KEY (folio_registro)
) ENGINE=InnoDB;

CREATE TABLE titular (
  folio_titular INT AUTO_INCREMENT PRIMARY KEY,
  nombre_titular VARCHAR(150) NOT NULL,
  folio_cargo INT NOT NULL,
  folio_area INT NOT NULL,
  FOREIGN KEY (folio_cargo) REFERENCES cargo(folio_cargo),
  FOREIGN KEY (folio_area) REFERENCES tipo_area(folio_area)
) ENGINE=InnoDB;

CREATE TABLE remitente (
  folio_remitente INT AUTO_INCREMENT PRIMARY KEY,
  folio_titular INT NOT NULL,
  FOREIGN KEY (folio_titular) REFERENCES titular(folio_titular)
) ENGINE=InnoDB;

CREATE TABLE solicitud (
  folio_solicitud INT AUTO_INCREMENT PRIMARY KEY,
  folio_tramite INT NOT NULL,
  solicitud VARCHAR(300) NOT NULL,
  FOREIGN KEY (folio_tramite) REFERENCES tipo_tramite(folio_tramite)
) ENGINE=InnoDB;

CREATE TABLE descripcion_atencion (
  folio_atencion INT AUTO_INCREMENT PRIMARY KEY,
  oficio_contestacion VARCHAR(150),
  fecha_contestacion DATE,
  asunto VARCHAR(300)
) ENGINE=InnoDB;

CREATE TABLE ponencia_reunion (
  folio_pr INT AUTO_INCREMENT PRIMARY KEY,
  ponencia VARCHAR(300),
  reunion VARCHAR(300)
) ENGINE=InnoDB;

CREATE TABLE personal (
  folio_personal INT AUTO_INCREMENT PRIMARY KEY,
  nombre_responsable VARCHAR(300),
  folio_seccion INT NOT NULL,
  FOREIGN KEY (folio_seccion) REFERENCES seccion(folio_seccion)
) ENGINE=InnoDB;

CREATE TABLE seccion_responsable (
  folio_sec_resp INT AUTO_INCREMENT PRIMARY KEY,
  folio_personal INT NOT NULL,
  FOREIGN KEY (folio_personal) REFERENCES personal(folio_personal)
) ENGINE=InnoDB;

-- =========================
-- TABLA CENTRAL
-- =========================

CREATE TABLE oficio (
  id_folio INT AUTO_INCREMENT PRIMARY KEY,
  folio_registro VARCHAR(150) NOT NULL,
  folio_remitente INT NOT NULL,
  folio_solicitud INT NOT NULL,
  folio_atencion INT,
  folio_pr INT,
  folio_sec_resp INT,
  folio_estado INT NOT NULL,

  FOREIGN KEY (folio_registro) REFERENCES registro_oficio(folio_registro),
  FOREIGN KEY (folio_remitente) REFERENCES remitente(folio_remitente),
  FOREIGN KEY (folio_solicitud) REFERENCES solicitud(folio_solicitud),
  FOREIGN KEY (folio_atencion) REFERENCES descripcion_atencion(folio_atencion),
  FOREIGN KEY (folio_pr) REFERENCES ponencia_reunion(folio_pr),
  FOREIGN KEY (folio_sec_resp) REFERENCES seccion_responsable(folio_sec_resp),
  FOREIGN KEY (folio_estado) REFERENCES estado(folio_estado)
) ENGINE=InnoDB;

-- =========================
-- INSERT
-- =========================

INSERT INTO cargo (nombre_cargo) VALUES *
('Policia'),
('Jefe'),
('Secretaria');

INSERT INTO tipo_area (nombre_area) VALUES *
('Recursos Humanos'),
('Administracion'),
('C4');

INSERT INTO tipo_tramite (tramite) VALUES*
('Conocimiento'),
('Tramite'),
('Solicitud');

INSERT INTO estado (estado) VALUES*
('Archivado'),
('Tramite'),
('Pendiente');

INSERT INTO seccion (nombre_seccion) VALUES*
('Seccion I'),
('Seccion II'),
('Seccion III');

INSERT INTO archivado (archivado) VALUES*
('Atencion'),
('Bitacora'),
('INEGI');

INSERT INTO registro_oficio (folio_registro, fecha_oficio, referencia, fecha_recepcion) VALUES
('15n15', '2025-10-17', 'vs25r16g', '2025-12-18'),
('188g9', '2025-10-12', 'v1s5w', '2025-12-20'),
('48fh89', '2025-08-20', 'vsd15eg', '2025-11-02');

INSERT INTO titular (nombre_titular, folio_cargo, folio_area) VALUES
('Juan', 1, 1),
('Roberto', 2, 2),
('Anna', 3, 3);

INSERT INTO remitente (folio_titular) VALUES
(1),
(2),
(3);

INSERT INTO solicitud (folio_tramite, solicitud) VALUES
(1, 'Asunto 1'),
(2, 'Asunto 2'),
(3, 'Asunto 3');

INSERT INTO descripcion_atencion(oficio_contestacion, fecha_contestacion, asunto) VALUES
('155ved86', '2025/12/18', 'Asunto4'),
('11s86b5', '2025/12/20', 'Asunto5'),
('1b56s48', '2025/11/02', 'Asunto4'); 

INSERT INTO ponencia_reunion (ponencia, reunion) VALUES
('Ponencia 1', 'Reunion 1'),
('Ponencia 2', 'Reunion 2'),
('Ponencia 3', 'Reunion 3');

INSERT INTO personal (nombre_responsable, folio_seccion) VALUES
('Brenda', 1),
('Monse', 2),
('Andres', 3);

INSERT INTO seccion_responsable (folio_personal) VALUES 
(1),
(2),
(3);

INSERT INTO oficio (folio_registro, folio_remitente, folio_solicitud, folio_atencion, folio_estado, folio_pr) VALUES
('15n15', 1, 1, 1, 1, 1),
('188g9', 2, 2, 2, 2, 2),
('48fh89', 3, 3, 3, 3, 3);

-- =========================
-- JOINS
-- =========================

-- ==== OFICIO + REGISTRO ==== --

/* SELECT
    o.id_folio,
    ro.folio_registro,
    ro.fecha_oficio,
    ro.fecha_recepcion,
    ro.referencia
FROM oficio o
JOIN registro_oficio ro 
    ON o.folio_registro = ro.folio_registro; */

-- ==== OFICIO + REMITENTE + TITULAR + CARGO + ÁREA ==== --

/* SELECT
    o.id_folio,
    ro.folio_registro,
    t.nombre_titular,
    c.nombre_cargo,
    a.nombre_area
FROM oficio o
JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
JOIN remitente r ON o.folio_remitente = r.folio_remitente
JOIN titular t ON r.folio_titular = t.folio_titular
JOIN cargo c ON t.folio_cargo = c.folio_cargo
JOIN tipo_area a ON t.folio_area = a.folio_area; */

-- ==== OFICIO + SOLICITUD + TIPO DE TRÁMITE ==== --

/* SELECT
    o.id_folio,
    ro.folio_registro,
    s.solicitud,
    tt.tramite
FROM oficio o
JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
JOIN solicitud s ON o.folio_solicitud = s.folio_solicitud
JOIN tipo_tramite tt ON s.folio_tramite = tt.folio_tramite; */

-- ==== OFICIO + PERSONAL + SECCIÓN ==== --

/* SELECT
    o.id_folio,
    ro.folio_registro,
    p.nombre_responsable,
    s.nombre_seccion
FROM oficio o
JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
JOIN personal p ON o.folio_pr = p.folio_personal
JOIN seccion s ON p.folio_seccion = s.folio_seccion; */

-- ==== OFICIO + ESTADO (PENDIENTE / ATENDIDO) ==== --

/* SELECT
    o.id_folio,
    ro.folio_registro,
    e.estado
FROM oficio o
JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
JOIN estado e ON o.folio_estado = e.folio_estado; */

-- ==== OFICIO + ATENCIÓN (CONTESTACIÓN) ==== --

/* SELECT
    o.id_folio,
    ro.folio_registro,
    da.oficio_contestacion,
    da.fecha_contestacion,
    da.asunto
FROM oficio o
JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
LEFT JOIN descripcion_atencion da 
    ON o.folio_atencion = da.folio_atencion;
 */

 -- ==== OFICIO + ARCHIVADO ==== --

/* SELECT
    o.id_folio,
    ro.folio_registro,
    ar.archivado
FROM oficio o
JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
LEFT JOIN archivado ar 
    ON o.folio_atencion = ar.folio_archivado; */

-- ==== DASHBOARD – TOTAL DE OFICIOS ==== --

/* SELECT COUNT(*) AS total_oficios
FROM oficio; */

-- ==== DASHBOARD – OFICIOS PENDIENTES ==== --

/* SELECT COUNT(*) AS pendientes
FROM oficio o
JOIN estado e ON o.folio_estado = e.folio_estado
WHERE e.estado = 'Pendiente';
 */

 -- ==== DASHBOARD – OFICIOS ATENDIDOS ==== --

/* SELECT COUNT(*) AS atendidos
FROM oficio o
JOIN estado e ON o.folio_estado = e.folio_estado
WHERE e.estado = 'Atendido'; */

 -- ==== OFICIOS POR PERSONA ==== --

/* SELECT
    p.nombre_responsable,
    COUNT(o.id_folio) AS total_oficios
FROM oficio o
JOIN personal p ON o.folio_pr = p.folio_personal
GROUP BY p.nombre_responsable; */

 -- ==== OFICIOS POR ÁREA REMITENTE ==== --

/* SELECT
    a.nombre_area,
    COUNT(o.id_folio) AS total_oficios
FROM oficio o
JOIN remitente r ON o.folio_remitente = r.folio_remitente
JOIN titular t ON r.folio_titular = t.folio_titular
JOIN tipo_area a ON t.folio_area = a.folio_area
GROUP BY a.nombre_area; */

 -- ==== CONSULTA GENERAL (LA MÁS COMPLETA) ==== --

/* SELECT
    ro.folio_registro,
    ro.fecha_oficio,
    ro.fecha_recepcion,
    t.nombre_titular,
    c.nombre_cargo,
    a.nombre_area,
    s.solicitud,
    tt.tramite,
    p.nombre_responsable,
    sec.nombre_seccion,
    e.estado,
    da.fecha_contestacion
FROM oficio o
JOIN registro_oficio ro ON o.folio_registro = ro.folio_registro
JOIN remitente r ON o.folio_remitente = r.folio_remitente
JOIN titular t ON r.folio_titular = t.folio_titular
JOIN cargo c ON t.folio_cargo = c.folio_cargo
JOIN tipo_area a ON t.folio_area = a.folio_area
JOIN solicitud s ON o.folio_solicitud = s.folio_solicitud
JOIN tipo_tramite tt ON s.folio_tramite = tt.folio_tramite
JOIN personal p ON o.folio_pr = p.folio_personal
JOIN seccion sec ON p.folio_seccion = sec.folio_seccion
JOIN estado e ON o.folio_estado = e.folio_estado
LEFT JOIN descripcion_atencion da ON o.folio_atencion = da.folio_atencion; */
