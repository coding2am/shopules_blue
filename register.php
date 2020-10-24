<?php require 'frontend_header.php' ?>


<!-- Subcategory Title -->
<div class="jumbotron jumbotron-fluid subtitle">
    <div class="container">
        <h1 class="text-center text-white"> Create Account </h1>
    </div>
</div>

<!-- Content -->
<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-8">
            <!--checking password match start-->
            <?php if(isset($_SESSION['pass_notmatch'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h2> Oops! </h2>
                    <hr>
                    <p> <?= $_SESSION['pass_notmatch']; ?> </p>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } unset($_SESSION['pass_notmatch']); ?>

            <!--checking all fields start-->
            <?php if(isset($_SESSION['fill_requirements'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h2> Oops! </h2>
                    <hr>
                    <p> <?= $_SESSION['fill_requirements']; ?> </p>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } unset($_SESSION['fill_requirements']); ?>

            <form action="signup.php" method="POST">
                <div class="form-row">
                    <!--name-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="name"> Name</label>
                            <input class="form-control py-4" id="name" type="text" placeholder="Enter Name" name="name" />
                        </div>
                    </div>
                    <!--phone-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="phone">Phone Number</label>
                            <input class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" name="phone" />
                        </div>
                    </div>
                </div>
                <!--email-->
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
                </div>
                <div class="form-row">
                    <!--password-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="password">Password</label>
                            <input class="form-control py-4" id="password" type="password" placeholder="Enter password" name="password" />
                            <font id="error" color="red"></font>
                        </div>

                    </div>
                    <!--confirm password-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="cpassword">Confirm Password</label>
                            <input class="form-control py-4" id="cpassword" name="cpassword" type="password" placeholder="Confirm password" />
                            <font id="cerror" color="red"></font>

                        </div>
                    </div>
                </div>
                <!--address-->
                <div class="form-group">
                    <label class="small mb-1" for="address"> Address </label>
                    <textarea class="form-control" name="address"></textarea>
                </div>

                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

                    <button type="submit" class="btn btn-secondary mainfullbtncolor btn-block"> Create Account </button>
                </div>
            </form>

            <div class=" mt-3 text-center ">
                <a href="login.php" class="loginLink text-decoration-none">Have an account? Go to login</a>
            </div>
        </div>
    </div>




</div>


<?php require 'frontend_footer.php' ?>