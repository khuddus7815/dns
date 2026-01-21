<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Varient List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Varient List</li>
                        <li class="breadcrumb-item active">Varient List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">

            <div class="card-header">
                <h5>Varient Details</h5>

            </div>

            <div class="card-body vendor-table">
                <div class="btn-popup pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test"
                        data-target="#exampleModal">Add Varient</button>
                </div>
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>Vendor</th>
                            <th>Products</th>
                            <th>Store Name</th>
                            <th>Create Date</th>
                            <th>Wallet Balance</th>
                            <th>Revenue</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex vendor-list">
                                    <img src="../assets/images/team/2.jpg" alt=""
                                        class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                    <span>Petey Cruiser</span>
                                </div>
                            </td>
                            <td>1670</td>
                            <td>Warephase</td>
                            <td>8/10/18</td>
                            <td>$576132</td>
                            <td>$9761266</td>
                            <td>
                                <div>
                                    <i class="fa fa-edit mr-2 font-success"></i>
                                    <i class="fa fa-trash font-danger"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Varients</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="<?= base_url('admin/add_Varient') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Category Name:</label>
                            <select class="form-control" name="category_id" id="comboA" onchange="get_subcategory(this)"
                                required>
                                <option selected>Choose option</option>
                                <?php if (!empty($categories)) foreach ($categories as $cat) { ?>
                                <option value="<?= $cat->id ?>"><?= $cat->category_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Sub-Category Name:</label>
                            <select id="sub_category" class="form-control" name="subcategory_id" required
                                onchange="get_prodBycatandsubcat(this)"></select>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Product Name :</label>
                            <select id="productlist" class="form-control" name="product_id" required></select>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Varient Name :</label>
                            <input class="form-control" name="varient_name" id="validationCustom0varient" type="text"
                                required>
                            <!-- <button type="button" class="btn-success btn-sm" id="addmore" onclick="add()">Add More</button>
                            <button type="button" class="btn-danger btn-sm" onclick="remove()" id="remove">Remove</button>
                             <div id="new_chq"></div>
                              <input type="hidden" value="1" id="total_chq"> -->
                        </div>

                        <!-- <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Package Name :</label>
                            <select class="form-control" name="package_id[]" id="pkg" multiple>
                                <option selected>Choose option</option>
                                <?php if (!empty($package)) foreach ($package as $pkg) { ?>
                                <option value="<?= $pkg->id ?>"><?= $pkg->value ?><?= $pkg->unit_type ?></option>
                                <?php } ?>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1"><b>Select Varient Type :</b></label>
                            <select id="select-pakage-type" class="selectpicker border border-4 border-dark" multiple
                                data-live-search="true" name="pkgtype_id[]">
                                <?php if (!empty($package)) foreach ($package as $pkg) { ?>
                                <option value="<?= $pkg->id ?>"><?= $pkg->unit_type ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="account-setting" id="setpakgevalues">

                            
                        </div>
                        <!-- <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Base Price :</label>
                            <input class="form-control" name="price[]" id="validationCustom01" type="number" required>
                            <button type="button" class="btn-success btn-sm" id="addmore" onclick="addprice()">Add More</button>
                            <button type="button" class="btn-danger btn-sm" onclick="removeprice()" id="remove">Remove</button>
                        </div>
                        <div id="new_chq1"></div>
                              <input type="hidden" value="1" id="total_chq1">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Selling Price :</label>
                            <input class="form-control" name="sellingprice[]" id="validationCustom01" type="number"
                                required>
                            <button type="button" class="btn-success btn-sm" id="addmore" onclick="addsellingprice()">Add More</button>
                            <button type="button" class="btn-danger btn-sm" onclick="removesellingprice()" id="remove">Remove</button>    
                        </div>
                        <div id="new_chq2"></div>
                        <input type="hidden" value="1" id="total_chq2"> -->

                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
function get_subcategory(id) {
    //console.log(id.id);
    var val = id.value;
    $.ajax({
        url: '<?= base_url('Admin/ajax_subcategory'); ?>',
        type: 'POST',
        data: {
            id: val
        },
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            // alert(data);
            var html = '<option selected>Choose option</option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].subcategory_name + '</option>';
            }
            if (id.id === 'comboA') {
                $('#sub_category').html(html);

            } else {
                $('#editSubCategory').html(html);

            }

        }
    });


}
</script>

