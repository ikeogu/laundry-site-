<?php
	include_once ('includes/customer.php');
	$customer = Customer::find($_POST['email']);
	echo ($customer)? "Email already in use ($customer->email)" : "Avaliable";

?>