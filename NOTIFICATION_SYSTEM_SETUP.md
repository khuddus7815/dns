# Notification System Setup Instructions

## Database Setup

1. Run the SQL script to create the notifications table:
   ```sql
   -- Run: create_notifications_table.sql
   ```

## Features Implemented

### 1. Notification Icon in Header
- Location: Before cart icon, after search bar
- Shows unread count badge
- Hover to see recent notifications dropdown

### 2. Notification Dropdown
- Shows 5 most recent notifications
- Color-coded icons by type:
  - 🛒 Green: Order Placed
  - 💳 Blue: Payment Success
  - 🚚 Orange: Order Shipped
  - ✅ Purple: Order Delivered
- "Mark all as read" button
- "View All Notifications" link

### 3. Notifications Page
- Full list of all notifications
- Click notification to view order details
- Mark all as read functionality
- Deep linking to order details

### 4. Automatic Notifications
Notifications are automatically created for:
- **Order Placed**: When user places an order (COD or Razorpay)
- **Payment Success**: When Razorpay payment is successful
- **Order Shipped**: When admin changes order status to "Shipped" (status 3)
- **Order Delivered**: When admin changes order status to "Delivered" (status 4)

### 5. Deep Linking
- Clicking a notification with an order ID navigates to order details page
- Order details page: `main/order_detail/{order_id}`

## Files Created/Modified

### New Files:
1. `create_notifications_table.sql` - Database table structure
2. `application/models/Notifications_model.php` - Model for notification operations
3. `application/views/notifications.php` - Notifications page view
4. `application/controllers/Api.php` - API endpoints for notifications

### Modified Files:
1. `application/views/common/header.php` - Added notification icon and dropdown
2. `application/views/common/header1.php` - Added notification icon and dropdown
3. `application/controllers/Main.php` - Added notifications page method
4. `application/controllers/Orders.php` - Added notification creation on order placement and payment
5. `application/controllers/Admin.php` - Added notification creation on status change
6. `application/config/routes.php` - Added notifications route

## API Endpoints

- `GET api/notifications_get_recent` - Get recent notifications for dropdown
- `POST api/notifications_mark_read` - Mark single notification as read
- `POST api/notifications_mark_all_read` - Mark all notifications as read
- `GET main/get_all_notifications` - Get all notifications for page

## How It Works

1. **Notification Creation**: Automatically triggered when:
   - Order is placed
   - Payment is successful
   - Order status changes to shipped/delivered

2. **Notification Display**: 
   - Badge shows unread count
   - Dropdown shows on hover
   - Auto-refreshes every 30 seconds

3. **Notification Interaction**:
   - Click notification → Navigate to order details
   - Mark as read → Updates database and UI
   - View All → Opens notifications page

## Testing

1. Place an order → Should create "Order Placed" notification
2. Complete Razorpay payment → Should create "Payment Success" and "Order Placed" notifications
3. Admin changes order to "Shipped" → Should create "Order Shipped" notification
4. Admin changes order to "Delivered" → Should create "Order Delivered" notification
5. Click notification → Should navigate to order details page
