-- //TODO: Diogo: Alterar a tabela user e adicionar os campos:
-- * grupo, campo inteiro que pode levar os valores 1 ou 2, com o valor 1 por omissão, valor obrigatório
-- * assinatura, campo de texto com um máximo de 255 caracteres, valor facultativo
-- * website, campo de texto com um máximo de 255 caracteres, valor facultativo
-- * data de último login, data e hora, valor obrigatório e automático
-- * activo, permite indicar se um utilizador está activo ou não, valores 0 ou 1, 1 por omissão, valor obrigatório
-- * todas as opções que considerares importantes para o fórum
CREATE TABLE `User` (
`userID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`email` VARCHAR( 255 ) NOT NULL UNIQUE ,
`password` VARCHAR( 40 ) NOT NULL ,
`name` VARCHAR( 255 ) NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Board` (
`boardID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT , 
`title` VARCHAR (255) NOT NULL ,
`position` SMALLINT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Thread` (
`threadID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`title` VARCHAR (255) NOT NULL ,
`date` DATETIME NOT NULL ,
`postCount` INT NOT NULL DEFAULT 0 ,
`visitCount` INT NOT NULL DEFAULT 0 ,
`authorID` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkBoardUser` FOREIGN KEY (`authorID`) REFERENCES `User`(`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Post` (
`postID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`title` VARCHAR (255) NOT NULL ,
`created` DATETIME NOT NULL ,
`modified` DATETIME NOT NULL ,
`authorID` INT UNSIGNED NOT NULL ,
`modifiedBy` INT UNSIGNED NULL ,
CONSTRAINT `fkPostUser1` FOREIGN KEY (`authorID`) REFERENCES `User`(`userID`) ,
CONSTRAINT `fkPostUser2` FOREIGN KEY (`modifiedBy`) REFERENCES `User`(`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Shoutbox` (
`shoutID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`message` VARCHAR( 255 ) NOT NULL ,
`authorId` INT UNSIGNED NOT NULL ,
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
CONSTRAINT `fkShoutboxUser` FOREIGN KEY (`authorID`) REFERENCES `User`(`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;