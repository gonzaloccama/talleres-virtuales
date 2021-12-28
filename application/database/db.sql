CREATE TABLE IF NOT EXISTS `academia`
(
    `anio_aca` mediumint   NOT NULL,
    `per_aca`  mediumint DEFAULT NULL,
    `cod_car`  mediumint NOT NULL,
    `car_des`  varchar(36)   NOT NULL,
    `cur_mat`  mediumint   NOT NULL,
    `cur_apr`  mediumint   NOT NULL,
    `cur_des`  mediumint   NOT NULL,
    `ree_apr`  boolean     NOT NULL,
    `ree_des`  boolean     NOT NULL,
    `crd_mat`  mediumint   NOT NULL,
    `crd_apr`  mediumint   NOT NULL,
    `crd_des`  mediumint   NOT NULL,
    `crr_apr`  mediumint   NOT NULL,
    `crr_des`  mediumint   NOT NULL,
    `promedio` double      NOT NULL

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
