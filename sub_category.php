<?php


require 'db_connect.php';
require 'frontend_header.php';

//receiving sub id & cat id
$sc_id = $_GET['sc_id'];
$c_id = $_GET['c_id'];

//selecting subcategory name
$subcategory_qry = "SELECT * FROM subcategories 
                    WHERE id = :scid";
$stmt = $conn->prepare($subcategory_qry);
$stmt->bindParam('scid',$sc_id);
$stmt->execute();
$subcategory_name = $stmt->fetch()['name'];


//selecting category name
$category_qry = "SELECT categories.name FROM subcategories
                 INNER JOIN categories ON subcategories.category_id = categories.id
                 WHERE subcategories.category_id = :cid";
$stmt = $conn->prepare($category_qry);
$stmt->bindParam('cid',$c_id);
$stmt->execute();
$category_name = $stmt->fetch()['name'];

?>

<!-- Subcategory Title -->
<div class="jumbotron jumbotron-fluid subtitle">
    <div class="container">
        <h1 class="text-center text-white"><?= $subcategory_name ?></h1>
    </div>
</div>

<!-- Content -->
<div class="container">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item">
                <a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none secondarycolor"> Category </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none secondarycolor"><?= $category_name; ?></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <?= $subcategory_name; ?>
            </li>
        </ol>
    </nav>

    <div class="row mt-5">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <!--list group-->
            <ul class="list-group">
               <?php
               //selecting subcategory names
               $subcategory_qry = "SELECT name, id FROM subcategories WHERE category_id = :cid";
               $stmt = $conn->prepare($subcategory_qry);
               $stmt->bindParam('cid',$c_id);
               $stmt->execute();
               $subcategories = $stmt->fetchAll();

               foreach ($subcategories as $subcategory)
               {
               ?>
                <li class="list-group-item">
                    <a href="sub_category.php?sc_id=<?= $subcategory['id']?>&c_id=<?= $c_id ?>" class="text-decoration-none secondarycolor"><?= $subcategory['name'] ?></a>
                </li>
                <?php } ?>
            </ul>
        </div>

        <!--items-->
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

            <div class="row">
                <?php
                $item_qry = "SELECT * FROM items WHERE subcategory_id = :scid";
                $stmt = $conn->prepare($item_qry);
                $stmt->bindParam('scid',$sc_id);
                $stmt->execute();
                $items = $stmt->fetchAll();
//              echo "<pre>".print_r($items,true)."</pre>";
                if(empty($items))
                {?>
                   <span class="text-muted ml-5" style="font-size: 30px;">There is no items.</span>
                <?php }
                else{
                foreach ($items as $item)
                {
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card pad15 mb-3">
                        <a href="item_detail.php?id=<?= $item['id'] ?>"><img src="<?= $item['photo'] ?>" class="img-fluid"></a>
                        <div class="card-body text-center">
                            <h5 class="card-title text-truncate"><?= $item['name'];; ?></h5>

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
                            <div>
                                <button data-id="<?= $item['id'] ?>"
                                        data-name="<?= $item['name'] ?>"
                                        data-codeno="<?= $item['codeno']?>"
                                        data-photo="<?= $item['photo'] ?>"
                                        data-price="<?= $item['price']  ?>"
                                        data-discount="<?= $item['discount'] ?>"
                                        class="addtocartBtn text-decoration-none">Add to Cart</button>

                            </div>

                        </div>
                    </div>
                </div>
                <?php } } ?>

            </div>


            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="icofont-rounded-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


</div>









<?php

require 'frontend_footer.php';

?>
