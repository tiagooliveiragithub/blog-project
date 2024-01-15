<?php
    require 'config/database.php';

    // get signup form data if signup button was clicked
    if(isset($_POST['submit'])) {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $avatar = $_FILES['avatar'];

        // validate input values 
        if(!$firstname) {
            $_SESSION['signup'] = "Please insert your first name";
        } elseif(!$lastname) {
            $_SESSION['signup'] = "Please insert your last name";
        } elseif(!$username) {
            $_SESSION['signup'] = "Please insert your username name";
        } elseif(!$email) {
            $_SESSION['signup'] = "Please insert your email name";
        } elseif(strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
            $_SESSION['signup'] = "Password should have more than 8 characters";
        } elseif(!$avatar['name']) {
            $_SESSION['signup'] = "Please insert your avatar";
        } else {
            // checking if passwords dont match 
            if ($createpassword !== $confirmpassword) {
                $_SESSION['signup'] = "The passwords don't match";
            } else {
                // hashing the password 
                $hased_password = password_hash($createpassword, PASSWORD_DEFAULT);

                // checking if username or email already exist 
                
                $user_check_query = "SELECT * FROM users WHERE (username='$username' OR email='$email')";
                $user_check_result = mysqli_query($connection, $user_check_query);
                if(mysqli_num_rows($user_check_result) > 0) {
                    $_SESSION['signup'] = "Username or Email already exist";
                } else {
                    // working on avatar
                    $time = time();
                    $avatar_name = $time . $avatar['name'];
                    $avatar_tmp_name = $avatar['tmp_name'];
                    $avatar_destination_path = 'images/' . $avatar_name;

                    // make sure file is an image 
                    $allowed_files = ['png', 'jpg', 'jpeg'];
                    $extention = explode('.', $avatar_name);
                    $extention = end($extention);

                    if(in_array($extention, $allowed_files)) {
                        // check if the size of avatar isnt bigger than 1mb 
                        if($avatar['size'] < 1000000) {
                            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                        } else {
                            $_SESSION['signup'] = "File size is too large (1MB max).";
                        }
                    } else {
                        $_SESSION['signup'] = "File should be a image (jpg, jpeg, png).";
                    }
                }
            }
        }

        // redirect to signup page if we any problem 
        if(isset($_SESSION['signup'])) {
            $_SESSION['signup-data'] = $_POST;
            header('location: ' . ROOT_URL . 'signup.php');
            die();
        } else {
            $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES ('$firstname', '$lastname', '$username', '$email', '$hased_password', '$avatar_name', 0)";
            $insert_user_result = mysqli_query($connection, $insert_user_query);

            if(!mysqli_errno($connection)) {
                //redirect to login page with success message
                $_SESSION['signup-success'] = "Registration successful. Please log in!";
                header('location: ' . ROOT_URL . 'signin.php');
                die();
            } else {
                die(mysqli_error($connection));
            }
        }

    } else { 
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    }