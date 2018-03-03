<?php
	include_once 'includes/session.php';
	include_once 'includes/function.php';
	$session->logout();
	redirect('staff_Login.php');
?>