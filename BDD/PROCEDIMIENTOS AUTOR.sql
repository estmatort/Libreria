-- --------------------------------------------- INSERTAR AUTOR ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE InsertarAutor(

	IN P_NOMAUTOR VARCHAR(30),
	IN P_APEAUTOR VARCHAR(30),
	IN P_ESTADOAUTOR VARCHAR(15))
	
BEGIN

	INSERT INTO `tblautor`(`NOMAUTOR`, `APEAUTOR`, `ESTADOAUTOR`)
				 VALUES (P_NOMAUTOR,P_APEAUTOR,P_ESTADOAUTOR);

END$$

DELIMITER $$

-- --------------------------------------------- ACTUALIZAR AUTOR ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ActualizarAutor(

	IN P_IDAUTOR INT,
	IN P_NOMAUTOR VARCHAR(30),
	IN P_APEAUTOR VARCHAR(30),
	IN P_ESTADOAUTOR VARCHAR(15))
	
BEGIN

	UPDATE `tblautor` SET 

		`NOMAUTOR`= P_NOMAUTOR,
		`APEAUTOR`= P_APEAUTOR,
		`ESTADOAUTOR`= P_ESTADOAUTOR
		
	WHERE `IDAUTOR` = P_IDAUTOR;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO LOGICO AUTOR ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarLogicoAutor(IN P_IDAUTOR int)
BEGIN

	UPDATE `tblautor`
	SET `ESTADOAUTOR` = "Inactivo"
	WHERE `IDAUTOR` = P_IDAUTOR;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO FISICO AUTOR ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarFisicoAutor(IN P_IDAUTOR int)
BEGIN

	DELETE FROM `tblautor`
	WHERE `IDAUTOR` = P_IDAUTOR;

END$$

DELIMITER $$

-- --------------------------------------------- RESTAURAR AUTOR ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE RestaurarAutor(IN P_IDAUTOR int)
BEGIN

	UPDATE `tblautor`
	SET `ESTADOAUTOR` = "Activo" WHERE `IDAUTOR` = P_IDAUTOR;

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR AUTOR ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarAutorActivo()
BEGIN

	SELECT *
	FROM `tblautor`
	WHERE `ESTADOAUTOR` = "Activo";

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR AUTOR NOMBRE ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarAutorNombreActivo(

	IN P_NOMAUTOR VARCHAR(30))
	
BEGIN

	SELECT `IDAUTOR`, CONCAT(`NOMAUTOR`,' ',`APEAUTOR`) AS 'NOM_APE_AUTOR', `ESTADOAUTOR`
	FROM `tblautor`
	WHERE `NOMAUTOR` LIKE CONCAT("%",P_NOMAUTOR,"%") OR `NOMAUTOR` LIKE CONCAT("%",P_NOMAUTOR,"%")
	AND `ESTADOAUTOR` = "Activo"
	ORDER BY `NOMAUTOR` ASC;

END$$

DELIMITER $$

CALL ListarAutorNombreActivo("m");

-- --------------------------------------------- LISTAR AUTOR INACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarAutorInactivo()
BEGIN

	SELECT *
	FROM `tblautor`
	WHERE `ESTADOAUTOR` = "Inactivo";
 
END$$

DELIMITER $$

-- --------------------------------------------- LISTAR AUTOR POR ID ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarAutorID(IN P_IDAUTOR int)
BEGIN

	SELECT *
	FROM `tblautor`
	WHERE `ESTADOAUTOR` = "Activo"
		AND `IDAUTOR` = P_IDAUTOR; 

END$$

DELIMITER $$

-- --------------------------------------------- LLAMADOS A PROCEDIMIENTOS ---------------------------------------------

CALL InsertarAutor("Emi", "Espinosa", "Activo");

CALL ActualizarAutor(1, "Michelle", "Espinosa", "Activo");

CALL ListarAutorActivo();

CALL ListarAutorInactivo();

CALL ListarAutorID(1);

CALL RestaurarAutor(1);

CALL EliminarLogicoAutor(1);