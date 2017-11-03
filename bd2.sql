-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2017 a las 23:03:55
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_a` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `fecha_a` date DEFAULT NULL,
  `contenido` varchar(7000) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `contador_a` int(11) DEFAULT NULL,
  `id_s` int(11) DEFAULT NULL,
  `art_d` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_a`, `titulo`, `fecha_a`, `contenido`, `autor`, `likes`, `contador_a`, `id_s`, `art_d`) VALUES
(1, '\0\0\0L\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0', '2017-10-31', 'Con un t?tulo tomado de la canci?n En el limbo, del disco A contraluz, este doble lanzamiento puede encontrarse en disquerias, plataformas de venta digital, y para su compra y descarga online en el sitio web de la banda.\r\n\r\nEl disco doble repasa las 28 canciones interpretadas por el grupo en el Vel?dromo, y que son un repaso a los seis discos que la banda ha lanzado hasta ahora. Temas como ?Ves?, Llenos de Magia, Zafar y El viejo son algunos de los que est?n en la selecci?n, adem?s de que el show permiti? a la banda invitar a colegas y amigos que est?n en este registro, como Emiliano Brancciari de No Te Va Gustar, Pablo Silvera de Once Tiros o Pedro Dalton, de Buenos Muchachos.\r\nEl ?lbum puede escucharse desde hoy en Spotify, mientras que la banda public? en su cuenta de Youtube el documental de una hora y media que est? en el DVD. La particularidad es que estar? disponible en la plataforma de videos durante solo una semana y luego ser? bajado.\r\n', 'Fulanito', NULL, NULL, 5, 1),
(2, 'á éóañdasd!?asd?¿', '2017-10-20', 'l chef uruguayo Ignacio Mattos fue seleccionado por la revista Esquire, una de las publicaciones de estilo y literatura m?s prestigiosas de Estados Unidos como el mejor chef de ese pa?s, gracias a su trabajo en los restaurantes Estela, Altro Paradiso y Flora Bar, de la ciudad de Nueva York.\r\n\r\nMattos vive all? desde 2002, y en 2013 comenz? su trabajo en Estela, del que tambi?n es copropietario. El restaurante fue seleccionado en distintas publicaciones como uno de los locales gastron?micos m?s destacados de la ciudad y de Estados Unidos, e incluso lleg? al puesto 44 de una selecci?n de los 50 mejores restaurantes del mundo publicada en 2016 por la Academia Diners Club, adem?s de ser seleccionado por figuras como el entonces presidente Barack Obama para sus cenas.\r\n\r\nEn 2016, Mattos inaugur? su segundo local en Manhattan, el caf? Altro Paradiso, enfocado en la gastronom?a italiana tradicional, al que pronto lo sigui? Flora, ubicado dentro del Met, el Museo Metropolitano de Arte de la ciudad, ubicado en Central Park.\r\n\r\n\"Los mejores chefs, como los mejores cantantes, tienen una voz que se identifica de forma inmediata. Mattos, nacido en Uruguay, cocina en tres restaurantes diferentes de Manhattan, pero su sonido distintivo y exc?ntrico (caracterizado por su capacidad de equilibrar capas de aromas, de grasa, picante y sal) brilla en cada uno de ellos\", destaca la Esquire.\r\n\r\nLa revista destaca la habilidad de Mattos para lograr que el cliente quiera volver. \"Es un mago de la generaci?n de ansias\", concluye el texto.', 'Alguien', 1, 11, 4, NULL),
(3, 'Claves para lograr un buen clima laboral ó ´ ñ', '2017-10-24', 'La mayor preocupación por analizar el clima laboral muestra un escenario alentador, sin embargo, la mayoría de empresas solo miden el clima laboral sin llegar a implementar acciones para llevar a cabo una óptima gestión en el ambiente de trabajo.\r\n\r\nSe entiende que si no se gestiona adecuadamente el clima laboral, hay más posibilidades de que exista una pérdida de talento, lo que implicaría un costo muy elevado en los procesos de selección continuos, de capacitaciones de nuevo personal, el costo de oportunidad (el negocio perdido por no tener a la persona con las capacidades requeridas en el momento indicado) y el costo por perder el know how de la organización, probablemente a manos de empresas de la competencia.\r\n\r\nSegún la consultora Adecco, algunas de las variables que deberían tener en cuenta las empresas para gestionar un buen clima organizacional son las siguientes.\r\n\r\nComunicación organizacional\r\n\r\nRecoger información sobre la manera en que los canales de comunicación son aprovechados para lograr los objetivos de la empresa. En esta dimensión se incluye la comunicación interna y la externa, ya que ambas impactan en el colaborador.\r\n\r\nLiderazgo\r\n\r\nRecoger impresiones acerca de la manera en cómo los mandos de la organización estimulan a su equipo para el logro de objetivos, buscando la armonía, preocupándose por su desarrollo y dándoles la importancia que motiva.\r\n\r\nOrganización del trabajo\r\n\r\nSe refiere a la posibilidad que tienen las personas de conocer claramente las funciones, responsabilidades y tareas que debe realizar en su puesto y cada una de las áreas, así como la forma en que la empresa distribuye las cargas laborales.\r\n\r\nRelaciones interpersonales\r\n\r\nSe refiere a la manera de interactuar y el apoyo que existe entre el personal de la empresa para lograr sus objetivos. Es uno de los esfuerzos sociales más importantes del entorno más inmediato, lo que favorece su adaptación e integración al mismo.\r\n\r\nCondiciones de trabajo\r\n\r\nIncluye las instalaciones, el mobiliario y los equipos que la empresa pone a disposición del colaborador para que cumpla sus funciones.\r\n\r\nPolíticas de gestión de personas\r\n\r\nRecoge la percepción sobre los procesos típicos de gestión de personas como capacitación, compensación, desempeño.\r\n\r\nAdicionalmente se recomienda a las empresas que empiezan a gestionar el clima, tener como objetivo principal la convicción de mejorar como organización y conocer las fortalezas y oportunidades de mejora en relación con la gestión de personas; la mejora de la reputación viene como consecuencia de una adecuada gestión.\r\n\r\nAdemás, como primer paso para gestionar el clima dentro de una empresa se recomienda realizar un diagnóstico que incluya no solo el análisis cuantitativo (encuestas) sino también el análisis cualitativo, como focus group y entrevistas.\r\n\r\nFinalmente, se recomienda tener claridad sobre qué hacer después de la medición del clima, ya que muchas empresas miden año tras año por cumplir con un plan de acción, y los resultados los almacenan en los archivos, sin tomarlos en consideración. Por lo tanto, es fundamental, primero comunicar los resultados obtenidos, siendo capaces de reconocer los errores y luego definir, ejecutar y comunicar acciones orientadas a la mejora.\r\n\r\nFuente: Gestión - RIPE', 'asdasd', NULL, 1, 4, NULL),
(4, 'Bascou dejó a Larrañaga en una posición incómoda', '2017-11-01', 'Yo renuncio solamente si me lo pide (Guillermo) Bessozi, (Jorge) Larrañaga o la Justicia\", dijo en más de una oportunidad el intendente de Soriano, Agustín Bascou, que pertenece al sector Juntos del Partido Nacional y es cuestionado por conjunción de interés público y privado desde el Frente Amplio. Sin embargo, el jerarca no mencionó al comité de ética de su partido que tiene a estudio su caso. Con esa postura, si fallara en su contra, dejará en una incómoda posición al líder del sector, Larrañaga.\r\n\r\nEs que si el comité entendiera que Bascou tuvo un proceder reñido con la ética, el líder de Juntos quedará entre la espada y la pared, porque tendrá que optar por adelantarse a la Justicia y pedirle la renuncia o defender a su dirigente incluso con un dictámen ético en contra y enfrentarse así a su propio partido.\r\n\r\nSegún el Frente Amplio, vehículos de la intendencia que dirige Bascou cargaban nafta en una estación que era propiedad del intendente. Sin embargo, Bascou se ha defendido asegurando que la intendencia hace el negocio con ANCAP y no directamente con la estación de servicio por lo que no habría delito.\r\n\"Yo estoy muy tranquilo. Tengo respaldo político y jurídico\", dijo el intendente este jueves al ser consultado sobre la situación que estaba atravesando.\r\n\r\nEl comité de ética que analiza el caso de Bascou está conformado por tres dirigentes del sector de Luis Lacalle Pou (Todos) y dos de Juntos, debido al resultado de las elecciones internas. El senador Lacalle Pou adelantó que en caso de estar en la posición de Bascou \"ya hubiera renunciado\" y esto generó cruces en la interna blanca que derivaron en la renuncia de Bessozi al directorio del partido.\r\n\r\nLa Mesa Política del Frente Amplio de Soriano anunció que llevará el caso a la Justicia. \"Para el FA esto configura una clara violación a las normas que se refieren a la conjunción del interés público y privado del intendente Bascou, en ejercicio de su función como máximo ordenador de gastos de la Intendencia Municipal de Soriano\", dice la resolución aprobada el sábado 14.\r\n\r\nA nivel de la Junta Departamental el FA agotó todas las vías posibles. Primero quiso realizarle un juicio político al jefe del gobierno departamental y luego buscó crear una comisión investigadora pero en ninguna de las oportunidades obtuvo el respaldo necesario. El Partido Nacional tiene 22 ediles, el Frente Amplio siete y el Partido Colorado dos.\r\n\r\nEn la próxima sesión de la Junta Departamental, los ediles analizarán elevar todos los antecedentes del caso Bascou para que el Tribunal de Cuentas se expida al respecto. Esta propuesta fue presentada por el edil del Partido Nacional, Luciano Andriolo (Todos) que también acompañó la creación de una investigadora.\r\n\r\nRespaldo\r\n\r\nLas principales autoridades del Frente Amplio viajarán a Soriano el próximo viernes para respaldar la actuación política que vienen desarrollando los dirigentes departamentales frente a este tema. \"En apoyo a las acciones que el Frente Amplio de Soriano viene realizando en relación a lo que hacía el intendente de Soriano Agustín Bascou con la compra de combustible para la Intendencia en estaciones de servicio pertenecientes a una sociedad de la cual era presidente, director y administrador, una delegación nacional del Frente Amplio del más alto nivel concurrirá a Mercedes el próximo viernes 27\", dice el comunicado difundido este viernes.\r\n\r\nLa delegación estará conformada por el presidente de la fuerza política, Javier Miranda, la vicepresidenta de la República, Lucía Topolansky, la senadora socialista Mónica Xavier y el diputado y vicepresidente del FA, José Carlos Mahía. Además de ofrecer respaldo, asesorarán a los técnicos para \"diagramar\" la denuncia penal, dijo a El Observador el edil frenteamplsita Carlos Susaye.\r\n\r\nPresentó pruebas\r\n\r\nEl intendente Agustín Bascou presentó, ante el juzgado en el que fue denunciado por libramiento de cheques sin fondo por sus negocios privados, pruebas para acreditar que en el momento en que firmó los cheques, \"en el mes de agosto o setiembre de 2016 la línea de crédito vigente\", dijo a El Observador su abogado Gonzalo Imas. Ahora la Fiscalía definirá si lo responsabiliza o archiva el caso.', NULL, 1, 66, 3, 1),
(5, 'Autopsia de Maldonado reveló ausencia de lesiones', '2017-10-31', 'Tras más de 12 horas de trabajo, finalizó la autopsia al cuerpo del activista Santiago Maldonado, de la que participaron 55 personas, entre peritos oficiales, peritos de parte y veedores, dijo el juez Gustavo Lleral a la prensa, quien también confirmó la identidad del fallecido.\r\n\r\n\"Se pudo determinar que no hubo lesiones en el cuerpo. Falta averiguar la causa de la muerte\", dijo el juez y advirtió que esto tomará dos semanas porque hay que esperar \"resultados complementarios de las muestras\".\r\n\r\nLa confirmación de que el cuerpo hallado en un río del sur de Argentina es de Maldonado, desaparecido el 1° de agosto en medio de un operativo policial, conmovió el viernes al país, a dos días de los comicios legislativos (se realizarán este domingo 22).\r\n\r\n\"Pudimos mirar el cuerpo, lo que reconocimos fueron los tatuajes de Santiago, así que estamos convencidos de que es Santiago\", declaró en ese momento su hermano mayor, Sergio Maldonado, en las puertas de la morgue judicial de Buenos Aires.\r\n\r\n\r\n\r\nMacri llamó a la madre para darle el pésame\r\n\r\nEl presidente Mauricio Macri se comunicó la noche del viernes con la madre de Santiago \"para darle el pésame\", dijo el ministro de Justicia, Germán Garavano al canal TN.\r\nPoco después, los familiares expresaron su malestar por el llamado a Estela, la madre del joven tatuador de 28 años, un mochilero solidario con la causa mapuche.\r\n\r\n\"Me da asco que el presidente Macri llame a mi mamá, que no está en condiciones de hablar, a dos días de las elecciones\", dijo Sergio Maldonado, que lamentó que el llamado llegue \"después de 80 días\".\r\n\r\nCentenares de manifestantes de izquierda se movilizaron en la noche a la Plaza de Mayo. Otra marcha fue convocada para el sábado.\r\n\r\n\"Santiago ha sido un punto de inflexión y ha puesto en el tapete el problema mapuche. La gendarmería tiene vía libre. Ingresan a la comunidad y salen a cazar gente. En ese marco desaparecen a Santiago\", declaró a la AFP Marta Berreta, una manifestante mapuche.\r\n\r\nEn tanto, decenas de personas se concentraron frente a la residencia presidencial de Olivos (periferia norte) donde desplegaron una bandera que rezaba \"Estado asesino, justicia\".\r\n\r\nOtros expresaron su conmoción en la puerta de la morgue judicial, transformada en un altar con velas encendidas, flores y mensajes solidarios para la familia.\r\n\r\nLas redes sociales se hicieron eco y el hashtag \"Santiago\" pasó a liderar las tendencias de Twitter en Argentina.\r\n\r\nAmnistía Internacional Argentina reclamó al gobierno \"garantizar una investigación independiente\", dijo su directora, Mariela Bielski, en un comunicado.\r\n\r\n\r\nEl hallazgo del cuerpo\r\n\r\nSantiago Maldonado desapareció en el marco de la represión por parte de la Gendarmería (policía militarizada) de una protesta mapuche en reclamo de tierras vendidas al magnate italiano Luciano Benetton, dueño de 900.000 hectáreas en la Patagonia.\r\n\r\nEl martes, durante un rastrillaje ordenado por un juez, se encontró un cadáver en el río Chubut, 300 metros río arriba de donde testigos mapuches dijeron haberlo visto por última vez, cuando el activista huía de los gendarmes.\r\n\r\nEl cuerpo tenía el documento de identidad de Santiago Maldonado y llevaba parte de su ropa. La familia se había negado a confirmar la identidad hasta no tener el examen de ADN, pero este viernes lo reconoció por los tatuajes.\r\n\r\n\"Esto no quita de que el responsable es la Gendarmería\", afirmó Sergio Maldonado.\r\n\r\nEl gobierno había rechazado la responsabilidad de la Gendarmería pero luego admitió que podría haber algún gendarme implicado de manera individual.\r\n\r\n\"Sea quien sea el responsable, tendrá que asumir las consecuencias de sus actos, que sea alguien de Gendarmería u otra persona\", dijo el ministro Garavano.\r\n\r\nEl hallazgo del cadáver convulsionó la escena política en plena campaña para las elecciones legislativas del domingo y se suspendieron los actos de campaña.\r\n\r\n\r\n\r\nEl eventual efecto en las urnas\r\n\r\nEn un país polarizado, no está claro si el caso Maldonado tendrá algún efecto en las urnas el domingo, cuando los sondeos pronostican un resultado positivo para el gobierno que pretende reforzar su presencia en el Congreso.\r\n\r\n\"Las circunstancias del hallazgo del cuerpo nos generan muchas dudas\", sostiene un comunicado publicado este viernes en el portal \"Aparición con vida de Santiago Maldonado\", abierto por la familia, porque esa zona del río ya había sido rastrillada tres veces.\r\n\r\nAsimismo, la familia criticó \"la inacción, ineficacia y parcialidad del juez anterior\" y al gobierno de Macri por \"la inexplicable negativa ante el ofrecimiento de colaboración de expertos de la ONU\".\r\n\r\nGaravano consideró que éste \"es un caso judicial que se le dio y tomó una dimensión política, donde el gobierno se mantuvo en la posición de que la justicia debía esclarecer\".\r\n\r\nAFP / Por Liliana Samuel', 'asda', 5, 122, 4, 1),
(6, 'Más enredado que nunca', '2017-11-02', 'El fútbol uruguayo está suspendido. Las reuniones para intentar solucionar un conflicto que se cocinó a fuego lento durante meses y que terminó de estallar el lunes se multiplicaron y saltaron hasta la arena política. Pero, por ahora, no hay ni miras de llegar a un acuerdo. \r\n\r\nDe un lado están los futbolistas agrupados en el movimiento Más Unidos Que Nunca (MUQN). Del otro la comisión directiva de la Mutual de Jugadores Uruguayos Profesionales –el gremio de los futbolistas– que encabeza Enrique Saravia.\r\n\r\nAyer, inesperadamente, se abrió un nuevo flanco en la confrontación cuando MUQN intimó a la Asociación Uruguaya de Fútbol (AUF) \"para que cese de forma inmediata el uso de nuestro Derecho de Imagen en cualquier ámbito, forma o modo conocido o por conocerse y se abstenga de suscribir acuerdos con terceros que impliquen la explotación del mismo\".\r\n\r\nEl abogado Juan Silva Cerón, exfutbolista que integra MUQN, explicó a Referí: \"Desde el 2 de diciembre de 2016, al haberse rescindido el contrato de cesión de derechos de imagen entre la Mutual y Tenfield, se está haciendo un uso legítimo de las imágenes de los jugadores. Se intima porque no hay contrato vigente. Cada vez que un futbolista es filmado, retratado o se reproduce su imagen está cediendo ese derecho de la personalidad sin haber contrato firmado con la persona que detenta ese derecho\".\r\n\r\nUn integrante del Consejo Ejecutivo de la AUF comentó: \"Esto es un tiro por elevación a la extensión del contrato que Tenfield pretende firmar con los clubes hasta 2032 por los derechos de televisión del fútbol uruguayo. Ellos vendieron sus derechos a través de la Mutual a Tenfield hasta el año pasado\".\r\n\r\n\"Con la AUF se firmaron los derechos de transmisión televisiva y Tenfield cerraba el paquete de documentación necesaria firmando los derechos de imagen con la Mutual por las reproducciones de imágenes de los jugadores en las repeticiones, en todo lo que excedía a la transmisión de los partidos\", agregó. \r\n\r\n\"Desde el 2 de diciembre, cuando se rompió el contrato, no se volvió a conversar sobre el tema, pero esa parte del paquete que tenía Tenfield desde entonces no la tiene\", explicó la fuente. \r\n¿Con quién tienen que sentarse a negociar los jugadores por estos derechos? \"Con la AUF no, con Tenfield\", expresó el dirigente. \r\n\r\nEl protocolo de acción\r\n\r\nLuego de decretado el paro el lunes a la hora 23.30 por MUQN tras el cual se presentaron el martes de mañana a la Mutual solicitando una asamblea extraordinaria con el fin de remover a la comisión directiva y a la comisión fiscal del gremio, estallaron las alarmas. \r\n\r\nLos clubes se reunieron en la AUF y mantuvieron fijada la octava fecha del Torneo Clausura. La Mutual anunció que el jueves le pondría fecha a la asamblea. Ese mismo jueves, por la tarde, ambas partes por separado fueron recibidas por la Comisión de Deporte de la Cámara de Diputados. \r\n\r\nLa Mutual sorprendió llegando a la reunión con un protocolo de acción con el cual pretende salir del conflicto y que contempla los siguientes pasos.\r\n\r\n1) Levantar el paro.\r\n2) Conformar una comisión integrada por un abogado de la Mutual y dos representantes de la comisión directiva, un abogado y dos representantes de MUQN y uno o varios representantes intermediarios.\r\n3) Reunirse dos días a la semana, presentar pruebas, contrapruebas y descargos cada una de las dos parte y el mediador con plazo de 10 días.\r\n4) Convocar a asamblea si no existiera conformidad entre las partes.\r\n\r\nEl plazo para convocarla que usará la Mutual es de 30 días (artículo 23 del estatuto). O sea que si este camino se transita puede llegar a demandar dos meses. \r\n\r\n¿Qué piensan los jugadores?\r\n\r\n\"A modo personal, porque no nos hemos juntado para analizarlo, al protocolo lo veo como una dilatoria más y como un nuevo condicionamiento que la directiva de la Mutual vuelve a ponernos para pedir la asamblea. Entiendo que es una herramienta de trabajo que plantean, pero ya no confiamos en nada de lo que nos dicen\", expresó Silva Cerón.\r\n\r\n\"La única garantía que tuvimos para hacer escuchar nuestra posición fue el paro. Estamos tan claros y tan sólidos para plantear las cosas que no necesitamos entrar en un terreno de discusión al que nos quieren llevar. Lo quieren levar al terreno personal, al agravio y no es la forma para plantear cualquier hipótesis de trabajo\", agregó. \r\n\r\n\"Cualquier forma de trabajo en conjunto lo primero que tiene que contemplar es la fijación de la asamblea y eventualmente habrá que trabajar para que se desarrolle con absoluta normalidad y en base a nuestras exigencias, porque ya llegó el momento de que se tomen en cuenta nuestras exigencias de una vez\", dijo el ex River Plate, Deportivo Maldonado y Peñarol. \r\n\r\n\"La vida tiene ciclo para todos. Acá se terminó uno y tiene que empezar otro. Todo lo bueno que esta comisión directiva pudo haber hecho con otros integrantes que se fueron yendo, porque hizo cosas interesantes y generó cambios, ahora hay que profundizarlos. Acá no hay un problema personal sino de gestión. A nivel salud, salarial, educación para el jugador, vivienda no se han profundizado los cambios\". \r\n\r\nEs decir que en el ámbito de los jugadores se mira con desconfianza el protocolo y además generó muchas dudas las razones por las que no se convocó a la asamblea. \r\n\r\nEduardo Sassón, abogado de la Mutual, explicó el jueves que la misma no se convocó todavía por una sugerencia de la Comisión de Deportes de Diputados que pretende abrir un puente de diálogo entre las partes. \r\n\r\nEsa sugerencia no figura en la versión taquigráfica de la reunión a la que tuvo acceso ayer Referí. Sin embargo, el diputado Luis Gallo reveló a Sport 890 que la formuló a Saravia una vez terminada la reunión.\r\n\r\nPuertas adentro, Saravia expresó que el conflicto se remonta a la negociación de los derechos de imagen de los jugadores de la selección del año pasado y que detrás del MUQN está la figura de Diego Godín –capitán de la selección uruguaya– que está enfrentado con Francisco Casal, director de Tenfield: \"Es como que quiere agarrar al gremio de rehén y empuja a los demás muchachos\". \r\n\r\nEl optimismo de la AUF\r\n\r\n\"Creo que la semana próxima se puede destrabar el conflicto, por los actores políticos que empezaron a mediar entre ', NULL, 1, 7, 2, 1),
(7, 'El gobierno destituye a los líderes catalanes', '2017-10-21', 'El presidente del gobierno español, Mariano Rajoy, anunció este sábado que promoverá la celebración de elecciones en Cataluña \"en un plazo máximo de seis meses\", como parte de la intervención de la autonomía de esta región, destinada a impedir su secesión unilateral.\r\n\r\nPara renovar la actual cámara, dominada por los independentistas, Rajoy propondrá, al Senado, asumir la competencia de disolver el Parlamento regional y convocar elecciones, una función que está en manos del presidente catalán, el secesionista Carles Puigdemont.\r\n\r\nEl gobierno español hará esto aplicando por primera vez en 40 años de democracia el artículo 155 de la Constitución del país que otorga potestad al gobierno de tomar las medidas necesarias para \"restaurar el orden constitucional y el Estatuto de Autonomía\" de las distintas partes del país.\r\n\r\nDe todas formas, Rajoy puntualizó que la intención no es la de disolver el Parlamento catalán, sino la de lograr la salida de los líderes del gobierno catalán actual y luego de eso realizar una nueva serie de elecciones regionales.\r\n\r\nSegún detalló a la prensa, su gobierno conservador pedirá al Senado \"el cese del presidente de la Generalitat de Cataluña (Carles Puigdemont), del vicepresidente (Oriol Junqueras) y de los consejeros que integran el consejo de gobierno de la Generalitat de Cataluña\".\r\n\r\nEn ese contexto, Rajoy anunció además que tras la salida de Carles Puigdemont y su equipo, se limitarán las potestades de la presidenta del parlamento catalán para que no pueda proponer a sus propios candidatos al liderazgo regional.\r\n\r\nLas últimas elecciones regionales catalanas tuvieron lugar el 27 de septiembre de 2015. En ellas, los independentistas obtuvieron una mayoría de 72 escaños sobre un total de 135.\r\n\r\nMariano Rajoy afirmó que el gobierno catalán no le ha dejado otra opción, y aseveró que \"no era nuestro deseo ni nuestra intención\" aplicar el artículo 155.\r\n\r\nIgualmente dijo que con todo esto \"no se suspende la autonomía ni el autogobierno de Cataluña\", sino que \"se cesa a las personas que han puesto ese autogobierno fuera de la ley, de la Constitución y del Estatuto de autonomía\" de la región.\r\n\r\n', 'asdad', NULL, NULL, 4, NULL),
(8, 'Alternativas para tratar el dolor', '2017-10-24', 'Hace muchos años sufría de dolores de cabeza que me debilitaban asociados con varias actividades en apariencia no relacionadas, que incluían cocinar para otros y coser cortinas para la casa. Pensé que podría ser alérgica al gas natural o a ciertas telas hasta que un día me di cuenta de que tensaba los músculos faciales cuando me concentraba atentamente en algún proyecto.\r\n\r\nLa cura fue sorprendentemente sencilla: tomé conciencia de la manera en que reaccionaba mi cuerpo y la cambié a través de una modificación autoinducida en mi conducta. Relajaba los músculos conscientemente cuando me enfocaba en una tarea que podía precipitar un dolor de cabeza producido por la tensión.\r\n\r\nCasi cinco décadas después, era mi espalda la que me dolía cuando cocinaba rápido, incluso una comida sencilla. De nuevo me di cuenta de que estaba transfiriendo el estrés a los músculos de mi espalda y tenía que aprender a relajarlos, darme más tiempo para terminar cualquier proyecto y así mitigar el estrés. Me da gusto informar que hace poco preparé una cena para ocho personas sin ningún dolor.\r\n\r\nNo es mi intención sugerir que todos los dolores pueden curarse mediante la autoconciencia y un cambio en la conducta. Sin embargo, las investigaciones recientes han demostrado que la mente –junto con otros remedios no farmacológicos– puede constituir una medicina poderosa para aliviar muchos tipos de dolores crónicos o recurrentes, en especial la lumbalgia. Como dijo James Campbell, neurocirujano y especialista en dolor: \"El mejor tratamiento para el dolor está frente a nuestros ojos\". El experto sugiere no \"ponerse catastróficos\": no asumir que el dolor representa algo desastroso que te evitará llevar la vida que elegiste.\r\n\r\nEl dolor agudo es una señal de la naturaleza para avisar que algo anda mal y hay que atenderlo. Por su parte, el dolor crónico ya no es una señal útil de precaución, pero puede llevar a un sufrimiento perpetuo si la gente se mantiene temiéndolo, añadió el médico.\r\n\r\n\"Si el dolor no es una indicación de que algo está gravemente mal podés aprender a vivir con él\", dijo Campbell, profesor emérito en las Instituciones Médicas Johns Hopkins. Demasiado a menudo, explicó, \"la gente con dolor queda atrapada en un círculo vicioso de inactividad que da por resultado pérdida de fuerza muscular y por lo tanto más problemas de dolor\".\r\nSin fármacos\r\n\r\n\r\nEs posible que usar medicamentos potentes para los problemas de dolor crónico solo los incremente porque con frecuencia se necesitan dosis cada vez más altas. Por ello, un grupo creciente de especialistas está explorando tratamientos no invasivos y sin medicamentos, algunos de los cuales han demostrado ser sumamente eficaces en el alivio del dolor crónico.\r\n\r\nEl Colegio de Médicos de Estados Unidos dio a conocer recientemente nuevos lineamientos para tratar sin fármacos el dolor de espalda crónico o recurrente, un padecimiento que afecta a cerca de un cuarto de adultos con un costo para el país de más de US$ 100.000 millones al año.\r\n\r\nPuesto que la mayoría de los pacientes con dolor de espalda mejoran con el tiempo \"independientemente del tratamiento\", el colegio recomienda remedios tales como aplicación tópica de calor, masajes, acupuntura o, en algunos casos, manipulación de la columna (quiropráctica u osteopática). Para quienes sufren dolor crónico de espalda, las sugerencias incluyen ejercicio, rehabilitación, acupuntura, tai chi, yoga, relajación progresiva, terapia congnitivo-conductual y reducción del estrés basada en la atención plena.\r\n\r\nEntre los estudios más recientes, realizados por Daniel C. Cherkin y sus colegas en el Instituto de Investigaciones Group Health y la Universidad de Washington en Seattle, tanto la reducción de estrés basada en la atención plena como la terapia congnitivo-conductual demostraron una mayor eficacia que la \"atención común\" para el alivio del dolor lumbar crónico y el mejoramiento de las funciones de los pacientes.\r\n\r\nLa terapia cognitivo-conductual básicamente enseña a la gente a reestructurar su manera de pensar en los problemas. \"Ya había evidencia de que es eficaz para tratar distintos padecimientos de dolor\", dijo Cherkin. \"Nuestro estudio mostró que la terapia cognitivo-conductual y la reducción de estrés basada en la atención plena fueron similares en cuanto a reducción de las disfunciones y la severidad del dolor\".\r\nEn un estudio de seguimiento realizado dos años después, aún era más probable que los pacientes tratados con terapia de atención plena mejoraran que aquellos que recibían la atención usual, informó el equipo en febrero.\r\n\r\nUn reto de estas alternativas sin fármacos es la disponibilidad. La gente que vive en áreas no urbanas puede tener dificultades para encontrar a un terapeuta cercano o incluso un masajista experto, un maestro de tai chi o un acupunturista.\r\n\r\nUna técnica para cada dolencia\r\n\r\nUn resumen sobre la eficacia de los tratamientos sin fármacos para problemas de dolor comunes se publicó el año pasado en Mayo Clinic Proceedings, firmado por Richard L. Nahin y colaboradores del centro. El equipo informó que estos enfoques complementarios \"pueden ayudar a algunos pacientes a manejar sus problemas de salud relacionados con el dolor: acupuntura y yoga para el dolor de espalda; acupuntura y tai chi para la osteoartritis de rodilla; masaje terapéutico para el dolor de cuello con una frecuencia adecuada y para un beneficio a corto plazo; y técnicas de relajación para migraña y dolor de cabeza intenso\". Evidencias menos sólidas también sugieren que el masaje terapéutico, así como las manipulaciones de columna y osteopática, podrían beneficiar a los pacientes con dolor de espalda, y las técnicas de relajación y el tai chi podrían ayudar a los pacientes con fibromialgia a encontrar alivio.\r\n', NULL, 2, 38, 2, NULL),
(9, 'La voltereta de Lenín Moreno en Ecuador', '2017-10-21', 'Domingo 2 de abril. Rafael Correa está exultante y da un fuerte abrazo –como solo se ve entre grandes amigos– a su sucesor Lenín Moreno por la victoria en las urnas. \r\n\r\nTiene la certeza de la continuidad de su proyecto político que inició en 2007 en Ecuador. \r\n\r\nEsa noche escribe un tuit que resume su excelente estado de ánimo: \"Gran noticia para la Patria Grande: la Revolución volvió a triunfar en Ecuador. \r\n\r\nLa derecha derrotada, pese a sus millones y su prensa\". \r\n\r\nPero resulta que, cinco meses después, el delfín del expresidente en realidad es un \"mediocre\", un \"traidor\" que gobierna con el \"programa de la oposición\", y un \"desleal\" que está detrás de una supuesta artimaña para llevarlo a prisión. \r\n\r\nAsí, Correa y su sucesor Moreno protagonizan una sangrienta disputa política que provoca un cisma en el partido en el poder –que pone en jaque la gobernabilidad del país– y que se profundiza con las investigaciones de casos de corrupción, que llevaron a la cárcel al vicepresidente Jorge Glas, quien ya estaba distanciado del jefe de Estado. \r\n\r\nA ello se suma la convocatoria a un referéndum por parte de la nueva administración, que de aprobarse echa por tierra una futura postulación de Correa.\r\n\r\nExpertos consultados por El Observador proyectan un gobierno apartado de la \"revolución radical\" de Correa, pero sin tocar el histórico modelo estatal del oficialista Alianza País.\r\n\r\nSombrío y oscuro\r\n\r\nDurante la campaña electoral se escucharon voces que advertían algunas dificultades al gobierno entrante por la baja de votos de Alianza País –lejos de las mayorías de los tres períodos anteriores– y un novel presidente sin el liderazgo y el carisma de Correa que gobernó casi una década.\r\n\r\nEl pesimismo se reforzaba por la agenda caliente de Moreno apenas traspasara las puertas del Palacio de Carondelet: una situación económica difícil –pese al repunte del nivel de actividad en los últimos trimestres–, que se refleja en una pesada mochila de déficit fiscal –4,7% del PIB– y de deuda externa –equivalente a casi 28% del producto, según datos oficiales de los que desconfía la oposición–, y un diálogo político y social inexistente por un \"vehemente, sanguíneo\" Correa que gobernó con un estilo de confrontación. \r\n\r\nY, por si fuera poco, había quienes creían que Moreno sería una marioneta de Correa, el verdadero presidente.\r\n\r\nPero los sucesos fueron diferentes desde que asumió Moreno el pasado 24 de mayo.\r\n\r\n\"El rostro amable, bueno y bonachón\" del mandatario hasta ahora no se ha traducido en la falta de un temperamento firme para gobernar y, lo más sorpresivo, quizá, es que marcó no solo un fuerte distanciamiento político de su mentor –de quien fue vicepresidente– sino que tuvo el empuje necesario para lanzar duras críticas públicas al líder de Alianza País por la gestión que heredó. \r\n\r\nEl primero en salir al ruedo fue el propio Correa que criticó las reuniones de Moreno con líderes de la oposición, un pecado político para un presidente de su mismo palo.\r\n\r\nMoreno, por su lado, empezó a cuestionar, semana tras semana, la mala gestión económica, la política petrolera y el abultado gasto público, un cóctel explosivo al inicio de su administración. \r\n\r\nAl mismo tiempo, emprendió una campaña en contra de la corrupción y apoyó las investigaciones judiciales que pesan contra funcionarios provenientes del riñón de Correa, quien no dejó pasar un segundo para contraatacar.\r\n\r\nPor investigaciones de corrupción, está en prisión preventiva el vicepresidente Glas, un político poderoso del correísmo, por un supuesto pago de sobornos de la compañía brasileña Odebrecht –de unos US$ 14 millones–, del que Moreno ya estaba muy distanciado, a lo que se suma un exministro de Hidrocarburos y exfuncionarios de la petrolera estatal, sentenciados a cinco años de cárcel por lavado de activos y culpables de cohecho. \r\n\r\nAdemás, está en la mira de la Justicia –por defraudación tributaria– un extitular de Industrias.\r\n\r\nPara Moreno, el último período de gobierno fue \"sombrío\" y \"oscuro\", y le dejó una situación económica muy difícil. \r\n\r\n\"El presidente anterior se endeudó excesivamente en el último momento para dejar una obra monumental (...) pero estoy pensando que me lo dejó para que yo fracase\", dijo el actual mandatario a un grupo de periodistas, el miércoles 4.\r\n\r\nSemana después, Correa dijo que lo que ocurre en su país \"es terrible, es tremendamente doloroso, tremendamente ingrato, tremendamente injusto\".\r\n\r\nEl gobierno de Moreno, declaró a AFP, \"está aplicando el programa de la oposición, nos está persiguiendo, nos está haciendo quedar como corruptos, como inútiles\".\r\n\r\n\"Es una deslealtad, una ingratitud terrible (...)\", dijo y comparó su situación con la del expresidente brasileño Luiz Inácio Lula da Silva porque \"buscan bajar la reelección indefinida\" y llevarlo preso.\r\nDijo que desconocía que Moreno pudiera ser \"tan desleal, tan malo, tan perverso\".\r\n\r\nUna acusación extrema –que demuestra que no es un enojo pasajero– ocurrió el pasado 15 de setiembre, cuando el mandatario incriminó a su antecesor de espionaje a través de una cámara oculta instalada en la oficina presidencial y que Correa \"monitoreaba desde su teléfono celular\", lo que este calificó de \"ridículo\".\r\n\r\nFuturo convulso\r\n\r\nAunque puede ser llamativa la pelea con tanta agresividad, el discurso político del actual presidente durante la campaña electoral permitía augurar una posterior enemistad. \r\n\r\nEl combate a la corrupción –que implicaba la investigación a funcionarios del correísmo– y un estilo conciliador con los partidos opositores y más abiertos a la prensa, representan ideas o actitudes diametralmente opuestas a la política de confrontación de Correa.\r\n\r\n\"Era previsible una ruptura\", según el politólogo Mauricio Jaramillo, un especialista de la política ecuatoriana que explicó que el actual presidente \"nunca se mostró como el heredero absoluto\" y, además, \"siempre marcó una autonomía que ahora está reivindicando\".\r\n\r\nOpinó que la fuerte disputa en Alianza País es, más que por el liderazgo, por \"temas de fondo\" de carácter político.\r\n\r\n\"Moreno no cree en una revolución radical y se apartó del dogmatismo de ', NULL, NULL, NULL, 3, NULL),
(10, 'El desafío de Macri en las legislativas', '2017-10-24', 'En El Observador estamos solicitando el registro de los usuarios. \r\nEsta práctica es parte de una serie de acciones que hemos definido con el propósito de seguir ofreciendo la mejor experiencia de periodismo.\r\nLe agradecemos que se registre y sea parte de ella.\r\n(con su registro accederá al contenido de forma gratuita)', NULL, NULL, NULL, 3, NULL),
(11, 'FMI calcula un posible rescate a Venezuela', '2017-10-21', 'En El Observador estamos solicitando el registro de los usuarios. \r\nEsta práctica es parte de una serie de acciones que hemos definido con el propósito de seguir ofreciendo la mejor experiencia de periodismo.\r\nLe agradecemos que se registre y sea parte de ella.\r\n(con su registro accederá al contenido de forma gratuita)\r\n\r\nasdad', NULL, 1, 5, 1, NULL),
(12, 'Cuatro artistas para conocer gracias al streaming', '2017-11-03', 'Esta es la primera producción documental que Netflix hace en Brasil. Las realizadoras Lygia Barbosa y Eliane Brum se meten en la historia de la brillante caricaturista Learte que, después de la muerte de su hijo, a los 57 años hizo pública su decisión de vivir como transgénero. En una entrevista concedida a la revista Playground, Laerte contó cómo fue el proceso de trabajo y su resultado: \"Fueron tres años de convivencia, horas y horas de grabación (...). Me sorprendió el resultado –las escenas, las palabras y las imágenes ganan un sentido muy claro, que para mí estaba oculto hasta entonces–. Hay historias personales, pero se desdoblan en asuntos que son de todo el mundo, de nuestro tiempo y de nuestro lugar\". Disponible en Netflix.\r\n\r\nA Joan Didion se le murieron en menos de dos años su marido y su hija de manera inesperada. Los acontecimientos están narrados en los libros El año del pensamiento mágico y Noches azules. Didion –nacida en 1934, periodista y escritora– es una de las plumas más celebradas entre los autores estadounidenses de su generación. The center will not hold es el primer documental dedicado a su vida. El ojo detrás de la realización es el del actor Griffin Dunne, su sobrino, que se encargó de entrevistar y retratar a Didion y además recuperar un atractivo puñado de imágenes de archivo que reflejan el espíritu de las décadas de 1960 y 1970, cuando la escritora publicó varias de sus piezas más memorables. Aunque la reseña de The New Yorker no fue demasiado elogiosa y consideró la película \"más cerca de ser retrato oficial que una biografía iluminadora\", el documental ha generado mucha conversación entre sus fans. Didion, más allá de haberse dedicado la vida entera a las letras, es una celebridad en sí misma. Disponible en Netflix.', 'Juancho', NULL, 1, 5, NULL),
(13, 'Mujeres tardarán 217 años en ganar lo mismo', '2017-11-03', '<b>Uruguay avanzó un 3% en la reducción de la brecha de género durante 2017, según el Foro Económico Mundial\r\n Pexels</b>\r\n</br>\r\nEl fiscal de Corte, Jorge Díaz, solicitó al director de la Policía Nacional, Mario Layera, que le envié por escrito un informe explicando un circular de la Jefatura de Policía de Colonia dirigido a los \"jefes y/o encargados de seccionales\" de ese departamento en el que se instruye sobre algunas disposiciones arbitrarias en el procedimiento penal. Las indicaciones, que según la circular provienen de parte del fiscal letrado de Rosario, Cesare Cingia, se apartan de lo establecido en el nuevo Código del Proceso Penal (CPP) que rige desde este 1º de noviembre.\r\n\r\nEn el documento, al accedió El Observador, la cabo Mariela Irigoyta redactó 13 puntos acordados con Cingia en una reunión del 31 de octubre, para poner \"en práctica\" siempre que la Policía departamental dé cuenta de un delito a ese fiscal, tal como lo dispone el nuevo proceso penal acusatorio.\r\n\r\nUno de los puntos más llamativos señala que \"en referencia a los menores infractores, poniendo como ejemplo hurto de moto, (el fiscal) le restó importancia, manifestando que no iniciaría proceso infraccional por ese hecho\". En otro ítem, el texto indica que en la reunión, en la que también participó la fiscal adscripta, Luisa Vago, se acordó que \"no se debe realizar apercibimientos de conductas (por la Policía), siendo él (Cingia), el único que lo hará\".\r\n\r\nMás adelante, se acuerda que todas las denuncias \"por difamaciones e insultos mediante las redes sociales, solo se deben cargar en el SGSP\", refiriéndose al sistema informático del Ministerio del Interior. Es decir, sin utilizar el Sistema de Información del Proceso Penal Acusatorio del Uruguay (Sippau), donde deben cargarse todos los casos. \"No maneja muy bien\" ambos software, se excusó el profesional, de acuerdo al texto.\r\n\r\nAsimismo, el fiscal prohibió que se revise o cachee a ningún sospechoso a excepción de que se tenga \"la seguridad de que entre sus pertenencias o equipamiento lleve algún efecto hurtado\". Tampoco podrán los agentes policiales, según expresa orden del fiscal, identificar y conducir a personas a cualquier sede policial, \"sin previa anuencia de él\".\r\n\r\nLa sobrecarga de trabajo es el argumento principal que se ofrece para sostener estas indicaciones. Se expresa que el profesional \"manifestó\" que deberá permanecer durante \"26 días a la orden\" con cuatro días libres en el mes, \"lo cual le ocasionará un gran stres (sic)\". Además, se señala que \"hasta el mes de enero o febrero no se asignarán otros fiscales\". Por ese motivo, de acuerdo a lo indicado en el documento, el fiscal encomendó que durante el turno nocturno no se lo deberá llamar \"por hurtos menores, accidentes simples, etc., (pero) sí enterarlo por hechos de violencia doméstica que ameriten actuación penal\".\r\n\r\nFuentes de la Fiscalía Nacional de la Nación dijeron a El Observador que todas estas órdenes instruidas a la Policía quedaron sin efecto desde las 21.50 del 1º de noviembre –es decir, que rigieron casi durante 24 horas–, y que el informe de Layera no se espera sino \"hasta dentro de varios días\".', 'Fulano ', NULL, 1, 4, 1),
(14, 'Cuevas luchó pero no pudo con Rafa Nadal', '2017-11-03', '<b>El N°1 del mundo venció 6-3, 6-7, 6-3 al uruguayo por octavos de final del Masters 1000 de París\r\n AFP\r\nPablo Cuevas</b>\r\nPablo Cuevas perdió este jueves 3-6, 7-6(5), 4-6 contra Rafael Nadal y quedó eliminado en los octavos de final del Masters 1000 de París-Bercy dejando una muy buena imagen.\r\n\r\nDespués de superar en su último torneo de la gira ATP una racha negra de 10 derrotas consecutivas en las que sumó nueve eliminaciones en su primer partido de nueve torneos, Cuevas recuperó en París buenas sensaciones tenísticas.\r\n\r\nEn primera ronda cortó la racha que se inició en tercera ronda de Roland Garros cuando perdió ante Fernando Verdasco. Le ganó al ruso Karen Khachanov y recuperó la confianza que perdió desde que se presentó en julio en Bastad y perdió en primera ronda con el suizo Henri Laakson, entonces número 100 del mundo (hoy 97).\r\n\r\nEn segunda ronda superó al español Albert Ramos-Viñolas con parciales de 6-7(5), 7-6(1), 6-2 en un partido clave para demostrar que el factor psicológico –tan importante en el deporte y en particular en el tenis– también se había robustecido.\r\n\r\nY así se presentó ante Nadal, vigente número 1 mundial. El todoterreno, el zurdo que exige con su potencia, que las defiende todas y que jamás se quiebra.\r\n\r\nPero Cuevas salió dispuesto a hacer un buen partido, con movilidad y golpes profundos que mantuvieron lejos de la línea de fondo a Nadal.\r\n\r\n¿Alcanza con eso ante semejante bestia? Nunca. Por eso bastó un bajón en la intensidad del uruguayo y en la justeza de sus golpes para que Nadal lo quebrara y luego no soltara más el liderazgo del juego para llevarse cómodamente el primer parcial (6-3).\r\n\r\nEn el segundo set, el salteño aumentó su agresividad, con aces y winners que le permitieron lograr lo que no había podido en el primer set: jugar a su ritmo. Al final, su convencimiento le permitió ganar aún cuando estaba 2-4 abajo y con saque Nadal. Se repuso y se llevó el desempate 7-5.\r\n\r\nSin embargo, Cuevas tuvo más altibajos en el tercer y definitivo set. Ya no tuvo tanto acierto en sus golpes y bajó la intensidad, y con todo eso no pudo aprovechar el notorio bajón del español, que cometió muchos errores no forzados y se mostró afectado físicamente ya que después del segundo set solicitó atención médica y le colocaron una venda debajo de la rodilla derecha.\r\n\r\nCuevas también tuvo un golpe en el dedo pulgar de la mano izquierda, aunque siguió jugando con normalidad.\r\n\r\nEstando 2-0 abajo, Cuevas quebró y se acercó (2-3), pero Nadal apretó el acelerador para llevarse el partido.\r\n\r\nAsí cerró su temporada mundial. Cambiando imagen y pisada. Desde el lunes se lo podrá disfrutar en el Uruguay Open.\r\n\r\nLas cifras\r\n\r\n11 aces conectó Cuevas contra solo tres de Nadal que cometió siete doble faltas por una del uruguayo.\r\n54% de acierto tuvo Cuevas en el primer saque contra 65% de Nadal. De ese primer servicio, el salteño ganó el 70% de los puntos y Nadal el 72%. Ahí estuvo la diferencia del partido.\r\n60% de puntos ganados con el segundo saque tuvo Cuevas contra 56% de Nadal.\r\n6 break points salvó Cuevas de las 10 oportunidades que dispuso Nadal que por su parte salvó tres de cinco bolas de quiebre. Ambos empataron porcentualmente en el rubro con una eficacia de 60%.\r\n\r\nLa frase\r\n\r\n\"Ha sido un partido muy difícil, Pablo es muy buen jugador. Obviamente mi rodilla no está al 100%, voy a jugar en Londres si nada ocurre. Es en una semana y media, cualquier cosa puede pasar en una semana y media, pero si no ocurre nada extraño voy a estar ahí, por supuesto\", Rafael Nadal\r\n\r\nOtros resultados de la jornada\r\n\r\nFernando Verdasco le ganó a Dominic Thiem 6-4, 6-4\r\nJohn Isner a Grigor Dimitrov 7-6(10), 5-7, 7-6(3)\r\nJulien Benneteau a David Goffin 6-3, 6-3\r\nJuan Martín Del Potro a Robin Haase 7-5, 6-4\r\nJack Sock a Lucas Pouille 7-6(6), 6-3\r\nFilip Krajinovic a Nicolas Mahut 6-2, 3-6, 6-1\r\n\r\nCuartos de final\r\n\r\nFilip Krajinovic-Rafael Nadal/Pablo Cuevas\r\nJuan Martín Del Potro-John Isner\r\nJulien Benneteau-Roberto Bautista-Agut/Marin Cilic\r\nFernando Verdasco-Jack Sock\r\n', 'Fulano de Tal', NULL, NULL, 2, 1),
(15, 'Jugadores celestes piden \"un fútbol honesto', '2017-11-03', 'Los jugadores de la selección uruguaya emitieron una nota donde respaldaron la lucha del movimiento Más Unidos Que Nunca y dijeron estar comprometidos en la batalla \"por un fútbol honesto, transparente y democrático\".\r\n\r\nLa nota, que aparece en las redes sociales de los seleccionados, expresa textualmente:\r\n\r\n\r\n\r\n\"Los futbolistas de la selección manifestamos nuestro apoyo y reconocimiento a los compañeros del movimiento Más Unidos Que Nunca.\r\n\r\nSabemos del gran esfuerzo y compromiso de ustedes en la búsqueda de mejorar las condiciones del fútbol uruguayo.\r\n\r\nLos futbolistas estamos comprometidos en esta dura lucha en pos de obtener mecanismos transparentes de negociación, sin corrupción en la toma de decisiones, sin beneficiar a terceros en detrimento de los verdaderos actores de esta actividad y bregamos por un sistema digno, justo y equitativo para todos.\r\n\r\nValoramos también, la posición que ha tomado la Asociación Uruguaya de Fútbol al validar el trato en forma directa con los futbolistas integrantes del movimiento del cual nos sentimos parte y estamos seguros que este es el único camino posible para lograr las transformaciones que tanto necesita nuestro fútbol.\r\n\r\nPor un fútbol honesto, transparente y democrático', 'Fulana de Tal', NULL, 6, 2, NULL);
INSERT INTO `articulo` (`id_a`, `titulo`, `fecha_a`, `contenido`, `autor`, `likes`, `contador_a`, `id_s`, `art_d`) VALUES
(16, 'Lista de músicos con la que le responde a Rupenian', '2017-11-03', 'El comunicador Fernando Tetes y el director de Bizarro Records, Andrés Sanabria, publicaron mensajes que defienden la variedad y calidad de los artistas locales\r\nEn sus cuentas de redes sociales, el comunicador Fernando Tetes y el director de la discográfica Bizarro, Andrés Sanabria, respondieron a las declaraciones del empresario y conductor radial Berch Rupenian sobre la obligación de las emisoras de transmitir un 30% de música nacional en su programación.\r\n\r\nConsultado al respecto, Rupenian declaró a El Observador que las radios \"no están preparadas\" para emitir ese porcentaje, adjudicándolo a una falta de artistas nacionales que tengan la calidad necesaria para ser emitidos.\r\nEl primero en rebatir esa afirmación fue Sanabria, quien publicó en su cuenta de Twitter una lista de artistas nacionales de géneros, estilos y épocas diversas. \"Perdón a las decenas y decenas que no nombré. Hice un recorte y pegue fácil para ayudar a los que dicen que no hay tantos artistas nacionales\", escribió al final del listado.\r\n\r\nMás tarde, el comunicador Fernando Tetes, inspirado por la publicación de Sanabria, escribió un posteo en Facebook sobre el tema. \"Me da gracia que se diga que no se está preparado para pasar un 30% de música nacional en las radios. Es de una ignorancia primero, y de una falta de compromiso con la difusión de la música uruguaya que no asusta porque básicamente ratifica lo que he pensado siempre de la mayoría de las radios\", escribió Tetes.\r\n\r\nEl conductor de La cuchara y Ponete cómodo expresó su oposición a la cuotificación. \"Preferiría que se difundiera más porque existe el compromiso de mostrar, por el reconocimiento al creador e intérprete, que por una cuotificación\", aunque destacó que la reglamentación puede llevar a que los encargados de las radios acaben aceptando y difundiendo la música nacional por decisión propia.', 'Alguien', NULL, NULL, 4, 1),
(17, 'La San Felipe y Santiago está en carrera', '2017-11-03', 'Se llevó a cabo este martes el lanzamiento de la edición 23ª de la San Felipe y Santiago, la carrera callejera más antigua que se disputa en Montevideo y la heredera de la Travesía de las Playas. \"La San Felipe y Santiago es la carrera más antigua que se está corriendo en la capital y quiero destacar que para la Intendencia es prioridad. Cuando uno mira la cantidad de actividades y circuitos deportivos que hay en Montevideo y la cantidad de gente que eso moviliza cada fin de semana es un motivo que nos llena de orgullo. Así como es importante la seguridad y la limpieza, también lo es para nosotros las actividades deportivas que generan espacios de disfrute y convivencia\", dijo el intendente Daniel Martínez luego de agradecer a la Secretaría Nacional de Deportes y a la Confederación Atlética del Uruguay (CAU).\r\n\r\n\"Calculamos que puede haber hasta 6.000 corredores y por eso, gracias a esa participación masiva de la ciudadanía, consideramos a esta carrera como una gran fiesta de la ciudad. La cultura y el deporte le alimentan el alma a la gente, nos enseñan a compartir y a convivir. Para mí es un orgullo que la Intendencia respalde estas actividades que son, a esta altura, un sello de Montevideo. Habrá muchos uruguayos que tengan una meta por cumplir y no hay nada más lindo que llegar a la meta. Disfrutemos esta fiesta\", agregó el jefe comunal.\r\n\r\n\"Para la Confederación Atlética del Uruguay compartir este lanzamiento es algo muy importante porque San Felipe y Santiago marcó un estilo y fue la carrera que más uruguayos introdujo en el running\", declaró por su parte Lionel De Mello, el titular del CAU. La carrera será el 18 de noviembre a partir de la hora 19.15. El evento tendrá un límite de participantes, por lo cual la preinscripción a la carrera no asegura la participación.', 'Fulana', NULL, NULL, 2, NULL),
(18, 'PIT-CNT calificó informe de  OIT de \"surrealista\"', '2017-11-03', 'Luego de que la Organización Internacional del Trabajo (OIT) sostuviera en un documento enviado al gobierno que debe permitirse el ingreso de los no huelguistas al lugar de trabajo durante las ocupaciones, el presidente del PIT-CNT, Fernando Pereira, fue muy duro con el informe.\r\n\r\n\"Son surrealistas las cosas que se dicen, solo las puede afirmar alguien que haya pasado a diez kilómetros de un lugar de trabajo. Que en una fábrica que está ocupada, puedan convivir los demás trabajadores, directores y dueños de la empresa cumpliendo su tarea, es como si yo dijera voluntariamente que a partir de mañana las hinchadas de Nacional y Peñarol van a ir a la misma tribuna\", declaró Pereira este jueves en el programa Quien es Quien de Diamante FM.\r\n\r\nEn el documento la OIT mantiene su postura acerca de la ocupación, argumentando que se debe permitir el ingreso de los empleadores y empleados no huelguistas a las instalaciones de la empresa durante las medidas. La postura de la OIT coincide con la que los empresarios, que reclaman desde 2010.\r\n\r\nEl sindicalista insistió en que nunca haría la \"tontería\" de colocar en un lugar ocupado a los que quieran trabajar y a los ocupantes. \"Es un lío. Esto lo entiende cualquiera que haya entrado a un lugar de trabajo, sólo no lo puede comprender alguien que burocráticamente, desde un lugar lejano al mundo del trabajo, quiere pintar un mundo maravilloso con flores y peces de colores\", afirmó.\r\n\r\nAgregó que le llamó la atención que no se haya tomado en cuenta para la elaboración del documento el informe enviado por el PIT-CNT, mientras que si se estudió el del Poder Ejecutivo y el de las cámaras empresariales. \"Si se trata de un organismo tripartito no le puede faltar una parte\", dijo.\r\n\r\nSobre a las actuaciones de la Justicia en casos de ocupación, Pereira sostuvo que se deberían analizar los temas con mayor rigurosidad, ya que a veces se interviene de manera muy rápida en los conflictos de intereses. \"Cuando hay un desalojo se violenta un derecho del trabajador que es una modalidad del derecho de huelga\", argumentó.\r\n\r\nCon respecto a la queja presentada hace años por las cámaras empresariales, Pereira indicó que \"poner a Uruguay en esa lista negra en que lo han colocado es una mochila con la que van a tener que cargar mucho tiempo\".', 'Fulano', NULL, NULL, 3, NULL),
(19, 'Empresa que busca petróleo deja en pausa pozo ', '2017-11-03', 'sdfasdfasdfasdfasdfasdfasdfasdfadsfsdfasdafasdfasdfasd', 'asdfsd', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cl` int(11) NOT NULL,
  `corre_c` varchar(100) DEFAULT NULL,
  `pass_c` varchar(300) DEFAULT NULL,
  `edo_cl` tinyint(1) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `id_fb` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cl`, `corre_c`, `pass_c`, `edo_cl`, `id_p`, `id_fb`) VALUES
