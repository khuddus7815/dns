-- Add delivery and discount fields to orders table
-- Run this in phpMyAdmin - ignore errors if columns already exist

-- Add delivery_charge column
ALTER TABLE `orders` 
ADD COLUMN `delivery_charge` DECIMAL(10,2) DEFAULT 0.00;

-- Add delivery_method column  
ALTER TABLE `orders` 
ADD COLUMN `delivery_method` VARCHAR(255) DEFAULT NULL;

-- Add discount_amount column
ALTER TABLE `orders` 
ADD COLUMN `discount_amount` DECIMAL(10,2) DEFAULT 0.00;

-- Add coupon_code column
ALTER TABLE `orders` 
ADD COLUMN `coupon_code` VARCHAR(50) DEFAULT NULL;
