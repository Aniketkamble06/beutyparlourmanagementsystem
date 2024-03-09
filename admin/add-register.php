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

    <div class="row mt-4">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header " style="background-color: aqua;">
                    <h4> Add Admin/User
                        <a href="viewregister.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Your Email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Enter Password" required>
                            </div>

                            <div class=" col-md-6 mb-3">
                                <label class="form-label">Phone </label>
                                <input type="number" name="phone" class="form-control"
                                    placeholder="Enter Your Mobile No" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Role as</label>
                                <select name="role_as" required class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="1">>Admin</option>
                                    <option value="0">>user</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" width="70px" height="70px" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" name="add-user-register" class="btn btn-primary">Add
                                Admin/User</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>