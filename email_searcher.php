<?php
	include_once 'includes/customer.php';

	$email  = $_POST['email'];

	$match_result = Customer::emailLike($email);
	if ($match_result){

		$table = "<table class=' table table-hover table-striped table-border' >";
 			foreach($match_result as $customer){
 						$table.= "<tr>
 										<td>{$customer->customer_id}</td>
 										<td>{$customer->first_name}</td>
 										<td>{$customer->email}</td>
 										<td>{$customer->phone}</td>
 										<td><a class= 'btn btn-info' href='customer_edit.php?id={$customer->customer_id}'>Edit</a></td>
 										<td><a class= 'btn btn-info' href='customers.php?id={$customer->customer_id}&opt=0'>Delete</a></td>
 								</tr>";
 					}
 					echo $table,"</table>";
 				}else{
 					echo "<h4> No Match found.</h4>";
 				}

 ?>
 		

