# Order Cancellation Features Implementation

## Overview
This document describes the implementation of order cancellation features including notifications, visual indicators, and refund information display.

## Database Changes

### 1. Add `cancelled_by` Column
Run the SQL script to add the `cancelled_by` column to the orders table:
```sql
-- Run: add_cancelled_by_column.sql
```

This column tracks who cancelled the order:
- `'admin'` - Order was cancelled by admin
- `'user'` - Order was cancelled by user
- `NULL` - Order is not cancelled

## Features Implemented

### 1. Admin Cancellation Notification
- **Location**: `application/controllers/Admin.php` - `update_order_status()` method
- **Behavior**: 
  - When admin cancels an order (status = 0), the system:
    - Sets `cancelled_by = 'admin'` in the orders table
    - Sends a notification to the user with message: "Your order #XXX has been cancelled by admin. If paid, the amount will be credited to your wallet."
    - Standardizes cancelled status to 0 (previously supported both 0 and 5)

### 2. Red Gradient Header for Cancelled Orders
- **Location**: `application/views/order_detail_page.php`
- **Behavior**:
  - Order detail page header changes from golden gradient to red gradient when order is cancelled
  - CSS class `.order-detail-header.cancelled` applies red gradient background

### 3. Status Display Updates
- **Location**: `application/views/order_detail_page.php`
- **Behavior**:
  - Shows "Cancelled" if cancelled by user
  - Shows "Order Cancelled by Admin" if cancelled by admin
  - Status badge uses red styling for cancelled orders

### 4. Refund Information Display
- **Location**: `application/views/order_detail_page.php`
- **Behavior**:
  - If refund has been processed (`refund_status = 'completed'`):
    - Shows green text below status: "Amount Refunded: ₹XXX.XX credited to wallet"
    - Displays refund amount from `refund_amount` column
  - Alert message also updates to show refund information

### 5. Order Tracking
- **Location**: `application/views/order_detail_page.php`
- **Behavior**:
  - Order tracking steps are hidden for cancelled orders
  - Only shows tracking for active orders

## Status Standardization

The system now standardizes cancelled orders to status `0`:
- Admin dropdown uses status `0` for cancelled
- `Refund_model` expects status `0` for cancelled
- `Admin.php` now converts status `5` to `0` for compatibility
- Order detail page supports both `0` and `5` for backward compatibility

## Files Modified

1. **application/models/Order_model.php**
   - Updated `update_status()` method to accept `cancelled_by` parameter

2. **application/controllers/Admin.php**
   - Updated `update_order_status()` to:
     - Set `cancelled_by = 'admin'` when cancelling
     - Standardize status to `0` for cancelled
     - Update notification message to include "by admin"

3. **application/views/order_detail_page.php**
   - Added red gradient CSS for cancelled orders
   - Updated header to use red gradient when cancelled
   - Updated status display logic to show different messages
   - Added refund information display
   - Hidden order tracking for cancelled orders

4. **add_cancelled_by_column.sql** (New)
   - SQL script to add `cancelled_by` column

## Future Enhancements

If you add user cancellation functionality:
1. Set `cancelled_by = 'user'` when user cancels their order
2. Send appropriate notification to user
3. The order detail page will automatically show "Cancelled" instead of "Order Cancelled by Admin"

## Testing Checklist

- [ ] Run `add_cancelled_by_column.sql` to add the database column
- [ ] Test admin cancelling an order:
  - [ ] Verify notification is sent
  - [ ] Verify `cancelled_by = 'admin'` in database
  - [ ] Verify red gradient header on order detail page
  - [ ] Verify "Order Cancelled by Admin" status text
- [ ] Test refund processing:
  - [ ] Process refund for cancelled order
  - [ ] Verify refund information displays on order detail page
  - [ ] Verify refund notification is sent
- [ ] Test user cancellation (if implemented):
  - [ ] Verify `cancelled_by = 'user'` in database
  - [ ] Verify "Cancelled" status text (not "by admin")
