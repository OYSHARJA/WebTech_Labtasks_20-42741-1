<?php  
require_once '../model/model.php';


if (isset($_POST['updateEvent'])) {
	$data['client_name'] = $_POST['client_name'];
	$data['event_name'] = $_POST['event_name'];
	$data['price'] = $_POST['price'];
	$data['approval_status'] = $_POST['approval_status'];
	


  if (updateEvent($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  	header('Location: ../view/profile.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>