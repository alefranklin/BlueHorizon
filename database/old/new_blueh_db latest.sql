-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 17, 2019 alle 11:11
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_blueh_db`
--

DELIMITER $$
--
-- Funzioni
--
CREATE DEFINER=`root`@`localhost` FUNCTION `priceCalc` (`passengers` INT, `cabin` INT, `duration` INT) RETURNS INT(11) BEGIN
DECLARE day_price INT;
DECLARE total INT;
SELECT price INTO day_price FROM cabins WHERE id = cabin;
SET total = passengers*day_price*duration;
RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `cabins`
--

CREATE TABLE `cabins` (
  `id` int(11) NOT NULL,
  `class` set('standard','deluxe','space_club','') NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cabins`
--

INSERT INTO `cabins` (`id`, `class`, `price`) VALUES
(1, 'standard', 50),
(2, 'deluxe', 70),
(3, 'space_club', 100);

-- --------------------------------------------------------

--
-- Struttura della tabella `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `guest_order`
--

CREATE TABLE `guest_order` (
  `id_guest` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_travel` int(11) NOT NULL,
  `id_cabin` int(11) NOT NULL,
  `passengers_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_travel`, `id_cabin`, `passengers_number`) VALUES
(130, 3, 10, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `planets`
--

CREATE TABLE `planets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `info` text NOT NULL,
  `mass` double NOT NULL,
  `temperature` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `planets`
--

INSERT INTO `planets` (`id`, `name`, `info`, `mass`, `temperature`) VALUES
(1, 'Mercurio', 'Mercurio &egrave; il pianeta pi&ugrave; interno del sistema solare e il pi&ugrave; vicino al Sole. &Egrave; il pi&ugrave; piccolo e la sua orbita &egrave; anche la pi&ugrave; eccentrica, ovvero la meno circolare, degli otto pianeti. Mercurio orbita in senso diretto (in senso antiorario, come tutti gli altri pianeti del Sistema Solare) a una distanza media di 0,3871 UA dal Sole con un periodo siderale di 87,969 giorni terrestri. Mercurio &egrave; anche in risonanza orbitale-rotazionale: completa tre rotazioni intorno al proprio asse ogni due orbite attorno al Sole.\r\n\r\nL\'eccentricit&agrave; orbitale &egrave; abbastanza elevata e vale 0,205, ben 15 volte quella della Terra. Dalla superficie il Sole ha un diametro apparente medio di 1,4&deg;, circa 2,8 volte quello visibile dalla Terra, e arriva a 1,8&deg; durante il passaggio al perielio. Il rapporto fra la radiazione solare al perielio e quella all\'afelio &egrave; 2,3. Per la Terra questo rapporto vale 1,07. La superficie di Mercurio sperimenta la maggiore escursione termica tra tutti i pianeti, con temperature che nelle regioni equatoriali vanno da 100 K (-173 &deg;C) della notte a 700 K (427 &deg;C) del d&igrave;; le regioni polari invece sono costantemente inferiori a 180 K (-93 &deg;C). Ci&ograve; &egrave; dovuto all\'assenza dell\'atmosfera che se presente svolgerebbe un ruolo nella ridistribuzione del calore. La superficie fortemente craterizzata indica che Mercurio &egrave; geologicamente inattivo da miliardi di anni.\r\n\r\nConosciuto sin dal tempo dei Sumeri, il suo nome &egrave; tratto dalla mitologia romana. Il pianeta &egrave; stato associato a Mercurio, messaggero degli dei, probabilmente a causa della sua rapidit&agrave; di movimento nel cielo. Il suo simbolo astronomico &egrave; una versione stilizzata del caduceo del dio.', 3, 440),
(2, 'Venere', 'Venere &egrave; il secondo pianeta del Sistema solare in ordine di distanza dal Sole con un\'orbita quasi circolare che lo porta a compiere una rivoluzione in 224,7 giorni terrestri. Prende il nome dalla dea romana dell\'amore e della bellezza e il suo simbolo astronomico &egrave; la rappresentazione stilizzata della mano di Venere che sorregge uno specchio.\r\n\r\nCon una magnitudine massima di ?4,6, &egrave; l\'oggetto naturale pi&ugrave; luminoso nel cielo notturno dopo la Luna e per questo motivo &egrave; conosciuto fin dall\'antichit&agrave;. Venere &egrave; visibile soltanto poco prima dell\'alba o poco dopo il tramonto e per questa ragione &egrave; spesso stato chiamato da popoli antichi la \"Stella del Mattino\" o la \"Stella della Sera\", fino a quando Pitagora comprese che si trattava dello stesso oggetto[8].\r\n\r\nClassificato come un pianeta terrestre, a volte &egrave; definito il \"pianeta gemello\" della Terra, cui &egrave; molto simile per dimensioni e massa. Tuttavia per altri aspetti &egrave; piuttosto differente dal nostro pianeta. Infatti Venere possiede un\'atmosfera costituita principalmente da anidride carbonica, molto pi&ugrave; densa di quella terrestre, con una pressione al livello del suolo pari a 92 atm. La densit&agrave; e la composizione dell\'atmosfera creano un impressionante effetto serra che rende Venere il pianeta pi&ugrave; caldo del sistema solare.\r\n\r\nVenere &egrave; avvolto da uno spesso strato di nubi altamente riflettenti, composte principalmente di acido solforico, che impediscono la visione nello spettro visibile della superficie dallo spazio. Il pianeta non &egrave; dotato di satelliti o anelli e ha un campo magnetico pi&ugrave; debole di quello terrestre.', 4, 737),
(3, 'Marte', 'Marte &egrave; il quarto pianeta del sistema solare in ordine di distanza dal Sole; &egrave; visibile ad occhio nudo ed &egrave; l\'ultimo dei pianeti di tipo terrestre dopo Mercurio, Venere e la Terra. Chiamato il Pianeta rosso a causa del suo colore caratteristico dovuto alle grandi quantit&agrave; di ossido di ferro che lo ricoprono. Marte prende il nome dall\'omonima divinit&agrave; della mitologia romana e il suo simbolo astronomico &egrave; la rappresentazione stilizzata dello scudo e della lancia del dio.\r\n\r\nPur presentando temperature medie superficiali piuttosto basse (tra ?120 &deg;C e ?14 &deg;C) e un\'atmosfera molto rarefatta, &egrave; il pianeta pi&ugrave; simile alla Terra tra quelli del sistema solare. Le sue dimensioni sono intermedie fra quelle del nostro pianeta e della Luna, e presenta un\'inclinazione dell\'asse di rotazione e durata del giorno simili a quelle terrestri. La sua superficie presenta formazioni vulcaniche, valli, calotte polari e deserti sabbiosi, e formazioni geologiche che vi suggeriscono la presenza di un\'idrosfera in un lontano passato. La superficie del pianeta appare fortemente craterizzata, a causa della quasi totale assenza di agenti erosivi (attivit&agrave; geologica, atmosferica e idrosferica, i principali) e dalla totale assenza di attivit&agrave; tettonica delle placche capace di formare e poi modellare le strutture tettoniche. La bassissima densit&agrave; dell\'atmosfera non &egrave; poi in grado di consumare buona parte dei meteoriti, che pertanto raggiungono il suolo con maggior frequenza che non sulla Terra. Fra le formazioni geologiche pi&ugrave; notevoli di Marte si segnalano l\'Olympus Mons o monte Olimpo, il vulcano pi&ugrave; grande del sistema solare (alto 27 ); le Valles Marineris, un lungo canyon notevolmente pi&ugrave; esteso di quelli terrestri e un enorme cratere sull\'emisfero boreale ampio circa 40% dell\'intera superficie marziana.\r\n\r\nAll\'osservazione diretta Marte presenta variazioni di colore, imputate storicamente alla presenza di vegetazione stagionale, che si modificano al variare dei periodi dell\'anno. Successive osservazioni spettroscopiche dell\'atmosfera hanno da tempo fatto abbandonare l\'ipotesi che vi potessero essere mari, canali e fiumi oppure un\'atmosfera sufficientemente densa. La smentita finale arriv&ograve; dalla missione Mariner 4, che nel 1965 mostr&ograve; un pianeta desertico e arido, caratterizzato da tempeste di sabbia periodiche e particolarmente violente. Missioni pi&ugrave; recenti hanno evidenziato presenza di acqua sotto forma di ghiaccio. Attorno al pianeta orbitano due satelliti naturali, Fobos e Deimos, di piccole dimensioni e dalla forma irregolare.', 6, 210),
(4, 'Giove', 'Giove (dal latino Iovem, accusativo di Iuppiter) &egrave; il quinto pianeta del sistema solare in ordine di distanza dal Sole e il pi&ugrave; grande di tutto il sistema planetario: la sua massa corrisponde a 2 volte e mezzo la somma di quelle di tutti gli altri pianeti messi insieme. &Egrave; classificato, al pari di Saturno, Urano e Nettuno, come gigante gassoso.\r\n\r\nGiove ha una composizione simile a quella del Sole: infatti &egrave; costituito principalmente da idrogeno ed elio con piccole quantit&agrave; di altri composti, quali ammoniaca, metano ed acqua. Si ritiene che il pianeta possegga una struttura pluristratificata, con un nucleo solido, presumibilmente di natura rocciosa e costituito da carbonio e silicati di ferro, sopra il quale gravano un mantello di idrogeno metallico ed una vasta copertura atmosferica che esercitano su di esso altissime pressioni.\r\n\r\nL\'atmosfera esterna &egrave; caratterizzata da numerose bande e zone di tonalit&agrave; variabili dal color crema al marrone, costellate da formazioni cicloniche ed anticicloniche, tra le quali spicca la Grande Macchia Rossa. La rapida rotazione del pianeta gli conferisce l\'aspetto di uno sferoide schiacciato ai poli e genera un intenso campo magnetico che d&agrave; origine ad un\'estesa magnetosfera; inoltre, a causa del meccanismo di Kelvin-Helmholtz, Giove (come tutti gli altri giganti gassosi) emette una quantit&agrave; di energia superiore a quella che riceve dal Sole.\r\n\r\nA causa delle sue dimensioni e della composizione simile a quella solare, Giove &egrave; stato considerato per lungo tempo una \"stella fallita\": in realt&agrave; solamente se avesse avuto l\'opportunit&agrave; di accrescere la propria massa sino a 75-80 volte quella attuale il suo nucleo avrebbe ospitato le condizioni di temperatura e pressione favorevoli all\'innesco delle reazioni di fusione dell\'idrogeno in elio, il che avrebbe reso il sistema solare un sistema stellare binario.\r\n\r\nL\'intenso campo gravitazionale di Giove influenza il sistema solare nella sua struttura perturbando le orbite degli altri pianeti e lo \"ripulisce\" da detriti che altrimenti rischierebbero di colpire i pianeti pi&ugrave; interni. Intorno a Giove orbitano numerosi satelliti e un sistema di anelli scarsamente visibili; l\'azione combinata dei campi gravitazionali di Giove e del Sole, inoltre, stabilizza le orbite di due gruppi di asteroidi troiani.\r\n\r\nIl pianeta, conosciuto sin dall\'antichit&agrave;, ha rivestito un ruolo preponderante nel credo religioso di numerose culture, tra cui i Babilonesi, i Greci e i Romani, che lo hanno identificato con il sovrano degli dei. Il simbolo astronomico del pianeta &egrave; una rappresentazione stilizzata del fulmine, principale attributo di quella divinit&agrave;.', 1, 152),
(5, 'Urano', 'Urano &egrave; il settimo pianeta del sistema solare in ordine di distanza dal Sole, il terzo per diametro e il quarto per massa. Il suo simbolo astronomico Unicode &egrave;, stilizzazione della lettera H iniziale di William Herschel). Porta il nome del dio greco del cielo Urano (??????? in greco antico), padre di Crono (Saturno), a sua volta padre di Zeus (Giove). Sebbene sia visibile anche ad occhio nudo, come gli altri cinque pianeti noti fin dall\'antichit&agrave;, non fu mai riconosciuto come tale a causa della sua bassa luminosit&agrave; e della sua orbita particolarmente lenta e venne identificato come qualcosa di diverso da una stella soltanto il 13 marzo 1781 da William Herschel. Una curiosit&agrave; riguardo alla sua scoperta &egrave; che essa giunse del tutto inaspettata: i pianeti visibili ad occhio nudo (fino a Saturno) erano conosciuti da millenni e nessuno sospettava l\'esistenza di altri pianeti, fino alla scoperta di Herschel che not&ograve; come una particolare stellina sembrava spostarsi. Da quel momento in poi nessuno fu pi&ugrave; sicuro del reale numero di pianeti del nostro sistema solare. La composizione chimica di Urano &egrave; simile a quella di Nettuno ed entrambi hanno una composizione differente rispetto a quella dei giganti gassosi pi&ugrave; grandi (Giove e Saturno). Per questa ragione gli astronomi talvolta preferiscono riferirsi a questi due pianeti trattandoli come una classe separata, i \"giganti ghiacciati\". L\'atmosfera del pianeta, sebbene sia simile a quella di Giove e Saturno per la presenza abbondante di idrogeno ed elio, contiene una proporzione elevata di \"ghiacci\", come l\'acqua, l\'ammoniaca e il metano, assieme a tracce di idrocarburi. Quella di Urano &egrave; anche l\'atmosfera pi&ugrave; fredda del sistema solare, con una temperatura minima che pu&ograve; scendere fino a 49 (?224 &deg;C). Possiede una complessa struttura di nubi ben stratificata, in cui si pensa che l\'acqua si trovi negli strati inferiori e il metano in quelli pi&ugrave; in quota. L\'interno del pianeta al contrario sarebbe composto principalmente di ghiacci e rocce. Una delle caratteristiche pi&ugrave; insolite del pianeta &egrave; l\'orientamento del suo asse di rotazione. Tutti gli altri pianeti hanno il proprio asse quasi perpendicolare al piano dell\'orbita, mentre quello di Urano &egrave; quasi parallelo. Ruota quindi esponendo al Sole uno dei suoi poli per met&agrave; del periodo di rivoluzione con conseguente estremizzazione delle fasi stagionali. Inoltre, poich&eacute; l\'asse &egrave; inclinato di poco pi&ugrave; di 90&deg;, la rotazione &egrave; tecnicamente retrograda: Urano ruota nel verso opposto rispetto a quello di tutti gli altri pianeti del sistema solare (eccetto Venere) anche se, vista l\'eccezionalit&agrave; dell\'inclinazione la rotazione retrograda, &egrave; solo una nota minore. Il periodo della sua rivoluzione attorno al Sole &egrave; di circa 84 anni terrestri. L\'orbita di Urano si discosta molto poco dell\'eclittica (inclinazione di 0,7&deg;). Come gli altri pianeti giganti, Urano possiede un sistema di anelli planetari, una magnetosfera e numerosi satelliti; visti dalla Terra, a causa dell\'inclinazione del pianeta, i suoi anelli possono talvolta apparire come un sistema concentrico che circonda il pianeta, oppure come nel 2007 e 2008 apparire di taglio. Nel 1986 la sonda Voyager 2 mostr&ograve; Urano come un pianeta senza alcun segno distintivo sulla sua superficie, senza le bande e tempeste tipiche degli altri giganti gassosi. Tuttavia, osservazioni successive condotte dalla Terra, hanno mostrato delle evidenze di cambiamenti legati alle stagioni e un aumento dell\'attivit&agrave; climatica, quando il pianeta si &egrave; avvicinato all\'equinozio.', 8, 68),
(6, 'Nettuno', 'Nettuno &egrave; l\'ottavo e pi&ugrave; lontano pianeta del Sistema solare partendo dal Sole. Si tratta del quarto pianeta pi&ugrave; grande, considerando il suo diametro, e il terzo se si considera la sua massa. Nettuno ha 17 volte la massa della Terra ed &egrave; leggermente pi&ugrave; massiccio del suo quasi-gemello Urano, la cui massa &egrave; uguale a 15 masse terrestri, ma &egrave; meno denso rispetto a Nettuno. Il nome del pianeta &egrave; dedicato al dio romano del mare; Scoperto la sera del 23 settembre 1846 da Johann Gottfried Galle con il telescopio dell\'Osservatorio astronomico di Berlino, e Heinrich Louis d\'Arrest, uno studente di astronomia che lo assisteva, Nettuno fu il primo pianeta ad essere stato trovato tramite calcoli matematici pi&ugrave; che attraverso regolari osservazioni: cambiamenti insoliti nell\'orbita di Urano indussero gli astronomi a credere che vi fosse, all\'esterno, un pianeta sconosciuto che ne perturbava l\'orbita. Il pianeta fu scoperto entro appena un grado dal punto previsto. La luna Tritone fu individuata poco dopo, ma nessuno degli altri tredici satelliti naturali di Nettuno fu scoperto prima del XX secolo. Il pianeta &egrave; stato visitato da una sola sonda spaziale, la Voyager 2 che transit&ograve; vicino ad esso il 25 agosto 1989. Nettuno ha una composizione simile a quella di Urano ed entrambi hanno composizioni differenti da quelle dei pi&ugrave; grandi pianeti gassosi Giove e Saturno. Per questo sono talvolta classificati in una categoria separata, i cosiddetti \"giganti ghiacciati\". L\'atmosfera di Nettuno, sebbene simile a quelle sia di Giove che di Saturno essendo composta principalmente da idrogeno ed elio, possiede anche maggiori proporzioni di \"ghiacci\", come acqua, ammoniaca e metano, assieme a tracce di idrocarburi e forse azoto. In contrasto, l\'interno del pianeta &egrave; composto essenzialmente da ghiacci e rocce come il suo simile Urano. Le tracce di metano presenti negli strati pi&ugrave; esterni dell\'atmosfera contribuiscono a conferire al pianeta Nettuno il suo caratteristico colore azzurro intenso. Nettuno possiede i venti pi&ugrave; forti di ogni altro pianeta nel Sistema Solare. Sono state misurate raffiche a velocit&agrave; superiori ai 2 100 km/h. All\'epoca del sorvolo da parte della Voyager 2, nel 1989, l\'emisfero sud del pianeta possedeva una Grande Macchia Scura comparabile con la Grande Macchia Rossa di Giove; la temperatura delle nubi pi&ugrave; alte di Nettuno era di circa ?218 &deg;C, una delle pi&ugrave; fredde del Sistema solare, a causa della grande distanza dal Sole. La temperatura al centro del pianeta &egrave; di circa 7000 &deg;C, comparabile con la temperatura superficiale del Sole e simile a quella del nucleo di molti altri pianeti conosciuti. Il pianeta possiede inoltre un debole sistema di anelli, scoperto negli anni sessanta ma confermato solo dalla Voyager 2.', 1, 53),
(7, 'Saturno', 'Saturno &egrave; il sesto pianeta del sistema solare in ordine di distanza dal Sole e il secondo pianeta pi&ugrave; massiccio dopo Giove. Con un raggio medio 9,5 volte quello della Terra e una massa 95 volte superiore a quella terrestre Saturno, con Giove, Urano e Nettuno, &egrave; classificato come gigante gassoso. Il nome deriva dall\'omonimo dio della mitologia romana, omologo del titano greco Crono. Il suo simbolo astronomico &egrave; una rappresentazione stilizzata della falce del dio dell\'agricoltura e dello scorrere del tempo. Saturno &egrave; composto per il 95% da idrogeno e per il 3% da elio a cui seguono gli altri elementi. Il nucleo, consistente in silicati e ghiacci, &egrave; circondato da uno spesso strato di idrogeno metallico e quindi di uno strato esterno gassoso. I venti nell\'atmosfera di Saturno possono raggiungere i 1 800 km/h, risultando significativamente pi&ugrave; veloci di quelli su Giove e leggermente meno veloci di quelli che spirano nell\'atmosfera di Nettuno. Saturno ha un esteso e vistoso sistema di anelli che consiste principalmente in particelle di ghiaccio e polveri di silicati. Della sessantina di lune conosciute che orbitano intorno al pianeta, Titano &egrave; la maggiore ed anche l\'unica luna del sistema solare ad avere un\'atmosfera significativa.', 5, 143),
(8, 'Plutone', 'Plutone &egrave; un pianeta nano orbitante nelle regioni periferiche del sistema solare, con un\'orbita eccentrica a cavallo dell\'orbita di Nettuno; fu scoperto nel 1930 da Clyde Tombaugh e inizialmente classificato come il nono pianeta. Tuttavia venne riclassificato come pianeta nano il 24 agosto 2006 e battezzato formalmente 134340 Pluto dalla UAI. Plutone &egrave; il pi&ugrave; grande tra i pianeti nani del sistema solare e il secondo pi&ugrave; massiccio, superato in questo caso solo da Eris. Dopo la scoperta, il nuovo corpo celeste venne rinominato Plutone, divinit&agrave; romana dell\'oltretomba. Il nome venne suggerito da una bambina di 11 anni, Venetia Burney, figlia di un professore di Oxford. Le prime lettere del nome, PL, anche iniziali dell\'astronomo Percival Lowell che per primo ne ipotizz&ograve; l\'esistenza. Dal 7 al 13 settembre 2006, quando 136199 Eris ricevette la denominazione ufficiale, &egrave; stato l\'asteroide denominato con il pi&ugrave; alto numero ordinale. Prima della sua numerazione, il primato era di 129342 Ependes. In virt&ugrave; dei suoi parametri orbitali, Plutone &egrave; anche considerato un classico esempio di oggetto transnettuniano. Pur avendo la sua orbita il semiasse maggiore pi&ugrave; lungo di quello dell\'orbita di Nettuno, esso si avvicina al Sole pi&ugrave; dello stesso Nettuno. Plutone &egrave; stato assunto quale elemento di riferimento della classe dei pianeti nani transnettuniani, denominati ufficialmente plutoidi dall\'Unione Astronomica Internazionale. Plutone ha cinque satelliti conosciuti, il pi&ugrave; massiccio e importante dei quali &egrave; certamente Caronte, scoperto nel 1978 e avente un raggio poco pi&ugrave; della met&agrave; di quello di Plutone. Lanciata dalla NASA nel 2006, dopo oltre nove anni di viaggio la New Horizons &egrave; divenuta la prima sonda spaziale ad effettuare un sorvolo ravvicinato di Plutone, avvenuto il 14 luglio 2015 ad una distanza minima di 12.472 km dalla superficie del pianeta nano. ', 1, 45),
(9, 'Luna', 'La Luna &egrave; un satellite naturale, l\'unico della Terra. Il suo nome proprio viene talvolta utilizzato, per antonomasia e con l\'iniziale minuscola (&laquo;una luna&raquo;), come sinonimo di satellite anche per i corpi celesti che orbitano attorno ad altri pianeti. Orbita a una distanza media di circa 384 400 km dalla Terra, sufficientemente vicina da essere osservabile a occhio nudo, il che rende possibile distinguerne alcuni rilievi sulla superficie. Essendo in rotazione sincrona rivolge sempre la stessa faccia verso la Terra e il suo lato nascosto &egrave; rimasto sconosciuto fino al periodo delle esplorazioni spaziali. Durante il suo moto orbitale, il diverso aspetto causato dall\'orientazione rispetto al Sole genera delle fasi chiaramente visibili e che hanno influenzato il comportamento dell\'uomo fin dall\'antichit&agrave;. Impersonata dai greci nella dea Selene, fu da tempo remoto considerata influente sui raccolti, le carestie e la fertilit&agrave;. Condiziona la vita sulla Terra di molte specie viventi, regolandone il ciclo riproduttivo e i periodi di caccia; agisce sulle maree e la stabilit&agrave; dell\'asse di rotazione terrestre. Si pensa che la Luna si sia formata 4,5 miliardi di anni fa, non molto tempo dopo la nascita della Terra. Esistono diverse teorie riguardo alla sua formazione; la pi&ugrave; accreditata &egrave; che si sia formata dall\'aggregazione dei detriti rimasti in orbita dopo la collisione tra la Terra e un oggetto delle dimensioni di Marte chiamato Theia. La faccia visibile della Luna &egrave; caratterizzata dalla presenza di circa 300 000 crateri da impatto (contando quelli con un diametro di almeno 1 km). Il cratere lunare pi&ugrave; grande &egrave; il bacino Polo Sud-Aitken, che ha un diametro di circa 2 500 km, &egrave; profondo 13 km e occupa la parte meridionale della faccia nascosta.', 7, 250),
(10, 'Io', 'Io &egrave; un satellite naturale di Giove, il pi&ugrave; interno dei quattro satelliti medicei, il quarto satellite del sistema solare per dimensione e quello pi&ugrave; denso di tutti. Il suo nome deriva da quello di Io, una delle molte amanti di Zeus secondo la mitologia greca. Con oltre 300 vulcani attivi, Io &egrave; l\'oggetto geologicamente pi&ugrave; attivo del sistema solare. L\'estrema attivit&agrave; geologica &egrave; il risultato del riscaldamento mareale dovuto all\'attrito causato al suo interno da Giove e dagli altri satelliti galileani. Molti vulcani producono pennacchi di zolfo e biossido di zolfo che si elevano fino a 500 km sulla sua superficie. Questa &egrave; costellata di oltre 100 montagne che sono state sollevate dalla compressione della crosta di silicati, con alcuni di questi picchi che arrivano ad essere pi&ugrave; alti dell\'Everest. A differenza di molti satelliti del sistema solare esterno, che sono per lo pi&ugrave; composti di ghiaccio d\'acqua, Io &egrave; composto principalmente da rocce di silicati che circondano un nucleo di ferro o di solfuro di ferro fusi. La maggior parte della superficie di Io &egrave; composta da ampie piane ricoperte di zolfo e anidride solforosa congelata. Il vulcanismo su Io &egrave; responsabile di molte delle sue caratteristiche. Le colate laviche hanno prodotto grandi cambiamenti superficiali e dipinto la superficie in varie tonalit&agrave; di colore giallo, rosso, bianco, nero, verde, in gran parte dovuti ai diversi allotropi e composti di zolfo. Numerose colate laviche di oltre 500 km di lunghezza, segnano la superficie di Io, e i materiali prodotti dal vulcanismo hanno costituito una sottile atmosfera a chiazze, ed hanno anche creato un toro di plasma attorno a Giove. Io ha svolto un ruolo significativo nello sviluppo dell\'astronomia nel XVII e XVIII secolo: scoperto nel 1610 da Galileo Galilei, assieme agli altri satelliti galileiani, il suo studio favor&igrave; l\'adozione del modello copernicano del sistema solare, allo sviluppo delle leggi di Keplero sul moto dei pianeti, e serv&igrave; per una prima stima della velocit&agrave; della luce. Dalla Terra, Io &egrave; rimasto solo un punto di luce fino alla fine del XIX secolo, quando divenne possibile risolvere le sue caratteristiche superficiali di dimensioni maggiori, come ad esempio le regioni polari rosso scure e le brillanti zone equatoriali. Nel 1979, le due sonde Voyager rivelarono l\'attivit&agrave; geologica di Io, dotato di numerose formazioni vulcaniche, grandi montagne, e una superficie giovane priva di crateri da impatto. La sonda Galileo effettu&ograve; diversi passaggi ravvicinati tra gli anni novanta e l\'inizio del XXI secolo, ottenendo dati sulla struttura interna e sulla composizione di Io, rivelando il rapporto tra Io e la magnetosfera di Giove e l\'esistenza di una cintura di radiazioni centrata sull\'orbita della luna. Io riceve circa 3600 rem (36 Sv) di radiazione al giorno. Ulteriori osservazioni furono eseguite dalla sonda Cassini-Huygens nel 2000 e dalla New Horizons nel 2007, e man mano che la tecnologia per l\'osservazione progrediva, da telescopi terrestri e dal telescopio spaziale Hubble.', 8, 130),
(11, 'Europa', 'Europa &egrave; il quarto satellite naturale del pianeta Giove per dimensioni e il sesto dell\'intero sistema solare. &Egrave; stato scoperto da Galileo Galilei il 7 gennaio 1610 assieme ad Io, Ganimede e Callisto, da allora comunemente noti con l\'appellativo di satelliti galileiani. Leggermente pi&ugrave; piccolo della Luna, Europa &egrave; composto principalmente da silicati con una crosta costituita da acqua ghiacciata, probabilmente al suo interno &egrave; presente un nucleo di ferro-nichel ed &egrave; circondato esternamente da una tenue atmosfera, composta principalmente da ossigeno. A differenza di Ganimede e Callisto, la sua superficie si presenta striata e poco craterizzata ed &egrave; la pi&ugrave; liscia di quella di qualsiasi oggetto noto del sistema Solare. L\'apparente giovinezza e la morbidezza della sua superficie hanno portato ad ipotizzare l\'esistenza di un oceano d\'acqua presente sotto la crosta, che potrebbe essere dimora per la vita extraterrestre. In questa ipotesi viene proposto che Europa, riscaldato internamente dalle forze mareali causate dalla sua vicinanza a Giove e dalla risonanza orbitale con i vicini Io e Ganimede, rilasci il calore necessario per mantenere un oceano liquido sotto la superficie e stimolando al tempo stesso un\'attivit&agrave; geologica simile alla tettonica a placche. L\'8 settembre 2014, la NASA rifer&igrave; di aver trovato prove dell\'esistenza di un\'attivit&agrave; della tettonica a placche su Europa, la prima attivit&agrave; geologica di questo tipo su un mondo diverso dalla Terra. Nel dicembre del 2013 la NASA individu&ograve; sulla crosta di Europa alcuni minerali argillosi, pi&ugrave; precisamente, fillosilicati, che spesso sono associati a materiale organico. La stessa NASA annunci&ograve;, sulla base di osservazioni effettuate con il Telescopio spaziale Hubble, che sono stati rilevati geyser di vapore acqueo simili a quelli di Encelado, il satellite di Saturno. La sonda Galileo, lanciata nel 1989, forn&igrave; la maggior parte delle informazioni note su Europa. Nessun veicolo spaziale &egrave; ancora atterrato sulla superficie, ma le sue caratteristiche hanno suggerito diverse proposte di esplorazione, anche molto ambiziose. La Jupiter Icy Moon Explorer dell\'Agenzia spaziale europea &egrave; una missione per Europa (e per le vicine Io e Ganimede), il cui lancio &egrave; previsto per il 2022. La NASA invece sta programmando una missione robotica, che sarebbe lanciata a met&agrave; degli anni 2020.', 4, 103);

-- --------------------------------------------------------

--
-- Struttura della tabella `rockets`
--

CREATE TABLE `rockets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `nationality` text NOT NULL,
  `length` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rockets`
--

INSERT INTO `rockets` (`id`, `name`, `weight`, `height`, `nationality`, `length`) VALUES
(1, 'Star Booster', 4315680000, 290, 'U.S.A.', 1600),
(2, 'Millennium Balcon', 198, 6, 'U.S.A.', 38.4),
(3, 'Arcasia', 3000, 25, 'Cina', 410);

-- --------------------------------------------------------

--
-- Struttura della tabella `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `id_rocket` int(11) NOT NULL,
  `id_planet` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `travels`
--

INSERT INTO `travels` (`id`, `id_rocket`, `id_planet`, `departure_date`, `duration`) VALUES
(7, 1, 3, '2019-09-21', 7),
(8, 1, 3, '2019-09-30', 7),
(10, 2, 11, '2019-09-18', 4),
(9, 3, 1, '2019-09-18', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `sex` set('M','F','N.D.','') NOT NULL,
  `email` varchar(32) NOT NULL,
  `pwhash` char(64) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `lastname`, `sex`, `email`, `pwhash`, `isAdmin`) VALUES
(1, 'admin', 'admin', 'admin', 'N.D.', 'admin@bluehorizon.com', 'F9A81477552594C79F2ABC3FC099DAA896A6E3A3590A55FFA392B6000412E80B', 1),
(2, 'alefranklin', 'alessandro', 'franchin', 'M', 'alessandro.franchin@hotmail.it', 'a2288eba763cccbde7b593f8063be77d99c77f6eb76996d84451c047a14a51ef', 0),
(3, 'user', 'user', 'user', 'N.D.', 'user@bluehorizon.com', 'A5DD24B2F08A686FD386C22C3FF8EE281EF2FBFF1FDE7008668CDA3DECFA4669', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cabins`
--
ALTER TABLE `cabins`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`lastname`);

--
-- Indici per le tabelle `guest_order`
--
ALTER TABLE `guest_order`
  ADD PRIMARY KEY (`id_guest`,`id_order`),
  ADD UNIQUE KEY `id_guest` (`id_guest`,`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user_2` (`id_user`,`id_travel`,`id_cabin`),
  ADD KEY `id_cabin` (`id_cabin`),
  ADD KEY `id_travel` (`id_travel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indici per le tabelle `rockets`
--
ALTER TABLE `rockets`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_rocket_2` (`id_rocket`,`id_planet`,`departure_date`,`duration`),
  ADD KEY `id_planet` (`id_planet`),
  ADD KEY `id_rocket` (`id_rocket`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cabins`
--
ALTER TABLE `cabins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT per la tabella `planets`
--
ALTER TABLE `planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `rockets`
--
ALTER TABLE `rockets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `guest_order`
--
ALTER TABLE `guest_order`
  ADD CONSTRAINT `guest_order_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guest_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_cabin`) REFERENCES `cabins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `travels`
--
ALTER TABLE `travels`
  ADD CONSTRAINT `travels_ibfk_1` FOREIGN KEY (`id_planet`) REFERENCES `planets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travels_ibfk_2` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
