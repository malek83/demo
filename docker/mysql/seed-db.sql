CREATE DATABASE IF NOT EXISTS `demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `demo`;

CREATE TABLE `node` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
                        `credits_left` int(11) NOT NULL,
                        `credits_right` int(11) NOT NULL,
                        `lft` int(11),
                        `rgt` int(11),
                        `direction` ENUM('L', 'R') NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

set names utf8;

INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Aranżer', RAND(), RAND(), '1', '14', NULL);
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Artena', RAND(), RAND(), '2', '7', 'L');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Szal', RAND(), RAND(), '3', '4', 'L');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Arteria', RAND(), RAND(), '5', '6', 'R');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Hebab', RAND(), RAND(), '8', '13', 'R');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Navara', RAND(), RAND(), '9', '10', 'L');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Bajgala', RAND(), RAND(), '11', '12', 'R');