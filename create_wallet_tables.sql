-- =====================================================
-- Wallet System Database Setup
-- =====================================================

-- 1. Add wallet_balance column to users table
ALTER TABLE `users` 
ADD COLUMN IF NOT EXISTS `wallet_balance` DECIMAL(10,2) DEFAULT 0.00 COMMENT 'User wallet balance';

-- 2. Create wallet_transactions table
CREATE TABLE IF NOT EXISTS `wallet_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_type` enum('credit','debit') NOT NULL COMMENT 'credit = money added, debit = money spent',
  `amount` decimal(10,2) NOT NULL,
  `balance_before` decimal(10,2) NOT NULL,
  `balance_after` decimal(10,2) NOT NULL,
  `transaction_source` varchar(50) NOT NULL COMMENT 'topup, order, refund, etc.',
  `reference_id` varchar(255) DEFAULT NULL COMMENT 'order_id or payment_id',
  `payment_method` varchar(50) DEFAULT NULL COMMENT 'razorpay, phonepe, upi, card, etc.',
  `payment_id` varchar(255) DEFAULT NULL COMMENT 'Payment gateway transaction ID',
  `payment_status` enum('pending','success','failed') DEFAULT 'success',
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_transaction_type` (`transaction_type`),
  KEY `idx_created_at` (`created_at`),
  CONSTRAINT `fk_wallet_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Wallet transaction history';

-- 3. Create index on users.wallet_balance for faster queries
ALTER TABLE `users` 
ADD INDEX IF NOT EXISTS `idx_wallet_balance` (`wallet_balance`);

-- 4. Initialize wallet balance for existing users (set to 0.00 if NULL)
UPDATE `users` 
SET `wallet_balance` = 0.00 
WHERE `wallet_balance` IS NULL;
