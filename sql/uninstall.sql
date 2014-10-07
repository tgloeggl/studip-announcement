--
-- Die entsprechende Konfigurationsoption radikal weglöschen.
-- Auch aus der UserConfig
--
DELETE FROM `config` WHERE `config_id` = MD5('ANNOUNCEMENT_SEEN');
DELETE FROM `user_config` WHERE `field` = 'ANNOUNCEMENT_SEEN';
