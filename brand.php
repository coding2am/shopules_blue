<?php
require 'db_connect.php';
require 'frontend_header.php';

$id = $_GET['bid'];
$qry = "SELECT * FROM brands WHERE id = :id";
$stmt = $conn->prepare($qry);
$stmt->bindParam(':id',$id);
$stmt->execute();
$brand = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Subcategory Title -->
<div class="jumbotron jumbotron-fluid subtitle">
    <div class="container">
        <h1 class="text-center text-white"> <?= $brand[0]['name'] ?> </h1>
    </div>
</div>

<!-- Content -->
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col">
            <div class="bbb_viewed_title_container">
                <h3 class="bbb_viewed_title"> <span class="bg-info p-3 text-light"><?= $brand[0]['name']."'s product" ?></span>  </h3>
                <div class="bbb_viewed_nav_container">
                    <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                    <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner">
                    <?php
                    $qry = "SELECT * FROM items WHERE brand_id = :id";
                    $stmt = $conn->prepare($qry);
                    $stmt->bindParam(':id',$id);
                    $stmt->execute();
                    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //echo "<pre>".print_r($items,true)."</pre>";
                    foreach ($items as $item)
                    {?>
                        <div class="item">
                            <div class="pad15">
                                <a href="item_detail.php?id=<?= $item['id'] ?>"><img src="<?= $item['photo'] ?>" class="img-fluid"></a>
                                <p class="text-truncate"><?= $item['name'] ?></p>
                                <p class="item-price">
                                    <?php if($item['discount']) {?>
                                        <strike> <?= $item['price'] ?> Ks </strike>
                                        <span class="d-block"> <?= $item['discount'] ?> Ks</span>
                                    <?php } else{ ?>
                                        <span class="d-block"> <?= $item['price'] ?> Ks</span>
                                        <?php } ?>
                                    </p>

                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                                            <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                                        </ul>
                                    </div>

                                    <button data-id="<?= $item['id'] ?>"
                                            data-name="<?= $item['name'] ?>"
                                            data-codeno="<?= $item['codeno'] ?>"
                                            data-photo="<?= $item['photo'] ?>"
                                            data-price="<?= $item['price'] ?>"
                                            data-discount="<?= $item['discount'] ?>"
                                            class="addtocartBtn text-decoration-none"><i class="icofont-shopping-cart"></i> Add to Cart</button>

                                    </div>
                                </div>
                            <?php } ?>
                            <button class="btn btnMain leftLst"><i class="icofont-rounded-left"></i></button>
                            <button class="btn btnMain rightLst"><i class="icofont-rounded-right"></i></button>
                        </div>
                </div>
            </div>

                </div>
            </div>
        </div>
    </div>

</div>





<?php
require 'frontend_footer.php';

?>
