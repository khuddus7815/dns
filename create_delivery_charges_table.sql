-- Create delivery_charges table if it doesn't exist
CREATE TABLE IF NOT EXISTS `delivery_charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- If table exists but columns are missing, add them
-- Note: Run these ALTER statements only if the columns don't exist

-- ALTER TABLE `delivery_charges` ADD COLUMN IF NOT EXISTS `name` varchar(255) NOT NULL AFTER `id`;
-- ALTER TABLE `delivery_charges` ADD COLUMN IF NOT EXISTS `amount` decimal(10,2) NOT NULL DEFAULT 0.00 AFTER `name`;
-- ALTER TABLE `delivery_charges` ADD COLUMN IF NOT EXISTS `status` tinyint(1) DEFAULT 1 AFTER `amount`;
-- ALTER TABLE `delivery_charges` ADD COLUMN IF NOT EXISTS `created_at` datetime DEFAULT NULL AFTER `status`;
-- ALTER TABLE `delivery_charges` ADD COLUMN IF NOT EXISTS `updated_at` datetime DEFAULT NULL AFTER `created_at`;
