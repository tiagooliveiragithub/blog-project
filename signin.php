<?php
    require 'config/constants.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
</head>
<body>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php
        if(isset($_SESSION['signup-success'])) : ?>
            <div class="alert__message success">
                <p>
                    <?= 
                    $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
                </p>
            </div>
        <?php endif ?> 
        <form action="">
            <input type="text" placeholder="Username or Email">
            <input type="text" placeholder="Passowrd">
            <button type="submit" class="btn">Sign In</button>
            <small>Dont't have an account? <a href="signup.php">Sign Up</a></small>
        </form>
    </div>
</section>
</body>
</html>