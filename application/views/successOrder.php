<!-- thank-you section start -->

<section class="section-b-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2>Thank You</h2>
                    <p>Your order has been placed successfully and is being processed.</p>
                    <p style="font-weight: bold;">Order ID:<?= $order->order_number ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!-- order-detail section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-order">
                    <h3>your order details</h3>
                    <?php foreach ($order_product as $product) { ?>
                        <div class="row product-order-detail">
                            <div class="col-3"><img src="<?= base_url('upload/productimg/' . $product->product_image) ?>"
                                    alt="not found image" class="img-fluid blur-up lazyload"></div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>product name</h4>
                                    <h5><?= $product->product_name ?></h5>
                                </div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>quantity</h4>
                                    <h5><?= $product->quantity ?></h5>
                                </div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>price</h4>
                                    <h5>₹<?= number_format($product->price, 2) ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <div class="row product-order-detail">
                        //     <div class="col-3"><img src="../assets/images/pro3/1.jpg" alt=""
                        //             class="img-fluid blur-up lazyload"></div>
                        //     <div class="col-3 order_detail">
                        //         <div>
                        //             <h4>product name</h4>
                        //             <h5>cotton shirt</h5>
                        //         </div>
                        //     </div>
                        //     <div class="col-3 order_detail">
                        //         <div>
                        //             <h4>quantity</h4>
                        //             <h5>1</h5>
                        //         </div>
                        //     </div>
                        //     <div class="col-3 order_detail">
                        //         <div>
                        //             <h4>price</h4>
                        //             <h5>$555.00</h5>
                        //         </div>
                        //     </div>
                        </div> -->
                    <div class="total-sec">
                        <ul>
                            <li>subtotal <span>₹<?= number_format($order->tot_amount, 2) ?></span></li>
                            <li>shipping <span>₹12.00</span></li>
                            <li>tax(GST) <span>₹10.00</span></li>
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>total <span>₹<?= number_format($order->tot_amount + 12 + 10, 2) ?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row order-success-sec">
                    <div class="col-sm-6">
                        <h4>summary</h4>
                        <ul class="order-detail">
                            <li>order ID: <?= $order->order_number ?></li>
                            <li>Order Date: <?= date('F d, Y', strtotime($order->created_at)) ?></li>
                            <li>Order Total: ₹<?= number_format($order->tot_amount + 12 + 10, 2) ?></li>
                        </ul>
                    </div>
                    <!-- <div class="col-sm-6">
                             <h4>shipping address</h4>
                             <ul class="order-detail">
                                 <li>gerg harvell</li>
                                 <li>568, suite ave.</li>
                                 <li>Austrlia, 235153</li>
                                 <li>Contact No. 987456321</li>
                             </ul>
                         </div> -->
                    <div class="col-sm-6">
                        <h4>shipping address</h4>
                        <ul class="order-detail">
                            <li><?= $address->fullname ?></li>
                            <li><?= $address->locality ?></li>
                            <li><?= $address->city_twn ?>, <?= $address->pincode ?></li>
                            <li>Contact No. <?= $address->phone ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 payment-mode">
                        <h4>payment method</h4>
                        <p>Pay on Delivery (Cash/Card). Cash on delivery (COD) available. Card/Net banking
                            acceptance subject to device availability.</p>
                    </div>
                    <!-- <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>expected date of delivery</h3>
                                <h2><?= date('F d, Y', strtotime('+5 days', strtotime($order->created_at))) ?></h2>
                             </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->