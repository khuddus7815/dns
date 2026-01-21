-- Add namecake column to order_product table
ALTER TABLE `order_product`
ADD COLUMN IF NOT EXISTS `namecake` VARCHAR(255) DEFAULT NULL COMMENT 'Name on cake if applicable';
