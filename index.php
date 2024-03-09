<?php
session_start();
include('includes/header.php');

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

include('admin/includes/slider.php');

?>


<div class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">



                <h1>Hello, world! <i class="fa fa-user"></i></h1>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>