CREATE DATABASE seleccion_personal; 

use seleccion_personal; 

CREATE TABLE candidato 
 (
 id_candidato INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 identificacion VARCHAR(20) not null,
 nombre VARCHAR (50),
 direccion VARCHAR (100),
 telefono VARCHAR (20),
 numero_hijos INT (50),
 genero VARCHAR (1),
 estado_civil VARCHAR (20),
 numero_mascotas INT,
 nivel_escolaridad VARCHAR (20)
 );
 
 CREATE TABLE empresa 
 (
 id_empresa INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 nit VARCHAR(20) not null,
 representante VARCHAR (50),
 nombre_empresa VARCHAR (50),
 direccion VARCHAR (100),
 telefono VARCHAR (20)
 );
 
 CREATE TABLE prueba 
 (
 id_prueba INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 fecha_star DATE,
 fecha_end DATE,
 cargo VARCHAR (20),
 id_empresa INT NOT NULL,
 FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa)
 );
 
  CREATE TABLE intentos
 (
 id_candidato INT NOT NULL,
 id_prueba INT NOT NULL,
 FOREIGN KEY (id_candidato) REFERENCES candidato(id_candidato),
 FOREIGN KEY (id_prueba) REFERENCES prueba(id_prueba)
 );
 
 CREATE TABLE preguntas
 (
 id_pregunta INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 pregunta VARCHAR (200),
 opcion_a VARCHAR (200),
 opcion_b VARCHAR (200),
 opcion_c VARCHAR (200),
 opcion_d VARCHAR (200),
 id_prueba INT NOT NULL,
 FOREIGN KEY (id_prueba) REFERENCES prueba(id_prueba)
 );
 
 CREATE TABLE respuestas
 (
 id_respuesta INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 respuesta VARCHAR (200),
 id_pregunta INT NOT NULL,
 FOREIGN KEY (id_pregunta) REFERENCES preguntas(id_pregunta)
 );
 
 INSERT INTO candidato ( identificacion, nombre, direccion, telefono, numero_hijos, genero, estado_civil, numero_mascotas, nivel_escolaridad) VALUES
