<?php
ob_start();

require "frontend_header.php";
if (!isset($_SESSION['login_user'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['login_user']['id'];

$sql = "SELECT * FROM users WHERE id = :value1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':value1', $id);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$name = $row['password'];


?>
    <!-- Subcategory Title -->
    <div class="jumbotron jumbotron-fluid subtitle">
        <div class="container">
            <h1 class="text-center text-white"> Change Password </h1>
        </div>
    </div>

    <!-- Content -->
    <div class="container mt-5">

        <!-- Shopping Cart Div -->
        <form action="change.php" method="post">
            <div class="row justify-content-center">
                <input type="hidden" name="id" value="<?= $id; ?>">

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
                    <fieldset>
                        <!--checking current password start-->
                        <?php if(isset($_SESSION['cur_wrong'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h2> Oops! </h2>
                                <hr>
                                <p> <?= $_SESSION['cur_wrong']; ?> </p>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } unset($_SESSION['cur_wrong']); ?>
                        <!--checking current password end-->

                        <!--checking password start-->
                        <?php if(isset($_SESSION['psw_wrong'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h2> Oops! </h2>
                                <hr>
                                <p> <?= $_SESSION['psw_wrong']; ?> </p>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } unset($_SESSION['psw_wrong']); ?>
                        <!--checking password end-->

                        <!--success start-->
                        <?php if(isset($_SESSION['change_success'])){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h2> Success!</h2>
                                <hr>
                                <p> <?= $_SESSION['change_success']; ?> </p>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } unset($_SESSION['change_success']); ?>
                        <!--success  end-->

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="password"> New Password</label>
                                    <input class="form-control py-4" id="password" type="password" placeholder="New Password" name="newPassword" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="cpassword">Confirm Password</label>
                                    <input class="form-control py-4" id="cpassword" type="password" placeholder="Confirm Password" name="confirmPassword"/>
                                    <span id="cerror"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Current Password</label>
                                    <input class="form-control py-4" id="inputEmailAddress" type="password" placeholder="Current Password" name="currentPassword"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button type="submit" class="btn btn-outline-primary"> Change </button>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>


    </div>

<?php
require('frontend_footer.php');
?>