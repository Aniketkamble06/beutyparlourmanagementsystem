<?php 
$page= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../admin/index.php" target="_blank">
        <img src="assets/images/hair.jpg" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Archana Parlour</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link text-white  <?= $page == "index.php" ? 'active bg-gradient-primary':'';?>" href="../admin/index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-home opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">dashboard</span>
          </a>
        </li>
      <li class="nav-item">
          <a class="nav-link text-white  <?= $page == "viewregister.php" ? 'active bg-gradient-primary':'';?> " href="../admin/viewregister.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-users  opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Registered User</span>
          </a>
        </li>
        <li class="nav-item dropdown">
        
          <a class="nav-link dropdown-toggle <?= $page == "category.php" ? 'active bg-gradient-primary':'';?>" href="category.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item  <?= $page == "category.php" ? 'active bg-gradient-primary':'';?>" href="category.php">All Category</a></li>
          
            <li><a class="dropdown-item <?= $page == "add-category.php" ? 'active bg-gradient-primary':'';?>" href="add-category.php">Add Category</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $page == "viewproduct.php" ? 'active bg-gradient-primary':'';?>" href="viewproduct.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Product
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="viewproduct.php">All Product</a></li>
            <li><a class="dropdown-item" href="add-product.php">Add Product</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $page == "viewservices.php" ? 'active bg-gradient-primary':'';?>"  href="viewservices.php" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs nav_icon"></i>Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Manage Services</a></li>
            <li><a class="dropdown-item" href="#">Add Services</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gallery
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Manage Gallery</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About us
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Manage About</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="all-appointment.php"><i class="fa fa-check-square-o nav_icon"></i>Appointment<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
                <li>
                  <a href="all-appointment.php">All Appointment</a>
                </li>
                <li>
                  <a href="new-appointment.php">New Appointment</a>
                </li>
                <li>
                  <a href="accepted-appointment.php">Accepted Appointment</a>
                </li>
                <li>
                  <a href="rejected-appointment.php">Rejected Appointment</a>
                </li>
              </ul>
            
            </li>
        <li class="nav-item">
          <a class="nav-link text-white  " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-order  opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Order</span>
          </a>
        </li>

      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php" type="button">Logout</a>
      </div>
    </div>
  </aside>