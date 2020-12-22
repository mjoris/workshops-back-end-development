SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- fotofactory is part of the examples in assets/09
DROP DATABASE IF EXISTS fotofactory;
CREATE DATABASE fotofactory DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE fotofactory;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
                               `id` int(11) NOT NULL AUTO_INCREMENT,
                               `name` varchar(255) NOT NULL,
                               `user_id` int(11) NOT NULL,
                               PRIMARY KEY (`id`),
                               KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` VALUES(1, 'russia', 1);
INSERT INTO `collections` VALUES(2, 'serbia', 2);
INSERT INTO `collections` VALUES(3, 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
                            `photo_id` int(11) NOT NULL,
                            `user_id` int(11) NOT NULL,
                            `comment` text NOT NULL,
                            `when` datetime NOT NULL,
                            PRIMARY KEY (`photo_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
                             `user_id` int(11) NOT NULL,
                             `interest` enum('nature','people','still lives','abstract') NOT NULL,
                             PRIMARY KEY (`user_id`,`interest`)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` VALUES(1, 'nature');
INSERT INTO `interests` VALUES(1, 'people');
INSERT INTO `interests` VALUES(2, 'people');
INSERT INTO `interests` VALUES(2, 'abstract');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `title` varchar(255) NOT NULL,
                          `filename` varchar(255) NOT NULL,
                          `collection_id` int(11) NOT NULL,
                          `user_id` int(11) NOT NULL,
                          PRIMARY KEY (`id`),
                          KEY `user_id` (`user_id`),
                          KEY `collection_id` (`collection_id`)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` VALUES(1, 'Me + Voadre', 'dvn_0000.jpg', 0, 1);
INSERT INTO `photos` VALUES(2, 'Russia 001', 'photo22.jpg', 1, 1);
INSERT INTO `photos` VALUES(3, 'Russia 002', 'photo23.jpg', 1, 1);
INSERT INTO `photos` VALUES(4, 'Russia 003', 'photo24.jpg', 1, 1);
INSERT INTO `photos` VALUES(5, 'Russia 004', 'photo25.jpg', 1, 1);
INSERT INTO `photos` VALUES(6, 'Russia 005', 'photo34.jpg', 1, 1);
INSERT INTO `photos` VALUES(7, 'Russia 006', 'photo35.jpg', 1, 1);
INSERT INTO `photos` VALUES(8, 'Serbia 001', 'photo37.jpg', 2, 1);
INSERT INTO `photos` VALUES(9, 'Serbia 002', 'photo38.jpg', 2, 1);
INSERT INTO `photos` VALUES(10, 'Test 001', 'photo29.jpg', 3, 2);
INSERT INTO `photos` VALUES(11, 'Test 002', 'photo31.jpg', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `username` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `equipment` text NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'joris', '$2y$10$ERrAdBi/yPrdwAzgHOx1ROSZzt1U03wubDGBZu45oWpDRCnO0Frf2', 'joris.maervoet@odisee.be', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et gravida tellus.\r\n\r\nPraesent auctor feugiat quam a ornare. Integer aliquam nulla ipsum. Aenean metus nibh, egestas vel ultricies ut, dignissim id felis. Cras vel turpis lectus, sed posuere urna. Morbi posuere enim a augue dapibus non tincidunt lacus placerat. Fusce ut volutpat odio. Praesent eu est elit. Etiam nec convallis nibh. In ultricies congue lectus, eget fringilla magna consequat at. Morbi pharetra mollis odio at ultricies. Aliquam ut nulla a nunc hendrerit egestas ut eu lacus.\r\n\r\nAliquam blandit bibendum purus sit amet mollis. Maecenas ante enim, sagittis eget cursus nec, lobortis quis augue. Quisque placerat lectus non nibh laoreet bibendum.\r\n\r\nDonec néc ultricies purus.');
INSERT INTO `users` VALUES(2, 'pieter', '$2y$10$duIZHgGG2xCIrTvxpiIkpOQkG3kXH2pTbfaC7uufHHsY18C5odzVK', 'pieter.vanpeteghem@odisee.be', 'Aliquam in est risus, id congue massa. Ut feugiat iaculis tortor sed egestas. Nunc ligula nibh, pulvinar et dapibus eget, accumsan nec libero.\r\n\r\nAenean non turpis quis nulla egestas imperdiet. Cras at nunc nec nisl lacinia dapibus. Nullam consectetur sollicitudin rutrum. In at neque in quam elementum faucibus.\r\n\r\nEtiam et orci eu massa sodales adipiscing at eget lectus. Praesent rutrum neque nec felis pretium non imperdiet tortor dictum. Praesent id est eu augue elementum lacinia nec eu massa. Donec euismod risus eu metus imperdiet ac rhoncus enim hendrerit. Ut vel arcu sit amet elit sagittis dapibus eu tempor justo. Phasellus quis orci nibh, eget eleifend augue.\r\n\r\nVivamus nulla purus, eleifend et rhoncus non, eleifend et mauris. In diam turpis, pharetra nec congue non, commodo vel lacus. Donec vulputate eros sed purus egestas sit amet lobortis augue convallis. Nullam quis nulla leo, vitae pellentesque risus. Nullam ornare ullamcorper placerat. Phasellus non velit at est vestibulum congue. ');



-- status is part of the examples in assets/09
--
-- Database: `status`
--

DROP DATABASE IF EXISTS status;
CREATE DATABASE status DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE status;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `name` varchar(40) NOT NULL,
                            `status` varchar(160) NOT NULL,
                            `datum` datetime NOT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=1 ;


-- post_its is part of the examples in assets/11
--
-- Database: `post_its`
--

DROP DATABASE IF EXISTS post_its;
CREATE DATABASE post_its DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE post_its;


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `username` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

INSERT INTO `users` VALUES(1, 'joris', '$2y$10$ERrAdBi/yPrdwAzgHOx1ROSZzt1U03wubDGBZu45oWpDRCnO0Frf2', 'joris.maervoet@odisee.be');
INSERT INTO `users` VALUES(2, 'pieter', '$2y$10$duIZHgGG2xCIrTvxpiIkpOQkG3kXH2pTbfaC7uufHHsY18C5odzVK', 'pieter.vanpeteghem@odisee.be');

CREATE TABLE `messages` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `message` text NOT NULL,
                          `user_id` int(11) NOT NULL,
                          PRIMARY KEY (`id`),
                          CONSTRAINT fk_user_id FOREIGN KEY (user_id)
                              REFERENCES users(id)
) ENGINE=MyISAM  DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