('201805744', 'ADRIANA CAROLINA HERNANDEZ MONTERROZA', 'Calle 10 No. 9 - 78  Centro', '3112572665', 0, 'F', 'Soltero(a)', 0, 'Tecnico'),
('897796057', 'ALEJANDRO ABONDANO ACEVEDO', 'Carrera 56A No. 51 - 81', '3114572983', 1, 'M', 'Casado(a)', 3, 'Tecnologo'),
('395816752', 'ANGELICA LISSETH BLANCO CONCHA', 'Carrera 22 No. 17-31', '3111573770', 2, 'F', 'Viudo(a)', 0, 'Superior'),
('647356633', 'CARLOS DIDIER CASTAÑO CONTRERAS', 'Carrera 54 No. 68 - 80 Barrio el Prado', '3116573087', 1, 'M', 'Casado(a)', 0, 'Pregrado'),
('749174285', 'CAROL RUCHINA GOMEZ GIANINE', 'Calle 59 No. 27 - 35 Barrio Galán', '3111574118', 1, 'F', 'Soltero(a)', 3, 'Tecnologo'),
('242110097', 'CLAUDIA LILIANA TORRES FRIAS', 'Carrera 10A No. 20 - 40  Edificio El Clarín piso 3 Centro La Matuna', '3118574632', 0, 'F', 'Divorciado(a)', 0, 'Posgrado'),
('419238330', 'CINTHYA FERNANDA DUSSÁN GUZMÁN', 'Carrera 8  No. 20 - 59', '3111575254', 1, 'F', 'Casado(a)', 0, 'Tecnico'),
('793163537', 'DANIELA KATHERINNE SUARIQUE ÁVILA', 'Calle 20 No. 22 - 27 piso 3 Edificio Cumanday', '3112575789', 0, 'F', 'Soltero(a)', 1, 'Tecnico'),
('261332827', 'DENY MARCELA MUÑOZ LIZARAZO', 'Carrera 8a No. 7 - 88 /94  Barrio  La Estrella', '3111576398', 3, 'F', 'Soltero(a)', 0, 'Tecnica'),
('745376756', 'DIEGO ALEJANDRO FORERO PEÑA ', 'Carrera  5 No. 3 -74  centro', '3118576801', 0, 'M', 'Casado(a)', 2, 'Tecnologo'),
('638038806', 'ESTEWIL CARLOS QUESADA CALDERÍN', 'Calle 15 No. 9 - 56 centro', '3111577426', 0, 'M', 'Soltero(a)', 0, 'Posgrado'),
('829922316', 'FABIAN ANDRES FINO ANDRADE', 'Calle 25 No. 4 - 38 piso 2  Barrio Pandeyuca', '3111577644', 0, 'M', 'Soltero(a)', 0, 'Bachiller'),
('114839685', 'GABRIEL FELIPE HERRERA MORENO', 'Calle 28 No. 8 - 69 CENTRO', '3116578957', 1, 'M', 'Divorciado(a)', 0, 'Pregrado'),
('119741682', 'GABRIEL MAURICIO NIETO BUSTOS', 'Carrera 7A No. 32 - 63 piso 2', '3114578148', 0, 'M', 'Soltero(a)', 1, 'Bachiller'),
('149588567', 'GLORIA PATRICIA MENDOZA ALVEAR', 'Calle 7 No. 5 - 25  Edificio Segunda', '3111578888', 1, 'F', 'Soltero(a)', 0, 'Bachiller'),
('595796933', 'HUGO ANDRÉS CAMARGO VARGAS', 'Carrera 9  No. 7 - 34', '3113579212', 0, 'M', 'Soltero(a)', 0, 'Tecnologo'),
('226373740', 'IVÁN DAVID CORAL BURBANO', 'Calle 20 No. 3 - 22', '3112579760', 2, 'M', 'Divorciado(a)', 0, 'Bachiller'),
('609717225', 'IVONNE JOULIETTE BARRERA LOPEZ', 'Calle 33B  No. 38 - 42  Barrio Barzal', '3111579455', 0, 'F', 'Viudo(a)', 4, 'Posgrado'),
('257005875', 'JORGE MARIO OROZCO DUSSÁN', 'Calle 16 No. 23 - 57 piso 4  Edificio Autoservicio Abraham Delgado', '3111579155', 1, 'M', 'Casado(a)', 0, 'Bachiller');

