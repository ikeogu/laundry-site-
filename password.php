<?php
    include_once 'includes/staff.php';
  include_once 'includes/con_fig.php';
  include_once 'includes/session.php';
  
  if(isset($_GET['id'])){
    $staff_id = $_GET['id'];
    if(!($session->is_logged_in())) redirect('staff_Login.php');
     $staff = Staff::find($session->user_id);

  }
  if(isset($_POST['change'])){
    $header = 'Change password';
    $message = 'Password updated successully';
    $message2= 'OOPs! something went wrong. please try again';
    $message3 = 'password mismatch error';
    $message4 = 'Incorrect password';
    if(md5($_POST['password'])==$staff->password){
            if($_POST['password1']==$POST['password2']){
                $staff->password = md5($_POST['password1']);          
              if ($staff->update()) {
                   echo  $result = '<div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  '."$header".'<br/>'.'<hr/>'."$message".'</div>';
                   }else {
                        echo $result = '<div class="alert alert-info alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  '."$header".'<br/>'.'<hr/>'."$message2".'</div>';
                  }
              }else{
                   echo  $result =  '<div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  '."$header".'<br/>'.'<hr/>'."$message2".'</div>';
                  }
            }
            else {
                    $result =  '<div class="alert alert-danger alert-dismissible" role="alert">
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
  
      
        

        <header class="title thumbnail">
          <h3><i  class="fa fa-eye" aria-hidden="true"></i>Profile</h3>
        </header>
          <div>
          <strong>You can edit your password! </strong>
        </div>
  <section class=" row">
    <div class="col col-lg-3 col-md-4 col-SM-4">
  

    </div>        
    <div class="col col-lg-6 col-md-4 col-SM-4" >
     <form class="form-horizontal" action="password.php?id=<?php echo $staff_id; ?>"" method="POST" enctype="multipart/form-data">

      
    
        <label class="control-label col-lg-4"> old Password*</label>
          <div class="form-group col-lg-8">
          <input class="form-control" type="password" name="password" placeholder=" Password" required="" >
          </div>
         <label class="control-label col-lg-4">Password*</label>
          <div class="form-group col-lg-8">
          <input class="form-control" type="password" name="password" placeholder=" Password" required="" >
          <input class="form-control" type="password" name="password" placeholder="Confirm Password" required="">
          <button class="btn  btn-lg-info" name="change"> change</button>             
     </form>
   </div>
 </section>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>