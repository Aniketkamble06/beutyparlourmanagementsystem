<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php')

   ?>


<div class="container">
   <div class="row">
      <div class="col-md-12">

         <div class="card">
            <div class="card-header">
               <h4>Add Product
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

                                 <option value="<?= $row['id']; ?>">
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
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Name</label>
                        <input type="text" name="name" class="form-control mb-2" placeholder="Enter name">
                     </div>
                     <div class="col-md-6  mb-2">
                        <label class="mb-0">slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Enter slug">
                     </div>
                     <div class="col-md-12 mb-2">
                        <label class="mb-0">Small Description</label>
                        <textarea rows="3" required name="small_description" class="form-control"
                           placeholder="Enter small description"></textarea>
                     </div>
                     <div class="col-md-12 mb-2">
                        <label class="mb-0"> Description</label>
                        <textarea rows="3" required name="description" class="form-control"
                           placeholder="Enter description"></textarea>
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Original Price</label>
                        <input type="text" required name="original_price" class="form-control"
                           placeholder="Enter Original Price">
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Selling Price</label>
                        <input type="text" required name="selling_price" class="form-control"
                           placeholder="Enter Selling Price">
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Upload Image</label>
                        <input type="file" required name="image" class="form-control" accept=".png,.gif,.jpg,.jpeg">
                     </div>

                     <div class="row">
                        <div class="col-md-6 mb-2">
                           <label class="mb-0">Quantity</label>
                           <input type="number" required name="qty" class="form-control" placeholder="Enter Quantity ">
                        </div>
                        <div class="col-md-3 mb-2">
                           <label class="mb-0">Status</label><br>
                           <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-3 mb-2">
                           <label class="mb-0">Trending</label><br>
                           <input type="checkbox" name="trending">
                        </div>
                     </div>

                  </div>
                  <div class="col-md-6 mb-2">
                     <label class="mb-0">Meta_title</label>
                     <input type="text" required name="meta_title" class="form-control" placeholder="Enter meta-title">
                  </div>
                  <div class="col-md-12 mb-2">
                     <label class="mb-0">Meta_description</label>
                     <textarea rows="3" required name="meta_description" class="form-control"
                        placeholder="Enter meta-description"></textarea>
                  </div>
                  <div class="col-md-12 mb-2">
                     <label class="mb-0">Meta_keywords</label>
                     <textarea rows="3" required name="meta_keywords" class="form-control"
                        placeholder="Enter meta-keywords"></textarea>
                  </div>
                  <div class="col-md-12 mb-2">
                     <button type="submit" class="btn btn-primary" name="add-product-btn">Save</button>
                  </div>

            </div>
            </form>



         </div>
      </div>
   </div>
</div>


<?php include('includes/footer.php') ?>