(1, 'manugancio@gmail.com', '$2y$10$5b1.bY3jMqybGOjiITaHWuPHdtJHQ3YNr5wXSHl9Is9W/4wjTe016', 1, 1, 0),
(8, 'ManuGancio@10213946737851605', NULL, 1, 8, 10213946737851605),
(9, 'usuario@correo.com', '$2y$10$uFdU8FpXePrq5vYNu7oAqOAOIaCe9HVt/7BhkmgIsvpBHRxu/gKPK', 1, 9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_cm` int(11) NOT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_c` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_cm`, `comentario`, `estado`, `fecha_c`) VALUES
(1, 'holi', 1, '2017-10-20'),
(2, 'a', 1, '2017-10-30'),
(3, 'a', 1, '2017-10-30'),
(4, 'a', 1, '2017-10-30'),
(5, 'ada', 1, '2017-10-30'),
(6, 'sdad', 1, '2017-10-30'),
(7, 'ad', 1, '2017-10-30'),
(8, 'Hola fb', 1, '2017-10-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `id_ed` int(11) NOT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  `fecha_ed` date DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`id_ed`, `titulo`, `fecha_ed`, `id_e`) VALUES
(1, '10213946737851605', NULL, NULL),
(2, '10213946737851605', NULL, NULL),
(3, '10213946737851605', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_e` int(11) NOT NULL,
  `e_correo` varchar(60) DEFAULT NULL,
  `pass_e` varchar(300) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `seccion` varchar(50) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio`
--

CREATE TABLE `espacio` (
  `id_esp` int(11) NOT NULL,
  `ubicacion` int(11) DEFAULT NULL,
  `seccion` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `espacio`
--

INSERT INTO `espacio` (`id_esp`, `ubicacion`, `seccion`, `precio`) VALUES
(1, 1, NULL, 100),
(2, 2, NULL, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examina`
--

CREATE TABLE `examina` (
  `id_cm` int(11) NOT NULL DEFAULT '0',
  `id_e` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gratis`
--

CREATE TABLE `gratis` (
  `id_cg` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gratis`
--

INSERT INTO `gratis` (`id_cg`, `id_cl`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hace`
--

CREATE TABLE `hace` (
  `id_cm` int(11) NOT NULL DEFAULT '0',
  `id_cl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hace`
--

INSERT INTO `hace` (`id_cm`, `id_cl`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hay`
--

CREATE TABLE `hay` (
  `id_pub` int(11) NOT NULL DEFAULT '0',
  `id_esp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hay`
--

INSERT INTO `hay` (`id_pub`, `id_esp`) VALUES
(3, 1),
(4, 2),
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_cp` int(11) NOT NULL,
  `ntarj` int(11) DEFAULT NULL,
  `id_cl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_cp`, `ntarj`, `id_cl`) VALUES
(1, 1234, 1),
(2, 2147483647, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_p` int(11) NOT NULL,
  `p_nomb` varchar(50) DEFAULT NULL,
  `p_ap` varchar(50) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_p`, `p_nomb`, `p_ap`, `tel`) VALUES
(1, 'Manuel', 'Gancio', '95548601'),
(8, 'Manu', 'Gancio', NULL),
(9, 'usuario', 'usu', '25686452');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id_pub` int(11) NOT NULL,
  `fecha_d` date DEFAULT NULL,
  `fecha_h` date DEFAULT NULL,
  `publicacion` varchar(1000) DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id_pub`, `fecha_d`, `fecha_h`, `publicacion`, `id_e`) VALUES
(3, '2017-10-20', '2017-11-16', 'http://placehold.it/300x200/dddddd/333333', NULL),
(4, '2017-10-20', '2017-11-22', 'http://placehold.it/1090x130/dddddd/333333', NULL),
(5, '2017-10-23', '2017-11-20', 'http://placehold.it/300x201/eeeeee/333333', NULL),
(6, '2017-10-31', '2017-11-30', 'http://placehold.it/1090x131/eeeeee/333333', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_s` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `contador` int(11) DEFAULT NULL,
  `id_ed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_s`, `nombre`, `contador`, `id_ed`) VALUES
(1, 'Economía', 8, NULL),
(2, 'Deportes', 11, NULL),
(3, 'Política', 6, NULL),
(4, 'Sociedad', 4, NULL),
(5, 'Espectáculos ', 24, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_sus` int(11) NOT NULL,
  `plan` int(1) DEFAULT NULL,
  `fecha_d` date DEFAULT NULL,
  `fecha_h` date DEFAULT NULL,
  `id_cp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id_sus`, `plan`, `fecha_d`, `fecha_h`, `id_cp`) VALUES
(1, NULL, '2017-11-03', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suspende`
--

CREATE TABLE `suspende` (
  `id_sp` int(11) NOT NULL DEFAULT '0',
  `motivo` varchar(50) DEFAULT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `id_cm` int(11) NOT NULL DEFAULT '0',
  `id_a` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`id_cm`, `id_a`) VALUES
(1, 2),
(2, 5),
(3, 5),
(6, 4),
(7, 4),
(8, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_a`),
  ADD KEY `id_s` (`id_s`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cl`),
  ADD KEY `id_p` (`id_p`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_cm`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`id_ed`),
  ADD KEY `id_e` (`id_e`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `id_p` (`id_p`);

--
-- Indices de la tabla `espacio`
--
ALTER TABLE `espacio`
  ADD PRIMARY KEY (`id_esp`);

--
-- Indices de la tabla `examina`
--
ALTER TABLE `examina`
  ADD PRIMARY KEY (`id_cm`),
  ADD KEY `id_e` (`id_e`);

--
-- Indices de la tabla `gratis`
--
ALTER TABLE `gratis`
  ADD PRIMARY KEY (`id_cg`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `hace`
--
ALTER TABLE `hace`
  ADD PRIMARY KEY (`id_cm`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `hay`
--
ALTER TABLE `hay`
  ADD PRIMARY KEY (`id_pub`,`id_esp`),
  ADD KEY `id_esp` (`id_esp`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_cp`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_p`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `id_e` (`id_e`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_s`),
  ADD KEY `id_ed` (`id_ed`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_sus`),
  ADD KEY `id_cp` (`id_cp`);

--
-- Indices de la tabla `suspende`
--
ALTER TABLE `suspende`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_cl` (`id_cl`),
  ADD KEY `id_e` (`id_e`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`id_cm`,`id_a`),
  ADD KEY `id_a` (`id_a`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_cm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `id_ed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
  MODIFY `id_esp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `gratis`
--
ALTER TABLE `gratis`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_cp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_sus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `seccion` (`id_s`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `persona` (`id_p`);

--
-- Filtros para la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD CONSTRAINT `edicion_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `persona` (`id_p`);

--
-- Filtros para la tabla `examina`
--
ALTER TABLE `examina`
  ADD CONSTRAINT `examina_ibfk_1` FOREIGN KEY (`id_cm`) REFERENCES `comentario` (`id_cm`),
  ADD CONSTRAINT `examina_ibfk_2` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`);

--
-- Filtros para la tabla `gratis`
--
ALTER TABLE `gratis`
  ADD CONSTRAINT `gratis_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`);

--
-- Filtros para la tabla `hace`
--
ALTER TABLE `hace`
  ADD CONSTRAINT `hace_ibfk_1` FOREIGN KEY (`id_cm`) REFERENCES `comentario` (`id_cm`),
  ADD CONSTRAINT `hace_ibfk_2` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`);

--
-- Filtros para la tabla `hay`
--
ALTER TABLE `hay`
  ADD CONSTRAINT `hay_ibfk_1` FOREIGN KEY (`id_pub`) REFERENCES `publicidad` (`id_pub`),
  ADD CONSTRAINT `hay_ibfk_2` FOREIGN KEY (`id_esp`) REFERENCES `espacio` (`id_esp`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`);

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `publicidad_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`);

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `seccion_ibfk_1` FOREIGN KEY (`id_ed`) REFERENCES `edicion` (`id_ed`);

--
-- Filtros para la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`id_cp`) REFERENCES `pago` (`id_cp`);

--
-- Filtros para la tabla `suspende`
--
ALTER TABLE `suspende`
  ADD CONSTRAINT `suspende_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`),
  ADD CONSTRAINT `suspende_ibfk_2` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`);

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_cm`) REFERENCES `comentario` (`id_cm`),
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_a`) REFERENCES `articulo` (`id_a`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
