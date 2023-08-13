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
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-1">
            <div class="detail-box">
              <h1>
                <?php 
                  if ($status === "logined") {
                    ?> 
                    <span>Welcome <?php echo $signupMessage; ?>,</span>
                    <br>
                      To Modern Apartment <br>
                      House
                    </h1>
                    <?php
                  } else { 
                ?> 
                    <span>Modern </span>
                    <br>
                      Apartment <br>
                      House
              </h1>
                  <?php
                }
              ?> 
              <p>
              Experience the convenience of our online tools, dedicated customer support, and a commitment to delivering exceptional service. Let be your partner in finding the perfect property, turning your real estate aspirations into reality. Explore our listings today and embark on a seamless path towards your new home in beautiful Vietnam.
              </p>
              <div class="btn-box">
                <a href="" class="">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- find section -->
  <section class="find_section ">
    <div class="container">
      <form action="house_filter.php" method="post">
        <div class=" form-row">
          <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Search Your Categories" name="category" value="">
          </div>
          <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Location " name="location">
          </div>
          <div class="col-md-2">
            <button type="submit" class="" name="search">
              search
            </button>
          </div>
        </div>

      </form>
    </div>
  </section>

  <!-- end find section -->


  <!-- about section -->

  <section class="about_section layout_padding-bottom">
    <div class="square-box">
      <img src="images/square.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Our Apartment
              </h2>
            </div>
            <p>
            Welcome to SAI GON 2 – Your Trusted Real Estate Partner in Vietnam! At SAIGON 2, we're dedicated to helping you find your dream property, whether it's a luxurious beachfront villa, a charming countryside cottage, a modern city apartment, or a serene mountain retreat. Our team of experienced agents is here to guide you through every step of the buying and selling process, providing expert advice, personalized assistance, and a deep understanding of the local real estate market.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- sale section -->

  <section class="sale_section layout_padding-bottom">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          House For Sale
        </h2>
        <p>
          with more detailed information for houses or apartments for sale in Vietnam
        </p>
      </div>
      <div class="sale_container">

      <?php
        // Retrieve property entries
        $query_house = "SELECT * FROM houses_for_sale";
        $result_house = mysqli_query($conn, $query_house);

        $propertyData = array(); // Initialize an array to store property data

        if (mysqli_num_rows($result_house) > 0) {
            while ($row_house = mysqli_fetch_assoc($result_house)) {
                $propertyData[] = $row_house;
            }
        }

      ?>
      <?php 
      
      for ($j = 0; $j < count($propertyData); $j++): 
      if ($j < 6) { 
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
        <?php
      }?>
        
      <?php endfor; ?>

        
        <!-- <div class="box">
          <div class="img-box">
            <img src="images/s-2.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              apertments house
            </h6>
            <p>
              There are many variations of passages of Lorem Ipsum available, but
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-3.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              apertments house
            </h6>
            <p>
              There are many variations of passages of Lorem Ipsum available, but
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-4.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              apertments house
            </h6>
            <p>
              There are many variations of passages of Lorem Ipsum available, but
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-5.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              apertments house
            </h6>
            <p>
              There are many variations of passages of Lorem Ipsum available, but
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-6.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              apertments house
            </h6>
            <p>
              There are many variations of passages of Lorem Ipsum available, but
            </p>
          </div>
        </div> -->
      </div>
      <div class="btn-box">
        <a href="house.php">
          Find More
        </a>
      </div>
    </div>
  </section>

  <!-- end sale section -->

  <!-- price section -->

  <section class="price_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Pricing
        </h2>
        <p>
        We specialize in offering a wide range of properties to suit every price point, ensuring that you can explore options that align with your financial goals. Whether you're looking for an exclusive luxury villa, a cozy apartment, a charming suburban house, or an investment opportunity, we have properties that cater to various budgets.

