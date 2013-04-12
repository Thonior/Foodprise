CREATE  TABLE `foodprise`.`node` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NOT NULL ,
  `description` VARCHAR(100) NOT NULL ,
  `img` VARCHAR(100) NOT NULL ,
  `user_id` INT NOT NULL ,
  `created` INT NOT NULL ,
  PRIMARY KEY (`id`) );
