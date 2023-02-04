CREATE DATABASE bdaula;

CREATE TABLE tbtipousuario(
	tipoid int,
	tipodescripcion varchar(255),
	constraint pk_tipo primary key (tipoid)	
)

CREATE TABLE tbusuario(
	usuarioid int,
	usuarioidentidad int not null,
	usuariopassword varchar(255),
	usuarioestado int not null,
	usuariotipo int not null,
	usuarioimgperfil varchar(255),
	constraint pk_usuario primary key (usuarioid),
	constraint fk_tipo foreign key (usuariotipo) references tbtipousuario(tipoid)
)

CREATE TABLE tbprofesor(
	profesorid int, 
	profesornombre varchar(255),
	profesorcedula int,
	profesoredad int,
	profesorsexo char,
	profesorexperiencia int,
	profesorgrado varchar(50),
	profesorusuarioid int,

	constraint pk_profesor primary key(profesorid),
	constraint fk_usuario foreign key (profesorusuarioid) references tbusuario(usuarioid)

)

CREATE TABLE tbcarrera(
	carreraid int, 
	carreranombre varchar(150),
	constraint pk_carrera primary key(carreraid)
)

CREATE TABLE tbbeca(
	becaid int, 
	becatipo varchar(100),

	constraint pk_beca primary key (becaid)

)

CREATE TABLE tbestudiante(
	
	estudianteid int,
	estudiantenombre varchar(255),
	estudiantecedula int,
	estudianteedad int,
	estudiantedireccion varchar(255),
	estudianteusuarioid int, 
	estudiantecarreraid int, 
	estudiantebecaid int,
	constraint pk_estudiante primary key(estudianteid),
	constraint fk_carrera foreign key(estudiantecarreraid) references tbcarrera(carreraid),
	constraint fk_beca foreign key(estudiantebecaid) references tbbeca(becaid)
)


CREATE TABLE tbvigencia(
	vigenciaid int, 
	vigenciadescripcion varchar(150),
	constraint pk_vigencia primary key(vigenciaid)
)


CREATE TABLE tbcurso(
	cursoid int, 
	cursosigla varchar(10), 
	cursonombre varchar(150), 
	cursocupo int, 
	cursovigenciaid int, 
	cursocarreraid int,
	cursoprofesorid int,
	constraint pk_curso primary key (cursoid),
	constraint fk_vigencia foreign key(cursovigenciaid) references tbvigencia(vigenciaid)
	
)


CREATE TABLE tbasigprofesor(
	asignacionid int, 
	asignacionfecha date,
	asignacionruta varchar(255),
	asignaciondescripcion varchar(255),
	asignacionprofesorid int,
	asignacioncursoid int,
	constraint pk_asigp primary key(asignacionid),
	constraint fk_profesor foreign key(asignacionprofesorid) references tbprofesor(profesorid),
	constraint fk_curso foreign key(asignacioncursoid) references tbcurso(cursoid)

)


CREATE TABLE tbasigestudiante(
	asignacionid int, 
	asignacionfecha date, 
	asignacionruta varchar(255), 
	asignaciondescripcion varchar(150), 
	asignacionnota int,
	asignacionpaid int,
	asignacionestudianteid int,
	constraint pk_asigest primary key (asignacionid),
	constraint fk_asigprofesor foreign key (asignacionpaid) references tbasigprofesor(asignacionid),
	constraint fk_asigestudiante foreign key (asignacionestudianteid) references tbestudiante(estudianteid)
)


CREATE TABLE tbpepc(
	epcid int, 
	epcestudianteid int, 
	epccursoid int, 
	epcexamen1 int, 
	epcexamen2 int,
	epcexamen3 int,
	epctarea1 int, 
	epctarea2 int,
	epcprueba1 int, 
	epcprueba2 int, 
	epcciclo varchar(25), 
	epcanio int,
	constraint pk_epc primary key(epcid)

)

CREATE TABLE tbrubrica(
	rubricaid int, 
	epccursoid int, 
	epcexamen1 int, 
	epcexamen2 int,
	epcexamen3 int,
	epctarea1 int, 
	epctarea2 int,
	epcprueba1 int, 
	epcprueba2 int
	constraint pk_epcrub primary key(rubricaid),
	constraint fk_cursorub foreign key (epccursoid) references tbcurso(cursoid)

)


CREATE TABLE tbhistorialcurso(

	historialid int identity(1,1),
	historialcursoid int,
	historialfecha date,
	historialestado varchar(10),
	historialciclo varchar(20), 

	constraint pk_historial primary key (historialid)
)



CREATE PROCEDURE obtenerUsuarios
AS
    BEGIN
	    SELECT * FROM tbusuario
	END
GO

CREATE PROCEDURE obtenerDatosUsuario(
	@usuarioidentidad int,
	@usuariopassword varchar(100)
)
AS
	BEGIN
		SELECT * FROM tbusuario WHERE usuarioidentidad = @usuarioidentidad AND usuariopassword = @usuariopassword
	END