</p>
      </div>
      <div class="price_container">
        <div class="box">
          <div class="detail-box">
            <div class="heading-box">
              <h4>
                01
              </h4>
              <h6>
                Basic
              </h6>
            </div>
            <div class="text-box">
              <h2>
                $1000.00
              </h2>
              <ul>
                <li>
                  variations of
                </li>
                <li>
                  passages of Lorem
                </li>
                <li>
                  Ipsum available,
                </li>
                <li>
                  but the majority
                </li>
                <li>
                  have suffered
                </li>
                <li>
                  alteration in
                </li>
              </ul>
            </div>
          </div>
          <div class="btn-box">
            <a href="">
              Buy Now
            </a>
          </div>
        </div>
        <div class="box">
          <div class="detail-box">
            <div class="heading-box">
              <h4>
                02
              </h4>
              <h6>
                Standard
              </h6>
            </div>
            <div class="text-box">
              <h2>
                $2000.00
              </h2>
              <ul>
                <li>
                  variations of
                </li>
                <li>
                  passages of Lorem
                </li>
                <li>
                  Ipsum available,
                </li>
                <li>
                  but the majority
                </li>
                <li>
                  have suffered
                </li>
                <li>
                  alteration in
                </li>
              </ul>
            </div>
          </div>
          <div class="btn-box">
            <a href="">
              Buy Now
            </a>
          </div>
        </div>
        <div class="box">
          <div class="detail-box">
            <div class="heading-box">
              <h4>
                03
              </h4>
              <h6>
                Premium
              </h6>
            </div>
            <div class="text-box">
              <h2>
                $3000.00
              </h2>
              <ul>
                <li>
                  variations of
                </li>
                <li>
                  passages of Lorem
                </li>
                <li>
                  Ipsum available,
                </li>
                <li>
                  but the majority
                </li>
                <li>
                  have suffered
                </li>
                <li>
                  alteration in
                </li>
              </ul>
            </div>
          </div>
          <div class="btn-box">
            <a href="">
              Buy Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end price section -->

  <!-- deal section -->

  <section class="deal_section layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Very Good Deal For House
              </h2>
            </div>
            <p>
            With an extensive portfolio of properties across Vietnam, we offer a diverse range of options to suit your preferences and lifestyle. Our user-friendly website makes it easy to explore our listings, view detailed property information, and visualize your future home through captivating images. Whether you're a first-time homebuyer, an investor, or looking for your next upgrade, we're here to make your real estate journey smooth, transparent, and enjoyable.
            </p>
            <a href="">
              Get A Quote
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <div class="box b1">
              <img src="images/d-1.jpg" alt="">
            </div>
            <div class="box b1">
              <img src="images/d-2.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end deal section -->


  <!-- us section -->
  <section class="us_section layout_padding2">

    <div class="container">
      <div class="heading_container">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-1.png" alt="">
            </div>
            <div class="detail-box">
              <h3 class="price">
                1000+
              </h3>
              <h5>
                Years of House
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-2.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                20000+
              </h3>
              <h5>
                Projects Delivered
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-3.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                10000+
              </h3>
              <h5>
                Satisfied Customers
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="images/u-4.png" alt="">
            </div>
            <div class="detail-box">
              <h3>
                1500+
              </h3>
              <h5>
                Cheap Rates
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Get A Quote
        </a>
      </div>
    </div>
  </section>

  <!-- end us section -->

  <!-- client secction -->

  <section class="client_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          What is Says Our Customer
        </h2>
      </div>
      <div class="client_container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php 
            // Retrieve feedback entries
              $query = "SELECT * FROM feedback";
              $result = mysqli_query($conn, $query);
              
              $feedbackData = array(); // Initialize an array to store feedback data
              
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $feedbackData[] = $row;
          
                }
              }

              mysqli_close($conn);
            ?>

            <?php for ($i = 0; $i < count($feedbackData); $i++) : 
              if ($i == 0) {
                ?> 
                  <div class="carousel-item active">
                <?php
              } else { 
                ?> 
                <div class="carousel-item">
                <?php
              }
               ?> 
                  <div class="box">
                    <div class="img-box">
                      <?php if (!empty($feedbackData[$i]['picture_filename'])) : ?>
                          <img src="images/client/<?php echo $feedbackData[$i]['picture_filename']; ?>" alt="Feedback Picture" width="200">
                      <?php endif; ?>
                    </div>
                    <div class="detail-box">
                    <h5>
                      <span><?php echo $feedbackData[$i]['name']; ?></span>
                      <hr>
                    </h5>
                    <p>
                      <?php echo $feedbackData[$i]['feedback']; ?>
                    </p>
                  </div>
                  </div>
                </div>
               <?php;
              ?> 
              
            <?php endfor; ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section ">
    <div class="container">
      <div class="heading_container">
        <h2>
          Get In Touch
        </h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0716553790885!2d106.6931917760193!3d10.72895676006553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fbea5fe3db1%3A0xfae94aca5709003f!2sRMIT%20University%20Vietnam%20-%20Saigon%20South%20campus!5e0!3m2!1sen!2s!4v1691924161198!5m2!1sen!2s" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0716553790885!2d106.6931917760193!3d10.72895676006553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fbea5fe3db1%3A0xfae94aca5709003f!2sRMIT%20University%20Vietnam%20-%20Saigon%20South%20campus!5e0!3m2!1sen!2s!4v1691924161198!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-5 ">
          <div class="form_container">
            <form action="contact_submited.php" method="post">
              <div>
                <input type="text" placeholder="Name" name="name_contact"/>
              </div>
              <div>
                <input type="email" placeholder="Email" name="email_contact"/>
              </div>
              <div>
                <input type="tel" placeholder="Phone Number" name="tel_contact">
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" name="message_contact"/>
              </div>
              <div class="d-flex ">
                <button type="submit" value="Send"> SEND
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- end contact section -->



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