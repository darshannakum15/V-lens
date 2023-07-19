<?php
include('connection.php');

if (isset($_POST['ctus_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    if ($username === 'admin' && $password === '') { 
        
        
        session_start();
        $_SESSION['isAdmin'] = true;
        echo "<script>alert('Admin login successful. Redirecting to admin panel.✅'); window.location.href='admin_panel.php';</script>";
        exit();
    }

    $query = "SELECT * FROM v_users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        
        if ($password === $user['password']) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            echo "<script>alert('Login successful. Redirecting to account page.✅'); window.location.href='account.php';</script>";
            exit();
        }
    }

    echo "<script>alert('Invalid credentials.'); window.location.href='account.php';</script>";
    exit();
}
?>