INSERT INTO empresa ( nit, nombre_empresa, representante, direccion, telefono) VALUES
( '496337751', 'IKEA', 'ACEVEDO MANRÍQUEZ MARÍA MIREYA', 'Calle 10 No. 9 - 78  Centro', '3127906861'),
( '638715039', 'CANON', 'ACEVEDO MEJÍA ENRIQUE', 'Carrera 56A No. 51 - 81', '3139866373'),
( '521523795', 'LEGO', 'ACOSTA CANTO TOMÁS JOSÉ', 'Carrera 22 No. 17-31', '3119791059'),
( '215965867', 'SONY', 'ACOSTA GÁMEZ CELINA', 'Carrera 54 No. 68 - 80 Barrio el Prado', '3156700107'),
( '580844558', 'HAAGEN DASZ', 'AGUILAR FEMUS MARÍA CELIA', 'Calle 59 No. 27 - 35 Barrio Galán', '3191486150'),
( '329629232', 'WD-40', 'AGUILAR PÉREZ FREDY FRANCISCO', 'Carrera 10A No. 20 - 40  Edificio El Clarín piso 3 Centro La Matuna', '3196260502'),
( '756133933', 'YAHOO', 'ALARCON LICONA SALOMON', 'Carrera 8  No. 20 - 59', '3188215173'),
( '894542640', 'PEPSI', 'ALBERTO SEMPERE TORTOSA', 'Calle 20 No. 22 - 27 piso 3 Edificio Cumanday', '3188825728'),
( '724968925', 'GOOGLE', 'ÁLVARO ORTEGA GONZÁLEZ', 'Carrera 8a No. 7 - 88 /94  Barrio  La Estrella', '3176907287'),
( '899838970', 'VIRGIN', 'ARIADNA TORMO MARTÍNEZ', 'Carrera  5 No. 3 -74  centro', '3108282765'),
( '870532501', 'BLACKBERRY', 'CARLOS GINER LAGUARDA', 'Calle 15 No. 9 - 56 centro', '3151192347'),
( '516449920', 'SPOTYFY', 'CRISTINA SAINZ MARTÍNEZ', 'Calle 25 No. 4 - 38 piso 2  Barrio Pandeyuca', '3147354030'),
( '739366167', 'ORACLE', 'DANIEL PAREJO PULIDO', 'Calle 28 No. 8 - 69 CENTRO', '3198444859'),
( '106352472', 'STARBUCKS', 'DARINA STEFANOVA HRISTOVA', 'Carrera 7A No. 32 - 63 piso 2', '3138729049'),
( '418949532', 'REEBOK', 'DAVID GUTIÉRREZ MÉRIDA', 'Calle 7 No. 5 - 25  Edificio Segunda', '3163143004'),
( '145633319', 'SKYPE', 'HUGO CANO FERNÁNDEZ', 'Carrera 9  No. 7 - 34', '3190278987'),
( '615604118', 'AMAZON', 'JOAQUÍN VILA GARCÍA', 'Calle 20 No. 3 - 22', '3150431063'),
( '686328344', 'Paf Paf', 'JUAN PABLO MANTILLA OLIVEROS', 'Calle 33B  No. 38 - 42  Barrio Barzal', '3146691172'),
( '542335059', 'Coatlicue', 'LETICIA RODRÍGUEZ MONTES', 'Calle 16 No. 23 - 57 piso 4  Edificio Autoservicio Abraham Delgado', '3198353393');

INSERT INTO prueba ( fecha_star, fecha_end, cargo, id_empresa) VALUES
( '2021-03-01', '2021-03-02', 'Lider Componente', 1),
( '2021-11-03', '2021-11-04', 'Soporte TI', 2),
( '2020-12-11', '2021-12-12', 'Auxiliar Contable', 3);

INSERT INTO intentos ( id_candidato, id_prueba) VALUES
( 1, 3),
( 2, 2),
( 3, 1),
( 4, 3),
( 5, 2),
( 6, 1),
( 7, 2),
( 8, 3),
( 9, 3),
( 10, 2),
( 11, 1),
( 12, 1),
( 13, 2),
( 14, 3),
( 15, 3),
( 16, 2),
( 17, 1),
( 18, 2),
( 19, 1),
( 1, 2),
( 3, 3),
( 8, 3),
( 1, 2),
( 4, 1),
( 19, 2),
( 6, 3),
( 9, 1),
( 12, 3),
( 15, 2),
( 7, 1);

