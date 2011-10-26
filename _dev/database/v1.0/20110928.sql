-- 20110928.sql
--
-- This file is part of Aventura no Rato! A browser based, adventure type, game.
-- Copyright (C) 2011  Diogo Samuel, Jorge Gonçalves, Pedro Pires e Sérgio Lopes
--
-- This program is free software: you can redistribute it and/or modify
-- it under the terms of the GNU Affero General Public License as published by
-- the Free Software Foundation, either version 3 of the License, or
-- (at your option) any later version.
--
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- GNU Affero General Public License for more details.
--
-- You should have received a copy of the GNU Affero General Public License
-- along with this program.  If not, see <http://www.gnu.org/licenses/>.

CREATE TABLE `User` (
`userID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`email` VARCHAR( 255 ) NOT NULL UNIQUE ,
`password` VARCHAR( 40 ) NOT NULL ,
`name` VARCHAR( 255 ) NULL ,
`group` TINYINT NOT NULL DEFAULT 1 ,
`signature` VARCHAR( 255 ) NULL ,
`website` VARCHAR( 255 ) NULL ,
`lastLogin` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`active` TINYINT NOT NULL DEFAULT 1 ,
`avatar` VARCHAR( 255 ) NULL ,
`postPerPage` INT NOT NULL DEFAULT 0 
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