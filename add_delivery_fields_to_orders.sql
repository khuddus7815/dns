-- Add delivery and discount fields to orders table if they don't exist
-- Run this in phpMyAdmin or MySQL client

-- Add delivery_charge column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `delivery_charge` DECIMAL(10,2) DEFAULT 0.00;

-- Add delivery_method column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `delivery_method` VARCHAR(255) DEFAULT NULL;

-- Add discount_amount column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `discount_amount` DECIMAL(10,2) DEFAULT 0.00;

-- Add coupon_code column
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `coupon_code` VARCHAR(50) DEFAULT NULL;
