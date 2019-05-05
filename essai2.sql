

--
-- Table structure for table acheteurs
--

CREATE TABLE acheteurs (
  mail varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  typecarte varchar(255) NOT NULL,
  numerocarte bigint(20) NOT NULL,
  dateexp varchar(255) NOT NULL,
  code int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table acheteurs
--

INSERT INTO acheteurs (mail, adresse, typecarte, numerocarte, dateexp, code) VALUES
('hugues.m@edu.ece.fr', 'Reuil Malmaison', 'Visa', 1234567890123456, '03/2020', 123),
('ines.g@edu.ece.fr', 'Neuilly', 'MasterCard', 4567456745674567, '06/2020', 456);

-- --------------------------------------------------------

--
-- Table structure for table adminis
--

CREATE TABLE adminis (
  mail varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table adminis
--

INSERT INTO adminis (mail) VALUES
('clara.sabatey@edu.ece.fr'),
('lea.ben-haim@edu.ece.fr'),
('sara.sandid@edu.ece.fr');

-- --------------------------------------------------------

--
-- Table structure for table items
--

CREATE TABLE items (
  id int(11) NOT NULL,
  nom varchar(255) NOT NULL,
  photo varchar(255) NOT NULL,
  description varchar(10000) NOT NULL,
  video varchar(255) NOT NULL,
  prix float NOT NULL,
  quantite int(11) NOT NULL,
  mail varchar(255) NOT NULL,
  categorie varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table items
--

INSERT INTO items (id, nom, photo, description, video, prix, quantite, mail, categorie) VALUES
(1, 'Les Misérables', 'Miserables', 'Dans la France chaotique du XIXe siècle, Jean Valjean sort de prison. Personne ne tend la main à cet ancien détenu hormis un homme d’église, qui le guide sur la voie de la bonté. Valjean décide alors de vouer sa vie à la défense des miséreux. Son destin va croiser le chemin de Fantine, une mère célibataire prête à tout pour le bonheur de sa fille. Celui des Thénardier, famille cruelle et assoiffée d’argent. Et celui de Javert, inspecteur de police dont l’obsession est de le renvoyer en prison !', '', 6, 5, 'lolo.lala@edu.ece.fr', 'livre'),
(2, 'Le petit Prince', 'petitprince', 'J\'ai ainsi vécu seul, sans personne avec qui parler véritablement, jusqu\'à une panne dans le désert du Sahara, il y a six ans. Quelque chose s\'était cassé dans mon moteur.\r\nEt comme je n\'avais avec moi ni mécanicien, ni passagers, je me préparai à essayer de réussir, tout seul, une réparation difficile. C\'était pour moi une question de vie ou de mort. J\'avais à peine de l\'eau à boire pour huit jours.', '', 4, 4, 'axel.s@edu.ece.fr', 'livre'),
(3, 'Les trois Mousquetaire', 'troismousquetaires', 'Aux trois gentilshommes mousquetaires Athos, Porthos et Aramis, toujours prêts à en découdre avec les gardes du Cardinal de Richelieu, s\'associe le jeune gascon d\'Artagnan fraîchement débarqué de sa province avec pour ambition de servir le roi Louis XIII.\r\nEngagé dans le corps des mousquetaires, d\'Artagnan s\'éprend de l\'angélique Constance Bonacieux.\r\nEn lutte contre la duplicité et l\'intrigue politique, les quatre compagnons trouveront en face d\'eux une jeune anglaise démoniaque et très belle, Milady, la redoutable espionne du Cardinal.\r\nD\'Artagnan seul échappe à ses agents. Mais rapportera-t-il à temps à la Reine de France, Anne d\'Autriche, les ferrets qu\'elle a remis à son amant, le duc de Buckingham?\r\nChef-d’œuvre d\'Alexandre Dumas et modèle de roman historique, \"Les trois mousquetaires\" demeure un des livres les plus lus dans le monde entier.', '', 3, 3, 'axel.s@edu.ece.fr', 'livre'),
(4, 'Les fleurs du Mal', 'fleurs', 'Romantiques par la mélancolie à l\'ombre de laquelle ils s\'épanouissent, parnassiens par leur culte du Beau et la rigueur de leur composition (ils sont dédiés à Théophile Gautier), ces poèmes illustrent la théorie des \"correspondances\" horizontales entre les éléments visibles et invisibles, qui sont comme de \"longs échos qui de loin en loin se confondent\" pour s\'élever en correspondances verticales \"ayant l\'expansion des choses infinies\". Exploration du matériau grouillant qu\'est la vie, cette quête spirituelle conduit le poète, tiraillé entre Spleen et Idéal, à travers diverses expériences pour échapper à la dualité déchirante.', '', 2, 1, 'lolo.lala@edu.ece.fr', 'livre'),
(5, 'T-shirt', '5', 'T-shirt Zara', '', 12, 2, 'melanie.c@edu.ece.fr', 'vetement'),
(6, 'Robe', '6', 'Robe d\'été', '', 8, 5, 'lolo.lala@edu.ece.fr', 'vetement'),
(7, 'Chemise', '7', 'Chemise à manche courte homme', '', 14, 3, 'melanie.c@edu.ece.fr', 'vetement'),
(8, 'Pantalon', '8', 'Pantalon homme avec poches', '', 36, 2, 'sam.b@edu.ece.fr', 'vetement'),
(9, 'Maillot de foot', '9', 'Maillot de foot du PSG', '', 85, 13, 'sam.b@edu.ece.fr', 'sport'),
(10, 'Ballon de foot ', '10', 'Le ballon de football FFF Strike présente une conception résistante à 12 panneaux avec des motifs à haut contraste pour un meilleur suivi visuel. La vessie en caoutchouc renforcé offre un bon maintien de forme et une trajectoire maîtrisée.', '', 25, 34, 'melanie.c@edu.ece.fr', 'sport'),
(11, 'Lunettes de natation', '11', 'Conçues pour enchaîner les longueurs, ces lunettes de natation t\'offrent un large champ de vision. Le pont de nez et la lanière double t\'assurent un ajustement confortable et personnalisé.', '', 15, 22, 'sam.b@edu.ece.fr', 'sport'),
(12, 'Gants de boxe', '12', 'Donne le meilleur de toi-même à chaque uppercut avec ces gants de boxe. Conçus en PU pour la résistance, ils possèdent une coupe ergonomique pour favoriser la puissance. Une bride élastique auto-agrippante offre une fermeture sécurisée, tandis que son rembourrage en mousse absorbe les impacts.', '', 50, 15, 'melanie.c@edu.ece.fr', 'sport'),
(13, 'Johnny Hallyday', '13', 'Le Son en Haute Définition a enfin son support ! En collaboration avec Universal, la Fnac vous invite à découvrir, en avant-première, le Blu-ray Pure Audio.\r\n\r\nLe Blu-ray Pure Audio s\'appuie sur un support, une technologie et un équipement déjà connu : le Blu-ray.\r\n\r\nMais, à la manière d\'un CD, le disque contient uniquement de l\'audio, de la musique, aucune vidéo. Le support est réalisé directement à partir des bandes studio « Master » et procure, chez soi, le son et la densité du master d\'origine.\r\n\r\nL\'album y est encodé sous trois formats (PCM, DTS HD MASTER AUDIO et DOLBY TRUE HD) afin d\'être compatible avec tous les lecteurs Blu-ray du marché, idéalement reliés à un Home Cinéma avec une connexion HDMI.\r\n\r\nEt que les amateurs de musique nomade se rassurent : le leaftlet inséré dans chaque produit Blu-ray Pure Audio leur permettra aussi de télécharger gratuitement l\'album depuis un site dédié, soit au format MP3, soit au format FLAC « lossless » (sans pertes).', '', 26, 40, 'sam.b@edu.ece.fr', 'musique'),
(14, 'Ed Sheeran', '14', 'Mèche rebelle, guitare en bandoulièreet gouaille juvénile, le phénomène popfolk britannique poursuit son ascension.Mais avec ce deuxième album, le rouquind\'Halifax élargit sa palette d\'ambiancessoul voire rap et croise même le fer avecun certain Pharrell Williams.', '', 7, 55, 'lolo.lala@edu.ece.fr', 'musique'),
(15, 'Michael Jackson', '15', 'Michael Jackson - The essential\r\nRetrouvez tous les tubes du maître de la pop, un incontournable! ce qui est appréciable c\'est que ce best of reprend les premières chansons de Michael avec les Jackson 5.que des perles!!!Dansez maintenant!!!', '', 18, 30, 'sam.b@edu.ece.fr', 'musique'),
(16, 'Rihanna', '16', 'Rihanna- Loud \r\nPlus de 18 Millions de disques vendus dans le monde, son dernier album RATED R sorti l\'hiver dernier - 3 tubes tous classés #2 de l\'Airplay en France \"Russian Roulette\" \"Te Amo\" \"Rude Boy\", est toujours classé au Top 50. Le nouveau single \"Only Girl\" produit par Stargate (duo de producteurs Norvégiens ayant travaillé avec NeYo, BeYoncé, producteur du tube « please dont stop de music ») est entré directement sur NRJ, SKYROCK, FUN RADIO et le réseau STAR. #1 en digital dans plus de 10 pays dont la France, les US, Australie... Rihanna, chanteuse barbadienne de Pop/Electro agée de 22 ans compte à ce jour, cinq chansons qui se sont classées en première place du billboard hot 100 aux US en seulement 3 ans, ce qui fait d\'elle l\'artiste féminine ayant classé le plus de chansons au sommet du billboard hot 100 de cette décennie. Ce nouvel album sera définitivement plus électro.', '', 7, 25, 'melanie.c@edu.ece.fr', 'musique');

-- --------------------------------------------------------

--
-- Table structure for table livres
--

CREATE TABLE livres (
  id int(11) NOT NULL,
  titre varchar(255) NOT NULL,
  auteur varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table livres
--

INSERT INTO livres (id, titre, auteur) VALUES
(1, 'Les Misérables', 'Victor Hugo'),
(2, 'Le petit Prince', 'Saint Exupery'),
(3, 'Les trois mousquetaires', 'Alexandre Dumas'),
(4, 'Les fleurs du Mal', 'Beaudelaire');

-- --------------------------------------------------------

--
-- Table structure for table musiques
--

CREATE TABLE musiques (
  id int(11) NOT NULL,
  album varchar(255) NOT NULL,
  artiste varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table musiques
--

INSERT INTO musiques (id, album, artiste) VALUES
(13, 'Sang pour Sang', 'Johnny Halliday'),
(14, 'X', 'Ed Sheeran'),
(15, 'The essential', 'Michael Jackson'),
(16, 'Loud', 'Rihanna');

-- --------------------------------------------------------

--
-- Table structure for table paniers
--

CREATE TABLE paniers (
  mail varchar(255) NOT NULL,
  id int(11) NOT NULL,
  quantite int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table sports
--

CREATE TABLE sports (
  id int(11) NOT NULL,
  categorie varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table sports
--

INSERT INTO sports (id, categorie) VALUES
(9, 'Foot'),
(10, 'Foot'),
(11, 'Natation'),
(12, 'Boxe');

-- --------------------------------------------------------

--
-- Table structure for table utilisateurs
--

CREATE TABLE utilisateurs (
  mail varchar(255) NOT NULL,
  pseudo varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  mdp varchar(255) NOT NULL,
  categorie varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table utilisateurs
--

INSERT INTO utilisateurs (mail, pseudo, nom, prenom, mdp, categorie) VALUES
('axel.s@edu.ece.fr', 'axels', 'sani', 'axel', 'ax', 'vendeur'),
('clara.sabatey@edu.ece.fr', 'clara', 'sabatey', 'clara', 'olaf', 'admin'),
('hugues.m@edu.ece.fr', 'huguesm', 'marie', 'hugues', 'hug', 'acheteur'),
('ines.g@edu.ece.fr', 'nes', 'guermonprez', 'ines', 'nessy', 'acheteur'),
('lala.lolo@edu.ece.fr', 'lalalolo', 'lolo', 'lala', 'lalo', 'vendeur'),
('lea.ben-haim@edu.ece.fr', 'lele', 'lea', 'benhaim', 'lele', 'admin'),
('melanie.c@edu.ece.fr', 'melaniec', 'clavier', 'melanie', 'mela', 'vendeur'),
('sam.b@edu.ece.fr', 'sambouz', 'bouzemane', 'sam', 'samb', 'vendeur'),
('sara.sandid@edu.ece.fr', 'sasou', 'sandid', 'sara', 'coucou', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table vendeurs
--

CREATE TABLE vendeurs (
  mail varchar(255) NOT NULL,
  photo varchar(255) NOT NULL,
  image varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table vendeurs
--

INSERT INTO vendeurs (mail, photo, image) VALUES
('axel.s@edu.ece.fr', 'p4', 'f4'),
('lala.lolo@edu.ece.fr', 'p1', 'f1'),
('melanie.c@edu.ece.fr', 'p2', 'f2'),
('sam.b@edu.ece.fr', 'p3', 'f3');

-- --------------------------------------------------------

--
-- Table structure for table vetements
--

CREATE TABLE vetements (
  id int(11) NOT NULL,
  genre varchar(255) NOT NULL,
  taille varchar(255) NOT NULL,
  couleur varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table vetements
--

INSERT INTO vetements (id, genre, taille, couleur) VALUES
(5, 'Femme', 'M', 'Rayé'),
(6, 'Femme', 'L', 'Noire'),
(7, 'Homme', 'M', 'Rayé'),
(8, 'Homme', 'S', 'Noir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table acheteurs
--
ALTER TABLE acheteurs
  ADD PRIMARY KEY (mail);

--
-- Indexes for table adminis
--
ALTER TABLE adminis
  ADD PRIMARY KEY (mail);

--
-- Indexes for table items
--
ALTER TABLE items
  ADD PRIMARY KEY (id);

--
-- Indexes for table livres
--
ALTER TABLE livres
  ADD PRIMARY KEY (id);

--
-- Indexes for table musiques
--
ALTER TABLE musiques
  ADD PRIMARY KEY (id);

--
-- Indexes for table paniers
--
ALTER TABLE paniers
  ADD PRIMARY KEY (mail);

--
-- Indexes for table sports
--
ALTER TABLE sports
  ADD PRIMARY KEY (id);

--
-- Indexes for table utilisateurs
--
ALTER TABLE utilisateurs
  ADD PRIMARY KEY (mail);

--
-- Indexes for table vendeurs
--
ALTER TABLE vendeurs
  ADD PRIMARY KEY (mail);

--
-- Indexes for table vetements
--
ALTER TABLE vetements
  ADD PRIMARY KEY (id);