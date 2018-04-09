-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09/04/2018 às 17:44
-- Versão do servidor: 5.6.39
-- Versão do PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `satisfactionbd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `emails` varchar(200) NOT NULL,
  `tecnical_visits` int(11) NOT NULL,
  `forms_answereds` int(11) NOT NULL,
  `V11_ID` int(11) NOT NULL,
  `effectiviness` double NOT NULL DEFAULT '0',
  `avaliation_avarage` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `customer`
--

INSERT INTO `customer` (`idcustomer`, `name`, `emails`, `tecnical_visits`, `forms_answereds`, `V11_ID`, `effectiviness`, `avaliation_avarage`) VALUES
(4, 'CAIXETA (LOURDES)', 'caixetabeer@gmail.com ', 1, 0, 11122, 0, 0),
(5, 'TUNEL DO ROCK', 'tuneldorockbh@terra.com.br araujorsa@gmail.com ', 2, 0, 5158, 0, 0),
(6, 'ALTA TENSÃO', 'sonia.mara@atlinhaviva.com.br alexandre@atlinhaviva.com.br carla.sousa@atlinhaviva.com.br carla.sousa@atlinhaviva.com.br  lucia.silva@atlinhaviva.com ', 1, 0, 1221, 0, 0),
(7, 'MERCEARIA 130 - SERRA', 'marco_lucchese@hotmail.com mercearialourdes@gmail.com mercearia130.financeiro@gmail.com ', 1, 0, 3923, 0, 0),
(8, 'BOI VINDO', 'boivindo@gmail.com ssvc2008@hotmail.com adelcio@boivindo.com.br WWW.BOIVINDO.COM.BR ', 3, 0, 2585, 0, 0),
(9, 'BABY BARREIRO', 'malamudteixeira@uol.com.br babybarreiro@hotmail.com ', 1, 0, 6061, 0, 0),
(10, 'CHACARA GRILL', 'marcelojsrep@hotmail.com chacaragrill@gmail.com  ', 1, 0, 4733, 0, 0),
(11, 'MERCADO GRANO', 'ferreiralicara@gmail.com ', 2, 0, 9233, 0, 0),
(12, 'TOQUE DE CHEF', 'toquedechef@hotmail.com ', 1, 1, 5130, 100, 5),
(13, 'NIMBOS BAR (ANTIGO HAMBURGUERIA)', 'arthur.angove@gmail.com nimbosbar@gmail.com ', 1, 0, 3479, 0, 0),
(14, 'BOI WERNECK', 'boiwerneck@hotmail.com boiprudente@hotmail.com ', 3, 0, 1740, 0, 0),
(15, 'TOP CAR CENTRO AUTOMOTIVO', 'topcarautomotivo_bs@hotmail.com ', 1, 1, 11132, 100, 5),
(16, 'ARTLUX', 'artlux@artluxmg.com.br ', 1, 0, 10998, 0, 0),
(17, 'AO PE DA VACA / MEMORIAL COTOCHES (ABRE CAMPO)', 'russogabriel288@gmail.com memorialcotochesxml@yahoo.com.br ', 1, 0, 10657, 0, 0),
(18, 'PASTELARIA FUJIYAMA - CARREFOUR', 'marciobrasil2009@uol.com.br wilsonvila123@gmail.com ', 3, 7, 389, 233, 5),
(19, 'PAMPULHA STAND BAR', 'tarcisiolopestreze@gmail.com juliana.malheiros10@gmail.com ', 1, 0, 9846, 0, 0),
(20, 'BAR NACIONAL (VENDA NOVA)', 'sararegina.reis@hotmail.com ', 1, 0, 456, 0, 0),
(21, 'TROPEIRO E CIA', 'gabriel_soares57@hotmail.com michael_gabriel2006@hotmail.com josemariasoares005@gmail.com ', 1, 0, 1177, 0, 0),
(22, 'MOTEL DUBAI', 'contato@moteldubaibh.com.br ', 1, 0, 6032, 0, 0),
(23, 'AA RESTAURANTE', 'restauranteaa.compras@gmail.com aa.financeiro@gmail.com aa.rubinho@terra.com.br luis.e.t@terra.com.br ', 1, 0, 3911, 0, 0),
(24, 'TONINHO PIZZARIA DELIVERY BELEM', 'italopc_violino@yahoo.com.br antoninoviolino@yahoo.com.br ', 2, 1, 6068, 50, 5),
(25, 'VIA GERAIS I', 'evanildorosa@globo.com viageraes@viageraes.com.br viageraes@yahoo.com ', 1, 1, 307, 100, 5),
(26, 'SALVATERRA - TEIXEIRAS (JUIZ DE FORA)', 'alvaro.som@hotmail.com restaurantesalvaterra@gmail.com ', 2, 0, 8301, 0, 5),
(27, 'CHXICO DO CHURRASCO - LOURDES', 'chxicolourdes@hotmail.com ', 2, 1, 447, 50, 5),
(28, 'RESTAURANTE ROSANA (CARANDAI)', 'restauranterosana2011@hotmail.com ', 2, 0, 7018, 0, 5),
(29, 'SALVATERRA - ALTO DOS PASSOS (JUIZ DE FORA)', 'alvaro.som@hotmail.com restaurantesalvaterra@gmail.com ', 1, 0, 10615, 0, 0),
(30, 'PAPPA DOG (JUIZ DE FORA)', 'g.luz@globo.com ', 3, 0, 11274, 0, 0),
(31, 'BARBARUS BAR E RESTAURANTE', 'guilherme@multimeiosbh.com.br ', 1, 0, 10988, 0, 0),
(32, 'SAATORE RISTORANTE (PAMPULHA)', 'wanderson@saatore.com.br contato@saatore.com.br nelia@saatore.com.br gracabarbosa420@gmail.com ', 1, 0, 5861, 0, 0),
(33, 'SAISHO CULINARIA ORIENTAL', 'fabricioadmec@gmail.com restaurantesaisho@gmail.com ', 2, 0, 722, 0, 0),
(34, 'PIZZA SUR - BAHIA', 'bmachado@moityca.com.br groman@moityca.com.br ', 3, 0, 419, 0, 0),
(35, 'BURGUERIA E ACAI SPAZZO', 'nandadmaria@hotmail.com fabiotrp@hotmail.com ', 4, 0, 8786, 0, 0),
(36, 'MR. TUGAS CERVEJARIA - MATRIZ - EMC (JUIZ DE FORA)', 'natalialad@yahoo.com.br mistertugas@yahoo.com.br ', 3, 0, 1648, 0, 0),
(37, 'BARBANTE RESTAURANTE (JUIZ DE FORA)', 'financeiro@cervejariabarbante.com.br cervejariabarbante@ymail.com  contato@cervejariabarbante.com ', 6, 0, 3654, 0, 0),
(38, 'SANTA HORA BAR (JUIZ DE FORA)', 'santahorabar@hotmail.com santahorabar@hotmail.com ', 2, 0, 3810, 0, 0),
(39, 'AH BON - VILA DA SERRA', 'euler@ahbon.com.br eulerleo@hotmail.com andreia.ahbon@hotmail.com financeirocinco@hotmail.com renata@eddieburger.com.br ', 1, 0, 9244, 0, 0),
(40, 'JAMES BURGER - FUNCIONARIOS', 'paulinhaloyola@gmail.com  victorzica@gmail.com ', 1, 0, 450, 0, 0),
(41, 'PIZZA KLUB (JUIZ DE FORA)', 'adsilvarepresentacoes@gmail.com contato@pizzaklub.com.br  gil.berbari@oi.com.br ', 1, 0, 5474, 0, 0),
(42, 'EMPORIO SANTO ALHO - MR. MOORE (JUIZ DE FORA)', 'emporiosantoalho@gmail.com bernardormartins@gmail.com niscarlatelli@gmail.com  ', 5, 4, 11267, 80, 4.8),
(43, 'SANTO GROWLER STATION', 'aristonioduart@gmail.com douglasdt01@gmail.com ', 2, 2, 11109, 100, 5),
(44, 'PELLEGRINO', 'pellegrino@pellegrinorestaurante.com.br contato@pellegrinorestaurante.com.br compras@pellegrinorestaurante.com.br ', 4, 1, 4340, 25, 5),
(45, 'DOM QUIXOTE (BRUMADINHO)', 'wdsa1989@gmail.com ', 1, 1, 11447, 100, 5),
(46, 'RESTAURANTE VECCHIO SOGNO', 'bete@vecchiosogno.com.br financeiro@vsfestas.com.br ', 1, 1, 621, 100, 5),
(47, 'FOAD (BETIM)', 'danielfl@terra.com.br ', 1, 0, 11091, 0, 0),
(48, 'GFC FRIED CHICKEN (PALMARES)', 'gfc.palmares@gmail.com  ', 1, 0, 7604, 0, 0),
(49, 'LA BOCA RESTAURANTE (JUIZ DE FORA)', 'labocaecia@ig.com.br ', 3, 0, 4246, 0, 0),
(50, 'PIZZARIA BIAZZA', 'pizzariabiazza@gmail.com ', 1, 0, 743, 0, 0),
(51, 'SILVINHOS BAR I', 'silvinhosbar@yahoo.com.br silvinhosbar1234@gmail.com ', 2, 0, 250, 0, 0),
(52, 'COMPANHIA DO CAVALO', 'ciadocavaloshow@gmail.com ', 1, 0, 430, 0, 0),
(53, 'CICLOFOG (BETIM)', 'rodrigofreitas@ciclofog.com.br robertfreitas@ciclofog.com.br lrfreitas2010@hotmail.com  francinesilva@ciclofog.com.br ', 2, 1, 8263, 50, 5),
(54, 'CASA BONOMI', 'casabonomi@yahoo.com.br ', 3, 0, 8150, 0, 0),
(55, 'NOVA GOURMET', 'vazealbuquerque@gmail.com freegelprochurrasco@gmail.com ', 1, 0, 8644, 0, 0),
(56, 'REPUBLICA DA ESBORNIA', 'bruno@republicadaesbornia.com.br contato@republicadaesbornia.com.br ', 3, 0, 999, 0, 0),
(57, 'JS FINE BURGER (LOURDES)', 'julio.cesar01@gmail.com isabella.mrreis@gmail.com ', 3, 0, 11164, 0, 0),
(58, 'IBIZA CLUB (JUIZ DE FORA)', 'ibizaclubjf@hotmail.com  ', 3, 0, 6120, 0, 0),
(59, 'PASTELARIA MARILIA DE DIRCEU - FABRICA', 'pastelaria@mariliadedirceu.com.br mariangela@mariliadedirceu.com.br patricia@mariliadedirceu.com.br ', 7, 3, 283, 42, 5),
(60, 'PASTELARIA MARILIA DE DIRCEU - LOURDES', 'mariangela@mariliadedirceu.com.br flavia@mariliadedirceu.com.br patricia@mariliadedirceu.com.br  flavia@mariliadedirceu.com ', 4, 5, 28, 125, 5),
(61, 'TRADICAO DE MINAS (PE.EUSTAQUIO)', 'danbhz@gmail.com alexsandraagomes@gmail.com   danbhz@gmail.com  ', 1, 0, 726, 0, 0),
(62, 'KOI E CIA', 'asnonakas@hotmail.com ale9ka@hotmail.com  ', 2, 0, 5911, 0, 0),
(63, 'KANGAROO KEBABS (MINAS SHOPPING)', 'filipefmbicalho1@gmail.com joseceliobicalho@hotmail.com ', 1, 1, 8297, 100, 3),
(64, 'MERCADINHO MINEIRO (CID. ADMIN)', 'mercadinhomineiro@gmail.com ', 2, 1, 3961, 50, 5),
(65, 'RECANTO DO SABIA', 'lidiane.monteverde@gmail.com recantodosabia10@gmail.com financeirorecantodosabia@gmail.com rodrigo.monteverde@gmail.com ', 1, 0, 2767, 0, 0),
(66, 'HAMONI (RESTAURANTE CIDADE NOVA)', 'vanessa_mara83@yahoo.com.br ', 5, 0, 8307, 0, 0),
(67, 'CHXICO DO CHURRASCO - CAICARA', 'xicodochurrasco@uol.com.br xicochurrasco@gmail.com ', 2, 1, 26, 50, 5),
(68, 'FEIJUADA (ESPACO VILA RICA)', 'faeldavid@yahoo.com.br consuelochami@yahoo.com.br mcb10@ig.com.br ', 2, 1, 4937, 0, 0),
(69, 'DOMENICO PIZZERIA TRATTORIA', 'nico@pizzapezzi.com.br  domenico@domenicopizzeria.com.br ', 1, 0, 2723, 0, 0),
(70, 'BAR DO ANTONIO PE DE CANA - CARMO/SION', 'bardoantoniopedecana@gmail.com isabel.t.adm@gmail.com ', 0, 0, 1554, 0, 0),
(71, 'COLEGIO APRENDIZ - ANEXO TOCA DA CORUJA (BARBACENA)', 'geraldo@aprendiz.edu.br ', 1, 0, 11472, 0, 0),
(72, 'BUFFALO WINGS (JUIZ DE FORA)', 'marceloalmeida@abccomvoce.com.br ', 4, 0, 5362, 0, 0),
(73, 'AFFETTO PRESENTES CRIATIVOS - EMC (JUIZ DE FORA)', 'affettopresentescriativos@hotmail.com ', 2, 1, 11467, 50, 5),
(74, 'BARRIL (JUIZ DE FORA)', 'alelex1806@gmail.com leandroimperioproducoes@gmail.com juener@mafrainformatica.com.br barril.jf@gmail.com  leandroimperioproducoes@gmail.com  ', 7, 0, 8538, 0, 0),
(75, 'ALOHA SUCOS - ALTO DOS PASSOS (ANTIGO SHOP. INDEPENDENCIA)', 'anabargiona@gmail.com fabricioaloha@yahoo.com.br alohasucoscentro@gmail.com ', 4, 0, 2533, 0, 0),
(76, 'HARAS MIRIM (MATIAS BARBOSA)', 'harasmirimb@gmail.com ', 2, 0, 7637, 0, 0),
(77, 'GUARANA DA AMAZONIA - BENFICA (JUIZ DE FORA)', 'lojaguarana@hotmail.com ', 4, 1, 1337, 25, 5),
(78, 'RUA BAR E RESTAURANTE', 'marcosxavsa@gmail.com ', 1, 0, 11345, 0, 0),
(79, 'SHOULDER STEAK E BEER (BETIM)', 'mendeslorena88@yahoo.com.br ', 2, 0, 4676, 0, 0),
(80, 'CANIJA (HOTEL DAYRELL)', 'canijaatdayrell@hotmail.com ', 1, 1, 4949, 100, 5),
(81, 'CARRETAO PAMPULHA', 'renatinha.nutricampos@gmail.com carretaopampulha@hotmail.com elisangela.pampulhagrill@gmail.com ', 1, 1, 6822, 100, 5),
(82, 'BAR E BOI', 'bareboi@hotmail.com fredericodrumond@hotmail.com  MARCOSGDRUMOND@HOTMAIL.COM ', 1, 1, 21, 100, 5),
(83, 'JUVENINHAS BAR E RESTAURANTE - II (DADOS PROVISORIOS)', 'bardojuveninha@hotmail.com juveninhafinanceiro@gmail.com ', 1, 0, 2763, 0, 0),
(84, 'XICO DA CARNE - CIDADE NOVA', 'mary_annebf@yahoo.com.br contato@xicodacarne.com.br ', 2, 0, 1189, 0, 0),
(85, 'BRAVISSIMO FORNERIA', 'livia@bravissimoforneria.com.br tayllalouzada@gmail.com liviaremi@gmail.com ', 2, 0, 4444, 0, 0),
(86, 'ABRASEL - ZONA DA MATA (JUIZ DE FORA)', 'marcosmirandajf@gmail.com ', 1, 0, 7007, 0, 0),
(87, 'COMERCIAL ENCERASP', 'cibele@encerasp.com.br ', 2, 1, 8212, 0, 0),
(88, 'PIZZAIOLO TRADICAO (CENTRO CONTAGEM DADOS PROVISORIOS)', 'wagnerferreirac@gmail.com ', 2, 0, 11569, 0, 0),
(89, 'SAATORE RISTORANTE (LOURDES)', 'wanderson@saatore.com.br nelia@saatore.com.br contato@saatore.com.br ', 1, 0, 348, 0, 0),
(90, 'SPAZIO GOURMET', '68pampulha@gmail.com ', 1, 0, 11421, 0, 0),
(91, 'SINGULAR FORNERIA', 'sac@agruppa.com.br ', 1, 0, 8057, 0, 0),
(92, 'CHICO DO ESPETO - SAO GERALDO', 'cervejariacalifornia@gmail.com ', 1, 0, 4244, 0, 0),
(93, 'TREM MINEIRO (JUIZ DE FORA)', 'vanderson.snoronha@gmail.com claudia.resendem@gmail.com  ', 2, 0, 9483, 0, 0),
(94, 'MR. TUGAS PIZZARIA - FILIAL (JUIZ DE FORA)', 'mistertugas@yahoo.com.br  ', 2, 0, 8310, 0, 0),
(95, 'TIMBOO (JUIZ DE FORA)', 'marioangelos@yahoo.com.br cervejatimboo@gmail.com ', 1, 1, 7669, 100, 5),
(96, 'ZERO GRAU DISTRIBUIDORA DE BEBIDAS', 'gutozerograu@gmail.com ', 1, 1, 11449, 100, 5),
(97, 'EDDIE BURGERS - PATIO SAVASSI', 'joaopaulo@ahbon.com.br bruno@eddieburger.com.br financeirocinco@hotmail.com financeirocinco@hotmail.com ', 2, 0, 137, 0, 0),
(98, 'SUSHI RAO', 'rfontesviana@gmail.com ', 1, 0, 11532, 0, 0),
(99, 'RESTAURANTE GRUTA DO LAPINHA', 'claudiohsil@yahoo.com.br  ', 1, 0, 3070, 0, 0),
(100, 'JAH AÇAI (VIA BRASIL)', 'rodolfo.paiva@gmail.com rodolfo_paiva@hotmail.com ', 3, 1, 10679, 33, 5),
(101, 'REST. MARIA DAS TRANÇAS - SAVASSI', 'marcelo@mariadastrancas.com.br administrativo@mariadastrancas.com.br gerente1savassi@mariadastrancas.com.br ', 1, 0, 603, 0, 0),
(102, 'CERVEJARIA E ESCOLA MIRANTE (JUIZ DE FORA)', 'contato@cervejariaescolamirante.com.br  ', 1, 0, 11161, 0, 0),
(103, 'MAFRA INFORMATICA', 'mafra@mafrainformatica.com.br ', 1, 0, 574, 0, 0),
(104, 'CLUBE DO FILET JF (JUIZ DE FORA)', 'alexandre@pppjf.com.br kelmer@nectarbistro.com.br fredbsm@yahoo.com ', 2, 0, 11668, 0, 0),
(105, 'CARPE DIEM GRILL & BEER (CONS. LAFAIETE)', 'r.valdney@yahoo.com.br ', 1, 0, 11076, 0, 0),
(106, 'JAH AÇAI (PRADO)', 'prado.bh@jahdoacai.com.br vanessaaparecida@parcorretora.com.br ', 1, 0, 10335, 0, 0),
(107, 'ENGENHO DE MINAS', 'comercial@engenhodeminas.com.br joseantonio@engenhodeminas.com.br renata@engenhodeminas.com.br ', 1, 0, 61, 0, 0),
(108, 'BAR DO LU II PEIXES', 'luciano@bardolu.com.br tania@bardolu.com.br ', 4, 0, 2761, 0, 0),
(109, 'FRANGO! FRIED CHICKEN (HORTO)', 'administrativo@frangofc.com.br ', 2, 0, 6792, 0, 0),
(110, '68 LA PIZZERIA (PAMPULHA)', '68pampulha@gmail.com ', 1, 0, 10854, 0, 0),
(111, 'ZACA BURGUER', 'zacabar@yahoo.com.br ', 1, 0, 8747, 0, 0),
(112, 'CERVEJARIA BACKER (SHOPPING ITAU POWER)', 'ramosfaby@gmail.com ramosfaby@gmail.com  munir046@hotmail.com ', 2, 0, 2226, 0, 0),
(113, 'CLUB FACTORY', 'adm@clubfactory.com.br ', 1, 0, 11409, 0, 0),
(114, 'DOM BURGUERIA', 'brunaidrocha@gmail.com ', 1, 0, 11459, 0, 0),
(115, 'SIERRA POKER SPORTS', 'anderson@sierrapoker.com.br rh@sierrapoker.com.br financeiro@sierrapoker.com.br ', 1, 1, 4640, 100, 5),
(116, 'BAR DO ANTONIO PE DE CANA - LUXEMBURGO', 'isabel.t.adm@gmail.com bardoantoniopedecana@gmail.com ', 1, 0, 6639, 0, 0),
(117, 'PATUSCADA', 'patuscada@patuscada.com.br diegoviana@patuscada.com.br ', 1, 0, 437, 0, 0),
(118, 'CHEVALS', 'chevals@terra.com.br ', 1, 0, 6752, 0, 0),
(119, 'VITELO´S - A ARTE DA CARNE (BUFFET)', 'guilherme@vitelos.com.br escritorio@vitelos.com.br ', 1, 0, 2332, 0, 0),
(120, 'AMBROZINI MIX GOURMET (PRADO)', 'pedro@ambrozini.com.br financeiro@ambrozini.com.br ', 1, 0, 9884, 0, 0),
(121, 'DEPROL', 'vendas@deproldistribuidora.com.br financeiro@deproldistribuidora.com.br fabio@deproldistribuidora.com.br ', 1, 1, 9035, 100, 4),
(122, 'BOLÃO - PRACA', 'cristina@bolaosantatereza.com.br contato@bolaosantatereza.com.br karla@bolaosantatereza.com.br  ', 2, 0, 244, 0, 0),
(123, 'BAR DO MUSEU CLUBE DA ESQUINA', 'financeiro@bardomuseuclubedaesquina.com comercial@bardomuseuclubedaesquina.com adm@bardomuseuclubedaesquina.com ', 1, 0, 2709, 0, 0),
(124, 'ALOHA SUCOS - CENTRO (JUIZ DE FORA)', 'anabargiona@gmail.com fabricioaloha@yahoo.com.br alohasucoscentro@gmail.com ', 1, 0, 2778, 0, 0),
(125, 'CHXICO DO PEIXE - CAICARA', 'xicodochurrasco@uol.com.br xicochurrasco@gmail.com  ', 1, 0, 200, 0, 0),
(126, 'PROTOTIPO BAR BH', 'prototipobarbh@gmail.com ', 1, 0, 9987, 0, 0),
(127, 'AUGURI', 'auguripizzaria@hotmail.com endersonjuventino@hotmail.com ', 1, 0, 4672, 0, 0),
(128, 'ENTRE XICARAS & CAFE', 'linda.fragabh@hotmail.com ', 1, 3, 10225, 300, 5),
(129, 'ESPETO DO MANUEL I', 'espetodomanoel03@yahoo.com.br espeto.manoel03@gmail.com rodesteves@hotmail.com ', 1, 1, 506, 100, 5),
(130, 'K AUTO PARTS (KOREAUTO)', 'mauricio@koreauto.com.br financeiro@koreautobarao.com.br marcelo@koreauto.com.br ', 1, 0, 5635, 0, 0),
(131, 'TRADICAO DO CHURRASCO - PE. EUSTAQUIO', 'JUNIORJNSCHURRASCARIA@HOTMAIL.COM tradicaodochurrasco@gmail.com ', 0, 0, 455, 0, 0),
(132, 'BOI NA CHAPA', 'alexandreassis32@gmail.com josadv@hotmail.com ', 2, 0, 4231, 0, 0),
(133, 'PETISQUEIRA DO TETE', 'pedro@melocouto.com.br petisqueiratetebar@gmail.com ', 2, 0, 5077, 0, 0),
(134, 'VARANDA DO COREU', 'mateusnunca@gmail.com varandadobarropreto@gmail.com vanessapaula9@gmail.com ', 2, 0, 12092, 0, 0),
(135, 'CERVEJARIA BACKER (FABRICA)', 'financeiro@cervejariabacker.com.br compras@cervejariabacker.com.br eventos@cervejariabacker.com.br paula@cerjariabacker.com.br ', 1, 0, 8083, 0, 0),
(136, 'CHURRASCARIA DONA DELLY', 'adeliamari1963@gmail.com ebiosoares@hotmail.com restaurantedonnadelly@gmail.com restaurantedonnadelly@gmail.com ', 2, 3, 2893, 100, 5),
(137, 'CONFRARIA 340 (SHOP. CONTAGEM)', 'mariaaurelia1@hotmail.com financeiro@hortifrutiemporiominas.com.br paulohdsaraiva@gmail.com ', 1, 0, 10878, 0, 0),
(138, 'FANATICOS ESPORTE BAR', 'galo.rock9@gmail.com contato@rota85.com.br contato@fanaticosesportebar.com.br ellemluci50@gmail.com ', 1, 0, 6155, 0, 0),
(139, 'BISTRO VILA RICA (ESPACO VILA RICA)', 'erika@grupovilarica.com leonedjesus@yahoo.com ', 2, 0, 2435, 0, 0),
(140, 'TOPO DO MUNDO ( ALTAVILA)', 'rogerio@topodomundo.com ', 1, 0, 11969, 0, 0),
(141, 'CERVEJARIA JACINTA (SANTA EFIGENIA)', 'contato@queridajacinta.com.br vinicius@queridajacinta.com.br  keyla@queridajacinta.com.br ', 1, 0, 11259, 0, 5),
(142, 'XICO DA CARNE - STA INES', 'rodig_80@yahoo.com.br mary_annebf@yahoo.com.br jksreis@hotmail.com ', 1, 0, 84, 0, 0),
(143, 'SUPERMERCADO MG5', 'saviochaves@oi.com.br ', 1, 0, 2889, 0, 0),
(144, 'ERICK ACESSORIOS (SHOPPING XAVANTES)', 'erickacessoriosbox650@hotmail.com Wenderlemos95@gmail.com marianasantosp52@gmail.com ', 1, 0, 10484, 0, 0),
(145, 'BULLCANA´S GRILL BEER (JUIZ DE FORA) [DADOS PROVISORIOS]', 'juener@mafrainformatica.com.br laila@lxcontabilidade.com ', 1, 0, 1436, 0, 0),
(146, 'MERCADINHO MINEIRO  (SHOP ESTACAO)', 'mercadinhoshopping@gmail.com ', 2, 1, 6127, 0, 0),
(147, 'TRINDADE', 'fred@trindadebrasil.com.br adm.acasatrindade@gmail.com ', 1, 0, 5513, 0, 0),
(148, 'SAPORE - SAO MATEUS - MATRIZ (JUIZ DE FORA)', 'luizfmb@hotmail.com gilmaradelgado@gmail.com ', 1, 0, 3480, 0, 0),
(149, 'TOCA DO LOBO (JUIZ DE FORA)', 'pedrorumos@yahoo.com.br juener@mafrainformatica.com.br ', 1, 0, 11486, 0, 0),
(150, 'BRAUHAUS ZEPPELIN - SAO PEDRO (JUIZ DE FORA)', 'brauhausjf@gmail.com ', 1, 0, 12054, 0, 0),
(151, 'NA GRELHA', 'claudinhong@gmail.com ', 1, 0, 4581, 0, 0),
(152, 'TEMPLO DO CERVEJEIRO ( BACKER FABRICA)', 'financeiro@cervejariabacker.com.br templocervejeiro.backer@outlook.com munirlebbos@yahoo.com.br munirlebbos@yahoo.com.br, paula@cervejariabacker.com.br ', 3, 0, 3924, 0, 0),
(153, 'PORTO BELLO PIZZARIA (G VALADARES)', 'rogersdemarco@hotmail.com adrianolopes5@hotmail.com  ', 1, 2, 5772, 0, 0),
(154, 'CHALE DA MATA', 'cleissonaugusto@gmail.com rhchale@gmail.com CLAUDIOCHALE@YAHOO.COM.BR  adm01@chaledamata.com.br ', 1, 0, 2185, 0, 0),
(155, 'CAPIM DA SERRA', 'anacatarina@capimdaserra.com.br contato@capimsantodetox.com adm@capimdaserra.com.br capimsantodetox@capimsantodetox.com ', 1, 0, 9156, 0, 0),
(156, 'BOI PRUDENTE', 'boiprudente@hotmail.com  ', 1, 0, 1912, 0, 0),
(157, 'MOTEL FLY', 'contato@motelflymg.com.br dhcampelo@gmail.com marcampelo@gmail.com ', 1, 1, 9950, 0, 0),
(158, 'BARRIL CHOPERIA (SABARÁ)', 'barril178@gmail.com soucristian@gmail.com  ', 1, 0, 8889, 0, 0),
(159, 'DORIVAL BAR & PARRILLA  (DJALMA 6 PISTAS)', 'financeirogrupomar@gmail.com roberto@grupomarbh.com.br GHILADUTRA@GMAIL.COM ', 1, 0, 4737, 0, 0),
(160, 'MAYU (VILA DA SERRA)', 'lucaspparreiras1@gmail.com restaurantemayu@gmail.com ', 1, 0, 1223, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `employee`
--

CREATE TABLE `employee` (
  `idemployee` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `note_avarage` double NOT NULL,
  `issue_sol_avarage` double NOT NULL,
  `V11_code` int(11) NOT NULL,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `employee`
--

INSERT INTO `employee` (`idemployee`, `name`, `note_avarage`, `issue_sol_avarage`, `V11_code`, `visits`) VALUES
(3, 'THIAGO MACHADO PEIXOTO', 4.8, 0, 37, 7),
(4, 'RAPHAEL AUGUSTO DE ARAUJO SOUZA', 4.7, 0, 28, 14),
(5, 'CAMILA CHRISTINA CARVALHO DE PAULA', 5, 0, 59, 8),
(6, 'LUCAS GOMES DA SILVA MAGALHAES', 0, 0, 60, 0),
(7, 'PHELIPPE AUGUSTO DE SOUZA', 5, 0, 23, 10),
(8, 'ANDRE LUIZ RODRIGUES PINHEIRO', 5, 0, 3, 14),
(9, 'EBER LOPES BICALHO JUNIOR', 5, 0, 16, 20),
(10, 'PAULO JUNIO DA SILVA                              ', 4.8, 0, 13, 9),
(11, 'TIAGO MARCIO FARIA', 5, 0, 61, 2),
(12, 'MARCO TULIO PAIVA CAFE', 0, 0, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `form`
--

CREATE TABLE `form` (
  `idform` int(10) UNSIGNED NOT NULL,
  `commentary` varchar(200) DEFAULT NULL,
  `idcustomer` int(11) DEFAULT NULL,
  `idemployee` int(11) DEFAULT NULL,
  `evaluation_value` int(11) DEFAULT NULL,
  `issue_solve` varchar(10) DEFAULT NULL,
  `request_sent` date NOT NULL,
  `request_answered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `form`
