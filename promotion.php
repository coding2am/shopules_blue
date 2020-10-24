<?php
require 'frontend_header.php';
require 'db_connect.php';

?>

<!-- Subcategory Title -->
<div class="jumbotron jumbotron-fluid subtitle">
    <div class="container">
        <h1 class="text-center text-white"> Promotion Items </h1>
    </div>
</div>

<!-- Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="bbb_viewed_title_container">
                <h3 class="bbb_viewed_title"> <span class="text-light bg-info p-3">discount %</span> </h3>
                <div class="bbb_viewed_nav_container">
                    <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                    <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                </div>
            </div>
            <div class="bbb_viewed_slider_container">
                <div class="owl-carousel owl-theme bbb_viewed_slider">
                    <?php

                    $sql = 'SELECT * FROM items WHERE discount != "" AND discount != 0';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $discount_items = $stmt->fetchAll();
                    foreach ($discount_items as $discount_item)
                    {
                    $discount_id = $discount_item["id"];
                    $discount_name = $discount_item["name"];
                    $discount_price = $discount_item["price"];
                    $discount_discount = $discount_item["discount"];
                    $discount_photo = $discount_item["photo"];
                    $discount_codeno = $discount_item["codeno"];
                    ?>
                    <div class="owl-item">
                        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="pad15">
                                <img src="<?= $discount_photo ?>" class="img-fluid">
                                <p class="text-truncate"><?=  substr($discount_name,0,7) ?></p>
                                <p class="item-price">
                                    <strike><?= $discount_price ?> mmk </strike>
                                    <span class="d-block"><?= $discount_discount ?> mmk</span>
                                </p>

                                <a href="#" class="addtocartBtn text-decoration-none"> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
require 'frontend_footer.php';

?>
