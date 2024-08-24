/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `amistad_direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amistad_direccion`
(
    `id`           bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `amistad_id`   bigint(20) unsigned NOT NULL,
    `direccion_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY            `amistad_direccion_amistad_id_foreign` (`amistad_id`),
    KEY            `amistad_direccion_direccion_id_foreign` (`direccion_id`),
    CONSTRAINT `amistad_direccion_amistad_id_foreign` FOREIGN KEY (`amistad_id`) REFERENCES `amistades` (`id`),
    CONSTRAINT `amistad_direccion_direccion_id_foreign` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `amistades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amistades`
(
    `id`                       bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`               bigint(20) unsigned NOT NULL,
    `tipo_red_social_id`       bigint(20) unsigned NOT NULL,
    `nombre`                   varchar(255) NOT NULL,
    `apellido_paterno`         varchar(255) DEFAULT NULL,
    `apellido_materno`         varchar(255) DEFAULT NULL,
    `apodo`                    varchar(255) DEFAULT NULL,
    `telefono`                 varchar(10)  DEFAULT NULL,
    `usuario_red_social`       varchar(255) DEFAULT NULL,
    `observaciones_red_social` varchar(255) DEFAULT NULL,
    `created_at`               timestamp NULL DEFAULT NULL,
    `updated_at`               timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                        `amistades_persona_id_foreign` (`persona_id`),
    KEY                        `amistades_tipo_red_social_id_foreign` (`tipo_red_social_id`),
    CONSTRAINT `amistades_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `amistades_tipo_red_social_id_foreign` FOREIGN KEY (`tipo_red_social_id`) REFERENCES `cat_tipos_redes_sociales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ascendencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ascendencias`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `ascendencia` varchar(255) NOT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `autoridades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autoridades`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_areas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_asentamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_asentamientos`
(
    `id`           varchar(9)   NOT NULL,
    `municipio_id` varchar(5)   NOT NULL,
    `nombre`       varchar(255) NOT NULL,
    `latitud` double(10,6) NOT NULL,
    `longitud` double(11,6) NOT NULL,
    `altitud`      int(11) NOT NULL,
    `ambito`       enum('U','R') NOT NULL,
    PRIMARY KEY (`id`),
    KEY            `cat_asentamientos_municipio_id_foreign` (`municipio_id`),
    CONSTRAINT `cat_asentamientos_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `cat_municipios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_calvicies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_calvicies`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_cejas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_cejas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_circunstancias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_circunstancias`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `descripcion` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_clubes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_clubes`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_colectivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_colectivos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_colores`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre`      varchar(255) NOT NULL,
    `hexadecimal` varchar(6)   NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_colores_cabello`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_colores_cabello`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_colores_ojos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_colores_ojos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_colores_piel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_colores_piel`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_complexiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_complexiones`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_escolaridades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_escolaridades`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_estados`
(
    `id`                varchar(2)   NOT NULL,
    `nombre`            varchar(100) NOT NULL,
    `abreviatura_inegi` varchar(10)  NOT NULL,
    `abreviatura_cebv`  varchar(2)   NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_estados_conyugales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_estados_conyugales`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_estatus_escolaridades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_estatus_escolaridades`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_formas_caras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_formas_caras`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_formas_ojos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_formas_ojos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_formas_orejas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_formas_orejas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_generos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_grupos_pertenencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_grupos_pertenencias`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_instituciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_instituciones`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `abreviatura` varchar(255) NOT NULL,
    `nombre`      varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_lados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_lados`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    `color`  varchar(6) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_lenguas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_lenguas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_marcas_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_marcas_vehiculos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_medios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_medios`
(
    `id`            bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `tipo_medio_id` bigint(20) unsigned NOT NULL,
    `nombre`        varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    KEY             `cat_medios_tipo_medio_id_foreign` (`tipo_medio_id`),
    CONSTRAINT `cat_medios_tipo_medio_id_foreign` FOREIGN KEY (`tipo_medio_id`) REFERENCES `cat_tipos_medios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_municipios`
(
    `id`        varchar(5)   NOT NULL,
    `estado_id` varchar(2)   NOT NULL,
    `nombre`    varchar(100) NOT NULL,
    PRIMARY KEY (`id`),
    KEY         `cat_municipios_estado_id_foreign` (`estado_id`),
    CONSTRAINT `cat_municipios_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `cat_estados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_nacionalidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_nacionalidades`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre`     varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_ocupaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_ocupaciones`
(
    `id`                bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `tipo_ocupacion_id` bigint(20) unsigned NOT NULL,
    `nombre`            varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    KEY                 `cat_ocupaciones_tipo_ocupacion_id_foreign` (`tipo_ocupacion_id`),
    CONSTRAINT `cat_ocupaciones_tipo_ocupacion_id_foreign` FOREIGN KEY (`tipo_ocupacion_id`) REFERENCES `cat_tipos_ocupacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_oficinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_oficinas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_parentescos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_parentescos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_pasatiempos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_pasatiempos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_pertenencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_pertenencias`
(
    `id`                   bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `grupo_pertenencia_id` bigint(20) unsigned NOT NULL,
    `nombre`               varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    KEY                    `cat_pertenencias_grupo_pertenencia_id_foreign` (`grupo_pertenencia_id`),
    CONSTRAINT `cat_pertenencias_grupo_pertenencia_id_foreign` FOREIGN KEY (`grupo_pertenencia_id`) REFERENCES `cat_grupos_pertenencias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_puestos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_regiones_cuerpo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_regiones_cuerpo`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    `color`  varchar(6)   NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_relaciones_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_relaciones_vehiculos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_religiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_religiones`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_sexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_sexos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_sitios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_sitios`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_situaciones_migratorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_situaciones_migratorias`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tamanos_boca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tamanos_boca`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tamanos_cabello`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tamanos_cabello`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tamanos_labios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tamanos_labios`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tamanos_ojos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tamanos_ojos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tamanos_orejas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tamanos_orejas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipo_enfoque_diferenciados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipo_enfoque_diferenciados`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_cabello`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_cabello`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_condiciones_salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_condiciones_salud`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_enfermedades_piel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_enfermedades_piel`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_hipotesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_hipotesis`
(
    `id`               bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `circunstancia_id` bigint(20) unsigned NOT NULL,
    `abreviatura`      varchar(10)  NOT NULL,
    `descripcion`      varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    KEY                `cat_tipos_hipotesis_circunstancia_id_foreign` (`circunstancia_id`),
    CONSTRAINT `cat_tipos_hipotesis_circunstancia_id_foreign` FOREIGN KEY (`circunstancia_id`) REFERENCES `cat_circunstancias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_intervencion_quirurgica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_intervencion_quirurgica`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_medios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_medios`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_menton`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_menton`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_narices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_narices`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_ocupacion`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_redes_sociales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_redes_sociales`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_reportes`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre`      varchar(255) NOT NULL,
    `abreviatura` varchar(4)   NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_sangre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_sangre`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_tipos_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_tipos_vehiculos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_usos_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_usos_vehiculos`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cat_vistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_vistas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `club_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club_persona`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `club_id`    bigint(20) unsigned NOT NULL,
    `persona_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY          `club_persona_club_id_foreign` (`club_id`),
    KEY          `club_persona_persona_id_foreign` (`persona_id`),
    CONSTRAINT `club_persona_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `cat_clubes` (`id`),
    CONSTRAINT `club_persona_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `companias_telefonicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companias_telefonicas`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `condiciones_salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `condiciones_salud`
(
    `id`                      bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`              bigint(20) unsigned NOT NULL,
    `tipo_condicion_salud_id` bigint(20) unsigned NOT NULL,
    `indole_salud`            enum('Fisica','Psicologica') NOT NULL,
    `tratamiento`             text DEFAULT NULL,
    `observaciones`           text DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                       `condiciones_salud_persona_id_foreign` (`persona_id`),
    KEY                       `condiciones_salud_tipo_condicion_salud_id_foreign` (`tipo_condicion_salud_id`),
    CONSTRAINT `condiciones_salud_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `condiciones_salud_tipo_condicion_salud_id_foreign` FOREIGN KEY (`tipo_condicion_salud_id`) REFERENCES `cat_tipos_condiciones_salud` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactos`
(
    `id`                 bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`         bigint(20) unsigned NOT NULL,
    `tipo_red_social_id` bigint(20) unsigned DEFAULT NULL,
    `tipo`               enum('Red Social','Correo Electronico') NOT NULL,
    `nombre`             varchar(255) NOT NULL,
    `observaciones`      varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                  `contactos_persona_id_foreign` (`persona_id`),
    KEY                  `contactos_tipo_red_social_id_foreign` (`tipo_red_social_id`),
    CONSTRAINT `contactos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `contactos_tipo_red_social_id_foreign` FOREIGN KEY (`tipo_red_social_id`) REFERENCES `cat_tipos_redes_sociales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `contextos_economicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contextos_economicos`
(
    `id`                        bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`                bigint(20) unsigned NOT NULL,
    `donde_trabaja`             varchar(255) DEFAULT NULL,
    `antiguedad_trabajo`        int(11) DEFAULT NULL,
    `gusta_trabajo`             tinyint(1) DEFAULT NULL,
    `desea_trabajo_foraneo`     tinyint(1) DEFAULT NULL,
    `ubicacion_trabajo_foraneo` varchar(255) DEFAULT NULL,
    `violencia_laboral`         tinyint(1) DEFAULT NULL,
    `violentador_laboral`       varchar(255) DEFAULT NULL,
    `tiene_deudas`              tinyint(1) DEFAULT NULL,
    `monto_deuda` double(8,2) DEFAULT NULL,
    `deuda_con`                 varchar(255) DEFAULT NULL,
    `created_at`                timestamp NULL DEFAULT NULL,
    `updated_at`                timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                         `contextos_economicos_persona_id_foreign` (`persona_id`),
    CONSTRAINT `contextos_economicos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `contextos_familiares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contextos_familiares`
(
    `id`                     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`             bigint(20) unsigned NOT NULL,
    `estado_conyugal_id`     bigint(20) unsigned DEFAULT NULL,
    `numero_personas_vive`   int(11) DEFAULT NULL,
    `nombre_pareja_conyugue` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                      `contextos_familiares_persona_id_foreign` (`persona_id`),
    KEY                      `contextos_familiares_estado_conyugal_id_foreign` (`estado_conyugal_id`),
    CONSTRAINT `contextos_familiares_estado_conyugal_id_foreign` FOREIGN KEY (`estado_conyugal_id`) REFERENCES `cat_estados_conyugales` (`id`),
    CONSTRAINT `contextos_familiares_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `contextos_sociales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contextos_sociales`
(
    `id`                             bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`                     bigint(20) unsigned NOT NULL,
    `situacion_migratoria_id`        bigint(20) unsigned NOT NULL,
    `esta_transito_estados_unidos`   tinyint(1) DEFAULT NULL,
    `descripcion_proceso_migratorio` text DEFAULT NULL,
    `created_at`                     timestamp NULL DEFAULT NULL,
    `updated_at`                     timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                              `contextos_sociales_persona_id_foreign` (`persona_id`),
    KEY                              `contextos_sociales_situacion_migratoria_id_foreign` (`situacion_migratoria_id`),
    CONSTRAINT `contextos_sociales_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `contextos_sociales_situacion_migratoria_id_foreign` FOREIGN KEY (`situacion_migratoria_id`) REFERENCES `cat_situaciones_migratorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `control_ogpis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `control_ogpis`
(
    `id`                 bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`         bigint(20) unsigned NOT NULL,
    `fecha_codificacion` datetime     NOT NULL,
    `nombre_codificador` varchar(255) NOT NULL,
    `observaciones`      varchar(255) DEFAULT NULL,
    `numero_tarjeta`     varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    KEY                  `control_ogpis_reporte_id_foreign` (`reporte_id`),
    CONSTRAINT `control_ogpis_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `desaparecidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desaparecidos`
(
    `id`                               bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`                       bigint(20) unsigned NOT NULL,
    `persona_id`                       bigint(20) unsigned DEFAULT NULL,
    `estatus_rpdno_id`                 bigint(20) unsigned DEFAULT NULL,
    `estatus_cebv_id`                  bigint(20) unsigned DEFAULT NULL,
    `ocupacion_principal_id`           bigint(20) unsigned DEFAULT NULL,
    `ocupacion_secundaria_id`          bigint(20) unsigned DEFAULT NULL,
    `clasificacion_persona`            varchar(255) DEFAULT NULL,
    `habla_espanhol`                   tinyint(1) DEFAULT NULL,
    `sabe_leer`                        tinyint(1) DEFAULT NULL,
    `sabe_escribir`                    tinyint(1) DEFAULT NULL,
    `url_boletin`                      varchar(255) DEFAULT NULL,
    `declaracion_especial_ausencia`    tinyint(1) NOT NULL DEFAULT 0,
    `accion_urgente`                   tinyint(1) NOT NULL DEFAULT 0,
    `dictamen`                         tinyint(1) NOT NULL DEFAULT 0,
    `ci_nivel_federal`                 tinyint(1) NOT NULL DEFAULT 0,
    `otro_derecho_humano`              varchar(255) DEFAULT NULL,
    `fecha_nacimiento_aproximada`      date         DEFAULT NULL,
    `fecha_nacimiento_cebv`            varchar(255) DEFAULT NULL,
    `observaciones_fecha_nacimiento`   varchar(255) DEFAULT NULL,
    `edad_momento_desaparicion_anos`   int(11) DEFAULT NULL,
    `edad_momento_desaparicion_meses`  int(11) DEFAULT NULL,
    `edad_momento_desaparicion_dias`   int(11) DEFAULT NULL,
    `identidad_resguardada`            text         DEFAULT NULL,
    `alias`                            text         DEFAULT NULL,
    `descripcion_ocupacion_principal`  text         DEFAULT NULL,
    `descripcion_ocupacion_secundaria` text         DEFAULT NULL,
    `otras_especificaciones_ocupacion` text         DEFAULT NULL,
    `boletin_img_path`                 text         DEFAULT NULL,
    `created_at`                       timestamp NULL DEFAULT NULL,
    `updated_at`                       timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                                `desaparecidos_reporte_id_foreign` (`reporte_id`),
    KEY                                `desaparecidos_persona_id_foreign` (`persona_id`),
    KEY                                `desaparecidos_estatus_rpdno_id_foreign` (`estatus_rpdno_id`),
    KEY                                `desaparecidos_estatus_cebv_id_foreign` (`estatus_cebv_id`),
    CONSTRAINT `desaparecidos_estatus_cebv_id_foreign` FOREIGN KEY (`estatus_cebv_id`) REFERENCES `estatus_personas` (`id`),
    CONSTRAINT `desaparecidos_estatus_rpdno_id_foreign` FOREIGN KEY (`estatus_rpdno_id`) REFERENCES `estatus_personas` (`id`),
    CONSTRAINT `desaparecidos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `desaparecidos_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `desapariciones_forzadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desapariciones_forzadas`
(
    `id`                                     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`                             bigint(20) unsigned NOT NULL,
    `autoridad_id`                           bigint(20) unsigned DEFAULT NULL,
    `particular_id`                          bigint(20) unsigned DEFAULT NULL,
    `metodo_captura_id`                      bigint(20) unsigned DEFAULT NULL,
    `medio_captura_id`                       bigint(20) unsigned DEFAULT NULL,
    `desaparecio_autoridad`                  tinyint(1) DEFAULT NULL,
    `descripcion_autoridad`                  text DEFAULT NULL,
    `descripcion_particular`                 text DEFAULT NULL,
    `desaparecio_particular`                 tinyint(1) DEFAULT NULL,
    `descripcion_metodo_captura`             text DEFAULT NULL,
    `descripcion_medio_captura`              text DEFAULT NULL,
    `detencion_previa_extorsion`             tinyint(1) DEFAULT NULL,
    `descripcion_detencion_previa_extorsion` text DEFAULT NULL,
    `ha_sido_avistado`                       tinyint(1) DEFAULT NULL,
    `donde_ha_sido_avistado`                 text DEFAULT NULL,
    `delitos_desaparicion`                   tinyint(1) DEFAULT NULL,
    `descripcion_delitos_desaparicion`       text DEFAULT NULL,
    `descripcion_grupo_perpetrador`          text DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                                      `desapariciones_forzadas_reporte_id_foreign` (`reporte_id`),
    KEY                                      `desapariciones_forzadas_autoridad_id_foreign` (`autoridad_id`),
    KEY                                      `desapariciones_forzadas_particular_id_foreign` (`particular_id`),
    KEY                                      `desapariciones_forzadas_metodo_captura_id_foreign` (`metodo_captura_id`),
    KEY                                      `desapariciones_forzadas_medio_captura_id_foreign` (`medio_captura_id`),
    CONSTRAINT `desapariciones_forzadas_autoridad_id_foreign` FOREIGN KEY (`autoridad_id`) REFERENCES `autoridades` (`id`),
    CONSTRAINT `desapariciones_forzadas_medio_captura_id_foreign` FOREIGN KEY (`medio_captura_id`) REFERENCES `medios_captura` (`id`),
    CONSTRAINT `desapariciones_forzadas_metodo_captura_id_foreign` FOREIGN KEY (`metodo_captura_id`) REFERENCES `metodos_captura` (`id`),
    CONSTRAINT `desapariciones_forzadas_particular_id_foreign` FOREIGN KEY (`particular_id`) REFERENCES `particulares` (`id`),
    CONSTRAINT `desapariciones_forzadas_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones`
(
    `id`                    bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `asentamiento_id`       varchar(9)         DEFAULT NULL,
    `domicilio_concatenado` varchar(9)         DEFAULT NULL,
    `calle`                 varchar(255)       DEFAULT NULL,
    `colonia`               varchar(255)       DEFAULT NULL,
    `numero_exterior`       varchar(10)        DEFAULT NULL,
    `numero_interior`       varchar(10)        DEFAULT NULL,
    `calle_1`               varchar(255)       DEFAULT NULL,
    `calle_2`               varchar(255)       DEFAULT NULL,
    `tramo_carretero`       varchar(100)       DEFAULT NULL,
    `codigo_postal`         varchar(5)         DEFAULT NULL,
    `referencia`            text               DEFAULT NULL,
    `fecha_creacion`        timestamp NOT NULL DEFAULT current_timestamp(),
    `fecha_actualizacion`   timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`),
    KEY                     `direcciones_asentamiento_id_foreign` (`asentamiento_id`),
    CONSTRAINT `direcciones_asentamiento_id_foreign` FOREIGN KEY (`asentamiento_id`) REFERENCES `cat_asentamientos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `documentos_legales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos_legales`
(
    `id`                      bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `desaparecido_id`         bigint(20) unsigned NOT NULL,
    `tipo_documento`          enum('CI','AB','DH') NOT NULL,
    `numero_documento`        varchar(255) DEFAULT NULL,
    `donde_radica`            varchar(255) DEFAULT NULL,
    `nombre_servidor_publico` varchar(255) DEFAULT NULL,
    `fecha_recepcion`         date         DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                       `documentos_legales_desaparecido_id_foreign` (`desaparecido_id`),
    CONSTRAINT `documentos_legales_desaparecido_id_foreign` FOREIGN KEY (`desaparecido_id`) REFERENCES `desaparecidos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `domicilios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domicilios`
(
    `id`           bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `direccion_id` bigint(20) unsigned NOT NULL,
    `persona_id`   bigint(20) unsigned NOT NULL,
    `created_at`   timestamp NULL DEFAULT NULL,
    `updated_at`   timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY            `domicilios_direccion_id_foreign` (`direccion_id`),
    KEY            `domicilios_persona_id_foreign` (`persona_id`),
    CONSTRAINT `domicilios_direccion_id_foreign` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones` (`id`),
    CONSTRAINT `domicilios_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `embarazos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `embarazos`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id` bigint(20) unsigned NOT NULL,
    `meses`      int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY          `embarazos_persona_id_foreign` (`persona_id`),
    CONSTRAINT `embarazos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id` bigint(20) unsigned NOT NULL,
    `puesto_id`  bigint(20) unsigned DEFAULT NULL,
    `oficina_id` bigint(20) unsigned DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY          `empleados_persona_id_foreign` (`persona_id`),
    KEY          `empleados_puesto_id_foreign` (`puesto_id`),
    KEY          `empleados_oficina_id_foreign` (`oficina_id`),
    CONSTRAINT `empleados_oficina_id_foreign` FOREIGN KEY (`oficina_id`) REFERENCES `cat_oficinas` (`id`),
    CONSTRAINT `empleados_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `empleados_puesto_id_foreign` FOREIGN KEY (`puesto_id`) REFERENCES `cat_puestos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `enfermedades_piel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enfermedades_piel`
(
    `id`                      bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`              bigint(20) unsigned NOT NULL,
    `tipo_enfermedad_piel_id` bigint(20) unsigned NOT NULL,
    `descripcion`             text DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                       `enfermedades_piel_persona_id_foreign` (`persona_id`),
    KEY                       `enfermedades_piel_tipo_enfermedad_piel_id_foreign` (`tipo_enfermedad_piel_id`),
    CONSTRAINT `enfermedades_piel_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `enfermedades_piel_tipo_enfermedad_piel_id_foreign` FOREIGN KEY (`tipo_enfermedad_piel_id`) REFERENCES `cat_tipos_enfermedades_piel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `enfoques_diferenciados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enfoques_diferenciados`
(
    `id`                             bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`                     bigint(20) unsigned NOT NULL,
    `pertenencia_grupal_etnica`      tinyint(1) DEFAULT NULL,
    `descripcion_vulnerabilidad`     text DEFAULT NULL,
    `informacion_relevante_busqueda` text DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                              `enfoques_diferenciados_persona_id_foreign` (`persona_id`),
    CONSTRAINT `enfoques_diferenciados_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `estatus_perpetradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatus_perpetradores`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `estatus_personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatus_personas`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre`      varchar(100) NOT NULL,
    `abreviatura` varchar(10)  NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudios`
(
    `id`                     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`             bigint(20) unsigned NOT NULL,
    `escolaridad_id`         bigint(20) unsigned DEFAULT NULL,
    `estatus_escolaridad_id` bigint(20) unsigned DEFAULT NULL,
    `direccion_id`           bigint(20) unsigned DEFAULT NULL,
    `nombre_institucion`     varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                      `estudios_persona_id_foreign` (`persona_id`),
    KEY                      `estudios_escolaridad_id_foreign` (`escolaridad_id`),
    KEY                      `estudios_estatus_escolaridad_id_foreign` (`estatus_escolaridad_id`),
    KEY                      `estudios_direccion_id_foreign` (`direccion_id`),
    CONSTRAINT `estudios_direccion_id_foreign` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones` (`id`),
    CONSTRAINT `estudios_escolaridad_id_foreign` FOREIGN KEY (`escolaridad_id`) REFERENCES `cat_escolaridades` (`id`),
    CONSTRAINT `estudios_estatus_escolaridad_id_foreign` FOREIGN KEY (`estatus_escolaridad_id`) REFERENCES `cat_estatus_escolaridades` (`id`),
    CONSTRAINT `estudios_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `etnias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etnias`
(
    `id`              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`      bigint(20) unsigned NOT NULL,
    `religion_id`     bigint(20) unsigned NOT NULL,
    `lengua_id`       bigint(20) unsigned NOT NULL,
    `grupo_etnico_id` bigint(20) unsigned NOT NULL,
    `vestimenta_id`   bigint(20) unsigned NOT NULL,
    `ascendencia_id`  bigint(20) unsigned NOT NULL,
    `created_at`      timestamp NULL DEFAULT NULL,
    `updated_at`      timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `expedientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expedientes`
(
    `id`            bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`    bigint(20) unsigned NOT NULL,
    `persona_id`    bigint(20) unsigned DEFAULT NULL,
    `parentesco_id` bigint(20) unsigned NOT NULL,
    `tipo`          enum('Directo','Indirecto') NOT NULL,
    PRIMARY KEY (`id`),
    KEY             `expedientes_reporte_id_foreign` (`reporte_id`),
    KEY             `expedientes_persona_id_foreign` (`persona_id`),
    KEY             `expedientes_parentesco_id_foreign` (`parentesco_id`),
    CONSTRAINT `expedientes_parentesco_id_foreign` FOREIGN KEY (`parentesco_id`) REFERENCES `cat_parentescos` (`id`),
    CONSTRAINT `expedientes_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `expedientes_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `uuid`       varchar(255) NOT NULL,
    `connection` text         NOT NULL,
    `queue`      text         NOT NULL,
    `payload`    longtext     NOT NULL,
    `exception`  longtext     NOT NULL,
    `failed_at`  timestamp    NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `familiares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `familiares`
(
    `id`                    bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`            bigint(20) unsigned NOT NULL,
    `parentesco_id`         bigint(20) unsigned NOT NULL,
    `nombre`                varchar(255) NOT NULL,
    `ha_ejercido_violencia` tinyint(1) DEFAULT NULL,
    `es_familiar_cercano`   tinyint(1) DEFAULT NULL,
    `observaciones`         text         NOT NULL,
    PRIMARY KEY (`id`),
    KEY                     `familiares_persona_id_foreign` (`persona_id`),
    KEY                     `familiares_parentesco_id_foreign` (`parentesco_id`),
    CONSTRAINT `familiares_parentesco_id_foreign` FOREIGN KEY (`parentesco_id`) REFERENCES `cat_parentescos` (`id`),
    CONSTRAINT `familiares_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `folios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `folios`
(
    `id`                    bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`            bigint(20) unsigned NOT NULL,
    `reporte_id`            bigint(20) unsigned NOT NULL,
    `user_id`               bigint(20) unsigned NOT NULL,
    `folio_cebv`            varchar(20) NOT NULL,
    `folio_fub`             varchar(37)          DEFAULT NULL,
    `autoridad_ingresa_fub` varchar(255)         DEFAULT NULL,
    `created_at`            timestamp   NOT NULL DEFAULT current_timestamp(),
    `updated_at`            timestamp   NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`),
    KEY                     `folios_persona_id_foreign` (`persona_id`),
    KEY                     `folios_reporte_id_foreign` (`reporte_id`),
    KEY                     `folios_user_id_foreign` (`user_id`),
    CONSTRAINT `folios_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `folios_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`),
    CONSTRAINT `folios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `grupo_etnicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo_etnicos`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `grupoetnico` varchar(255) NOT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `grupos_vulnerables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos_vulnerables`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `grupos_vulnerables_personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos_vulnerables_personas`
(
    `id`                  bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`          bigint(20) unsigned NOT NULL,
    `grupo_vulnerable_id` bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY                   `grupos_vulnerables_personas_persona_id_foreign` (`persona_id`),
    KEY                   `grupos_vulnerables_personas_grupo_vulnerable_id_foreign` (`grupo_vulnerable_id`),
    CONSTRAINT `grupos_vulnerables_personas_grupo_vulnerable_id_foreign` FOREIGN KEY (`grupo_vulnerable_id`) REFERENCES `grupos_vulnerables` (`id`),
    CONSTRAINT `grupos_vulnerables_personas_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `hechos_desapariciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hechos_desapariciones`
(
    `id`                                        bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`                                bigint(20) unsigned NOT NULL,
    `direccion_id`                              bigint(20) unsigned DEFAULT NULL,
    `fecha_desaparicion`                        datetime     DEFAULT NULL,
    `fecha_desaparicion_aproximada`             date         DEFAULT NULL,
    `fecha_desaparicion_cebv`                   varchar(255) DEFAULT NULL,
    `hora_desaparicion`                         varchar(255) DEFAULT NULL,
    `fecha_percato`                             datetime     DEFAULT NULL,
    `fecha_percato_cebv`                        varchar(255) DEFAULT NULL,
    `hora_percato`                              varchar(255) DEFAULT NULL,
    `aclaraciones_fecha_hechos`                 text         DEFAULT NULL,
    `amenaza_cambio_comportamiento`             tinyint(1) DEFAULT NULL,
    `descripcion_amenaza_cambio_comportamiento` text         DEFAULT NULL,
    `contador_desapariciones`                   int(11) DEFAULT 0,
    `situacion_previa`                          text         DEFAULT NULL,
    `informacion_relevante`                     text         DEFAULT NULL,
    `hechos_desaparicion`                       text         DEFAULT NULL,
    `sintesis_desaparicion`                     text         DEFAULT NULL,
    `desaparecio_acompanado`                    tinyint(1) DEFAULT NULL,
    `personas_mismo_evento`                     int(11) DEFAULT NULL,
    `created_at`                                timestamp NULL DEFAULT NULL,
    `updated_at`                                timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                                         `hechos_desapariciones_reporte_id_foreign` (`reporte_id`),
    KEY                                         `hechos_desapariciones_direccion_id_foreign` (`direccion_id`),
    CONSTRAINT `hechos_desapariciones_direccion_id_foreign` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones` (`id`),
    CONSTRAINT `hechos_desapariciones_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `hipotesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hipotesis`
(
    `id`                   bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`           bigint(20) unsigned NOT NULL,
    `tipo_hipotesis_id`    bigint(20) unsigned DEFAULT NULL,
    `sitio_id`             bigint(20) unsigned DEFAULT NULL,
    `area_asigna_sitio_id` bigint(20) unsigned DEFAULT NULL,
    `etapa`                enum('Inicial','Final') NOT NULL,
    `created_at`           timestamp NULL DEFAULT NULL,
    `updated_at`           timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                    `hipotesis_reporte_id_foreign` (`reporte_id`),
    KEY                    `hipotesis_tipo_hipotesis_id_foreign` (`tipo_hipotesis_id`),
    KEY                    `hipotesis_sitio_id_foreign` (`sitio_id`),
    KEY                    `hipotesis_area_asigna_sitio_id_foreign` (`area_asigna_sitio_id`),
    CONSTRAINT `hipotesis_area_asigna_sitio_id_foreign` FOREIGN KEY (`area_asigna_sitio_id`) REFERENCES `cat_areas` (`id`),
    CONSTRAINT `hipotesis_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`),
    CONSTRAINT `hipotesis_sitio_id_foreign` FOREIGN KEY (`sitio_id`) REFERENCES `cat_sitios` (`id`),
    CONSTRAINT `hipotesis_tipo_hipotesis_id_foreign` FOREIGN KEY (`tipo_hipotesis_id`) REFERENCES `cat_tipos_hipotesis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `intervenciones_quirurgicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervenciones_quirurgicas`
(
    `id`                              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`                      bigint(20) unsigned NOT NULL,
    `tipo_intervencion_quirurgica_id` bigint(20) unsigned NOT NULL,
    `descripcion`                     text DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                               `intervenciones_quirurgicas_persona_id_foreign` (`persona_id`),
    KEY                               `fk_interv_quirurgica_tipo_intervencion_quirurgica_id` (`tipo_intervencion_quirurgica_id`),
    CONSTRAINT `fk_interv_quirurgica_tipo_intervencion_quirurgica_id` FOREIGN KEY (`tipo_intervencion_quirurgica_id`) REFERENCES `cat_tipos_intervencion_quirurgica` (`id`),
    CONSTRAINT `intervenciones_quirurgicas_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `lado_rnpdno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lado_rnpdno`
(
    `id`            bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nomladorpndno` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `medias_filiaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medias_filiaciones`
(
    `id`                       bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`               bigint(20) unsigned DEFAULT NULL,
    `complexion_id`            bigint(20) unsigned DEFAULT NULL,
    `color_piel_id`            bigint(20) unsigned DEFAULT NULL,
    `forma_cara_id`            bigint(20) unsigned DEFAULT NULL,
    `estatura_centimetros`     int(11) DEFAULT NULL,
    `peso_kilogramos` double(8,2) DEFAULT NULL,
    `color_ojos_id`            bigint(20) unsigned DEFAULT NULL,
    `forma_ojos_id`            bigint(20) unsigned DEFAULT NULL,
    `tamano_ojos_id`           bigint(20) unsigned DEFAULT NULL,
    `especificaciones_ojos`    text DEFAULT NULL,
    `calvicie_id`              bigint(20) unsigned DEFAULT NULL,
    `color_cabello_id`         bigint(20) unsigned DEFAULT NULL,
    `tamano_cabello_id`        bigint(20) unsigned DEFAULT NULL,
    `tipo_cabello_id`          bigint(20) unsigned DEFAULT NULL,
    `especificaciones_cabello` text DEFAULT NULL,
    `cejas_id`                 bigint(20) unsigned DEFAULT NULL,
    `especificaciones_cejas`   text DEFAULT NULL,
    `tiene_bigote`             tinyint(1) DEFAULT NULL,
    `especificaciones_bigote`  text DEFAULT NULL,
    `tiene_barba`              tinyint(1) DEFAULT NULL,
    `especificaciones_barba`   text DEFAULT NULL,
    `tipo_nariz_id`            bigint(20) unsigned DEFAULT NULL,
    `especificaciones_nariz`   text DEFAULT NULL,
    `tamano_boca_id`           bigint(20) unsigned DEFAULT NULL,
    `tamano_labios_id`         bigint(20) unsigned DEFAULT NULL,
    `especificaciones_boca`    text DEFAULT NULL,
    `tamano_orejas_id`         bigint(20) unsigned DEFAULT NULL,
    `forma_orejas_id`          bigint(20) unsigned DEFAULT NULL,
    `especificaciones_orejas`  text DEFAULT NULL,
    `created_at`               timestamp NULL DEFAULT NULL,
    `updated_at`               timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                        `medias_filiaciones_persona_id_foreign` (`persona_id`),
    KEY                        `medias_filiaciones_complexion_id_foreign` (`complexion_id`),
    KEY                        `medias_filiaciones_color_piel_id_foreign` (`color_piel_id`),
    KEY                        `medias_filiaciones_forma_cara_id_foreign` (`forma_cara_id`),
    KEY                        `medias_filiaciones_color_ojos_id_foreign` (`color_ojos_id`),
    KEY                        `medias_filiaciones_forma_ojos_id_foreign` (`forma_ojos_id`),
    KEY                        `medias_filiaciones_tamano_ojos_id_foreign` (`tamano_ojos_id`),
    KEY                        `medias_filiaciones_calvicie_id_foreign` (`calvicie_id`),
    KEY                        `medias_filiaciones_color_cabello_id_foreign` (`color_cabello_id`),
    KEY                        `medias_filiaciones_tamano_cabello_id_foreign` (`tamano_cabello_id`),
    KEY                        `medias_filiaciones_tipo_cabello_id_foreign` (`tipo_cabello_id`),
    KEY                        `medias_filiaciones_cejas_id_foreign` (`cejas_id`),
    KEY                        `medias_filiaciones_tipo_nariz_id_foreign` (`tipo_nariz_id`),
    KEY                        `medias_filiaciones_tamano_boca_id_foreign` (`tamano_boca_id`),
    KEY                        `medias_filiaciones_tamano_labios_id_foreign` (`tamano_labios_id`),
    KEY                        `medias_filiaciones_tamano_orejas_id_foreign` (`tamano_orejas_id`),
    KEY                        `medias_filiaciones_forma_orejas_id_foreign` (`forma_orejas_id`),
    CONSTRAINT `medias_filiaciones_calvicie_id_foreign` FOREIGN KEY (`calvicie_id`) REFERENCES `cat_calvicies` (`id`),
    CONSTRAINT `medias_filiaciones_cejas_id_foreign` FOREIGN KEY (`cejas_id`) REFERENCES `cat_cejas` (`id`),
    CONSTRAINT `medias_filiaciones_color_cabello_id_foreign` FOREIGN KEY (`color_cabello_id`) REFERENCES `cat_colores_cabello` (`id`),
    CONSTRAINT `medias_filiaciones_color_ojos_id_foreign` FOREIGN KEY (`color_ojos_id`) REFERENCES `cat_colores_ojos` (`id`),
    CONSTRAINT `medias_filiaciones_color_piel_id_foreign` FOREIGN KEY (`color_piel_id`) REFERENCES `cat_colores_piel` (`id`),
    CONSTRAINT `medias_filiaciones_complexion_id_foreign` FOREIGN KEY (`complexion_id`) REFERENCES `cat_complexiones` (`id`),
    CONSTRAINT `medias_filiaciones_forma_cara_id_foreign` FOREIGN KEY (`forma_cara_id`) REFERENCES `cat_formas_caras` (`id`),
    CONSTRAINT `medias_filiaciones_forma_ojos_id_foreign` FOREIGN KEY (`forma_ojos_id`) REFERENCES `cat_formas_ojos` (`id`),
    CONSTRAINT `medias_filiaciones_forma_orejas_id_foreign` FOREIGN KEY (`forma_orejas_id`) REFERENCES `cat_formas_orejas` (`id`),
    CONSTRAINT `medias_filiaciones_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `medias_filiaciones_tamano_boca_id_foreign` FOREIGN KEY (`tamano_boca_id`) REFERENCES `cat_tamanos_boca` (`id`),
    CONSTRAINT `medias_filiaciones_tamano_cabello_id_foreign` FOREIGN KEY (`tamano_cabello_id`) REFERENCES `cat_tamanos_cabello` (`id`),
    CONSTRAINT `medias_filiaciones_tamano_labios_id_foreign` FOREIGN KEY (`tamano_labios_id`) REFERENCES `cat_tamanos_labios` (`id`),
    CONSTRAINT `medias_filiaciones_tamano_ojos_id_foreign` FOREIGN KEY (`tamano_ojos_id`) REFERENCES `cat_tamanos_ojos` (`id`),
    CONSTRAINT `medias_filiaciones_tamano_orejas_id_foreign` FOREIGN KEY (`tamano_orejas_id`) REFERENCES `cat_tamanos_orejas` (`id`),
    CONSTRAINT `medias_filiaciones_tipo_cabello_id_foreign` FOREIGN KEY (`tipo_cabello_id`) REFERENCES `cat_tipos_cabello` (`id`),
    CONSTRAINT `medias_filiaciones_tipo_nariz_id_foreign` FOREIGN KEY (`tipo_nariz_id`) REFERENCES `cat_tipos_narices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `medias_filiaciones_complementarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medias_filiaciones_complementarias`
(
    `id`                             bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`                     bigint(20) unsigned DEFAULT NULL,
    `tipo_menton_id`                 bigint(20) unsigned DEFAULT NULL,
    `tiene_ausencia_dental`          tinyint(1) DEFAULT NULL,
    `descripcion_ausencia_dental`    text DEFAULT NULL,
    `tiene_tratamiento_dental`       tinyint(1) DEFAULT NULL,
    `descripcion_tratamiento_dental` text DEFAULT NULL,
    `especificaciones_menton`        text DEFAULT NULL,
    `observaciones_generales`        text DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                              `medias_filiaciones_complementarias_persona_id_foreign` (`persona_id`),
    KEY                              `medias_filiaciones_complementarias_tipo_menton_id_foreign` (`tipo_menton_id`),
    CONSTRAINT `medias_filiaciones_complementarias_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `medias_filiaciones_complementarias_tipo_menton_id_foreign` FOREIGN KEY (`tipo_menton_id`) REFERENCES `cat_tipos_menton` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `medios_captura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medios_captura`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `metodos_captura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metodos_captura`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations`
(
    `id`        int(10) unsigned NOT NULL AUTO_INCREMENT,
    `migration` varchar(255) NOT NULL,
    `batch`     int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions`
(
    `permission_id` bigint(20) unsigned NOT NULL,
    `model_type`    varchar(255) NOT NULL,
    `model_id`      bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`permission_id`, `model_id`, `model_type`),
    KEY             `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
    CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles`
(
    `role_id`    bigint(20) unsigned NOT NULL,
    `model_type` varchar(255) NOT NULL,
    `model_id`   bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`role_id`, `model_id`, `model_type`),
    KEY          `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
    CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `nacionalidad_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nacionalidad_persona`
(
    `id`              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nacionalidad_id` bigint(20) unsigned NOT NULL,
    `persona_id`      bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY               `nacionalidad_persona_nacionalidad_id_foreign` (`nacionalidad_id`),
    KEY               `nacionalidad_persona_persona_id_foreign` (`persona_id`),
    CONSTRAINT `nacionalidad_persona_nacionalidad_id_foreign` FOREIGN KEY (`nacionalidad_id`) REFERENCES `cat_nacionalidades` (`id`),
    CONSTRAINT `nacionalidad_persona_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ocupacion_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ocupacion_persona`
(
    `id`            bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `ocupacion_id`  bigint(20) unsigned NOT NULL,
    `persona_id`    bigint(20) unsigned NOT NULL,
    `observaciones` text DEFAULT NULL,
    `created_at`    timestamp NULL DEFAULT NULL,
    `updated_at`    timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY             `ocupacion_persona_ocupacion_id_foreign` (`ocupacion_id`),
    KEY             `ocupacion_persona_persona_id_foreign` (`persona_id`),
    CONSTRAINT `ocupacion_persona_ocupacion_id_foreign` FOREIGN KEY (`ocupacion_id`) REFERENCES `cat_ocupaciones` (`id`),
    CONSTRAINT `ocupacion_persona_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `particulares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `particulares`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `pasatiempo_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasatiempo_persona`
(
    `id`            bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `pasatiempo_id` bigint(20) unsigned NOT NULL,
    `persona_id`    bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY             `pasatiempo_persona_pasatiempo_id_foreign` (`pasatiempo_id`),
    KEY             `pasatiempo_persona_persona_id_foreign` (`persona_id`),
    CONSTRAINT `pasatiempo_persona_pasatiempo_id_foreign` FOREIGN KEY (`pasatiempo_id`) REFERENCES `cat_pasatiempos` (`id`),
    CONSTRAINT `pasatiempo_persona_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens`
(
    `email`      varchar(255) NOT NULL,
    `token`      varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name`       varchar(255) NOT NULL,
    `guard_name` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `perpetradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perpetradores`
(
    `id`                     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`             bigint(20) unsigned NOT NULL,
    `sexo_id`                bigint(20) unsigned DEFAULT NULL,
    `estatus_perpetrador_id` bigint(20) unsigned DEFAULT NULL,
    `nombre`                 varchar(255) NOT NULL,
    `descripcion`            varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                      `perpetradores_reporte_id_foreign` (`reporte_id`),
    KEY                      `perpetradores_sexo_id_foreign` (`sexo_id`),
    KEY                      `perpetradores_estatus_perpetrador_id_foreign` (`estatus_perpetrador_id`),
    CONSTRAINT `perpetradores_estatus_perpetrador_id_foreign` FOREIGN KEY (`estatus_perpetrador_id`) REFERENCES `estatus_perpetradores` (`id`),
    CONSTRAINT `perpetradores_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`),
    CONSTRAINT `perpetradores_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `cat_sexos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens`
(
    `id`             bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `tokenable_type` varchar(255) NOT NULL,
    `tokenable_id`   bigint(20) unsigned NOT NULL,
    `name`           varchar(255) NOT NULL,
    `token`          varchar(64)  NOT NULL,
    `abilities`      text DEFAULT NULL,
    `last_used_at`   timestamp NULL DEFAULT NULL,
    `expires_at`     timestamp NULL DEFAULT NULL,
    `created_at`     timestamp NULL DEFAULT NULL,
    `updated_at`     timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    KEY              `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas`
(
    `id`                  bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `sexo_id`             bigint(20) unsigned DEFAULT NULL,
    `genero_id`           bigint(20) unsigned DEFAULT NULL,
    `religion_id`         bigint(20) unsigned DEFAULT NULL,
    `lengua_id`           bigint(20) unsigned DEFAULT NULL,
    `lugar_nacimiento_id` varchar(2)   DEFAULT NULL,
    `nombre`              varchar(255) DEFAULT NULL,
    `apellido_paterno`    varchar(255) DEFAULT NULL,
    `apellido_materno`    varchar(255) DEFAULT NULL,
    `apodo`               varchar(255) DEFAULT NULL,
    `fecha_nacimiento`    date         DEFAULT NULL,
    `curp`                varchar(18)  DEFAULT NULL,
    `observaciones_curp`  text         DEFAULT NULL,
    `rfc`                 varchar(13)  DEFAULT NULL,
    `ocupacion`           varchar(255) DEFAULT NULL,
    `created_at`          timestamp NULL DEFAULT NULL,
    `updated_at`          timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `personas_curp_unique` (`curp`),
    UNIQUE KEY `personas_rfc_unique` (`rfc`),
    KEY                   `personas_sexo_id_foreign` (`sexo_id`),
    KEY                   `personas_genero_id_foreign` (`genero_id`),
    KEY                   `personas_religion_id_foreign` (`religion_id`),
    KEY                   `personas_lengua_id_foreign` (`lengua_id`),
    KEY                   `personas_lugar_nacimiento_id_foreign` (`lugar_nacimiento_id`),
    CONSTRAINT `personas_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `cat_generos` (`id`),
    CONSTRAINT `personas_lengua_id_foreign` FOREIGN KEY (`lengua_id`) REFERENCES `cat_lenguas` (`id`),
    CONSTRAINT `personas_lugar_nacimiento_id_foreign` FOREIGN KEY (`lugar_nacimiento_id`) REFERENCES `cat_estados` (`id`),
    CONSTRAINT `personas_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `cat_religiones` (`id`),
    CONSTRAINT `personas_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `cat_sexos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `prendas_vestir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prendas_vestir`
(
    `id`              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `desaparecido_id` bigint(20) unsigned NOT NULL,
    `pertenencia_id`  bigint(20) unsigned DEFAULT NULL,
    `color_id`        bigint(20) unsigned DEFAULT NULL,
    `marca`           varchar(255) DEFAULT NULL,
    `descripcion`     varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY               `prendas_vestir_desaparecido_id_foreign` (`desaparecido_id`),
    KEY               `prendas_vestir_pertenencia_id_foreign` (`pertenencia_id`),
    KEY               `prendas_vestir_color_id_foreign` (`color_id`),
    CONSTRAINT `prendas_vestir_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `cat_colores` (`id`),
    CONSTRAINT `prendas_vestir_desaparecido_id_foreign` FOREIGN KEY (`desaparecido_id`) REFERENCES `desaparecidos` (`id`),
    CONSTRAINT `prendas_vestir_pertenencia_id_foreign` FOREIGN KEY (`pertenencia_id`) REFERENCES `cat_pertenencias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `pseudonimos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pseudonimos`
(
    `id`               bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`       bigint(20) unsigned NOT NULL,
    `nombre`           varchar(255) DEFAULT NULL,
    `apellido_paterno` varchar(255) DEFAULT NULL,
    `apellido_materno` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                `pseudonimos_persona_id_foreign` (`persona_id`),
    CONSTRAINT `pseudonimos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `razones_curp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `razones_curp`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `redes_sociales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `redes_sociales`
(
    `id`                 bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`         bigint(20) unsigned NOT NULL,
    `tipo_red_social_id` bigint(20) unsigned NOT NULL,
    `usuario`            varchar(255) NOT NULL,
    `observaciones`      varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                  `redes_sociales_persona_id_foreign` (`persona_id`),
    KEY                  `redes_sociales_tipo_red_social_id_foreign` (`tipo_red_social_id`),
    CONSTRAINT `redes_sociales_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `redes_sociales_tipo_red_social_id_foreign` FOREIGN KEY (`tipo_red_social_id`) REFERENCES `cat_tipos_redes_sociales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `region_cuerpo_rnpdno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region_cuerpo_rnpdno`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `regiones_deformaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regiones_deformaciones`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `reportantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportantes`
(
    `id`                             bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`                     bigint(20) unsigned NOT NULL,
    `persona_id`                     bigint(20) unsigned DEFAULT NULL,
    `parentesco_id`                  bigint(20) unsigned DEFAULT NULL,
    `colectivo_id`                   bigint(20) unsigned DEFAULT NULL,
    `denuncia_anonima`               tinyint(1) NOT NULL DEFAULT 0,
    `informacion_consentimiento`     tinyint(1) DEFAULT NULL,
    `informacion_exclusiva_busqueda` tinyint(1) DEFAULT NULL,
    `publicacion_registro_nacional`  tinyint(1) DEFAULT NULL,
    `publicacion_boletin`            tinyint(1) DEFAULT NULL,
    `pertenencia_colectivo`          tinyint(1) DEFAULT NULL,
    `informacion_relevante`          text DEFAULT NULL,
    `participacion_busquedas`        text DEFAULT NULL,
    `descripcion_extorsion`          text DEFAULT NULL,
    `descripcion_donde_proviene`     text DEFAULT NULL,
    `edad_estimada`                  int(11) DEFAULT NULL,
    `created_at`                     timestamp NULL DEFAULT NULL,
    `updated_at`                     timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                              `reportantes_reporte_id_foreign` (`reporte_id`),
    KEY                              `reportantes_persona_id_foreign` (`persona_id`),
    KEY                              `reportantes_parentesco_id_foreign` (`parentesco_id`),
    KEY                              `reportantes_colectivo_id_foreign` (`colectivo_id`),
    CONSTRAINT `reportantes_colectivo_id_foreign` FOREIGN KEY (`colectivo_id`) REFERENCES `cat_colectivos` (`id`),
    CONSTRAINT `reportantes_parentesco_id_foreign` FOREIGN KEY (`parentesco_id`) REFERENCES `cat_parentescos` (`id`),
    CONSTRAINT `reportantes_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `reportantes_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportes`
(
    `id`                            bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `tipo_reporte_id`               bigint(20) unsigned DEFAULT NULL,
    `area_atiende_id`               bigint(20) unsigned DEFAULT NULL,
    `medio_conocimiento_id`         bigint(20) unsigned DEFAULT NULL,
    `zona_estado_id`                bigint(20) unsigned DEFAULT NULL,
    `hipotesis_oficial_id`          bigint(20) unsigned DEFAULT NULL,
    `institucion_origen_id`         bigint(20) unsigned DEFAULT NULL,
    `estado_id`                     varchar(2)         DEFAULT NULL,
    `esta_terminado`                tinyint(1) NOT NULL DEFAULT 0,
    `tipo_desaparicion`             enum('U','M') DEFAULT 'U',
    `fecha_localizacion`            date               DEFAULT NULL,
    `sintesis_localizacion`         text               DEFAULT NULL,
    `declaracion_especial_ausencia` tinyint(1) DEFAULT NULL,
    `accion_urgente`                tinyint(1) DEFAULT NULL,
    `dictamen`                      tinyint(1) DEFAULT NULL,
    `ci_nivel_federal`              tinyint(1) DEFAULT NULL,
    `otro_derecho_humano`           varchar(255)       DEFAULT NULL,
    `fecha_creacion`                timestamp NOT NULL DEFAULT current_timestamp(),
    `fecha_actualizacion`           timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`),
    KEY                             `reportes_tipo_reporte_id_foreign` (`tipo_reporte_id`),
    KEY                             `reportes_area_atiende_id_foreign` (`area_atiende_id`),
    KEY                             `reportes_medio_conocimiento_id_foreign` (`medio_conocimiento_id`),
    KEY                             `reportes_zona_estado_id_foreign` (`zona_estado_id`),
    KEY                             `reportes_hipotesis_oficial_id_foreign` (`hipotesis_oficial_id`),
    KEY                             `reportes_institucion_origen_id_foreign` (`institucion_origen_id`),
    KEY                             `reportes_estado_id_foreign` (`estado_id`),
    CONSTRAINT `reportes_area_atiende_id_foreign` FOREIGN KEY (`area_atiende_id`) REFERENCES `cat_areas` (`id`),
    CONSTRAINT `reportes_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `cat_estados` (`id`),
    CONSTRAINT `reportes_hipotesis_oficial_id_foreign` FOREIGN KEY (`hipotesis_oficial_id`) REFERENCES `cat_tipos_hipotesis` (`id`),
    CONSTRAINT `reportes_institucion_origen_id_foreign` FOREIGN KEY (`institucion_origen_id`) REFERENCES `cat_instituciones` (`id`),
    CONSTRAINT `reportes_medio_conocimiento_id_foreign` FOREIGN KEY (`medio_conocimiento_id`) REFERENCES `cat_medios` (`id`),
    CONSTRAINT `reportes_tipo_reporte_id_foreign` FOREIGN KEY (`tipo_reporte_id`) REFERENCES `cat_tipos_reportes` (`id`),
    CONSTRAINT `reportes_zona_estado_id_foreign` FOREIGN KEY (`zona_estado_id`) REFERENCES `zonas_estados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions`
(
    `permission_id` bigint(20) unsigned NOT NULL,
    `role_id`       bigint(20) unsigned NOT NULL,
    PRIMARY KEY (`permission_id`, `role_id`),
    KEY             `role_has_permissions_role_id_foreign` (`role_id`),
    CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
    CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name`       varchar(255) NOT NULL,
    `guard_name` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salud`
(
    `id`             bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`     bigint(20) unsigned NOT NULL,
    `tipo_sangre_id` bigint(20) unsigned NOT NULL,
    `factor_rhesus`  enum('Positivo','Negativo') DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY              `salud_persona_id_foreign` (`persona_id`),
    KEY              `salud_tipo_sangre_id_foreign` (`tipo_sangre_id`),
    CONSTRAINT `salud_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `salud_tipo_sangre_id_foreign` FOREIGN KEY (`tipo_sangre_id`) REFERENCES `cat_tipos_sangre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `senas_particulares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `senas_particulares`
(
    `id`               bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`       bigint(20) unsigned NOT NULL,
    `region_cuerpo_id` bigint(20) unsigned DEFAULT NULL,
    `vista_id`         bigint(20) unsigned DEFAULT NULL,
    `lado_id`          bigint(20) unsigned DEFAULT NULL,
    `tipo_id`          bigint(20) unsigned DEFAULT NULL,
    `cantidad`         int(11) DEFAULT 1,
    `descripcion`      varchar(255) DEFAULT NULL,
    `foto`             varchar(255) DEFAULT NULL,
    `created_at`       timestamp NULL DEFAULT NULL,
    `updated_at`       timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY                `senas_particulares_persona_id_foreign` (`persona_id`),
    KEY                `senas_particulares_region_cuerpo_id_foreign` (`region_cuerpo_id`),
    KEY                `senas_particulares_vista_id_foreign` (`vista_id`),
    KEY                `senas_particulares_lado_id_foreign` (`lado_id`),
    KEY                `senas_particulares_tipo_id_foreign` (`tipo_id`),
    CONSTRAINT `senas_particulares_lado_id_foreign` FOREIGN KEY (`lado_id`) REFERENCES `cat_lados` (`id`),
    CONSTRAINT `senas_particulares_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
    CONSTRAINT `senas_particulares_region_cuerpo_id_foreign` FOREIGN KEY (`region_cuerpo_id`) REFERENCES `cat_regiones_cuerpo` (`id`),
    CONSTRAINT `senas_particulares_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `cat_tipos` (`id`),
    CONSTRAINT `senas_particulares_vista_id_foreign` FOREIGN KEY (`vista_id`) REFERENCES `cat_vistas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `series`
(
    `id`              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `tipo_reporte_id` bigint(20) unsigned NOT NULL,
    `numero`          bigint(20) NOT NULL,
    `created_at`      timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY               `series_tipo_reporte_id_foreign` (`tipo_reporte_id`),
    CONSTRAINT `series_tipo_reporte_id_foreign` FOREIGN KEY (`tipo_reporte_id`) REFERENCES `cat_tipos_reportes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefonos`
(
    `id`            bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `persona_id`    bigint(20) unsigned NOT NULL,
    `compania_id`   bigint(20) unsigned DEFAULT NULL,
    `numero`        varchar(25) NOT NULL,
    `observaciones` varchar(255) DEFAULT NULL,
    `es_movil`      tinyint(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    KEY             `telefonos_persona_id_foreign` (`persona_id`),
    KEY             `telefonos_compania_id_foreign` (`compania_id`),
    CONSTRAINT `telefonos_compania_id_foreign` FOREIGN KEY (`compania_id`) REFERENCES `companias_telefonicas` (`id`),
    CONSTRAINT `telefonos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `tipos_domicilios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_domicilios`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `tipos_hipotesis_inmediatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_hipotesis_inmediatas`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `abreviatura` varchar(255) NOT NULL,
    `nombre`      varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `user_action_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_action_logs`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `user_id`    bigint(20) unsigned NOT NULL,
    `action`     varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY          `user_action_logs_user_id_foreign` (`user_id`),
    CONSTRAINT `user_action_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users`
(
    `id`                bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `empleado_id`       bigint(20) unsigned NOT NULL,
    `email`             varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password`          varchar(255) NOT NULL,
    `remember_token`    varchar(100) DEFAULT NULL,
    `created_at`        timestamp NULL DEFAULT NULL,
    `updated_at`        timestamp NULL DEFAULT NULL,
    `status`            enum('activo','suspendido','inactivo') NOT NULL DEFAULT 'activo',
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`),
    KEY                 `users_empleado_id_foreign` (`empleado_id`),
    CONSTRAINT `users_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculos`
(
    `id`                   bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `reporte_id`           bigint(20) unsigned NOT NULL,
    `relacion_vehiculo_id` bigint(20) unsigned NOT NULL,
    `tipo_vehiculo_id`     bigint(20) unsigned NOT NULL,
    `uso_vehiculo_id`      bigint(20) unsigned NOT NULL,
    `marca_vehiculo_id`    bigint(20) unsigned DEFAULT NULL,
    `color_id`             bigint(20) unsigned NOT NULL,
    `submarca`             varchar(255) DEFAULT NULL,
    `placa`                varchar(255) DEFAULT NULL,
    `modelo`               varchar(255) DEFAULT NULL,
    `numero_serie`         varchar(255) DEFAULT NULL,
    `numero_motor`         varchar(255) DEFAULT NULL,
    `numero_permiso`       varchar(255) DEFAULT NULL,
    `descripcion`          varchar(255) DEFAULT NULL,
    `localizado`           tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),
    KEY                    `vehiculos_reporte_id_foreign` (`reporte_id`),
    KEY                    `vehiculos_relacion_vehiculo_id_foreign` (`relacion_vehiculo_id`),
    KEY                    `vehiculos_tipo_vehiculo_id_foreign` (`tipo_vehiculo_id`),
    KEY                    `vehiculos_uso_vehiculo_id_foreign` (`uso_vehiculo_id`),
    KEY                    `vehiculos_marca_vehiculo_id_foreign` (`marca_vehiculo_id`),
    KEY                    `vehiculos_color_id_foreign` (`color_id`),
    CONSTRAINT `vehiculos_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `cat_colores` (`id`),
    CONSTRAINT `vehiculos_marca_vehiculo_id_foreign` FOREIGN KEY (`marca_vehiculo_id`) REFERENCES `cat_marcas_vehiculos` (`id`),
    CONSTRAINT `vehiculos_relacion_vehiculo_id_foreign` FOREIGN KEY (`relacion_vehiculo_id`) REFERENCES `cat_relaciones_vehiculos` (`id`),
    CONSTRAINT `vehiculos_reporte_id_foreign` FOREIGN KEY (`reporte_id`) REFERENCES `reportes` (`id`),
    CONSTRAINT `vehiculos_tipo_vehiculo_id_foreign` FOREIGN KEY (`tipo_vehiculo_id`) REFERENCES `cat_tipos_vehiculos` (`id`),
    CONSTRAINT `vehiculos_uso_vehiculo_id_foreign` FOREIGN KEY (`uso_vehiculo_id`) REFERENCES `cat_usos_vehiculos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vestimentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vestimentas`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `vestimenta` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vista_rnpdno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vista_rnpdno`
(
    `id`     bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `zonas_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zonas_estados`
(
    `id`          bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre`      varchar(100) NOT NULL,
    `abreviatura` varchar(10)  NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (2, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (3, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (4, '2024_01_16_003933_create_cat_sexos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (5, '2024_01_16_004033_create_cat_generos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (6, '2024_01_19_212447_create_cat_instituciones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (7, '2024_01_19_213415_create_zonas_estados_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (8, '2024_01_20_133725_create_cat_sitios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (9, '2024_02_03_214342_create_cat_tipos_medios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (10, '2024_02_03_215040_create_cat_medios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (11, '2024_02_04_192710_create_cat_circunstancias_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (12, '2024_02_05_151841_create_cat_tipos_reportes_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (13, '2024_02_05_160738_create_cat_tipos_hipotesis_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (14, '2024_02_07_132840_create_estatus_personas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (15, '2024_02_07_211005_create_parentescos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (16, '2024_02_08_102932_create_cat_estados_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (17, '2024_02_08_231554_create_permission_tables', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (18, '2024_02_14_151052_create_cat_religiones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (19, '2024_02_14_234856_create_cat_pasatiempos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (20, '2024_02_14_235056_create_cat_clubes_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (21, '2024_02_16_011044_create_cat_estados_conyugales_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (22, '2024_02_16_061051_create_cat_estatus_escolaridades_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (23, '2024_02_20_103021_create_cat_municipios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (24, '2024_02_21_161359_create_cat_asentamientos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (25, '2024_02_21_161555_create_direcciones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (26, '2024_02_22_103102_create_cat_areas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (27, '2024_02_22_202949_create_reportes_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (28, '2024_02_23_103521_create_hechos_desapariciones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (29, '2024_02_23_171949_create_hipotesis_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (30, '2024_03_04_151104_create_cat_lenguas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (31, '2024_03_06_010734_create_cat_escolaridades_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (32, '2024_03_09_184614_create_cat_puestos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (33, '2024_03_09_200516_create_cat_oficinas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (34, '2024_03_09_232145_create_personas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (35, '2024_03_10_164440_create_empleados_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (36, '2024_03_12_191941_create_cat_regiones_cuerpo_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (37, '2024_03_12_192631_create_cat_tipos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (38, '2024_03_12_192637_create_cat_lados_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (39, '2024_03_12_192643_create_cat_vistas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (40, '2024_03_12_203214_create_region_cuerpo_rnpdnos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (41, '2024_03_13_061210_create_cat_colectivos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (42, '2024_03_13_142618_create_cat_situaciones_migratorias_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (43, '2024_03_13_152307_create_contextos_sociales_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (44, '2024_03_13_170802_create_cat_colores_cabello_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (45, '2024_03_13_174948_create_cat_colores_ojos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (46, '2024_03_13_175837_create_cat_tamanos_ojos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (47, '2024_03_13_191823_create_senas_particulares_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (48, '2024_03_14_044307_create_lado_rnpdnos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (49, '2024_03_14_044327_create_vista_rnpdnos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (50, '2024_03_14_142004_create_cat_colores_piel_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (51, '2024_03_14_142629_create_tipo_cabellos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (52, '2024_03_14_143232_create_cat_tamanos_labios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (53, '2024_03_14_143924_create_cat_tipos_narices_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (54, '2024_03_14_144456_create_cat_tamanos_orejas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (55, '2024_03_14_145050_create_cat_complexiones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (56, '2024_03_14_145625_create_etnias_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (57, '2024_03_14_151117_create_grupo_etnicos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (58, '2024_03_14_151129_create_vestimentas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (59, '2024_03_14_151144_create_ascendencias_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (60, '2024_03_19_222622_create_reportantes_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (61, '2024_03_20_131640_create_desaparecidos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (62, '2024_03_20_155623_create_domicilios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (63, '2024_04_02_172205_create_cat_tipos_redes_sociales_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (64, '2024_04_02_182116_create_cat_nacionalidades_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (65, '2024_04_02_183225_create_nacionalidad_persona_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (66, '2024_04_02_201839_create_companias_telefonicas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (67, '2024_04_02_201840_create_telefonos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (68, '2024_04_02_211339_create_contactos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (69, '2024_04_16_205603_create_cat_grupos_pertenencias_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (70, '2024_04_16_205610_create_cat_pertenencias_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (71, '2024_04_16_205617_create_cat_colores_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (72, '2024_04_24_165330_create_pseudonimos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (73, '2024_05_09_143638_create_prendas_vestir_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (74, '2024_05_13_031856_create_contextos_familiares_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (75, '2024_05_15_225233_create_documentos_legales_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (76, '2024_05_22_234125_create_cat_marcas_vehiculos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (77, '2024_05_23_101023_create_cat_tipos_vehiculos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (78, '2024_05_23_105146_create_cat_usos_vehiculos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (79, '2024_05_23_105550_create_cat_relaciones_vehiculos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (80, '2024_06_09_233049_create_grupos_vulnerables_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (81, '2024_06_10_010609_create_cat_formas_caras_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (82, '2024_06_10_170701_create_cat_tipos_intervencion_quirurgica_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (83, '2024_06_10_172041_create_cat_tipos_enfermedades_piel_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (84, '2024_06_10_175040_create_cat_calvicies_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (85, '2024_06_11_020821_create_cat_formas_ojos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (86, '2024_06_11_022728_create_cat_tamanos_cabello_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (87, '2024_06_11_023105_create_cat_cejas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (88, '2024_06_11_023945_create_cat_tamanos_boca_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (89, '2024_06_11_025136_create_cat_formas_orejas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (90, '2024_06_11_025601_create_cat_tipos_menton_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (91, '2024_06_11_025935_create_regiones_deformaciones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (92, '2024_06_11_030425_create_intervenciones_quirurgicas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (93, '2024_06_11_031009_create_enfermedades_pieles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (94, '2024_06_13_173958_create_cat_tipos_sangre_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (95, '2024_06_13_175352_create_enfoques_diferenciados_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (96, '2024_06_14_042454_create_autoridades_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (97, '2024_06_14_042900_create_particulares_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (98, '2024_06_14_043340_create_metodos_captura_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (99, '2024_06_14_044245_create_medios_captura_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (100, '2024_06_14_044738_create_estatus_perpetradores_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (101, '2024_06_15_181131_create_cat_tipos_ocupacion_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (102, '2024_06_17_174603_create_cat_ocupaciones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (103, '2024_06_22_191156_create_cat_tipos_condiciones_salud_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (104, '2024_06_23_010736_create_tipos_hipotesis_inmediatas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (105, '2024_06_23_040107_create_condiciones_salud_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (106, '2024_06_23_042338_create_vehiculos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (107, '2024_06_23_045550_create_redes_sociales_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (108, '2024_06_23_053630_create_ocupacion_persona_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (109, '2024_06_27_163555_create_contextos_economicos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (110, '2024_07_08_000522_grupos_vulnerables_personas', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (111, '2024_07_11_011556_create_medias_filiaciones_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (112, '2024_07_11_171652_create_razones_curps_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (113, '2024_07_11_173654_create_tipos_domicilios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (114, '2024_07_14_224659_create_perpetradores_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (115, '2024_07_15_054225_create_control_ogpis_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (116, '2024_08_08_181400_create_expedientes_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (117, '2024_08_09_002034_create_desapariciones_forzadas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (118, '2024_08_14_161640_create_medias_filiaciones_complementarias_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (119, '2024_08_14_183635_create_salud_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (120, '2024_08_14_221103_create_cat_tipo_enfoque_diferenciados_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (121, '2024_08_14_223457_create_familiares_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (122, '2024_08_14_233438_create_amistades_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (123, '2024_08_14_233701_amistad_direccion', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (124, '2024_08_14_235337_club_persona', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (125, '2024_08_14_235638_pasatiempo_persona', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (126, '2024_08_15_000051_create_estudios_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (127, '2024_08_15_001834_create_embarazos_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (128, '2024_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (129, '2024_10_12_160723_create_user_action_logs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (130, '2024_10_12_161025_add_status_to_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (131, '2024_10_21_123438_create_series_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (132, '2024_10_22_105400_create_folios_table', 1);
