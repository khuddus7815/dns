# Wallet System Setup Instructions

## Overview
A comprehensive wallet system has been integrated into your application, allowing users to:
- Maintain a wallet balance
- Top-up wallet using Razorpay (card/UPI/PhonePe)
- Pay for orders using wallet balance
- View transaction history
- Track wallet statistics

## Setup Steps

### 1. Database Setup
Run the SQL file to create necessary tables and columns:

```bash
# Import the SQL file via phpMyAdmin or MySQL command line
mysql -u your_username -p your_database < create_wallet_tables.sql
```

Or manually execute the SQL commands in `create_wallet_tables.sql`:
- Adds `wallet_balance` column to `users` table
- Creates `wallet_transactions` table for transaction history
- Initializes wallet balance for existing users

### 2. Files Created/Modified

#### New Files:
1. **Models:**
   - `application/models/Wallet_model.php` - Core wallet operations

2. **SQL:**
   - `create_wallet_tables.sql` - Database setup script

3. **Documentation:**
   - `WALLET_SYSTEM_SETUP.md` - This file

#### Modified Files:
1. **Controllers:**
   - `application/controllers/Main.php` - Added wallet top-up methods
   - `application/controllers/Orders.php` - Added wallet payment support

2. **Views:**
   - `application/views/my_wallet.php` - Complete wallet interface
   - `application/views/profile_partials/wallet_section.php` - Wallet section for SPA profile
   - `application/views/checkout.php` - Added wallet payment option

## Features Implemented

### 1. Wallet Top-up System
- **Minimum Amount:** ₹10
- **Maximum Amount:** ₹50,000
- **Payment Methods:** 
  - Razorpay (Card, UPI, PhonePe, Net Banking)
  - Quick amount buttons (₹100, ₹500, ₹1000, ₹2000)
- **Security:** Signature verification for all transactions
- **Real-time Balance Update:** Instant balance refresh after successful payment

### 2. Wallet Payment at Checkout
- Pay for orders using wallet balance
- Real-time balance validation
- Insufficient balance warning with "Add Money" option
- Confirmation dialog before payment
- Automatic wallet deduction after order placement

### 3. Transaction History
- Complete transaction log with:
  - Date and time
  - Transaction type (Credit/Debit)
  - Amount
  - Balance after transaction
  - Payment method
  - Description
- Statistics dashboard showing:
  - Total credited amount
  - Total spent amount
  - Total transaction count

### 4. Notifications Integration
- Wallet credit notifications
- Order placed notifications (wallet payment)
- Payment success confirmations

## API Endpoints

### Wallet Top-up
```
POST /main/create_wallet_topup_order
Parameters: amount (required, min: 10, max: 50000)
Returns: Razorpay order details
```

```
POST /main/verify_wallet_topup
Parameters: 
  - razorpay_order_id
  - razorpay_payment_id
  - razorpay_signature
  - transaction_id
Returns: Success status and new balance
```

### Wallet Payment
```
POST /Orders
Parameters:
  - selected_address_id
  - delivery_id
  - payment_method: 'wallet'
Returns: Order success response
```

## Usage Guide

### For Users:

#### Adding Money to Wallet:
1. Go to "My Wallet" from profile menu
2. Click "Add Money" button
3. Enter amount (₹10 - ₹50,000)
4. Or use quick select buttons
5. Click "Proceed to Payment"
6. Complete payment via Razorpay
7. Amount will be credited instantly

#### Paying with Wallet at Checkout:
1. Add products to cart
2. Proceed to checkout
3. Select delivery address
4. Choose delivery method
5. Select "Pay via Wallet" option
6. Click "Pay from Wallet"
7. Confirm payment
8. Order will be placed and amount deducted

#### Viewing Transaction History:
1. Go to "My Wallet"
2. Scroll to "Transaction History" section
3. View all transactions with details
4. Check wallet statistics at the top

### For Administrators:

#### Monitoring Wallet Transactions:
Query the `wallet_transactions` table:
```sql
SELECT * FROM wallet_transactions 
WHERE user_id = ? 
ORDER BY created_at DESC;
```

#### Checking User Balances:
```sql
SELECT id, username, email, wallet_balance 
FROM users 
WHERE wallet_balance > 0 
ORDER BY wallet_balance DESC;
```

## Security Features

1. **Balance Validation:** Server-side validation before deducting wallet balance
2. **Transaction Atomicity:** Database transactions ensure data consistency
3. **Payment Verification:** Razorpay signature verification for all top-ups
4. **Session Security:** User authentication required for all wallet operations
5. **SQL Injection Prevention:** Prepared statements used throughout
6. **CSRF Protection:** Form tokens and secure session handling

## Testing Checklist

- [ ] Database tables created successfully
- [ ] Wallet balance displays correctly
- [ ] Top-up with different amounts works
- [ ] Razorpay payment integration functional
- [ ] Wallet payment at checkout works
- [ ] Insufficient balance warning appears
- [ ] Transaction history displays correctly
- [ ] Notifications are created properly
- [ ] Balance updates in real-time
- [ ] Multiple concurrent transactions handled

## Payment Gateway Configuration

### Razorpay Setup:
1. Go to Admin Dashboard > Settings
2. Scroll to "Razorpay Payment Gateway Settings"
3. Enter your Razorpay Key ID
4. Enter your Razorpay Key Secret
5. Click "Save Razorpay Settings"

**Test Mode Credentials:**
- Test cards: 4111 1111 1111 1111
- CVV: Any 3 digits
- Expiry: Any future date

**Live Mode:**
- Use actual Razorpay credentials from dashboard
- Complete KYC verification
- Set up webhooks for payment notifications

## Troubleshooting

### Issue: Wallet balance not updating
**Solution:** Check if `wallet_balance` column exists in `users` table. Run the migration SQL if needed.

### Issue: Top-up payment fails
**Solution:** 
1. Verify Razorpay credentials in admin settings
2. Check PHP error logs for API errors
3. Ensure CURL is enabled in PHP
4. Check SSL certificate configuration

### Issue: Checkout wallet option disabled
**Solution:** 
1. Check if user has wallet balance > 0
2. Verify `Wallet_model` is loaded correctly
3. Check for JavaScript console errors

### Issue: Transaction not recorded
**Solution:**
1. Check `wallet_transactions` table exists
2. Verify foreign key constraints
3. Check application logs for errors

## Support

For issues or questions:
1. Check application logs: `application/logs/`
2. Check browser console for JavaScript errors
3. Verify database table structure
4. Ensure all files are uploaded correctly

## Future Enhancements

Potential features to add:
- Wallet-to-wallet transfer
- Referral bonus system
- Cashback on orders
- Wallet statements export (PDF/Excel)
- Auto-debit for recurring orders
- Wallet limit increase requests
- Multiple currency support
- Bank account withdrawal

## Version History

**Version 1.0** (January 2026)
- Initial wallet system implementation
- Razorpay integration for top-ups
- Wallet payment at checkout
- Transaction history and statistics
- Notification integration
