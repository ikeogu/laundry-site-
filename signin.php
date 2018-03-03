<!DOCTYPE html>
<html>
<head>
	<title>SignIn</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body id="bodyback">
	<header class="container-fluid navbar-fixed-top">
  <!-- <div class="navbar-fixed-top"> -->
    <h3><a href="index.html"><span class="glyphicon glyphicon-home"></span> LAUNDRY HOUSE</a></h3>
    <nav>
      <ul class="nav nav-tabs">
         <li role="presentation"><a href="index.html">Home</a></li>
          <li role="presentation"><a href="dashboard.html"> DashBoard</a></li>
         <li role="presentation"><a href="services.html">Services</a></li>
         <li role="presentation"><a href="contactus.html">Contact Us</a></li>
         <li role="presentation"><a href="aboutus.html">About Us</a></li>
          <li role="presentation" id="signin"><a href="signup.php">Sign Up</a></li>
         <li role="presentation" id="signin"  class="active" ><a href="#">Sign In</a></li>
      </ul>
    </nav>
    <!-- </div> -->
  </header>

  <section class="container" id="formsect">
	  <form class="col-lg-offset-3 col-lg-5 ">
	  	<h3 class="text-center">Sign In</h3>
	  	<div class="text-center">
	  		<h2>Log Into your Account</h2>
	  		<p>Your Account is your portal to all things Laundry House</p>
	  		<p>including your pending Laundry, Pickup date, coupons, and more!</p>
	  	</div>
	  	<div class="text-center">
	  		<p><input type="mail" name="email" placeholder="Email" required="" class="form-control"></p>
	  		<p><input type="password" name="password" placeholder="Password" required="" class="form-control"></p>
	  	</div>
	  	<div class="checkbox">
	    	<label><input type="checkbox"> Remember me</label>
	  	</div>
	  	<div>
	 	 <button type="submit" class="btn btn-lg btn-primary col-lg-offset-3 col-lg-6">SIGN IN</button>
	 	 </div>
	 	  <p class="text-center col-lg-offset-1 col-lg-10"><a href="#">forgot your password?</a></p>
       <p class="text-center col-lg-offset-1 col-lg-10"><a href="staff_Login.php">Login for staff only!</a></p>
	 	</form>
  </section>

<article class="text-center">
	<a href="signup.php"><button type="submit" class="btn btn-lg btn-default">Create an Account</button></a>
</article>
<article class="text-center">
  <a href="customer_edit.php"><button type="submit" class="btn btn-lg btn-default">Update Account</button></a>
</article>

 <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h3 id="btmborder">About Laundry House</h3>
          <p>Laundry House is the first high tach laundry Service available in the Alakahia region of Port Harcourt
          We have state of the arts washers and dryers housed in a custom-built facility,designed for customers safety and satisfaction.
          Do your Laundry yourself, or leave it with us for our highly regarded service.
          Our brightly lit and conveniently located LAUNDRY HOUSE™ store is open for self-service customer laundry from early in the morning until late in the evening, and staffed by professionally trained - uniformed attendants whose goal is to make every customer's experience a pleasant one. Equipped with very large capacity machines that are consistently maintained and cleaned, laundry may be done in record time!!</p>
          <h3 id="btmborder">Most Interesting Pages</h3>
          <p><a href="faq.html">FAQ</a></p>
          <p><a href="laundrytip.html">Laundry Tips</a></p>
          <p><a href="privacy.html">Privacy Policy</a></p>
        </div>
        <div class="col-lg-offset-2 col-lg-4">
          <h3 id="btmborder">Our Location</h3>
          <p>Laundry House
          No56 East West Road
          Port Harcourt, Rivers State
          Tel 080-****-****
          </p>
          <p>Open Everyday from 8am to 9pm</p>
          <h3 id="btmborder">Follow Us</h3>
            <i class="fa fa-facebook-official fa-4x" aria-hidden="true"></i>
            <i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i>
            <i class="fa fa-youtube-square fa-4x" aria-hidden="true"></i>
            <i class="fa fa-google-plus-square fa-4x" aria-hidden="true"></i>
            <i class="fa fa-instagram fa-4x" aria-hidden="true"></i>
        </div>
      </div>
    </div>
    <div>
      <p class="text-center">© Copyright 2017 Laundry House. All Rights Reserved</p>
    </div>
  </footer>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>