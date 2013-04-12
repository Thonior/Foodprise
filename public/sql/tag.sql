CREATE  TABLE `foodprise`.`tag` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `slug` VARCHAR(100) NOT NULL ,
  `tag` VARCHAR(100) NOT NULL ,
  `category` TINYINT(1) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) );

