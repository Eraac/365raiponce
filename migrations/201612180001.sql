-- clean when api v1 will not more exist
ALTER TABLE `user`
  DROP expired,
  DROP credentials_expired;

ALTER TABLE `theme` DROP slug;
ALTER TABLE `emotion` DROP slug;

DROP TABLE sithous_anti_spam;
DROP TABLE sithous_anti_spam_type;
