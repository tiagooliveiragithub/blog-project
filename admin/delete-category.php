<?php
require 'config/database.php';

if(isset($_GET['id'])) {

    // fetch category from db 
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);


    // later (put the posts with this category with uncategorized)



    // delete category from db 
    $delete_category_query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $delete_category_result = mysqli_query($connection, $delete_category_query);

    if(mysqli_errno($connection)) {
        $_SESSION['delete-category'] = "Problem deleting category '{$category['title']}'";
    } else {
        $_SESSION['delete-category-success'] = "Category {$category['title']} deleted successfully";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-categories.php');
die();