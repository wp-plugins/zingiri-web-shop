CREATE TABLE `accesslog` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(20) default NULL,
  `password` varchar(15) default NULL,
  `time` varchar(30) default NULL,
  `succeeded` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ;
CREATE TABLE `shipping_weight` (
`ID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`SHIPPINGID` INT( 11 ) NOT NULL ,
`FROM` DOUBLE NOT NULL DEFAULT '0' ,
`TO` DOUBLE NOT NULL  DEFAULT '0' ,
`PRICE` DOUBLE NOT NULL 
) ;
ALTER TABLE `settings` CHANGE `pricelist_thumb_width` `pricelist_thumb_width` TINYINT( 3 ) NULL DEFAULT NULL ,
CHANGE `pricelist_thumb_height` `pricelist_thumb_height` TINYINT( 3 ) NULL DEFAULT NULL ,
CHANGE `category_thumb_width` `category_thumb_width` TINYINT( 3 ) NULL DEFAULT NULL ,
CHANGE `category_thumb_height` `category_thumb_height` TINYINT( 3 ) NULL DEFAULT NULL ;
ALTER TABLE `settings` CHANGE `sendcosts_default_country` `stock_warning_level` INT( 11 ) NULL DEFAULT NULL ;
ALTER TABLE `settings` CHANGE `sendcosts_other_country` `use_stock_warning` TINYINT( 1 ) NULL DEFAULT NULL ;
ALTER TABLE `settings` CHANGE `rembours_costs` `weight_metric` VARCHAR( 10 ) NULL DEFAULT NULL ;
ALTER TABLE `product` ADD `WEIGHT` DOUBLE NOT NULL DEFAULT '0';
ALTER TABLE `order` ADD `WEIGHT` int(11) NOT NULL DEFAULT '0';
ALTER TABLE `shipping` DROP `rate` ;
ALTER TABLE `basket` DROP `price` ;
ALTER TABLE `settings` CHANGE `pay_atstore` `order_from_pricelist` TINYINT( 1 ) NULL DEFAULT NULL ;
ALTER TABLE `customer` ADD `NEWSLETTER` TINYINT( 1 ) NOT NULL DEFAULT '1';
UPDATE `customer` SET `NEWSLETTER` =1;
ALTER TABLE `settings` CHANGE `pay_paypal` `use_datefix` TINYINT( 1 ) NULL DEFAULT NULL ;
UPDATE `settings` SET `use_datefix` =0;