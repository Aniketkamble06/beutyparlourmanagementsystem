<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');


?>


<div class="container">
    <h3 class="mt-4">Users</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item ">Users</li>

    </ol>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header " style="background-color: aqua;">
                    <h4> Edit Registered User</h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET)) {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM users WHERE id='$user_id'";
                        $users_run = mysqli_query($con, $users);
                        if (mysqli_num_rows($users_run) > 0) {
                            foreach ($users_run as $user) {
                                ?>



                                <form action="code.php" method="post">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" value="<?= $user['name']; ?>" class="form-control"
                                                placeholder="Enter Your Name" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email"
                                                required>
                                        </div>
                                        <div class=" col-md-6 mb-3">
                                            <label class="form-label">Phone </label>
                                            <input type="number" name="phone" value="<?= $user['phone']; ?>" class="form-control"
                                                placeholder="Enter Your Mobile No" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Role as</label>
                                            <select name="role_as" required class="form-control">
                                                <option value="">--Select Role--</option>
                                                <option value="1" <?= $user['role_as'] == '1' ? 'selected' : '' ?>>Admin</option>
                                                <option value="0" <?= $user['role_as'] == '0' ? 'selected' : '' ?>>user</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $user['status'] == '1' ? 'checked' : '' ?>
                                            width="70px" height="70px" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="edit-user-register" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>


                                <?php

                            }
                        } else {
                            ?>
                            <h4>No Record Found</h4>
                            <?php
                        }

                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>