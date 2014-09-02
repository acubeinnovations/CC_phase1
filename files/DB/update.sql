ALTER TABLE `customers` CHANGE `app_key` `app_id` VARCHAR( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ;

ALTER TABLE `customers` ADD `password` VARCHAR( 255 ) NULL AFTER `app_id` ;
