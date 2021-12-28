#BEGIN AUTH

#begin tabla users

CREATE TABLE IF NOT EXISTS `users`
(
    `id`     int(11) NOT NULL,
    `user`   varchar(56)  DEFAULT NULL,
    `email`  varchar(100) DEFAULT NULL,
    `pass`   varchar(100) DEFAULT NULL,
    `status` int(11)      DEFAULT NULL,
    `range`  varchar(56)  DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `id` (`id`);

# ALTER TABLE `users`
#     MODIFY `dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

#end tabla users

#END AUTH


#begin tabla persona

CREATE TABLE IF NOT EXISTS `persona`
(
    `dni`              varchar(8) NOT NULL,
    `nombres`          varchar(56) DEFAULT NULL,
    `ape_pat`          varchar(56) DEFAULT NULL,
    `ape_mat`          varchar(56) DEFAULT NULL,
    `sexo`             int(11)     DEFAULT NULL,
    `fecha_nacimiento` date        DEFAULT NULL,
    `celular`          int(11)     DEFAULT NULL,
    `direccion`        varchar(56) DEFAULT NULL,
    `barrio`           int(11)     DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
    ADD PRIMARY KEY (`dni`),
    ADD UNIQUE KEY `dni` (`dni`);

# ALTER TABLE `persona`
#     MODIFY `dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

#end tabla persona

#begin tabla sexo

CREATE TABLE IF NOT EXISTS `sexo`
(
    `id_sexo` int(11) NOT NULL,
    `sexo`    varchar(10) DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
    ADD PRIMARY KEY (`id_sexo`),
    ADD UNIQUE KEY `id_sexo` (`id_sexo`);

ALTER TABLE `sexo`
    MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla sexo

#begin tabla estudiante

CREATE TABLE IF NOT EXISTS `estudiante`
(
    `dni_persona` varchar(8) NOT NULL,
    `institucion` int(11) DEFAULT NULL,
    `grado`       int(11) DEFAULT NULL,
    `seccion`     int(11) DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
    ADD PRIMARY KEY (`dni_persona`),
    ADD UNIQUE KEY `dni` (`dni_persona`);

# ALTER TABLE `estudiante`
#     MODIFY `dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

#end tabla estudiante


#begin tabla regestudiante

CREATE TABLE IF NOT EXISTS `regestudiante`
(
    `dni`              varchar(8) NOT NULL,
    `nombres`          varchar(56) DEFAULT NULL,
    `ape_pat`          varchar(56) DEFAULT NULL,
    `ape_mat`          varchar(56) DEFAULT NULL,
    `sexo`             int(11)     DEFAULT NULL,
    `fecha_nacimiento` date        DEFAULT NULL,
    `institucion`      int(11)     DEFAULT NULL,
    `grado`            int(11)     DEFAULT NULL,
    `seccion`          int(11)     DEFAULT NULL,
    `celular`          int(11)     DEFAULT NULL,
    `fecha_registro`   datetime   NOT NULL,
    `observations`     text        DEFAULT NULL,
    `dni_resp`         varchar(8) NOT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `regestudiante`
--
ALTER TABLE `regestudiante`
    ADD PRIMARY KEY (`dni`),
    ADD UNIQUE KEY `dni` (`dni`);

# ALTER TABLE `regestudiante`
#     MODIFY `dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

#end tabla regestudiante
#


#begin tabla regimayores

CREATE TABLE IF NOT EXISTS `regimayores`
(
    `dni`              varchar(8) NOT NULL,
    `nombres`          varchar(56) DEFAULT NULL,
    `ape_pat`          varchar(56) DEFAULT NULL,
    `ape_mat`          varchar(56) DEFAULT NULL,
    `sexo`             int(11)     DEFAULT NULL,
    `fecha_nacimiento` date        DEFAULT NULL,
    `direccion`        varchar(56) DEFAULT NULL,
    `barrio`           int(11)     DEFAULT NULL,
    `celular`          int(11)     DEFAULT NULL,
    `observations`     text        DEFAULT NULL,
    `fecha_registro`   datetime   NOT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `regimayores`
--
ALTER TABLE `regimayores`
    ADD PRIMARY KEY (`dni`),
    ADD UNIQUE KEY `dni` (`dni`);

# ALTER TABLE `regimayores`
#     MODIFY `dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

#end tabla regimayores
#

#begin tabla uploaddni

CREATE TABLE IF NOT EXISTS `uploaddni`
(
    `dni`            varchar(8) NOT NULL,
    `frontal`        varchar(255) DEFAULT NULL,
    `reverso`        varchar(255) DEFAULT NULL,
    `fecha_registro` datetime   NOT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `uploaddni`
--
ALTER TABLE `uploaddni`
    ADD PRIMARY KEY (`dni`),
    ADD UNIQUE KEY `dni` (`dni`);

# ALTER TABLE `uploaddni`
#     MODIFY `dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

#end tabla uploaddni
#


#
# #begin tabla responsable

CREATE TABLE IF NOT EXISTS `responsable`
(
    `id_resp`        int(11)    NOT NULL,
    `dni_resp`       varchar(8) NOT NULL,
    `nombres`        varchar(56) DEFAULT NULL,
    `ape_pat`        varchar(56) DEFAULT NULL,
    `ape_mat`        varchar(56) DEFAULT NULL,
    `direccion`      varchar(56) DEFAULT NULL,
    `barrio`         int(11)     DEFAULT NULL,
    `celular`        int(11)     DEFAULT NULL,
    `fecha_registro` datetime   NOT NULL,
    `observations`   text        DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
    ADD PRIMARY KEY (`id_resp`),
    ADD UNIQUE KEY `id_resp` (`id_resp`);

ALTER TABLE `responsable`
    MODIFY `id_resp` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla responsable


#begin tabla nivel

CREATE TABLE IF NOT EXISTS `nivel`
(
    `id_nivel` int(11) NOT NULL,
    `nivel`    varchar(56) DEFAULT NULL


) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
    ADD PRIMARY KEY (`id_nivel`),
    ADD UNIQUE KEY `id_nivel` (`id_nivel`);

ALTER TABLE `nivel`
    MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla nivel


#begin tabla institución

CREATE TABLE IF NOT EXISTS `institucion`
(
    `id_institucion` int(11) NOT NULL,
    `institucion`    varchar(56) DEFAULT NULL,
    `nivel`          int(11)     DEFAULT NULL,
    `distrito`       int(11)     DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
    ADD PRIMARY KEY (`id_institucion`),
    ADD UNIQUE KEY `id_institucion` (`id_institucion`);

ALTER TABLE `institucion`
    MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla institución


#begin tabla grado

CREATE TABLE IF NOT EXISTS `grado`
(
    `id_grado` int(11) NOT NULL,
    `grado`    varchar(15) DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
    ADD PRIMARY KEY (`id_grado`),
    ADD UNIQUE KEY `id_grado` (`id_grado`);

ALTER TABLE `grado`
    MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla grado

#begin tabla seccion

CREATE TABLE IF NOT EXISTS `seccion`
(
    `id_seccion` int(11) NOT NULL,
    `seccion`    varchar(8) DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
    ADD PRIMARY KEY (`id_seccion`),
    ADD UNIQUE KEY `id_seccion` (`id_seccion`);

ALTER TABLE `seccion`
    MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla seccion

#begin tabla barrio

CREATE TABLE IF NOT EXISTS `barrio`
(
    `id_barrio`    int(11) NOT NULL,
    `barrio`       varchar(56) DEFAULT NULL,
    `lugar`        varchar(56) DEFAULT NULL,
    `distrito`     int(11)     DEFAULT NULL,
    `provincia`    int(11)     DEFAULT NULL,
    `departamento` int(11)     DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
    ADD PRIMARY KEY (`id_barrio`),
    ADD UNIQUE KEY `id_barrio` (`id_barrio`);

ALTER TABLE `barrio`
    MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla barrio

#begin tabla inscripcion

CREATE TABLE IF NOT EXISTS `inscripcion`
(
    `id_inscripcion` int(11)    NOT NULL,
    `disciplina`     int(11) DEFAULT NULL,
    `fecha_registro` datetime   NOT NULL,
    `dni_estudiante` varchar(8) NOT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
    ADD PRIMARY KEY (`id_inscripcion`),
    ADD UNIQUE KEY `id_inscripcion` (`id_inscripcion`);

ALTER TABLE `inscripcion`
    MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla inscripcion


#begin tabla disciplina

CREATE TABLE IF NOT EXISTS `disciplina`
(
    `id_disciplina` int(11) NOT NULL,
    `disciplina`    varchar(86) DEFAULT NULL,
    `especialidad`  int(11)     DEFAULT NULL,
    `active`        boolean     DEFAULT NULL,
    `addressed`     boolean     DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `disciplina`
--
ALTER TABLE `disciplina`
    ADD PRIMARY KEY (`id_disciplina`),
    ADD UNIQUE KEY `id_disciplina` (`id_disciplina`);

ALTER TABLE `disciplina`
    MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla disciplina


#begin tabla especialidad

CREATE TABLE IF NOT EXISTS `especialidad`
(
    `id_especialidad` int(11) NOT NULL,
    `especialidad`    varchar(86) DEFAULT NULL,
    `escuela`         int(11)     DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
    ADD PRIMARY KEY (`id_especialidad`),
    ADD UNIQUE KEY `id_disciplina` (`id_especialidad`);

ALTER TABLE `especialidad`
    MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla disciplina

#begin tabla escuela_

CREATE TABLE IF NOT EXISTS `escuela`
(
    `id_escuela` int(11) NOT NULL,
    `escuela`    varchar(86) DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `escuela_`
--
ALTER TABLE `escuela`
    ADD PRIMARY KEY (`id_escuela`),
    ADD UNIQUE KEY `id_escuela` (`id_escuela`);

ALTER TABLE `escuela`
    MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla escuela_


#BLOG START

#begin tabla post

CREATE TABLE IF NOT EXISTS `post`
(
    `id_post`  int(11)  NOT NULL,
    `author`   int(11)       DEFAULT NULL,
    `title`    varchar(255)  DEFAULT NULL,
    `image`    varchar(500)  DEFAULT NULL,
    `content`  longtext      DEFAULT NULL,
    `summary`  varchar(1000) DEFAULT NULL,
    `date`     datetime NOT NULL,
    `category` int(11)       DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
    ADD PRIMARY KEY (`id_post`),
    ADD UNIQUE KEY `id_post` (`id_post`);

ALTER TABLE `post`
    MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla post


#begin tabla category

CREATE TABLE IF NOT EXISTS `category`
(
    `id_category` int(11) NOT NULL,
    `category`    varchar(255) DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id_category`),
    ADD UNIQUE KEY `id_category` (`id_category`);

ALTER TABLE `category`
    MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla category


#begin tabla view

CREATE TABLE IF NOT EXISTS `view`
(
    `id_view` int(11) NOT NULL,
    `count`   int(11) DEFAULT 0,
    `post`    int(11) DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `view`
--
ALTER TABLE `view`
    ADD PRIMARY KEY (`id_view`),
    ADD UNIQUE KEY `id_category` (`id_view`);

ALTER TABLE `view`
    MODIFY `id_view` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla view

#begin tabla comments

CREATE TABLE IF NOT EXISTS `comments`
(
    `id_comments` int(11)  NOT NULL,
    `comments`    tinytext DEFAULT NULL,
    `post`        int(11)  DEFAULT NULL,
    `date`        datetime NOT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `view`
--
ALTER TABLE `comments`
    ADD PRIMARY KEY (`id_comments`),
    ADD UNIQUE KEY `id_comments` (`id_comments`);

ALTER TABLE `comments`
    MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla comments


#BLOG END


#begin tabla poster_img

CREATE TABLE IF NOT EXISTS `poster_img`
(
    `id_poster_img` int(11)  NOT NULL,
    `poster_img`    varchar(100) DEFAULT NULL,
    `title`         varchar(180) DEFAULT NULL,
    `description`   varchar(255) DEFAULT NULL,
    `active`        boolean      DEFAULT NULL,
    `addressed`     boolean      DEFAULT NULL,
    `date`          datetime NOT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `view`
--
ALTER TABLE `poster_img`
    ADD PRIMARY KEY (`id_poster_img`),
    ADD UNIQUE KEY `id_poster_img` (`id_poster_img`);

ALTER TABLE `poster_img`
    MODIFY `id_poster_img` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla poster_img


#BEGIN ALTER

#begin alter inscripcion
ALTER TABLE inscripcion
    ADD cicle int(11) DEFAULT NULL;
#end alter inscripcion

#begin alter disciplina
ALTER TABLE disciplina
    ADD cicle int(11) DEFAULT NULL;
#end alter disciplina

# ALTER TABLE responsable
#     DROP COLUMN cicle;
# ALTER TABLE regimayores
#     DROP COLUMN cicle;
# ALTER TABLE regestudiante
#     DROP COLUMN cicle;

#END ALTER


#BEGIN CICLE_

#begin tabla cicle

CREATE TABLE IF NOT EXISTS `cicle`
(
    `id_cicle`      int(11) NOT NULL,
    `cicle`         varchar(100) DEFAULT NULL,
    `active`        boolean     DEFAULT NULL,
    `fecha_inicio`  date        DEFAULT NULL,
    `fecha_regitro` datetime    DEFAULT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
--
-- Indices de la tabla `view`
--
ALTER TABLE `cicle`
    ADD PRIMARY KEY (`id_cicle`),
    ADD UNIQUE KEY `id_cicle` (`id_cicle`);

ALTER TABLE `cicle`
    MODIFY `id_cicle` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 0;

#end tabla cicle

#END CICLE
