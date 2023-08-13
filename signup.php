<?php
session_start(); // Start the session

$status = isset($_SESSION['status']) ? $_SESSION['status'] : "";
if ($status === "logined") {
    header("Location: index.php");
}

// Retrieve the signup message from the session
$signupMessage = isset($_SESSION['signup_message']) ? $_SESSION['signup_message'] : "";

// Clear the session variable
unset($_SESSION['signup_message']);
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Saigon 2 - Sign Up</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img src="logo.png" alt="" />
          </a>
          <div class="navbar-collapse" id="">
            <ul class="navbar-nav justify-content-between ">
              <div class="User_option">
                <li class="">
                  <a class="mr-4" href="login.php">
                    Login
                  </a>
                  <a class="" href="signup.php">
                    Sign up
                  </a>
                </li>
              </div>
            </ul>

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
            <div class="overlay-content">
                <a href="index.php">HOME</a>
                <a href="about.php">ABOUT</a>
                <a href="house.php">HOUSE</a>
                <a href="price.php">PRICING</a>
                <a href="contact.php">CONTACT US</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-1">
            <div class="detail-box">
              <h1>
                <span></span> <br>
               <br>
              </h1>
              <p>
              </p>
              <div class="btn-box">
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- find section -->
  <section class="find_section">
    <div class="container" style="margin-top: 10%">
      <form action="signup_submited.php" method="post">
        <h3 style="text-align: center; margin-top: 10%">SIGN UP</h3><br>
        <div class="sale_section layout_padding-bottom">
            <div class="container-fluid">
                <div class="heading_container">
                    
                <?php if (!empty($signupMessage)) : ?>
                    <i style="color: red"><?php echo $signupMessage; ?></i>
                <?php endif; ?><br>

                    <div class="col-md-5">
                        <p>Username: </p>
                        <input type="text" class="form-control" placeholder="Username " name="username">
                    </div><br>
                    
                    <div class="col-md-5">
                        <p>Email<p>
                        <input type="email" class="form-control" placeholder="Email " name="email">
                    </div><br>

                    <div class="col-md-5">
                        <p>Password<p>
                        <input type="password" class="form-control" placeholder="Password " name="password">
                    </div><br>
                    
                    <div class="col-md-5">
                        <p>Re-enter password<p>
                        <input type="password" class="form-control" placeholder="Re-enter password " name="repassword">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="signup" class="">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
  </section>

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Apartment
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/phone.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/mail.png" width="18px" alt="">
              </div>
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="">
                  There are many
                </a>
              </li>
              <li>
                <a href="">
                  variations of
                </a>
              </li>
              <li>
                <a href="">
                  passages of
                </a>
              </li>
              <li>
                <a href="">
                  Lorem Ipsum
                </a>
              </li>
              <li>
                <a href="">
                  available, but
                </a>
              </li>
              <li>
                <a href="">
                  the i
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <i>Saigon 2</i>
      </p>
    </div>
  </section>
  <!-- end  footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>


</body>

</html>