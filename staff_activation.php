<?php
	
	include_once'includes/session.php';
	include_once 'includes/staff.php';

	if (isset($GET['id']))&& isset($_GET['hash'])){
		if($staff = Staff::findbyHash($_GET['id'],$_GET['hash'])){
		$staff->hash = '';
		$staff->status = 1;
		$staff->update();
		$session->login($staff);
		redirect('servicecheck.php');
		}
		else {
		redirect('staff_Login.php');
		}
	else {
		redirect('staff_Login.php');
		}
	}
?>