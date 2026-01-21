<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - <?= htmlspecialchars($invoice->invoice_number) ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            background: #fff;
            padding: 20px;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f3ba75;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
        .invoice-title {
            text-align: right;
        }
        .invoice-title h1 {
            font-size: 28px;
            color: #f3ba75;
            margin-bottom: 5px;
        }
        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .invoice-info-left, .invoice-info-right {
            width: 48%;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h3 {
            font-size: 14px;
            color: #f3ba75;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .info-section p {
            margin: 5px 0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th {
            background: #f3ba75;
            color: #fff;
            padding: 10px;
            text-align: left;
            font-size: 12px;
        }
        table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 12px;
        }
        table tr:last-child td {
            border-bottom: none;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .totals {
            margin-top: 20px;
            margin-left: auto;
            width: 300px;
        }
        .totals-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .totals-row.total {
            font-weight: bold;
            font-size: 16px;
            border-top: 2px solid #f3ba75;
            border-bottom: 2px solid #f3ba75;
            padding: 15px 0;
            margin-top: 10px;
        }
        .invoice-footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            text-align: center;
            color: #666;
            font-size: 11px;
        }
        @media print {
            body {
                padding: 0;
            }
            .invoice-container {
                border: none;
                padding: 20px;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div>
                <img src="<?= $logo_path ?>" alt="Logo" class="logo">
            </div>
            <div class="invoice-title">
                <h1>INVOICE</h1>
                <p>Invoice #: <?= htmlspecialchars($invoice->invoice_number) ?></p>
                <p>Date: <?= date('d M Y', strtotime($invoice->invoice_date)) ?></p>
            </div>
        </div>

        <div class="invoice-info">
            <div class="invoice-info-left">
                <div class="info-section">
                    <h3>Bill To:</h3>
                    <p><strong><?= htmlspecialchars($user->username) ?></strong></p>
                    <?php if (!empty($user->email)): ?>
                        <p><?= htmlspecialchars($user->email) ?></p>
                    <?php endif; ?>
                    <?php if (!empty($user->mobile)): ?>
                        <p>Phone: <?= htmlspecialchars($user->mobile) ?></p>
                    <?php endif; ?>
                </div>
                <div class="info-section">
                    <h3>Shipping Address:</h3>
                    <p><?= htmlspecialchars($address->address) ?></p>
                    <?php if (!empty($address->city_twn)): ?>
                        <p><?= htmlspecialchars($address->city_twn) ?></p>
                    <?php endif; ?>
                    <?php if (!empty($address->pincode)): ?>
                        <p>PIN: <?= htmlspecialchars($address->pincode) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="invoice-info-right">
                <div class="info-section">
                    <h3>Order Information:</h3>
                    <p><strong>Order #:</strong> <?= htmlspecialchars($order->order_number) ?></p>
                    <p><strong>Order Date:</strong> <?= date('d M Y', strtotime($order->created_at)) ?></p>
                    <p><strong>Payment Mode:</strong> <?= htmlspecialchars($order->payment_mode) ?></p>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $index = 1;
                foreach ($order_products as $product): 
                    $item_total = (float)$product->price * (int)$product->quantity;
                ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td>
                        <?= htmlspecialchars($product->product_name) ?>
                        <?php if (!empty($product->variant_weight)): ?>
                            <br><small>(<?= htmlspecialchars($product->variant_weight) ?>)</small>
                        <?php endif; ?>
                    </td>
                    <td class="text-center"><?= $product->quantity ?></td>
                    <td class="text-right">₹ <?= number_format($product->price, 2) ?></td>
                    <td class="text-right">₹ <?= number_format($item_total, 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="totals">
            <div class="totals-row">
                <span>Subtotal:</span>
                <span>₹ <?= number_format($subtotal, 2) ?></span>
            </div>
            <?php if ($delivery_charge > 0): ?>
            <div class="totals-row">
                <span>Delivery Charges:</span>
                <span>₹ <?= number_format($delivery_charge, 2) ?></span>
            </div>
            <?php endif; ?>
            <?php if ($discount_amount > 0): ?>
            <div class="totals-row">
                <span>Discount:</span>
                <span>- ₹ <?= number_format($discount_amount, 2) ?></span>
            </div>
            <?php endif; ?>
            <div class="totals-row total">
                <span>Total Amount:</span>
                <span>₹ <?= number_format($final_total, 2) ?></span>
            </div>
        </div>

        <div class="invoice-footer">
            <p>Thank you for your business!</p>
            <p>This is a computer-generated invoice and does not require a signature.</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
