-- script for use using db v1 for v2 (run this script on v1)

ALTER TABLE vote_remark CHANGE createAt created_at DATETIME NOT NULL;
ALTER TABLE vote_response CHANGE createAt created_at DATETIME NOT NULL;

ALTER TABLE `user`
  ADD created_at DATETIME NOT NULL DEFAULT NOW(),
  ADD updated_at DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  CHANGE certificated confirmed TINYINT(1) DEFAULT '0' NOT NULL,
  CHANGE COLUMN expired expired TINYINT(1) NULL DEFAULT NULL,
  CHANGE COLUMN credentials_expired credentials_expired TINYINT(1) NULL DEFAULT NULL
  CHANGE COLUMN locked locked TINYINT(1) DEFAULT 0;

ALTER TABLE `remark`
  CHANGE createdAt created_at DATETIME NOT NULL,
  CHANGE updatedAt updated_at DATETIME NOT NULL,
  CHANGE postedAt posted_at DATETIME;

ALTER TABLE `response`
  CHANGE createdAt created_at DATETIME NOT NULL,
  CHANGE updatedAt updated_at DATETIME NOT NULL,
  CHANGE postedAt posted_at DATETIME;

ALTER TABLE `report` CHANGE reportedAt reported_at DATETIME NOT NULL;

ALTER TABLE `theme` 
  CHANGE COLUMN slug slug VARCHAR(128) NULL DEFAULT NULL,
  DROP INDEX UNIQ_9775E708989D9B62;
  
ALTER TABLE `emotion` 
  CHANGE COLUMN slug slug VARCHAR(128) NULL DEFAULT NULL,
  DROP INDEX UNIQ_DEBC77989D9B62;

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `random_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uris` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allowed_grant_types` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `access_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` int(11) DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B6A2DD685F37A13B` (`token`),
  KEY `IDX_B6A2DD6819EB6921` (`client_id`),
  KEY `IDX_B6A2DD68A76ED395` (`user_id`),
  CONSTRAINT `FK_B6A2DD6819EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_B6A2DD68A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `auth_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` longtext COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` int(11) DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5933D02C5F37A13B` (`token`),
  KEY `IDX_5933D02C19EB6921` (`client_id`),
  KEY `IDX_5933D02CA76ED395` (`user_id`),
  CONSTRAINT `FK_5933D02C19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_5933D02CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `log_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` enum('HEAD','GET','POST','PUT','PATCH','DELETE','PURGE','OPTIONS','TRACE','CONNECT','LINK','UNLINK','COPY','LOCK','UNLOCK') COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `query` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `response` longtext COLLATE utf8_unicode_ci,
  `status` smallint(6) NOT NULL,
  `ip` varchar(39) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_35AB708A76ED395` (`user_id`),
  CONSTRAINT `FK_35AB708A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startAt` datetime NOT NULL,
  `endAt` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `refresh_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` int(11) DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C74F21955F37A13B` (`token`),
  KEY `IDX_C74F219519EB6921` (`client_id`),
  KEY `IDX_C74F2195A76ED395` (`user_id`),
  CONSTRAINT `FK_C74F219519EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_C74F2195A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, action_id INT DEFAULT NULL, user_id INT DEFAULT NULL, response_id INT DEFAULT NULL, vote_response_id INT DEFAULT NULL, vote_remark_id INT DEFAULT NULL, remark_id INT DEFAULT NULL, is_used_for_score TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_27BA704B9D32F035 (action_id), INDEX IDX_27BA704BA76ED395 (user_id), INDEX IDX_27BA704BFBF32840 (response_id), INDEX IDX_27BA704B487E1E14 (vote_response_id), INDEX IDX_27BA704B3DE7B8B2 (vote_remark_id), INDEX IDX_27BA704B7FAB7F77 (remark_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, point INT NOT NULL, limitPerDay SMALLINT DEFAULT NULL, event_name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_47CC8C9241E832AD (event_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, score INT NOT NULL, UNIQUE INDEX UNIQ_595AAE345E237E06 (name), UNIQUE INDEX UNIQ_595AAE3432993751 (score), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

ALTER TABLE history ADD CONSTRAINT FK_27BA704B9D32F035 FOREIGN KEY (action_id) REFERENCES action (id);
ALTER TABLE history ADD CONSTRAINT FK_27BA704BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id);
ALTER TABLE history ADD CONSTRAINT FK_27BA704BFBF32840 FOREIGN KEY (response_id) REFERENCES response (id) ON DELETE CASCADE;
ALTER TABLE history ADD CONSTRAINT FK_27BA704B487E1E14 FOREIGN KEY (vote_response_id) REFERENCES vote_response (id) ON DELETE CASCADE;
ALTER TABLE history ADD CONSTRAINT FK_27BA704B3DE7B8B2 FOREIGN KEY (vote_remark_id) REFERENCES vote_remark (id) ON DELETE CASCADE;
ALTER TABLE history ADD CONSTRAINT FK_27BA704B7FAB7F77 FOREIGN KEY (remark_id) REFERENCES remark (id) ON DELETE CASCADE;

CREATE UNIQUE INDEX UNIQ_8D93D649C05FB297 ON user (confirmation_token);
CREATE UNIQUE INDEX UNIQ_DEBC775E237E06 ON emotion (name);

ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL, CHANGE username_canonical username_canonical VARCHAR(180) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE email_canonical email_canonical VARCHAR(180) NOT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE confirmed confirmed TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL;
