-- Add cancelled_by column to orders table
-- This column tracks who cancelled the order: 'user' or 'admin'

ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `cancelled_by` ENUM('user', 'admin') DEFAULT NULL COMMENT 'Who cancelled the order';

-- Add index for faster queries
ALTER TABLE `orders` 
ADD INDEX IF NOT EXISTS `idx_cancelled_by` (`cancelled_by`);

-- Verify the column was added
DESCRIBE `orders`;
