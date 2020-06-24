-- --------------------------------------------- INSERTAR GENERO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE InsertarGenero(

	IN P_DESCGENERO VARCHAR(50),
	IN P_ESTADOGENERO VARCHAR(15))
	
BEGIN

	INSERT INTO `tblgenero`(`DESCGENERO`, `ESTADOGENERO`)
				 VALUES (P_DESCGENERO,P_ESTADOGENERO);

END$$

DELIMITER $$

-- --------------------------------------------- ACTUALIZAR GENERO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ActualizarGenero(

	IN P_IDGENERO INT,
	IN P_DESCGENERO VARCHAR(50),
	IN P_ESTADOGENERO VARCHAR(15))
	
BEGIN

	UPDATE `tblgenero` SET 

		`DESCGENERO`= P_DESCGENERO,
		`ESTADOGENERO`= P_ESTADOGENERO
		
	WHERE `IDGENERO` = P_IDGENERO;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO LOGICO GENERO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarLogicoGenero(IN P_IDGENERO int)
BEGIN

	UPDATE `tblgenero`
	SET `ESTADOGENERO` = "Inactivo"
	WHERE `IDGENERO` = P_IDGENERO;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO FISICO GENERO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarFisicoGenero(IN P_IDGENERO int)
BEGIN

	DELETE FROM `tblgenero`
	WHERE `IDGENERO` = P_IDGENERO;

END$$

DELIMITER $$

-- --------------------------------------------- RESTAURAR GENERO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE RestaurarGenero(IN P_IDGENERO int)
BEGIN

	UPDATE `tblgenero`
	SET `ESTADOGENERO` = "Activo" WHERE `IDGENERO` = P_IDGENERO;

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR GENERO ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarGeneroActivo()
BEGIN

	SELECT *
	FROM `tblgenero`
	WHERE `ESTADOGENERO` = "Activo";

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR GENERO INACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarGeneroInactivo()
BEGIN

	SELECT *
	FROM `tblgenero`
	WHERE `ESTADOGENERO` = "Inactivo";
 
END$$

DELIMITER $$

-- --------------------------------------------- LISTAR GENERO POR ID ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarGeneroID(IN P_IDGENERO int)
BEGIN

	SELECT *
	FROM `tblgenero`
	WHERE `ESTADOGENERO` = "Activo"
		AND `IDGENERO` = P_IDGENERO;

END$$

DELIMITER $$

-- --------------------------------------------- LLAMADOS A PROCEDIMIENTOS ---------------------------------------------

CALL InsertarGenero("Drama", "Activo");

CALL ActualizarGenero(1, "Drama", "Activo");

CALL ListarGeneroActivo();

CALL ListarGeneroInactivo();

CALL ListarGeneroID(1);

CALL RestaurarGenero(1);

CALL EliminarLogicoGenero(1);