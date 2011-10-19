-- 20111012.sql
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

CREATE TABLE `ContentSection` (
`contentID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`description` VARCHAR( 255 ) NOT NULL ,
`content` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Character` (
`characterID` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`name` VARCHAR( 255 ) NOT NULL ,
`level` SMALLINT NOT NULL ,
`weight` SMALLINT NOT NULL ,
`strenght` SMALLINT NOT NULL ,
`defense` SMALLINT NOT NULL ,
`intellect` SMALLINT NOT NULL ,
`luck` SMALLINT NOT NULL ,
`health` SMALLINT NOT NULL ,
`userID` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkCharacterUser` FOREIGN KEY (`userID`) REFERENCES `User`(`userID`) 
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;
