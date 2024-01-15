<?php
require '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>/css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL ?>" class="nav__logo">BLOG</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>/blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>/about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>/services.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>/contact.php">Contact</a></li>
                <!-- <li><a href="signin.php">Signin</a></li> -->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="./images/avatar1.jpg" alt="Avatar">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <!-- end of navegation -->