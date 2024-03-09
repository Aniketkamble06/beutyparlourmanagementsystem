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
            $query = "SELECT * FROM categories WHERE id='$id' ";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {

               $data = mysqli_fetch_array($query_run);



               ?>
               <div class="card">
                  <div class="card-header">
                     <h4>Edit Categories
                        <a href="category.php " class="btn btn-dark float-end">BACK</a>
                     </h4>
                  </div>
                  <div class="card-body">
                     <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-6 ">
                              <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                              <label for="">Name</label>
                              <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control"
                                 placeholder="Enter name ">
                           </div>
                           <div class="col-md-6 ">
                              <label for="">slug</label>
                              <input type="text" name="slug" value="<?= $data['slug'] ?>" class="form-control"
                                 placeholder="Enter slug">
                           </div>
                           <div class="col-md-12 mb-3">
                              <label for="">Description</label>
                              <textarea rows="3" name="description" class="form-control"
                                 placeholder="Enter description"><?= $data['description'] ?></textarea>
                           </div>
                           <div class="col-md-6">
                              <label for="">Upload Image</label>
                              <input type="file" name="image" accept=".png,.jpg,.jpeg,.gif" class="form-control">
                              <label for="">Current Image</label>
                              <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                              <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px">
                           </div>
                           <div class="col-md-6">
                              <label for="">Meta_title</label>
                              <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" class="form-control"
                                 placeholder="Enter meta-title">
                           </div>
                           <div class="col-md-12">
                              <label for="">Meta_description</label>
                              <textarea rows="3" name="meta_description" class="form-control"
                                 placeholder="Enter meta-description"><?= $data['meta_description'] ?></textarea>
                           </div>
                           <div class="col-md-12">
                              <label for="">Meta_keywords</label>
                              <textarea rows="3" name="meta_keywords" class="form-control"
                                 placeholder="Enter meta-keywords"><?= $data['meta_keywords'] ?></textarea>
                           </div>
                           <div class="col-md-6 ">
                              <label for="">Status</label>
                              <input type="checkbox" name="status" <?= $data['status'] ? "checked" : "" ?>
                                 placeholder="Enter status">
                           </div>
                           <div class="col-md-6">
                              <label for="">Popular</label>
                              <input type="checkbox" name="popular" <?= $data['popular'] ? "checked" : "" ?>
                                 placeholder="Enter slug">
                           </div>

                           <div class="col-md-12">
                              <button type="submit" class="btn btn-primary" name="update-category-btn">Upadate</button>
                           </div>

                        </div>

                     </form>



                  </div>
               </div>
            </div>
            <?php
            } else {
               echo "category not found";
            }
         } else {
            echo "Id missing from url";
         }
         ?>
   </div>
</div>

<?php include('includes/footer.php') ?>