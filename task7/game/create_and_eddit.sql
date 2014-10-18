
--
-- Database: `happy_pair`
--

-- --------------------------------------------------------

--
-- Structure of table `boys`
--

CREATE TABLE IF NOT EXISTS `boys` (
  `pk_names` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(20) NOT NULL,
  PRIMARY KEY (`pk_names`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


--
-- Structure of table `girls`
--

CREATE TABLE IF NOT EXISTS `girls` (
  `pk_names` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(20) NOT NULL,
  PRIMARY KEY (`pk_names`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

