CREATE TABLE post
(
   `id`      INT NOT NULL AUTO_INCREMENT,
   `title`      VARCHAR(255) NOT NULL,
   `subtitle`   VARCHAR(255) NOT NULL,
   `content`    TEXT NOT NULL,
   `author`     VARCHAR(255) NOT NULL,
   `author_img` VARCHAR(255) NOT NULL,
   `publish_date` DATE,
   `img` VARCHAR(255),
   `featured` TINYINT(1) DEFAULT 0,
   PRIMARY KEY (`id`)
) ENGINE = InnoDB
CHARACTER SET = utf8mb4
COLLATE utf8mb4_unicode_ci
post