INSERT INTO `messages` VALUES(1, 'A year has passed since I wrote my note. But I should have known this right from the start.', 1);
INSERT INTO `messages` VALUES(2, 'I''ll send an SOS to the world.', 2);


-- post_its is part of the examples in assets/12
--
-- Database: `demo-webapi`
--


DROP DATABASE IF EXISTS `demo-webapi`;
CREATE DATABASE `demo-webapi`
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_unicode_ci;
USE `demo-webapi`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
                            `id` int(11) NOT NULL,
                            `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                            `description` text COLLATE utf8_unicode_ci NOT NULL,
                            `price` decimal(6,2) NOT NULL,
                            `quantity` int(11) NOT NULL,
                            `added_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `products` (`id`, `title`, `description`, `price`, `quantity`, `added_on`) VALUES
(1, 'Kenwood MX271 Patissier', 'Als jouw keuken vaak veel weg heeft van een bakkerskeuken, dan is de Kenwood MX271 Patissier een zeer geschikte mixer. De meegeleverde mixopzetstukken zorgen er namelijk voor dat je goed voorbereid je taart, gebak of pizza maakt. Zo maak je deeg met de deeghaak voor bijvoorbeeld pizza- of brooddeeg. Of klop je ingrediënten tot een luchtig geheel met de klopper en garde. Je bewerkt de ingrediënten in de RVS mengkom met een inhoud van 4 liter. Dit doe je daarbij op een van de 12 standen waardoor je ingrediënten altijd op de optimale snelheid bewerkt.', 176.99, 3, '2019-01-15 22:01:44'),
(2, 'DeLonghi Icona Vintage Blauw Broodrooster','De Icona Vintage-lijn van DeLonghi is gebaseerd op de nostalgie van de jaren vijftig. Dit is terug te zien in de vormgeving met retro kenmerken, kleuraccenten en chromen details. Onderdeel van de DeLonghi Icona Vintage ontbijtlijn is de broodrooster. Rooster je brood tot de voor jou gewenste kleur door de verschillende bruiningsstanden. Door de automatische centralisatie wordt brood altijd gelijkmatig aan beide kanten gebruind. De DeLonghi Icona Vintage broodrooster heeft ook een eenzijdige roosterfunctie voor het bereiden van de lekkerste bagels.', 89.99, 10, '2019-01-15 22:02:38'),
(4, 'Koelkast Bosch KSL20AR30', 'De Bosch KSL20AR30 brengt de jaren ''50 terug naar jouw keuken. Deze retro koelkast heeft namelijk het uiterlijk van vroeger, maar de techniek van het heden. En die technische snufjes liegen er niet om. In de 139 liter ruime koelruimte zorgt de luchtcirculatie voor een constante temperatuur waardoor eten langer vers blijft. Ook groente en fruit blijft tot 2 keer langer vers in de speciale HydroFresh-groentelade.', 799.00, 1,  '2019-01-15 22:03:16'),
(6, 'Ariete 1389 Vintage - Pistonmachine - Lichtblauw', 'Een beauty in de keuken is de Retro Espresso Machine in Vintage Sky Blue van het Italiaanse merk Ariete. Deze leuke retro espresso machine maakt espresso en koffie klaar door gemalen koffie of pads te gebruiken. Kies er daarnaast voor om een maxi capuccino te maken en top de koffie af met een perfecte schuimlaag.', 171.99, 0, '2019-01-15 22:15:08'),
(7, 'View Quest Hepburn Mk II Draagbare radio', 'Ben je opzoek naar een radio of Bluetooth speaker? Je kunt natuurlijk voor een eenvoudige radio gaan, maar je kan ook kiezen voor een radio van View Quest. Dit Britse merk haalt de inspiratie uit het eigen land. Dit land staat tenslotte bekend om speakers met unieke designs en een uitstekende geluidskwaliteit. Kleur en design zijn belangrijke onderdelen bij het uitstralen van wie jij bent. Dus waarom zou je dan niet voor het allermooiste gaan in jouw huis?', 149.99, 3, '2019-01-15 22:19:02')
;

ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;