GO

CREATE PROCEDURE actualizarClaveUsuario(
	@usuarioidentidad int,
	@usuarionuevaclave varchar(150)
)
AS
	BEGIN
		BEGIN TRY
			BEGIN TRANSACTION
				UPDATE tbusuario SET usuariopassword = @usuarionuevaclave, usuarioestado = 0 WHERE usuarioidentidad = @usuarioidentidad
			COMMIT
		END TRY
		BEGIN CATCH
			ROLLBACK TRANSACTION
			SELECT 'Ocurrió un error'
		END CATCH
	END
GO

CREATE PROCEDURE obtenerVigencias
AS
	BEGIN
		SELECT * FROM tbvigencia;
	END
GO

CREATE PROCEDURE obtenerCarreras
AS
	BEGIN
		SELECT * FROM tbcarrera;
	END
GO

CREATE PROCEDURE insertarCurso(
	@cursoid int,
	@cursosigla varchar(10),
	@cursonombre varchar(100),
	@cursocupo int,
	@cursovigencia int,
	@cursocarreraid int,
	@cursoprofesorid int

)
AS
	
	IF NOT EXISTS(SELECT * FROM tbcurso WHERE cursosigla = @cursosigla)
		BEGIN TRY
			BEGIN TRANSACTION
				INSERT INTO tbcurso(cursoid,cursosigla,cursonombre,cursocupo,cursovigenciaid, cursocarreraid, cursoprofesorid) VALUES(@cursoid,@cursosigla,@cursonombre,@cursocupo,@cursovigencia,@cursocarreraid,@cursoprofesorid); 
			
				
			COMMIT			
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH		
	ELSE
		BEGIN
			SELECT 'Ya existe este curso' AS mensaje
		END
GO

CREATE PROCEDURE obtenerDatosProfesor(
	
	@profesorcedula int

)
AS
	BEGIN
		SELECT * FROM tbprofesor WHERE profesorcedula = @profesorcedula;
	END
GO

CREATE PROCEDURE obtenerCursosProfesor(
	@profesorid int
)
AS
	BEGIN
		SELECT * FROM tbcurso WHERE cursoprofesorid = @profesorid AND cursovigenciaid = 1
	END
GO	
SELECT * FROM tbcurso
SELECT * FROM tbcurso WHERE cursoprofesorid = 1 AND cursovigenciaid = 1

CREATE PROCEDURE obtenerTotalCursosImpartidos(
	@profesorid int
)
AS
	BEGIN
		SELECT * FROM tbcurso WHERE cursoprofesorid = @profesorid
	END
GO

CREATE PROCEDURE obtenerTotalCursosPaginas(
	@profesorid int,
	@numeroPagina int,
	@paginasTotales int

)
AS
	BEGIN
		SELECT * FROM tbcurso WHERE cursoprofesorid = @profesorid AND cursovigenciaid = 1 ORDER BY cursoid  OFFSET (@numeroPagina-1)*@paginasTotales ROWS
FETCH NEXT @paginasTotales ROWS ONLY
		
	END
GO


CREATE PROCEDURE obtenerEstudiantesCurso(
	@profesorid int,
	@cursoid int

)
AS
	BEGIN
		SELECT Estudiante.estudianteid, Estudiante.estudiantecedula,Estudiante.estudiantenombre FROM tbestudiante AS Estudiante INNER JOIN
tbpepc AS Matricula ON Estudiante.estudianteid = Matricula.epcestudianteid INNER JOIN tbcurso AS Curso ON Matricula.epccursoid = Curso.cursoid
WHERE Matricula.epccursoid = @cursoid AND Curso.cursoprofesorid = @profesorid
		
	END
GO

CREATE PROCEDURE obtenerAvatarEstudiante(
	@estudiantecedula int
)
AS
	BEGIN
		SELECT usuarioimgperfil FROM tbusuario WHERE usuarioidentidad = @estudiantecedula
	END
GO

CREATE PROCEDURE obtenerCurso(
	@cursoid int
)
AS
	BEGIN
		SELECT * FROM tbcurso WHERE cursoid = @cursoid
	END
GO

CREATE PROCEDURE obtenerRubricaCurso(
	@cursoid int

)
AS
	BEGIN
		SELECT * FROM tbrubrica WHERE epccursoid = @cursoid
	END
GO

CREATE PROCEDURE insertarRubrica(
	@rubricaid int,
	@cursoid int,
	@examen1 int,
	@examen2 int,
	@examen3 int,
	@tarea1 int,
	@tarea2 int,
	@prueba1 int,
	@prueba2 int
)
AS
	
	IF NOT EXISTS(SELECT * FROM tbrubrica WHERE epccursoid = @cursoid)
		BEGIN TRY
			BEGIN TRANSACTION
				INSERT INTO tbrubrica(rubricaid, epccursoid, epcexamen1, epcexamen2, epcexamen3, epctarea1, epctarea2, epcprueba1, epcprueba2) 
				VALUES(@rubricaid,@cursoid, @examen1, @examen2,@examen3,@tarea1,@tarea2,@prueba1, @prueba2);
				
			COMMIT			
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH		
	ELSE
		SELECT 'Ya existe esta rubrica' AS mensaje