INSERT INTO preguntas ( pregunta, opcion_a, opcion_b, opcion_c, opcion_d, id_prueba) VALUES
( '¿Cuál es la letra que más se repite?: a b a z m a b a z m a b a z m a b a z a b a m b a', 'b', 'z', 'a', 'm', 1),
( 'Señala el sinónimo correspondiente de la palabra ESPAÑOL', 'Católico', 'Peninsular', 'Patriótico', 'Hispano', 1),
( 'Sigue la secuencia 6, 1, 8, 3, 10, ?', '7', '4', '12', '5', 1),
( 'Señale la palabra que no pertenece al grupo:', 'Cola', 'Tamiz', 'clip', 'Clavo', 1),
( ' Indica entre las siguientes palabras cuál es el antónimo de la palabra ESOTÉRICO', 'Misterioso', 'Velado', 'Público', 'Subrepticio', 1),
( 'Indica entre las siguientes palabras cuál es el antónimo de la palabra SEGREGAR', 'Fusionar', 'Reprobar', 'Gotear', 'Supurar', 1),
( 'Señala el sinónimo correspondiente de la palabra CONSUMADO', 'Duplicado', 'Correcto', 'Algébrico', 'Perfecto', 1),
( 'Encuentra los operadores para conseguir que el resultado de la operación sea correcto: 2 ? 7 ? 4 = -9', '--.-', '-*.-', '-, -', 'x, -', 1),
( 'OYENTE es a RECEPTOR como LOCUTOR es a ...', 'Interferencia', 'Emisor', 'Medio', 'Canal', 1),
( '¿Qué letra continúa la serie? (no cuenta la W) F G F G H I H I J K J ...', 'L', 'H', 'K', 'I', 1),
( 'Qué número sigue la secuencia 7, 10, 14, 19, 25,', '32', '27', '31', '21', 1),
( 'Averigua las incógnitas para que el resultado de la operación sea el correcto: ? ? 12 x ? = ?', '1, -, 2, -22', '1, +, 1, 12', '2, -, 4, 40', '12, +, 5, 72', 1),
( '... es a RESPONDER como PROBLEMA es a ...', 'Sí – Contestar', 'Pregunta – Saber', 'Pregunta – Resolver', 'Resolver – Calcular', 1),
( '¿Qué letra continúa la serie? (no cuenta la W) F G F G H I H I J K J ...', 'H', 'L', 'I', 'K', 1),
( '... es a VERSO como ESCULTOR es a ...', 'Músico - Estatua', 'Poeta - Artista', 'Reverso - Artista', 'Poeta - Estatua', 1),
( 'Dados dos nombres 1) José Maria Manzana y 2) Chema Manzana señale la etiqueta correspondiente según las reglas', 'NAI', 'NA', 'NNA', 'NN', 1),
( 'Observe el conjunto de piezas de dominó de colores  y seleccione la opción de la ficha ?:', 'A.', 'D.', 'C.', 'B.', 1),
( 'Señale cuál de las siguientes series de palabras sigue un orden alfabético correcto:', 'Máxima', 'Sentencia', 'Comentario', 'Adagio', 1),
( 'Señale cuál de las siguientes series de palabras sigue un orden alfabético correcto:', 'zurra, zurrar, zurrón, zutano, zurriagazo, zurriago', 'zoo, zoófago, zoológico, zoomorfo, zoólogo, zoom', 'zarina, zarpa, zarpar, zarpazo, zarza, zarzal', 'zapa, zapata, zapatear, zapatería, zapatero, zapato', 1),
( 'Si tenemos que las consonantes mayúsculas valen 3, las vocales minúsculas valen 4, las consonantes minúsculas valen 2 y las vocales mayúsculas valen 6, ¿Cuánto vale la palabra Encomendar?', '6442424424', '6224242242', '6224342232', '3224242242', 1),
( 'Sigue la serie A B B C D D E F F G H ...', 'I', 'G', 'H', 'F', 1),
( 'Completa la serie: 2h 6H 8j 12J 14l 18L 20n 20N ?', '22P', '22q', '24Q', '22o', 1),
( 'Continúa la secuencia 7, 6, 13, 19, 32,', '45', '56', '38', '51', 1),
( '¿Qué número da el mismo resultado al multiplicarlo por dos que al elevarlo al cuadrado?', '1', '2', 'Todos', 'Ninguno', 1),
( '¿Qué número resultaría de elevar a la cuarta 2 y hacer su raíz cuadrada?', '4', '6', '2', '3', 1),
( 'Según la siguiente imagen  seleccione la opcion que corresponda con el modelo:', 'B', 'C', 'A', 'D', 1),
( '¿Qué número continúa la serie: 3 - 4 - 4 - 6 - 6 - 9 - 9 - 13 - ... ?', '14', '15', '16', '13', 1),
( 'DECAPITAR es a ... como AHORCAR es a ...', 'Guillotina – Soga', 'Ajusticiar – Soga', 'Hacha – Guillotinar', 'Soga – Ajusticiar', 1),
( 'Continúa la secuencia 25, 1, 24, 2, 23,', '4', '22', '21', '3', 1),
( 'Señale cuál de las siguientes series de palabras sigue un orden alfabético correcto:', 'hidrógeno, hidrografía, hidrográfico, hidrómetro, hidrólisis, hidromiel', 'hábil, habilidad, habilidoso, habilitación, habilitado, habilitar', 'hartar, hartazgo, harto, hastío, hasta, hastiar', 'hélice, helicoidal, helicoide, helipuerto, helicóptero, helióstato', 1),
( 'Encuentra los operadores para conseguir que el resultado de la operación sea correcto: 1 ? 2 ? 1 = 4', 'x, x', '-, +', 'x, +', 't, t', 1),
( 'Sigue la serie A X B Y C Z A X B Y C Z A X B ...', 'A', 'C', 'X', 'Y', 1),
( 'Si ANALIZAR es a 21245627 y ASTUTO es a 238089, ILUSTRAR es a ...', '54307827', '54038727', '56138727', '54838727', 1),
( 'Señala la palabra que está incorrectamente escrita:', 'Esceder', 'Expedición', 'Diabólico', 'Dígito', 1),
( 'Señala la palabra que está incorrectamente escrita:', 'Fémur', 'Monge', 'Clásico', 'Desdorar', 1),
( ' Un fotógrafo realiza 353 fotografías por semana. ¿Cuántas fotografías realizará en 42 días?', '2271', '2371', '2571', '2471', 1),
( 'Señala la palabra que está incorrectamente escrita:', 'Clavel', 'Disfráz', 'Esotérico', 'Breve', 1),
( 'Sigue la serie A A B A B C C D C D E E F ...', 'G', 'H', 'F', 'E', 1),
( 'Sigue la secuencia 72, 12, 83, 23, 94, ?', '34', '36', '63', '82', 1),
( 'Indica entre las siguientes palabras cuál es el sinónimo de la palabra ADICIÓN', 'Holganza', 'Suma', 'Resta', 'Fe', 1),
( ' La palabra COPISTERIA es al nº 1234567849 como el nº 14196841789 es a la palabra:', 'ciertamente', 'cicatricera', 'catarata', 'pastelería', 1),
( '¿Qué número al elevarlo al cuadrado obtenemos el mismo resultado que si lo multiplicamos por sí mismo?', '2', '1', 'Todos', 'Ninguno', 1),
( 'Indica entre las siguientes palabras cuál es el antónimo de la palabra ELISIÓN', 'Oratoria', 'Supresión', 'Exclusión', 'Conservación', 1),
( 'Señale la palabra que no pertenece al grupo:', 'Ojos', 'Piernas', 'Manos ', 'Adornos', 1),
( 'Señala el sinónimo correspondiente de la palabra AFRENTOSO', 'Juicioso', 'Frontal', 'Imponente', 'Denigrante', 1),
( '... es a PRISIÓN como LOUVRE es a ...', 'Carcelero – Artista', 'Crimen – Artista', 'Carcelero – Francia', 'Bastilla – Museo', 1),
( 'Realiza la siguiente operación: ((-8)-6-(-4))/5 = ?', '-2', '-4', '2', '3', 1),
( 'Cierta tela después de ser lavada se encoge 1/5 de su longitud y 1/6 de su ancho. ¿Cuántos metros deben comprarse para que después de lavada se disponga de 96 metros cuadrados, sabiendo que el ancho original es de 80cm?', '180m', '210m', '160m', '200m', 1),
( 'Completa la serie: B 3 E 9 H 37 K ...', '81', '58', '36', '99', 1),
( 'La palabra EROTOMANIA es al nº 1234356786 como el nº 532173 es a la palabra:', 'Ramona', 'erosión', 'ermita', 'moreno', 1),
( 'Si tengo el cuádrupo de 8 euros y Luis tiene el doble de la mitad de lo que yo poseo más cinco. ¿Cuántos euros tiene Luis?', '37', '29', '32', '36', 1),
( 'Señale la palabra que no pertenece al grupo:', 'Viajero', 'Efímero', 'Cabreo', 'Transitorio', 1),
( 'Indica entre las siguientes palabras cuál es el antónimo de la palabra ETÉREO', 'Grácil', 'Ideal', 'Material', 'Intangible', 1),
( 'En la siguiente serie hay un número equivocado, que no corresponde con la serie. Señala el número que debería ir en su lugar: 2, 4, 6, 5, 10, 12, 11, 21, 24, 23', '25', '22', '23', '27', 1),
( 'Realiza la siguiente operación: (12/4)% de 68 = ?', '2.26', '22.6', '2.04', '20.4', 1),
( '... es a LLUVIA como DIQUE es a ...', 'Nube - Riesgo', 'Paraguas - Inundación', 'Barro - Arena', 'Agua - Crecida', 1),
( 'Señala la palabra que está incorrectamente escrita:', 'Décimo', 'Extensión', 'Mimica', 'Ventisca', 1),
( 'Sigue la secuencia (valen las letras dobles) A, C, E, G, I, K, LL, N, ...', 'H', 'O', 'M', 'P', 1),
( 'Señala la palabra que está incorrectamente escrita:', 'Maíz', 'Léxico', 'Autómata', 'Diávolo', 1),
( '... es a ASONANTE como CONSOLARSE es a ...', 'Suena - Solar', 'Solar - Consolar', 'Consonante - Asolarse', 'Disonante - Enfadarse', 1),
( 'Señala el sinónimo correspondiente de la palabra FALAZ', 'Fatal', 'Vividor', 'Faltón', 'Impostor', 2),
( 'Encuentra los números para conseguir que el resultado de la operación sea el correcto: 14 x ? / ? = 10', '44, 83', '43, 52', '14, 10', '44, 46', 2),
( 'Sigue la secuencia: S C M V ...', 'G', 'F', 'I', 'H', 3),
( 'Señale la palabra que no pertenece al grupo:', 'Sincero', 'Franco', 'Veraz', 'Falso', 3);

