<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>
                            <a href="javascript:history.back()" style="color: inherit; text-decoration: none; margin-right: 10px;">
                                <i data-feather="arrow-left"></i>
                            </a>
                            Invoices
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Sales</li>
                        <li class="breadcrumb-item active">Invoices</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Invoices</h5>
                    </div>
                    <div class="card-body order-datatable">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Order Number</th>
                                    <th>Customer</th>
                                    <th>Invoice Date</th>
                                    <th>Total Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($invoices)):
                                    foreach ($invoices as $invoice):
                                        ?>
                                        <tr>
                                            <td><?= htmlspecialchars($invoice->invoice_number) ?></td>
                                            <td><?= htmlspecialchars($invoice->order_number) ?></td>
                                            <td>
                                                <?= htmlspecialchars($invoice->username) ?><br>
                                                <small><?= htmlspecialchars($invoice->email) ?></small>
                                            </td>
                                            <td><?= date('M d, Y', strtotime($invoice->invoice_date)) ?></td>
                                            <td>₹ <?= number_format($invoice->total_amount, 2) ?></td>
                                            <td><?= htmlspecialchars($invoice->payment_mode) ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/invoice/view/' . $invoice->id) ?>"
                                                    class="btn btn-sm btn-primary" target="_blank">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                else:
                                    ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No invoices found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#basic-1').DataTable({
            "order": [[3, "desc"]], // Sort by invoice date descending
            "pageLength": 25
        });
    });
</script>