GO

CREATE PROCEDURE actualizarRubrica(	
	@rubricaid int,
	@cursoid int,
	@examen1 int,
	@examen2 int,
	@examen3 int,
	@tarea1 int,
	@tarea2 int,
	@prueba1 int,
	@prueba2 int
)
AS
	IF EXISTS(SELECT * FROM tbrubrica WHERE epccursoid = @cursoid)
		BEGIN TRY
			BEGIN TRANSACTION
				UPDATE tbrubrica SET epcexamen1 = @examen1, epcexamen2 = @examen2, epcexamen3 = @examen3, epctarea1 = @tarea1, epctarea2 = @tarea2,
				epcprueba1 = @prueba1, epcprueba2 = @prueba2 WHERE epccursoid = @cursoid AND rubricaid = @rubricaid;
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al actualizar' AS mensaje
		END CATCH	
	ELSE
		SELECT 'No existe esta rubrica' AS mensaje	
GO

CREATE PROCEDURE obtenerEstudiantesSinCurso(
	@cursoid int,
	@profesorid int,
	@ciclo varchar(25),
	@anio int,
	@carreraid int
)
AS
	BEGIN
		SELECT Estudiante.estudianteid, Estudiante.estudiantenombre FROM tbestudiante AS Estudiante WHERE estudianteid NOT IN
		(SELECT Matricula.epcestudianteid FROM tbpepc AS Matricula INNER JOIN tbcurso AS Curso ON Matricula.epccursoid = Curso.cursoid WHERE
		Curso.cursoid = @cursoid AND Matricula.epcciclo = @ciclo AND Matricula.epcanio = @anio AND Curso.cursoprofesorid = @profesorid ) AND Estudiante.estudiantecarreraid = @carreraid
	END
GO

CREATE PROCEDURE actualizarCupoCurso(
	@cursoid int,
	@cantidadEstudiantes int
)
AS
	BEGIN
		UPDATE tbcurso SET cursocupo = (cursocupo-@cantidadEstudiantes) WHERE cursoid = @cursoid
	END
GO

CREATE PROCEDURE agregarEstudiantesCurso(
	@epcid int,
	@estudianteid int,
	@cursoid int,
	@ciclo varchar(25),
	@anio int
)
AS
	
	IF NOT EXISTS(SELECT * FROM tbpepc WHERE epcestudianteid = @estudianteid AND epccursoid = @cursoid AND epcciclo = @ciclo AND epcanio = @anio)
		BEGIN TRY
			BEGIN TRANSACTION
				INSERT INTO tbpepc (epcid,epcestudianteid,epccursoid,epcexamen1,epcexamen2, epcexamen3,epctarea1,epctarea2, epcprueba1,epcprueba2,epcciclo,epcanio)
		VALUES(@epcid,@estudianteid,@cursoid,0,0,0,0,0,0,0,@ciclo,@anio);
			
			COMMIT			
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH		
	ELSE
		SELECT 'Ya existe este estudiante matriculado a este curso' AS mensaje
GO

CREATE PROCEDURE obtenerCupoCurso(
	@cursoid int
)
AS
	BEGIN
		SELECT cursocupo FROM tbcurso WHERE cursoid = @cursoid;
	END
GO

CREATE PROCEDURE eliminarEstudianteCurso(
	@estudianteid int,
	@cursoid int
)
AS
	BEGIN
		BEGIN TRY
			BEGIN TRANSACTION
				DECLARE @epcid AS INT
				SET @epcid = (SELECT epcid FROM tbpepc WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid)
				DELETE FROM tbpepc WHERE epcid = @epcid
				UPDATE tbcurso SET cursocupo = (cursocupo+1) WHERE cursoid = @cursoid
				
			COMMIT			
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al eliminar' AS mensaje
		END CATCH	
	END
GO

CREATE PROCEDURE obtenerRubrosEstudiante(
	@estudianteid int,
	@cursoid int,
	@ciclo varchar(25),
	@anio int
)
AS
	BEGIN
		SELECT epcid, epcexamen1, epcexamen2, epcexamen3, epctarea1, epctarea2, epcprueba1, epcprueba2 FROM tbpepc WHERE epcestudianteid = @estudianteid
		AND epccursoid = @cursoid AND epcciclo = @ciclo AND epcanio = @anio
	END
GO

