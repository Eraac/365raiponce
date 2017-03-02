-- clean when api v1 will not more exist
ALTER TABLE `user`
    DROP locked,
    DROP expired,
    DROP expires_at,
    DROP credentials_expired,
    DROP credentials_expire_at;

ALTER TABLE `theme` DROP slug;
ALTER TABLE `emotion` DROP slug;

DROP TABLE sithous_anti_spam;
DROP TABLE sithous_anti_spam_type;
