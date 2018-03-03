<?php
    include_once 'includes/staff.php';
  include_once 'includes/con_fig.php';
  include_once 'includes/session.php';

    if(!($session->is_logged_in())) redirect('staff_Login.php');
     $staff = Staff::find($session->user_id);

      if(isset($_POST['update'])){
                  $staff = Staff::instantiate($_POST);
                  $staff->staff_id = $staff_id;
              
              if($staff)
                if ($staff->update()) {
                     echo  $result = '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      '."$header".'<br/>'.'<hr/>'."$message".'</div>';
                 }else {
                      echo $result = '<div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      '."$header".'<br/>'.'<hr/>'."$message2".'</div>';
                    }
    }   
    
 

?>


<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/fixed.css">
  <link rel="stylesheet" type="text/css" href="css/overview.css">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-3 sidebar" >
          <nav id="sidenavitems" >
            <h3 class="text-center"><a href="#"><span class="glyphicon glyphicon-home"></span>Staff House</a></h3>
            <ul class='nav nav-sidebar top-side' >
              <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> Overview</a></li>
              <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Profile</a></li>
              <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i> </a></li>
              <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i> </a></li>
              <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> </a></li>
            </ul>

            <ul class='nav nav-sidebar' >
              <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a></li>
              <li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a></li>
            </ul>
          </nav>
        </div>


        <!--container-->
        <div class="container col-lg-offset-4 col-md-offset-4 col-sm-offset-4" >
          <div class="row">
           <!--begin of div-->
           <header class="title thumbnail">
            <h3><i  class="fa fa-eye" aria-hidden="true"></i>Profile</h3>
          </header>
          <div>
            <strong>You can edit your profile if you wish! </strong>
          </div>

          
        <div class="col-lg-4 col-md-4 col-sm-4 ">            
              <div class="">
                <img class=" img-responsive" src="img/staff/<?php echo $staff->passport; ?>">
             </div> 
            <p>passport</p>
            
            <div> <?php
    


                  echo "Name : $staff->first_name  $staff->middle_name $staff->last_name"."<br>";
                  echo "Age : $staff->dob"."<br>";
                  echo "Address : $staff->address"."<br>";
                  echo "Email : $staff->email"."<br>";
                  echo "password : . $staff->password"."<br>"; 
                  echo "Date of employment : $staff->doe"."<br>";
                  echo "phone : $staff->phone";


                ?>
                  
            </div>

        </div>        
        <div class="col col-lg-6 col-md-6 col-sm-6" >
                <form class="form-horizontal" action="staff_Reg.php" method="POST">
                  <label class="control-label col-lg-4">Name*</label>
                  <div class="form-group col-lg-8">
                    <input class="form-control" type="text" name="first_name" placeholder="First Name" required="" value="<?php echo $staff->first_name; ?>" >
                    <input class="form-control" type="text" name="last_name" placeholder="Last Name" required="" value="<?php echo $staff->last_name; ?>">
                    <input type="text " name="middle_name" placeholder="middle name" class="form-control" required="" value="<?php echo $staff->middle_name; ?>">
                  </div>

                  <label class="control-label col-lg-4">Email*</label>
                    <div class="form-group col-lg-8">
                     <input class="form-control" type="email" name="email" placeholder="Email" required="" value="<?php echo $staff->email; ?>">
                    </div>
               
                  <label class="control-label col-lg-4">DOB*</label>
                  <div class="form-group col-lg-8">
                    <input class="form-control" type="DATE" name="dob" required="" value="<?php echo $staff->dob; ?>">
                  </div>
                  <label class="control-label col-lg-4">DOE*</label>
                    <div class="form-group col-lg-8">
                      <input class="form-control" type="DATE" name="doe" required="" value="<?php echo $staff->doe; ?>">
                    </div>
              
              
                 <label class="control-label col-lg-4">Password*</label>
                  <div class="form-group col-lg-8">
                    <input class="form-control" type="password" name="password" placeholder="Password" required="" value="<?php echo $staff->password; ?>">
                    <input class="form-control" type="password" name="password" placeholder="Confirm Password" required="" value="<?php echo $staff->password; ?>"> 
                  </div>
                  <label class="control-label col-lg-4">Phone Number*</label>
                  <div class="form-group col-lg-8"> <input class="form-control" type="tel" name="phone" placeholder="Phone Number"          required="" value="<?php echo $staff->phone; ?>">
                  </div>
                 <label class="control-label col-lg-4">Address </label>
                <div class="form-group col-lg-8"><input class="form-control" type="text" name="address" placeholder="Street Address"      required="" value="<?php echo $staff->address; ?>">
                </div>
                <label class='col col-lg-4 control-label' name="sex">Sex*</label>
                <div class='col col-lg-4 input-group'><input type="text" name="sex" value="<?php echo $staff->sex; ?>"> </div>
                  <button type="submit" class="btn btn-lg btn-primary col-lg-offset-4 col-lg-4" name="update">Update</button>             
              </form>
         </div>
          
             
          <!--end of div-->
          </div>
          
        </div>
      </div>
    </div>    
     
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>