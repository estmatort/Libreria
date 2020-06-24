-- ---------------------------------------------INSERTAR ROL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE InsertarRol(

	IN P_TIPOROL varchar(30), 
	IN P_ESTADOROL varchar(15))
	
BEGIN

	INSERT INTO `tblrol`(`TIPOROL`, `ESTADOROL`)
	VALUES (P_TIPOROL,P_ESTADOROL);
	
END$$

DELIMITER $$

-- --------------------------------------------- ACTUALIZAR ROL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ActualizarRol(

	IN P_IDROL int,
	IN P_TIPOROL varchar(30), 
	IN P_ESTADOROL varchar(15))
	
BEGIN

	UPDATE `tblrol` SET 
	
		`TIPOROL`= P_TIPOROL,
		`ESTADOROL`= P_ESTADOROL 
		
	WHERE `IDROL` = P_IDROL;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO LOGICO ROL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarLogicoRol(IN P_IDROL int)
BEGIN

	UPDATE `tblrol`
	SET `ESTADOROL` = "Inactivo"
	WHERE `IDROL` = P_IDROL;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO FISICO ROL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarFisicoRol(IN P_IDROL int)
BEGIN

	DELETE FROM `tblrol`
	WHERE `IDROL` = P_IDROL;

END$$

DELIMITER $$

-- --------------------------------------------- RESTAURAR ROL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE RestaurarRol(IN P_IDROL int)
BEGIN

	UPDATE `tblrol`
	SET `ESTADOROL` = "Activo"
	WHERE `IDROL` = P_IDROL;

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR ROL ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarRolActivo()
BEGIN

	SELECT *
	FROM `tblrol`
	WHERE `ESTADOROL` = "Activo";

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR ROL INACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarRolInactivo()
BEGIN

	SELECT *
	FROM `tblrol`
	WHERE `ESTADOROL` = "Inactivo";

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR ROL POR ID ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarRolID(IN P_IDROL int)
BEGIN

	SELECT * 
	FROM `tblrol`
	WHERE `ESTADOROL` = "Activo" 
		AND `IDROL` = P_IDROL; 

END$$

DELIMITER $$

-- --------------------------------------------- LLAMADOS A PROCEDIMIENTOS ---------------------------------------------

CALL InsertarRol("Administrador", "Activo");

CALL ActualizarRol(1,"Admin","Activo");

CALL EliminarLogicoRol(1);

CALL EliminarFisicoRol(1);

CALL RestaurarRol(1);

CALL ListarRolActivo();

CALL ListarRolInactivo();

CALL ListarRolID(1);