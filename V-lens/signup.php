<?php
include('connection.php');

if (isset($_POST['ctus_signup']) && $_POST['form_submitted'] == 1) {
    $username = trim($_POST['ctus_user_name']);
    $email = trim($_POST['ctus_email']);
    $name = trim($_POST['ctus_name']);
    $password = $_POST['ctus_password'];
    $confirmPassword = $_POST['ctus_confirm_password'];

    
    if (strlen($username) < 4 || strlen($username) > 15) {
        echo "<script>alert('Username should be between 4 and 15 characters long.'); window.location.href='account.php';</script>";
        exit();
    }

    
    if (strpos($username, ' ') !== false) {
        echo "<script>alert('Username cannot contain white spaces.'); window.location.href='account.php';</script>";
        exit();
    }

    
    if (strlen($name) < 4 || strlen($name) > 30) {
        echo "<script>alert('Name should be between 4 and 30 characters long.'); window.location.href='account.php';</script>";
        exit();
    }

    if (trim($name) === '') {
        echo "<script>alert('Name cannot be empty.'); window.location.href='account.php';</script>";
        exit();
    }

    
    $query = "SELECT * FROM v_users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists. Please use a different email.'); window.location.href='account.php';</script>";
        exit();
    }

    
    if (strlen($email) > 30) {
        echo "<script>alert('Email should be up to 30 characters long.'); window.location.href='account.php';</script>";
        exit();
    }

    
    if (strpos($email, ' ') !== false) {
        echo "<script>alert('Email cannot contain white spaces.'); window.location.href='account.php';</script>";
        exit();
    }

    
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo "<script>alert('Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.'); window.location.href='account.php';</script>";
        exit();
    }

    
    $query = "SELECT * FROM v_users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.'); window.location.href='account.php';</script>";
        exit();
    }

    
    if ($password !== $confirmPassword) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location.href='account.php';</script>";
        exit();
    } else {
        
        $query = "INSERT INTO v_users (username, email, name, password) VALUES ('$username', '$email', '$name' , '$password')";

        
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Sign up successful. You can now log in ✅'); window.location.href='account.php';</script>";
            exit();
        } else {
            echo "<script>alert('⚠ Database Connection Error ⚠'); window.history.back();</script>";
            exit();
        }
    }
}
?>
