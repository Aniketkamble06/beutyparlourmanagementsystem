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

            <?php
            if (isset($_SESSION['message'])) {

                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong>
                    <?= $_SESSION['message']; ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
                unset($_SESSION['message']);
            }
            ?>

            <div class="card">
                <div class="card-header " style="background-color: aqua;">
                    <h4>Registered User
                        <a href="add-register.php " class="btn btn-dark float-end">Add Admin</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['id']; ?>
                                        </td>
                                        <td>
                                            <?= $row['name']; ?>
                                        </td>
                                        <td>
                                            <?= $row['email']; ?>
                                        </td>
                                        <td>
                                            <?= $row['phone']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['role_as'] == '1') {
                                                echo 'Admin';
                                            } elseif ($row['role_as'] == '0') {
                                                echo 'User';
                                            }
                                            ?>
                                        </td>
                                        <td><a href="edit-register.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a>
                                        </td>
                                        <form action="code.php" method="post">
                                            <td><button type="submit" name="delete_user" value="<?= $row['id']; ?>"
                                                    class="btn btn-danger">Delete</button></td>
                                        </form>

                                    </tr>
                                    <?php
                                }

                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                                <?php
                            }

                            ?>





                        </tbody>

                    </table>



                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>