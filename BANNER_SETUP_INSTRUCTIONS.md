# Banner Management Setup Instructions

## Overview
This document provides instructions for setting up and using the banner management system that has been added to your DNS Cakes application.

## Features Implemented

1. **Admin Panel Banner Management**
   - Add new banners
   - Edit existing banners
   - Delete banners
   - View all banners in a list

2. **User Application Display**
   - Banners automatically display on the home page slider
   - Only active banners are shown
   - Banners are ordered by display_order

3. **API Endpoints for Flutter App**
   - GET `/api/get_banners` - Get all active banners
   - GET `/api/get_banner/{id}` - Get a specific banner by ID

## Setup Steps

### 1. Create Database Table

Run the SQL file to create the banners table:

```sql
-- Execute the SQL in create_banners_table.sql
-- Or run it through phpMyAdmin or your database management tool
```

The SQL file is located at: `create_banners_table.sql`

### 2. Verify Directory Structure

The upload directory for banners has been created at:
- `upload/banners/`

Make sure this directory has write permissions (chmod 755 or 777).

### 3. Access Banner Management

1. Login to the admin panel
2. Navigate to **Banners** in the sidebar menu
3. Click on **Manage Banners**

### 4. Add a Banner

1. Click the "Add Banner" button
2. Fill in the form:
   - **Banner Title**: Required
   - **Description**: Optional
   - **Banner Image**: Required (upload an image)
   - **Link URL**: Optional (where the banner should link to)
   - **Status**: Active or Inactive
   - **Display Order**: Number to control the order (lower numbers appear first)
3. Click "Save"

### 5. Edit a Banner

1. Click the edit icon (pencil) next to any banner
2. Modify the fields as needed
3. To change the image, upload a new one (leave empty to keep current)
4. Click "Update"

### 6. Delete a Banner

1. Click the delete icon (trash) next to any banner
2. Confirm the deletion

## API Usage for Flutter App

### Get All Active Banners

**Endpoint:** `GET /api/get_banners`

**Headers:**
```
X-API-KEY: your_api_key_here
```

**Response:**
```json
{
  "status": "success",
  "message": "Banners retrieved successfully",
  "data": [
    {
      "id": 1,
      "title": "Banner Title",
      "description": "Banner description",
      "image_url": "http://yourdomain.com/upload/banners/image.jpg",
      "link_url": "https://example.com",
      "display_order": 0,
      "created_at": "2026-01-11 00:00:00"
    }
  ]
}
```

### Get Single Banner

**Endpoint:** `GET /api/get_banner/{id}`

**Headers:**
```
X-API-KEY: your_api_key_here
```

**Response:**
```json
{
  "status": "success",
  "message": "Banner retrieved successfully",
  "data": {
    "id": 1,
    "title": "Banner Title",
    "description": "Banner description",
    "image_url": "http://yourdomain.com/upload/banners/image.jpg",
    "link_url": "https://example.com",
    "display_order": 0,
    "created_at": "2026-01-11 00:00:00"
  }
}
```

## Password Fix

The admin login password validation has been fixed to allow special characters. You can now login with passwords like "password@123".

**Before:** Only allowed letters and numbers (6-20 characters)
**After:** Allows any characters, minimum 6 characters

## Files Created/Modified

### New Files:
- `application/models/Banner_model.php` - Banner database operations
- `application/views/admin/banners.php` - Banner management interface
- `create_banners_table.sql` - Database table creation script

### Modified Files:
- `application/controllers/Admin.php` - Added banner management methods
- `application/controllers/Api.php` - Added banner API endpoints
- `application/controllers/Main.php` - Added banner loading for home page
- `application/views/index.php` - Updated to display dynamic banners
- `application/views/admin/common/sidebar.php` - Added Banners menu item
- `application/views/admin/login.php` - Fixed password validation

## Notes

- Only banners with status "active" are displayed on the user-facing website
- Banners are ordered by `display_order` (ascending), then by creation date
- When a banner is deleted, its image file is also removed from the server
- Banner images are stored in `upload/banners/` directory
- The home page slider will show banners if available, otherwise falls back to default images

## Troubleshooting

1. **Banners not showing on home page:**
   - Check that banners have status "active"
   - Verify the `upload/banners/` directory exists and has proper permissions
   - Check that the database table was created successfully

2. **Cannot upload banner image:**
   - Check directory permissions on `upload/banners/`
   - Verify PHP upload settings (upload_max_filesize, post_max_size)

3. **API returns 401 Unauthorized:**
   - Ensure you're sending the X-API-KEY header
   - Verify your API key is valid in the database
