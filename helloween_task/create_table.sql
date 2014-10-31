--
-- База данных: `helloween`
--

-- --------------------------------------------------------

--
-- Структура таблицы `names_table`
--

CREATE TABLE IF NOT EXISTS `names_table` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `fk` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`pk`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Структура таблицы `predictions_table`
--

CREATE TABLE IF NOT EXISTS `predictions_table` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `prediction_content` varchar(500) NOT NULL,
  `picture_url` varchar(200) NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