CREATE PROCEDURE actualizarRubrosEstudiante(
	@rubricaid int,
	@estudiante int,
	@cursoid int,
	@examen1 int,
	@examen2 int,
	@examen3 int,
	@tarea1 int,
	@tarea2 int,
	@prueba1 int,
	@prueba2 int,
	@ciclo varchar(25),
	@anio int
)
AS
	IF EXISTS(SELECT * FROM tbpepc WHERE epccursoid = @cursoid AND epcestudianteid = @estudiante AND epcciclo = @ciclo AND epcanio = @anio)
		BEGIN TRY
			BEGIN TRANSACTION
				UPDATE tbpepc SET epcexamen1 = @examen1, epcexamen2 = @examen2, epcexamen3 = @examen3, epctarea1 = @tarea1, epctarea2 = @tarea2,
				epcprueba1 = @prueba1, epcprueba2 = @prueba2 WHERE epccursoid = @cursoid AND epcestudianteid = @estudiante AND epcciclo = @ciclo AND epcanio = @anio
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al actualizar' AS mensaje
		END CATCH	
	ELSE
		SELECT 'No existen estos rubros' AS mensaje	
GO


CREATE PROCEDURE agregarAsignacionProfesor(
	@asignacionid int,
	@asignacionfecha date,
	@asignacionruta varchar(255),
	@asignaciondescripcion varchar(255),
	@asignacionprofesorid int,
	@asignacioncursoid int
)
AS
	
		BEGIN TRY
			BEGIN TRANSACTION
				INSERT INTO tbasigprofesor(asignacionid,asignacionfecha,asignacionruta,asignaciondescripcion,asignacionprofesorid,asignacioncursoid)
				VALUES(@asignacionid,@asignacionfecha,@asignacionruta,@asignaciondescripcion,@asignacionprofesorid,@asignacioncursoid)
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH	
	
GO

CREATE PROCEDURE obtenerAsignacionesProfesor(
	@profesorid int,
	@cursoid int
)
AS
	BEGIN
		SELECT * FROM tbasigprofesor WHERE asignacionprofesorid = @profesorid AND asignacioncursoid = @cursoid;
	END
GO

CREATE PROCEDURE eliminarAsignacionProfesor(
	@asignacionid int
)
AS
	BEGIN
		DELETE FROM tbasigprofesor WHERE asignacionid = @asignacionid
		DELETE FROM tbasigestudiante WHERE asignacionpaid = @asignacionid
	END
GO

CREATE PROCEDURE obtenerAsignacionesSubidas(
	@asignacionid int,
	@cursoid int
)
AS
	BEGIN
		SELECT AsignacionEstudiante.asignacionid, AsignacionEstudiante.asignacionfecha, AsignacionEstudiante.asignacionruta, AsignacionEstudiante.asignaciondescripcion, AsignacionEstudiante.asignacionnota, AsignacionEstudiante.asignacionpaid, Estudiante.estudiantenombre, Estudiante.estudianteid, Curso.cursoid FROM tbasigestudiante AS AsignacionEstudiante 
		INNER JOIN tbasigprofesor AS AsignacionProfesor ON AsignacionEstudiante.asignacionpaid = AsignacionProfesor.asignacionid
		INNER JOIN tbestudiante AS Estudiante ON Estudiante.estudianteid = AsignacionEstudiante.asignacionestudianteid
		INNER JOIN tbcurso AS Curso ON AsignacionProfesor.asignacioncursoid = Curso.cursoid
		WHERE AsignacionEstudiante.asignacionpaid = @asignacionid AND AsignacionProfesor.asignacioncursoid = @cursoid
	END
GO

CREATE PROCEDURE calificarAsignacionEstudiante(
	@porcentaje int,
	@nota int,
	@cursoid int,
	@profesorid int,
	@estudianteid int,
	@ciclo varchar(25),
	@anio int,
	@tipoRubro int,
	@asignacionid int
)
AS
	IF EXISTS(SELECT * FROM tbpepc WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio)
		BEGIN TRY
			BEGIN TRANSACTION
				UPDATE tbasigestudiante SET asignacionnota = @nota WHERE asignacionestudianteid = @estudianteid AND asignacionpaid= @asignacionid
				IF (@tipoRubro = 1)
					BEGIN
						UPDATE tbpepc SET epcexamen1 = @porcentaje WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio
					END
				ELSE IF (@tipoRubro = 2)
					BEGIN
						UPDATE tbpepc SET epcexamen2 = @porcentaje WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio
					END
				ELSE IF (@tipoRubro = 3)
					BEGIN
						UPDATE tbpepc SET epcexamen3 = @porcentaje WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio
					END
				ELSE IF (@tipoRubro = 4)
					BEGIN
						UPDATE tbpepc SET epctarea1 = @porcentaje WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio
					END
				ELSE IF (@tipoRubro = 5)
					BEGIN
						UPDATE tbpepc SET epctarea2 = @porcentaje WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio
					END
				ELSE IF (@tipoRubro = 6)
					BEGIN
						UPDATE tbpepc SET epcprueba1 = @porcentaje WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio
					END
				ELSE IF (@tipoRubro = 7)
					BEGIN
						UPDATE tbpepc SET epcprueba2 = @porcentaje WHERE epccursoid = @cursoid AND epcestudianteid = @estudianteid AND epcciclo = @ciclo AND epcanio = @anio
					END
				
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al actualizar' AS mensaje
		END CATCH	
	ELSE
		SELECT 'No existen estos rubros' AS mensaje	