INSERT INTO respuestas ( respuesta, id_pregunta) VALUES
( 'a', 1),
( 'Hispano', 2),
( '5', 3),
( 'Tamiz', 4),
( 'Público', 5),
( 'Fusionar', 6),
( 'Perfecto', 7),
( '-, -', 8),
( 'Emisor', 9),
( 'K', 10),
( '32', 11),
( '12, +, 5, 72', 12),
( 'Pregunta – Resolver', 13),
( 'K', 14),
( 'Poeta - Estatua', 15),
( 'NN', 16),
( 'B.', 17),
( 'Comentario', 18),
( 'zapa, zapata, zapatear, zapatería, zapatero, zapato', 19),
( '6224242242', 20),
( 'H', 21),
( '22o', 22),
( '51', 23),
( '2', 24),
( '4', 25),
( 'D', 26),
( '13', 27),
( 'Guillotina – Soga', 28),
( '3', 29),
( 'hábil, habilidad, habilidoso, habilitación, habilitado, habilitar', 30),
( 't, t', 31),
( 'Y', 32),
( '54038727', 33),
( 'Esceder', 34),
( 'Monge', 35),
( '2471', 36),
( 'Disfráz', 37),
( 'E', 38),
( '34', 39),
( 'Suma', 40),
( 'cicatricera', 41),
( 'Todos', 42),
( 'Conservación', 43),
( 'Adornos', 44),
( 'Denigrante', 45),
( 'Bastilla – Museo', 46),
( '-2', 47),
( '180m', 48),
( '81', 49),
( 'moreno', 50),
( '37', 51),
( 'Cabreo', 52),
( 'Material', 53),
( '22', 54),
( '2.04', 55),
( 'Paraguas - Inundación', 56),
( 'Mimica', 57),
( 'O', 58),
( 'Diávolo', 59),
( 'Consonante - Asolarse', 60),
( 'Impostor', 61),
( '44, 83', 62),
( 'F', 63),
( 'Falso', 64);

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

--Registrar respuesta de candidato
UPDATE respuestas
SET respuestas.respuesta = '', City= 'Frankfurt'
WHERE CustomerID = 1;

