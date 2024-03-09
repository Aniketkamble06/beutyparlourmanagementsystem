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
                    <h4>Products</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!-- <th>ID</th>
                                <th>PRODUCT NAME</th>
                                <th>STATUS</th>
                                <th>IMAGE</th>
                                <th>EDIT</th>
                                <th>DELETE</th> -->
                                <th>ID</th>
                                <th>PRODUCT NAME</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $product = "SELECT * FROM products";
                            $product_run = mysqli_query($con, $product);


                            if (mysqli_num_rows($product_run) > 0) {

                                foreach ($product_run as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row['id']; ?>
                                        </td>
                                        <td>
                                            <?= $row['name']; ?>
                                        </td>
                                        <!-- <td>
                                            <img src="../uploads/<?= $row['image']; ?>" height="100px" ; width="100px" ;
                                                alt="<?= $row['name']; ?>">
                                        </td>

                                        <td>
                                            <?= $row['status'] == '0' ? "visible" : "hidden"; ?>
                                        </td> -->

                                        <td>
                                            <?= $row['original_price']; ?>
                                        </td>
                                        <td>
                                            <?= $row['qty']; ?>
                                        </td>
                                        <td>
                                            <?= $row['original_price'] * $row['qty'] ?>
                                        </td>
                                        


                                        <td> <a class="btn btn-info btn-sm"
                                                href="edit-product.php?id=<?= $row['id']; ?>">EDIT</a></td>

                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm product_delete_btn"
                                                value="<?= $row['id']; ?>">DELETE</button>
                                        </td>

                                    </tr>
                                    <?php
                                }

                            } else {
                                echo "No Products Available...!";
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