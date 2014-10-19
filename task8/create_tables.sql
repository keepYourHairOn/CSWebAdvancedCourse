--
-- Database: `test_menu`
--

-- --------------------------------------------------------

--
-- Structure of `main_menu` table
--

CREATE TABLE IF NOT EXISTS `main_menu` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(20) NOT NULL,
  PRIMARY KEY (`pk`),
  UNIQUE KEY `menu_name` (`menu_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;



--
-- Structure of `sub_menu` table
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `fk` int(11) NOT NULL,
  `sub_menu_name` varchar(20) NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;