GO

CREATE PROCEDURE obtenerDatosEstudiante(
	@cedula int
)
AS
	BEGIN
		SELECT * FROM tbestudiante WHERE estudiantecedula = @cedula
	END
GO

CREATE PROCEDURE obtenerCursosEstudiante(
	@estudianteid int
)
AS
	BEGIN
		SELECT * FROM tbcurso AS Curso INNER JOIN tbpepc AS Matricula ON Curso.cursoid = Matricula.epccursoid 
		INNER JOIN tbestudiante AS Estudiante ON Estudiante.estudianteid = Matricula.epcestudianteid
		WHERE Estudiante.estudianteid = @estudianteid
	END
GO

CREATE PROCEDURE obtenerTotalCursosEstudiante(
	@estudianteid int
)
AS
	BEGIN
		SELECT COUNT(*) FROM tbcurso AS Curso INNER JOIN tbpepc AS Matricula ON Curso.cursoid = Matricula.epccursoid 
		INNER JOIN tbestudiante AS Estudiante ON Estudiante.estudianteid = Matricula.epcestudianteid
		WHERE Estudiante.estudianteid = @estudianteid
	END
GO

CREATE PROCEDURE obtenerTotalCursosPaginasEstudiante(
	@estudianteid int,
	@numeroPagina int,
	@paginasTotales int

)
AS
	BEGIN
		SELECT * FROM tbcurso AS Curso INNER JOIN tbpepc AS Matricula ON Curso.cursoid = Matricula.epccursoid 
		INNER JOIN tbestudiante AS Estudiante ON Estudiante.estudianteid = Matricula.epcestudianteid
		WHERE Estudiante.estudianteid = @estudianteid ORDER BY Curso.cursoid  OFFSET (@numeroPagina-1)*@paginasTotales ROWS
		FETCH NEXT @paginasTotales ROWS ONLY		
	END
GO

CREATE PROCEDURE obtenerAsignacionesCursoEstudiante(
	@cursoid int,
	@profesorid int
)
AS
	BEGIN
		SELECT * FROM tbasigprofesor AS AsignacionProfesor WHERE AsignacionProfesor.asignacioncursoid = @cursoid AND AsignacionProfesor.asignacionprofesorid = @profesorid
	END
GO

CREATE PROCEDURE obtenerAsignacionesPorEstudiante(
	@estudianteid int,
	@cursoid int
)
AS
	BEGIN
		SELECT AsignacionEstudiante.asignacionid, AsignacionEstudiante.asignacionfecha, AsignacionEstudiante.asignacionruta,
AsignacionEstudiante.asignaciondescripcion, AsignacionEstudiante.asignacionnota
FROM tbasigestudiante AS AsignacionEstudiante 
INNER JOIN tbpepc AS Matricula ON AsignacionEstudiante.asignacionestudianteid = Matricula.epcestudianteid
INNER JOIN tbcurso AS Curso ON Curso.cursoid = Matricula.epccursoid 
WHERE AsignacionEstudiante.asignacionestudianteid = @estudianteid AND Curso.cursoid = @cursoid 
	END
GO

CREATE PROCEDURE agregarAsignacionEstudiante(
	@asignacionid int,
	@asignacionfecha date,
	@asignacionruta varchar(255),
	@asignaciondescripcion varchar(255),
	@asignacionnota int,
	@asignacionpaid int,
	@asignacionestudianteid int
)
AS
		BEGIN TRY
			BEGIN TRANSACTION
				INSERT INTO tbasigestudiante(asignacionid,asignacionfecha,asignacionruta,asignaciondescripcion,asignacionpaid,asignacionestudianteid)
				VALUES(@asignacionid,@asignacionfecha,@asignacionruta,@asignaciondescripcion,@asignacionpaid,@asignacionestudianteid)
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH	
	
GO

CREATE PROCEDURE verificarExistenciaAsignacionSubida(
	@estudianteid int,
	@cursoid int,
	@asignacionid int
)
AS
	BEGIN
		SELECT COUNT(*) AS Total
		FROM tbasigestudiante AS AsignacionEstudiante 
		INNER JOIN tbpepc AS Matricula ON AsignacionEstudiante.asignacionestudianteid = Matricula.epcestudianteid
		INNER JOIN tbcurso AS Curso ON Curso.cursoid = Matricula.epccursoid 
		WHERE AsignacionEstudiante.asignacionestudianteid = @estudianteid AND Curso.cursoid = @cursoid AND AsignacionEstudiante.asignacionpaid = @asignacionid
	END
