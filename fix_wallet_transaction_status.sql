-- Fix Wallet Transaction Status
-- This script updates any wallet transactions that have NULL or incorrect payment_status
-- Run this to ensure all completed transactions are properly marked

-- First, check what statuses exist
SELECT DISTINCT payment_status, COUNT(*) as count 
FROM wallet_transactions 
GROUP BY payment_status;

-- Update NULL payment_status to 'success' for transactions that should be successful
-- (transactions that were created before the payment_status field was properly implemented)
UPDATE wallet_transactions 
SET payment_status = 'success' 
WHERE payment_status IS NULL 
AND created_at IS NOT NULL;

-- Update any empty string payment_status to 'success'
UPDATE wallet_transactions 
SET payment_status = 'success' 
WHERE payment_status = '';

-- Verify the fix
SELECT 
    user_id,
    transaction_type,
    SUM(CASE WHEN payment_status IN ('success', 'completed') THEN amount ELSE 0 END) as total_amount,
    COUNT(*) as transaction_count
FROM wallet_transactions
GROUP BY user_id, transaction_type
ORDER BY user_id, transaction_type;

-- Show current balance vs calculated balance for each user
SELECT 
    u.id as user_id,
    u.wallet_balance as current_balance,
    COALESCE(credits.total, 0) - COALESCE(debits.total, 0) as calculated_balance,
    COALESCE(credits.total, 0) as total_credited,
    COALESCE(debits.total, 0) as total_debited
FROM users u
LEFT JOIN (
    SELECT user_id, SUM(amount) as total 
    FROM wallet_transactions 
    WHERE transaction_type = 'credit' 
    AND payment_status IN ('success', 'completed')
    GROUP BY user_id
) credits ON u.id = credits.user_id
LEFT JOIN (
    SELECT user_id, SUM(amount) as total 
    FROM wallet_transactions 
    WHERE transaction_type = 'debit' 
    AND payment_status IN ('success', 'completed')
    GROUP BY user_id
) debits ON u.id = debits.user_id
WHERE u.wallet_balance > 0 OR credits.total > 0 OR debits.total > 0;
