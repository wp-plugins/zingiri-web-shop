ALTER TABLE `customer` 
ADD `DATE_UPDATED` DATETIME NULL DEFAULT NULL;
ALTER TABLE `customer` 
CHANGE `JOINDATE` `DATE_CREATED` VARCHAR( 20 ) NULL DEFAULT NULL;