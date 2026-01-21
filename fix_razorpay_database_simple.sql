-- Simple Razorpay Database Setup (Run this if the above doesn't work)
-- This will attempt to add columns and will show errors if they already exist (which is OK)

-- 1. Create settings table
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Add Razorpay columns to orders table
-- If you get "Duplicate column name" error, it means columns already exist - that's OK, just continue

ALTER TABLE `orders` 
ADD COLUMN `razorpay_order_id` VARCHAR(255) DEFAULT NULL;

ALTER TABLE `orders` 
ADD COLUMN `razorpay_payment_id` VARCHAR(255) DEFAULT NULL;

ALTER TABLE `orders` 
ADD COLUMN `razorpay_signature` VARCHAR(255) DEFAULT NULL;

-- 3. Add index (ignore error if it already exists)
ALTER TABLE `orders` 
ADD INDEX `idx_razorpay_order_id` (`razorpay_order_id`);
