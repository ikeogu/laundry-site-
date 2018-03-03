<!DOCTYPE html>
<html>
<head>
  <title>SignUp</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body id="bodyback">
  <header class="container-fluid navbar-fixed-top">
  <!-- <div class="navbar-fixed-top"> -->
    <h3><a href="index.html"><span class="glyphicon glyphicon-home"></span> LAUNDRY HOUSE</a></h3>
    <h2 >STAFF ONLY</h2>
    <nav>
      <ul class="nav nav-tabs">
         <li role="presentation"><a href="index.html">Home</a></li>
         <li role="presentation"><a href="services.html">Services</a></li>
         <li role="presentation"><a href="contactus.html">Contact Us</a></li>
         <li role="presentation"><a href="aboutus.html">About Us</a></li>
         <li role="presentation" id="signin"  class="active" ><a href="#">Sign Up</a></li>
         <li role="presentation" id="signin"><a href="signin.php">Sign In</a></li>
      </ul>
    </nav>
    <!-- </div> -->
  </header>
<?php
    include_once 'includes/staff.php';
    $result = '';
  
    if(isset($_POST['create'])){
      $staff = Staff::instantiate($_POST);
      $header = 'Registration Status';
      $message ='staff created successsfully.';
      $message2= 'staff was not created.';
      if($staff){
         $staff->attach_file($_FILES['passport']);
        if ($staff->save_with_file()) {
          //$new_staff = Staff::findByEmail($staff->email);
          //$link = "staff_activation.php?id={$new_staff->getstaffid()}&hash=$new_staff->hash ";



          $result = '<div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <strong>Success!</strong>'."$header".'<hr/>'."$message".'</div>';
        }else {
          $result = '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Danger!</strong>'."$header".'<hr/>'."$message2".'</div>';
        }
      }
    }
?>
  <section class="container" id="signupsection">
 <div><?php echo $result; ?></div>
  <form class="form-horizontal" action="staff_Reg.php" method="POST" enctype="multipart/form-data">
    <label class="control-label col-lg-4">passport*</label>
       <div class="form-group col-lg-8">
        <input class="form-control" type="file" name="passport"  required="">
       </div>
     
       <label class="control-label col-lg-4">Name*</label>
       <div class="form-group col-lg-8">
          <input class="form-control" type="text" name="first_name" placeholder="First Name" required="" >
          <input class="form-control" type="text" name="last_name" placeholder="Last Name" required="" >
          <input type="text " name="middle_name" placeholder="middle name" class="form-control" required="">
        

       <label class="control-label col-lg-4">Email*</label>
       <div class="form-group col-lg-8">
        <input class="form-control" type="email" name="email" placeholder="Email" required="">
       </div>
       
       <label class="control-label col-lg-4">DOB*</label>
       <div class="form-group col-lg-8">
        <input class="form-control" type="DATE" name="dob" required="">
       </div>
       <label class="control-label col-lg-4">DOE*</label>
       <div class="form-group col-lg-8">
        <input class="form-control" type="DATE" name="doe" required="">
       </div>
      
      
         <label class="control-label col-lg-4">Password*</label>
          <div class="form-group col-lg-8">
          <input class="form-control" type="password" name="password" placeholder="Password" required="">
          <input class="form-control" type="password" name="password" placeholder="Confirm Password" required=""> 
      </div>
       <label class="control-label col-lg-4">Phone Number*</label>
       <div class="form-group col-lg-8"><input class="form-control" type="tel" name="phone" placeholder="Phone Number" required=""></div>
       <label class="control-label col-lg-4">Address </label>
       <div class="form-group col-lg-8"><input class="form-control" type="text" name="address" placeholder="Street Address" required=""></div>
       <div class='form-group col-lg-8'>
                <label class='col col-lg-4 control-label' name="sex">Sex*</label>
                 <div class='col col-lg-4 input-group'>
                 <span class="input-group-addon"><i class="fa fa-transgender" aria-hidden="true" ></i></span>
                     <div >
                     <label>
                     <input checked type='radio' name='sex' value='m' >
                     <span class='labels'>Male</span>
                   </label>
                   </div >
                   <div >
                       <label>
                     <input type='radio' name='sex' value='f'>
                     <span class='labels'>Female</span>
                   </label>
                   </div>
                 </div>
               </div>
       </div>  
              <button type="submit" class="btn btn-lg btn-primary col-lg-offset-4 col-lg-4" name="create">Register</button>
     </form>
   </div>
 </section>


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