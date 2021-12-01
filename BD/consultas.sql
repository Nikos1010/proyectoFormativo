-- Consulta de numero de pruebas de candidato
SELECT candidato.identificacion, candidato.nombre, COUNT(candidato.identificacion) AS numero_pruebas
FROM candidato
INNER JOIN intentos ON candidato.id_candidato = intentos.id_candidato
GROUP BY candidato.identificacion;

-- Muestra preguntas de una prueba
SELECT prueba.id_prueba, prueba.cargo, preguntas.id_pregunta, preguntas.pregunta
FROM prueba
INNER JOIN preguntas ON prueba.id_prueba = preguntas.id_prueba;

-- Mostrar respuestas
SELECT * FROM preguntas;

-- Insertar respuestas de pregunta del candidato **
-- ¿¿¿??? Revisar despues
INSERT INTO respuestas ( respuesta, id_pregunta, id_intento) VALUES
( 'a', 1, 1), 

-- Informacion de la prueba presentada
SELECT prueba.id_prueba, prueba.fecha_inicio, prueba.fecha_final, candidato.nombre, empresa.empresa, prueba.cargo
FROM prueba
INNER JOIN empresa ON prueba.id_empresa = empresa.id_empresa
INNER JOIN intentos ON prueba.id_prueba = intentos.id_prueba
INNER JOIN candidato ON intentos.id_candidato = candidato.id_candidato;

-- Consulta preguntas-respuestas pares de una prueba del candidato
SELECT candidato.nombre, prueba.id_prueba, preguntas.numero, preguntas.pregunta, respuestas.respuesta 
FROM preguntas
INNER JOIN prueba ON preguntas.id_prueba = prueba.id_prueba
INNER JOIN respuestas ON preguntas.id_pregunta = respuestas.id_respuesta
INNER JOIN intentos ON prueba.id_prueba = intentos.id_prueba
INNER JOIN candidato ON intentos.id_candidato = candidato.id_candidato
WHERE candidato.id_candidato = 3 
AND ( preguntas.id_pregunta % 2 ) = 0
AND prueba.id_prueba = 1;

--Gestion de empresa --

--Agregar una empresa
INSERT INTO empresa (nit, empresa, representante, direccion, telefono) VALUES
('23456789', 'KAISER', 'EL JUNIOR DE LOS JUNIOR', 'Cra 28 #5-45 B/Detras del ultimo no hay nadie', '545698');

--Modificar datos de una empresa
UPDATE empresa
SET empresa.nit = '22222222', empresa.empresa= 'Globant', empresa.representante = 'ALBERTO ANTONIO DE LAS NIEVES', empresa.direccion = 'Calle 555 B/Que haces ahi bro', empresa.telefono ='35698752'
WHERE empresa.id_empresa = 1;

--Eliminar una empresa
DELETE FROM empresa 
WHERE empresa.id_empresa=20;

--Consultar empresa por NIT
SELECT empresa.nit, empresa.empresa, empresa.representante, empresa.direccion, empresa.telefono
FROM empresa
WHERE empresa.nit = '22222222';

--Listar empresa
SELECT *
FROM empresa;

--Gestion de candidato --

--Agregar un candidato
INSERT INTO candidato (identificacion, nombre, direccion, telefono, hijos, genero, estado_civil, mascotas, escolaridad) VALUES
('1111111', 'YAMILE PERDOMO', 'Calle 120-56 A B/ Los rosales', '23648541', 2, 'F', 'Soltero', 3, 'Superior');

--Modificar datos de un candidato
UPDATE candidato
SET candidato.identificacion = '123456789', candidato.nombre = 'OSCAR MANUEL DE LOS ROSALES', candidato.direccion = 'Calle 55 #66-80 B/Marianita', candidato.telefono = '88856974', candidato.hijos =3, candidato.genero = 'M', candidato.estado_civil = 'Casado', candidato.mascotas = 0, candidato.escolaridad = 'Primaria'
WHERE candidato.id_candidato = 1;

--Eliminar un candidato
DELETE FROM candidato 
WHERE candidato.id_candidato=20;

--Consultar candidato por Cedula
SELECT * FROM candidato
WHERE candidato.identificacion = '123456789';

--Listar candidato
SELECT *
FROM candidato;