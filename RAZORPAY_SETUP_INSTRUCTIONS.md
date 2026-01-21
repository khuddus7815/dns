# Razorpay Payment Integration Setup Instructions

## Overview
Razorpay payment gateway has been integrated into your application. This allows customers to pay online using credit/debit cards, UPI, net banking, and wallets.

## Setup Steps

### 1. Database Setup
Run the following SQL files to create necessary tables and columns:

```sql
-- Create settings table for storing API keys
SOURCE create_settings_table.sql;

-- Add Razorpay fields to orders table
SOURCE add_razorpay_fields_to_orders.sql;
```

Or manually run:
```sql
-- Create settings table
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Add Razorpay fields to orders table
ALTER TABLE `orders` 
ADD COLUMN IF NOT EXISTS `razorpay_order_id` VARCHAR(255) DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `razorpay_payment_id` VARCHAR(255) DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `razorpay_signature` VARCHAR(255) DEFAULT NULL;

ALTER TABLE `orders` 
ADD INDEX IF NOT EXISTS `idx_razorpay_order_id` (`razorpay_order_id`);
```

### 2. Get Razorpay API Credentials

1. Go to [Razorpay Dashboard](https://dashboard.razorpay.com/)
2. Sign up or log in to your account
3. Navigate to **Settings > API Keys**
4. Generate or copy your **Key ID** and **Key Secret**
   - For testing, use **Test Mode** keys
   - For production, use **Live Mode** keys

### 3. Configure Razorpay in Admin Panel

1. Log in to your admin dashboard
2. Navigate to **Settings** (from the sidebar or menu)
3. Scroll down to the **Razorpay Payment Gateway Settings** section
4. Enter your **Razorpay Key ID** (e.g., `rzp_test_...` or `rzp_live_...`)
5. Enter your **Razorpay Key Secret**
6. Click **Save Razorpay Settings**

### 4. Test the Integration

1. Go to the checkout page
2. Select a delivery address
3. Choose delivery method
4. In the payment section, select **Pay Online (Razorpay)**
5. Click **Pay Now**
6. Complete the payment using Razorpay test credentials:
   - Card Number: `4111 1111 1111 1111`
   - CVV: Any 3 digits
   - Expiry: Any future date
   - Name: Any name

## Features

- ✅ Admin can configure Razorpay API keys from dashboard
- ✅ Razorpay payment option appears in checkout only when configured
- ✅ Secure payment processing with signature verification
- ✅ Order status automatically updates after successful payment
- ✅ Cart is cleared after successful payment
- ✅ Coupon codes work with Razorpay payments
- ✅ Delivery charges are included in payment amount

## Payment Flow

1. Customer selects Razorpay payment method
2. System creates order in database (status: Payment Pending)
3. System creates Razorpay order via API
4. Customer completes payment on Razorpay checkout
5. System verifies payment signature
6. System verifies payment status with Razorpay API
7. Order status updated to "Paid"
8. Cart cleared and customer redirected to success page

## Order Status Codes

- `0` = Payment Pending (Razorpay order created, payment not completed)
- `1` = Pending (COD orders)
- `2` = Paid (Payment successful)

## Troubleshooting

### Razorpay option not showing in checkout
- Check if API keys are saved in admin settings
- Verify both Key ID and Key Secret are entered
- Check browser console for JavaScript errors

### Payment fails
- Verify API keys are correct
- Check if you're using Test keys in Test mode
- Ensure order amount is in valid range (minimum ₹1)
- Check Razorpay dashboard for error logs

### Payment verification fails
- Check server logs for signature verification errors
- Ensure Key Secret is correct
- Verify payment data is being sent correctly

## Security Notes

- Never expose your Razorpay Key Secret in frontend code
- Always verify payment signature on server side
- Use HTTPS in production
- Keep API keys secure and rotate them periodically
- Monitor Razorpay dashboard for suspicious activities

## Support

For Razorpay API issues, refer to:
- [Razorpay Documentation](https://razorpay.com/docs/)
- [Razorpay Support](https://razorpay.com/support/)
