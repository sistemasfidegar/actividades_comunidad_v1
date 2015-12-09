/*
Navicat PGSQL Data Transfer

Source Server         : Plantilla
Source Server Version : 90401
Source Host           : localhost:5432
Source Database       : actividades
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90401
File Encoding         : 65001

Date: 2015-12-08 18:30:21
*/


-- ----------------------------
-- Sequence structure for archivo_id_archivo_seq
-- ----------------------------
DROP SEQUENCE "public"."archivo_id_archivo_seq";
CREATE SEQUENCE "public"."archivo_id_archivo_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 44
 CACHE 1;
SELECT setval('"public"."archivo_id_archivo_seq"', 44, true);

-- ----------------------------
-- Sequence structure for bitacora_accesos_id_bitacora_seq
-- ----------------------------
DROP SEQUENCE "public"."bitacora_accesos_id_bitacora_seq";
CREATE SEQUENCE "public"."bitacora_accesos_id_bitacora_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 253
 CACHE 1;
SELECT setval('"public"."bitacora_accesos_id_bitacora_seq"', 253, true);

-- ----------------------------
-- Sequence structure for cat_coordinacion_id_coordinacion_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_coordinacion_id_coordinacion_seq";
CREATE SEQUENCE "public"."cat_coordinacion_id_coordinacion_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 60
 CACHE 1;
SELECT setval('"public"."cat_coordinacion_id_coordinacion_seq"', 60, true);

-- ----------------------------
-- Sequence structure for cat_eje_id_eje_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_eje_id_eje_seq";
CREATE SEQUENCE "public"."cat_eje_id_eje_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 8
 CACHE 1;
SELECT setval('"public"."cat_eje_id_eje_seq"', 8, true);

-- ----------------------------
-- Sequence structure for cat_escuelasadultosm_id_escuela_adulto_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_escuelasadultosm_id_escuela_adulto_seq";
CREATE SEQUENCE "public"."cat_escuelasadultosm_id_escuela_adulto_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 131
 CACHE 1;
SELECT setval('"public"."cat_escuelasadultosm_id_escuela_adulto_seq"', 131, true);

-- ----------------------------
-- Sequence structure for cat_espacio_publico_id_espacio_publico_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_espacio_publico_id_espacio_publico_seq";
CREATE SEQUENCE "public"."cat_espacio_publico_id_espacio_publico_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 222
 CACHE 1;
SELECT setval('"public"."cat_espacio_publico_id_espacio_publico_seq"', 222, true);

-- ----------------------------
-- Sequence structure for cat_institucion_id_institucion_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_institucion_id_institucion_seq";
CREATE SEQUENCE "public"."cat_institucion_id_institucion_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 37
 CACHE 1;

-- ----------------------------
-- Sequence structure for cat_museos_id_museo_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_museos_id_museo_seq";
CREATE SEQUENCE "public"."cat_museos_id_museo_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 56
 CACHE 1;
SELECT setval('"public"."cat_museos_id_museo_seq"', 56, true);

-- ----------------------------
-- Sequence structure for cat_nivel_id_nivel_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_nivel_id_nivel_seq";
CREATE SEQUENCE "public"."cat_nivel_id_nivel_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for cat_perfil_id_perfil_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_perfil_id_perfil_seq";
CREATE SEQUENCE "public"."cat_perfil_id_perfil_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 3
 CACHE 1;
SELECT setval('"public"."cat_perfil_id_perfil_seq"', 3, true);

-- ----------------------------
-- Sequence structure for cat_plantel_id_plantel_seq
-- ----------------------------
DROP SEQUENCE "public"."cat_plantel_id_plantel_seq";
CREATE SEQUENCE "public"."cat_plantel_id_plantel_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 272
 CACHE 1;
SELECT setval('"public"."cat_plantel_id_plantel_seq"', 272, true);

-- ----------------------------
-- Sequence structure for evento_id_evento_seq
-- ----------------------------
DROP SEQUENCE "public"."evento_id_evento_seq";
CREATE SEQUENCE "public"."evento_id_evento_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 22
 CACHE 1;
SELECT setval('"public"."evento_id_evento_seq"', 22, true);

-- ----------------------------
-- Sequence structure for logistica_id_logistica_seq
-- ----------------------------
DROP SEQUENCE "public"."logistica_id_logistica_seq";
CREATE SEQUENCE "public"."logistica_id_logistica_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 36
 CACHE 1;
SELECT setval('"public"."logistica_id_logistica_seq"', 36, true);

-- ----------------------------
-- Sequence structure for resultado_id_resultado_seq
-- ----------------------------
DROP SEQUENCE "public"."resultado_id_resultado_seq";
CREATE SEQUENCE "public"."resultado_id_resultado_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 28
 CACHE 1;
SELECT setval('"public"."resultado_id_resultado_seq"', 28, true);

-- ----------------------------
-- Sequence structure for tipo_act_id_tipo_actividad_seq
-- ----------------------------
DROP SEQUENCE "public"."tipo_act_id_tipo_actividad_seq";
CREATE SEQUENCE "public"."tipo_act_id_tipo_actividad_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for tipo_actividad_id_tipo_actividad_seq
-- ----------------------------
DROP SEQUENCE "public"."tipo_actividad_id_tipo_actividad_seq";
CREATE SEQUENCE "public"."tipo_actividad_id_tipo_actividad_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for usuario_id_usuario_seq
-- ----------------------------
DROP SEQUENCE "public"."usuario_id_usuario_seq";
CREATE SEQUENCE "public"."usuario_id_usuario_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 25
 CACHE 1;
SELECT setval('"public"."usuario_id_usuario_seq"', 25, true);

