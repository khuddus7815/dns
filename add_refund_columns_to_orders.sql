-- Add refund-related columns to orders table
-- Run this SQL script to enable refund management functionality

-- Add refund status column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `refund_status` ENUM('pending', 'completed', 'failed') DEFAULT NULL COMMENT 'Refund processing status';

-- Add refund amount column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `refund_amount` DECIMAL(10,2) DEFAULT NULL COMMENT 'Amount refunded to wallet';

-- Add refund date column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `refund_date` DATETIME DEFAULT NULL COMMENT 'Date when refund was processed';

-- Add refund reason column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `refund_reason` VARCHAR(500) DEFAULT NULL COMMENT 'Reason for refund';

-- Add index for refund status for faster queries
ALTER TABLE `orders` 
ADD INDEX IF NOT EXISTS `idx_refund_status` (`refund_status`);

-- Add index for cancelled orders
ALTER TABLE `orders` 
ADD INDEX IF NOT EXISTS `idx_status` (`status`);

-- Verify the columns were added
DESCRIBE `orders`;
