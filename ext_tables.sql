CREATE TABLE tx_openinghours_domain_model_schedule
(
	title      varchar(255) NOT NULL DEFAULT '',
	startdate  int(11) unsigned NOT NULL DEFAULT '0',
	enddate    int(11) unsigned NOT NULL DEFAULT '0',
	monday     int(11) unsigned NOT NULL DEFAULT '0',
	tuesday    int(11) unsigned NOT NULL DEFAULT '0',
	wednesday  int(11) unsigned NOT NULL DEFAULT '0',
	thursday   int(11) unsigned NOT NULL DEFAULT '0',
	friday     int(11) unsigned DEFAULT '0',
	saturday   int(11) unsigned NOT NULL DEFAULT '0',
	sunday     int(11) unsigned NOT NULL DEFAULT '0',
	categories int(11) unsigned DEFAULT '0' NOT NULL,
	exceptions int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_openinghours_domain_model_openingtime
(
	monday    int(11) unsigned DEFAULT '0' NOT NULL,
	tuesday   int(11) unsigned DEFAULT '0' NOT NULL,
	wednesday int(11) unsigned DEFAULT '0' NOT NULL,
	thursday  int(11) unsigned DEFAULT '0' NOT NULL,
	friday    int(11) unsigned DEFAULT '0' NOT NULL,
	saturday  int(11) unsigned DEFAULT '0' NOT NULL,
	sunday    int(11) unsigned DEFAULT '0' NOT NULL,
	exception int(11) unsigned DEFAULT '0' NOT NULL,
	start     time         DEFAULT NULL,
	end       time         DEFAULT NULL,
	data      varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_openinghours_domain_model_exception
(
	schedule     int(11) unsigned DEFAULT '0' NOT NULL,
	date         date         DEFAULT NULL,
	data         varchar(255) DEFAULT '' NOT NULL,
	openinghours int(11) unsigned DEFAULT '0' NOT NULL,

);
