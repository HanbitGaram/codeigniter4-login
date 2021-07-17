# MySQLi / MariaDB Query
## Query
```mysql
CREATE TABLE `members` (
    `id` INT(8) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(120) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
    `password` VARCHAR(80) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
    `created_at` DATETIME NULL DEFAULT NULL,
    `updated_at` DATETIME NULL DEFAULT NULL,
    `deleted_at` DATETIME NULL DEFAULT NULL,
    PRIMARY KEY (`id`) USING BTREE,
    UNIQUE INDEX `email` (`email`) USING BTREE
)
    COLLATE='utf8mb4_general_ci'
    ENGINE=InnoDB
    AUTO_INCREMENT=1
;
```

```mysql
CREATE TABLE `tokens` (
	`id` INT(8) NOT NULL AUTO_INCREMENT,
	`token` VARCHAR(32) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`user_id` INT(8) NULL DEFAULT NULL,
	`exp` INT(24) NULL DEFAULT NULL,
	`created_at` DATETIME NULL DEFAULT NULL,
	`updated_at` DATETIME NULL DEFAULT NULL,
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `token` (`token`) USING BTREE,
	INDEX `user_id` (`user_id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
```