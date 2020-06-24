-- --------------------------------------------- INSERTAR USUARIO---------------------------------------------

DELIMITER $$

CREATE PROCEDURE InsertarUsuario(

	IN P_IDROL INT,
	IN P_NOMUSUARIO VARCHAR(50),
	IN P_USUUSUARIO VARCHAR(30),
	IN P_PASSUSUARIO VARCHAR(200),
	IN P_ESTADOUSUARIO VARCHAR(15))
	
BEGIN

	INSERT INTO `tblusuario`(`IDROL`, `NOMUSUARIO`, `USUUSUARIO`, `PASSUSUARIO`, `ESTADOUSUARIO`)
				VALUES (P_IDROL,P_NOMUSUARIO,P_USUUSUARIO,P_PASSUSUARIO,P_ESTADOUSUARIO);

END$$

DELIMITER $$

DROP PROCEDURE InsertarUsuario;

-- --------------------------------------------- ACTUALIZAR USUARIO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ActualizarUsuario(

	IN P_IDUSUARIO INT,
	IN P_IDROL INT,
	IN P_NOMUSUARIO VARCHAR(50),
	IN P_USUUSUARIO VARCHAR(30),
	IN P_PASSUSUARIO VARCHAR(200),
	IN P_ESTADOUSUARIO VARCHAR(15))
	
BEGIN

	UPDATE `tblusuario` SET 

		`IDROL`= P_IDROL,
		`NOMUSUARIO`= P_NOMUSUARIO,
		`USUUSUARIO`= P_USUUSUARIO,
		`PASSUSUARIO`= P_PASSUSUARIO,
		`ESTADOUSUARIO`= P_ESTADOUSUARIO 
		
	WHERE `IDUSUARIO` = P_IDUSUARIO;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO LOGICO USUARIO  ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarLogicoUsuario(IN P_IDUSUARIO int)
BEGIN

	UPDATE `tblusuario`
	SET `ESTADOUSUARIO` = "Inactivo"
	WHERE `IDUSUARIO` = P_IDUSUARIO;

END$$

DELIMITER $$

CALL EliminarLogicoRol(1);

-- --------------------------------------------- ELIMINADO FISICO USUARIO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarFisicoUsuario(IN P_IDUSUARIO int)
BEGIN

	DELETE FROM `tblusuario`
	WHERE `IDUSUARIO` = P_IDUSUARIO;

END$$

DELIMITER $$

-- --------------------------------------------- RESTAURAR USUARIO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE RestaurarUsuario(IN P_IDUSUARIO int)
BEGIN

	UPDATE `tblusuario`
	SET `ESTADOUSUARIO` = "Activo" WHERE `IDUSUARIO` = P_IDUSUARIO;

END$$

DELIMITER $$

CALL RestaurarRol(1);

-- --------------------------------------------- LISTAR USUARIO ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarUsuarioActivo()
BEGIN

	SELECT *
	FROM `tblusuario`
	WHERE `ESTADOUSUARIO` = "Activo";

END$$

DELIMITER $$

-- --------------------------------------------- LISTAR USUARIO INACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarUsuarioInactivo()
BEGIN

	SELECT *
	FROM `tblusuario`
	WHERE `ESTADOUSUARIO` = "Inactivo";
 
END$$

DELIMITER $$

-- --------------------------------------------- LISTAR USUARIO POR ID ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarUsuarioID(IN P_IDUSUARIO int)
BEGIN

	SELECT *
	FROM `tblusuario`
	WHERE `ESTADOUSUARIO` = "Activo"
		AND `IDUSUARIO` = P_IDUSUARIO; 

END$$

DELIMITER $$

-- --------------------------------------------- LLAMADOS A PROCEDIMIENTOS ---------------------------------------------

CALL InsertarUsuario(1,"Steven", "stev", "123456789", "Activo");

CALL ActualizarUsuario(1, 1, "Steven", "stev", "123456789", "Activo");

CALL ListarUsuarioActivo();

CALL ListarUsuarioInactivo();

CALL ListarUsuarioID(1);

CALL RestaurarUsuario(1);

CALL EliminarLogicoUsuario(1);