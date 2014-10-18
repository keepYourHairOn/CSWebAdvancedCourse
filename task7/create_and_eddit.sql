-- creation of table if it is not exists
CREATE TABLE IF NOT EXISTS `test_table`(
	`test_table_pk` int(11) NOT NULL AUTO_INCREMENT, -- creation of auto incremented primary key
	`name` varchar(20) NOT NULL, -- creation of varchar field 
	`text` text NOT NULL, -- creation of text field
	`mdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- creation timestamp field with the default value equals to current date and time
	`time_date` time NOT NULL, -- creation of time field
	PRIMARY KEY (`test_table_pk`) -- set the primary key
);

ALTER TABLE  `test_table`  -- addition of new column
ADD `date_column` DATE NOT NULL; 

ALTER TABLE `test_table`  -- sett value of time_date column
ALTER COLUMN  time_date 
SET DEFAULT '12:00:00';

UPDATE `test_table` -- update value of name column where primary key is equal 1
SET `name`= 'WHO' 
WHERE 1;

INSERT INTO `test_table` (`name` , `text`) -- add new values to the table
VALUES ('DOCTOR' , 'TARDIS');

INSERT INTO `test_table` (`name` , `text`,`mdate`,`time_date`) -- add new row to the table
VALUES ('DALIK' , 'WORLD', '2014-10-14 20:44:20' , '00:00:11');

