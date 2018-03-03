<?php
	include_once 'includes/customer.php';
	include_once 'includes/function.php';

	$msg='';
	if (isset($_GET['id']) && isset($_GET['opt'])){
		$customer = Customer::find($_GET['id']);
		if($_GET['opt']==0 && $customer)
			$customer->delete();
		redirect ('customers.php');
	}
	$customer = Customer::All();



?>

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
    <nav>
      <ul class="nav nav-tabs">
         <li role="presentation"><a href="index.html">Home</a></li>
         <li role="presentation"><a href="services.html">Services</a></li>
         <li role="presentation"><a href="contactus.html">Contact Us</a></li>
         <li role="presentation"><a href="aboutus.html">About Us</a></li>
         <li role="presentation" id="signin"  class="active" ><a href="#">Sign Up</a></li>
         <li role="presentation" id="signin"><a href="signin.html">Sign In</a></li>
      </ul>
    </nav>
    <!-- </div> -->
  </header>

 <section class="container" id="signupsection">
 	<article class="col col-lg-9 col-md-8  col-xs-9">
 		<div class="row">
 		
 		</div>
 		<div class="row">
 			<h3>Customers</h3>
 		</div>
 	</article>
  <div class="row">
    <div class="input-group">
      <span class="input-group-addon">
        <span class="glyphicon glyphicon-search"></span>
      </span>
      <input type="text" name="" class="form-control" placeholder="email" id="searcher">
    </div>
  </div>  
 	<section class="row" id="search-result">

 		<table class=" table table-hover table-striped table-border ">
 			<?php
 				$table ='';
 				if ($customer){
 					foreach ($customer as $customer) {
 						# code...
 						$table.= "<tr>
 										<td>{$customer->customer_id}</td>
 										<td>{$customer->first_name}</td>
 										<td>{$customer->email}</td>
 										<td>{$customer->phone}</td>
 										<td><a class= 'btn btn-info' href='customer_edit.php?id={$customer->customer_id}'>Edit</a></td>
 										<td><a class= 'btn btn-info' href='customers.php?id={$customer->customer_id}&opt=0'>Delete</a></td>
 								</tr>";
 					}
 					echo $table;
 				}

 			?>
 		</table>
 	</section>
 </section>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/searcher.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
 </html>