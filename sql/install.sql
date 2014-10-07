--
-- Eine Konfigurationsoption, ob der Benutzer den Dialog zum Hinweis auf das neue StudIP schon gesehen hat
--
INSERT INTO `config` 
(`config_id`, `parent_id`, `field`, `value`, `is_default`, `type`, `range`, `section`, `position`, `mkdate`, `chdate`, `description`, `comment`, `message_template`) VALUES
(MD5('ANNOUNCEMENT_SEEN'), '', 'ANNOUNCEMENT_SEEN', '0', 1, 'boolean', 'global', '', 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 'Ob der Benutzer schon die Benachrichtigung zum StudIP 2.5 gesehen hat.', '', '');



-- 
-- 
-- DROP TABLE IF EXISTS `notifications`;
-- CREATE TABLE IF NOT EXISTS `notifications` (
--   `id` varchar(32) NOT NULL DEFAULT '',
--   `perms` set('user','autor','tutor','dozent','admin','root') NOT NULL DEFAULT ('user','autor','tutor','dozent','admin','root'),
--   `content` TEXT NOT NULL DEFAULT '',
--   PRIMARY KEY (`user_id`)
-- ) ENGINE=MyISAM;
-- 
-- DROP TABLE `unseen_notifications`;
-- CREATE TABLE `unseen_notifications` (
--   `user_id` varchar(32) NOT NULL DEFAULT '',
--   `notification_id` varchar(32) NOT NULL DEFAULT '',
--   PRIMARY KEY (user_id, notification_id),
--   FOREIGN KEY (user_id) REFERENCES auth_user_md5(user_id),
--   FOREIGN KEY (notification_id) REFERENCES notifications(id)
-- ) ENGINE=MyISAM;
-- 
-- INSERT INTO `notifications` (`id`, `perms`, `content`) VALUES 
-- ("5aae363fed07a9ba0fb649f4c2ac90d8", ('user','autor','tutor','dozent','admin','root'), "Bitte nehmen sie dies hier zur Kenntnis!");
-- 
-- INSERT INTO `unseen_notifications` (`user_id`, `notification_id`) 
-- SELECT "5aae363fed07a9ba0fb649f4c2ac90d8", usr.user_id FROM auth_user_md5 AS usr;
-- 
-- 
