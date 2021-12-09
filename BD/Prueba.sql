DROP SCHEMA IF EXISTS seleccion_personal;

CREATE DATABASE seleccion_personal; 

use seleccion_personal; 

CREATE TABLE candidato 
 (
 id_candidato INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 identificacion VARCHAR(50) not null,
 nombre VARCHAR (50),
 direccion VARCHAR (100),
 telefono VARCHAR (20),
 hijos INT,
 genero VARCHAR (10),
 estado_civil VARCHAR (20),
 mascotas INT,
 escolaridad VARCHAR (20)
 );
 
 CREATE TABLE empresa 
 (
 id_empresa INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 nit VARCHAR(20),
 empresa VARCHAR (50),
 representante VARCHAR (50),
 direccion VARCHAR (100),
 telefono VARCHAR (20)
 );
 
 CREATE TABLE prueba 
 (
 id_prueba INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 fecha_inicio DATE,
 fecha_final DATE,
 cargo VARCHAR (20),
 id_empresa INT NOT NULL,
 FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa)
 );
 
  CREATE TABLE intentos
 (
 id_intento INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
 id_candidato INT NOT NULL,
 id_prueba INT NOT NULL,
 FOREIGN KEY (id_candidato) REFERENCES candidato(id_candidato),
 FOREIGN KEY (id_prueba) REFERENCES prueba(id_prueba)
 );
 
 CREATE TABLE preguntas
 (
 id_pregunta INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
 numero INT,
 pregunta VARCHAR (500),
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
 id_intento INT NOT NULL,
 FOREIGN KEY (id_pregunta) REFERENCES preguntas(id_pregunta),
 FOREIGN KEY (id_intento) REFERENCES intentos(id_intento)
 );
 
 INSERT INTO candidato ( identificacion, nombre, direccion, telefono, hijos, genero, estado_civil, mascotas, escolaridad) VALUES
("201805744", "ADRIANA CAROLINA HERNANDEZ MONTERROZA", "Calle 10 No. 9 - 78  Centro", "3112572665", 0, "F", "Soltero(a)", 0, "Tecnico"),
("897796057", "ALEJANDRO ABONDANO ACEVEDO", "Carrera 56A No. 51 - 81", "3114572983", 1, "M", "Casado(a)", 3, "Tecnologo"),
("395816752", "ANGELICA LISSETH BLANCO CONCHA", "Carrera 22 No. 17-31", "3111573770", 2, "F", "Viudo(a)", 0, "Superior"),
("647356633", "CARLOS DIDIER CASTAÑO CONTRERAS", "Carrera 54 No. 68 - 80 Barrio el Prado", "3116573087", 1, "M", "Casado(a)", 0, "Pregrado"),
("749174285", "CAROL RUCHINA GOMEZ GIANINE", "Calle 59 No. 27 - 35 Barrio Galán", "3111574118", 1, "F", "Soltero(a)", 3, "Tecnologo"),
("242110097", "CLAUDIA LILIANA TORRES FRIAS", "Carrera 10A No. 20 - 40  Edificio El Clarín piso 3 Centro La Matuna", "3118574632", 0, "F", "Divorciado(a)", 0, "Posgrado"),
("419238330", "CINTHYA FERNANDA DUSSÁN GUZMÁN", "Carrera 8  No. 20 - 59", "3111575254", 1, "F", "Casado(a)", 0, "Tecnico"),
("793163537", "DANIELA KATHERINNE SUARIQUE ÁVILA", "Calle 20 No. 22 - 27 piso 3 Edificio Cumanday", "3112575789", 0, "F", "Soltero(a)", 1, "Tecnico"),
("261332827", "DENY MARCELA MUÑOZ LIZARAZO", "Carrera 8a No. 7 - 88 /94  Barrio  La Estrella", "3111576398", 3, "F", "Soltero(a)", 0, "Tecnica"),
("745376756", "DIEGO ALEJANDRO FORERO PEÑA ", "Carrera  5 No. 3 -74  centro", "3118576801", 0, "M", "Casado(a)", 2, "Tecnologo"),
("638038806", "ESTEWIL CARLOS QUESADA CALDERÍN", "Calle 15 No. 9 - 56 centro", "3111577426", 0, "M", "Soltero(a)", 0, "Posgrado"),
("829922316", "FABIAN ANDRES FINO ANDRADE", "Calle 25 No. 4 - 38 piso 2  Barrio Pandeyuca", "3111577644", 0, "M", "Soltero(a)", 0, "Bachiller"),
("114839685", "GABRIEL FELIPE HERRERA MORENO", "Calle 28 No. 8 - 69 CENTRO", "3116578957", 1, "M", "Divorciado(a)", 0, "Pregrado"),
("119741682", "GABRIEL MAURICIO NIETO BUSTOS", "Carrera 7A No. 32 - 63 piso 2", "3114578148", 0, "M", "Soltero(a)", 1, "Bachiller"),
("149588567", "GLORIA PATRICIA MENDOZA ALVEAR", "Calle 7 No. 5 - 25  Edificio Segunda", "3111578888", 1, "F", "Soltero(a)", 0, "Bachiller"),
("595796933", "HUGO ANDRÉS CAMARGO VARGAS", "Carrera 9  No. 7 - 34", "3113579212", 0, "M", "Soltero(a)", 0, "Tecnologo"),
("226373740", "IVÁN DAVID CORAL BURBANO", "Calle 20 No. 3 - 22", "3112579760", 2, "M", "Divorciado(a)", 0, "Bachiller"),
("609717225", "IVONNE JOULIETTE BARRERA LOPEZ", "Calle 33B  No. 38 - 42  Barrio Barzal", "3111579455", 0, "F", "Viudo(a)", 4, "Posgrado"),
("257005875", "JORGE MARIO OROZCO DUSSÁN", "Calle 16 No. 23 - 57 piso 4  Edificio Autoservicio Abraham Delgado", "3111579155", 1, "M", "Casado(a)", 0, "Bachiller");

