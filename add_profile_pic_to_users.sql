-- Add profile_pic column to users table
-- This column stores the profile picture filename for admin users
-- Run this SQL script to fix the "Unknown column 'profile_pic'" error

-- Check if column exists before adding (MySQL doesn't support IF NOT EXISTS for ALTER TABLE)
-- If you get an error that the column already exists, you can ignore it

ALTER TABLE `users` 
ADD COLUMN `profile_pic` VARCHAR(255) DEFAULT NULL COMMENT 'Profile picture filename';

-- Add index for faster queries (optional but recommended)
-- If index already exists, you'll get an error - you can ignore it
ALTER TABLE `users` 
ADD INDEX `idx_profile_pic` (`profile_pic`);

-- Verify the column was added
DESCRIBE `users`;

-- Alternative: If you want to check first (for MySQL 5.7+), you can use this approach:
-- SET @dbname = DATABASE();
-- SET @tablename = 'users';
-- SET @columnname = 'profile_pic';
-- SET @preparedStatement = (SELECT IF(
--   (
--     SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS
--     WHERE
--       (table_name = @tablename)
--       AND (table_schema = @dbname)
--       AND (column_name = @columnname)
--   ) > 0,
--   "SELECT 'Column already exists.'",
--   CONCAT("ALTER TABLE ", @tablename, " ADD COLUMN ", @columnname, " VARCHAR(255) DEFAULT NULL COMMENT 'Profile picture filename'")
-- ));
-- PREPARE alterIfNotExists FROM @preparedStatement;
-- EXECUTE alterIfNotExists;
-- DEALLOCATE PREPARE alterIfNotExists;