GO

CREATE PROCEDURE obtenerDatosProfesorPorId(
	@profesorid int
)
AS
	BEGIN
		SELECT * FROM tbprofesor WHERE profesorid = @profesorid
	END
GO	

CREATE PROCEDURE obtenerEstudiantesMatriculadosCurso(
	@cursoid int
)
AS
	BEGIN
		SELECT Estudiante.estudiantenombre, Estudiante.estudiantecedula FROM tbpepc AS Matricula 
INNER JOIN tbestudiante AS Estudiante ON Matricula.epcestudianteid = Estudiante.estudianteid
WHERE Matricula.epccursoid = @cursoid
	END
GO

CREATE PROCEDURE obtenerDesgloseNotaEstudiante(
	@estudianteid int,
	@cursoid int
)
AS
	BEGIN
		SELECT * FROM tbcurso AS Curso INNER JOIN tbpepc AS Matricula ON Curso.cursoid = Matricula.epccursoid 
		INNER JOIN tbestudiante AS Estudiante ON Estudiante.estudianteid = Matricula.epcestudianteid
		WHERE Estudiante.estudianteid = @estudianteid AND Curso.cursoid = @cursoid
	END
GO

CREATE PROCEDURE obtenerHistorialCursosEstudiante(
	 @estudianteid int
)
AS 
	BEGIN
		SELECT Curso.cursosigla,Curso.cursonombre,Matricula.epcciclo, Matricula.epcanio, Vigencia.vigenciadescripcion, (Matricula.epcexamen1
+Matricula.epcexamen2+Matricula.epcexamen3+Matricula.epctarea1+Matricula.epctarea2+Matricula.epcprueba1+Matricula.epcprueba2) AS Nota FROM tbpepc AS Matricula 
INNER JOIN tbcurso AS Curso ON Matricula.epccursoid = Curso.cursoid
INNER JOIN tbvigencia AS Vigencia ON Vigencia.vigenciaid = Curso.cursovigenciaid
WHERE Matricula.epcestudianteid = @estudianteid
	END
GO

CREATE PROCEDURE obtenerCarreraNombre(
	@carreraid int
)
AS
	BEGIN
		SELECT carreranombre FROM tbcarrera WHERE carreraid = @carreraid;
	END
GO

CREATE PROCEDURE actualizarPerfilEstudiante(
	@estudiantecedula int,
	@usuarioid int,
	@img varchar(255)
)
AS
	BEGIN TRY
			BEGIN TRANSACTION
				UPDATE tbusuario SET usuarioimgperfil = @img WHERE usuarioidentidad = @estudiantecedula
				AND usuarioid = @usuarioid
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al actualizar' AS mensaje
		END CATCH	
GO



/*-------------PROCEDIMIENTOS MARY---------------------*/

CREATE PROCEDURE obtenerCursos
AS
	BEGIN
		select * from tbcurso;
	END
GO


CREATE PROCEDURE actualizarCurso(
	@cursoid int,
	@cursovigenciaid int,
	@ciclo varchar(20)
)
AS
	
		BEGIN TRY
			BEGIN TRANSACTION
				update tbcurso set 		
				cursovigenciaid=@cursovigenciaid
				where cursoid=@cursoid;

				insert INTO tbhistorialcurso values (@cursoid,getdate(),'Finalizado',(SELECT DISTINCT epcciclo FROM tbpepc WHERE epccursoid = @cursoid AND epcanio =  YEAR(GETDATE()) AND epcciclo = @ciclo ))
			
				
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH	
	
GO


CREATE PROCEDURE obtenerTotalCursosProfesor(
	@profesorid int
)
AS
	BEGIN
		SELECT COUNT(cursoid) AS Total FROM tbcurso WHERE cursoprofesorid = @profesorid
	END
GO


CREATE PROCEDURE insertarUsuario(
	@usuarioid int,
	@usuariocedula int,
	@usuariopassword varchar(255),
	@usuarioestado int,
	@usuariotipo int,
	@usuarioimagen varchar(255)
)
AS
	
		BEGIN TRY
			BEGIN TRANSACTION
				INSERT INTO tbusuario(usuarioid,usuarioidentidad,usuariopassword,usuarioestado,usuariotipo,usuarioimgperfil)
				VALUES(@usuarioid,@usuariocedula,@usuariopassword,@usuarioestado,@usuariotipo,@usuarioimagen)
			
			COMMIT	
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH	
	
GO

