# Database Fix Instructions for Razorpay Integration

## Error: Database Error

If you're seeing a database error, it means the required database tables and columns are missing. Follow these steps to fix it:

## Quick Fix (Recommended)

1. Open phpMyAdmin or your MySQL client
2. Select your database (usually `dns`)
3. Go to the SQL tab
4. Copy and paste the contents of `fix_razorpay_database_simple.sql`
5. Click "Go" to execute

**Note:** If you see "Duplicate column name" errors, that's OK - it means the columns already exist. Just continue.

## Alternative: Smart Fix

If you prefer a script that checks before adding (no errors), use `fix_razorpay_database.sql` instead.

## What Gets Created/Added

### 1. Settings Table
Creates a `settings` table to store Razorpay API keys:
- `id` - Primary key
- `setting_key` - Unique key (e.g., 'razorpay_key_id')
- `setting_value` - The actual value
- `created_at` / `updated_at` - Timestamps

### 2. Orders Table Columns
Adds three new columns to the `orders` table:
- `razorpay_order_id` - Stores Razorpay's order ID
- `razorpay_payment_id` - Stores Razorpay's payment ID
- `razorpay_signature` - Stores payment verification signature

### 3. Index
Adds an index on `razorpay_order_id` for faster lookups.

## Manual SQL (If Scripts Don't Work)

If the scripts don't work, run these SQL commands one by one:

```sql
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

-- 2. Add columns (ignore errors if they exist)
ALTER TABLE `orders` ADD COLUMN `razorpay_order_id` VARCHAR(255) DEFAULT NULL;
ALTER TABLE `orders` ADD COLUMN `razorpay_payment_id` VARCHAR(255) DEFAULT NULL;
ALTER TABLE `orders` ADD COLUMN `razorpay_signature` VARCHAR(255) DEFAULT NULL;

-- 3. Add index
ALTER TABLE `orders` ADD INDEX `idx_razorpay_order_id` (`razorpay_order_id`);
```

## Verification

After running the SQL, verify it worked:

```sql
-- Check if settings table exists
SHOW TABLES LIKE 'settings';

-- Check if columns exist in orders table
SHOW COLUMNS FROM `orders` LIKE 'razorpay%';
```

You should see:
- `settings` table exists
- Three columns: `razorpay_order_id`, `razorpay_payment_id`, `razorpay_signature`

## After Fixing

1. Refresh your checkout page
2. The Razorpay payment option should now work
3. If Razorpay is configured in admin settings, you'll see the "Pay Online" option

## Still Getting Errors?

1. Check your database connection in `application/config/database.php`
2. Make sure you have proper database permissions
3. Check CodeIgniter logs in `application/logs/` for detailed error messages
4. Verify the database name is correct
