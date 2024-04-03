CREATE DATABASE blog;
USE blog;

CREATE TABLE post
(
    `id`     INT          NOT NULL AUTO_INCREMENT,
    `title`  VARCHAR(255) NOT NULL,
    `subtitle`   VARCHAR(255) NOT NULL,
    `content` TEXT DEFAULT NULL,
    `autor`      VARCHAR(255) NOT NULL,
    `autor_url`  VARCHAR(255)   NOT NULL,
    `publish_date`       VARCHAR(255) NOT NULL,
    `image_url`       VARCHAR(255) DEFAULT NULL,
    `featured` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`)
);

