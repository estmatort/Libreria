-- --------------------------------------------- INSERTAR EDITORIAL---------------------------------------------

DELIMITER $$

CREATE PROCEDURE InsertarEditorial(

	IN P_NOMEDITORIAL VARCHAR(100),
	IN P_UBICACIONEDITORIAL VARCHAR(100),
	IN P_ESTADOEDITORIAL VARCHAR(10))
	
BEGIN

	INSERT INTO `tbleditorial`(`NOMEDITORIAL`, `UBICACIONEDITORIAL`, `ESTADOEDITORIAL`)
				 VALUES (P_NOMEDITORIAL,P_UBICACIONEDITORIAL,P_ESTADOEDITORIAL);

END$$

DELIMITER $$

-- --------------------------------------------- ACTUALIZAR EDITORIAL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ActualizarEditorial(

	IN P_IDEDITORIAL INT,
	IN P_NOMEDITORIAL VARCHAR(100),
	IN P_UBICACIONEDITORIAL VARCHAR(100),
	IN P_ESTADOEDITORIAL VARCHAR(10))
	
BEGIN

	UPDATE `tbleditorial` SET 

		`NOMEDITORIAL`= P_NOMEDITORIAL,
		`UBICACIONEDITORIAL`= P_UBICACIONEDITORIAL,
		`ESTADOEDITORIAL`= P_ESTADOEDITORIAL
		
	WHERE `IDEDITORIAL` = P_IDEDITORIAL;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO LOGICO EDITORIAL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarLogicoEditorial(IN P_IDEDITORIAL int)
BEGIN

	UPDATE `tbleditorial`
	SET `ESTADOEDITORIAL` = "Inactivo"
	WHERE `IDEDITORIAL` = P_IDEDITORIAL;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO FISICO EDITORIAL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarFisicoEditorial(IN P_IDEDITORIAL int)
BEGIN

	DELETE FROM `tbleditorial`
	WHERE `IDEDITORIAL` = P_IDEDITORIAL;

END$$

DELIMITER $$

-- --------------------------------------------- RESTAURAR EDITORIAL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE RestaurarEditorial(IN P_IDEDITORIAL int)
BEGIN

	UPDATE `tbleditorial`
	SET `ESTADOEDITORIAL` = "Activo" WHERE `IDEDITORIAL` = P_IDEDITORIAL;

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR EDITORIAL ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarEditorialActivo()
BEGIN

	SELECT *
	FROM `tbleditorial`
	WHERE `ESTADOEDITORIAL` = "Activo";

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR EDITORIAL NOMBRE ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarEditorialNombreActivo(
	
	IN P_NOMEDITORIAL VARCHAR (100))
	
BEGIN

	SELECT *
	FROM `tbleditorial`
	WHERE `NOMEDITORIAL` LIKE CONCAT("%",P_NOMEDITORIAL,"%")
	AND `ESTADOEDITORIAL` = "Activo"
	ORDER BY `NOMEDITORIAL` ASC;

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR EDITORIAL INACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarEditorialInactivo()
BEGIN

	SELECT *
	FROM `tbleditorial`
	WHERE `ESTADOEDITORIAL` = "Inactivo";
 
END$$

DELIMITER $$

-- --------------------------------------------- LISTAR EDITORIAL POR ID ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarEditorialID(IN P_IDEDITORIAL int)
BEGIN

	SELECT *
	FROM `tbleditorial`
	WHERE `ESTADOEDITORIAL` = "Activo"
		AND `IDEDITORIAL` = P_IDEDITORIAL; 

END$$

DELIMITER $$

-- --------------------------------------------- LLAMADOS A PROCEDIMIENTOS ---------------------------------------------

CALL InsertarEditorial("El Conejo", "Quito", "Activo");

CALL ActualizarEditorial(1, "Panini", "Quito", "Activo");

CALL ListarEditorialActivo();

CALL ListarEditorialInactivo();

CALL ListarEditorialID(2);

CALL RestaurarEditorial(1);

CALL EliminarLogicoEditorial(1);

CALL ListarEditorialNombreActivo("ne");