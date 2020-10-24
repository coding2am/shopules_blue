<?php  
    require 'header.php';
    require 'db_connect.php';

    $qry = "SELECT * FROM users 
            INNER JOIN model_has_roles ON model_has_roles.user_id = users.id
            WHERE model_has_roles.role_id != 1";
    $stmt = $conn->prepare($qry);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    echo "<pre>".print_r($users , true)."</pre>";

?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> User </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            foreach ($users as $user)
                            {?>
                                <tr>
                                    <td><?= $num++; ?></td>
                                    <td>
                                        <img width="30" height="30" src="<?= $user['profile'] ?>" alt="">
                                        <?= $user['name'] ?>
                                    </td>
                                    <td>
                                        <b><?= $user['phone'] ?></b><br>
                                        <?= $user['address'] ?>
                                    </td>
                                    <td>
                                        <a onclick='return confirm("Are you sure?")' href="customer_delete.php?uid=<?= $user['id']; ?>" class="btn btn-outline-danger">
                                            <i class="icofont-close"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  
    require 'footer.php'
?>