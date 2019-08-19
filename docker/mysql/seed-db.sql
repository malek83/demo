CREATE DATABASE IF NOT EXISTS `demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `demo`;

CREATE TABLE `node` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
                        `credits_left` int(11) NOT NULL,
                        `credits_right` int(11) NOT NULL,
                        `lft` int(11),
                        `rgt` int(11),
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (lft) REFERENCES node(id),
                        FOREIGN KEY (rgt) REFERENCES node(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