<script>
function get_prodBycatandsubcat(id) {
    var subcategory = id.value;
    var catid = $('#comboA').val();
    console.log(subcategory);
    console.log(catid);
    $.ajax({
        url: '<?php echo base_url('Admin/get_prod'); ?>',
        type: 'POST',
        data: {
            subcatid: subcategory,
            catid: catid
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            var html = '<option selected>Choose option</option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].product_name + '</option>';
            }

            $('#productlist').html(html);
        }
    });


}

//add more and remove button 
function add() {
    var new_chq_no = parseInt($('#total_chq').val()) + 1;
    var new_input =
        "<input class='form-control' Placeholder='Package Name' name='varient_name[]' type='text' id='new_" +
        new_chq_no + "'>";
    $('#new_chq').append(new_input);
    $('#total_chq').val(new_chq_no)
}

function remove() {
    var last_chq_no = $('#total_chq').val();
    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq').val(last_chq_no - 1);
    }
}


function addprice() {
    var new_chq_no = parseInt($('#total_chq1').val()) + 1;
    var new_input = "<input class='form-control' Placeholder='Base Price' name='price[]' type='text' id='new_" +
        new_chq_no + "'>";
    $('#new_chq1').append(new_input);
    $('#total_chq1').val(new_chq_no)
}

function removeprice() {
    var last_chq_no = $('#total_chq1').val();
    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq1').val(last_chq_no - 1);
    }
}

function addsellingprice() {
    var new_chq_no = parseInt($('#total_chq2').val()) + 1;
    var new_input =
        "<input class='form-control' Placeholder='Selling Price' name='sellingprice[]' type='text' id='new_" +
        new_chq_no + "'>";
    $('#new_chq2').append(new_input);
    $('#total_chq2').val(new_chq_no)
}

function removesellingprice() {
    var last_chq_no = $('#total_chq2').val();
    if (last_chq_no > 1) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq2').val(last_chq_no - 1);
    }
}

function addinputefiled(id) {
    //alert(id);
    //alert($("#chk-ani"+id).is(':checked'));
    var status = $("#chk-ani" + id).is(':checked');
    if (status) {
        
        $("#pricefield" + id).html('<div class="flex_wrapper" id="pricebox'+id+'"><label for="validationCustom' + id +
            '" class="col-form-label pt-0 removeprice">Price</label><input class="form-control col-md-3 col-md-3" name="price[]" id="validationCustom' +
            id + '" type="text" placeholder="Price" required=""></div><div class="flex_wrapper" id="pricebox'+id+'"><label for="validationCustomsellprice' + id +
            '" class="col-form-label pt-0 removeprice">Sell Price</label><input class="form-control col-md-3 col-md-3" name="sellingprice[]" id="validationCustomsellprice' +
            id + '" type="text" placeholder="Sell Price" required=""></div>');
        $("#chk-ani" + id).attr('checked', true);
    } else {
        //alert("else");
        $("#pricebox"+id).remove();
        $(".removeprice").remove();
        $("#validationCustom" + id).remove();
        $("#validationCustomsellprice" + id).remove();
        $("#chk-ani" + id).attr('checked', false);
    }
}

$('select').selectpicker();
</script>

<script>
$('#select-pakage-type').change(function() {
    var selected_pkgtype = $(this).val();
    //console.log(arr)
   // alert(selected_pkgtype);
    $.ajax({
        url: '<?php echo base_url('Admin/get_pakagevalue'); ?>',
        type: 'POST',
        data: {
            pkgid: selected_pkgtype,

        },
        dataType: 'json',
        success: function(data) {
            //console.log(data);
            //alert(data);
            var k=0;
            var html = '<h5 class="f-w-600">Package Value :</h5>';
            for (i = 0; i < data.length; i++) {
                var parsejsondata=JSON.parse(data[i].value);
                console.log(parsejsondata);
               for (let j = 0; j < parsejsondata.length; j++) {
                const element = parsejsondata[j];
                console.log(k+1);
                html +=
                    '<input class="checkbox_animated" name="pkgweight[]" value="' +
                    parsejsondata[j] + '" id="chk-ani' + (k+1) +
                    '" type="checkbox" onclick="addinputefiled(' + (k+1) + ')" required><b> ' +
                    parsejsondata[j] + ' </b><div class="form-group" id="pricefield' + (k+1) +
                    '"></div></label></div></div>';
             k=k+1;
            }
        }
            $("#setpakgevalues").html(html);

        }
    });



})
</script>