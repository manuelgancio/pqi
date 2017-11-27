-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2017 a las 18:41:28
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
-- Base de datos: `pq5`
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
  `art_d` tinyint(1) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_a`, `titulo`, `fecha_a`, `contenido`, `autor`, `likes`, `contador_a`, `id_s`, `art_d`, `imagen`) VALUES
(1, 'Esta es la generación App', '2017-11-25', '<b>Liceales de todo el país idearon aplicaciones móviles educativas y presentaron sus logros en la Cuarta Olimpíada de Robótica, Programación y Videojuegos</b> Cuatro estudiantes de la Escuela Técnica de Tranqueras (Rivera) desarrollaron una aplicación que permite notificar a la intendencia sobre los lugares sucios de la ciudad. Mediante la app denominada Hacia un mundo mejor los ciudadanos que detecten un basural podrán enviar un aviso a la comuna para que lo limpie.\r\n\r\n\"Las zonas limpias están identificadas por puntos verdes y los sucios por puntos rojos. La idea es que la persona que vea un basural pueda subir una foto y con la ayuda del GPS del móvil se detecte la ubicación y, de esta forma, un sistema de notificaciones le avise a la intendencia para que vayan a limpiar la zona\", explicó uno de los profesores del equipo, Ernesto Dos Santos.\r\n\r\nEl equipo está integrado por Mónica Álvez (12), Álvaro Clavijo (14), Nataly Rodríguez (13) y Marcos Izquierdo (14), además de sus profesores Ernesto y Marcos dos Santos.\r\n\r\nEl docente contó a Cromo que cuando surgió la idea de llevar a cabo esta aplicación se comunicaron con la alcaldía de la ciudad de Tranqueras, de donde recibieron el apoyo para concretarla. Sin embargo, indicó que replantearán la situación cuando tengan el proyecto en una etapa más avanzada.\r\n\r\n\"Nosotros veíamos que en nuestra escuela teníamos problemas de basurales y poca información de los alumnos. Entonces surgió la idea de salir a recorrer la ciudad para detectar los diferentes lugares y vimos que podíamos contribuir a través de una aplicación móvil para solucionar ese problema\", relató.', 'Manuel Gancio', 1, 8, 1, 1, NULL),
(2, 'Suárez y el conflicto de la Mutual', '2017-11-25', '<b>El salteño habló con Referí sobre la rodilla que lo tuvo a maltraer, la selección, Tabárez y la salida de Neymar entre otras cosas</b>\r\n', 'Fulano', 1, 1, 2, NULL, 'http://placehold.it/720x470/eeeeee/333333'),
(3, 'Hoy abre Mercado Ferrando', '2017-11-25', 'A la izquierda, verduras de estación, a la derecha, café de origen; a la izquierda, cortes de carnes premium, a la derecha, frutos secos con chocolate. Y así, a ese ritmo, hay que contar 17 locales en funcionamiento para la inauguración de esta primera etapa de Mercado Ferrando, una feria de sabores bajo techo en una ex fábrica de muebles, justo donde Cordón no terminaba de iluminarse.\r\n\r\nAunque el piso superior se termina de abrir en marzo, ya está habilitada la terraza del fondo, a la que se accede por escalera. Abajo, todos los días, funcionan desde hoy, entrando por Chaná 2120 esquina Salterain, la cafetería Ganache, que muchos conocerán desde hace cinco años por su local de Colonia del Sacramento, y la verdulería y frutería Perejil, con la cual una publicista se pasa a un rubro que ya estaba en la familia. Justamente, el belga Maxime Degroote y la uruguaya Pierina Lanzaro hablaron de compromiso al referirse a la elección de las propuestas independientes que pueblan el paseo gastronómico, donde apuntan a algo cercano al “atendido por sus propios dueños”, y a que un local potencie al de al lado.\r\n\r\nEn Ganache, además de tomar un café, se lo puede llevar en grano, tostado, seleccionado por su barista, en este momento de origen colombiano y muy fresco, cosecha de setiembre. Otras variedades vendrán en próximas partidas de Brasil y Costa Rica. Allí mismo, en la entrada del Mercado, tendrán a la venta accesorios, cafeteras de prensa francesa e italiana. Para ponerse en frecuencia verano, ofrecen summer coffee, que es café, helado y Bailey’s o dulce de leche, y cold brew, es decir, café frío obtenido tras 20 horas de infusión.\r\n\r\nComo una cosa no quita la otra, ahí cerca, en Wuyi, venderán tés recién preparado o en hebras, importados de Asia y Europa, y también ofrecerán tragos a base de té. Pero todo eso a partir del lunes. Mientras tanto, se puede ir por un Master Beef (un tiernísimo ojo de bife con hueso) en la impoluta carnicería Beef House, o llevar especias al peso en Samud –se puede pedir paquetes de una misma línea, de oriente o mediterránea, por ejemplo, o armar un blend–. De factura propia tienen unos chutneys y una salsa sweet chili imperdible, y pronto piensan sumar una sriracha como la asiática, picante y casera.\r\n\r\nLutini es un almacén con insumos para repostería y productos para picadas, y quieren impulsar en especial el consumo de chocolate puro y cobertura de origen brasileño, de distintas fincas. Detrás de Mundano hay tres amigos que ya tenían emprendimientos de catering, cada uno por su lado. Reunidos en el Mercado, quieren aplicar el concepto de tapas y raciones pero no sólo apuntando a la cocina española. Es decir, poner una pata en los pintxos vascos y otra en la cocina uruguaya y regional. Las raciones –un pulpo a la gallega o unos ñoquis mediterráneos– están pensadas como platos pequeños, con la idea de compartir tres entre dos personas.\r\n\r\nLos muchachos de Olapoke dicen que en California se ve tanto esta tendencia de los poke bowls como en su lugar de origen, que es Hawaii. Hay una serie de pasos que el restaurante sugiere para armar el bowl, como elegir la proteína o la base. Es con pescado marinado (salmón, atún) o tofu, y se ofrecen diferentes bases: arroz de sushi, arroz integral, quinoa, mix de verdes.\r\n\r\nEn la vuelta rápida por esta plaza algo industrial, uno se topa con el rincón de mesitas de la hamburguesería La Burguesa, el amplio panorama de cervezas artesanales de OPB, la garantía de los helados gourmet Chelato, que viene sumando locales. También está la opción de tomarse una michelada en Putaparió, el mostrador peruano-mexicano donde se consigue tanto un taco de cerdo como un ceviche de corvina, parar en la pizzería Il Gufo, el bazar Cilantro, la tienda de vinos Madirán, la panadería Atelier Cataleya, y uno promete no irse sin probar los churros rellenos de chocolate de Boxes (que también tiene waffles).\r\n\r\nLa Librería del Mercado está especializada en el rubro y no sólo por los recetarios, sino por títulos como Delizia! La historia épica de la comida italiana, de John Dickie, o Cocina, cuisine y clase, un estudio de sociología comparada de Jack Goody.\r\n\r\nVolviendo a Perejil, quizás ya de salida, uno sabe que va a encontrar productos orgánicos y los de siempre, de acuerdo a la canasta de estación. Apuntan a que la gente aprenda a consumir, porque lo más rico y económico es lo que hay en el momento y acá cerca. Por eso, con el mismo criterio, ofrecen media docena de jugos que van variando. Si se quiere, junto al surtido, allí mismo se consigue el merchandising de Mercado Ferrando, entre ellos los delantales de lona.\r\n\r\nEntrada por la calle Chaná 2120. Abierto de lunes a sábado de 8.00 a 1.00 y domingos de 9.00 hasta la madrugaada. Estacionamiento por la calle Joaquín de Salterain.', 'Manuel Gancio', NULL, 4, 2, 1, NULL),
(4, 'Después de las juventudes', '2017-11-25', 'En la disquerías de confianza –y también en las otras– ya se puede conseguir \"Festejar para sobrevivir\", un DVD y doble CD que incluye el documental homónimo sobre los 20 años de La Vela Puerca y el recital con el que los festejaron, allá por noviembre de 2016 en el Velódromo Municipal. Mientras tanto, la banda está trabajando, a paso firme y lento, como siempre, en su próximo disco de estudio, sucesor de \"Érase\" (2014).\r\n\r\nEn el subsuelo, el olor a humedad nos golpea en la cara. Todavía queda mucho por hacer. El nuevo búnker de La Vela Puerca se está armando en una casa grande y vieja sobre la calle San Salvador, en el barrio Palermo. Sebastián Teysera –El Enano de La Vela, para todo el mundo– nos muestra todos los recovecos mientras degusta una botella chica de cerveza nacional que tiene nombre de mujer.\r\n\r\nEl DVD se llama Festejar para sobrevivir. ¿Sobrevivir a qué?\r\n\r\nA los 20 años, porque nunca fue una meta impuesta por nosotros. Después de aquel concierto del 24 de diciembre de 1995, si nos poníamos a pensar “qué bueno sería durar 20 años”, no lo hubiéramos logrado. Entre ese desparpajo y esa inocencia de vivir el presente y que no importaba lo que pasaba la otra semana fue que sobrevivimos esos 20 años, porque la parábola subió y bajo muchísimas veces. También festejamos que sobrevivimos como amigos. Porque éramos amigos de antes y nos convertimos en compañeros de laburo. Si de pronto se pudre todo, dejás de ser compañero de laburo y también amigo, pero por suerte no nos pasó eso.\r\n\r\n¿Siempre tuviste claro que querías cantar?\r\n\r\nNo, canto por accidente. Yo quería tener una banda de rock con mis amigos. Tocaba la guitarra en Tranvía 35, que era otra banda, y no cantaba nada; pero un día faltó el vocalista y tuve que cantar yo. Desde ese entonces no paré nunca. Pero cantar nunca fue mi sueño. No tenía ni idea y nunca había cantado en mi vida. Tuve que hacerlo y lo hice. A mí no me importaba, yo quería tener una banda y hacer música, así tocara el triángulo. Sí me gustaba hacer canciones. Compongo desde los 15 años, y a esa edad no tenía ni banda.\r\n\r\n¿Recordás cuándo fue la primera vez que hiciste una canción que te hizo pensar que podía funcionar?\r\n\r\nEn el primer concierto que dimos con La Vela. Teníamos tres o cuatro temas y los demás eran covers. Más allá de la reacción de los amigos, pensé que esto podía llegar a andar. Y después, cuando salió Deskarado [1998], me acuerdo de hablar con el Mandril [Nicolás Lieutier, bajista del grupo] y decirle: “Bo, esto nunca va a volver a ser lo mismo”, porque sacás un disco y algo esperás: pasa algo o no pasa nada. Si no pasa nada, volvés al garaje o vuelve a ser un hobby, pero con esa desazón de pensar “pa, no pasó nada, qué cagada”, y si pasaba algo, ¿qué hacíamos? ¿Nos tirábamos al agua? Y pasó eso. Todos teníamos unos laburos de mierda, así que no nos costó nada.\r\n\r\n¿Qué laburos de mierda tuviste?\r\n\r\nEra cadete, sudaba la gota gorda por el Centro. Después le di una mano a mi viejo, corriendo seguros, pero nunca alcancé ninguno. También hice hotelería y fui mozo de restaurante en La Paloma, pero nada que me entusiasmara.\r\n\r\nCuando empezaron a ensamblar un sonido con La Vela, ¿tenían en mente que lo que iban a hacer no se parecería mucho a lo que hasta ese momento era el rock uruguayo?\r\n\r\nUna de las premisas de Deskarado –influenciados, lógicamente, por la llegada de Mano Negra en el 92– era patear un poco el tablero y decir que el rock podía ser contestatario y rebelde sin ser oscuro, que era la premisa del pospunk inglés que había acá, de Los Estómagos y Los Traidores. Era una cosa muy gris. Y además, la otra cosa era que no sabíamos tocar. Eso fue una limitación que de pronto nos jugó a favor para hacer ska, reggae y un poco de punk, con tres acordes. No podíamos hacer mucha cosa. Sin embargo, nadie de la banda escuchaba ska en ese momento. Conocíamos a Los Fabulosos Cadillacs, todo bien, y escuchábamos reggae, a Bob Marley y Peter Tosh, como todo el mundo.\r\n\r\nAsí que no se castigaban con Ska-P...\r\n\r\nNo, menos. Los conozco y está todo bien, pero una cosa es la música y otra las personas... Ni conocíamos a Ska-P. Yo escuchaba Blue Oyster Cult, nada que ver. Pero eso lo podíamos tocar. Si decíamos: “Vamos a hacer una banda como Deep Purple”... olvidate, no podíamos. Pero lo importante era hacer canciones y decir lo que pensábamos y sentíamos, y la única manera de hacerlo era con eso: reggae, ska y un poco de punk, que era lo que podíamos tocar.\r\n\r\nLa Vela Puerca fue la punta de lanza de la movida del rock de 2000. ¿Desde adentro cómo lo viste?\r\n\r\nFue así. Porque nos dimos cuenta de que, si queríamos pelear por el sueño de vivir de esto, teníamos una ciudad acá al lado como Buenos Aires, con un circuito tremendo, y empezamos a ir cada vez más, y cada vez que íbamos llevábamos cosas de las bandas amigas. La primera vez que fuimos a Europa, en 2003, hicimos lo mismo: les pedimos discos a todas las bandas y los íbamos dejando por todos lados. Y así fueron No Te Va Gustar, La Abuela Coca, etcétera. Siempre nos gustó ese rol de entornar una puerta y que la gente sepa qué hay atrás. Después, cada uno hizo su camino. Nosotros solamente entornamos la puerta, cada uno terminó de abrirla.\r\n\r\nSupongo que con el éxito del disco De bichos y flores, en 2001, te diste cuenta de que para la banda ya no había vuelta.\r\n\r\nSí, con “El viejo”, que hizo un crossover muy grande y las radios empezaron a pasar música nacional que antes no pasaban. Y que te dejen los huevos de bufanda con el pá pararará [tararea la melodía de vientos de “El viejo”]: “Ferretería esto”, “Carnicería lo otro”... No, por favor... También había que hacerse cargo. La pusimos en el freezer durante años porque la pobre canción tampoco tenía la culpa. Fue una cosa que le sucedió y que no fue premeditada.', 'Manu', NULL, 2, 2, 1, NULL),
(5, 'Goles Uruguayos', '2017-11-25', 'Ronaldo le dio la victoria al Real Madrid al recibir en sus pies el rebote del penal que no pudo anotar. Antes, Diego Rolan y Gonzalo \"Chory\" Castro pusieron los empates transitorios de Málaga, pero no pudieron evitar el 3-2 definitivo.', 'Fulanito', NULL, 1, 3, NULL, NULL);

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
(1, 'manugancio@gmail.com', '$2y$10$tnyovFBW.iBox2vNOf6FWOch75eKMJMMmdPt1J6OSY7I3Wj41jG8u', 1, 1, 0),
(2, 'ManuGancio@10213946737851605', NULL, 1, 3, 10213946737851605);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_cm` int(11) NOT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  `reportado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_cm`, `comentario`, `estado`, `fecha_c`, `reportado`) VALUES
(1, 'Genial!', 1, '2017-11-25', NULL),
(2, 'Sabelo', 1, '2017-11-25', NULL),
(3, 'apa la papa', 1, '2017-11-25', 2),
(4, 'Vamo la banda', 1, '2017-11-25', NULL);

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

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_e`, `e_correo`, `pass_e`, `cargo`, `seccion`, `id_p`) VALUES
(1, 'svaldez@gmail.com', '1234', 'Admin', NULL, 2);

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
(1, 1, 'cuadrado_index', 100),
(2, 2, 'banner_h_noticia', 200),
(3, 3, 'bannner_h_secciones', 300),
(4, 4, 'banner_v_noticias', 500),
(5, 5, 'banner_index', 600);

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
(4, 2);

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
(1, 1),
(2, 2),
(3, 5),
(4, 3),
(5, 4),
(6, 4);

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
(1, 2147483647, 1);

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
(1, 'Manuel', 'Gancio', '95554581'),
(2, 'Santiago ', 'Valdez', '05525151'),
(3, 'Manu', 'Gancio', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id_pub` int(11) NOT NULL,
  `fecha_d` date DEFAULT NULL,
  `fecha_h` date DEFAULT NULL,
  `publicacion` varchar(1000) DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id_pub`, `fecha_d`, `fecha_h`, `publicacion`, `id_e`, `id_seccion`) VALUES
(1, '2017-11-25', '2017-12-31', 'http://placehold.it/300x200/dddddd/333333', NULL, NULL),
(2, '2017-11-25', '2017-12-31', 'http://placehold.it/1090x130/dddddd/333333', NULL, NULL),
(3, '2017-11-25', '2017-12-31', 'http://placehold.it/1090x130/dddddd/333333', NULL, NULL),
(4, '2017-11-25', '2017-12-31', 'http://placehold.it/1090x130/dddddd/333333', NULL, 2),
(5, '2017-11-25', '2017-12-31', 'http://placehold.it/200x470/eeeeee/333333', NULL, 1),
(6, '2017-11-25', '2017-12-31', 'http://placehold.it/200x470/eeeeee/333333', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_s` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `contador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_s`, `nombre`, `contador`) VALUES
(1, 'Economía', 8),
(2, 'Sociedad', 14),
(3, 'Deportes', 10),
(4, 'Política', 3);

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
(1, NULL, '2017-11-25', NULL, 1);

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
(1, 1),
(2, 5),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_s`
--

CREATE TABLE `tiene_s` (
  `id_s` int(11) NOT NULL DEFAULT '0',
  `id_ed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id_s`);

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
-- Indices de la tabla `tiene_s`
--
ALTER TABLE `tiene_s`
  ADD PRIMARY KEY (`id_s`),
  ADD KEY `id_ed` (`id_ed`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_cm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `id_ed` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
  MODIFY `id_esp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `gratis`
--
ALTER TABLE `gratis`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_cp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

--
-- Filtros para la tabla `tiene_s`
--
ALTER TABLE `tiene_s`
  ADD CONSTRAINT `tiene_s_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `seccion` (`id_s`),
  ADD CONSTRAINT `tiene_s_ibfk_2` FOREIGN KEY (`id_ed`) REFERENCES `edicion` (`id_ed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
