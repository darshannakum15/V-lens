
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
    <title>V-lens</title>
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

    <!-- home section starts -->

    <section class="home">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="/assets/img/cube/1.png" />
              </div>
              <div class="swiper-slide">
                <img src="/assets/img/cube/2.png" />
              </div>
              <div class="swiper-slide">
                <img src="/assets/img/cube/3.png" />
              </div>
              <div class="swiper-slide">
                <img src="/assets/img/cube/4.png" />
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
    </section>

    <!-- home section ends -->

    <!-- services section starts -->

    <section class="services">

        <h1 class="heading-title">Catagories</h1>

        <div class="box-container">
            <div class = "box">
                <img src="assets/img/icons/ic_1.png" alt="Wallpapers">
                <h3>Wallpapers</h3>
            </div>

            <div class ="box">
                <img src="assets/img/icons/ic_2.png" alt="Anime">
                <h3>Anime</h3>
            </div>

            <div class ="box">
                <img src="assets/img/icons/ic_3.png" alt="Lights">
                <h3>Lights</h3>
            </div>

            <div class ="box">
                <img src="assets/img/icons/ic_4.png" alt="Landscapes">
                <h3>Landscapes</h3>
            </div>

            <div class ="box">
                <img src="assets/img/icons/ic_5.png" alt="Travel">
                <h3>Travel</h3>
            </div>

            <div class ="box">
                <img src="assets/img/icons/ic_6.png" alt="Art & Culture">
                <h3>Art & Culture</h3>
            </div>

        </div>

    </section>

    <!-- services section ends -->

    <!-- aboout section starts -->

    <section class="home-about">


        <div class="image">
            <img src="/assets/img/home_about.jpg" alt="img">
        </div>

        <div class="content">
            <h3>V-Lens Words</h3>
            <p>We invite you to browse our extensive collection of images and find the perfect ones for your needs. Thank you for choosing V-Lens!</p>
            <a href="About.php" class="btn">Read More</a>
        </div>

    </section>

    <!--  about section ends -->

     <!-- Top strories section starts -->

     <section class="home-stories">

        <h1 class="heading-title"> Top stories</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="/assets/img/top_stories/1.png" alt="">
                </div>

                <div class="content">
                    <h3>Taj Mahal</h3>

                    <p>Taj Mahal needs no introduction. This monument is on the list of the Seven Wonders of the World. No wonder people swarm in flies all year round to witness the magnificence of his beauty. This monument is located in India in the city of Agra in Uttar Pradesh. In other words, Taj Mahal marks the excellence of Mughal architecture.</p>

                    <a href="Images.php" class="btn">View</a>
                </div>

            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/img/top_stories/2.png" alt="">
                </div>

                <div class="content">
                    <h3>Beach of the Cathedrals, Galicia, Spain</h3>

                    <p>You'll do a double take when you see the rocky arches at the Beach of the Cathedrals: these incredible buttress-like formations were shaped solely by nature.
                    </p>

                    <a href="Images.php" class="btn">View</a>

                </div>

            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/img/top_stories/3.png" alt="">
                </div>

                <div class="content">
                    <h3>The Dead Sea, Israel and Jordan</h3>

                    <p>Sitting at 1,410 feet below sea level, the Dead Sea is the lowest body of water on Earth's surface. Located in a desert and featuring a high concentration of salt, it's the perfect spot for floating.
                    </p>

                    <a href="Images.php" class="btn">View</a>

                </div>

            </div>


        </div>





    </section>

    <!-- Top strories section ends -->

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
        <div class="credit">Created By <span> Darshan Nakum</span> | All Rights Reseverd! © 2023</div>
    </section>

    <!-- footer section ends -->







<!-- swiper  -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- custom js file link -->
<script src="assets/js/script.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
            effect: "cube",
            grabCursor: true,
            cubeEffect: {
                shadow: true,
                slideShadows: false,
                shadowOffset: 20,
                shadowScale: 0.94,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  loop: true,
});

</script>


</body>
</html>