<?php

$conn = mysqli_connect('localhost','root','','doctor search') or die('connection failed');

if(isset($_POST['submit'])){
 
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');

   if($insert){
      $message[] = 'appointment made successfully!';
   }else{
      $message[] = 'appointment failed';
   }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fa-solid fa-house-medical"></i><strong>Health</strong>care </a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#appointment">Appointment</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

 <!-- home section starts  -->
 <section class="home" id="home">
    <div class="image">
        <video src="image/7579595-hd_1080_1920_25fps.mp4" autoplay muted loop></video>

    </div>
    <div class="content">
        <h3>Your Health is Our Priority</h3>
        <p>Good physical health ensures optimal bodily functions and processes.</p>
        <h5>Search doctor</h5>
        <form class="search-form" action="search_doctors.php"  method="post">
            <input type="text" name="specialty" list="specialties" placeholder="Specialty">
            <datalist id="specialties">
                <option value="Cardiology">
                <option value="Dermatology">
                <option value="Neurology">
                <option value="Pediatrics">
                <option value="Radiology">
                <!-- Add more specialties as needed -->
            </datalist>
            <input type="text" name="location" placeholder="Location">
            <button type="submit" class="btn">Search <span class="fas fa-search"></span></button>
        </form>
    
        <a href="#appointment" class="btn">Appointment Us <span class="fas fa-chevron-right"></span></a>
    </div>
</section>
<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="image/about-img.svg" alt="">
        </div>

        <div class="content">
            <h3>Access superior healthcare solutions unmatched anywhere else in the world.</h3>
            <p >Healthcare is a comprehensive online platform dedicated to helping you discover, compare, and connect with top-rated doctors in your area. </p>
            <p>Our team comprises healthcare enthusiasts, tech experts, and customer service professionals, all committed to ensuring that you have access to the best medical care available.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading"> our <span>services</span> </h1>

    <div class="box-container">


        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>Medicines</h3>
            <p>Our Medicines section offers detailed information on a wide range of medications.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fa-solid fa-truck-medical"></i>
            <h3>24/7 Ambulance</h3>
            <p>Our 24/7 Ambulance service ensures that emergency medical assistance is always within reach. </p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>Expert doctors</h3>
            <p>Our Expert Doctors section links you with highly qualified and experienced.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

   

        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>Bed Facility</h3>
            <p>Our Bed Facility service provides real-time information on hospital bed availability.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Total Care</h3>
            <p>Our Total Care service offers a holistic approach to your health and well-being, combining medical expertise</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<!-- services section ends -->

<!-- appointmenting section starts   -->

<section class="appointment" id="appointment">

    <h1 class="heading"> <span>appointment</span> now </h1>    

    <div class="row">

        <div class="image">
            <video src="image/5998351-hd_1080_1920_30fps.mp4" autoplay muted loop></video>

            <!-- <img src="image/appointment-img.svg" alt=""> -->
        </div>

        <form action="appointments.php" method="post">
      
            <h3>make appointment</h3>
            <input type="text"name="name" placeholder="your name" class="box">
            <input type="number"name="number" placeholder="your number" class="box">
            <input type="email"name="email" placeholder="your email" class="box">
            <input type="date"name="date" class="box">
            <input type="submit" name="submit" value="appointment now" class="btn">
        </form>

    </div>

</section>

<!-- appointmenting section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="#about"> <i class="fas fa-chevron-right"></i> about </a>
            <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
            <a href="#appointment"> <i class="fas fa-chevron-right"></i> appointment </a>
          
        </div>

        <div class="box">
            <h3>our services</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> dental care </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> message therapy </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> cardioloty </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> ambulance service </a>
        </div>

        <div class="box">
            <h3>appointment info</h3>
            <a href="#"> <i class="fas fa-phone"></i> 80168823 </a>
            <a href="#"> <i class="fas fa-phone"></i> 80178254 </a>
            <a href="#"> <i class="fas fa-envelope"></i> healthcare@gmail.com </a>
            <a href="#"> <i class="fas fa-envelope"></i> supporthealthcare@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Bhopal, india </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>

    </div>



</section>

<!-- footer section ends -->


<!-- js file link  -->
<script src="js/script.js"></script>

</body>
</html>