INSERT INTO empresa ( nit, empresa, representante, direccion, telefono) VALUES
( "496337751", "IKEA", "ACEVEDO MANRÍQUEZ MARÍA MIREYA", "Calle 10 No. 9 - 78  Centro", "3127906861"),
( "638715039", "CANON", "ACEVEDO MEJÍA ENRIQUE", "Carrera 56A No. 51 - 81", "3139866373"),
( "521523795", "LEGO", "ACOSTA CANTO TOMÁS JOSÉ", "Carrera 22 No. 17-31", "3119791059");

INSERT INTO prueba ( fecha_inicio, fecha_final, cargo, id_empresa) VALUES
( "2021-03-01", "2021-03-02", "Lider Componente", 1),
( "2021-11-03", "2021-11-04", "Soporte TI", 2),
( "2020-12-11", "2021-12-12", "Auxiliar Contable", 3);

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

INSERT INTO preguntas ( numero, pregunta, opcion_a, opcion_b, opcion_c, opcion_d, id_prueba) VALUES
( 1, "Make friends easily", "Hago amigos fácilmente", "Hacer algo más complicado de lo que es", "Te quiero mucho/Me gustas mucho.", "¿Puedo hablar con el responsable?", 1),
( 2, "Warm up quickly to others", "Acertar", "Me intereso rápidamente por los demás", "Ser un descarriado, ser el que no tiene éxito", "Darse cuenta de un peligro", 1),
( 3, "Feel comfortable around people", "Bueno, vámonos.", "Te gusta bailar?", "Me siento a gusto estando con otras personas", "Quiero jugo de naranja/ananá/durazno", 1),
( 4, "Act comfortably with others", "Buenas noches.", "¿Estás casado?", "Hasta luego.", "Me comporto como soy con los demás", 1),
( 5, "Cheer people up", "Animar a la gente", "Ser muy tacaño", "Me gustaría alquilar un coche.", "Hacer algo más complicado de lo que es", 1),
( 6, "Am hard to get to know", "Quiero jugo de naranja/ananá/durazno", "Es difícil llegar a conocerme", "¡Dios! No me gusta la lluvia.", "Dormir a pierna suelta", 1),
( 7, "Often feel uncomfortable around others", "Mucho gusto.", "Pasar la noche sin dormir", "A menudo me siento incómodo con los demás", "No, no me voy a olvidar.", 1),
( 8, "Avoid contacts with others", "Andar con pies de plomo", "Compré dos entradas para el recital/show de Chico.", "¿Lloverá mañana?", "Evito el contacto con los demás", 1),
( 9, "Am not really interested in others", "Todo legal.", "No me interesan demasiado los demás", "¿Puede sacar una fotografia?", "Actuar con cautela", 1),
( 10, "Keep others at a distance", "¿De dónde eres?", "Soy de Argentina, estoy aquí tomando unas vacaciones.", "Mantengo la distancia con los demás", "¿Estás listo?", 1),
( 11, "Love large parties", "Estoy enojado.", "Estar hasta las narices", "¿Hoy hay after office (happy hour)?", "Me encantan las fiestas grandes", 1),
( 12, "Talk to a lot of different people at parties", "Hablo con mucha gente diferente en las fiestas", "¿Nos vamos?", "Bueno, vámonos.", "Verle las orejas al lobo", 1),
( 13, "Enjoy being part of a group", "Me gustaría alquilar un coche.", "Disfruto de ser parte de un grupo", "No tener dinero", "Mucho gusto.", 1),
( 14, "Involve others in what I am doing", "Ser un descarriado, ser el que no tiene éxito", "Te gusta bailar?", "Involucro a los demás en lo que hago", "OK, vamos con el auto.", 1),
( 15, "Love surprise parties", "¿Puede traerme la carta/el menú+B95?", "No ver tres en un burro", "¡Vamos!", "Me encantan las fiestas sorpresa", 1),
( 16, "Prefer to be alone", "Prefiero estar solo", "Estar en la edad del pavo", "No tengo tenedor/cuchillo/cuchara/plato.", "Mucho gusto.", 1),
( 17, "Want to be left alone", "No, no me voy a olvidar.", "Quiero que me dejen en paz.", "Tener muy buena vista", "Buscar al hombre ideal", 1),
( 18, "Don't like crowded events", "Tener muy buena vista", "¿Vamos a tomar un chop?", "No me gustan los eventos multitudinarios", "Manejas muy rápido.", 1),
( 19, "Avoid crowds", "Ser un gallina", "Hacer algo según las instrucciones", "¿Estás solo?", "Evito las multitudes.", 1),
( 20, "Seek quiet", "Busco la tranquilidad.", "Ser un descarriado, ser el que no tiene éxito", "¿Estás listo?", "Mucho gusto.", 1),
( 21, "Take charge", "Pasar la noche sin dormir", "Tomo el mando", "Pasar la noche sin dormir", "Me siento mal, estoy enfermo.", 1),
( 22, "Try to lead others", "¿Cuánto es?", "¿Estás solo?", "Intento guiar a los demás", "Bueno, vámonos.", 1),
( 23, "Can talk others into doing things", "¿A qué hora nos encontramos?", "Tener la negra", "Eso no me gusta.", "Puedo resultar muy convincente para que los demás hagan lo que quiero", 1),
( 24, "Seek to influence others", "Trato de influenciar a los demás", "No tener ni pies ni cabeza", "Hacer algo más complicado de lo que es", "¿Cómo te llamas?", 1),
( 25, "Take control of things", "¿Cuánto es?", "Tomo el control de las cosas", "No, solo dos días.", "Ser un cobarde", 1),
( 26, "Wait for others to lead the way", "Buscar al hombre ideal", "¿Dónde está el baño?", "Espero a que los demás lleven la delantera", "Te quiero mucho/Me gustas mucho.", 1),
( 27, "Keep in the background", "Verle las orejas al lobo", "Estar sin blanca", "Cometer un error", "Prefiero pasar desapercibido", 1),
( 28, "Have little to say", "Tengo poco que decir", "Honesto, sincere", "A las cinco de la tarde.", "Actuar con cautela", 1),
( 29, "Don't like to draw attention to myself", "Quiero presentarte a mi novio", "No me gusta llamar la atención", "Muy bien.", "No, no me voy a olvidar.", 1),
( 30, "Hold back my opinions", "Soy de Argentina, estoy aquí tomando unas vacaciones.", "Estar en la edad del pavo", "Me reservo mis opiniones", "¿Le gustaría visitar la catedral?", 1),
( 31, "Am always busy", "Prefiero un café.", "Estar harto", "¿Tendrá estacionamiento?", "Siempre estoy ocupado", 1),
( 32, "Am always on the go", "No paro ni un minuto", "Tengo clase de portugués.", "Dar gato por liebre", "De nada", 1),
( 33, "Do a lot in my spare time", "Tener muy mala vista", "Hago mucho en mi tiempo libre", "También podemos ir en taxi.", "Tener muy buena vista", 1),
( 34, "Can manage many things at the same time", "¿Dónde está el baño?", "¿Estás solo?", "Puedo ocuparme de muchas cosas al mismo tiempo", "Tener muy mala memoria", 1),
( 35, "React quickly", "No, solo al contado.", "Ser un gallina", "Eso no me gusta.", "Reacciono rápidamente", 1),
( 36, "Like to take it easy", "Me gusta tomarme las cosas con calma", "Tener muy mala vista", "Sin pelos en la lengua", "¿El traductor se queda mucho tiempo en Brasil?", 1),
( 37, "Like to take my time", "¿Lloverá mañana?", "Me gusta tomarme mi tiempo", "Ser demasiado optimista", "Ser muy tacaño", 1),
( 38, "Like a leisurely lifestyle", "Actuar con cautela", "¿A qué hora comienza el show?", "Prefiero un estilo de vida relajado", "Pero ese precio está equivocado.", 1),
( 39, "Let things proceed at their own pace", "Estar loco", "Dormir profundamente", "Eludir una responsabilidad", "Dejo que las cosas sigan su propio curso", 1),
( 40, "React slowly", "Reacciono lentamente", "Estar como una cabra", "Ser demasiado optimista", "Hasta luego.", 1),
( 41, "Love excitement", "Acertar", "Me encanta la adrenalina", "Creo que sí.", "¿El traductor se queda mucho tiempo en Brasil?", 1),
( 42, "Seek adventure", "Buscar el príncipe azul", "No, solo dos días.", "Busco la aventura.", "Actuar con cautela", 1),
( 43, "Love action", "Tener vista de lince", "¿Eres traductora de portugués?", "Verlo todo de color de rosa", "Me encanta la acción.", 1),
( 44, "Enjoy being part of a loud crowd", "Disfruto siendo parte de un grupo muy animado de personas", "Verle las orejas al lobo", "Poner verde a alguien", "Buenos días.", 1),
( 45, "Enjoy being reckless", "Estoy molesto.", "Disfruto siendo temerario", "¿Mañana tienes una reunión en la oficina?", "Tener vista de lince", 1),
( 46, "Act wild and crazy", "Andar con pies de plomo", "Lavarse las manos", "Me comporto de manera desenfrenada y alocada", "Quiero ir al shopping a comprar ropa.", 1),
( 47, "Am willing to try anything once", "No te olvides de llevar tu carpeta con los papeles del proyecto.", "Sí, tengo mucha hambre.", "¿Haces traducciones de portugués?", "Estoy dispuesto a probar lo que sea por una vez", 1),
( 48, "Seek danger", "Busco el peligro", "Sí, tengo mucha hambre.", "Estoy contento.", "Buenas noches.", 1),
( 49, "Would never go hang gliding or bungee jumping", "¿Quieres almorzar en un restaurante cerca de aquí?", "Nunca haría parapente o puenting.", "Se va el viernes.", "Tener mala suerte", 1),
( 50, "Dislike loud music", "Buscar el príncipe azul", "Tener sangre azul", "No me gusta la música alta", "No tener ni pies ni cabeza", 1),
( 51, "Radiate joy", "Encontrar tu media naranja", "Conocer a tu pareja ideal", "Buenas tardes.", "Irradio alegría", 1),
( 52, "Have a lot of fun", "Me divierto mucho", "No tener dinero", "Buscar el príncipe azul", "¿Tendrá estacionamiento?", 1),
( 53, "Express childlike joy", "¿De dónde eres?", "Expreso una alegría casi infantil", "Me siento mal, estoy enfermo.", "Tener memoria de pez", 1),
( 54, "Laugh my way through life", "Hacer algo más complicado de lo que es", "No haber color", "Me tomo la vida con humor", "Tener muy buena vista", 1),
( 55, "Love life", "Ser un descarriado, ser el que no tiene éxito", "Manejas muy rápido.", "Encontrar tu media naranja", "Amo la vida", 1),
( 56, "Look at the bright side of life", "Miro el lado positivo de las cosas", "Andar con pies de plomo", "Ser un rata", "No, solo al contado.", 1),
( 57, "Laugh aloud", "Buenas tardes.", "Me río en voz alta", "Actuar con cautela", "Pasar la noche sin dormir", 1),
( 58, "Amuse my friends", "Ponerse morado", "Honesto, sincere", "Divierto a mis amigos", "Me siento mal, estoy enfermo.", 1),
( 59, "Am not easily amused", "Ser muy tacaño", "Estar en la adolescencia", "Todo bien.", "No me divierto fácilmente", 1),
( 60, "Seldom joke around", "Rara vez bromeo", "¿Vamos a tomar un chop?", "Honesto, sincere", "Quiero ir al shopping a comprar ropa.", 1),
( 1, "Señala el sinónimo correspondiente de la palabra FALAZ", "Fatal", "Vividor", "Faltón", "Impostor", 2),
( 2, "Encuentra los números para conseguir que el resultado de la operación sea el correcto: 14 x ? / ? = 10", "44, 83", "43, 52", "14, 10", "44, 46", 2),
( 1, "Sigue la secuencia: S C M V ...", "G", "F", "I", "H", 3),
( 2, "Señale la palabra que no pertenece al grupo:", "Sincero", "Franco", "Veraz", "Falso", 3);

