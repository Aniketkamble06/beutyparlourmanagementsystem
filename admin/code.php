<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');


// Registered user page------------------------------------------------------------

if (isset($_POST['delete_user'])) {
    $user_id = $_POST['delete_user'];

    $query = "DELETE FROM users  WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Admin/User Delete Successfully..!";
        header('Location:viewregister.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong...!";
        header('Location:viewregister.php');
        exit(0);
    }
} elseif (isset($_POST['edit-user-register'])) {
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';
    $query = "UPDATE users SET  name='$name', email='$email', phone='$phone',  role_as='$role_as', status='$status' WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Admin/User   Upadate Successfully..!";
        header('Location:viewregister.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong..!";
        header('Location:viewregister.php');
        exit(0);
    }
} elseif (isset($_POST['add-user-register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';


    $insert_query = "INSERT INTO users (name, email,phone,password, role_as,status) VALUES('$name', '$email', '$phone', '$password', '$role_as', '$status')";
    $insert_query_run = mysqli_query($con, $insert_query);


    if ($insert_query_run) {
        $_SESSION['message'] = "Admin/User Added Successfully..!";
        header('Location:viewregister.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong..!";
        header('Location:viewregister.php');
        exit(0);
    }
}

//------------------------------------------------------------------------------------------------------//

//Category -----------------------------------------------------------------------------------------//
elseif (isset($_POST['add-category'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;


    $cat_query = "INSERT INTO categories 
    (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

    $cat_query_run = mysqli_query($con, $cat_query);


    if ($cat_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("add-category.php", "Category Added Successfuslly..! ");
    } else {
        redirect("add-category.php", "Somthing went wrong");
    }


} elseif (isset($_POST['update-category-btn'])) {

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        //$update_filename= $new_image
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $path = "../uploads";
    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title ',
    meta_description='$meta_description',  meta_keywords='$meta_keywords', status='$status ',  popular='$popular', image='$update_filename'
    WHERE id='$category_id'  ";


    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run) {

        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }

        }
        redirect("edit-category.php?id=$category_id", "Category Upadated Successfully..!");


    } else {
        redirect("edit-category.php?id=$category_id", "Something went wrong..!");
    }

} elseif (isset($_POST['Delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_category = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_category_run = mysqli_query($con, $delete_category);

    if ($delete_category_run) {
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }

        $_SESSION['message'] = "Category Deleted Successfully..!";
        header('Location:category.php');
        exit(0);

    } else {
        $_SESSION['message'] = "Something went wrong...!";
        header('Location:category.php');
        exit(0);
    }

}
//-------------------Product ---------------------------------//
elseif (isset($_POST['add-product-btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];

    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time() . '.' . $image_ext;




    if ($name != "" && $slug != "" && $description != "") {

        $product = "INSERT INTO products (category_id ,name, slug, small_description, description, original_price, selling_price,
        qty, meta_title, meta_description, meta_keywords, status,trending,image)
        VALUES('$category_id','$name','$slug', '$small_description', '$description', '$original_price', '$selling_price',
         '$qty', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$trending', '$filename')";


        $product_run = mysqli_query($con, $product);


        if ($product_run) {

            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
            redirect("add-product.php", "Product Added Successfully...!");
        } else {
            redirect("add-product.php", "Something went wrong...!");
        }


    } else {
        redirect("add-product.php", "All fields are manadatary...!");
    }











} elseif (isset($_POST['update-product-btn'])) {

    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];

    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];


    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_product_query = "UPDATE products SET category_id='$category_id', name='$name', slug='$slug', small_description='$small_description', description='$description',
     original_price='$original_price', selling_price='$selling_price', qty='$qty', meta_title='$meta_title', meta_description='$meta_description',
     meta_keywords='$meta_keywords', status='$status',trending='$trending', image='$update_filename' WHERE id='$product_id' ";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if ($update_product_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }

        redirect("edit-product.php?id=$product_id", "Product Added Successfully...!");
    } else {
        redirect("edit-product.php?id=$product_id", "Something went wrong...!");
    }

} elseif (isset($_POST['product_delete_btn'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_product = "DELETE FROM products WHERE id='$product_id' ";
    $delete_product_run = mysqli_query($con, $delete_product);

    if ($delete_product_run) {
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        // redirect("viewproduct.php", "Product Deleted Successfully...!");
        echo 200;
    } else {
        //redirect("viewproduct.php", "Something went wrong...!");
        echo 500;
    }

} else {
    header('Location: ../index.php');
}


?>