-- ----------------------------
-- Table structure for archivo
-- ----------------------------
DROP TABLE IF EXISTS "public"."archivo";
CREATE TABLE "public"."archivo" (
"id_archivo" int8 DEFAULT nextval('archivo_id_archivo_seq'::regclass) NOT NULL,
"id_evento" int4,
"id_usuario" int4,
"descripcion" text COLLATE "default",
"ruta_archivo" varchar(100) COLLATE "default",
"activo" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of archivo
-- ----------------------------

-- ----------------------------
-- Table structure for bitacora_accesos
-- ----------------------------
DROP TABLE IF EXISTS "public"."bitacora_accesos";
CREATE TABLE "public"."bitacora_accesos" (
"id_bitacora" int8 DEFAULT nextval('bitacora_accesos_id_bitacora_seq'::regclass) NOT NULL,
"id_usuario" int2 NOT NULL,
"usuario" varchar(50) COLLATE "default" NOT NULL,
"fecha" timestamp(6) DEFAULT now(),
"ip" varchar(15) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of bitacora_accesos
-- ----------------------------
INSERT INTO "public"."bitacora_accesos" VALUES ('131', '2', 'nsanchezm', '2015-10-29 17:41:09.819', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('132', '3', 'director', '2015-10-29 18:50:46.025', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('133', '3', 'director', '2015-10-30 10:01:10.939', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('134', '2', 'nsanchezm', '2015-10-30 10:07:14.942', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('135', '4', 'icony', '2015-10-30 10:27:29.404', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('136', '3', 'director', '2015-10-30 15:21:37.623', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('137', '3', 'director', '2015-11-02 10:28:04.343', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('138', '3', 'director', '2015-11-02 13:04:20.342', '192.168.50.105');
INSERT INTO "public"."bitacora_accesos" VALUES ('139', '3', 'director', '2015-11-02 13:20:17.81', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('140', '3', 'director', '2015-11-03 11:30:57.905', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('141', '3', 'director', '2015-11-04 10:49:39.016', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('142', '4', 'icony', '2015-11-04 11:23:31.648', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('143', '3', 'director', '2015-11-05 10:30:34.175', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('144', '4', 'icony', '2015-11-05 11:23:44.54', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('145', '3', 'director', '2015-11-06 11:09:44.181', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('146', '4', 'icony', '2015-11-06 12:20:19.71', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('147', '3', 'director', '2015-11-09 10:38:48.904', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('148', '3', 'director', '2015-11-09 13:27:37.104', '192.168.50.105');
INSERT INTO "public"."bitacora_accesos" VALUES ('149', '3', 'director', '2015-11-09 13:45:52.142', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('150', '3', 'director', '2015-11-09 18:04:01.627', '192.168.50.105');
INSERT INTO "public"."bitacora_accesos" VALUES ('151', '3', 'director', '2015-11-09 18:45:20.236', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('152', '4', 'icony', '2015-11-10 11:34:09.895', '192.168.30.95');
INSERT INTO "public"."bitacora_accesos" VALUES ('153', '3', 'director', '2015-11-10 12:58:49.882', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('154', '4', 'icony', '2015-11-10 14:20:13.067', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('155', '3', 'director', '2015-11-10 14:38:40.298', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('156', '4', 'icony', '2015-11-10 14:41:38.543', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('157', '4', 'icony', '2015-11-10 15:01:34.534', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('158', '4', 'icony', '2015-11-10 16:24:11.665', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('159', '4', 'icony', '2015-11-10 16:57:52.677', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('160', '2', 'nsanchezm', '2015-11-10 17:31:27.538', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('161', '4', 'icony', '2015-11-11 11:07:53.23', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('162', '3', 'director', '2015-11-11 12:38:06.112', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('163', '3', 'director', '2015-11-11 12:57:28.696', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('164', '3', 'director', '2015-11-12 10:38:29.008', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('165', '4', 'icony', '2015-11-12 18:06:23.603', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('166', '4', 'icony', '2015-11-13 11:18:42.638', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('167', '3', 'director', '2015-11-17 10:54:24.468', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('168', '3', 'director', '2015-11-17 11:21:14.006', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('169', '3', 'director', '2015-11-17 11:52:55.054', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('170', '3', 'director', '2015-11-17 12:25:25.267', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('171', '3', 'director', '2015-11-17 12:59:29.396', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('172', '3', 'director', '2015-11-17 13:30:35.042', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('173', '3', 'director', '2015-11-17 14:00:38.404', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('174', '3', 'director', '2015-11-17 14:40:56.002', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('175', '3', 'director', '2015-11-17 16:23:23.324', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('176', '3', 'director', '2015-11-17 16:53:56.209', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('177', '3', 'director', '2015-11-17 17:28:24.026', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('178', '3', 'director', '2015-11-17 17:58:03.477', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('179', '3', 'director', '2015-11-17 18:41:01.615', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('180', '3', 'director', '2015-11-17 18:46:33.075', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('181', '3', 'director', '2015-11-18 11:53:40.125', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('182', '3', 'director', '2015-11-18 12:23:52.037', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('183', '4', 'icony', '2015-11-18 12:34:34.386', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('184', '4', 'icony', '2015-11-18 13:25:33.821', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('185', '4', 'icony', '2015-11-18 13:39:38.311', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('186', '4', 'icony', '2015-11-18 17:43:48.353', '192.168.50.105');
INSERT INTO "public"."bitacora_accesos" VALUES ('187', '3', 'director', '2015-11-18 17:50:43.205', '192.168.50.105');
INSERT INTO "public"."bitacora_accesos" VALUES ('188', '4', 'icony', '2015-11-18 18:46:28.06', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('189', '3', 'director', '2015-11-18 18:54:59.528', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('190', '3', 'director', '2015-11-19 10:41:29.857', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('191', '3', 'director', '2015-11-19 11:21:30.321', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('192', '3', 'director', '2015-11-19 11:59:42.659', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('193', '4', 'icony', '2015-11-19 12:30:48.65', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('194', '3', 'director', '2015-11-19 12:57:31.784', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('195', '4', 'icony', '2015-11-19 12:59:54.099', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('196', '3', 'director', '2015-11-19 13:30:57.38', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('197', '3', 'director', '2015-11-19 14:01:37.811', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('198', '3', 'director', '2015-11-19 14:45:24.931', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('199', '3', 'director', '2015-11-19 16:04:22.729', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('200', '3', 'director', '2015-11-19 17:46:20.64', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('201', '3', 'director', '2015-11-19 18:16:18.38', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('202', '3', 'director', '2015-11-19 18:49:08.011', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('203', '3', 'director', '2015-11-20 13:03:36.988', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('204', '3', 'director', '2015-11-20 13:52:13.784', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('205', '3', 'director', '2015-11-20 14:29:43.558', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('206', '3', 'director', '2015-11-20 15:00:40.29', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('207', '3', 'director', '2015-11-20 16:34:07.278', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('208', '3', 'director', '2015-11-20 17:34:58.684', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('209', '3', 'director', '2015-11-20 18:09:28.292', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('210', '3', 'director', '2015-11-20 18:43:07.062', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('211', '3', 'director', '2015-11-23 10:52:55.57', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('212', '3', 'director', '2015-11-23 11:30:53.511', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('213', '3', 'director', '2015-11-23 12:01:14.982', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('214', '3', 'director', '2015-11-23 12:36:22.621', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('215', '3', 'director', '2015-11-23 13:07:39.96', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('216', '3', 'director', '2015-11-23 13:38:03.597', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('217', '3', 'director', '2015-11-23 14:08:38.94', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('218', '3', 'director', '2015-11-23 14:40:23.859', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('219', '3', 'director', '2015-11-23 18:05:01.884', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('220', '3', 'director', '2015-11-23 18:41:03.618', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('221', '3', 'director', '2015-11-24 10:14:36.71', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('222', '3', 'director', '2015-11-24 10:52:42.896', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('223', '3', 'director', '2015-11-24 11:25:02.994', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('224', '3', 'director', '2015-11-24 12:36:46.991', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('225', '3', 'director', '2015-11-24 13:18:09.949', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('226', '3', 'director', '2015-11-24 13:52:48.831', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('227', '3', 'director', '2015-11-24 14:59:20.688', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('228', '3', 'director', '2015-11-24 16:24:50.406', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('229', '3', 'director', '2015-11-24 16:57:07.902', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('230', '3', 'director', '2015-11-24 17:28:15.698', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('231', '3', 'director', '2015-11-24 18:07:05.262', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('232', '3', 'director', '2015-11-24 18:37:39.305', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('233', '3', 'director', '2015-11-25 10:35:16.813', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('234', '3', 'director', '2015-11-25 11:42:25.648', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('235', '3', 'director', '2015-11-25 12:21:54.359', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('236', '3', 'director', '2015-11-25 12:54:56.569', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('237', '1', 'admin', '2015-11-25 13:09:47.897', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('238', '1', 'admin', '2015-11-25 13:43:16.763', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('239', '1', 'admin', '2015-11-25 14:20:55.363', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('240', '2', 'nsanchezm', '2015-12-07 13:34:34.775', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('241', '4', 'icony', '2015-12-08 12:04:57.811', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('242', '2', 'nsanchezm', '2015-12-08 12:07:12.63', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('243', '3', 'director', '2015-12-08 12:10:30.119', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('244', '3', 'director', '2015-12-08 13:09:54.996', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('245', '3', 'director', '2015-12-08 13:43:44.253', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('246', '3', 'director', '2015-12-08 14:15:58.956', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('247', '3', 'director', '2015-12-08 16:57:06.535', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('248', '1', 'admin', '2015-12-08 17:06:46.748', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('249', '3', 'director', '2015-12-08 17:09:08.389', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('250', '3', 'director', '2015-12-08 17:40:16.422', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('251', '3', 'director', '2015-12-08 18:10:13.25', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('252', '1', 'admin', '2015-12-08 18:27:20.444', '::1');
INSERT INTO "public"."bitacora_accesos" VALUES ('253', '25', 'bju.dzn', '2015-12-08 18:29:37.539', '::1');

-- ----------------------------
-- Table structure for cat_coordinacion
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_coordinacion";
CREATE TABLE "public"."cat_coordinacion" (
"id_coordinacion" numeric(32) DEFAULT nextval('cat_coordinacion_id_coordinacion_seq'::regclass) NOT NULL,
"coordinacion" varchar(200) COLLATE "default",
"activo" bool DEFAULT true,
"siglas" varchar(200) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_coordinacion
-- ----------------------------
INSERT INTO "public"."cat_coordinacion" VALUES ('2', 'Agencia Espacial Mexicana ', 't', 'AEM ');
INSERT INTO "public"."cat_coordinacion" VALUES ('3', 'Consejería Jurídica y De Servicios Legales', 't', 'CEJUR');
INSERT INTO "public"."cat_coordinacion" VALUES ('4', 'Consejo Nacional Para La Cultura y Las Artes', 't', 'CONACULTA ');
INSERT INTO "public"."cat_coordinacion" VALUES ('5', 'Contraloría General Del Distrito Federal', 't', 'CGDF');
INSERT INTO "public"."cat_coordinacion" VALUES ('6', 'Delegación Álvaro Obregón', 't', 'DELEG_AO');
INSERT INTO "public"."cat_coordinacion" VALUES ('7', 'Delegación Azcapotzalco', 't', 'DELEG_AZC');
INSERT INTO "public"."cat_coordinacion" VALUES ('8', 'Delegación Benito Juárez', 't', 'DELEG_BJ');
INSERT INTO "public"."cat_coordinacion" VALUES ('9', 'Delegación Coyoacán', 't', 'DELEG_COY');
INSERT INTO "public"."cat_coordinacion" VALUES ('10', 'Delegación Cuajimalpa', 't', 'DELEG_CUAJ');
INSERT INTO "public"."cat_coordinacion" VALUES ('11', 'Delegación Cuauhtémoc', 't', 'DELEG_CUAH');
INSERT INTO "public"."cat_coordinacion" VALUES ('12', 'Delegación Gustavo A. Madero', 't', 'DELEG_GAM');
INSERT INTO "public"."cat_coordinacion" VALUES ('13', 'Delegación Iztacalco', 't', 'DELEG_IZTC');
INSERT INTO "public"."cat_coordinacion" VALUES ('14', 'Delegación Iztapalapa', 't', 'DELEG_IZTP');
INSERT INTO "public"."cat_coordinacion" VALUES ('15', 'Delegación Magdalena Contreras', 't', 'DELEG_MC');
INSERT INTO "public"."cat_coordinacion" VALUES ('16', 'Delegación Miguel Hidalgo', 't', 'DELEG_MH');
INSERT INTO "public"."cat_coordinacion" VALUES ('17', 'Delegación Milpa Alta', 't', 'DELEG_MA');
INSERT INTO "public"."cat_coordinacion" VALUES ('18', 'Delegación Tláhuac', 't', 'DELEG_TLAH');
INSERT INTO "public"."cat_coordinacion" VALUES ('19', 'Delegación Tlalpan', 't', 'DELEG_TLAL');
INSERT INTO "public"."cat_coordinacion" VALUES ('20', 'Delegación Venustiano Carranza', 't', 'DELEG_VC');
INSERT INTO "public"."cat_coordinacion" VALUES ('21', 'Delegación Xochimilco', 't', 'DELEG_XOCH');
INSERT INTO "public"."cat_coordinacion" VALUES ('22', 'Embajada De China  En México ', 't', '');
INSERT INTO "public"."cat_coordinacion" VALUES ('23', 'Embajada De Cuba En México ', 't', '');
INSERT INTO "public"."cat_coordinacion" VALUES ('24', 'Embajada De España  En México ', 't', '');
INSERT INTO "public"."cat_coordinacion" VALUES ('25', 'Fideicomiso Educación Garantizada', 't', 'FIDEGAR');
INSERT INTO "public"."cat_coordinacion" VALUES ('26', 'Fondo De Cultura Económica ', 't', 'FCE');
INSERT INTO "public"."cat_coordinacion" VALUES ('27', 'Instituto De Acceso A La Información Pública y Protección De Datos Personales Del Distrito Federal', 't', 'INFODF');
INSERT INTO "public"."cat_coordinacion" VALUES ('28', 'Instituto De Atención Al Adulto Mayor ', 't', 'IAAM');
INSERT INTO "public"."cat_coordinacion" VALUES ('29', 'Instituto De Capacitación Para El Empleo ', 't', 'ICAT ');
INSERT INTO "public"."cat_coordinacion" VALUES ('30', 'Instituto De La Juventud Del DF', 't', 'INJUVE DF');
INSERT INTO "public"."cat_coordinacion" VALUES ('31', 'Instituto De La Vivienda Del DF', 't', 'INVI');
INSERT INTO "public"."cat_coordinacion" VALUES ('32', 'Instituto De Las Mujeres Del DF', 't', 'INMUJERES');
INSERT INTO "public"."cat_coordinacion" VALUES ('33', 'Instituto Del Deporte Del DF', 't', 'INDEPORTE');
INSERT INTO "public"."cat_coordinacion" VALUES ('34', 'Instituto Electoral Del Distrito Federal ', 't', 'IEDF');
INSERT INTO "public"."cat_coordinacion" VALUES ('35', 'Instituto Para La Atención y Prevención De Las Adicciones En La Ciudad De México', 't', 'IAPA');
INSERT INTO "public"."cat_coordinacion" VALUES ('36', 'MEXFAM', 't', 'MEXFAM');
INSERT INTO "public"."cat_coordinacion" VALUES ('37', 'Oficialía Mayor', 't', 'OM');
INSERT INTO "public"."cat_coordinacion" VALUES ('38', 'Procuraduría Ambiental y Del Ordenamiento Territorial Del DF', 't', 'PAOT');
INSERT INTO "public"."cat_coordinacion" VALUES ('39', 'Procuraduría General De Justicia', 't', 'PGJDF');
INSERT INTO "public"."cat_coordinacion" VALUES ('40', 'Procuraduría Social Del Distrito Federal', 't', 'PROSOC');
INSERT INTO "public"."cat_coordinacion" VALUES ('41', 'Red De Transporte De Pasajeros Del DF', 't', 'RTP');
INSERT INTO "public"."cat_coordinacion" VALUES ('42', 'Secretaría De Cultura', 't', 'SECUL');
INSERT INTO "public"."cat_coordinacion" VALUES ('43', 'Secretaría De Desarrollo Económico', 't', 'SEDECO');
INSERT INTO "public"."cat_coordinacion" VALUES ('44', 'Secretaría De Desarrollo Rural y Equidad Para Las Comunidades', 't', 'SEDEREC');
INSERT INTO "public"."cat_coordinacion" VALUES ('45', 'Secretaría De Desarrollo Social', 't', 'SEDESO');
INSERT INTO "public"."cat_coordinacion" VALUES ('46', 'Secretaría De Desarrollo Urbano y De Vivienda', 't', 'SEDUVI');
INSERT INTO "public"."cat_coordinacion" VALUES ('47', 'Secretaría De Educación', 't', 'SEDU');
INSERT INTO "public"."cat_coordinacion" VALUES ('48', 'Secretaría De Educación Publica ', 't', 'SEP ');
INSERT INTO "public"."cat_coordinacion" VALUES ('49', 'Secretaría De Finanzas', 't', 'SEFIN');
INSERT INTO "public"."cat_coordinacion" VALUES ('50', 'Secretaría De Gobierno', 't', 'SEGOB');
INSERT INTO "public"."cat_coordinacion" VALUES ('51', 'Secretaría De Medio Ambiente', 't', 'SEDEMA');
INSERT INTO "public"."cat_coordinacion" VALUES ('52', 'Secretaría De Obras y Servicios', 't', 'SOBSE');
INSERT INTO "public"."cat_coordinacion" VALUES ('53', 'Secretaría De Protección Civil', 't', 'PROTECCIÓN CIVIL');
INSERT INTO "public"."cat_coordinacion" VALUES ('54', 'Secretaría De Salud', 't', 'SEDESA');
INSERT INTO "public"."cat_coordinacion" VALUES ('55', 'Secretaría De Seguridad Pública', 't', 'SSP DF');
INSERT INTO "public"."cat_coordinacion" VALUES ('56', 'Secretaría De Transporte y Vialidad', 't', 'SETRAVI');
INSERT INTO "public"."cat_coordinacion" VALUES ('57', 'Secretaría De Turismo', 't', 'SECTUR');
INSERT INTO "public"."cat_coordinacion" VALUES ('58', 'Secretaría Del Trabajo y Fomento Al Empleo', 't', 'STyFE');
INSERT INTO "public"."cat_coordinacion" VALUES ('59', 'Sistema De Aguas De La Ciudad De México', 't', 'SACM');
INSERT INTO "public"."cat_coordinacion" VALUES ('60', 'Sistema De Transporte Colectivo Metro', 't', 'STC METRO');
INSERT INTO "public"."cat_coordinacion" VALUES ('61', 'Evento Prepa Sí', 't', null);

-- ----------------------------
-- Table structure for cat_delegacion
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_delegacion";
CREATE TABLE "public"."cat_delegacion" (
"id_delegacion" numeric(10) NOT NULL,
"delegacion" varchar(150) COLLATE "default",
"siglas" varchar(10) COLLATE "default",
"id_zona" numeric(10),
"activo" bool,
"orden" int2
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_delegacion
-- ----------------------------
INSERT INTO "public"."cat_delegacion" VALUES ('2', 'Azcapotzalco', 'AZC', '1', 't', '2');
INSERT INTO "public"."cat_delegacion" VALUES ('3', 'Coyoacán', 'COY', '1', 't', '4');
INSERT INTO "public"."cat_delegacion" VALUES ('4', 'Cuajimalpa de Morelos', 'CUJ', '2', 't', '5');
INSERT INTO "public"."cat_delegacion" VALUES ('5', 'Gustavo A. Madero', 'GAM', '1', 't', '7');
INSERT INTO "public"."cat_delegacion" VALUES ('6', 'Iztacalco', 'IZT', '1', 't', '8');
INSERT INTO "public"."cat_delegacion" VALUES ('7', 'Iztapalapa', 'IZP', '2', 't', '9');
INSERT INTO "public"."cat_delegacion" VALUES ('8', 'La Magdalena Contreras', 'MAC', '2', 't', '10');
INSERT INTO "public"."cat_delegacion" VALUES ('9', 'Milpa Alta', 'MIL', '2', 't', '12');
INSERT INTO "public"."cat_delegacion" VALUES ('10', 'Álvaro Obregón', 'AOB', '2', 't', '1');
INSERT INTO "public"."cat_delegacion" VALUES ('11', 'Tlahuac', 'TLH', '2', 't', '13');
INSERT INTO "public"."cat_delegacion" VALUES ('12', 'Tlalpan', 'TLP', '2', 't', '14');
INSERT INTO "public"."cat_delegacion" VALUES ('13', 'Xochimilco', 'XOC', '2', 't', '16');
INSERT INTO "public"."cat_delegacion" VALUES ('14', 'Benito Juárez', 'BJU', '1', 't', '3');
INSERT INTO "public"."cat_delegacion" VALUES ('15', 'Cuauhtémoc', 'CUH', '1', 't', '6');
INSERT INTO "public"."cat_delegacion" VALUES ('16', 'Miguel Hidalgo', 'MHI', '1', 't', '11');
INSERT INTO "public"."cat_delegacion" VALUES ('17', 'Venustiano Carranza', 'VCA', '1', 't', '15');
INSERT INTO "public"."cat_delegacion" VALUES ('18', 'Universitarios', 'UNI', '0', 't', '17');

-- ----------------------------
-- Table structure for cat_eje
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_eje";
CREATE TABLE "public"."cat_eje" (
"id_eje" numeric(32) DEFAULT nextval('cat_eje_id_eje_seq'::regclass) NOT NULL,
"eje_tematico" varchar(200) COLLATE "default",
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_eje
-- ----------------------------
INSERT INTO "public"."cat_eje" VALUES ('2', 'Arte y cultura', 't');
INSERT INTO "public"."cat_eje" VALUES ('3', 'Ciencia y tecnología', 't');
INSERT INTO "public"."cat_eje" VALUES ('4', 'Deporte y recreación', 't');
INSERT INTO "public"."cat_eje" VALUES ('5', 'Economía solidaria', 't');
INSERT INTO "public"."cat_eje" VALUES ('6', 'Medio ambiente', 't');
INSERT INTO "public"."cat_eje" VALUES ('7', 'Participación juvenil', 't');
INSERT INTO "public"."cat_eje" VALUES ('8', 'Salud', 't');

-- ----------------------------
-- Table structure for cat_escuelasadultosm
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_escuelasadultosm";
CREATE TABLE "public"."cat_escuelasadultosm" (
"id_escuela_adulto" int4 DEFAULT nextval('cat_escuelasadultosm_id_escuela_adulto_seq'::regclass) NOT NULL,
"escuela" varchar(200) COLLATE "default",
"direccion" text COLLATE "default",
"id_delegacion" numeric(10),
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_escuelasadultosm
-- ----------------------------
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('1', 'La Canita Feliz', 'Av. Observatorio 197, Local C. Col. Cove, Entrada por Sur 126 A', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('2', 'Soñar no Cuesta Nada', 'Av. Mexicanos S/N Col. María G. de García Ruiz', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('3', 'Renacimiento', 'Barranca Del Tecolote S N', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('4', 'Tlamatqui Coltin', 'Calle 22  S/N Esq. Calle 17 Col. Olivar Del Conde 1a Sección', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('5', 'Ollin', 'Prolongación-Calle 20y Av. Santa Lucia Col. Olivar Del Conde 1a Sección', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('6', 'Batallón de Experiencias', 'Av. Sta. Lucía S/N Col. Olivar del Conde UH Batallón de San Patricio ', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('7', 'Vida e Ilusión', 'Calle Azoyapan 5B, Pueblo Santa Rosa Xochiac, CP 01830', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('8', 'Amigos de la Vida, A.M. Plateros', 'Centro Comunitario Plateros, UH Plateros', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('9', 'Colibrí', 'Calz. Desierto de los Leones S/n, Col. Tetelpan', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('10', 'Rayitos al Sol', 'Plaza Hidalgo s/n, Pueblo San Bartolo Ameyalco', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('11', 'Nuestra Señora de Guadalupe', 'Iglesia de Nuestra Señora de Guadalupe, Tizapan', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('12', 'Adultos Plateados de Tlacopac', 'Miguel Hidalgo 35, Col. Tlacopac', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('13', 'La Alegría de Vivir ', 'Edif. F 16 Explanada U.H. Plateros', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('14', 'Flor de Primavera', 'Calle Nogal No. 5, Col. Lomas de la Era, CP 01860', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('15', 'La Hormiga', 'Aureliano Rivera No. 18, Tizapan', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('16', 'Flor de Loto', 'Iglesia de Corpus Chisty', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('17', 'La Cuevita', 'Calle 13 No. 1, Col. Ampliación las Águilas', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('18', 'Juventud Divina La Angostura', 'Av. De los Tanques 99, Col. Angostura', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('19', 'El Nuevo Mundo', 'Calle 1 No. S/N, Col. Herón Proal', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('20', 'Tlatuani', 'Calle Veracruz No. 61, Col. Olivar de los Padres, CP 01780', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('21', 'Más Vida', 'Iglesia de Corpus Cristi Calle San Juan S/N', '10', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('22', '"Los Años Maravillosos"', 'Salón de Usos Múltiples U.H. Manuel Rivera Anaya, Av. Cultura Griega S/N U.H. Xochinahuac', '2', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('23', '"Eterna Juventud" CTM Rosario', 'Parque Campo Bello, Av. Cananea S/N U.H. El Rosario CTM ', '2', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('24', '"Cenyeliztli"', 'Calle Rafael Alducin S/N UH Miguel Hidalgo', '2', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('25', '"Tercera Juventud"', 'Calle Rosas Moreno N° 23 Col. Santiago Ahuizotla', '2', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('26', '"Renacimiento de la Eterna Juventud"', 'Calle Caimito S/N entre Toronjil y Muitle Col. Victoria de las Democracias Modulo de Atención Ciudadana', '2', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('27', '"Una Nueva Vida"', 'Cda. De Almacenes 36 salón de usos múltiples UH Pantaco', '2', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('28', 'Libros Blancos ', 'Parque Esperanza  Teatro al Aire Libre en la calle de Pennsylvania s/n entre la calle de Giorgia y Alabama', '14', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('29', 'Vida en Plenitud', 'Biblioteca Art D´Enuve Goya 54,Insurgentes Mixcoac', '14', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('30', 'Juventud en Pie ', 'Local Comercial de Adulta Mayor Saratoga 417 Portales', '14', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('31', 'Renacer', 'Parque san Lorenzo s/n Tlacoquemecatl Del Valle', '14', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('32', 'Los Dinámicos de Narvarte ', 'Sala de Juntas Unidad Habitacional Narvarte ', '14', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('33', 'Los Niños de la Tercera Edad ', 'Parque de San Simón Pascual Ortiz Rubio entre Centenario y Juan Escutia ', '14', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('34', 'Experiencia y Sabiduría', 'Biblioteca IBBY Goya 51', '14', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('35', 'Los Ángeles de los Reyes', 'Biblioteca León Felipe. Plazuela de los Reyes s/n, Pueblo de los Reyes. ', '3', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('36', 'Los Tepozanes de Coyoacán', 'Mixtecas esquina con Tepocatzin', '3', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('37', 'Los Pinitos', 'Av. Universidad 1900 Altillo Universidad', '3', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('38', 'Leones Plateados', 'Salón San Marcos. Av. Juárez s/n Col. Cuajimalpa.', '4', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('39', 'Corazón de Anciano', 'Av. Montes de las Cruces núm.580, Col. Las Maromas.', '4', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('40', 'Sabios del Corazón', 'Centro de Salud TI.  Memetla Constituyente Antonio Gutiérrez s/n Colonia Memetla.', '4', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('41', 'La Rueda de la Vida', 'Mina s/n Col. San Mateo Tlaltenango Deleg. Cuajimalpa', '4', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('42', 'Los Chavos Plateados del Centro', 'Clínica de Especialidades N. 2.
República de Guatemala No. 78   Col. Centro, Del. Cuauhtémoc. C.P. 06020', '15', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('43', 'Historias de Vida', 'Jesús Carranza No. 33Col. Morelos entre Libertad y Estanquillo', '15', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('44', 'Encuentro', 'Chiapas #105 esquina Yucatán Col. Roma Nte. Ote.', '15', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('45', 'Gotitas de Amor', 'Av. San Antonio Abad # 350 Col. Asturias', '15', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('46', 'Amor Y Amistad', 'Rosas Moreno Esqu. Francisco Díaz Covarrubias. (Casa de Cultura)', '15', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('47', 'Nueva Vida', 'Fernando Ramírez # 75 entre Isabel la Católica y Simón Bolívar Col. Obrera ', '15', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('48', 'Canitas Felices', 'Casa de Cultura IV República Comonfort 46 esq. Jaime Nuno Col. Morelos, Cuauhtémoc', '15', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('49', 'Años felices', 'Av. León de los Aldama s/n Col. San Felipe de Jesús', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('50', 'Centro de la Sabiduría ', 'Camino de la Enseñanza S/Esquina Camino del Triunfo, Col. Campestre Aragón ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('51', 'Ángel de la Vida ', 'Calle 1513 S/N Esquina 414 UH San Juan de Aragón/ 5ta Sección ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('52', 'Los Años Maravillosos ', '5ta Cerrada Av. 503 s/n UH San Juan de Aragón 1 Sección .', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('53', 'El Árbol de la  Vida ', 'Calle Norte 94 Esq. Av. Victoria S/N Col Gertrudis Sánchez ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('54', 'Años Alegres', 'Francisco de Paula Zendeja # 21, Col Constitución de la República ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('55', 'Amor por Siempre ', 'Oriente 95/ Esquina Norte 60 Colonia Tablas de San Agustín ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('56', 'La Alegría de Vivir ', 'Av. 603 40 UH San Juan de Aragón 3 Sección ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('57', 'Amor, Experiencia y Sabiduría', 'Av. Norte 1/ Entre del parque y Oriente 1/ Colonia :Cuchilla del Tesoro  ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('58', 'Raíces del Saber ', 'Av. 604/ Entre las calle 635 y 637  4 y 5 Sección', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('59', 'La Comuna', 'Privada Emiliano Zapata S/N Colonia Guadalupe Victoria', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('60', 'Carmen Serdán', 'Avenida Estado de México S/N Colonia Loma la Palma', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('61', 'CAIS CUAUTEPEC', 'Calle Cometa S/N Colonia Tlacaelel ', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('62', 'Nuevo Amanecer', 'Poniente 112 Iglesia de Magdalena de las salinas', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('63', 'Zacatenco', 'Acueducto Esq. Cartagena Colonia San Pedro Zacatenco Iglesia de San Pedro Apostal', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('64', 'Nueva Ilusión', 'Av. Fernando Amilpa s/n Col. CTM El risco Atzacoalco', '5', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('65', 'Alegría de Vivir', 'Casa de Cultura Manriano Matamoros: Playa Erizo S/N Colonia Reforma Iztaccihuatl, entre Playa Caleta Y playa Azul.', '6', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('66', 'Laura Esquivel', 'Casa de Cultura 7 Barrios, Calzada la Viga, Esquina Santiago Colonia Barrio San Miguel', '6', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('67', 'Grupo Pantitlán', 'Calle 1 S/n, Colonia Pantitlán.', '6', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('68', 'La Mejor Edad', 'Avenida Alfonso del Toro 645, esquina Sur 111, colonia Sector Popular. (Iglesia de la Preciosa Sangre de Cristo)', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('69', 'Miércoles, volver a vivir', 'C. Colorín esq. Oro s/n, colonia 2da Ampliación  Santiago Acahualtepec', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('70', 'Paraje Zacatepec', 'C. Ricardo Flores Magón N.2, colonia Paraje Zacatepec', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('71', 'Divina Ilusión', 'C. Cirilo Arenas Mz. 162 Lt. 10, colonia Ampliación Santa Martha Acatitla', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('72', 'Nuevo Amanecer', 'Calle 5 Mz. 21, colonia Renovación', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('73', 'Árbol de la Vida', 'Supermanzana Mz. 25, U.H. Ejército Constitucionalista', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('74', 'Huehueteotl', 'Calle 39 esquina Samuel Gompers s/n, U.H. Santa Cruz Meyehualco.', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('75', 'Alegría de Vivir', 'Aula para los Adultos Mayores del Centro de Salud Ermita Zaragoza. Andador Sánchez Arreola s/n, U.H. Ermita Zaragoza', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('76', 'Chiualtlakatl', 'Felipe Ángeles s/n, colonia Apatlaco', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('77', 'Amacuzac', 'Amacuzac s/n, entre Albert y Municipio Libre, colonia El Retoño', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('78', 'Grandes Emprendedores', '"Centro Comunitario Monzón" calle Malagón 33 Esq. con Monson, Col. Cerro de la estrella', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('79', 'Nuevos Amigos', '"Centro Social Cedros" Av. José López Portillo 3 Col. Consejo Agrarista Mexicano', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('80', 'Un Nuevo Día Con Ilusiones', '"Centro Social Lomas Estrella" Macedonia 75, Col.  Lomas estrella', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('81', 'Nueva Juventud', 'Centro Cultural Casa las Bombas Prolongación Torres Quintero, s/n Esq. Calle Purísima, Barrio San Miguel', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('82', 'Vivir y Convivir Con El Alma Llena De Alegría', 'Centro Cívico, Comedor Popular, Progreso s/n esquina Cedro, Col. Santa María Tomatlan', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('83', 'Un Nuevo Amanecer Con Nuevas Oportunidades', 'Centro Social Col. La Purísima esquina Canal Nacional, Col Santa María Tomatlan.', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('84', 'Nuevo Amanecer Luz Del Día', 'Centro de Salud "Ejidos los Reyes" Tetlepalquetzalzin s/n entre Cuauhtémoc y Ilhuicamina, Col Ampliación los Reyes.', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('85', 'Casa de la Alegría', 'Cda. Laureles SN Col. San Juan Xalpa', '7', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('86', 'Tercera Edad en Movimiento', 'Cda. San Jerónimo s/n Esquina Hidalgo', '8', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('87', 'Para Volver Empezar', 'Calle Guadalupe 15 esquina Huayatla. Colonia Huayatla', '8', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('88', 'Un Nuevo Amanecer', 'Roble 12, Colonia Cuauhtémoc', '8', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('89', 'Escuela Las Flores', 'Emilio Carranza 99. Colonia La Magdalena', '8', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('90', 'La Tercera Edad en Plenitud', 'Avenida Perimetral s/n Unidad Habitacional Independencia ', '8', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('91', '"Los Años Dorados"', 'Tonantzin número 33, Col. Tlaxpana', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('92', '"Grupo de la Experiencia"', 'Lago Xochimilco s/n Col. Anáhuac. Casa "Cholita"', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('93', '"Senda de Vida"', 'Calzada Legaría 373, Col. México Nuevo', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('94', 'Faro Legaría "Triunfo y Experiencia"', 'Av. Río San Joaquín esq. Av. Legaría. Col. Francisco I madero', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('95', 'Faro "Argentina"', 'Lago Caneguin esq. Privada Dr. Miguel Silva, Col. Argentina Antigua', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('96', 'Faro "Morelos"', 'Lago Trasimeno esq. Lago Erne, Col. Pensil', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('97', 'Faro "Bicentenario"', 'Av. Parque Lira 94, Col. Observatorio', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('98', 'Faro "Popotla"', 'Av. México Tacuba s/n Parque Cañitas, Col. Popotla', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('99', 'Faro "Salesiano"', 'Colegio Salesiano s/n y Lago Xochimilco, Col. Anáhuac', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('100', 'Faro "Ecológico"', 'Rodolfo Gaona esq. 2do Retorno de Ing. Militares, Col. Lomas de Sotelo', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('101', 'Faro "Escandón"', 'Parque Morelos s/n entre Comercio y Agricultura, Col. Escandón', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('102', 'Faro "Carmen Serdán"', 'Calle Sur 128 Número 53, Col. América', '16', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('103', 'I Yoca "Por Mi Mismo"', 'Casa de la Cultura, Avenida Gastón Melo s/n, Pueblo San Antonio Tecomitl.', '9', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('104', 'Yoliztemachtiloyan                         " Escuela de Vida"', 'Casa de la Cultura "La Quinta", Calle Fabián Flores s/n, Pueblo San Pablo Oztotepec.', '9', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('105', 'Temaxtiloya Citlalli                         " Escuela Estrella"', 'Coordinación  San Juan Tepenahuac, Calle Guadalupe Victoria s/n, Pueblo San Juan Tepenahuac.', '9', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('106', 'Nuevo Amanecer', 'Comisaria Ejidal, Calle Balderas s/n, Pueblo San Francisco Tecoxpa.', '9', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('107', 'Convivir para Vivir', 'Francisco Jiménez 41, col. La Conchita, Zapotitlán', '11', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('108', 'Nueva Tenochtitlán', 'Juan de Dios Peza No. 61, Unidad Habitacional Nueva Tenochtitlán, Pueblo de Santiago Zapotitlán', '11', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('109', 'Amistad', 'Casa de Cultura de Mixquic, Av. Independencia S/N, Barrio San Agustín. Mixquic ', '11', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('110', 'San Francisco', 'DIF Quetzalcóatl, Carlos A Vidal S/N, Pueblo San Francisco Tlaltenco', '11', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('111', 'Luz y Alegría para Adultos Mayores', 'Salón Ejidal de Santa Catarina, Av. Rafael Oropeza S/N esquina Manuel Muñoz, Pueblo Santa Catarina Yecahuizotl', '11', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('112', 'Cuitlahuac', 'Edificio Cuauhtémoc Cárdenas, Calle Nicolás Bravo S/N, Barrio San Mateo, Tláhuac', '11', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('113', 'Los Reyes de Chichicaspatl', 'Rancho Viejo s/n esquina Chansenote Centro Comunitario Chichicaspa. Col Chichicaspa', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('114', 'Metzonalli "Luz de Luna"', 'Hacienda la Huerta s/n Col Rinconada Coapa', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('115', 'Nueva Primavera', 'María Auxiliadora s/n Esq. Escuela Col. Ejidos de Huipulco (Pendiente  cambio  de  domicilio  de esta  escuela  ya  que  el  grupo  está  aumentando)', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('116', 'Emprendedores con Armonía y Vida', 'Calzada del hueso  No. 7680 Col. Granjas Coapa', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('117', 'Tercera edad divino tesoro', 'Deportivo CEFORMA calle Hidalgo 195 UH Fuentes Brotantes Col. Miguel Hidalgo', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('118', 'La alegría de vivir', 'Centro comunitario en calle Nahoas 8 Col. Tlalcoligia', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('119', 'Nuevo Amanecer', 'Parque de la Tortuga calle Fuentes buenas s/n esquina con Fuente bella Col. Fuentes de Tepepan.', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('120', 'Renacimiento', 'Av. México Ajusco # 642 Pueblo San Miguel Ajusco', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('121', 'Brisas de Parres', 'Calle Hidalgo s/n entre Morelos y Cerro Pueblo Parres ', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('122', 'Hilos de Plata', 'Vicente Guerrero s/n esquina Morelos Pueblo San  Miguel Topilejo', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('123', 'Ejido de San Pedro Mártir (provisional)', 'Prolongación 5 de Mayo S/N Colonia San Pedro Mártir ', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('124', 'Historias Compartidas', 'Campo Xochitl S/N esquina con  Corregidora Colonia Miguel Hidalgo ', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('125', 'El Árbol de la Vida', 'Calle Oaxaca S/N Colonia Miguel Hidalgo ', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('126', 'Alegría', 'Castro Mz. 3 Lt. 4 Col. San Juan Tepeximilpa', '12', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('127', 'Ocaso del Amanecer', 'Calle Bondojito No. 20 Colonia Michoacana', '17', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('128', 'Hilos de Plata', 'Retrono 26 de Fray Servando Tersa de Mier entre Edificio 4 y 5 UH. Jardín Balbuena Norte.  ', '17', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('129', 'Estrellas Triunfantes', 'Congreso de la  Unión s/n esquina Avenida del Taller Colonia El Parque', '17', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('130', 'Aprender es Renacer', 'Calle Román Lugo s/n esquina Ernesto P. Uchurutu Colonia Adolfo López Mateos.', '17', 't');
INSERT INTO "public"."cat_escuelasadultosm" VALUES ('131', 'Arcoíris', 'Calle Francisco I Madero S/N, Esq. calle Las Animas (casa del adulto mayor), Col. Las Animas, Tulyehualco. ', '13', 't');

-- ----------------------------
-- Table structure for cat_espacio_publico
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_espacio_publico";
CREATE TABLE "public"."cat_espacio_publico" (
"id_espacio_publico" int4 DEFAULT nextval('cat_espacio_publico_id_espacio_publico_seq'::regclass) NOT NULL,
"espacio_publico" varchar COLLATE "default",
"direccion" text COLLATE "default",
"id_delegacion" numeric(10),
"activo" bool DEFAULT true,
"tipo" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_espacio_publico
-- ----------------------------
INSERT INTO "public"."cat_espacio_publico" VALUES ('1', 'Deportivo " Valentín Gómez Farías"', 'Circuito Plateros Y Av. Centenario, Uh Lomas De Plateros', '10', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('2', 'Deportivo "Batallón De San Patricio"', 'Calle 10 Esq. Canario S/N Col Tolteca', '10', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('3', 'Deportivo "Las Águilas Japón"', 'Av. Rómulo O Farril S/N Esq. Calzada De Las Águilas, Col. Las Águilas, ', '10', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('4', 'Deportivo "Octavio Paz"', 'Dr. Francisco P. Miranda S/N Col. Merced Gómez C.P. 01480', '10', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('5', 'Deportivo "Torres De Potrero"', 'Av. Torres Entre Calle Dalia Y Jazmín Col. Torres De Potrero', '10', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('6', 'Deportivo "Valentín Gómez Farías"', 'Circuito Plateros Y Av. Centenario U.H. Lomas De Plateros', '10', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('7', 'La Comuna', 'Barranca Del Tecolote S/N, Palmas', '10', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('8', 'Modulo De Policía Y Participación Ciudadana', 'Av. Central S/N, Las Golondrinas', '10', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('9', 'Módulo Deportivo "La Arboleda"', 'Av. Lomas De Capula S/N, Col Lomas De Capula', '10', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('10', 'Módulo Deportivo Torres De Potrero', 'Av. Torres Entre Calle Dalia Y Jazmín, Torres De Potrero', '10', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('11', 'Módulo Deportivo Torres De Potrero', 'La Loma, Torres De Potrero', '10', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('12', 'Parque "Jalapa 2000"', 'Avenida Díaz Ordaz S/N Esq. Calle Peral  Col. Jalapa El Grande ', '10', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('13', 'Parque Alfonso XIII', 'Tiziano S/N, Alfonso XIII', '10', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('14', 'Azcatl Paqui', 'Av. La Naranja Esq. Camino A Santa Lucia, San Miguel Amantla', '2', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('15', 'Deportivo "20 De Noviembre"', 'Av. Azcapotzalco La Villa 127 Col. Barrio De Santo Tomas C.P. 02020', '2', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('16', 'Deportivo "Ceylán"', 'Av. Ceylán Esq. Ferrocarrileros Col. Ceylán  C.P. 02660', '2', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('17', 'Deportivo "Reynosa"', 'Av. San Pablo Esq. 5 Sur Col. Santa Barbará Cp. 02230', '2', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('18', 'Deportivo 20 De Noviembre', 'Av. Azcapotzalco La Villa 127, Barrio De Santo Tomas', '2', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('19', 'Deportivo Ceylán', 'Ceylán Y Ferrocarriles Nac., Ceylán', '2', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('20', 'Deportivo Reynosa', 'Av. San Pablo Esq. Eje 5 Sur, Santa Barbará', '2', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('21', 'Modulo Deportivo Tlatilco', 'Eulalia Guzmán Esq. Las Vías, Tlatilco', '2', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('22', 'Parque "Renovación Nacional', 'Calle Francisco Sarabia S/N Entre Calzada De Las Armas Y Calle Manuel Salazar Col. Providencia (Referencia Tabacalera)', '2', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('23', 'Parque "Tezozomoc"', 'Calle Hacienda El Rosario Y Calle Manuel Salazar S/N Col. Exhacienda El Rosario (Atrás Del CCH Azcapotzalco)', '2', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('24', 'Parque Del Estudiante', 'Calle Rosario Esq. Miguel Hidalgo, Santa Barbará', '2', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('25', 'Parque Pro-Hogar', 'Av. Central Sur Entre Calle 17 Y Calle 19, Pro-Hogar', '2', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('26', 'Parque Renovación Nacional', 'Calle Francisco Sarabia S/N Entre Calzada De Las Armas Y Calle Manuel Salazar, Providencia', '2', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('27', 'Parque Tezozomoc', 'Calle Hacienda El Rosario Y Calle Manuel Salazar S/N (Atrás Del CCH Azcapotzalco), Exhacienda El Rosario', '2', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('28', 'Parque "De Los Venados"', 'Av. Dr. Vértiz Esq. Municipio Libre', '14', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('29', 'Parque "Las Arboledas"', 'Calle Pilares Esq. Pestalozzi   Col. Del Valle', '14', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('30', 'Parque De Los Venados', 'Eje 7 Esq. División Del Norte, Sta. Cruz Atoyac', '14', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('31', 'Parque Las Américas', 'Caleta, Diagonal De San Antonio, Zempoala Y Av. Dr. María Vértiz, ', '14', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('32', 'Parque Las Arboledas', 'Calle Heriberto Frías Esq. Pilares, Del Valle', '14', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('33', 'Alameda Del Sur', 'Miramontes Y Las Bombas (Área De La Biblioteca), Las Campañas', '3', 't', '1');
INSERT INTO "public"."cat_espacio_publico" VALUES ('34', 'Deportivo Emiliano Zapata', 'San Raúl, Esq. San León, Pedregal De Santa Úrsula', '3', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('35', 'Deportivo Francisco J. Mujica (Anexo B)', 'Canal Nacional Y Calz. De La Virgen, Culhuacán', '3', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('36', 'Deportivo Huayamilpas', 'Entrada Por Rey Moctezuma Esquina Coras, Ajusco', '3', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('37', 'Deportivo Jesús Clark Flores', 'Calz. De La Virgen, Esq. Santa Ana, Avante', '3', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('38', 'Deportivo La Fragaya', 'Londres Y Abasolo, Del Carmen', '3', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('39', 'Espacio Recuperado De Los Culhuacanes', 'Av. Taxqueña Esq. Ejido De Sta. Isabel Tolá  San Francisco Culhuacán', '3', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('40', 'Huayamilpas', 'Av. Rey Netzahualcóyotl, Ajusco,  (En Las Canchas De Basquetbol)', '3', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('41', 'Parque "Alameda Sur"', 'Av. Miramontes Y Calzada Las Bombas Col. Las Campanas (En La Zona De La Biblioteca) ', '3', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('42', 'Parque Ciudad Jardín', 'Ciudad Jardín Entre Xotepingo,  Museo Y Tlalpan, Ciudad Jardín', '3', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('43', 'Parque Las Montañas', 'Paseos De Los Naranjos Y Paseo De Magnolias, Paseos De Tequeña', '3', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('44', 'Zoológico Los Coyotes', 'Calz. De La Virgen Esq. Av. Escuela Naval Militar, Ex Ejido De San Pablo Tepetlapa', '3', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('45', 'Deportivo " José María Morelos"', 'José María Castorena S/N Col. San José De Los Cedros', '4', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('46', 'Deportivo "Castillo Ledón"', 'Av., Lic. Castillo Ledón Esq. Juárez Col.', '4', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('47', 'Deportivo "La Papa"', 'Col. Loma Del Padre', '4', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('48', 'Deportivo Cacalote', 'Av. México Y Av. Hidalgo, ', '4', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('49', 'Deportivo La Papa', 'Camino A Santa Rita S/N, Loma Del Padre', '4', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('50', 'Deportivo Morelos', 'José M Castorena Esq. San José De Los Cedros Deportivo Morelos, San José De Los Cedros', '4', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('51', 'Explanada Delegacional Castillo Ledón', 'Av. Juárez Y Guillermo Prieto, La Manzanita', '4', 't', '6');
INSERT INTO "public"."cat_espacio_publico" VALUES ('52', 'Parque San Francisco', ', Lomas De Vista Hermosa', '4', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('53', 'Alameda De Santa María La Ribera', 'Colonia Santa María La Ribera', '15', 't', '1');
INSERT INTO "public"."cat_espacio_publico" VALUES ('54', 'CC. Xavier Villarrutia', 'Glorieta De Insurgentes, Roma Norte', '15', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('55', 'El Jardín Artes Graficas', 'Dr. Arce Esq. Dr. Barragan Col. Doctores', '15', 't', '8');
INSERT INTO "public"."cat_espacio_publico" VALUES ('56', 'Explanada Delegacional', 'Aldama Y Minas S/N Col. Buena Vista', '15', 't', '6');
INSERT INTO "public"."cat_espacio_publico" VALUES ('57', 'Jardín Artes Graficas', 'Dr. José María Vértiz S/N. Col. Doctores Cp. 06720 Cuauhtémoc. Distrito Federal, Doctores', '15', 't', '8');
INSERT INTO "public"."cat_espacio_publico" VALUES ('58', 'Jardín De Los 4 Vientos', 'Eje Central Y Eje Uno Norte Esquina Liz, Peralvillo.', '15', 't', '8');
INSERT INTO "public"."cat_espacio_publico" VALUES ('59', 'Parque "El Pípila"', 'Roa Bárcenas Col. Vista Alegre', '15', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('60', 'Parque Abasolo', 'Luna S/N, Esq. Guerrero (Eje 1 Poniente) Buenavista. Cp. 06350 Cuauhtémoc Distrito', '15', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('61', 'Parque Alameda Santa María', 'Dr. ATL Y Salvador Díaz Mirón S/N, Santa María La Ribera, Cuauhtémoc, 06400 Distrito Federal', '15', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('62', 'Parque El Pípila', 'Roa Bárcenas Y J. A. Torres, Vista Alegre', '15', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('63', 'Parque México', 'Av. México S/N, Hipódromo, Cuauhtémoc, 06100 Ciudad De México, Distrito Federa, Hipódromo', '15', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('64', 'Plaza De Las Tres Culturas', 'U.H. Tlatelolco', '15', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('65', 'Bosque De "Aragón"', 'Avenida Oceanía S/N Puerta 8 ', '5', 't', '2');
INSERT INTO "public"."cat_espacio_publico" VALUES ('66', 'Camellón "Vasco De Quiroga"', 'Av. Eduardo Molina S/N Entre Calle 306 Y 308 Col. Vasco De Quiroga', '5', 't', '3');
INSERT INTO "public"."cat_espacio_publico" VALUES ('67', 'Camellón Vasco De Quiroga', 'Av. Eduardo Molina S/N Entre Calle 306 Y 308., Vasco De Quiroga', '5', 't', '3');
INSERT INTO "public"."cat_espacio_publico" VALUES ('68', 'Deportivo "Bondojito"', 'Norte 74 A Esq. Henry Ford S/N Col. Bondojito  C.P. 07850', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('69', 'Deportivo "Carmen Serdán"', 'Av. Edo. De México S/N Col. Loma La Palma  C.P. 07160', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('70', 'Deportivo "Francisco Zarco"', 'Av. 503 Y Cerrada 505 Col. San Juan De Aragón 1a Sección ', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('71', 'Deportivo "Heberto Castillo"', 'Av. Eduardo Molina S/N Esq. 5 De Mayo Col. Vasco De Quiroga ', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('72', 'Deportivo "Hermanos Galeana"', 'Av. José Loreto Fabela S/N Col. San Juan De Aragón 7a Sección', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('73', 'Deportivo "Juventino Rosas"', 'Guadalupe Victoria Esq. Cuauhtémoc Col. Cuautepec De Madero (Kiosco De Cuautepec Barrio Alto)', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('74', 'Deportivo "La Esmeralda"', 'Norte 94 A  Esq. Parque Central Col. La Esmeralda', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('75', 'Deportivo "Miguel Alemán"', 'Av. Lindavista S/N Entre Lima Y Buenavista Col. Lindavista C.P. 07300', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('76', 'Deportivo Carmen Serdán', 'Av. Edo De México S/N, Loma La Palma', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('77', 'Deportivo Francisco Zarco', 'Av. 503 S/N, San Juan De Aragón 1er Sección', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('78', 'Deportivo Heberto Castillo', 'Av. Eduardo Molina S/N Entre 5 De Mayo Y Av. Eduardo Molina., Vasco De Quiroga', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('79', 'Deportivo Juventino Rosas', 'Kiosco Cuautepec Barrio Bajo Guadalupe Victoria Esquina Cuauhtémoc, Cuautepec De Madero', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('80', 'Deportivo "Hermanos Galeana"', 'José Loreto Fabela S/N, San Juan De Aragón 7a Sección.', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('81', 'Deportivo "Miguel Alemán"', 'Av. Lindavista S/N Entre Lima Y Buenavista, Lindavista', '5', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('82', 'Faro "Indios Verdes"', 'Av. Huitzilihuitl No. 51 Col. Santa Isabel Tola', '5', 't', '7');
INSERT INTO "public"."cat_espacio_publico" VALUES ('83', 'Parque "Camellón Deportivo Eje Central"', 'Av. Eje Central S/N Esq. Av. Montevideo C.P. 07720 Col. Lindavista Vallejo', '5', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('84', 'Parque "Corpus Christi"', 'Av. Noé Y Ezequiel  Esq. Graciela Col. Guadalupe Tepeyac  C.P. 07840', '5', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('85', 'Parque "Los Cocodrilos"', 'Av. Joyas S/N Entre Turquesa Y Granate Col. Estrella C.P. 07810', '5', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('86', 'Parque Camellón Deportivo Eje Central', 'Av. Eje Central S/N Esquina Montevideo, Lindavista Vallejo', '5', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('87', 'Centro Social Alejandro Valle', 'Sur 12, Y Javier Rojo Gómez, Agrícola Oriental', '6', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('88', 'Deportivo "Coyuya"', 'Calzada Coyuya Núm. 208 Col. Fuentes Santa Anita', '6', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('89', 'Deportivo "Leandro Valle"', 'Av. Javier Rojo Gómez Esq. Calle Sur 8, Col. Agrícola Oriental', '6', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('90', 'Jardín "David Saizar"', 'Eje 5 Sur (Playa Villa Del Mar) Y Playa Norte, Militar Marte', '6', 't', '8');
INSERT INTO "public"."cat_espacio_publico" VALUES ('91', 'Jardín Kiosco', 'Sur 16-A Col. Agrícola Oriental', '6', 't', '8');
INSERT INTO "public"."cat_espacio_publico" VALUES ('92', 'Parque "Acteal"', 'Av. Central Y Av. Xochimilco, Agrícola Pantalán', '6', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('93', 'Parque "Ex Lago Infonavit"', 'Av. Rio Churubusco Entre Av. Apatlaco Y Av. Girasol, U.H. Infonavit Iztacalco', '6', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('94', 'Parque "Kiosco"', 'Sur 16a Y Rojo Gómez, Agrícola Oriental', '6', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('95', 'Parque "Leopoldo Ensastiga"', 'Av. Plutarco Elías Calles Col. Granjas México', '6', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('96', 'Parque "Leopoldo Ensastiga"', 'Camellón De Eje 4 Sur Plutarco Elías Calles, Gabriel Ramos Millán.', '6', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('97', 'Camellón "Las Cruces"', 'Av. Las Torres Esq. Av. México Col. Miguel De La Madrid', '7', 't', '3');
INSERT INTO "public"."cat_espacio_publico" VALUES ('98', 'Camellón A Un Costado Del DIF Vicente Guerrero', 'Camellón Periférico A La Altura De Soto Igama Col. Unidad Vicente Guerrero ', '7', 't', '3');
INSERT INTO "public"."cat_espacio_publico" VALUES ('99', 'Camellón Eje 6', 'Eje 6, Esq. Octavio Sentiez, 1ra Ampliación Santiago Acahualtepec,', '7', 't', '3');
INSERT INTO "public"."cat_espacio_publico" VALUES ('100', 'Camellón Periférico A La Altura De Soto Y Gama', 'Periférico A La Altura De Soto Y Gama A Un Costado Del DIF Vicente Guerrero, Unidad Vicente Guerrero', '7', 't', '3');
INSERT INTO "public"."cat_espacio_publico" VALUES ('101', 'Campo "Hércules"', 'Calle Veracruz Esq. Calle Vicente Guerrero Col. San Miguel Teotongo', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('102', 'Cancha "Lucha Reyes"', 'Calle Lucha Reyes Esq. Pedro Infante Col. Ampliación Emiliano Zapata', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('103', 'Canchas "2000"', 'Calle La Rosa Esq. 1º De Mayo Col. San Miguel Teotongo Sección Las Cruces', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('104', 'Canchas "San Pablo"', 'Canchas San Pablo', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('105', 'Canchas "Villa Cid"', 'Canchas Deportivas Villa Cid (Aun Costado Del Modulo De Participación Ciudadana) Col. Desarrollo Urbano', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('106', 'Canchas De La Col. Buenavista', 'Av. De Las Torres Esq. Av. De Las Minas Col. Reforma Política Col. Buenavista ', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('107', 'Canchas Deportivas', 'Av. De Las Torres Esq. Av. De Las Minas Colonia. Reforma Política, Buenavista', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('108', 'Canchas Deportivas', 'Av. Ignacio Zaragoza, Col. Ejército De Oriente 1', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('109', 'Canchas Deportivas', 'Calle Bilbao S/N, Entre Av. San Lorenzo Y Periférico, ', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('110', 'Canchas Deportivas Villa Cid', 'Canchas Deportivas Villa Cid(Aun Costado Del Modulo De Participación Ciudadana), Desarrollo Urbano Quetzalcóatl', '7', 't', '4');
INSERT INTO "public"."cat_espacio_publico" VALUES ('111', 'Centro Comunitario "Flores Magón"', 'Centro Comunitario Flores Magón No. 1 Col. Paraje Zacatepec', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('112', 'Centro Comunitario Constitución', 'Centro Comunitario Constitución S/N Colonia Citlali, Cp. 09660 Del. Iztapalapa., Citlali', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('113', 'Cinturón Verde', 'Calle Huasepin Enfrente Del Mercado, Col. El Molino', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('114', 'Deportivo "Cuitlahuac"', 'Av. Guelatao Entre Eje 5 Sur Y Eje 6 Sur Col. Renovación', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('115', 'Deportivo "Francisco I. Madero"', 'Av. Telecomunicaciones S/N Col. Ejército Constitucionalista', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('116', 'Deportivo "La Cascada"', 'Calle Enna Esq. El Fuerte Col. Santa Martha Acatitla Norte Ampliación I', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('117', 'Deportivo "La Purísima"', 'Calle Quetzal Y San Felipe De Jesús Esq. Hidalgo Col. Barrio San Miguel C.P. 09360', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('118', 'Deportivo Carmen Serdán Iztapalapa', 'Calle Estrella Entre Moyahua Y Satélite, ', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('119', 'Deportivo Francisco I. Madero', 'Av. Telecomunicaciones S/N, Col. Ejército Constitucionalista', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('120', 'Deportivo La Purísima', 'Quetzal Y San Felipe De Jesús Sin Numero Esq. Hidalgo, Barrio San Miguel', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('121', 'Deportivo Santa Cruz Meyehualco', 'Genaro Estrada Esq. Av. Ermita Iztapalapa, Santa Cruz Meyehualco', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('122', 'Deportivo Santa Cruz Meyehualco "Genaro Estrada"', 'Calle Genaro Estrada Esq. Av. Ermita Iztapalapa Col. Santa Cruz Meyehualco', '7', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('123', 'Ex Convento De Culhuacán', 'Av. José María Morelos N°. 10, Barrio San Antonio Culhuacán', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('124', 'Glorieta/Monumento "Cabeza De Juárez"', 'Av. Guelatao Col. Ejercito De Oriente', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('125', 'Invernadero Corena', 'Calle Revolución S/N Col. Miravalle', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('126', 'La Cascada', 'Calle Enna Esquina El Fuerte, Colonia Santa Martha Acatitla Norte Ampliación I', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('127', 'Parque El Hoyo', 'Calle Venustiano Carranza Esq.16 De Septiembre, Lomas De Zaragoza', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('128', 'Parque  "De Los Jóvenes"', 'Calle  Camino A Las Minas S/N Col. Xalpa', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('129', 'Parque  "Rebeca"', 'Calle Retama Esq. Calle Colorín Col. 2da Ampliación De Santiago', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('130', 'Parque " De Santa María Aztahuacán"', 'Av. México, Abraham González Y Circunvalación S/N Col. Santa María Aztahuacán Pueblo (Frente A La Base De Peseros Aeropuerto', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('131', 'Parque "Colosio"', 'Calle Lázaro Cárdenas Esq. 20 De Noviembre Col. Ixtlahuacan', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('132', 'Parque "Cruz Azul"', 'Calle Técnicos Entre Manuales Y Cine Mexicano Col. Lomas Estrella C.P. 09899', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('133', 'Parque "De La Colonia Los Ángeles"', 'Av. De Las Torres Esq. Zanahoria Col. Los Ángeles  C.P. 09830', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('134', 'Parque "El Hoyo"', 'Calle Venustiano Carranza Esq. 16 De Septiembre Col. Lomas De Zaragoza', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('135', 'Parque "Elektra"', 'Av. Guerra De Reforma S/N Esq. Batalla De Loma Alta Col. Leyes De Reforma 3a Sección', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('136', 'Parque "Felipe Ángeles"', 'Calle Eje 5 S/N Y Canal De Apatlalco Col. Apatlalco  C.P. 09430', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('137', 'Parque "La Joya"', 'Av. Principal Y Carretera México-Puebla Col. San Miguel Teotongo', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('138', 'Parque "La Lola"', 'Calle Valle Nacional Y Calle Zapote Col. Miravalle ', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('139', 'Parque "La Montada"', 'Calle Oscar  Entre Loya Y Estrella Col. Santuario', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('140', 'Parque "Mercedes"', 'Av. Principal Y Dr. Francisco Villegas Col. San Miguel Teotongo', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('141', 'Parque "Tezontle"', 'Calle Piscis Esq. Mina De Plata  Col. Xalpa', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('142', 'Parque Chavos Banda:', ', ', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('143', 'Parque Colosio', 'Calle Lázaro Cárdenas Y 20 De Noviembre, Ixtlahuacan', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('144', 'Parque Cruz Azul', 'Técnicos Entre Manuales Y Cine Mexicano, Lomas Estrella', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('145', 'Parque Cuitláhuac', 'Av. Guelatao Entre Eje 5 Sur Y Eje 6 Sur, Col. Renovación', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('146', 'Parque De La U.H Ermita Zaragoza', 'Av. Chilpancingo Sur S/N Col. Ermita Zaragoza U.H', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('147', 'Parque De Los Jóvenes', 'Calle Camino A Las Minas S/N, Colonia Xalpa', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('148', 'Parque Elektra', 'Av. Guerra De Reforma Sin Numero Esquina Batalla De Loma Alta, Leyes De Reforma Sección 3', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('149', 'Parque La Lola', ', ', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('150', 'Parque La Montada', 'Calle Oscar Entre Loya Y Estrella, Santuario.', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('151', 'Parque Patoli', 'Av. Periférico, Esq. Av. Tláhuac, José López Portillo', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('152', 'Parque Rebeca', 'Calle Retama Y Calle Colorín, 2da Ampliación De Santiago', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('153', 'Parque San Lorenzo Tezonco', 'Av. Las Torres S/N Esq. Miguel Lerdo De Tejada, Pueblo De San Lorenzo Tezonco', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('154', 'Parque Y Canchas Deportivas Chilpancingo', 'Canchas Deportivas Av. Chilpancingo Sur S/N, Ermita Zaragoza U.H.', '7', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('155', 'Plaza Cuitlahuac', 'Av. Cuauhtémoc S/N, Pueblo De Santiago Acahualtepec', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('156', 'Territorial San Lorenzo', 'Calle Zacatlán S/N Esq. Av.Tláhuac, Lomas De San Lorenzo', '7', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('157', 'Casa Popular', 'Av. Luis Cabrera No. 1, San Jerónimo Lidice', '8', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('158', 'Foro Cultural Magdalena Contreras', 'Camino Real De Contreras No. 27, La Concepción', '8', 't', '7');
INSERT INTO "public"."cat_espacio_publico" VALUES ('159', 'La Estación', 'Av. Ferrocarriles, La Concepción', '8', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('160', 'Alameda De Tacubaya', 'Av. Parque Lira, Miguel Hidalgo, Distrito Federal, México', '16', 't', '1');
INSERT INTO "public"."cat_espacio_publico" VALUES ('161', 'Deportivo "Pavón"', 'Lago Erne S/N Col. Reforma Pensil ', '16', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('162', 'Deportivo Pavón', 'Lago Erne S/N, ', '16', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('163', 'Deportivo Plan Sexenal', 'Mar Mediterráneo S/N Nextitla, ', '16', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('164', 'Parque "Cañitas"', 'Calzada México Tacuba S/N Col. Popotla ', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('165', 'Parque "Chapultepec"', 'Av. De Los Compositores Esq. Periférico  (Junto A La Feria De Chapultepec 2da. Sección)', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('166', 'Parque "Legaría"', 'Rio San Joaquín Esq. Legaría S/N Col. Legaría', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('167', 'Parque "Morelos"', 'Entre Progreso Y Agricultura Col. Escandón', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('168', 'Parque "Reforma Social"', 'Av. Tecamachalco S/N  Col. Reforma Social (Atrás De Sanborns)', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('169', 'Parque Cañitas', 'Calzada México Tacuba, ', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('170', 'Parque Chapultepec', 'Av. De Los Compositores, Casi Esquina Periférico, Junto A La Feria. Chapultepec 2ª Sección, ', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('171', 'Parque Morelos', 'Entre Progreso Y Agricultura, ', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('172', 'Parque Reforma', 'Av. Tecamachalco Sin Numero, Atrás De Sanborns, ', '16', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('173', 'Deportivo "San Antonio Tecomitl"', 'Deportivo San Antonio Tecomitl', '9', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('174', 'Deportivo San Antonio Tecomitl', 'Av. José López Portillo S/N, Pueblo San Antonio Tecomitl', '9', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('175', 'Gimnasio San Antonio Tecomitl', 'Calle Zaragoza S/N, Pueblo San Antonio Tecomitl', '9', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('176', 'Parque  De "Villa Milpa Alta"', 'Parque De Villa Milpa Alta', '9', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('177', 'Parque "San Pablo Ozotepec"', 'Parque San Pablo Ozotepec', '9', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('178', 'Parque "San Salvador Cuauhtenco"', 'Parque San Salvador Cuauhtenco', '9', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('179', 'Parque De San Francisco Tecoxpa', 'Parque De San Francisco Tecoxpa', '9', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('180', 'San Francisco Tecoxpa', 'Av. Hidalgo Y Bulevar José López Portillo S/N, Pueblo San Francisco Tecoxpa', '9', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('181', 'San Pablo Ozotepec', 'Progreso S/N Esquina Con Fabián Flores, Pueblo San Pablo Oztotepec', '9', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('182', 'San Salvador Cuauhtenco', 'Calle Aldama S/N, Pueblo San Salvador Cuauhtenco', '9', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('183', 'Villa Milpa Alta', 'Sinaloa Norte S/N, Barrio Santa Martha', '9', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('184', 'Bosque De Tláhuac', 'Av. La Turba Esquina Heberto Castillo, Miguel Hidalgo', '11', 't', '2');
INSERT INTO "public"."cat_espacio_publico" VALUES ('185', 'Deportivo "Solidaridad"', 'Deportivo Solidaridad Esq. Hernani Col. Miguel Hidalgo', '11', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('186', 'Deportivo "Tlaltenco"', 'Calle Esteban Chavero Esq. Paseo Nuevo Col. Pueblo Tlaltenco', '11', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('187', 'Deportivo Emiliano Aguilar Mixquic', 'Rio Ameca Esquina Emiliano Aguilar, Barrio Santa Cruz Mixquic', '11', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('188', 'Deportivo Tlaltenco', 'Calle Esteban Chavero Esquina Paseo Nuevo, Pueblo San Francisco Tlaltenco', '11', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('189', 'Faro Tláhuac', 'Av. La Turba Esquina Heberto Castillo Interior De Bosque), Miguel Hidalgo', '11', 't', '7');
INSERT INTO "public"."cat_espacio_publico" VALUES ('190', 'Parque "De Los Olivos"', 'Av. Sur Del Comercio Casi Esquina De La Mónera Col. San Juan Ixtayopan', '11', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('191', 'Parque "Juan Palomino"', 'Av. Juan Palomo Esq. Prolongación 20 De Noviembre', '11', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('192', 'Parque Juan Palomo', 'Av. Juan Palomo Esquina Prolongación 20 De Noviembre., Barrio Los Reyes', '11', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('193', 'Parque Los Olivos', 'Av. Sur Del Comercio Casi Esquina De La Mónera, San Juan Ixtayopan', '11', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('194', 'Parque Solidaridad', 'Calle Ernani, Miguel Hidalgo', '11', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('195', 'Prepa Más Agrícola Metropolitana Modulo De Participación Ciudadana', 'Jacobo De Lieja Esquina Don Pascuale, Agrícola Metropolitana', '11', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('196', 'Prepa Más Centro Comunitario Zapotitla', 'Cecilio Acosta Esquina Manuel M. López, Zapotitla', '11', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('197', 'Prepa Más Del Mar Modulo De Participación Ciudadana', 'Calle Sábalo Esquina Corvina Sin Numero, Del Mar', '11', 't', '11');
INSERT INTO "public"."cat_espacio_publico" VALUES ('198', 'Deportivo "Rodolfo Sánchez Taboada"     "Yobain"', 'Yobain S/N Esq. Tecal  Col. Héroes De Padierna', '12', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('199', 'Deportivo "San Pedro Mártir"', 'Calle Dalia Entre Marisol Y Mirador Col. San Pedro Mártir', '12', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('200', 'Deportivo "Vivanco"', 'Calle De Moneda Esq. Insurgentes Sur Col. Centro De Tlalpan', '12', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('201', 'Deportivo Rodolfo Sánchez Taboada', 'Deportivo Sánchez Taboada Yobain S/N Esq. Con Tecal., Héroes De Padierna', '12', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('202', 'Deportivo San Pedro Mártir', 'Dalia Entre Marisol Y Mirador, San Pedro Mártir', '12', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('203', 'Deportivo Vivanco', 'Calle De Moneda Esq. Insurgentes Sur, Centro De Tlalpan', '12', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('204', 'Modulo Deportivo "Morelos"', 'Calle Morelos Esq. Niño De Jesús Barrio Del Niño De Jesús  Col. Tlalpan Centro', '12', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('205', 'Modulo Deportivo Don Bosco', 'Viaducto Tlalpan S/N Entre San Juan Bosco Y San Francisco, San Lorenzo Huipulco', '12', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('206', 'Modulo Deportivo Morelos', 'Morelos Esq. Niño De Jesús, Barrio Del Niño De Jesús', '12', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('207', 'Modulo Deportivo Topilejo', 'Cruz Blanca S/N, San Miguel Topilejo', '12', 't', '9');
INSERT INTO "public"."cat_espacio_publico" VALUES ('208', 'Deportivo Oceanía', 'Av. Oceanía Y Tahel, Pensador Mexicano', '17', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('209', 'Parque "Alameda Oriente"', 'Av. Bordo De Xochiaca S/N Esq. Prolongación Periférico Puerta 2  Col. Arenal 4a Sección', '17', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('210', 'Parque De Los Periodistas', 'Francisco Del Paso Y Troncoso Núm. 219, Jardín Balbuena', '17', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('211', 'Parque Ecológico Alameda Oriente', 'Av. Bordo De Xochiaca S/N Esq. Prolongación Periférico, Puerta 2, Arenal 4a Secc.', '17', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('212', 'Parque El Extra', 'Calle 67, Col Puebla', '17', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('213', 'Parque Ícaro', ', ', '17', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('214', 'Parque Las Palomas', 'Anahuatl S/N, Arenal 3ra Secc.', '17', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('215', 'Parque Obrera', 'Yunque, Artes Graficas', '17', 't', '10');
INSERT INTO "public"."cat_espacio_publico" VALUES ('216', 'Bosque San Luis', 'Avenida Año De Juárez 1900, Quirino Mendoza', '13', 't', '2');
INSERT INTO "public"."cat_espacio_publico" VALUES ('217', 'Deportivo "San Gregorio"', 'Av. Nuevo León Esq. Chapultepec Col. San Gregorio Atlapulco', '13', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('218', 'Deportivo "Xochimilco"', 'Calle Francisco Goitia Esq. 16 De Septiembre  Col. Barrio Xaltocan', '13', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('219', 'Deportivo San Gregorio', 'Av. Nuevo León Esq. Chapultepec,, San Gregorio Atlapulco', '13', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('220', 'Deportivo Xochimilco', 'Francisco Goytia, Entre Redención Y 16 De Septiembre, Barrio Xaltocan', '13', 't', '5');
INSERT INTO "public"."cat_espacio_publico" VALUES ('221', 'Explanada Del Centro De Xochimilco', 'Entre Guadalupe I Ramírez Y Vicente Guerrero, Barrio El Rosario', '13', 't', '6');

-- ----------------------------
-- Table structure for cat_institucion
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_institucion";
CREATE TABLE "public"."cat_institucion" (
"id_institucion" numeric(32) DEFAULT nextval('cat_institucion_id_institucion_seq'::regclass) NOT NULL,
"institucion" varchar(150) COLLATE "default",
"siglas" varchar(10) COLLATE "default",
"universidad" numeric(1),
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_institucion
-- ----------------------------
INSERT INTO "public"."cat_institucion" VALUES ('1', 'ESCUELA NACIONAL PREPARATORIA, UNAM', 'ENP', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('2', 'COLEGIO DE CIENCIAS Y HUMANIDADES', 'CCH', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('3', 'INSTITUTO POLITECNICO NACIONAL', 'IPN', '2', 't');
INSERT INTO "public"."cat_institucion" VALUES ('4', 'INSTITUTO DE EDUCACION MEDIA SUPERIOR (IEMS)', 'IEMS', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('5', 'DGB DIRECCION GENERAL DE BACHILLERATO', 'DGB', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('6', 'COLEGIO DE BACHILLERES', 'COBACH', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('7', 'CETIS', 'CETIS', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('8', 'COLEGIO NACIONAL DE EDUCACION PROFESIONAL TECNICA (CONALEP)', 'CONALEP', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('10', 'BACHILLERATO A DISTANCIA GDF', 'EAD', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('11', 'OTRO', 'OTRO', '0', 'f');
INSERT INTO "public"."cat_institucion" VALUES ('12', 'INSTITUTO NACIONAL DE LAS BELLAS ARTES', 'INBA', '2', 't');
INSERT INTO "public"."cat_institucion" VALUES ('13', 'PREPARATORIA ABIERTA', 'PA', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('14', 'CONADE', 'CONADE', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('15', 'UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO', 'UNAM', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('16', 'UNIVERSIDAD AUTÓNOMA METROPOLITANA', 'UAM', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('20', 'COLEGIO DE MÉXICO', 'COLMEX', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('21', 'INSTITUTO NACIONAL DE ANTROPOLOGÍA E HISTORIA', 'INAH', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('22', 'UNIVERSIDAD PEDAGOGICA NACIONAL', 'UPN', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('23', 'INSTITUCION PRIVADA', 'PRIVADA', '1', 'f');
INSERT INTO "public"."cat_institucion" VALUES ('24', 'ESCUELA NACIONAL DE BIBLIOTECONOMÍA Y ARCHIVONOMÍA', 'ENBA', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('25', 'ESCUELA SUPERIOR DE EDUCACION FISICA', 'ESEF', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('26', 'ESCUELA NORMAL SUPERIOR DE MEXICO', 'ENSM', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('27', 'ESCUELA NACIONAL PARA MAESTRAS DE JARDINES DE NIÑOS', 'ENMJN', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('28', 'BENEMERITA ESCUELA NACIONAL DE MAESTROS', 'BENM', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('29', 'ESCUELA NORMAL DE ESPECIALIZACION ', 'ENE', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('30', 'ESCUELA DE ENFERMERIA DE LA SECRETARIA DE SALUD DEL DISTRITO FEDERAL', 'EESSDF', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('31', 'ESCUELA DE ENFERMERIA DEL SIGLO XXI', 'EDESXX1', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('32', 'ESCUELA NACIONAL DE ENTRENADORES DEPORTIVOS', 'ENED', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('33', 'ESCUELA SUPERIOR DE REHABILITACION', 'ESR', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('34', 'UNIVERSIDAD ABIERTA Y A DISTANCIA DE MEXICO', 'UADM', '1', 't');
INSERT INTO "public"."cat_institucion" VALUES ('35', 'ESCUELA NACIONAL PARA MAESTRAS DE JARDINES DE NIÑOS', 'ENMJN', '1', 'f');
INSERT INTO "public"."cat_institucion" VALUES ('36', 'DIRECCION GENERAL DE EDUCACION EN CIENCIA Y TECNOLOGIA DEL MAR', 'DGECyTM', '0', 't');
INSERT INTO "public"."cat_institucion" VALUES ('37', 'PREPA EN LINEA-SEP', 'PL-SEP', '0', 't');

-- ----------------------------
-- Table structure for cat_museos
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_museos";
CREATE TABLE "public"."cat_museos" (
"id_museo" int4 DEFAULT nextval('cat_museos_id_museo_seq'::regclass) NOT NULL,
"museo" varchar(200) COLLATE "default",
"direccion" text COLLATE "default",
"id_delegacion" numeric,
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_museos
-- ----------------------------
INSERT INTO "public"."cat_museos" VALUES ('1', 'Centro Cultural De España', 'República De Guatemala 18, Centro, Cuauhtémoc, 06010 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('2', 'Galería De Historia Museo Del Caracol', '1ª Sección Del Bosque De Chapultepec, Rampa De Acceso Al Castillo De, Chapultepec, Bosque De Chapultepec, 11580 Ciudad De México, D.F.', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('3', 'Laboratorio Arte Alameda', 'Doctor Mora 7, Centro, Cuauhtémoc, 06000 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('4', 'Museo Tecnológico Comisión Federal De Electricidad', 'Avenida Grande Del Bosque S/N, , 2a. Sección Del Bosque De Chapultepec, 11870 Ciudad De México, D.F.', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('5', 'Museo Archivo De La Fotografía', 'República De Guatemala República De Guatemala 34, Centro, Cuauhtémoc, 06010 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('6', 'Museo Casa Carranza', 'Río Lerma 35, Cuauhtémoc, 06500 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('7', 'Museo De Arte Moderno', 'Av. Paseo De La Reforma S/N, Miguel Hidalgo, Bosque De Chapultepec I, 11560 Ciudad De México, D.F.', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('8', 'Museo De La Ciudad De México', 'José María Pino Suárez 30, Centro, 06060 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('9', 'Museo Del Arzobispado  SHCP', 'Calle Moneda 4, Delegación Cuauhtémoc, Col. Centro, 06010 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('10', 'Museo De Los Ferrocarrileros', 'Entrada Por Cuauhtémoc, Aquiles Serdán, Villa Aragón, Gustavo A. Madero, 07000 Ciudad De México, D.F.', '5', 't');
INSERT INTO "public"."cat_museos" VALUES ('11', 'Museo Del Estanquillo', 'Isabel La Católica 26, Cuauhtémoc, Centro, 06000 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('12', 'Museo Del Palacio De Bellas Artes', 'Av. Juárez, Centro Histórico, 06050 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('13', 'Museo Mural Diego Rivera', 'Calle Balderas Y Colon S/N, Cuauhtémoc, Centro, 06000 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('14', 'Museo Nacional De Arte', 'Calle Tacuba 8, Cuauhtémoc, Centro Histórico, 06010 Ciudad De México, D.F.
01 55 8647 5430', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('15', 'Museo Nacional De Historia, Castillo De Chapultepec', 'Bosque De Chapultepec, Paseo De La Reforma, Bosque De Chapultepec I, Miguel Hidalgo, 11100 Ciudad De México, D.F.', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('16', 'Museo Nacional De La Revolución', 'Plaza De La República S/N, Cuauhtémoc, Tabacalera, 06030 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('17', 'Museo Nacional De Las Culturas', 'No. Centro, Moneda 13, Colonia Centro, 06060 D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('18', 'Museo Nacional De Las Intervenciones', '20 De Agosto No. S/N Col. San Diego Churubusco San Diego Churubusco, 04120 D.F.', '3', 't');
INSERT INTO "public"."cat_museos" VALUES ('19', 'Museo Nacional De San Carlos', 'Puente De Alvarado 50, Tabacalera, Cuauhtémoc, 06030 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('20', 'Museo Panteón De San Fernando', 'Plaza De San Fernando 17, Cuauhtémoc, Guerrero, 06300 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('21', 'Museo Soumaya Plaza Carso', 'Miguel De Cervantes Saavedra 303, Granada, Miguel Hidalgo, 11529 Ciudad De México, D.F.', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('22', 'Museo Tamayo', 'Paseo De La Reforma 51, Bosque De Chapultepec, Miguel Hidalgo, 11580 Ciudad De México, D.F.', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('23', 'Museo Universitario Arte Contemporáneo', 'Av. De Los Insurgentes Sur No. 3000, Coyoacán, Centro, 04510 Ciudad De México, D.F.', '3', 't');
INSERT INTO "public"."cat_museos" VALUES ('24', 'Galería Del Palacio Nacional', 'Plaza De La Constitución S/N, Centro, Cuauhtémoc, 06066 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('25', 'Museo Nacional De La Arquitectura ', 'Av. Juárez Y Eje Central Lázaro Cárdenas, Centro Histórico ', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('26', 'Antiguo Colegio De San Ildefonso ', 'Justo Sierra 16, Centro Histórico De La Ciudad De México 06020', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('27', 'Museo Antiguo Colegio De Medicina ', 'Centro Histórico: República De Brasil No. 33 Ciudad De México ', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('28', 'Museo Universitario Del Chopo', 'Dr.  Atl 37 Col. Santa María La Ribera ', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('29', 'Museo José Luis Cuevas ', 'Academia 13 Col. Centro Histórico Cp. 06060', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('30', 'Museo Del Calzado "El Borceguí"', 'Bolívar 24 Col. Centro México DF', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('31', 'Museo Del Templo Mayor ', 'Seminario 8, Centro Histórico Cuauhtémoc ', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('32', 'Museo Ex Teresa Arte Actual ', 'Lic. Verdad 8, Centro Histórico, 06060 CDMX', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('33', 'Casa Del Lago Juan José Arreola ', 'Bosque De Chapultepec, Primera Sección, Acceso Por Paseo De La Reforma, Puerta Principal Al Zoológico, Col. San Miguel Chapultepec', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('34', 'Museo Nacional De Antropología ', 'Paseo De La Reforma Y Gandhi, Frente Al Acceso A Casa De Lago En Chapultepec', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('35', 'Centro Nacional De Las Artes ', 'Rio Churubusco No. 79 Calz. Del Tlalpan, Col. Country Club Delegación Coyoacán ', '3', 't');
INSERT INTO "public"."cat_museos" VALUES ('36', 'Centro Cultural Ollin Yoliztli', 'Periférico Sur 5141, Col. Isidro Favela', '12', 't');
INSERT INTO "public"."cat_museos" VALUES ('37', 'Museo De Sitio Cuicuilco ', 'Periférico Sur 511, Col. Isidro Favela', '12', 't');
INSERT INTO "public"."cat_museos" VALUES ('38', 'Museo Del Carmen', 'Av. Revolución No. 4 Y 6 Esq. Con El Callejón Del Monasterio ', '10', 't');
INSERT INTO "public"."cat_museos" VALUES ('39', 'Museo Soumaya Plaza Loreto ', 'Altamirano No. 46, Tizapan, Álvaro Obregón, 01090 Ciudad De México ', '10', 't');
INSERT INTO "public"."cat_museos" VALUES ('40', 'Museo De La Acuarela ', 'Calle Salvador Novo 88, Santa Catarían, Ciudad De México ', '3', 't');
INSERT INTO "public"."cat_museos" VALUES ('41', 'Museo De Geofísica ', 'Victoriano Zepeda No. 53, Col. Observatorio, México D.F.', '16', 't');
INSERT INTO "public"."cat_museos" VALUES ('42', 'Colegio Nacional De México ', 'Luis González Obregón 23, Centro Histórico, 06020', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('43', 'Museo Interactivo De Economía ', 'Calle De Tacuba 17, Cuauhtémoc, Centro Histórico, 06000 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('44', 'Museo De Memoria Y Tolerancia ', 'Av. Juárez 8, Cuauhtémoc, Centro, 06010 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('45', 'Parque Ecoturístico De San Bernabé Ocotepec', '10369 D F, Av. Ojo De Agua 1005, 10369 Ciudad De México, D.F.', '8', 't');
INSERT INTO "public"."cat_museos" VALUES ('46', 'Subsecretaria De Participación Ciudadana ', 'Cuauhtémoc 142, Del Carmen, Coyoacán, 04100 Ciudad De México, D.F.', '3', 't');
INSERT INTO "public"."cat_museos" VALUES ('47', 'Parque Ecoturístico Del Cerro De Las Cruces ', '', '7', 't');
INSERT INTO "public"."cat_museos" VALUES ('48', 'Ex convento De Culhuacán', 'Morelos 10, Iztapalapa, Culhuacán, 09800 Ciudad De México, D.F.', '7', 't');
INSERT INTO "public"."cat_museos" VALUES ('49', 'Museo De Arte Popular', 'Calle Revillagigedo 11, Cuauhtémoc, Centro, 06050 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('50', 'Museo De Las Constituciones', 'Calle Del Carmen 31, Cuauhtémoc, Centro Histórico, 06000 Ciudad De México, D.F.', '15', 't');
INSERT INTO "public"."cat_museos" VALUES ('51', 'Faro De Tláhuac', 'Av. La Turba S/N, Tláhuac, Miguel Hidalgo, 32000 Ciudad De México, D.F.', '11', 't');
INSERT INTO "public"."cat_museos" VALUES ('52', 'Faro De Oriente', 'Calle Ignacio Zaragoza S/N, Iztapalapa, Fuentes De Zaragoza, 09150 Ciudad De México, D.F.', '7', 't');
INSERT INTO "public"."cat_museos" VALUES ('53', 'Faro De Milpa Alta ', 'Doctor Gastón Melo 40, San Antonio Tecomitl, Milpa Alta, 12100 Ciudad De México, D.F.', '9', 't');
INSERT INTO "public"."cat_museos" VALUES ('54', 'Faro De Indios Verdes ', 'Av. Huitzilihuitl 51, Gustavo A. Madero, Santa Isabel Tola, 07010 Ciudad De México, D.F.', '5', 't');
INSERT INTO "public"."cat_museos" VALUES ('55', 'Centro Transdisciplinario Poesía Y Trayecto Ac', '', '5', 't');
INSERT INTO "public"."cat_museos" VALUES ('56', 'Museo  Del Cine Mexicano ', 'La Morena 110, Col Del Valle Centro, Benito Juárez, 03100 Ciudad De México, D.F.', '14', 't');

-- ----------------------------
-- Table structure for cat_nivel
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_nivel";
CREATE TABLE "public"."cat_nivel" (
"id_nivel" numeric(32) DEFAULT nextval('cat_nivel_id_nivel_seq'::regclass) NOT NULL,
"nivel" varchar(20) COLLATE "default",
"activo" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_nivel
-- ----------------------------
INSERT INTO "public"."cat_nivel" VALUES ('0', '', null);
INSERT INTO "public"."cat_nivel" VALUES ('1', 'DELEGACIONAL', 't');
INSERT INTO "public"."cat_nivel" VALUES ('2', 'ESPECIAL', 't');
INSERT INTO "public"."cat_nivel" VALUES ('3', 'OTRO', 't');

-- ----------------------------
-- Table structure for cat_perfil
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_perfil";
CREATE TABLE "public"."cat_perfil" (
"id_perfil" numeric(32) DEFAULT nextval('cat_perfil_id_perfil_seq'::regclass) NOT NULL,
"perfil" varchar(50) COLLATE "default",
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_perfil
-- ----------------------------
INSERT INTO "public"."cat_perfil" VALUES ('1', 'Administrador', 't');
INSERT INTO "public"."cat_perfil" VALUES ('2', 'Operador', 't');
INSERT INTO "public"."cat_perfil" VALUES ('3', 'Director', 't');
INSERT INTO "public"."cat_perfil" VALUES ('4', 'Operador Especial', 't');

-- ----------------------------
-- Table structure for cat_plantel
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_plantel";
CREATE TABLE "public"."cat_plantel" (
"id_plantel" numeric(32) DEFAULT nextval('cat_plantel_id_plantel_seq'::regclass) NOT NULL,
"id_institucion" int2 NOT NULL,
"plantel" varchar COLLATE "default",
"activo" bool,
"id_delegacion" int2
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_plantel
-- ----------------------------
INSERT INTO "public"."cat_plantel" VALUES ('1', '1', 'PLANTEL 1. GABINO BARREDA.', 't', '13');
INSERT INTO "public"."cat_plantel" VALUES ('2', '1', 'PLANTEL 2. ERASMO CASTELLANOS QUINTO', 't', '6');
INSERT INTO "public"."cat_plantel" VALUES ('3', '1', 'PLANTEL 3. JUSTO SIERRA', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('4', '1', 'PLANTEL 4. VIDAL CASTAÑEDA Y NAJERA', 't', '16');
INSERT INTO "public"."cat_plantel" VALUES ('5', '1', 'PLANTEL 5. JOSE VASCONCELOS.', 't', '12');
INSERT INTO "public"."cat_plantel" VALUES ('6', '1', 'PLANTEL 6. ANTONIO CASO.', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('7', '1', 'PLANTEL 7. EZEQUIEL A. CHAVEZ', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('8', '1', 'PLANTEL 8. MIGUEL E. SCHULZ.', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('9', '1', 'PLANTEL 9. PEDRO DE ALBA.', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('10', '2', 'CCH-PLANTEL AZCAPOTZALCO', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('11', '2', 'CCH-PLANTEL VALLEJO', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('12', '2', 'CCH-PLANTEL ORIENTE', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('13', '2', 'CCH-PLANTEL SUR', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('14', '3', 'CEC Y T NO 01 GONZALO VAZQUEZ VELA', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('15', '3', 'CEC Y T NO 02 MIGUEL BERNARD', 't', '16');
INSERT INTO "public"."cat_plantel" VALUES ('16', '3', 'CEC Y T NO 04 LAZARO CARDENAS', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('17', '3', 'CEC Y T NO 05 BENITO JUAREZ', 't', '14');
INSERT INTO "public"."cat_plantel" VALUES ('18', '3', 'CEC Y T NO 06 MIGUEL OTHON DE MENDIZABAL', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('19', '3', 'CEC Y T NO 07 CUAUHTEMOC', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('20', '3', 'CEC Y T NO 08 NARCISO BASSOLS', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('21', '3', 'CEC Y T NO 09 JUAN DE DIOS BATIZ', 't', '16');
INSERT INTO "public"."cat_plantel" VALUES ('22', '3', 'CEC Y T NO 10 CARLOS VALLEJO MARQUEZ', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('23', '3', 'CEC Y T NO 11 WILFRIDO MASSIEU', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('24', '3', 'CEC Y T NO 12 JOSE MARIA MORELOS', 't', '25');
INSERT INTO "public"."cat_plantel" VALUES ('25', '3', 'CEC Y T NO 13 RICARDO FLORES MAGON', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('26', '3', 'CEC Y T NO 14 LUIS ENRIQUE ERRO', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('27', '4', 'PLANTEL ALVARO OBREGON GENERAL LAZARO CARDENAS DEL RIO', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('28', '4', 'PLANTEL AZCAPOTZALCO MELCHOR OCAMPO', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('29', '4', 'PLANTEL COYOACAN RICARDO FLORES MAGON', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('30', '4', 'PLANTEL CUAJIMALPA JOSEFA ORTIZ DE DOMINGUEZ', 't', '4');
INSERT INTO "public"."cat_plantel" VALUES ('31', '4', 'PLANTEL GUSTAVO A. MADERO 1 BELISARIO DOMINGUEZ', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('32', '4', 'PLANTEL GUSTAVO A. MADERO 2 SALVADOR ALLENDE', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('33', '4', 'PLANTEL IZTACALCO FELIPE CARRILLO PUERTO', 't', '6');
INSERT INTO "public"."cat_plantel" VALUES ('34', '4', 'PLANTEL IZTAPALAPA 1', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('35', '4', 'PLANTEL IZTAPALAPA 2 BENITO JUAREZ', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('36', '4', 'PLANTEL MAGDALENA CONTRERAS IGNACIO MANUEL ALTAMIRANO', 't', '8');
INSERT INTO "public"."cat_plantel" VALUES ('37', '4', 'PLANTEL MIGUEL HIDALGO CARMEN SERDAN', 't', '16');
INSERT INTO "public"."cat_plantel" VALUES ('38', '4', 'PLANTEL MILPA ALTA EMILIANO ZAPATA', 't', '9');
INSERT INTO "public"."cat_plantel" VALUES ('39', '4', 'PLANTEL TLAHUAC JOSE MARIA MORELOS', 't', '11');
INSERT INTO "public"."cat_plantel" VALUES ('40', '4', 'PLANTEL TLALPAN 1 FRANCISCO J. MUJICA', 't', '12');
INSERT INTO "public"."cat_plantel" VALUES ('41', '4', 'PLANTEL TLALPAN 2 OTILIO MONTAÑO', 't', '12');
INSERT INTO "public"."cat_plantel" VALUES ('42', '4', 'PLANTEL XOCHIMILCO FRAY BERNARDINO DE SAHAGUN', 't', '13');
INSERT INTO "public"."cat_plantel" VALUES ('43', '5', 'MAESTRO MOISES SAENZ GARZA', 't', '16');
INSERT INTO "public"."cat_plantel" VALUES ('44', '5', 'JESUS REYES HEROLES', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('45', '6', 'PLANTEL 01 - EL ROSARIO', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('46', '6', 'PLANTEL 02 - CIEN METROS', 't', '55');
INSERT INTO "public"."cat_plantel" VALUES ('47', '6', 'PLANTEL 03 - IZTACALCO', 't', '6');
INSERT INTO "public"."cat_plantel" VALUES ('48', '6', 'PLANTEL 04 - CULHUACAN', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('49', '6', 'PLANTEL 06 - VICENTE GUERRERO', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('50', '6', 'PLANTEL 07 - IZTAPALAPA', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('51', '6', 'PLANTEL 08 - CUAJIMALPA', 't', '4');
INSERT INTO "public"."cat_plantel" VALUES ('52', '6', 'PLANTEL 09 - ARAGON', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('53', '6', 'PLANTEL 10 -AEROPUERTO', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('54', '6', 'PLANTEL 13 - XOCHIMILCO TEPEPAN', 't', '13');
INSERT INTO "public"."cat_plantel" VALUES ('55', '6', 'PLANTEL 14 - MILPA ALTA', 't', '9');
INSERT INTO "public"."cat_plantel" VALUES ('56', '6', 'PLANTEL 15 - CONTRERAS', 't', '8');
INSERT INTO "public"."cat_plantel" VALUES ('57', '6', 'PLANTEL 16 - TLAHUAC', 't', '11');
INSERT INTO "public"."cat_plantel" VALUES ('58', '6', 'PLANTEL 17 - HUAYAMILPAS PEDREGAL', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('60', '7', 'PLANTEL CETIS 001', 't', '11');
INSERT INTO "public"."cat_plantel" VALUES ('61', '7', 'PLANTEL CETIS 002', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('62', '7', 'PLANTEL CETIS 003', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('63', '7', 'PLANTEL CETIS 004', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('64', '7', 'PLANTEL CETIS 005', 't', '14');
INSERT INTO "public"."cat_plantel" VALUES ('65', '7', 'PLANTEL CETIS 006', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('66', '7', 'PLANTEL CETIS 007', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('67', '7', 'PLANTEL CETIS 008', 't', '16');
INSERT INTO "public"."cat_plantel" VALUES ('68', '7', 'PLANTEL CETIS 009', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('69', '7', 'PLANTEL CETIS 010', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('70', '7', 'PLANTEL CETIS 011', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('71', '7', 'PLANTEL CETIS 013', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('72', '7', 'PLANTEL CETIS 029', 't', '4');
INSERT INTO "public"."cat_plantel" VALUES ('73', '7', 'PLANTEL CETIS 030', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('74', '7', 'PLANTEL CETIS 031', 't', '6');
INSERT INTO "public"."cat_plantel" VALUES ('75', '7', 'PLANTEL CETIS 032', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('76', '7', 'PLANTEL CETIS 033', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('77', '7', 'PLANTEL CETIS 039', 't', '13');
INSERT INTO "public"."cat_plantel" VALUES ('79', '7', 'PLANTEL CETIS 049', 't', '13');
INSERT INTO "public"."cat_plantel" VALUES ('80', '7', 'PLANTEL CETIS 050', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('81', '7', 'PLANTEL CETIS 051', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('82', '7', 'PLANTEL CETIS 052', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('83', '7', 'PLANTEL CETIS 053', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('84', '7', 'PLANTEL CETIS 054', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('85', '7', 'PLANTEL CETIS 055', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('86', '7', 'PLANTEL CETIS 056', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('87', '7', 'PLANTEL CETIS 057', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('88', '7', 'PLANTEL CETIS 076', 't', '6');
INSERT INTO "public"."cat_plantel" VALUES ('89', '7', 'PLANTEL CETIS 152', 't', '16');
INSERT INTO "public"."cat_plantel" VALUES ('90', '7', 'PLANTEL CETIS 153', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('91', '7', 'PLANTEL CETIS 154', 't', '12');
INSERT INTO "public"."cat_plantel" VALUES ('92', '7', 'PLANTEL CETIS 166', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('93', '7', 'PLANTEL CETIS 167', 't', '9');
INSERT INTO "public"."cat_plantel" VALUES ('94', '8', 'PLANTEL AEROPUERTO', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('95', '8', 'PLANTEL ALVARO OBREGON I', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('96', '8', 'PLANTEL ALVARO OBREGON II', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('97', '8', 'PLANTEL ARAGON', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('98', '8', 'PLANTEL AZCAPOTZALCO', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('99', '8', 'PLANTEL AZTAHUACAN', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('100', '8', 'PLANTEL COYOACAN', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('101', '8', 'PLANTEL GUSTAVO A. MADERO I', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('102', '8', 'PLANTEL GUSTAVO A. MADERO II', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('103', '8', 'PLANTEL IZTACALCO I', 't', '6');
INSERT INTO "public"."cat_plantel" VALUES ('104', '8', 'PLANTEL IZTAPALAPA I', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('105', '8', 'PLANTEL IZTAPALAPA II', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('106', '8', 'PLANTEL IZTAPALAPA III', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('107', '8', 'PLANTEL IZTAPALAPA IV', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('108', '8', 'PLANTEL IZTAPALAPA V', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('109', '8', 'PLANTEL MAGDALENA CONTRERAS (PLAMACO)', 't', '8');
INSERT INTO "public"."cat_plantel" VALUES ('110', '8', 'PLANTEL CENTRO MEXICO CANADA', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('111', '8', 'PLANTEL MILPA ALTA', 't', '9');
INSERT INTO "public"."cat_plantel" VALUES ('112', '8', 'PLANTEL SANTA FE', 't', '4');
INSERT INTO "public"."cat_plantel" VALUES ('113', '8', 'PLANTEL COMERCIO Y FOMENTO INDUSTRIAL', 't', '8');
INSERT INTO "public"."cat_plantel" VALUES ('114', '8', 'PLANTEL JOSE ANTONIO PADILLA SEGURA III (TICOMAN)', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('115', '8', 'PLANTEL TLAHUAC', 't', '11');
INSERT INTO "public"."cat_plantel" VALUES ('116', '8', 'PLANTEL TLALPAN I', 't', '12');
INSERT INTO "public"."cat_plantel" VALUES ('117', '8', 'PLANTEL TLALPAN II', 't', '12');
INSERT INTO "public"."cat_plantel" VALUES ('118', '8', 'PLANTEL VENUSTIANO CARRANZA I', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('119', '8', 'PLANTEL VENUSTIANO CARRANZA II', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('120', '8', 'PLANTEL XOCHIMILCO', 't', '13');
INSERT INTO "public"."cat_plantel" VALUES ('121', '10', 'BACHILLERATO A DISTANCIA GDF', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('123', '6', 'PLANTEL 18 - TLILHUACA AZCAPOTZALCO', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('124', '6', 'PLANTEL 20 - DEL VALLE', 't', '14');
INSERT INTO "public"."cat_plantel" VALUES ('125', '3', 'CEC Y T NO 15 - DIODORO ANTUNEZ ECHEGARAY', 't', '9');
INSERT INTO "public"."cat_plantel" VALUES ('126', '3', 'CET NO.    1  W. C. BUCHANAN', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('127', '6', 'PLANTEL 11 - NUEVA ATZACOALCO', 't', '5');
INSERT INTO "public"."cat_plantel" VALUES ('128', '7', 'PLANTEL CETIS 042', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('129', '12', 'CEDART LUIS SPOTA SAAVEDRA', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('130', '12', 'CEDART DIEGO RIVERA', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('131', '4', 'PLANTEL VENUSTIANO CARRANZA JOSE REVUELTAS SANCHEZ', 't', '17');
INSERT INTO "public"."cat_plantel" VALUES ('132', '12', 'CEDART FRIDA KAHLO', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('133', '12', 'ESCUELA NACIONAL DE DANZA CONTEMPORANEA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('134', '12', 'ACADEMIA DE DANZA MEXICANA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('135', '12', 'ESCUELA NACIONAL DE DANZA FOLKLORICA', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('136', '13', 'PREPA ABIERTA', 't', '3');
INSERT INTO "public"."cat_plantel" VALUES ('137', '14', 'CENTRO NACIONAL DE DESARROLLO DE TALENTOS DEPORTIVOS Y ALTO RENDIMIENTO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('139', '2', 'CCH-PLANTEL NAUCALPAN', 'f', '0');
INSERT INTO "public"."cat_plantel" VALUES ('150', '17', 'INSTITUTO TECNOLOGICO FEDERAL DE MILPA ALTA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('151', '17', 'INSTITUTO TECNOLOGICO FEDERAL DE TLAHUAC', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('152', '16', 'AZCAPOTZALCO', 't', '2');
INSERT INTO "public"."cat_plantel" VALUES ('153', '16', 'IZTAPALAPA', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('154', '16', 'XOCHIMILCO', 't', '13');
INSERT INTO "public"."cat_plantel" VALUES ('155', '16', 'CUAJIMALPA', 't', '4');
INSERT INTO "public"."cat_plantel" VALUES ('157', '3', 'CICS MILPA ALTA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('158', '3', 'CICS SANTO TOMAS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('160', '3', 'ENCB', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('161', '3', 'ENMH', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('162', '3', 'ESCA SANTO TOMAS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('163', '3', 'ESCA TEPEPAN', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('164', '3', 'ESCOM', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('165', '3', 'ESE', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('166', '3', 'ESEO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('167', '3', 'ESFM', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('169', '3', 'ESIA TICOMAN', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('171', '3', 'ESIA ZACATENCO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('172', '3', 'ESIME AZCAPOTZALCO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('173', '3', 'ESIME CULHUACAN', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('175', '3', 'ESIME TICOMAN', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('176', '3', 'ESIME ZACATENCO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('177', '3', 'ESIQIE', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('178', '3', 'ESIT', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('179', '3', 'ESM', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('180', '3', 'EST', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('181', '3', 'UPIBI', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('182', '3', 'UPIICSA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('183', '3', 'UPIITA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('184', '15', 'CENTRO ALTA TECNOLOGIA Y EDUCACION A DISTANCIA TLAXCALA', 'f', '0');
INSERT INTO "public"."cat_plantel" VALUES ('185', '15', 'CENTRO DE FISICA APLICADA Y TECNOLOGIA AVANZADA', 'f', '0');
INSERT INTO "public"."cat_plantel" VALUES ('186', '15', 'CENTRO DE INVESTIGACIONES EN ECOSISTEMAS', 'f', '0');
INSERT INTO "public"."cat_plantel" VALUES ('187', '15', 'CENTRO PENINSULAR EN HUMANIDADES Y CIENCIAS SOCIALES', 'f', '0');
INSERT INTO "public"."cat_plantel" VALUES ('188', '15', 'ESCUELA NACIONAL DE ARTES PLASTICAS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('189', '15', 'ESCUELA NACIONAL DE ENFERMERIA Y OBSTETRICIA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('190', '15', 'ESCUELA NACIONAL DE MUSICA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('191', '15', 'ESCUELA NACIONAL DE TRABAJO SOCIAL', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('192', '15', 'FACULTAD DE ARQUITECTURA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('193', '15', 'FACULTAD DE CIENCIAS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('194', '15', 'FACULTAD DE CIENCIAS POLITICAS Y SOCIALES', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('195', '15', 'FACULTAD DE CONTADURIA Y ADMINISTRACION', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('196', '15', 'FACULTAD DE DERECHO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('197', '15', 'FACULTAD DE ECONOMIA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('198', '15', 'FACULTAD DE ESTUDIOS SUPERIORES - ACATLAN', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('199', '15', 'FACULTAD DE ESTUDIOS SUPERIORES - ARAGON', 'f', '0');
INSERT INTO "public"."cat_plantel" VALUES ('200', '15', 'FACULTAD DE ESTUDIOS SUPERIORES - CUAUTITLAN', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('201', '15', 'FACULTAD DE ESTUDIOS SUPERIORES - IZTACALA', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('202', '15', 'FACULTAD DE ESTUDIOS SUPERIORES - ZARAGOZA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('203', '15', 'FACULTAD DE FILOSOFIA Y LETRAS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('204', '15', 'FACULTAD DE INGENIERIA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('205', '15', 'FACULTAD DE MEDICINA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('206', '15', 'FACULTAD DE MEDICINA VETERINARIA Y ZOOTECNIA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('207', '15', 'FACULTAD DE ODONTOLOGIA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('208', '15', 'FACULTAD DE PSICOLOGIA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('209', '15', 'FACULTAD DE QUIMICA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('210', '15', 'INSTITUTO DE BIOTECNOLOGIA', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('211', '17', 'INSTITUTO TECNOLOGICO FEDERAL DE IZTAPALAPA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('216', '15', 'INSTITUTO DE INVESTIGACIONES BIOMÉDICAS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('217', '19', 'PLANTEL CASA LIBERTAD (IZTAPALAPA)', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('218', '19', 'PLANTEL CENTRO HISTÓRICO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('219', '19', 'PLANTEL CUAUTEPEC', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('220', '19', 'PLANTEL DEL VALLE ', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('221', '19', 'PLANTEL SAN LORENZO TEZONCO', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('222', '20', 'CENTRO DE ESTUDIOS INTERNACIONALES', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('223', '21', 'ESCUELA NACIONAL DE ANTROPOLOGÍA E HISTORIA ', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('224', '21', 'ESCUELA NACIONAL DE CONSERVACIÓN, RESTAURACIÓN Y MUSEOGRAFÍA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('225', '22', 'UNIDAD AJUSCO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('227', '17', 'INSTITUTO TECNOLOGICO FEDERAL GUSTAVO A. MADERO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('228', '17', 'INSTITUTO TECNOLOGICO FEDERAL IZTAPALAPA II', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('229', '17', 'INSTITUTO TECNOLOGICO FEDERAL IZTAPALAPA III', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('230', '12', 'ESCUELA NACIONAL DE PINTURA, ESCULTURA Y GRABADO "LA ESMERALDA"', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('231', '12', 'ESCUELA DE DISEÑO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('232', '12', 'ACADEMIA DE LA DANZA MEXICANA', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('233', '12', 'ESCUELA NACIONAL DE DANZA CLÁSICA Y CONTEMPORÁNEA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('234', '12', 'ESCUELA NACIONAL DE DANZA FOLKLÓRICA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('235', '12', 'ESCUELA NACIONAL DE DANZA "NELLIE Y GLORIA CAMPOBELLO"', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('236', '12', 'ESCUELA SUPERIOR DE MÚSICA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('237', '12', 'CONSERVATORIO NACIONAL DE MÚSICA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('238', '12', 'ESCUELA DE LAUDERÍA', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('239', '12', 'ESCUELA NACIONAL DE ARTE TEATRAL', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('240', '24', 'ESCUELA NACIONAL DE BIBLIOTECONOMÍA Y ARCHIVONOMÍA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('241', '25', 'ESCUELA SUPERIOR DE EDUCACION FISICA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('242', '26', 'ESCUELA NORMAL SUPERIOR DE MEXICO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('243', '27', 'PLANTEL GUSTAVO E. CAMPA', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('244', '17', 'INSTITUTO TECNOLOGICO DE TLAHUAC II', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('245', '17', 'INSTITUTO TECNOLOGICO DE TLAHUAC III', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('246', '28', 'BENEMERITA ESCUELA NACIONAL DE MAESTROS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('247', '4', 'PLANTEL IZTAPALAPA 3', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('248', '29', 'ESCUELA NORMAL DE ESPECIALIZACIÓN DEL DF', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('249', '30', 'ESCUELA DE ENFERMERÍA DE LA SECRETARÍA DE SALUD DEL DISTRITO FEDERAL', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('250', '31', 'ESCUELA DE ENFERMERIA DEL SIGLO XXI', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('251', '32', 'ESCUELA NACIONAL DE ENTRENADORES DEPORTIVOS', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('252', '33', 'ESCUELA SUPERIOR DE REHABILITACIÓN', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('257', '34', 'UNIVERSIDAD ABIERTA Y A DISTANCIA DE MÉXICO', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('258', '17', 'INSTITUTO TECNOLOGICO ALVARO OBREGON', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('259', '17', 'INSTITUTO TECNOLOGICO DE TLALPAN', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('260', '17', 'INSTITUTO TECNOLOGICO FEDERAL DE MILPA ALTA II', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('261', '17', 'INSTITUTO TECNOLOGICO ALVARO OBREGON I', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('262', '4', 'PLANTEL IZTAPALAPA 4', 't', '7');
INSERT INTO "public"."cat_plantel" VALUES ('263', '4', 'PLANTEL ALVARO OBREGON 2 VASCO DE QUIROGA', 't', '10');
INSERT INTO "public"."cat_plantel" VALUES ('264', '10', 'BACHILLERATO DIGITAL DE LA CIUDAD DE MEXICO', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('265', '10', 'JOSE GUADALUPE POSADA', 't', '15');
INSERT INTO "public"."cat_plantel" VALUES ('266', '17', 'INSTITUTO TECNOLOGICO FEDERAL GUSTAVO A. MADERO II', 't', '18');
INSERT INTO "public"."cat_plantel" VALUES ('267', '35', 'ESCUELA NACIONAL PARA MAESTRAS DE JARDINES DE NIÑOS', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('268', '21', 'ESCUELA NACIONAL DE ATROPOLOGIA E HISTORIA', 'f', '18');
INSERT INTO "public"."cat_plantel" VALUES ('269', '36', 'CENTRO MULTIMODAL DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS DEL MAR Y AGUAS CONTINENTALES', 't', '6');

-- ----------------------------
-- Table structure for cat_tipo_actividad
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_tipo_actividad";
CREATE TABLE "public"."cat_tipo_actividad" (
"id_tipo_actividad" int4 DEFAULT nextval('tipo_actividad_id_tipo_actividad_seq'::regclass) NOT NULL,
"tipo_actividad" varchar(100) COLLATE "default",
"activo" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_tipo_actividad
-- ----------------------------
INSERT INTO "public"."cat_tipo_actividad" VALUES ('1', 'Actividades Culturales', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('2', 'Activación Física y Zumba', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('3', 'Actividad en Plantel', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('4', 'Cine Club Prepa Sí', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('5', 'Círculos de Lectura ', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('6', 'Educación Medioambiental', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('7', 'Emprendedores Prepa Sí', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('8', 'Encuentro Intergeneracional', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('9', 'Entrega de condones', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('10', 'Eventos Especiales', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('11', 'Feria de Ciencias', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('12', 'Ferias de Salud', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('13', 'Huertos Urbanos', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('14', 'Juegos Recreativos', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('15', 'Módulo Informativo', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('16', 'Paseo Ciclista Prepa Sí', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('17', 'Pláticas, Talleres y Conferencias', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('18', 'Proyectos científicos y Club de ciencias', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('19', 'Reduce, Recicla, Reusa', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('20', 'Retas Deportivas', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('21', 'Reuniones Organizativas', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('22', 'Salud Sexual y Reproductiva', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('23', 'Teatro Prepa Sí', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('24', 'Trueque Prepa Sí', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('25', 'Visitas a Museos', 't');
INSERT INTO "public"."cat_tipo_actividad" VALUES ('26', 'Andar bici 3', 't');

-- ----------------------------
-- Table structure for cat_zona
-- ----------------------------
DROP TABLE IF EXISTS "public"."cat_zona";
CREATE TABLE "public"."cat_zona" (
"id_zona" numeric(10) NOT NULL,
"zona" varchar(100) COLLATE "default",
"activo" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cat_zona
-- ----------------------------
INSERT INTO "public"."cat_zona" VALUES ('1', 'Zona Norte', 't');
INSERT INTO "public"."cat_zona" VALUES ('2', 'Zona Sur', 't');

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS "public"."ci_sessions";
CREATE TABLE "public"."ci_sessions" (
"session_id" varchar(32) COLLATE "default" DEFAULT ''::character varying NOT NULL,
"user_agent" varchar(255) COLLATE "default" DEFAULT NULL::character varying,
"ip_address" varchar(20) COLLATE "default" DEFAULT NULL::character varying,
"last_activity" int8,
"user_data" text COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO "public"."ci_sessions" VALUES ('a5e1f945f0b9a2a9c72d41cde1994528', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', '::1', '1449620984', '');

-- ----------------------------
-- Table structure for evento
-- ----------------------------
DROP TABLE IF EXISTS "public"."evento";
CREATE TABLE "public"."evento" (
"id_evento" int8 DEFAULT nextval('evento_id_evento_seq'::regclass) NOT NULL,
"id_tipo_evento" int4,
"id_eje" int4,
"descripcion" text COLLATE "default",
"id_coordinacion" int4,
"id_tipo_lugar" int4,
"id_lugar" int4,
"fecha_inicio" timestamp(6),
"fecha_fin" date,
"horario" time(6),
"num_horas" int4,
"no_asistentes" int4,
"no_coordinadores" int4,
"no_promotores" int4,
"fecha_registro" timestamp(6) DEFAULT now(),
"id_usuario_registra" int4,
"fecha_modificacion" timestamp(6),
"id_usuario_modifica" int4,
"latitud" float8,
"longitud" float8,
"activo" bool,
"id_delegacion" int2,
"id_responsable" numeric(10),
"id_seriada" numeric(2),
"id_actividad" numeric(16)
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of evento
-- ----------------------------
INSERT INTO "public"."evento" VALUES ('20', '1', '2', 'evento bju', '18', '1', '264', '2015-12-01 00:00:00', '2015-12-01', '10:00:00', '7', '12', '12', '12', '2015-12-08 18:18:38.804', '3', null, null, '19.4326077', '-99.133208', 't', '14', '4', '2', '4');
INSERT INTO "public"."evento" VALUES ('21', '1', '3', 'evento 2 bju', '16', '1', '66', '2015-12-09 00:00:00', '2015-12-04', '13:00:00', '1', '12', '12', '12', '2015-12-08 18:19:41.785', '3', null, null, '42.7935917', '-71.0378909', 't', '14', '4', '2', '12');
INSERT INTO "public"."evento" VALUES ('22', '1', '3', 'evento xoc', '61', '3', '35', '2015-12-03 00:00:00', '2015-12-03', '11:00:00', '2', '10', '12', '12', '2015-12-08 18:21:04.296', '3', null, null, '19.4325715293901', '-99.1331831693115', 't', '13', '2', '2', '14');

-- ----------------------------
-- Table structure for involucrados
-- ----------------------------
DROP TABLE IF EXISTS "public"."involucrados";
CREATE TABLE "public"."involucrados" (
"id_evento" int4,
"id_delegacion" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of involucrados
-- ----------------------------

-- ----------------------------
-- Table structure for logistica
-- ----------------------------
DROP TABLE IF EXISTS "public"."logistica";
CREATE TABLE "public"."logistica" (
"id_logistica" int4 DEFAULT nextval('logistica_id_logistica_seq'::regclass) NOT NULL,
"logistica" varchar(200) COLLATE "default",
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of logistica
-- ----------------------------
INSERT INTO "public"."logistica" VALUES ('1', 'Aguas', 't');
INSERT INTO "public"."logistica" VALUES ('2', 'Ajedrez', 't');
INSERT INTO "public"."logistica" VALUES ('3', 'Arte circense (hula hula, cuerda, bolos, etc.)', 't');
INSERT INTO "public"."logistica" VALUES ('4', 'Artículos de pintura (botes, aerosol, brochas, pinceles)', 't');
INSERT INTO "public"."logistica" VALUES ('5', 'Atril-Trípode', 't');
INSERT INTO "public"."logistica" VALUES ('6', 'Autobús', 't');
INSERT INTO "public"."logistica" VALUES ('7', 'Backline', 't');
INSERT INTO "public"."logistica" VALUES ('8', 'Balones (fútbol, básquetbol, vóleibol, tenis, frontón) ', 't');
INSERT INTO "public"."logistica" VALUES ('9', 'Bicicletas', 't');
INSERT INTO "public"."logistica" VALUES ('10', 'Bloqueador solar', 't');
INSERT INTO "public"."logistica" VALUES ('11', 'Bocinas', 't');
INSERT INTO "public"."logistica" VALUES ('12', 'Bomba de aire', 't');
INSERT INTO "public"."logistica" VALUES ('13', 'Box lunch', 't');
INSERT INTO "public"."logistica" VALUES ('14', 'Carpa (abierta o cerrada)', 't');
INSERT INTO "public"."logistica" VALUES ('15', 'Casacas', 't');
INSERT INTO "public"."logistica" VALUES ('16', 'Coffee break', 't');
INSERT INTO "public"."logistica" VALUES ('17', 'Conos de entrenamiento', 't');
INSERT INTO "public"."logistica" VALUES ('18', 'Consola', 't');
INSERT INTO "public"."logistica" VALUES ('19', 'Equipo de audio', 't');
INSERT INTO "public"."logistica" VALUES ('20', 'Extensión ', 't');
INSERT INTO "public"."logistica" VALUES ('21', 'Juegos de mesa (cartas, jenga, uno, lotería, monopoli, etc.)', 't');
INSERT INTO "public"."logistica" VALUES ('22', 'Laptop', 't');
INSERT INTO "public"."logistica" VALUES ('23', 'Lona', 't');
INSERT INTO "public"."logistica" VALUES ('24', 'Mamparas', 't');
INSERT INTO "public"."logistica" VALUES ('25', 'Medallas/trofeos', 't');
INSERT INTO "public"."logistica" VALUES ('26', 'Mesas/tablones', 't');
INSERT INTO "public"."logistica" VALUES ('27', 'Micrófonos', 't');
INSERT INTO "public"."logistica" VALUES ('28', 'Pantalla', 't');
INSERT INTO "public"."logistica" VALUES ('29', 'Patines', 't');
INSERT INTO "public"."logistica" VALUES ('30', 'Planta de luz', 't');
INSERT INTO "public"."logistica" VALUES ('31', 'Playeras Prepa Sí', 't');
INSERT INTO "public"."logistica" VALUES ('32', 'Pódium', 't');
INSERT INTO "public"."logistica" VALUES ('33', 'Proyector audiovisual', 't');
INSERT INTO "public"."logistica" VALUES ('34', 'Recursos de papelería (lápices, plumas, plumones, colores, cuadernos, papelografos, blocks, etc.)', 't');
INSERT INTO "public"."logistica" VALUES ('35', 'Sillas', 't');
INSERT INTO "public"."logistica" VALUES ('36', 'Templete/Tarima', 't');

-- ----------------------------
-- Table structure for logistica_x_evento
-- ----------------------------
DROP TABLE IF EXISTS "public"."logistica_x_evento";
CREATE TABLE "public"."logistica_x_evento" (
"id_evento" int4,
"id_logistica" int4,
"cantidad" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of logistica_x_evento
-- ----------------------------
INSERT INTO "public"."logistica_x_evento" VALUES ('20', '16', '100');
INSERT INTO "public"."logistica_x_evento" VALUES ('21', '10', '1');
INSERT INTO "public"."logistica_x_evento" VALUES ('22', '13', '122');

-- ----------------------------
-- Table structure for resultado
-- ----------------------------
DROP TABLE IF EXISTS "public"."resultado";
CREATE TABLE "public"."resultado" (
"id_resultado" int8 DEFAULT nextval('resultado_id_resultado_seq'::regclass) NOT NULL,
"id_evento" int4,
"id_delegacion" int4,
"id_usuario" int4,
"no_asistentes" int4,
"no_coordinadores" int4,
"no_promotores" int4,
"no_validado" int4,
"activo" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of resultado
-- ----------------------------

-- ----------------------------
-- Table structure for seriada
-- ----------------------------
DROP TABLE IF EXISTS "public"."seriada";
CREATE TABLE "public"."seriada" (
"id_seriada" numeric(2) NOT NULL,
"seriada" varchar(2) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of seriada
-- ----------------------------
INSERT INTO "public"."seriada" VALUES ('1', 'Si');
INSERT INTO "public"."seriada" VALUES ('2', 'No');

-- ----------------------------
-- Table structure for tipo_act
-- ----------------------------
DROP TABLE IF EXISTS "public"."tipo_act";
CREATE TABLE "public"."tipo_act" (
"id_tipo_actividad" int4 DEFAULT nextval('tipo_act_id_tipo_actividad_seq'::regclass) NOT NULL,
"tipo_actividad" varchar(100) COLLATE "default",
"activo" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of tipo_act
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_actividad
-- ----------------------------
DROP TABLE IF EXISTS "public"."tipo_actividad";
CREATE TABLE "public"."tipo_actividad" (
"id_tipo_actividad" int4 DEFAULT nextval('tipo_actividad_id_tipo_actividad_seq'::regclass) NOT NULL,
"tipo_actividad" varchar(100) COLLATE "default",
"activo" bool
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of tipo_actividad
-- ----------------------------
INSERT INTO "public"."tipo_actividad" VALUES ('1', 'Actividades Culturales', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('2', 'Activación Física y Zumba', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('3', 'Actividad en Plantel', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('4', 'Cine Club Prepa Sí', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('5', 'Círculos de Lectura ', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('6', 'Educación Medioambiental', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('7', 'Emprendedores Prepa Sí', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('8', 'Encuentro Intergeneracional', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('9', 'Entrega de condones', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('10', 'Eventos Especiales', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('11', 'Feria de Ciencias', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('12', 'Ferias de Salud', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('13', 'Huertos Urbanos', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('14', 'Juegos Recreativos', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('15', 'Módulo Informativo', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('16', 'Paseo Ciclista Prepa Sí', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('17', 'Pláticas, Talleres y Conferencias', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('18', 'Proyectos científicos y Club de ciencias', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('19', 'Reduce, Recicla, Reusa', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('20', 'Retas Deportivas', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('21', 'Reuniones Organizativas', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('22', 'Salud Sexual y Reproductiva', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('23', 'Teatro Prepa Sí', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('24', 'Trueque Prepa Sí', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('25', 'Visitas a Museos', 't');
INSERT INTO "public"."tipo_actividad" VALUES ('26', 'Andar bici', 't');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS "public"."usuario";
CREATE TABLE "public"."usuario" (
"id_usuario" int4 DEFAULT nextval('usuario_id_usuario_seq'::regclass) NOT NULL,
"nombre" varchar(50) COLLATE "default",
"paterno" varchar(50) COLLATE "default",
"materno" varchar(50) COLLATE "default",
"usuario" varchar(50) COLLATE "default",
"password" varchar(50) COLLATE "default",
"email" varchar(250) COLLATE "default",
"id_delegacion" int2,
"id_perfil" int2,
"activo" bool DEFAULT true
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO "public"."usuario" VALUES ('1', 'Administrador', 'del', 'Sistema', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'nsanchezma@df.gob.mx', '0', '1', 't');
INSERT INTO "public"."usuario" VALUES ('2', 'Nazareth', 'Sánchez', 'Martínez', 'nsanchezm', '363f9b03b8b9701de6dee5994c1b1822', 'ing.naz@gmail.com', '13', '2', 't');
INSERT INTO "public"."usuario" VALUES ('3', 'Director', 'de', 'Zona Norte', 'director', '3d4e992d8d8a7d848724aa26ed7f4176', 'nazareth.sanchez.fidegar@gmail.com', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('4', 'cony', 'jaramillo', 'montalvan', 'icony', 'c628078c6689b3f92cc5f0a0abc770fb', 'icony@gmail.com', '14', '2', 't');
INSERT INTO "public"."usuario" VALUES ('5', 'Alfredo', 'Dominguez', 'Marrufo', 'ce.prebu', 'fb6f13b31bc4e8e829346daa2b3c1853', 'alfredo.dominguez@fideicomisoed.df.gob.mx', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('6', 'Mariana Perla', 'Rojas', 'Martínez', 'dc.prebu', 'e60404a5e8f2c164e2a27ffeabfd7f27', 'perladumas@gmail.com', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('7', 'César', 'Martínez', 'Alvarez', 'dzs.prebu', 'e71d46b99b71dd6b827e00d0d8edc27c', 'cesar.martinez@fideicomisoed.df.gob.mx', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('8', 'Rosalia', 'Tostado', 'Benítez', 'dzn.prebu', 'b290a731ef2b69a5e9a56652d33e9765', 'rosalia.tostado@fideicomisoed.df.gob.mx', '0', '3', 't');
INSERT INTO "public"."usuario" VALUES ('9', 'Raymundo', 'Velázquez', 'Gutiérrez', 'tlp.dzs', '75560e2f2fcfe683a95b24f118c77a79', 'raycriapin21@hotmail.com', '12', '2', 't');
INSERT INTO "public"."usuario" VALUES ('10', 'Oscar', 'Valverde', 'Galicia', 'tlh.dzs', '025d677e952a4d0275261f664720c88a', 'zonasur_valverde@hotmail.com', '11', '2', 't');
INSERT INTO "public"."usuario" VALUES ('11', 'Diana', 'Valverde', 'Alvarado', 'xoc.dzs', 'ca69cbd9100bbc7ae64de587d1f7c3d3', 'dianavalverde04@yahoo.com.mx', '13', '2', 't');
INSERT INTO "public"."usuario" VALUES ('12', 'Leticia', 'González', 'Monroy', 'mil.dzs', '393f38459e97459d9725dc594b1918ea', 'letymonrro@hotmail.com', '9', '2', 't');
INSERT INTO "public"."usuario" VALUES ('13', 'Juan Carlos', 'Ávila', 'Carrizal', 'izp.dzs', 'bcab3aeb14d3b3f0571589ebbe1b357e', 'enlaceiztapalapasi@gmail.com', '7', '2', 't');
INSERT INTO "public"."usuario" VALUES ('14', 'Reyna', 'Brito', 'Franco', 'aob.dzs', '048ea4c2c4f43f6ec0aa3716d7956aa6', 'zona18prepasi@gmail.com', '10', '2', 't');
INSERT INTO "public"."usuario" VALUES ('15', 'Maricarmen', 'García', 'Tovar', 'mac.dzs', '01b79d6fee2d755f63e072601e718926', 'reynabrito@gmail.com', '8', '2', 't');
INSERT INTO "public"."usuario" VALUES ('16', 'Edgar', 'López', 'Arreola', 'cuj.dzs', 'c6cf55e4b557524559f33207d16b3196', 'cee10@outlook.com', '4', '2', 't');
INSERT INTO "public"."usuario" VALUES ('17', 'Leticia', 'Casiano', 'Cedillo', 'azc.dzn', '27375d5e242790261f8a1dd15be2417d', 'prepasiazcapo@gmail.com', '2', '2', 't');
INSERT INTO "public"."usuario" VALUES ('18', 'Cristina', 'García', 'Hernández', 'coy.dzn', '507cfe195084108194827c5c0ca87ea7', 'cristina.prepasi@gmail.com', '3', '2', 't');
INSERT INTO "public"."usuario" VALUES ('19', 'Felipe', 'Delgado', 'Cruz', 'cuh.dzn', 'f24010b335b901d59c169fb77a132c69', 'pumas_fe@hotmail.com', '15', '2', 't');
INSERT INTO "public"."usuario" VALUES ('20', 'Argel', 'Zarza', 'Aguilar', 'gam.dzn', 'b7c5c72f6801e70e3794331aca0e72cb', 'perrufo74@gmail.com', '5', '2', 't');
INSERT INTO "public"."usuario" VALUES ('21', 'Yessica', 'Hernández', 'Pompeyo', 'izt.dzn', 'e7c0da5cc654fedb968fc3ab78d45712', 'yesicahernandezpompeyo@yahoo.com.mx', '6', '2', 't');
INSERT INTO "public"."usuario" VALUES ('22', 'Gonzalo', 'González', 'Escobar', 'mhi.dzn', 'cde03f57984eb8c66ebd83c7bae6bc6c', 'gonzalo.alberto@hotmail.com', '16', '2', 't');
INSERT INTO "public"."usuario" VALUES ('23', 'Wendy Concepción', 'Flores', 'Samper', 'vca.dzn', '7a32bea49b90a21067767d52ecd1ebf6', 'wfsprebu@gmail.com', '17', '2', 't');
INSERT INTO "public"."usuario" VALUES ('24', 'Rosa Emma', 'Noches', 'Guzmán', 'uni.prebu', 'a158a620de1185a8e754092f862b3fe9', 'emmanoches@gmail.com', '18', '2', 't');
INSERT INTO "public"."usuario" VALUES ('25', 'BJU', 'Benito', 'Juarez', 'bju.dzn', '4ab6a236939baf14b3d520bf19daeee4', 'bju@gmail.com', '14', '2', 't');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "public"."archivo_id_archivo_seq" OWNED BY "archivo"."id_archivo";
ALTER SEQUENCE "public"."bitacora_accesos_id_bitacora_seq" OWNED BY "bitacora_accesos"."id_bitacora";
ALTER SEQUENCE "public"."cat_coordinacion_id_coordinacion_seq" OWNED BY "cat_coordinacion"."id_coordinacion";
ALTER SEQUENCE "public"."cat_eje_id_eje_seq" OWNED BY "cat_eje"."id_eje";
ALTER SEQUENCE "public"."cat_escuelasadultosm_id_escuela_adulto_seq" OWNED BY "cat_escuelasadultosm"."id_escuela_adulto";
ALTER SEQUENCE "public"."cat_espacio_publico_id_espacio_publico_seq" OWNED BY "cat_espacio_publico"."id_espacio_publico";
ALTER SEQUENCE "public"."cat_institucion_id_institucion_seq" OWNED BY "cat_institucion"."id_institucion";
ALTER SEQUENCE "public"."cat_museos_id_museo_seq" OWNED BY "cat_museos"."id_museo";
ALTER SEQUENCE "public"."cat_nivel_id_nivel_seq" OWNED BY "cat_nivel"."id_nivel";
ALTER SEQUENCE "public"."cat_perfil_id_perfil_seq" OWNED BY "cat_perfil"."id_perfil";
ALTER SEQUENCE "public"."cat_plantel_id_plantel_seq" OWNED BY "cat_plantel"."id_plantel";
ALTER SEQUENCE "public"."evento_id_evento_seq" OWNED BY "evento"."id_evento";
ALTER SEQUENCE "public"."logistica_id_logistica_seq" OWNED BY "logistica"."id_logistica";
ALTER SEQUENCE "public"."resultado_id_resultado_seq" OWNED BY "resultado"."id_resultado";
ALTER SEQUENCE "public"."tipo_act_id_tipo_actividad_seq" OWNED BY "tipo_act"."id_tipo_actividad";
ALTER SEQUENCE "public"."tipo_actividad_id_tipo_actividad_seq" OWNED BY "tipo_actividad"."id_tipo_actividad";
ALTER SEQUENCE "public"."usuario_id_usuario_seq" OWNED BY "usuario"."id_usuario";

-- ----------------------------
-- Primary Key structure for table archivo
-- ----------------------------
ALTER TABLE "public"."archivo" ADD PRIMARY KEY ("id_archivo");

-- ----------------------------
-- Primary Key structure for table bitacora_accesos
-- ----------------------------
ALTER TABLE "public"."bitacora_accesos" ADD PRIMARY KEY ("id_bitacora");

-- ----------------------------
-- Primary Key structure for table cat_coordinacion
-- ----------------------------
ALTER TABLE "public"."cat_coordinacion" ADD PRIMARY KEY ("id_coordinacion");

-- ----------------------------
-- Primary Key structure for table cat_delegacion
-- ----------------------------
ALTER TABLE "public"."cat_delegacion" ADD PRIMARY KEY ("id_delegacion");

-- ----------------------------
-- Primary Key structure for table cat_eje
-- ----------------------------
ALTER TABLE "public"."cat_eje" ADD PRIMARY KEY ("id_eje");

-- ----------------------------
-- Primary Key structure for table cat_escuelasadultosm
-- ----------------------------
ALTER TABLE "public"."cat_escuelasadultosm" ADD PRIMARY KEY ("id_escuela_adulto");

-- ----------------------------
-- Primary Key structure for table cat_espacio_publico
-- ----------------------------
ALTER TABLE "public"."cat_espacio_publico" ADD PRIMARY KEY ("id_espacio_publico");

-- ----------------------------
-- Primary Key structure for table cat_museos
-- ----------------------------
ALTER TABLE "public"."cat_museos" ADD PRIMARY KEY ("id_museo");

-- ----------------------------
-- Primary Key structure for table cat_nivel
-- ----------------------------
ALTER TABLE "public"."cat_nivel" ADD PRIMARY KEY ("id_nivel");

-- ----------------------------
-- Primary Key structure for table cat_perfil
-- ----------------------------
ALTER TABLE "public"."cat_perfil" ADD PRIMARY KEY ("id_perfil");

-- ----------------------------
-- Primary Key structure for table cat_plantel
-- ----------------------------
ALTER TABLE "public"."cat_plantel" ADD PRIMARY KEY ("id_plantel");

-- ----------------------------
-- Primary Key structure for table cat_zona
-- ----------------------------
ALTER TABLE "public"."cat_zona" ADD PRIMARY KEY ("id_zona");

-- ----------------------------
-- Primary Key structure for table ci_sessions
-- ----------------------------
ALTER TABLE "public"."ci_sessions" ADD PRIMARY KEY ("session_id");

-- ----------------------------
-- Primary Key structure for table evento
-- ----------------------------
ALTER TABLE "public"."evento" ADD PRIMARY KEY ("id_evento");

-- ----------------------------
-- Primary Key structure for table logistica
-- ----------------------------
ALTER TABLE "public"."logistica" ADD PRIMARY KEY ("id_logistica");

-- ----------------------------
-- Primary Key structure for table resultado
-- ----------------------------
ALTER TABLE "public"."resultado" ADD PRIMARY KEY ("id_resultado");

-- ----------------------------
-- Primary Key structure for table seriada
-- ----------------------------
ALTER TABLE "public"."seriada" ADD PRIMARY KEY ("id_seriada");

-- ----------------------------
-- Primary Key structure for table usuario
-- ----------------------------
ALTER TABLE "public"."usuario" ADD PRIMARY KEY ("id_usuario");
