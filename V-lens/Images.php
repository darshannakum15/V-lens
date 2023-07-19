
<?php
session_start();
include('connection.php');

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // Fetch the user's information from the database based on the username
    $query = "SELECT * FROM v_users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $email = $user['email'];
    }
}

// Logout logic
if (isset($_GET['logout'])) {
    // Clear all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to the account.php page or any other desired page
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-lens Images</title>
    <link rel="icon" href="/assets/img/icons/favicon.ico">
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--cusrtom css file link--->
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<style>
    #logout-link {
        background-color: red;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<body>

    <!-- header section starts -->
    <section class="header">
        <a href="index.php" class="logo" id="logo">V-Lens</a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="About.php">About</a>
            <a href="Images.php">Images</a>
            <a href="ContactUs.php">Contact Us</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="#" style="background-color:white;color:black;cursor:default;">
                    <?php echo $_SESSION['username']; ?>
                </a>
                <a href="account.php?logout=true" id="logout-link" type="submit" name="submit">Log out</a>
            <?php else: ?>
                <a href="account.php">Account</a>
            <?php endif; ?>
        </nav>
        <div id="menu-btn" class="fas fa-bars"> </div>
    </section>
    <!-- heaer section ends -->



    <div class="heading" style="background:url(assets/img/about/2.png) no-repeat">
        <h1>Images</h1>
    </div>


    <!-- images section started -->

    <section class="imgs">

        <h1 class="heading-title">Wallpapers</h1>
        <div class="full-img" id="fullImgBox">
            <a href="#"><img src="/assets/img/top_stories/4.png" alt="" id="fullImg"></a>
            <span onclick="closeFullImg()"><i class="fa fa-times"></i></span>

        </div>
        <div class="img-gallery">
            <img src="assets/img/top_stories/2.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/4.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/3.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/2.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/1.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/2.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/1.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/4.png" alt="" onclick="openFullImg(this.src)">
            <img src="assets/img/top_stories/5.png" alt="" onclick="openFullImg(this.src)">
       </div>


    </section>

    <!-- images section ended -->



    <!-- footer section starts -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="index.php"><i class="fas fa-angle-right"></i>Home</a>
                <a href="About.php"><i class="fas fa-angle-right"></i>About</a>
                <a href="Images.php"><i class="fas fa-angle-right"></i>Images</a>
                <a href="ContactUs.php"><i class="fas fa-angle-right"></i>Contact Us</a>
            </div>

            <div class="box">
                <h3>Extra Links</h3>
                <a href="#"><i class="fas fa-angle-right"></i>Ask Questions</a>
                <a href="#"><i class="fas fa-angle-right"></i>Privacy policy</a>
                <a href="#"><i class="fas fa-angle-right"></i>Terms of use</a>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"><i class="fas fa-phone"></i> +91 999XX9XX99 </a>
                <a href="#"><i class="fas fa-phone"></i> +91 999XX9XX98 </a>
                <a href="#"><i class="fas fa-envelope"></i> alonewarrior2004@gmail.com </a>
                <a href="#"><i class="fas fa-map"></i> Jamnagar, India - 361009  </a>
            </div>

            <div class="box">
                <h3>Follow Us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> FaceBook </a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter </a>
                <a href="#"><i class="fab fa-instagram"></i> Instagram </a>
                <a href="#"><i class="fab fa-linkedin"></i> Linkedin  </a>
            </div>

        </div>
        <div class="credit">Created By <span> Darshan Nakum</span> | all rights reseverd! © 2023</div>
    </section>

    <!-- footer section ends -->






<!-- swiper  -->
<!-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> -->
<!-- custom js file link -->
<script src="assets/js/script.js"></script>

</body>
</html>