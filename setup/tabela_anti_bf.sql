DROP TABLE IF EXISTS anti_bruteforce;
CREATE TABLE `anti_bruteforce` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ip` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `horaBloqueio` DATETIME(0) NOT NULL,
  PRIMARY KEY (`id`));
