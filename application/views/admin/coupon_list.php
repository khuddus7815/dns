<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>
                            <a href="javascript:history.back()"
                                style="color: inherit; text-decoration: none; margin-right: 10px;">
                                <i data-feather="arrow-left"></i>
                            </a>
                            Coupon Management
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Coupons</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Add New Coupon</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/add_coupon') ?>" method="POST">
                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Ex: SAVE10" required>
                            </div>
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select name="type" class="form-control">
                                    <option value="fixed">Fixed Amount (₹)</option>
                                    <option value="percentage">Percentage (%)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Value</label>
                                <input type="number" step="0.01" name="value" class="form-control"
                                    placeholder="100 or 10" required>
                            </div>
                            <div class="form-group">
                                <label>Min Cart Value</label>
                                <input type="number" step="0.01" name="min_cart_value" class="form-control" value="0">
                            </div>
                            <div class="form-group">
                                <label>Expiry Date</label>
                                <input type="date" name="expiry_date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Create Coupon</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">All Coupons</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Min Cart</th>
                                        <th>Expiry</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($coupons)) {
                                        foreach ($coupons as $c) { ?>
                                            <tr>
                                                <td><span class="badge badge-success"><?= $c->code ?></span></td>
                                                <td><?= ucfirst($c->type) ?></td>
                                                <td><?= $c->value ?></td>
                                                <td><?= $c->min_cart_value ?></td>
                                                <td><?= $c->expiry_date ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/delete_coupon/' . $c->id) ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>