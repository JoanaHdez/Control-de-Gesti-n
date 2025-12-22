-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for controlgestion
CREATE DATABASE IF NOT EXISTS `controlgestion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `controlgestion`;

-- Dumping structure for table controlgestion.archivado
CREATE TABLE IF NOT EXISTS `archivado` (
  `folio_archivado` int NOT NULL,
  `archivado` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_archivado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.cargo
CREATE TABLE IF NOT EXISTS `cargo` (
  `folio_cargo` int NOT NULL,
  `nombre_cargo` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.descripcion_atencion
CREATE TABLE IF NOT EXISTS `descripcion_atencion` (
  `folio_atencion` int NOT NULL,
  `oficio_contestacion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_contestacion` date DEFAULT NULL,
  `asunto` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_atencion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `folio_estado` int NOT NULL,
  `estado` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.oficio
CREATE TABLE IF NOT EXISTS `oficio` (
  `id_folio` int NOT NULL,
  `folio_registro` int DEFAULT NULL,
  `folio_remitente` int DEFAULT NULL,
  `folio_solicitud` int DEFAULT NULL,
  `folio_atencion` int DEFAULT NULL,
  `folio_estado` int DEFAULT NULL,
  `folio_pr` int DEFAULT NULL,
  PRIMARY KEY (`id_folio`),
  KEY `folio_registro` (`folio_registro`),
  KEY `folio_remitente` (`folio_remitente`),
  KEY `folio_solicitud` (`folio_solicitud`),
  KEY `folio_atencion` (`folio_atencion`),
  KEY `folio_estado` (`folio_estado`),
  KEY `folio_pr` (`folio_pr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.personal
CREATE TABLE IF NOT EXISTS `personal` (
  `folio_personal` int NOT NULL,
  `nombre_responsable` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `folio_seccion` int DEFAULT NULL,
  PRIMARY KEY (`folio_personal`),
  KEY `folio_seccion` (`folio_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.ponencia_reunion
CREATE TABLE IF NOT EXISTS `ponencia_reunion` (
  `folio_pr` int NOT NULL,
  `ponencia` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reunion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_pr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.registro_oficio
CREATE TABLE IF NOT EXISTS `registro_oficio` (
  `folio_registro` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_oficio` date NOT NULL,
  `referencia` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_recepcion` date NOT NULL,
  PRIMARY KEY (`folio_registro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.remitente
CREATE TABLE IF NOT EXISTS `remitente` (
  `folio_remitente` int NOT NULL,
  `folio_titular` int DEFAULT NULL,
  PRIMARY KEY (`folio_remitente`),
  KEY `folio_titular` (`folio_titular`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.seccion
CREATE TABLE IF NOT EXISTS `seccion` (
  `folio_seccion` int NOT NULL,
  `nombre_seccion` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.seccion_responsable
CREATE TABLE IF NOT EXISTS `seccion_responsable` (
  `folio_sec_resp` int NOT NULL,
  `folio_personal` int DEFAULT NULL,
  PRIMARY KEY (`folio_sec_resp`),
  KEY `folio_personal` (`folio_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.solicitud
CREATE TABLE IF NOT EXISTS `solicitud` (
  `folio_solicitud` int NOT NULL,
  `folio_tramite` int DEFAULT NULL,
  `solicitud` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_solicitud`),
  KEY `folio_tramite` (`folio_tramite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.tipo_area
CREATE TABLE IF NOT EXISTS `tipo_area` (
  `folio_area` int NOT NULL,
  `nombre_area` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_area`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.tipo_tramite
CREATE TABLE IF NOT EXISTS `tipo_tramite` (
  `folio_tramite` int NOT NULL,
  `tramite` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`folio_tramite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

-- Dumping structure for table controlgestion.titular
CREATE TABLE IF NOT EXISTS `titular` (
  `folio_titular` int NOT NULL,
  `nombre_titular` int DEFAULT NULL,
  `folio_cargo` int DEFAULT NULL,
  `folio_area` int DEFAULT NULL,
  PRIMARY KEY (`folio_titular`),
  KEY `folio_area` (`folio_area`),
  KEY `folio_cargo` (`folio_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
