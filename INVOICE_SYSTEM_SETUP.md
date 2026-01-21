# Invoice System Setup Instructions

## Overview
This document describes the invoice system that has been implemented in the application. The system automatically generates invoices for every order and provides functionality for viewing and downloading invoices.

## Features Implemented

### 1. Invoice Database Table
- Created `invoices` table to store invoice information
- Table includes: invoice_number, order_id, user_id, invoice_date, subtotal, delivery_charge, discount_amount, total_amount, and status
- Run the SQL file: `create_invoices_table.sql` to create the table

### 2. Auto-Generate Invoice on Order Creation
- Invoices are automatically created when:
  - A COD (Cash on Delivery) order is placed
  - A Razorpay payment is successfully verified
- The invoice is created with a unique invoice number format: `INV-YYYYMMDD-UNIQUEID`

### 3. Invoice Model
- Created `Invoice_model.php` with methods:
  - `create_invoice()` - Creates a new invoice
  - `get_invoice_by_order_id()` - Gets invoice by order ID
  - `get_invoice_by_id()` - Gets invoice by invoice ID
  - `get_all_invoices()` - Gets all invoices with order and user details
  - `get_invoices_by_user_id()` - Gets invoices for a specific user
  - `invoice_exists_for_order()` - Checks if invoice exists for an order

### 4. Download Invoice Button
- Added download invoice button in the order detail page (`order_detail_page.php`)
- Button appears in the order summary section
- Button is only visible if an invoice exists for the order
- Clicking the button opens the invoice in a new window optimized for printing

### 5. Invoice View/Download Functionality
- Route: `invoice/download/{order_id}`
- Controller method: `Main::invoice_download()`
- View: `invoice_download.php` - HTML view optimized for printing
- Invoice includes:
  - Company logo (from settings)
  - Invoice number and date
  - Customer information
  - Shipping address
  - Order details
  - Product list with quantities and prices
  - Price breakdown (subtotal, delivery charges, discounts, total)
  - Automatically opens print dialog when loaded

### 6. Admin Invoice Page
- Route: `admin/invoices`
- Controller method: `Admin::invoices()`
- View: `admin/invoices.php`
- Features:
  - Lists all invoices with order and customer information
  - Shows invoice number, order number, customer name, invoice date, total amount, and payment mode
  - View button to see invoice details
  - DataTable for easy sorting and searching

### 7. Admin Invoice View
- Route: `admin/invoice/view/{invoice_id}`
- Controller method: `Admin::admin_invoice_view()`
- Allows admin to view any invoice in the system

### 8. Logo Upload System
- Added logo upload section in admin settings page
- Route: `admin/upload_logo`
- Controller method: `Admin::upload_logo()`
- Features:
  - Upload logo image (JPG, PNG, GIF, max 2MB)
  - Logo is stored in `upload/logo/` directory
  - Logo filename is stored in settings table with key `site_logo`
  - Old logo is automatically deleted when new one is uploaded

### 9. Dynamic Logo Fetching
- Replaced all hardcoded logos throughout the application with dynamic logo fetching
- Updated files:
  - `application/views/common/header.php`
  - `application/views/common/header1.php`
  - `application/views/admin/common/sidebar.php`
  - `application/views/admin/login.php`
  - `application/views/common/preload.php`
  - `application/views/admin/common/header.php`
  - `application/views/login.php`
  - `application/views/about_us.php`
  - Invoice views
- All logo references now fetch from settings table
- Falls back to default logo if no logo is uploaded

## Database Setup

1. Run the SQL file to create the invoices table:
```sql
-- File: create_invoices_table.sql
```

2. The settings table should already exist (created for Razorpay settings). If not, run:
```sql
-- File: create_settings_table.sql
```

## File Structure

### New Files Created:
- `create_invoices_table.sql` - Database table creation script
- `application/models/Invoice_model.php` - Invoice model
- `application/views/invoice_download.php` - Invoice view/download page
- `application/views/admin/invoices.php` - Admin invoice list page

### Modified Files:
- `application/controllers/Orders.php` - Added auto-invoice generation
- `application/controllers/Main.php` - Added invoice view/download methods
- `application/controllers/Admin.php` - Added invoice list and logo upload methods
- `application/views/admin/settings.php` - Added logo upload section
- `application/views/order_detail_page.php` - Added download invoice button
- `application/views/admin/common/sidebar.php` - Added invoices menu item
- `application/config/routes.php` - Added invoice routes
- Multiple view files - Replaced hardcoded logos with dynamic fetching

## Usage

### For Users:
1. After placing an order, go to order details page
2. Click "Download Invoice" button in the order summary section
3. Invoice will open in a new window with print dialog
4. Print or save as PDF from browser

### For Admins:
1. Go to Admin Dashboard > Sales > Invoices
2. View all invoices in the system
3. Click "View" button to see invoice details
4. To upload/change logo: Go to Settings > Site Logo Settings
5. Upload new logo - it will be updated throughout the application

## Notes

- Invoices are automatically generated when orders are created
- Invoice numbers are unique and follow the format: `INV-YYYYMMDD-UNIQUEID`
- Logo upload supports JPG, PNG, GIF formats with max size of 2MB
- Default logo paths are used as fallback if no logo is uploaded
- Invoice view is optimized for printing and can be saved as PDF from browser
