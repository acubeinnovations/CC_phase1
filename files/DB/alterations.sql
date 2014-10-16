--------------------10/10/2014---------------

ALTER TABLE `trip_vouchers` ADD `no_of_days` INT NOT NULL AFTER `fuel_extra_charges`;
ALTER TABLE `drivers` CHANGE `date_of_joining` `date_of_joining` DATE NOT NULL ;
