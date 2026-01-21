<div class="page-title text-center">
    <h2 class="m-2">My Address</h2>
</div>
<hr>
<div class="box-account mt-3">
    <?php if (!empty($user_address)): ?>
        <?php foreach ($user_address as $address): ?>
            <div class="box card dashboard-address-card">
                <div class="box-title d-flex justify-content-between">
                    <h3 class="address-name"><?= htmlspecialchars($address->fullname); ?></h3>
                    <div>
                        <a href="#" class="editAddressLink" data-id="<?= $address->id; ?>"
                            data-fullname="<?= $address->fullname; ?>" data-phone="<?= $address->phone; ?>"
                            data-address="<?= $address->address; ?>" data-locality="<?= $address->locality; ?>"
                            data-pincode="<?= $address->pincode; ?>" data-city="<?= $address->city_twn; ?>"
                            data-state="<?= isset($states[$address->state_id]) ? $states[$address->state_id] : ''; ?>">
                            <i class="fa fa-pencil mr-3"></i>
                        </a>
                        <a href="#" class="deleteAddressLink" data-id="<?= $address->id; ?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <address>
                        <?= $address->address; ?>, <?= $address->locality; ?>,
                        <?= $address->city_twn; ?>, <?= $address->pincode; ?>
                        <?php
                        // Get state name from states array
                        if (isset($states) && isset($address->state_id) && isset($states[$address->state_id])): ?>
                            , <?= $states[$address->state_id] ?>
                        <?php endif; ?>
                    </address>
                    <p class="pt-2">Contact: <?= $address->phone; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No address found. Please add an address.</p>
    <?php endif; ?>
</div>
<div class="text-center mb-3">
    <button type="button" class="btn btn-solid" data-bs-toggle="modal" data-bs-target="#addnewaddress">Add New
        Address</button>
</div>

<div class="modal fade" id="addnewaddress" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="addNewAddressForm" class="theme-form">
                    <div class="form-group"><input type="text" class="form-control" name="fullname"
                            placeholder="Full Name" required></div>
                    <div class="form-group"><input type="number" class="form-control" name="mobile" placeholder="Phone"
                            required></div>
                    <div class="form-group"><input type="text" class="form-control" name="address" placeholder="Address"
                            required></div>
                    <div class="form-group"><input type="text" class="form-control" name="locality"
                            placeholder="Locality" required></div>
                    <div class="form-group"><input type="number" class="form-control" name="pincode"
                            placeholder="Pincode" required></div>
                    <div class="form-group"><input type="text" class="form-control" name="city" placeholder="City"
                            required></div>
                    <div class="form-group">
                        <select class="form-control" name="state" required>
                            <option value="">Select State</option>
                            <?php
                            if (isset($states) && !empty($states)):
                                foreach ($states as $id => $name): ?>
                                    <option value="<?= $name ?>"><?= $name ?></option>
                                <?php endforeach;
                            endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-solid mt-3">Save Address</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editAddressModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="editAddressForm" class="theme-form">
                    <input type="hidden" name="address_id" id="edit_address_id">
                    <div class="form-group"><input type="text" class="form-control" name="fullname" id="edit_fullname"
                            required></div>
                    <div class="form-group"><input type="number" class="form-control" name="mobile" id="edit_mobile"
                            required></div>
                    <div class="form-group"><input type="text" class="form-control" name="address" id="edit_address"
                            required></div>
                    <div class="form-group"><input type="text" class="form-control" name="locality" id="edit_locality"
                            required></div>
                    <div class="form-group"><input type="number" class="form-control" name="pincode" id="edit_pincode"
                            required></div>
                    <div class="form-group"><input type="text" class="form-control" name="city" id="edit_city" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="state" id="edit_state" required>
                            <option value="">Select State</option>
                            <?php
                            if (isset($states) && !empty($states)):
                                foreach ($states as $id => $name): ?>
                                    <option value="<?= $name ?>"><?= $name ?></option>
                                <?php endforeach;
                            endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-solid mt-3">Update Address</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // 1. Add Address
        $('#addNewAddressForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Main/add_address') ?>",
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (res) {
                    if (res.success) {
                        $('#addnewaddress').modal('hide');
                        loadProfileSection('address');
                    } else {
                        alert(res.message);
                    }
                }
            });
        });

        // 2. Open Edit Modal
        $(document).on('click', '.editAddressLink', function (e) {
            e.preventDefault();
            $('#edit_address_id').val($(this).data('id'));
            $('#edit_fullname').val($(this).data('fullname'));
            $('#edit_mobile').val($(this).data('phone'));
            $('#edit_address').val($(this).data('address'));
            $('#edit_locality').val($(this).data('locality'));
            $('#edit_pincode').val($(this).data('pincode'));
            $('#edit_city').val($(this).data('city'));
            $('#edit_state').val($(this).data('state'));
            new bootstrap.Modal(document.getElementById('editAddressModal')).show();
        });

        // 3. Submit Edit Form
        $('#editAddressForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Main/update_address') ?>",
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (res) {
                    if (res.success) {
                        $('#editAddressModal').modal('hide');
                        loadProfileSection('address');
                    } else {
                        alert(res.message);
                    }
                }
            });
        });

        // 4. Delete Address
        $(document).on('click', '.deleteAddressLink', function (e) {
            e.preventDefault();
            if (confirm('Delete this address?')) {
                $.ajax({
                    url: "<?= base_url('Main/delete_address') ?>",
                    type: 'POST',
                    data: { id: $(this).data('id') },
                    dataType: 'json',
                    success: function (res) {
                        if (res.success) {
                            loadProfileSection('address');
                        } else {
                            alert(res.message);
                        }
                    }
                });
            }
        });
    });
</script>