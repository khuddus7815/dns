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
                            Delivery Charges
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Sales</li>
                        <li class="breadcrumb-item active">Delivery Charges</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Delivery Charge List</h5>
            </div>
            <div class="card-body">
                <div class="btn-popup pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addChargeModal">Add
                        Delivery Charge</button>

                    <div class="modal fade" id="addChargeModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Delivery Charge</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="<?= base_url('admin/add_delivery_charge') ?>"
                                        method="post">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="charge_name" class="mb-1">Charge Name (e.g., Standard, Free)
                                                    :</label>
                                                <input class="form-control" name="charge_name" id="charge_name"
                                                    type="text" required placeholder="Enter name">
                                            </div>
                                            <div class="form-group mb-0">
                                                <label for="amount" class="mb-1">Amount (₹) :</label>
                                                <input class="form-control" name="amount" id="amount" type="number"
                                                    step="0.01" required placeholder="0.00">
                                                <small class="text-muted">Enter 0 for Free Delivery</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="display table table-striped" id="basic-1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($charges)) {
                                foreach ($charges as $charge) {
                                    if (isset($charge) && is_object($charge)) { ?>
                                        <tr>
                                            <td><?= isset($charge->id) ? $charge->id : 'N/A' ?></td>
                                            <td><?= isset($charge->name) ? htmlspecialchars($charge->name) : 'Unnamed' ?></td>
                                            <td>
                                                <?php
                                                $amount = isset($charge->amount) ? $charge->amount : 0;
                                                if ($amount == 0) { ?>
                                                    <span class="badge badge-success">FREE</span>
                                                <?php } else { ?>
                                                    ₹<?= number_format($amount, 2) ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if (isset($charge->id)) { ?>
                                                    <a href="<?= base_url('admin/delete_delivery_charge/' . $charge->id) ?>"
                                                        class="text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this charge?')">
                                                        <i class="fa fa-trash font-danger"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">No delivery charges found. Please add a delivery
                                        charge.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>