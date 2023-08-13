<?php
session_start(); // Start the session

require_once 'config.php'; // Include the database configuration file

// Retrieve the signup message from the session
$signupMessage = isset($_SESSION['signup_message']) ? $_SESSION['signup_message'] : "";
$status = isset($_SESSION['status']) ? $_SESSION['status'] : "";

// Clear the session variable
// unset($_SESSION['signup_message']);
// unset($_SESSION['status']);
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

  <title>Saigon 2</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
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
                <?php 
                    if ($status === "logined") {
                      ?> 
                      <a class="mr-4" href="logout.php">
                          Logout
                        </a>
                      <?php
                    } else { 
                      ?> 
                        <a class="mr-4" href="login.php">
                          Login
                        </a>
                        <a class="" href="signup.php">
                          Sign up
                        </a>
                      <?php
                    }
                  ?>
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
  </div>

  <!-- sale section -->

  <section class="sale_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          House For Sale
        </h2>
        <p>
         with more detailed information for houses or apartments for sale in Vietnam
      </div>
      <div class="sale_container">
      <?php
        if (isset($_POST['search'])) {
            $location = $_POST['location'];
            $category = $_POST['category'];
            if (($category == "") and ($location != "")) {
                // Retrieve property entries
                $query_house = "SELECT * FROM houses_for_sale WHERE location_house='$location'";
            } elseif (($category != "") and ($location == "")) {
                $query_house = "SELECT * FROM houses_for_sale WHERE category='$category'";  
            } elseif (($category != "") and ($location != "")) {
                $query_house = "SELECT * FROM houses_for_sale WHERE location_house='$location' AND category='$category'";
            } elseif (($category == "") and ($location == "")) {
                $query_house = "SELECT * FROM houses_for_sale";
            }
            
            $result_house = mysqli_query($conn, $query_house);

            $propertyData = array(); // Initialize an array to store property data
            
            if (mysqli_num_rows($result_house) > 0) {
                while ($row_house = mysqli_fetch_assoc($result_house)) {
                    $propertyData[] = $row_house;
                }
            } else {
                ?> 
                <div class="box">
                <div class="img-box">
                
                </div>
                <div class="detail-box">
                    <h3 style="text-align: center; margin-top: 10%">
                    SORRY
                    </h3>
                    <p style="text-align: center"> 
                    We can not find any result for you with your search !!!
                    <br><br>
                    <a style="text-align: center" href="house.php">
                    Read More
                    </a>
                    </p>
                    <i style="text-align: center">
                    </i>
                    
                </div>
                </div>
                
                <?php
            }
        }
      ?>
      <?php 
      
      for ($j = 0; $j < count($propertyData); $j++): 
        ?> 
        <div class="box">
          <div class="img-box">
          <img src="images/<?php echo $propertyData[$j]['picture_house'];?>" alt="Property Picture"></img>
          </div>
          <div class="detail-box">
            <h6>
              <?php echo $propertyData[$j]['house_name']; ?>
            </h6>
            <p>
              <?php echo $propertyData[$j]['description']; ?>            
            </p>
            <i>
              Address: <?php echo $propertyData[$j]['address']; ?>            
            </i>
          </div>
        </div>
        
      <?php endfor; ?>
    </div>
  </section>

  <!-- end sale section -->



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
</body>

</html>