--

INSERT INTO `form` (`idform`, `commentary`, `idcustomer`, `idemployee`, `evaluation_value`, `issue_solve`, `request_sent`, `request_answered`) VALUES
(7, '', 5130, 28, 5, 'yes', '2017-09-20', '2017-09-20'),
(8, '', 11132, 59, 5, 'yes', '2017-09-21', '2017-09-22'),
(9, '', 389, 16, 5, 'yes', '2017-09-22', '2017-09-22'),
(10, 'Ótimo', 6068, 16, 5, 'yes', '2017-09-25', '2017-09-25'),
(11, 'Ótimo ', 6068, 16, 5, 'yes', '2017-09-25', '2017-09-26'),
(17, 'Ótimo', 6068, 16, 5, 'yes', '2017-09-25', '2017-09-27'),
(18, '', 307, 3, 5, 'yes', '2017-09-25', '2017-09-29'),
(19, 'Atendimento excelente, técnico muito atencioso, experiente e total domínio do assunto, só temos que agradecer.', 11109, 16, 5, 'yes', '2017-10-06', '2017-10-06'),
(20, 'Todos de JF muito atenciosos e profissionais. Obrigado!', 11267, 13, 4, 'yes', '2017-10-06', '2017-10-06'),
(21, 'Excelente Profissional!!! Tem propriedade no que faz!', 621, 3, 5, 'yes', '2017-10-09', '2017-10-09'),
(22, 'Ótimo, muito paciente, pro ativo, tirou todas minhas duvidas e me explicou muito bem o sistema ', 11447, 37, 5, 'yes', '2017-10-06', '2017-10-09'),
(23, '', 11267, 13, 5, 'yes', '2017-10-09', '2017-10-09'),
(24, '', 8263, 3, 5, 'yes', '2017-10-10', '2017-10-10'),
(25, '', 11267, 13, 5, 'yes', '2017-10-17', '2017-10-18'),
(26, '', 4340, 16, 5, 'yes', '2017-10-20', '2017-10-20'),
(27, 'Computador deu defeito novamente 1 dia depois !', 8297, 28, 3, 'no', '2017-10-20', '2017-10-20'),
(28, 'Excelente atendimento e presteza do suporte tecnico', 11109, 16, 5, 'yes', '2017-10-20', '2017-10-24'),
(29, '', 283, 3, 5, 'yes', '2017-10-24', '2017-10-25'),
(30, '', 26, 37, 5, 'yes', '2017-10-24', '2017-10-26'),
(31, 'Obrigado pelo atendimento de todos, principalmente da Patricia e do Tulio. ', 445, 16, 5, 'yes', '2017-10-27', '2017-10-27'),
(32, '', 389, 16, 5, 'yes', '2017-10-27', '2017-10-27'),
(33, '', 28, 3, 5, 'yes', '2017-10-30', '2017-10-30'),
(34, '', 6095, 3, 5, 'yes', '2017-10-30', '2017-10-30'),
(35, '', 28, 3, 5, 'yes', '2017-10-30', '2017-10-30'),
(36, '', 11138, 37, 4, 'yes', '2017-11-01', '2017-11-01'),
(37, 'Gostei muito do atendimento do Felipe, bem profissional e prestativo.', 10225, 23, 5, 'yes', '2017-11-07', '2017-11-07'),
(38, 'O Rafael é uma excelente pessoa sempre muito educado e atencioso.Gosto muito quando solicito a visita de um tecnico que ele que atende a solicitação. Funcionário nota dez.', 1679, 28, 5, 'yes', '2017-11-01', '2017-11-07'),
(39, 'O Rafael é uma excelente pessoa sempre muito educado e atencioso.Gosto muito quando solicito a visita de um tecnico que ele que atende a solicitaÃ§Ã£o. FuncionÃ¡rio nota dez.', 1679, 28, 5, 'yes', '2017-11-01', '2017-11-07'),
(40, 'Estão de parabéns pela equipe. Todos educados, e sempre dispostos a ajudar. Coerentes, corretos e, uma coisa que achei super importante : Veem o lado da Empresa e a satisfação do Cliente. Parabéns', 11467, 13, 5, 'yes', '2017-11-09', '2017-11-10'),
(41, '', 4949, 28, 5, 'yes', '2017-11-13', '2017-11-13'),
(42, '', 6822, 28, 5, 'yes', '2017-11-13', '2017-11-13'),
(43, 'Técnico super prestativo e atencioso.', 11267, 13, 5, 'yes', '2017-11-20', '2017-11-20'),
(44, '', 28, 3, 5, 'yes', '2017-11-20', '2017-11-21'),
(45, '', 7669, 13, 5, 'yes', '2017-11-29', '2017-11-29'),
(46, '', 11449, 23, 5, 'yes', '2017-12-01', '2017-12-01'),
(47, '', 283, 3, 5, 'yes', '2017-12-01', '2017-12-01'),
(48, '', 10679, 37, 5, 'yes', '2017-12-06', '2017-12-06'),
(49, '', 3961, 37, 5, 'yes', '2017-12-13', '2017-12-13'),
(50, '', 389, 16, 5, 'yes', '2017-12-15', '2017-12-15'),
(51, '', 21, 28, 5, 'yes', '2017-11-13', '2017-12-18'),
(52, 'Técnico Phelippe muito competente e atencioso.', 4640, 61, 5, 'yes', '2017-12-19', '2017-12-19'),
(53, '', 9035, 59, 4, 'yes', '2017-12-27', '2017-12-27'),
(54, 'desconheÃ§o esse serviÃ§o', 10880, 28, 1, 'no', '2017-10-18', '2017-12-27'),
(55, '', 389, 16, 5, 'yes', '2017-12-29', '2017-12-29'),
(56, 'Equipe muito boa, sempre tenho retorno na mesma hora!ParabÃ©ns para a Patricia e companhia.', 506, 28, 5, 'yes', '2018-01-02', '2018-01-02'),
(58, '', 10225, 23, 5, 'yes', '2018-01-02', '2018-01-03'),
(59, '', 11786, 29, 5, 'yes', '2018-01-04', '2018-01-04'),
(60, 'excelente, domina o sistema, cordial, educado, paciente', 2928, 16, 5, 'yes', '2018-01-05', '2018-01-05'),
(61, '', 447, 28, 5, 'yes', '2018-01-08', '2018-01-08'),
(62, '', 1661, 23, 5, 'yes', '2018-01-08', '2018-01-09'),
(63, 'bastante atenciosos', 1337, 13, 5, 'yes', '2018-01-08', '2018-01-09'),
(64, 'O Felipe e excelente para ensinar paciente tranquilo por mais profisionais assim .nota 1000Obrigada ', 6095, 23, 5, 'yes', '2018-01-08', '2018-01-11'),
(65, 'ultimamente o serviÃƒÂ§o tem melhorado substancialmente. Espero que continuem priorizando o cliente.AndrÃƒÂ© Teixeira ', 5681, 59, 4, 'yes', '2018-01-11', '2018-01-12'),
(66, '', 389, 16, 5, 'yes', '2018-01-19', '2018-01-19'),
(67, 'O tÃƒÂ©cnico Eber ÃƒÂ© rÃƒÂ¡pido e prÃƒÂ¡tico.', 8665, 16, 5, 'yes', '2018-01-19', '2018-01-19'),
(68, '', 389, 16, 5, 'yes', '2018-01-19', '2018-01-19'),
(69, 'O Felipe e sensacional obrigada ', 6095, 23, 5, 'yes', '2018-01-19', '2018-01-20'),
(70, '', 4984, 23, 4, 'yes', '2018-01-19', '2018-01-22'),
(71, 'Gosto muito do atendimento do Phelippe, sempre disponÃƒÂ­vel, gentil e apto ao que se propÃƒÂµe fazer.', 10225, 23, 5, 'yes', '2018-01-19', '2018-01-22'),
(72, '', 11798, 16, 3, 'yes', '2018-01-24', '2018-01-24'),
(73, '', 10612, 16, 5, 'yes', '2018-01-26', '2018-01-26'),
(74, '', 10203, 13, 5, 'yes', '2018-01-25', '2018-01-27'),
(75, '', 1908, 16, 3, 'yes', '2018-01-26', '2018-01-30'),
(76, 'estamos aguardando o sistema emc fazer algumas alteraÃƒÂ§oes para emissao das notas fiscais .....', 2764, 59, 5, 'no', '2018-01-31', '2018-01-31'),
(77, '', 7252, 28, 5, 'yes', '2018-02-05', '2018-02-05'),
(78, '', 7097, 13, 5, 'yes', '2018-02-05', '2018-02-06'),
(79, '', 283, 3, 5, 'yes', '2018-02-06', '2018-02-06'),
(80, '', 28, 3, 5, 'yes', '2018-02-06', '2018-02-07'),
(81, '', 3219, 28, 3, 'yes', '2018-02-15', '2018-02-17'),
(82, 'Gosto muito do atendimento do Phellipe, sempre cordial e capaz.', 10225, 23, 5, 'yes', '2018-02-19', '2018-02-19'),
(83, 'Somos atendidos sempre prontamente e com eficiÃƒÂªncia.Ponto melhoria: impaciÃƒÂªncia caracterÃƒÂ­stica da ÃƒÂ¡rea de TI com quem estÃƒÂ¡ do lado de cÃƒÂ¡ e nÃƒÂ£o entende nada ou bem pouco de informÃ', 51, 23, 4, 'yes', '2018-02-19', '2018-02-20'),
(84, 'otimo', 1491, 28, 5, 'yes', '2018-02-15', '2018-02-20'),
(85, '', 389, 16, 5, 'yes', '2018-02-23', '2018-02-23'),
(86, '', 389, 16, 5, 'yes', '2018-02-23', '2018-02-23'),
(87, 'Muito bom', 10582, 59, 4, 'yes', '2018-02-26', '2018-02-27'),
(88, 'muito bom', 11259, 37, 5, 'yes', '2018-02-23', '2018-02-27'),
(89, '', 28, 3, 5, 'yes', '2018-02-28', '2018-02-28'),
(90, '', 5513, 28, 5, 'yes', '2018-02-28', '2018-02-28'),
(91, '', 10582, 59, 5, 'yes', '2018-03-02', '2018-03-02'),
(92, 'Toda equipe de parabÃƒÂ©ns. ', 2893, 16, 5, 'yes', '2018-03-14', '2018-03-14'),
(93, 'Todos os funcionÃƒÂ¡rios da mafra sÃƒÂ£o muito educados e resolvi os problemas. A ÃƒÂºnica coisa que nÃƒÂ£o concordo ÃƒÂ© com o preÃƒÂ§o da mensalidade. Inclusive, estou olhando com duas empresas pra ', 2893, 16, 5, 'yes', '2018-03-14', '2018-03-20'),
(94, 'Gostei da pontualidade e rapidez no atendimento', 4937, 3, 5, 'yes', '2018-03-20', '2018-03-20'),
(95, '', 6127, 37, 5, 'yes', '2018-03-22', '2018-03-22'),
(96, 'Foi uma decepÃƒÂ§ÃƒÂ£o imensa na instalaÃƒÂ§ÃƒÂ£o do tablet e nÃƒÂ£o ter a opÃƒÂ§ÃƒÂ£o de pizza meio a meio.Com isso se torna inviÃƒÂ¡vel.', 5772, 28, 4, 'no', '2018-03-23', '2018-03-23'),
(97, '', 9950, 59, 5, 'yes', '2018-03-26', '2018-03-26'),
(98, 'O tÃƒÂ©cnico sempre muito educado e prestativo .VocÃƒÂªs estÃƒÂ£o de parabÃƒÂ©ns !!!', 8212, 3, 5, 'yes', '2018-03-27', '2018-03-27'),
(99, 'houve retrocesso, nao consigo no touch transferir mesa de cliente! ex: cliente esta na 10 e que mudar para a mesa 20, so faÃƒÂ§o isso no caixa e no tablet nao consigo comandar uma pizza meio a meio', 5772, 28, 5, 'no', '2018-03-23', '2018-03-27'),
(100, '', 12086, 59, 5, 'yes', '2018-03-28', '2018-03-28'),
(101, '', 6987, 29, 5, 'yes', '2018-03-29', '2018-03-29'),
(102, 'Adoro o HÃƒÂ©ber, muito educado e atencioso, e a paciÃƒÂªncia que tem conosco. Feliz PÃƒÂ¡scoa a todos vocÃƒÂªs. ', 2893, 16, 5, 'yes', '2018-03-29', '2018-03-29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `idusers` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`idusers`, `name`, `password`) VALUES
(1, 'lucas', '123'),
(2, 'marcelo', '12345'),
(3, 'tulio', 'tulioadmin123@');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Índices de tabela `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`idemployee`);

--
-- Índices de tabela `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`idform`),
  ADD KEY `idemployee` (`idemployee`),
  ADD KEY `idcustomer` (`idcustomer`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT de tabela `employee`
--
ALTER TABLE `employee`
  MODIFY `idemployee` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `form`
--
ALTER TABLE `form`
  MODIFY `idform` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
