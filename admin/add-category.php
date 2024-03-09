<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>

<div class="container">
   <div class="row">
      <div class="col-md-12">

         <div class="card">
            <div class="card-header">
               <h4>Add Categories</h4>
            </div>
            <div class="card-body">
               <form action="code.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-6 mb-2 ">
                        <label class="mb-0">Name</label>
                        <input type="text" required name="name" class="form-control " placeholder="Enter name">
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">slug</label>
                        <input type="text" required name="slug" class="form-control" placeholder="Enter slug">
                     </div>
                     <div class="col-md-12 mb-3">
                        <label class="mb-0">Description</label>
                        <textarea rows="3" required name="description" class="form-control"
                           placeholder="Enter description"></textarea>
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Upload Image</label>
                        <input type="file" required name="image" class="form-control" accept=".png,.gif,.jpg,.jpeg">
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Meta_title</label>
                        <input type="text" required name="meta_title" class="form-control"
                           placeholder="Enter meta-title">
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
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Status</label>
                        <input type="checkbox" name="status" placeholder="Enter status">
                     </div>
                     <div class="col-md-6 mb-2">
                        <label class="mb-0">Popular</label>
                        <input type="checkbox" name="popular" placeholder="Enter slug">
                     </div>

                     <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary" name="add-category">Save</button>
                     </div>

                  </div>

               </form>



            </div>
         </div>
      </div>
   </div>
</div>

<?php include('includes/footer.php') ?>