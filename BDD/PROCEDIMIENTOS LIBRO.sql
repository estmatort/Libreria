-- ---------------------------------------------INSERTAR LIBRO ---------------------------------------------

CALL InsertarLibro("15874", "Naranja Mecanica", 1985, 8.5, 1, "Activo");

DELIMITER $$

CREATE PROCEDURE InsertarLibro(

	IN P_ISBNLIBRO VARCHAR(20), 
	IN P_NOMLIBRO VARCHAR(50),
	IN P_ANIOLIBRO INT,
	IN P_PRECIOLIBRO FLOAT,
	IN P_IDUSULIBRO INT,
	IN P_ESTADOLIBRO VARCHAR(15))
	
BEGIN

	INSERT INTO `tbllibro`(`ISBNLIBRO`, `NOMLIBRO`, `ANIOLIBRO`, `PRECIOLIBRO`, `IDUSULIBRO`, `ESTADOLIBRO`) 
				VALUES (P_ISBNLIBRO,P_NOMLIBRO,P_ANIOLIBRO,P_PRECIOLIBRO,P_IDUSULIBRO,P_ESTADOLIBRO);
	
END$$

DELIMITER $$

-- --------------------------------------------- ACTUALIZAR LIBRO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ActualizarLibro(

	IN P_IDLIBRO INT,
	IN P_ISBNLIBRO VARCHAR(20), 
	IN P_NOMLIBRO VARCHAR(50),
	IN P_ANIOLIBRO INT,
	IN P_PRECIOLIBRO FLOAT,
	IN P_IDUSULIBRO INT,
	IN P_ESTADOLIBRO VARCHAR(15))
	
BEGIN

	UPDATE `tbllibro` SET 
	
		`ISBNLIBRO` = P_ISBNLIBRO,
		`NOMLIBRO` = P_NOMLIBRO,
		`ANIOLIBRO` = P_ANIOLIBRO,
		`PRECIOLIBRO` = P_PRECIOLIBRO,
		`IDUSULIBRO` = P_IDUSULIBRO,
		`ESTADOLIBRO` = P_ESTADOLIBRO 
		
	WHERE `IDLIBRO` = P_IDLIBRO;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO LOGICO LIBRO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarLogicoLibro(IN P_IDLIBRO int)
BEGIN

	UPDATE `tbllibro`
	SET `ESTADOLIBRO` = "Inactivo"
	WHERE `IDLIBRO` = P_IDLIBRO;

END$$

DELIMITER $$

-- --------------------------------------------- ELIMINADO FISICO LIBRO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE EliminarFisicoLibro(IN P_IDLIBRO int)
BEGIN

	DELETE FROM `tbllibro`
	WHERE `IDLIBRO` = P_IDLIBRO;

END$$

DELIMITER $$

-- --------------------------------------------- RESTAURAR LIBRO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE RestaurarLibro(IN P_IDLIBRO int)
BEGIN

	UPDATE `tbllibro`
	SET `ESTADOLIBRO` = "Activo"
	WHERE `IDLIBRO` = P_IDLIBRO;

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

CALL RestaurarEditorial(1);