CREATE PROCEDURE insertarProfesor(
	@profesorid int,
	@profesornombre varchar(255),
	@profesorcedula int,
	@profesoredad int,
	@profesorsexo char,
	@profesorexperiencia int,
	@profesorgrado varchar(255),
	@profesorusuarioid int
)
AS
	
	IF NOT EXISTS(SELECT * FROM tbprofesor WHERE profesorcedula = @profesorcedula)
		BEGIN TRY
			BEGIN TRANSACTION
				insert into tbprofesor (profesorid,profesornombre,profesorcedula,profesoredad,profesorsexo,profesorexperiencia,profesorgrado,profesorusuarioid)
				values (@profesorid,@profesornombre,@profesorcedula,@profesoredad,@profesorsexo,@profesorexperiencia,@profesorgrado,@profesorusuarioid)
				
			COMMIT			
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH		
	ELSE
		SELECT 'Ya existe este profesor' AS mensaje
GO


create procedure modificarProfesor(
@profesorid int,
@profesornombre varchar(255),
@profesorcedula int,
@profesoredad int,
@profesorsexo char(10),
@profesorexperiencia int,
@profesorgrado varchar(50)
)
as
	begin
		update tbprofesor set 		
		profesornombre=@profesornombre,
		profesorcedula=@profesorcedula,
		profesoredad=@profesoredad,
		profesorsexo=@profesorsexo,
		profesorexperiencia=@profesorexperiencia,
		profesorgrado=@profesorgrado
		where profesorid=@profesorid;
	end
go



CREATE PROCEDURE eliminarProfesor(
	@profesorid int
)
as
	begin
		DELETE FROM tbusuario WHERE usuarioid = (SELECT profesorusuarioid FROM tbprofesor WHERE profesorid = @profesorid)
		delete from tbprofesor where profesorid = @profesorid
		
	end

go

SELECT * FROM tbusuario
SELECT * FROM tbprofesor



CREATE PROCEDURE insertarEstudiante(
	@estudianteid int,
	@estudiantenombre varchar(255),
@estudiantecedula int,
@estudianteedad int,
@estudiantedireccion varchar(255),
@estudianteusuarioid int,
@estudiantecarreraid int,
@estudiantebecaid int
)
AS
	
	IF NOT EXISTS(SELECT * FROM tbestudiante WHERE estudiantecedula = @estudiantecedula)
		BEGIN TRY
			BEGIN TRANSACTION
				insert into tbestudiante (estudianteid,estudiantenombre,estudiantecedula,estudianteedad,estudiantedireccion,estudianteusuarioid,estudiantecarreraid,estudiantebecaid)
		values (@estudianteid,@estudiantenombre,@estudiantecedula,@estudianteedad,@estudiantedireccion,@estudianteusuarioid,@estudiantecarreraid,@estudiantebecaid)
				
			COMMIT			
		END TRY
		BEGIN CATCH
				ROLLBACK TRANSACTION	
				SELECT 'Error al agregar' AS mensaje
		END CATCH		
	ELSE
		SELECT 'Ya existe este estudiante' AS mensaje
GO

create PROCEDURE insertarCurso(
@cursosigla varchar(10),
@cursonombre varchar(150),
@cursocupo int,
@cursovigenciaid int,
@cursocarreraid int,
@cursoprofesorid int

	)
as
	begin
		insert into tbcurso (cursosigla,cursonombre,cursocupo,cursovigenciaid,cursocarreraid,cursoprofesorid)
		values (@cursosigla,@cursonombre,@cursocupo,@cursovigenciaid,@cursocarreraid,@cursoprofesorid)
	end
go


CREATE PROCEDURE eliminarEstudiante(
	@estudianteid int
)
as
	begin
		DELETE FROM tbusuario WHERE usuarioid = (SELECT estudianteusuarioid FROM tbestudiante WHERE estudianteid = @estudianteid)
		delete from tbestudiante where estudianteid = @estudianteid
	end

go



CREATE PROCEDURE eliminarCurso(
	@cursoid int
)
as
	begin
		delete from tbcurso where cursoid = @cursoid
	end

go



create procedure modificarEstudiante(
@estudianteid int,
@estudiantenombre varchar(255),
@estudiantecedula int,
@estudianteedad int,
@estudiantedireccion varchar(225),
@estudiantecarreraid int,
@estudiantebecaid int
)
as
	begin
		update tbestudiante set 		
		estudiantenombre=@estudiantenombre,
		estudiantecedula=@estudiantecedula,
		estudianteedad=@estudianteedad,
		estudiantedireccion=@estudiantedireccion,
		estudiantecarreraid=@estudiantecarreraid,
		estudiantebecaid=@estudiantebecaid
		where estudianteid=@estudianteid;
	end
go

create procedure modificarCurso(
@cursoid int,
@cursosigla varchar(10),
@cursonombre varchar(255),
@cursocupo int,
@cursovigenciaid int,
@cursocarreraid int,
@cursoprofesorid int
)
as
	begin
		update tbcurso set 		
		cursosigla=@cursosigla,
		cursonombre=@cursonombre,
		cursocupo=@cursocupo,
		cursovigenciaid=@cursovigenciaid,
		cursocarreraid=@cursocarreraid,
		cursoprofesorid=@cursoprofesorid
		where cursoid=@cursoid;
	end
