-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 10 juin 2024 à 15:04
-- Version du serveur : 8.0.30
-- Version de PHP : 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ka_dans_ka`
--
CREATE DATABASE IF NOT EXISTS `ka_dans_ka` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `ka_dans_ka`;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `author` varchar(100) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `image`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(20, NULL, 'artisans_ka.jpg', 'La fabrication et les artisants du Ka', 'Le Ka est un tambour compos&eacute; d&#039;une peau de cabri (ch&egrave;vre) et d&#039;un tonneau, le tout assembl&eacute; par un syst&egrave;me de cordage. \r\nLa caisse de r&eacute;sonance du KA est un tonneau de bois. \r\nMat&eacute;riau de r&eacute;cup&eacute;ration au temps de l&#039;esclavage, il servait &agrave; conditionner la viande sal&eacute;e ou le vin. \r\nSes caract&eacute;ristiques acoustiques originelles le rendaient pr&ecirc;t &agrave; l&#039;emploi comme instrument de percussion.\r\nLe Ka &eacute;tait un moyen de communication entre les esclaves, leur permettant d&#039;exprimer leurs &eacute;motions et de galvaniser leur courage face aux difficult&eacute;s de leur condition. \r\n\r\nLes Gardiens du Ka Guadeloup&eacute;en En Guadeloupe, quelques artisans passionn&eacute;s se d&eacute;vouent &agrave; pr&eacute;server le ka, cette percussion traditionnelle embl&eacute;matique. \r\n\r\nParmi eux, Claudius Barbin et Daniel Mathieu se distinguent. Claudius Barbin, Ma&icirc;tre du Ka Artisan reconnu, Claudius Barbin fa&ccedil;onne avec amour ces instruments &agrave; partir de bois, calebasses et noix de coco. Il cr&eacute;e deux types de ka : en bois fouill&eacute; &agrave; la main et en tonneau de lattes de bois cercl&eacute;es de m&eacute;tal. Pour des sons aigus, il tend une peau de cabri sur chaque instrument. \r\nClaudius Barbin voit dans le ka un symbole de l&#039;identit&eacute; guadeloup&eacute;enne. Cette conviction l&#039;a pouss&eacute; &agrave; se lancer dans cette activit&eacute;, par amour pour sa terre. \r\n\r\nDaniel Mathieu, Artisan Pluridisciplinaire Daniel Mathieu est un autre artisan sp&eacute;cialis&eacute; dans les instruments &agrave; cordes, percussions et ka. Avec Claudius Barbin, ils pr&eacute;servent ce patrimoine musical traditionnel. Leurs cr&eacute;ations authentiques sont tr&egrave;s appr&eacute;ci&eacute;es localement. Chaque ka issu de leurs ateliers t&eacute;moigne de l&#039;identit&eacute; culturelle guadeloup&eacute;enne.', 'gwladys', '2024-06-06', NULL),
(25, NULL, 'danseuse_gwoka.jpg', 'Le gwo ka, omnipr&eacute;sent !', 'Le gwo ka rythme de nombreux &eacute;v&eacute;nements et rassemblements insulaires et m&ecirc;me au-del&agrave;.\r\nOn peut l&#039;entendre lors :\r\nDes f&ecirc;tes patronales, c&eacute;l&eacute;brations annuelles anim&eacute;es par les groupes de gwo ka\r\nDes bals populaires, en plein air ou en salle, o&ugrave; l&#039;on danse avec fougue sur ces rythmes entra&icirc;nants\r\nDes loges, lieux communautaires d&eacute;di&eacute;s &agrave; la transmission et &agrave; la pratique du gwo ka\r\nDes manifestations culturelles diverses : th&eacute;&acirc;tres, salles de spectacle, festivals\r\nDes veill&eacute;es mortuaires en Guadeloupe, tradition ancestrale\r\n\r\nMais aussi des mariages, des anniversaires et autres &eacute;v&eacute;nements familiaux ou amicaux\r\nDu carnaval de Paris, o&ugrave; il est mis &agrave; l&#039;honneur par la diaspora guadeloup&eacute;enne', 'gwladys', '2024-06-10', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `role` enum('ROLE_USER','ROLE_ADMIN') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `pseudo`, `email`, `phone`, `mdp`, `role`) VALUES
(2, 'nanou', 'nanou', 'nanou.gwladys@hotmail.com', 'nanoustyle@hotmail.com', '0603121212', '$2y$10$/DulN/ags4q5BJSB1G6v7.HCmALpGLK2timBIXAaZUhpOFMQJmhvG', 'ROLE_ADMIN'),
(7, 'jordan', 'black', 'jojo', 'jordan.black@gmail.com', '0672658485', '$2y$10$AB/2JkagMhFt7wgWJ5/d7uZ6jtAdaEdJ71qrm6QeRRpStIknSgHFG', 'ROLE_ADMIN'),
(11, NULL, NULL, 'glad', 'gladou.j@gmail.com', NULL, '$2y$10$nlTnsL.4G.Xh503u0msiEePsNy66Kweblnh5a838yaZEfi1Roo8sS', 'ROLE_USER'),
(12, NULL, NULL, 'soutenance', 'soutenance.jour@gmail.com', NULL, '$2y$10$aiKX10N2yZD1Cf3R.JoMkOMmHGyKi9j2pTdIIJTHV.8ksPyk82fuW', 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
