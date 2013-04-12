CREATE  TABLE `foodprise`.`edge` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `origin` INT NOT NULL ,
  `destination` INT NOT NULL ,
  `context` VARCHAR(45) NOT NULL ,
  `read` TINYINT(1) NOT NULL DEFAULT 0 ,
  `destowner` INT NOT NULL ,
  PRIMARY KEY (`id`) );


ALTER TABLE `foodprise`.`edge` ADD COLUMN `comment` VARCHAR(300) NULL