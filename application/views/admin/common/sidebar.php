<div class="page-body-wrapper">
    <div class="page-sidebar">
        <!-- Logo removed from sidebar (permanently moved to header) -->
        <div class="sidebar custom-scrollbar">
            <div class="sidebar-user text-center">
                <?php
                $admin_name = $this->session->userdata('username') ? $this->session->userdata('username') : 'Admin';
                $pic_name = $this->session->userdata('profile_pic');

                if (isset($pic_name) && !empty($pic_name)) {
                    $img_src = base_url('upload/profile/' . $pic_name);
                } else {
                    $img_src = base_url('adminassets/images/dashboard/man.png');
                }
                ?>

                <div>
                    <img class="img-60 rounded-circle lazyloaded blur-up" src="<?php echo $img_src; ?>"
                        alt="Profile Image" style="width: 60px; height: 60px; object-fit: cover;">
                </div>
                <h6 class="mt-3 f-14"><?php echo $admin_name; ?></h6>
                <p>Store manager.</p>
            </div>
            <ul class="sidebar-menu">
                <li><a class="sidebar-header" href="<?= base_url('admin/') ?>"><i
                            data-feather="home"></i><span>Dashboard</span></a></li>
                <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="#">
                                <span>Product</span> <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="<?= base_url('admin/product') ?>">Product List</a></li>
                                <li><a href="<?= base_url('admin/addproduct_pakage') ?>">Add Product Pakages</a></li>
                                <li><a href="<?= base_url('admin/product_varient/') ?>">Add Product Varients</a></li>
                                <li><a href="<?= base_url('admin/delivery_charges') ?>">Delivery Charges</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span>Category</span> <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="<?= base_url('admin/category') ?>">View Categories</a></li>
                                <li><a href="<?= base_url('admin/subcategory') ?>">View Sub Category</a></li>
                            </ul>
                        </li>

                        <li><a href="<?= base_url('admin/occasion') ?>">Occasions</a></li>




                    </ul>
                </li>
                <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Sales</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?= base_url('Admin/order_list') ?>">Orders</a></li>
                        <li><a href="<?= base_url('admin/invoices') ?>">Invoices</a></li>
                        <li><a href="<?= base_url('admin/refund_management') ?>">Refund Management</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href="#"><i data-feather="tag"></i><span>Coupons</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?= base_url('admin/coupon_list') ?>">Manage Coupons</a></li>
                    </ul>
                </li>


                <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?= base_url('admin/users'); ?>">User List</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-header" href="<?= base_url('admin/reports'); ?>"><i
                            data-feather="bar-chart"></i><span>Reports</span></a></li>
                <li><a class="sidebar-header" href="#"><i data-feather="image"></i><span>Banners</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?= base_url('admin/banners') ?>">Manage Banners</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-header" href="#"><i data-feather="settings"></i><span>Settings</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="<?= base_url('admin/settings') ?>">Profile Setting</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header logout-link" href="<?= base_url('logout'); ?>"><i
                            data-feather="log-in"></i><span>Logout</span></a></li>
            </ul>
        </div>
    </div>
    <div class="right-sidebar" id="right_side_bar">
        <div>
            <div class="container p-0">
                <div class="modal-header p-l-20 p-r-20">
                    <div class="col-sm-8 p-0">
                        <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                    </div>
                    <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
                </div>
            </div>
            <div class="friend-list-search mt-0">
                <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
            </div>
            <div class="p-l-30 p-r-30">
                <div class="chat-box">
                    <div class="people-list friend-list">
                        <ul class="list">
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="<?= base_url('adminassets/images/dashboard/user.png') ?>" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Vincent Porter</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="<?= base_url('adminassets/images/dashboard/user1.jpg') ?>" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Ain Chavez</div>
                                    <div class="status"> 28 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="<?= base_url('adminassets/images/dashboard/user2.jpg') ?>" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Kori Thomas</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="<?= base_url('adminassets/images/dashboard/user3.jpg') ?>" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="<?= base_url('adminassets/images/dashboard/man.png') ?>" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status"> 2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="<?= base_url('adminassets/images/dashboard/user5.jpg') ?>" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status"> 2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image"
                                    src="<?= base_url('adminassets/images/dashboard/designer.jpg') ?>" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Hileri Jecno</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>