--------------------10/10/2014---------------
/*completed*/
ALTER TABLE `trip_vouchers` ADD `no_of_days` INT NOT NULL AFTER `fuel_extra_charges`;
ALTER TABLE `drivers` CHANGE `date_of_joining` `date_of_joining` DATE NOT NULL ;
ALTER TABLE `vehicles` CHANGE `vehicle_manufacturing_year` `vehicle_manufacturing_year` INT NOT NULL ;
ALTER TABLE `tariffs` ADD `vehicle_model_id` INT NOT NULL AFTER `tariff_master_id` ,ADD INDEX ( `vehicle_model_id` ) ;
ALTER TABLE `trips` ADD `vehicle_model_id` INT NOT NULL AFTER `vehicle_make_id` ,ADD INDEX ( `vehicle_model_id` ) ;
ALTER TABLE `trips` ADD `remarks` TEXT NOT NULL AFTER `total_amount` ;
CREATE TABLE IF NOT EXISTS `app_request_log` (
  `id` bigint(20) NOT NULL,
  `ip_address` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `trip_vouchers` ADD `trip_starting_time` TIME NOT NULL AFTER `no_of_days` ,
ADD `trip_ending_time` TIME NOT NULL AFTER `trip_starting_time`;
ALTER TABLE `trip_vouchers` ADD `driver_bata` DOUBLE NOT NULL AFTER `driver_id` ;

/*need to b updated*/



/*13-Nov-2014*/
ALTER TABLE `trip_vouchers`  ADD `voucher_no` INT(11) NOT NULL,  ADD `km_hr` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '1 -km tarif,2 hourly tarif',  ADD `base_tarif` VARCHAR(50) NOT NULL,  ADD `base_amount` DOUBLE NOT NULL,  ADD `adt_tarif` VARCHAR(50) NOT NULL,  ADD `adt_tarif_rate` DOUBLE NOT NULL,  ADD `vehicle_tarif` DOUBLE NOT NULL;



/*20-Nov-2014*/
ALTER TABLE `trip_vouchers` ADD `delivery_no` INT( 11 ) NOT NULL COMMENT 'fa delivery number',
ADD `invoice_no` INT( 11 ) NOT NULL COMMENT 'fa invoice no',
ADD INDEX ( `delivery_no` , `invoice_no` ) 

