-- Add Razorpay fields to orders table
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `razorpay_order_id` VARCHAR(255) DEFAULT NULL AFTER `order_number`,
ADD COLUMN IF NOT EXISTS `razorpay_payment_id` VARCHAR(255) DEFAULT NULL AFTER `razorpay_order_id`,
ADD COLUMN IF NOT EXISTS `razorpay_signature` VARCHAR(255) DEFAULT NULL AFTER `razorpay_payment_id`;

-- Add index for faster lookups
ALTER TABLE `orders` 
ADD INDEX IF NOT EXISTS `idx_razorpay_order_id` (`razorpay_order_id`);
