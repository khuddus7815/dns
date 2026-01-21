<div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Package List
                                    <small>Multikart Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Package List</li>
                                <li class="breadcrumb-item active">Package List</li>
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
                        <h5>Package Details</h5>

                    </div>
                   
                    <div class="card-body vendor-table"> 
                    <div class="btn-popup pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Package</button>
                    </div> 
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>Package Type</th>
                                <th>Pakage Value</th>
                                <th>Action</th>
                                <!-- <th>Store Name</th>
                                <th>Create Date</th>
                                <th>Wallet Balance</th>
                                <th>Revenue</th> -->
                                
                            </tr>
                            </thead>
                            <tbody>
                              <?php if(!empty($package)){ foreach($package as $p){  ?>  
                            <tr>
                                
                                <td><?=$p->unit_type ?></td>
                                <td><?=$p->value ?></td>
                                <td>
                                    <div>
                                        <i class="fa fa-edit mr-2 font-success"></i>
                                        <i class="fa fa-trash font-danger"></i>
                                    </div>
                                </td>
                            </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Package</h5>
                                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test"  onclick="openmodal()" >Create New</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="<?= base_url('admin/add_package') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form">
                                           <!-- <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Category :</label>
                                                <input class="form-control" name="category_id" id="validationCustomcat01" type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Sub-Category :</label>
                                                <input class="form-control" name="subcategory_id" id="validationCustomcatsub01" type="text" required>
                                            </div> -->
                                            <div class="form-group">
                                        <label class="col-form-label"><span>*</span>Package Type:</label>
                                        <select class="custom-select" name="pkgtype" required="">
                                            <option value="">--Please Select Type--</option>
                                            <?php if($package){ foreach($package as $pkg){ ?>
                                            <option value="<?= $pkg->id ?>"><?= $pkg->unit_type ?></option>
                                            <?php } } ?>
                                            
                                        </select>
                                       </div>
                                            <div class="form-group">
                                                <label for="validationCustom02" class="mb-1">Value :</label>
                                                <input class="form-control" name="pkgvalue[]" id="validationCustom02" type="text" required>
                                            </div>
                                           
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-secondary" id="closemodal" type="button" data-dismiss="modal">Close</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>



<!------------------- crete new model--------------------->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Package</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="reloadonclose()">×</span></button>
                                    
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="<?= base_url('admin/add_package') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form">
                                           <!-- <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Category :</label>
                                                <input class="form-control" name="category_id" id="validationCustomcat01" type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Sub-Category :</label>
                                                <input class="form-control" name="subcategory_id" id="validationCustomcatsub01" type="text" required>
                                            </div> -->
                                        <div class="form-group">
                                        <label class="col-form-label"><span>*</span>Package Type:</label>
                                        <input class="form-control" name="pkgtype" id="validationCustom02" type="text" required>
                                       </div>
                                            <div class="form-group">
                                                <label for="validationCustom02" class="mb-1">Value :</label>
                                                <input class="form-control" name="pkgvalue[]" id="validationCustom02" type="text" required>
                                            </div>
                                           
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="reloadonclose()">Close</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


 <script>
  function openmodal(){
    //alert("Hii");
    //$('#exampleModal').modal('hide');
    $("#closemodal").click();
    $('#exampleModal2').modal('show');
  }  
  function reloadonclose(){
    location.reload();
  }
 </script>                   