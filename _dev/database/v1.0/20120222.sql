ALTER TABLE `Board` ADD `active` TINYINT NOT NULL DEFAULT 1 ;
ALTER TABLE `Thread` ADD `active` TINYINT NOT NULL DEFAULT 1 ;
ALTER TABLE `Post` ADD `active` TINYINT NOT NULL DEFAULT 1 ;
ALTER TABLE `Character` ADD `active` TINYINT NOT NULL DEFAULT 1 ;