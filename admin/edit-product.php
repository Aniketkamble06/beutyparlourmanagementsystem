<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $update_product_query = "SELECT * FROM  products WHERE id='$id' ";
                $update_product_query_run = mysqli_query($con, $update_product_query);

                if (mysqli_num_rows($update_product_query_run) > 0) {
                    $data = mysqli_fetch_array($update_product_query_run);

                    ?>


                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product
                                <a href="viewproduct.php " class="btn btn-dark float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-2 ">
                                        <label class="mb-0">Select Category</label>
                                        <select class="form-select" name="category_id">
                                            <option selected>Select Category</option>
                                            <?php
                                            $query = "SELECT * FROM categories ";
                                            $query_run = mysqli_query($con, $query);

                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    ?>

                                                    <option value="<?= $row['id']; ?>" <?= $data['category_id'] == $row['id'] ? 'selected' : '' ?>>
                                                        <?= $row['name']; ?>
                                                    </option>

                                                    <?php
                                                }
                                            } else {
                                                echo "No category available ";
                                            }

                                            ?>


                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6 mb-2">
                                        <label class="mb-0">Name</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control mb-2"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="col-md-6  mb-2">
                                        <label class="mb-0">slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug']; ?>" class="form-control"
                                            placeholder="Enter slug">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="mb-0">Small Description</label>
                                        <textarea rows="3" required name="small_description" class="form-control"
                                            placeholder="Enter small description"><?= $data['small_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="mb-0"> Description</label>
                                        <textarea rows="3" required name="description" class="form-control"
                                            placeholder="Enter description"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="mb-0">Original Price</label>
                                        <input type="text" required name="original_price"
                                            value="<?= $data['original_price']; ?>" class="form-control"
                                            placeholder="Enter Original Price">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="mb-0">Selling Price</label>
                                        <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>"
                                            class="form-control" placeholder="Enter Selling Price">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="mb-0">Upload Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <input type="file" name="image" class="form-control" accept=".png,.gif,.jpg,.jpeg">
                                        <label class="mb-0">Current Image</label>
                                        <img src="../uploads/<?= $data['image']; ?>" height="50px" width="50px"
                                            alt="Product Image">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0">Quantity</label>
                                            <input type="number" required name="qty" value="<?= $data['qty']; ?>"
                                                class="form-control" placeholder="Enter Quantity ">
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="mb-0">Status</label><br>
                                            <input type="checkbox" name="status" <?= $data['status'] == '0' ? '' : 'checked' ?>>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="mb-0">Trending</label><br>
                                            <input type="checkbox" name="trending" <?= $data['trending'] == '0' ? '' : 'checked' ?>>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="mb-0">Meta_title</label>
                                    <input type="text" required name="meta_title" value="<?= $data['meta_title']; ?>"
                                        class="form-control" placeholder="Enter meta-title">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta_description</label>
                                    <textarea rows="3" name="meta_description" class="form-control"
                                        placeholder="Enter meta-description"><?= $data['meta_description']; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta_keywords</label>
                                    <textarea rows="3" name="meta_keywords" class="form-control"
                                        placeholder="Enter meta-keywords"><?= $data['meta_keywords']; ?></textarea>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <button type="submit" class="btn btn-primary" name="update-product-btn">UPADATE</button>
                                </div>

                        </div>
                        </form>

                    </div>

                    <?php
                } else {
                    echo "No Product found for given id";
                }
            } else {
                echo "Id is missing from url";
            }

            ?>





        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>