-- --------------------------------------------- INSERTAR RELACION LIBRO EDITORIAL ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE InsertarLibroEditorial(

	IN P_IDLIBRO INT, 
	IN P_IDEDITORIAL INT)
	
BEGIN

	INSERT INTO `tbleditorial_tbllibro`(`IDLIBRO`, `IDEDITORIAL`) 
				VALUES (P_IDLIBRO,P_IDEDITORIAL);
	
END$$

DELIMITER $$


CALL InsertarLibroEditorial(3,2);



-- --------------------------------------------- LISTAR LIBROS ACTIVO - EDITORIAL ACTIVO ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarLibrosEditorialActivo()
BEGIN

	SELECT li.*, ed.`NOMEDITORIAL` FROM tbllibro li 
	INNER JOIN `tbleditorial_tbllibro` edLi ON li.`IDLIBRO` = edLi.`IDLIBRO`
	INNER JOIN tbleditorial ed ON ed.`IDEDITORIAL` = edLi.`IDEDITORIAL`
	AND ed.ESTADOEDITORIAL = "Activo"
	AND li.ESTADOLIBRO = "Activo" ;

END$$

DELIMITER $$

DROP PROCEDURE ListarLibrosEditorialActivo

CALL ListarLibrosEditorialActivo();

-- --------------------------------------------- LISTAR LIBRO - EDITORIAL ID ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarLibrosEditorialID(

	IN P_IDEDITORIAL int)
	
BEGIN

	SELECT li.* FROM tbllibro li 
	INNER JOIN `tbleditorial_tbllibro` edLi ON li.`IDLIBRO` = edLi.`IDLIBRO`
	INNER JOIN tbleditorial ed
		ON ed.`IDEDITORIAL` = P_IDEDITORIAL
		AND edLi.`IDEDITORIAL` = P_IDEDITORIAL
	AND ed.ESTADOEDITORIAL = "Activo"
	AND li.ESTADOLIBRO = "Activo" ;

END$$

DELIMITER $$

DROP PROCEDURE ListarLibrosEditorialID

CALL ListarLibrosEditorialID(1);

-- --------------------------------------------- LISTAR LIBRO POR ID ---------------------------------------------

DELIMITER $$

CREATE PROCEDURE ListarLibroID(IN P_IDROL int)
BEGIN

	SELECT * 
	FROM `tblrol`
	WHERE `ESTADOROL` = "Activo" 
		AND `IDROL` = P_IDROL; 

END$$

DELIMITER $$






