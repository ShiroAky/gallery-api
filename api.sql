create table if not exists `wallpapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `wall` text NOT NULL,
  `wall_name` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` current_timestamp() NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;