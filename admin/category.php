<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');


?>


<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cat_query = "SELECT * FROM  categories ";
                            $cat_query_run = mysqli_query($con, $cat_query);
                            if (mysqli_num_rows($cat_query_run) > 0) {
                                foreach ($cat_query_run as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['id']; ?>
                                        </td>
                                        <td>
                                            <?= $row['name']; ?>
                                        </td>
                                        <td> <img src="../uploads/<?= $row['image']; ?>" height="100px" width="100px"
                                                alt="<?= $row['name']; ?>">

                                        </td>
                                        <td>
                                            <?= $row['status'] == '0' ? "visible" : "hidden" ?>
                                        </td>
                                        <td><a href="edit-category.php?id=<?= $row['id']; ?>"
                                                class="btn btn-info btn-sm">Edit</a></td>

                                        <td>
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="category_id" value="<?= $row['id']; ?>">
                                                <button type="submit" name="Delete_category_btn"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </form>
                                        </td>


                                    </tr>
                                    <?php

                                }
                            } else {

                                echo "No records found";

                            }


                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


<?php include('includes/footer.php') ?>