INSERT INTO respuestas ( respuesta, id_pregunta, id_intento) VALUES
( "a", 1, 1),
( "Hispano", 2, 1),
( "5", 3, 1),
( "Tamiz", 4, 1),
( "Público", 5, 1),
( "Fusionar", 6, 1),
( "Perfecto", 7, 1),
( "-, -", 8, 1),
( "Emisor", 9, 1),
( "K", 10, 1),
( "32", 11, 1),
( "12, +, 5, 72", 12, 1),
( "Pregunta – Resolver", 13, 1),
( "K", 14, 1),
( "Poeta - Estatua", 15, 1),
( "NN", 16, 1),
( "B.", 17, 1),
( "Comentario", 18, 1),
( "zapa, zapata, zapatear, zapatería, zapatero, zapato", 19, 1),
( "6224242242", 20, 1),
( "H", 21, 1),
( "22o", 22, 1),
( "51", 23, 1),
( "2", 24, 1),
( "4", 25, 1),
( "D", 26, 1),
( "13", 27, 1),
( "Guillotina – Soga", 28, 1),
( "3", 29, 1),
( "hábil, habilidad, habilidoso, habilitación, habilitado, habilitar", 30, 1),
( "t, t", 31, 1),
( "Y", 32, 1),
( "54038727", 33, 1),
( "Esceder", 34, 1),
( "Monge", 35, 1),
( "2471", 36, 1),
( "Disfráz", 37, 1),
( "E", 38, 1),
( "34", 39, 1),
( "Suma", 40, 1),
( "cicatricera", 41, 1),
( "Todos", 42, 1),
( "Conservación", 43, 1),
( "Adornos", 44, 1),
( "Denigrante", 45, 1),
( "Bastilla – Museo", 46, 1),
( "-2", 47, 1),
( "180m", 48, 1),
( "81", 49, 1),
( "moreno", 50, 1),
( "37", 51, 1),
( "Cabreo", 52, 1),
( "Material", 53, 1),
( "22", 54, 1),
( "2.04", 55, 1),
( "Paraguas - Inundación", 56, 1),
( "Mimica", 57, 1),
( "O", 58, 1),
( "Diávolo", 59, 1),
( "Consonante - Asolarse", 60, 1),
( "Impostor", 61, 2),
( "44, 83", 62, 2),
( "F", 63, 3),
( "Falso", 64, 3);