go

create procedure obtenerProfesores
as
select * from tbprofesor

go


create procedure obtenerBecas
as
	select * from tbbeca

go

create procedure obtenerTipoBecas
(
	@tipobeca int
)
as
	select becatipo from tbbeca WHERE becaid = @tipobeca

go

create procedure obtenerTipoCarreras(
	@tipoid int
)
as
	select carreranombre from tbcarrera WHERE carreraid = @tipoid

go

create procedure obtenerVigencias
as
select * from tbvigencia

go

create procedure obtenerTipoVigencias(
	@vigenciaid int
)
as
select vigenciadescripcion from tbvigencia WHERE vigenciaid = @vigenciaid

go


CREATE PROCEDURE obtenerCursosPorProfesor(
	@profesorid int
)
AS
	BEGIN
		SELECT COUNT(Matricula.epcestudianteid) AS Total, Curso.cursonombre, Curso.cursosigla, Matricula.epcciclo
		FROM tbpepc AS Matricula
		INNER JOIN  tbcurso AS Curso
		ON Matricula.epccursoid = Curso.cursoid
		WHERE Curso.cursoprofesorid = @profesorid
		GROUP BY Curso.cursonombre, Curso.cursosigla, Matricula.epcciclo

	END
GO



/*----------------------------------------------------*/



CREATE VIEW verTotalEstudiantes AS
	SELECT COUNT(*) AS Total FROM tbestudiante

CREATE VIEW verTotalProfesores AS
	SELECT COUNT(*) AS Total FROM tbprofesor

CREATE VIEW verTotalCursos AS
	SELECT COUNT(*) AS Total FROM tbcurso

CREATE PROCEDURE obtenerTiempoRestanteAsignacionDias(
	@asignacionid int,
	@fecha date
)
AS
	BEGIN
		SELECT DATEDIFF(day, (SELECT asignacionfecha FROM tbasigprofesor WHERE asignacionid = @asignacionid), @fecha) AS tiempoRestanteDias;
	END
GO

CREATE PROCEDURE obtenerTiempoRestanteAsignacionHoras(
	@asignacionid int,
	@fecha date
)
AS
	BEGIN
		SELECT DATEDIFF(hour, (SELECT asignacionfecha FROM tbasigprofesor WHERE asignacionid = 13), '2022/11/14') AS tiempoRestanteHoras;
	END
GO


CREATE PROCEDURE obtenerHistorialCursosProfesor(
	@profesorid int
)
AS
	BEGIN
		SELECT DISTINCT Curso.cursosigla,Curso.cursonombre,Asignado.epcciclo,Asignado.epcanio,Vigencia.vigenciadescripcion  FROM tbcurso AS Curso
		LEFT JOIN tbprofesor AS Profesor ON Curso.cursoprofesorid = Profesor.profesorid
		LEFT JOIN tbpepc AS Asignado ON Asignado.epccursoid = Curso.cursoid
		INNER JOIN tbvigencia AS Vigencia ON Curso.cursovigenciaid = Vigencia.vigenciaid
		WHERE Profesor.profesorid = @profesorid

		
	END
GO


/*DATOS DEFAULT IMPORTANTE*/
INSERT INTO tbtipousuario(tipoid,tipodescripcion) VALUES(1,'Administrador');
INSERT INTO tbtipousuario(tipoid,tipodescripcion) VALUES(2,'Profesor');
INSERT INTO tbtipousuario(tipoid,tipodescripcion) VALUES(3,'Estudiante');

INSERT INTO tbvigencia(vigenciaid,vigenciadescripcion) VALUES(1, 'Activo');
INSERT INTO tbvigencia(vigenciaid,vigenciadescripcion) VALUES(2, 'Finalizado');

INSERT INTO tbcarrera(carreraid, carreranombre) VALUES(1,'Ingeniería en Sistemas');
INSERT INTO tbcarrera(carreraid, carreranombre) VALUES(2,'Mercadeo Internacional');
INSERT INTO tbcarrera(carreraid, carreranombre) VALUES(3,'Administración');
INSERT INTO tbcarrera(carreraid, carreranombre) VALUES(4,'Administración de oficinas');
INSERT INTO tbcarrera(carreraid, carreranombre) VALUES(5,'Inglés');

INSERT INTO tbbeca(becaid,becatipo) VALUES(1, 'No aplica');
INSERT INTO tbbeca(becaid,becatipo) VALUES(2, 'Luis Felipe');
INSERT INTO tbbeca(becaid,becatipo) VALUES(3, 'Omar Dengo');

/*USUARIO DEFAULT IMPORTANTE*/
INSERT INTO tbusuario(usuarioid,usuarioidentidad,usuariopassword,usuarioestado,usuariotipo,usuarioimgperfil)
VALUES(1,12345678,12345,0,1,NULL)
