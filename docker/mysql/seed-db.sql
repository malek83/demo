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

INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Aranżer', RAND()*100, RAND()*100, '1', '14', NULL);
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Artena', RAND()*100, RAND()*100, '2', '7', 'L');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Szal', RAND()*100, RAND()*100, '3', '4', 'L');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Arteria', RAND()*100, RAND()*100, '5', '6', 'R');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Hebab', RAND()*100, RAND()*100, '8', '13', 'R');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Navara', RAND()*100, RAND()*100, '9', '10', 'L');
INSERT INTO `node` (`id`, `username`, `credits_left`, `credits_right`, `lft`, `rgt`, `direction`) VALUES (NULL, 'Bajgala', RAND()*100, RAND()*100, '11', '12', 'R');